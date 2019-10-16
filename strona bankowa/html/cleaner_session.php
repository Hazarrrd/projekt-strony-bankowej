<?php

    if(isset($_SESSION['P_amount'])) {
        unset($_SESSION['P_toAccount'], $_SESSION['P_amount'], $_SESSION['P_nazw_odb'], $_SESSION['P_title'], $_SESSION['P_data']);
    }

?>