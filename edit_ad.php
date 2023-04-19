<?php
    
    session_start();
    require_once "includes/config.php";

    if ( !$_SESSION['user'] ) header('Location: ../login.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $config['title']; ?></title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="/css/all.min.css" rel="stylesheet">
    </head>

    <?php 
        require "includes/header.php"; 

        $ad_get = mysqli_query($connection, "SELECT * FROM `ilmoitukset` WHERE `ilmoitus_id` = " . (int) $_GET['ilmoitus_id']);

        $art = mysqli_fetch_assoc($ad_get);
        $_SESSION['ilm_id'] = $art['ilmoitus_id'];
    ?>

    <div class="container"> 
        <div class="product_info_text">
            <h1>Muokkaa tietuetta</h1>
            <form action="vendor/edit_ad.php" method="post">
            <div class="product_add">
                <a class="product_type" href="/vendor/type_edit.php?ilmoitus_id=<?php echo $art['ilmoitus_id'] ?>">
                    <?php

                        if ( $_SESSION['type'] == 1 ) echo '<i class="product_type_sell .product_symbol_buy fa-solid fa-cart-shopping"></i>';
                        else echo '<i class="product_type_buy product_symbol_sell fa-solid fa-dollar-sign"></i>';
                    ?>
                </a>
                <textarea class="product_textarea_name" name="product_name"><?php echo $art['ilmoitus_nimi']?></textarea>
                <button class="product_add_buton">Tallentaa</button>
            </div>
            <div class="ad__message error"><?php 
                echo $_SESSION['message'];
                $_SESSION['message'] = "";
                ?>
            </div>
            <textarea class="product_textarea_info" name="product_edit"><?php echo $art['ilmoitus_kuvaus']?></textarea>
        </form>
        </div>
    </div>

    <?php require "includes/footer.php"; ?>

</html>