<?php
	session_start();
	
	if((!isset($_POST['userID'])) || (!isset($_POST['pass']))) {
		header('Location: index.php');
		exit();
	}
	
	require_once "config.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);				// @ - wycisza błędy, czyli nie wyrzuca info o errorze
	
	if($polaczenie->connect_errno!=0) {
        echo "ERROR ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
        header('Location: index.php');
		exit();
    }
	else {
		$login = $_POST['userID'];
        $haslo = $_POST['pass'];
		
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
		
		if($result = $polaczenie->query(
		sprintf("SELECT * FROM uzytkownicy WHERE identyfikator='%s'",
		mysqli_real_escape_string($polaczenie, $login))))
		{
			$users = $result->num_rows;
			if($users == 1) {
				$row = $result->fetch_assoc();
				if(password_verify($haslo, $row['haslo']) && $login == $row['identyfikator']) {
					if($login == 'ADMIN'){				
						$_SESSION['ADMIN'] = true;
						header('Location: admin.php');
					}
					else{
						$_SESSION['logged'] = true;					
						unset($_SESSION['error']);
						$_SESSION['ID'] = $row['ID'];
						$_SESSION['imie'] = $row['imie'];
						$_SESSION['nazwisko'] = $row['nazwisko'];
						$_SESSION['num_konta'] = $row['numer_konta'];
						$_SESSION['stan_konta'] = $row['stan_konta'];
						$result->free();
						header('Location: home.php');
					}
				}
				else {
					$_SESSION['error'] = '<p style="color: red">Nieprawidłowe dane logowania Haslo!</p>';
					header('Location: index.php');
				}
			}
			else {
				
				$_SESSION['error'] = '<p style="color: red">Nieprawidłowe dane logowania!</p>';
				header('Location: index.php');
			}
        }
        else {
            echo 'coś nie działa';
        }
		
		$polaczenie->close();
	}

?>
