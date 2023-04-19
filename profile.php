<?php
    session_start();
    require_once "includes/config.php"; 

    if ( !$_SESSION['user'] ) header('Location: ../login.php');
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
            <meta charset="UTF-8">
            <title><?php echo $config['title']; ?></title>
            <link href="/css/style.css" rel="stylesheet" type="text/css">
            <link href="/css/all.min.css" rel="stylesheet">
    </head>

    <?php include "includes/header.php" ?>

    <body>
        <?php

            $articles = mysqli_query($connection, "SELECT * FROM `ilmoitukset` WHERE `myyja_id` = " . $_SESSION['user']['id']);
        ?>

        <div class="container">  
            <div class="head_site_text">
                <!-- <h1> <?php echo 'Tervetuloa, ' . $_SESSION['user']['nickname']; ?> </h1> -->
                <h1> Henkilökohtainen tili</h1>
            </div>
            <nav class="profile_head_nav">
                <ul>
                    <li> <i class="fa-regular fa-id-badge" style="color: #3882f1;"></i> ID: <text class="profile_type_style"> <?php echo $_SESSION['user']['id']; ?> </text> </li>
                    <li><text class="profile_type_style"> <?php echo "(" . $_SESSION['user']['mail'] . ")"; ?> </text></li> 
                </ul>
                <ul>
                    <li> <a class="profile_head_url small_url" href="vendor/logout.php">Kirjaudu ulos</a></li>
                    <li> <a class="profile_head_url small_url" href="change_info.php">Muuta tietoja</a></li>
                </ul>
            </nav>
            <div class="profile_ad_table">
                <table>
                    <tr>
                        <th style="text-align: left; padding-right: 50px">Typpi</th>
                        <th style="text-align: left; padding-right: 50px">Ad-ID</th>
                        <th style="text-align: left; padding-right: 50px">Nimi</th>
                        <th style="text-align: right; padding-left: 50px">Päivämäärä</th>
                        <th style="text-align: right;"></th>
                    </tr>
                    <?php
                        while( $art = mysqli_fetch_assoc($articles) ) { ?>
                            <tr>
                                <td style="text-align: center; padding-right: 50px">
                                    <?php 
                                        //                        
                                        if ( $art['ilmoitus_laji'] == 2 ) echo '<i class="product_symbol_sell fa-solid fa-dollar-sign"></i>';
                                        else echo '<i class="product_symbol_buy fa-solid fa-cart-shopping"></i>';
                            ?> </td>
                                <td style="text-align: left; padding-right: 50px"><?php echo $art['ilmoitus_id'];?></td>
                                <td style="text-align: left; padding-right: 50px"><?php {
                                    
                                    echo mb_substr(strip_tags($art['ilmoitus_nimi']), 0, 15, 'utf-8');
                                    if ( strlen($art['ilmoitus_nimi']) > 15 ) echo '...';
                                }
                                ?>
                                </td>
                                <td style="text-align: right; padding-left: 50px"><?php                             
                                    $newDate = date("H:i (d.m.Y)", strtotime($art['ilmoitus_paivays']));
                                    echo $newDate; ?>
                                </td>
                                <td style="text-aligh: right; padding-left: 10px">
                                    <a href="edit_ad.php?ilmoitus_id=<?php echo $art['ilmoitus_id'] ?>"><?php
                                        if ( $art['myyja_id'] == $_SESSION['user']['id'] || strcmp($_SESSION['user']['level'], "admin") ) {
                                            echo '<button class="profile_product_edit fa-solid fa-eye"></button>';
                                        }
                                        ?>
                                    </a>
                                    <a href="vendor/remove_ad_profile.php?ilmoitus_id=<?php echo $art['ilmoitus_id'] ?>"><?php
                                        if ( $art['myyja_id'] == $_SESSION['user']['id'] || strcmp($_SESSION['user']['level'], "admin")) {
                                            echo '<button class="profile_product_delete fa-solid fa-trash"></button>';
                                        }
                                        ?>
                                    </a>
                                </td>
                            </tr>
                <?php } ?>
                </table>
            </div>
            <!-- <div class=profile_left_side>

                <div class="profile_text">
                    <ul>
                        <li> <i class="fa-regular fa-id-badge" style="color: #3882f1;"></i> ID: <text class="profile_type_style"> <?php echo  $_SESSION['user']['id']; ?> </text> </li>
                        <li> <i class="fa-regular fa-at" style="color: #3882f1;"></i> Mail: <text class="profile_type_style"> <?php echo  $_SESSION['user']['mail']; ?> </text>  </li> 
                        <li> <i class="fa-regular fa-user" style="color: #3882f1;"></i> <text class="profile_type_style"> Ник: </text> <?php echo  $_SESSION['user']['nickname']; ?> </li>
                    </ul>
                </div>

            </div> -->
        </div>
    </body>

    <?php include "includes/footer.php" ?>
</html>