<?php
    session_start();
        
    if(!isset($_SESSION['logged'])) {
        header('Location: index.php');
        exit();
    }
    if(!isset($_SESSION['P_toAccount'])) {
        header('Location: home.php');
        exit();
    }

    require_once "config.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);	

    if($polaczenie->connect_errno!=0) {
        $_SESSION['error_server'] = "ERROR ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
        header('Location: formPay.php');
        exit();
    }
    else {
        // OK
        $id_nad             = $_SESSION['ID'];
        $num_konta_nad      = $_SESSION['num_konta'];
        $num_konta_odb      = $_SESSION['P_toAccount'];
        $kwota              = $_SESSION['P_amount'];
        $data               = $_SESSION['P_data'];
        $nazwa_odb          = $_SESSION['P_nazw_odb'];
        $tytul              = $_SESSION['P_tytul'];
        unset($_SESSION['P_toAccount'], $_SESSION['P_amount'], $_SESSION['P_nazw_odb'], $_SESSION['P_tytul'], $_SESSION['P_data']);
        $status             = '0';                  // 0-> OCZEKIWANIE | 1-> WYKONANY | 2-> ZWROT (ODRZUCONY PRZEZ ADMINA)
        $kwota = floatval($kwota);
        $stan = floatval($_SESSION['stan_konta']);
        $stan = $stan - $kwota;

        if($stan < 0.0) {
            $_SESSION['error_kwota'] = 'Brak wystarczających środków na przelew. Twój stan konta to '.$_SESSION['stan_konta'].' PLN.';
            header('Location: formPay.php');
            $polaczenie->close();
            exit();
        }
	$id_odb = $polaczenie->query("SELECT ID FROM uzytkownicy WHERE numer_konta='$num_konta_odb'");
	$row = $id_odb->fetch_assoc();
	$idnad = $row['ID'];
        if($polaczenie->query("INSERT INTO przelewy VALUES(NULL,'$id_nad','$idnad', '$num_konta_nad', '$num_konta_odb', '$kwota', '$data', '$nazwa_odb', '$tytul', '$status')")) {
            // OK
            if($polaczenie->query("UPDATE uzytkownicy SET stan_konta = '$stan' WHERE ID = '$id_nad'")) {
                // OK
                $_SESSION['przelew'] = true;
                $_SESSION['message_przelew'] = "Zlecony przelew został wykonany pomyślnie. Jego status to OCZEKIWANIE. Proszę czekać na zatwierdzenie przelewu.";
                header('Location: completePrzelew.php');
            }
            else {
                // USUŃ ZAKSIĘGOWANIE
                $polaczenie->query("DELETE FROM przelewy WHERE data = '$data' AND id_nad = '$id_nad' AND num_konta_odb = '$num_konta_odb'");
                $_SESSION['przelew'] = true;
                $_SESSION['message_przelew'] = "Nie udało się wykonać przelewu, problemy techniczne.";
                header('Location: completePrzelew.php');
            }
        }
        else {
            $_SESSION['przelew'] = true;
            $_SESSION['message_przelew'] = "Nie udało się wykonać przelewu, problemy techniczne. ";
            header('Location: completePrzelew.php');
        }
        $polaczenie->close();
    }

?>
