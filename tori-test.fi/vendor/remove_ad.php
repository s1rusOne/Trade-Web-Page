<?php 

    session_start();   
    require_once "../includes/config.php";

    $ad_get = mysqli_query($connection, "SELECT * FROM `ilmoitukset` WHERE `ilmoitus_id` = " . (int) $_GET['ilmoitus_id']);

    $art = mysqli_fetch_assoc($ad_get);
    $_SESSION['ilm_id'] = $art['ilmoitus_id'];

    mysqli_query($connection, "DELETE FROM `ilmoitukset` WHERE `ilmoitus_id` = " . $_SESSION['ilm_id']);
    
    header('Location: ../index.php');
?>