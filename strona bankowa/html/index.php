<?php
	session_start();
	
	if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
		header('Location: home.php');
		exit();
    }
	if(isset($_SESSION['ADMIN'])) {
		header('Location: admin.php');
		exit();
    }
?> 
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Logowanie do serwisu transakcyjnego rockyBanku" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="Stylesheet" type="text/css" href="https://online.mbank.pl/LoginMain/Resources/par_axd/LoginMain?file=ResponsiveLogin%2FStyles%2FResponsiveLogin.css&amp;v=8d58f9019156b5f11993430100b318d2" />
    <title>mBank serwis transakcyjny</title>
</head>
<body>

    <header class="header">
        

<a href="">
    <img class="header-left" src="images/glove.jpg"
         width="107" height="40" alt="Link do gł&#243;wnej strony rockyBank">
</a>

        <h1 class="accessible-not-visible">Zaloguj się do serwisu transakcyjnego</h1>
        <span class="header-left">Zaloguj się do serwisu transakcyjnego</span>
        <span class="header-right desktop"></span>
    </header>
    <div class="main">
        <div class="img-container">
            

<img src="images/rockyyyy.jpg" alt="" role="presentation" />

        </div>
        <div class="panel">
            

<div id="retail" class="login expanded login-form scenario-default">
    <div class="login-container">
        <form id="loginForm" action="login.php" method="post" autocomplete="off">
            <div class="color"></div>
            <div class="login-content">
                <div class="title-container ">
                    <h2 class="accessible-not-visible">Klienci indywidualni</h2>
                    <div class="title">Klienci indywidualni</div>
                </div>

                <div class="form-container">
                    <div class="photo-container">
                        <div class="avatar photo photo-retail" style="background-image: url(https://pbs.twimg.com/profile_images/640510405664751616/9NxarKl2.jpg)"></div>
                    </div>
                    <div class="field-container">

                        <div class="form-input">
                            <input name="userID" id="userID" type="text" minlength="5" maxlength="24" required="true" placeholder="Identyfikator" aria-describedby="userIDDescription" autofocus />
                            <a tabindex="-1" href="#" aria-label="Wpisz nazwę użytkownika. Pamiętaj, że system rozpoznaje duże i małe litery." class="tooltip">
                                <i>?</i>
                            </a>
                            <div class="accessible-not-visible" id="userIDDescription">Wpisz nazwę użytkownika. Pamiętaj, że system rozpoznaje duże i małe litery.</div>
                        </div>
                        <div class="form-input">
                            <input name="pass" id="pass" type="password" minlength="8" maxlength="32" required="true" placeholder="Hasło" aria-describedby="passDescription" autocomplete="off"/>
                            <a tabindex="-1" href="#" aria-label="Wpisz hasło, kt&#243;rego używasz do logowania w serwisie transakcyjnym rockyBanku. Pamiętaj, że system rozpoznaje duże i małe litery." class="tooltip">
                                <i>?</i>
                            </a>
                            <div class="accessible-not-visible" id="passDescription">Wpisz hasło, kt&#243;rego używasz do logowania w serwisie transakcyjnym rockyBanku. Pamiętaj, że system rozpoznaje duże i małe litery.</div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="buttons form-buttons">
                <input id="submitButton" type="submit" class="btn" value="Zaloguj się"/>
            </div>
        </form>
    </div>
    <br/>
    <div>
        <a href="rejestracja.php">
        <input type="button" class="btn" style="background-color: #f39100;" value="Zarejestruj w rockyBanku"/>
        </a>
    </div>
    <br/>
    <div>
        <a href="przypomnijHaslo.php">
        <input type="button" class="btn" style="background-color: #0077bd;" value="Przypomnij hasło"/>
        </a>
    </div>
</div>

<?php
	if(isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
	}
?>

</body>
</html>
