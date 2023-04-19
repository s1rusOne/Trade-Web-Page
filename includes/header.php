<?php session_start(); ?>

<head>
        <meta charset="UTF-8">
        <title><?php echo $config['title']; ?></title>
        <link href="/css/style.css" rel="stylesheet" type="text/css">
</head>

<?php 
    $users_sql = mysqli_query($connection, "SELECT * FROM `kayttajat`");
?>

<body>
    <div class="header_nav">
        <ul>
            <li><a class="head_text url" href="/">Ilmoitukset</a></li>
            <li><a class="head_text url" method="post" href="/add_ad.php?=type<?php echo $_SESSION['type']; ?>">Lisää ilmoitus</a></li>

            <form action="search.php" method="post">
                <div class="search_box">
                    <input type="text" name="search" class="search_text" placeholder="Search...">
                    <button class="search_button"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
            <?php 

                if ( $_SESSION['user'] ) echo '<a class="head_login url" href="profile.php">Profiili</a>';
                else {
                    
                    echo '<a class="head_login url" href="registration.php">Rekisteröinti</a>';
                    echo '<a class="head_login url" href="login.php">Kirjaudu</a>';
                }
            ?>

        </ul>
    </div>
</body>