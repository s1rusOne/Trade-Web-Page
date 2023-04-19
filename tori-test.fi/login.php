<?php
    
    session_start();
    require_once "includes/config.php"; 

    if ( $_SESSION['user'] ) header('Location: ../profile.php');
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
            <form action="vendor/signup.php" method="post">
                <h1>Kirjaudu tunnuksellasi</h1>
            
                <?php 

                    if ( $_SESSION['message'] ) {
                        
                        echo '<div class="message error">' . $_SESSION['message'] . '</div><br>';
                    } else {
                        echo '<br><br>';
                    }

                    unset($_SESSION['message']);
                ?>

                <div id="input_login">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="login" class="input_text" value="" placeholder="Kirjautuminen">
                </div> <br>

                <div id="input_password">
                    <i class="fa-solid fa-key"></i>
                    <input type="password" name="password" class="input_text" value="" placeholder="Salasana">
                </div> <br><br>

                <button type="submit" class="login_site_button enable">Kirjaudu</button> <br>
            </form>
        </div>
    </div>

	<?php include "includes/footer.php" ?>
</html>