<?php
    
    session_start();
    require_once "includes/config.php"; 
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

        <?php 
            
            $articles = mysqli_query($connection, "SELECT * FROM `ilmoitukset` ORDER BY `ilmoitus_id` DESC LIMIT 10");
            
            $total_count_q = mysqli_query($connection, "SELECT COUNT(`ilmoitus_id`) AS 'total_count' FROM `ilmoitukset`");
            $total_count = mysqli_fetch_assoc($total_count_q);
            $total_ad = 0;

            while( $art = mysqli_fetch_assoc($articles) ) { ?>

                <div class="product_info_text">
                    <h1><?php 
                        if ( $art['ilmoitus_laji'] == 2 ) echo '<i title="Myydään" class="product_symbol_sell fa-solid fa-dollar-sign"></i>';
                        else echo '<i title="Ostamaan" class="product_symbol_buy fa-solid fa-cart-shopping"></i>'; 
                        echo ' ' . $art['ilmoitus_nimi'];
                        ?>
                    </h1>
                    <br>
                    <?php
                        echo nl2br($art['ilmoitus_kuvaus']); ?>
                    <br><br>
                    <ul>
                        <li>
                            <a class="product_mail"><?php
                                $us_id = false;
                                foreach($users_sql as $us_ilm) {    

                                    if ( $us_ilm['kayttaja_id'] = $art['myyja_id'] ) {

                                        $us_id = $us_ilm;
                                        break;
                                    }
                                }
                                ?>
                            </a>
                        </li>
                        <li>            
                            <a class="product_data"><?php 
                            $newDate = date("H:i (d.m.Y)", strtotime($art['ilmoitus_paivays']));
                            echo $newDate; ?>
                            </a>
                        </li>
                        <li>
                            <a class="product_control">
                                <a href="edit_ad.php?ilmoitus_id=<?php echo $art['ilmoitus_id'] ?>"><?php
                                    if ( $art['myyja_id'] == $_SESSION['user']['id'] || !strcmp($_SESSION['user']['level'], "admin") ) {
                                        echo '<button class="product_edit fa-solid fa-pen-to-square"></button>';
                                    }
                                ?>
                                </a>
                                <a href="vendor/remove_ad.php?ilmoitus_id=<?php echo $art['ilmoitus_id'] ?>"><?php
                                    if ( $art['myyja_id'] == $_SESSION['user']['id'] || !strcmp($_SESSION['user']['level'], "admin")) {
                                        echo '<button class="product_delete fa-solid fa-trash"></button>';
                                    }
                                ?>
                                </a>
                            </a>
                        </li>
                        <br><br>
                    </ul>
                        <?php 
                            if ( $total_ad != $total_count['total_count'] - 1 ) {
                                $total_ad++;
                                echo '<hr>';
                            }
                        ?>
                </div>
        <?php } ?>
    </div>
    <?php require "includes/footer.php"; ?>

</html>