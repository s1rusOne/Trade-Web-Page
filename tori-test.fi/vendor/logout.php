<?php 

    session_start();   
    require_once "../includes/config.php";

    unset($_SESSION['user']);

    header('Location: ../login.php');
?>