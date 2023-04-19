<?php 

    session_start();

    if ( !$_SESSION['user'] ) header('Location: ../');

    if ( $_SESSION['type'] == 1 ) $_SESSION['type'] = 0;
    else $_SESSION['type'] = 1;

    header('Location: /add_ad.php');
?>