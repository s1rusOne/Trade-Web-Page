<?php 

    session_start();   
    require_once "../includes/config.php";

    if ( $_SESSION['user'] ) header('Location: ../');
    
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ( strlen($login) > 15 || strlen($login) < 3 )  {

        $_SESSION['message'] = 'Virhe kirjautumiskentän täyttämisessä!';
        header('Location: ../login.php');
    } else if ( strlen($password) > 15 || strlen($password) < 3 )  {

        $_SESSION['message'] = 'Virhe salasanakentän täyttämisessä!';
        header('Location: ../login.php');

    } else if ( preg_match('/^[a-zA-Z0-9]+$/', $login) && preg_match('/^[a-zA-Z0-9]+$/', $password) ) {

        $decrypt_password = md5($password);

        $check_user = mysqli_query($connection, "SELECT * FROM `kayttajat` WHERE `kayttaja_tunnus` = '$login' AND `kayttaja_salasana` = '$decrypt_password'");

        if ( mysqli_num_rows($check_user) > 0 ) {
            
            $user = mysqli_fetch_assoc($check_user);

            $_SESSION['user'] = [
                "id" => $user['kayttaja_id'],
                "mail" => $user['kayttaja_sahkoposti'],
                "level" => $user['kayttaja_taso']
            ];
            
            $_SESSION['user']['welcome'] = "Olet onnistuneesti kirjautunut sisään";
            header('Location: ../info_page.php');

        } else {

            $_SESSION['message'] = 'Virheellinen käyttäjätunnus tai salasana!';
            header('Location: ../login.php');
        }
    } else {

        $_SESSION['message'] = 'Tiedonsyöttövirhe!';
        header('Location: ../login.php');
    }
?>