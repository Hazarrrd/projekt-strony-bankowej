<?php

    session_start();

   if((!isset($_POST['status'])) || (!isset($_POST['ID']))) {
		session_unset();
		header('Location: admin.php');
		exit();
	}

    require_once "config.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);				
	
	if($polaczenie->connect_errno!=0) {
        echo "ERROR ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
        header('Location: admin.php');
		exit();
    }
    else {
        $status = $_POST['status'];
	$ID = $_POST['ID'];
        if($result = $polaczenie->query("CALL zatwierdz('$ID','$status')")) {
            header('Location: admin.php');
	    $_SESSION['message_p']="Akcja wykonana";
        }
        else {
            header('Location: admin.php');
	    $_SESSION['message_p']="Cos nie tak";
            $polaczenie->close();
        }
    }

?>

