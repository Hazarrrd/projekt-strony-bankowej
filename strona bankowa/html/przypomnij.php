<?php
    session_start();

    if(isset($_POST['email'])) {

        if(isset($_POST['login'])) {

            require_once "config.php";

            try {

                $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);				// @ - wycisza błędy, czyli nie wyrzuca info o errorze
                echo 'polaczenie';
                if($polaczenie->connect_errno!=0) {
                    echo "ERROR ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
                    header('Location: przypomnijHaslo.php');
                    exit();
                }
                else {
                    
                    $login = htmlentities($_POST['login'], ENT_QUOTES, "UTF-8");
                    
                    if($result = $polaczenie->query(
                    sprintf("SELECT * FROM uzytkownicy WHERE email='%s'",
                    mysqli_real_escape_string($polaczenie, $_POST['email']))))
                    {
                        $users = $result->num_rows;
                        if($users == 1) {
                            echo 'user';
                            $row = $result->fetch_assoc();
                            if($login == $row['identyfikator']) {
                                // echo 'weszło';
                                unset($_SESSION['error']);
                                $nowe_haslo = random_str(10);
                                $hash_haslo = password_hash($nowe_haslo, PASSWORD_DEFAULT);

                                $to = $_POST['email'];
                                $subject = "Przypomnienie hasła - rockyBank";
                                $message = "
                                <html>
                                <head>
                                <title>Przypomnienie hasła - rockyBank</title>
                                </head>
                                <body>
                                <p>rockyBank</p>
                                <table>
                                <tr>
                                <th>Dane</th>
                                </tr>
                                <tr>
                                <td>Hasło</td>
                                <td>".$nowe_haslo."</td>
                                </tr>
                                </table>
                                </body>
                                </html>
                                ";
                                
                                // Always set content-type when sending HTML email
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                // More headers
                                $headers .= 'From: rockyBank <jannsieradzki@gmail.com>>' . "\r\n";
                                $mail = mail($to, $subject, $message, $headers);
                        
                                if($mail) {
                                    if($polaczenie->query("UPDATE uzytkownicy SET haslo = '$hash_haslo' WHERE email = '$to'")) {
                                        header('Location: przypomnijHaslo.php');
                                    }
                                    else {
                                        echo 'coś';
                                        throw new Exception($polaczenie->error);
                                    }
                                    $_SESSION['complete'] = '<p style="color: green;">Wiadomość została wysłana. Sprawdź swoją pocztę mailową.</p>';
                                    header('Location: przypomnijHaslo.php');
                                }
                                else {
                                    $_SESSION['error'] = '<p style="color: red;">Nie powiodło się wysłanie. Problem z serwisem. </p>';
                                    header('Location: przypomnijHaslo.php');
                                }

                                $result->free();
                            }
                            else {
                                $_SESSION['error'] = '<p style="color: red">Nieprawidłowe dane!</p>';
                                header('Location: przypomnijHaslo.php');
                            }
                        }
                        else {
                            
                            $_SESSION['error'] = '<p style="color: red">Nieprawidłowe dane!</p>';
                            header('Location: przypomnijHaslo.php');
                        }
                    }
                    else {
                        echo 'ERROR: Nothing easy!';
                    }
                    
                    $polaczenie->close();
                }
            }
            catch (Exception $e) {
                $_SESSION['error_server'] = "Błąd łączenia się z serwerem. ";
            }
        }
        else {
            $_SESSION['error'] = '<p style="color: red">Nieprawidłowe dane!</p>';
            header('Location: przypomnijHaslo.php');
        }
    }
    else {
        $_SESSION['error'] = '<p style="color: red">Nieprawidłowe dane!</p>';
        header('Location: przypomnijHaslo.php');
    }
?>

<?php
    function random_str($length)
    {
        $seedings['alphanum'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        $pool = $seedings['alphanum'];
        
        $str = '';
        for ($i=0; $i < $length; $i++)
        {
            $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
        }
        return $str;
    }
?>
