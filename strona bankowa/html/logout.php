<?php

    session_start();
        
    session_unset();
    echo "<script>sessionStorage.clear();</script>";
    header('Location: index.php');

?>
