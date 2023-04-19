<?php
    
    session_start();
    require_once "includes/config.php"; 

    if ( !isset($_SESSION['user']['welcome']) ) header('Location: ../profile.php');
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
            <form action="profile.php" method="post">
                <?php 
                    echo '<h1 style="color: green;">' . $_SESSION['user']['welcome'] . '</h1>';
                ?>

                <button type="submit" class="login_site_button enable">Ok</button> <br>
            </form>
        </div>
    </div>

    <?php unset($_SESSION['user']['welcome']) ?>

	<?php include "includes/footer.php" ?>
</html>