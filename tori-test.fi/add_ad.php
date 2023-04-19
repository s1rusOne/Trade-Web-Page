<?php
    
    session_start();
    require_once "includes/config.php";

    if (  !$_SESSION['user']  ) header('Location: ../login.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $config['title']; ?></title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="/css/all.min.css" rel="stylesheet">
    </head>

    <?php require "includes/header.php"; ?>
    <div class="container"> 
        <div class="product_info_text">
            <h1>Lisää mainos</h1>
            <form action="vendor/add_ad.php" method="post">
            <div class="product_add">
                <a class="product_type" href="/vendor/type_add.php">
                    <?php 

                        if ( $_SESSION['type'] == 1 ) echo '<i title="Ostaa" class="product_type_sell product_symbol_buy fa-solid fa-cart-shopping"></i>';
                        else echo '<i title="Myydä" class="product_type_buy product_symbol_sell fa-solid fa-dollar-sign"></i>';
                    ?>
                </a>
                <textarea class="product_textarea_name" name="product_name" placeholder="Tuotteen nimi"></textarea>
                
                <button class="product_add_buton" href = "/vendor/add_ad.php">Lisätä</button>
            </div>
            <div class="ad__message error"><?php 
                echo $_SESSION['message'];
                $_SESSION['message'] = "";
                ?>
            </div>
            <textarea class="product_textarea_info" name="product_edit" placeholder="Kuvaus / Tuoteehdotukset"></textarea>
        </form>
        </div>
    </div>
    <?php require "includes/footer.php"; ?>

</html>