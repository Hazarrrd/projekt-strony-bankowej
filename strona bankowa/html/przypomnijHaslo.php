<?php
    session_start();
	
	if(isset($_SESSION['ADMIN'])) {
		header('Location: admin.php');
		exit();
    }

	if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
		header('Location: index.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Zapomniałeś swojego hasła? Wygeneruj nowe hasło do swojego konta." />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="Stylesheet" type="text/css" href="https://online.mbank.pl/LoginMain/Resources/par_axd/LoginMain?file=ResponsiveLogin%2FStyles%2FResponsiveLogin.css&amp;v=8d58f9019156b5f11993430100b318d2" />
        <title>mBank serwis transakcyjny</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <style>
            .inputs {
                padding-bottom: 10px;
            }

            .error {
                color: red;
                margin-bottom: 5px;
            }
            
            .complete {
                color: green;
                margin-bottom: 5px;
            }

            p, h1 {
                margin-left: 20px;
            }
        </style>

    </head>
    <body>
        <a href="index.php">
            <img class="header-left" src="images/glove.jpg"
                width="107" height="40" alt="Link do gł&#243;wnej strony rockyBank">
        </a>
        <br/><br/>
        <h1>Wygeneruj nowe hasło do swojego konta</h1>
        <br/>
        <form name="signForm" action="przypomnij.php" method="post" style="margin-left:20px;">
            <div class="inputs">
                Email na które rejestrowałeś konto w rockyBanku <br/>
                <input name="email" id="email" type="email" required autocomplete="off"/> <br/>
            </div>
            <div class="inputs">
                Identyfikator/Login na który rejestrowałeś konto w rockyBanku <br/>
                <input type="text" id="login" name="login" minlength="5" id="imie" required autocomplete="off"/> <br/>
            </div>
            <div class="inputs">
                <br/>
                <input type="submit" value="Wygeneruj" /> <br/>
            </div>
        </form>
        <div class="inputs">
                <br/>
                <?php
                    if(isset($_SESSION['error_login'])) {
                        echo '<div class="error">'.$_SESSION['error_login'].'</div>';
                        unset($_SESSION['error_login']);
                    }

                    if(isset($_SESSION['error_email'])) {
                        echo '<div class="error">'.$_SESSION['error_email'].'</div>';
                        unset($_SESSION['error_email']);
                    }

                    if(isset($_SESSION['complete'])) {
                        echo '<div class="complete">'.$_SESSION['complete'].'</div>';
                        unset($_SESSION['complete']);
                    }

                    if(isset($_SESSION['error'])) {
                        echo '<div class="error">'.$_SESSION['error'].'</div>';
                        unset($_SESSION['error']);
                    }
                ?>
        </div>
    </body>
</html>


