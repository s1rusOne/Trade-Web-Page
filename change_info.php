<?php
    
    session_start();
    require_once "includes/config.php"; 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $config['title']; ?></title>
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        <link href="/css/all.min.css" rel="stylesheet">
    </head>

    <?php include "includes/header.php" ?>

    <div class="container">

        <div class="head_site_text">
            <form action="vendor/change_data.php" method="post">
                <h1>Muuta tietoja</h1>
            
                <?php 

                    if ( $_SESSION['message'] ) {
                        
                        echo '<div class="message error">' . $_SESSION['message'] . '</div><br>';
                    } else {
                        echo '<br><br>';
                    }

                    unset($_SESSION['message']);
                ?>

                <div id="input_password">
                <i class="fa-solid fa-key"></i>
                    <input type="password" name="password_old" class="input_text" value="" placeholder="Salasana (vanha)">
                </div> <br>

                <div id="input_password">
                    <i class="fa-solid fa-key"></i>
                    <input type="password" name="password_new" class="input_text" value="" placeholder="Salasana (uusi)">
                </div> <br>

                <div id="input_email">
                    <i class="fa-solid fa-at"></i>
                    <input type="mail" name="mail_old" class="input_text" value="<?php echo $_SESSION['user']['mail'] ?>" readonly="readonly">
                </div> <br>

                <div id="input_email">
                    <i class="fa-solid fa-at"></i>
                    <input type="mail" name="mail_new" class="input_text" value="" placeholder="Sähköposti (uusi - jos tarvi)">
                </div> <br>
                
                <br>

                <button type="submit" class="login_site_button enable">Vaihta</button> <br>
            </form>
        </div>
    </div>

	<?php include "includes/footer.php" ?>
</html>