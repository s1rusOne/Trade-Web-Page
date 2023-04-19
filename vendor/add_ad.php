<?php 

    session_start();   
    require_once "../includes/config.php";

    if ( !$_SESSION['user'] ) header('Location: ../');
    
    $product_name = $_POST['product_name'];
    $product_edit = $_POST['product_edit'];

    if ( strlen($product_name) < 1 || strlen($product_name) > 30 )  {

        $_SESSION['message'] = 'Virhe tuotenimikentän täyttämisessä';
        header('Location: ../add_ad.php');
    } else {

        mysqli_query($connection, "UPDATE `ilmoitukset` SET `ilmoitus_laji`='".$_SESSION['type']."', `ilmoitus_nimi`='".$product_name."', `ilmoitus_kuvaus`='".$product_edit."' 
        WHERE `ilmoitus_id` = " . $_SESSION['ilm_id']);

        header('Location: ../index.php');
    }
?>