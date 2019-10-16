<?php
    session_start();
	
	if(!isset($_SESSION['ADMIN'])) {
		header('Location: index.php');
		exit();
    }
    
    require_once "config.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);		
	
	if($polaczenie->connect_errno!=0) {
        echo "ERROR ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
        header('Location: index.php');
		exit();
    }
    else {
	
        if($result = $polaczenie->query(sprintf("SELECT * FROM przelewy WHERE status='0'"))) {
          
        }
        else {
            $_SESSION['error_hist'] = 'Cos poszlo nie tak ....';
	    session_unset();
            header('Location: index.php');
            exit();
        }
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="ADMIN myBank" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>myBank - admin</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<a href="logout.php"><button>Wyloguj</button></a>
 <a class="login-container">
        <form id="changeStatus" action="changeStatus.php" method="post" autocomplete="off">
            <a class="login-content">
                <a class="title-container ">
                    <h2 class="accessible-not-visible">USTAW STATUS - OPCJA ADMINISTRATORSKA</h2>
                    <a class="title">Wpisz status i ID przelewu 1-> przjęty 2-> odrzucony</a>
                </a>
                <br />
                        <a class="form-input">
                            <input name="status" id="status" type="status" minlength="1" maxlength="1" required="true" placeholder="Status" aria-describedby="passDescription" autocomplete="off"/>
                            <input name="ID" id="ID" type="text" minlength="1" maxlength="24" required="true" placeholder="ID przelewu" aria-describedby="userIDDescription" autofocus />                           
                            </a>
                      
                        </a>

                  
                </a>
            </a>
            <a class="buttons form-buttons">
                <input id="submitButton" type="submit" class="btn" value="Zatwierdź"/>
            </a>
        </form>
    </a>

<br />
<br />
<table>
    <tr>
        <th>Data</th>
	<th>ID przelewu</th>
        <th>Numer konta nadawcy</th>
	<th>Numer konta odbiorcy</th>
        <th>Tytuł</th>
        <th>Kwota</th>
        <th>Status</th>
    </tr>
    <?php

        while($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>'.$row['data'].'</td>';
	    echo '<td>'.$row['ID'].'</td>';
            echo '<td>'.$row['num_konta_nad'].'</td>';
	    echo '<td>'.$row['num_konta_odb'].'</td>';
            echo '<td>'.$row['tytul'].'</td>';
            echo '<td>'.$row['kwota'].' PLN</td>';
            echo '<td>';
            switch($row['status']) {
                case '0': echo "Oczekiwanie";
                    break;
                case '1': echo "Zatwierdzony";
                    break;
                case '2': echo "Niezatwierdzony";
                    break;
                default: echo "Błąd przelewu";
                    break;
            }
            echo '</td>';
            echo '</tr>';
        }

    ?>
</table>

<h1><?php echo $_SESSION['message_p']; ?></h1><br/>
   
</body>
</html>
