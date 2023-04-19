<?php 

    session_start();   
    require_once "../includes/config.php";

    if ( $_SESSION['user'] ) header('Location: ../');
    
    $login = $_POST['login'];
    $password = $_POST['password'];
    $encrypt_password = md5($password);
    $mail = $_POST['mail'];
    $number = $_POST['number'];

    if ( strlen($login) > 15 || strlen($login) < 3 )  {

        $_SESSION['message'] = 'Virhe kirjautumiskentän täyttämisessä!';
        header('Location: ../registration.php');
    } else if ( strlen($password) > 15 || strlen($password) < 3 )  {

        $_SESSION['message'] = 'Virhe salasanakentän täyttämisessä!';
        header('Location: ../registration.php');

    } else if ( preg_match('/^[a-zA-Z0-9]+$/', $login) && preg_match('/^[a-zA-Z0-9]+$/', $password) && filter_var($mail, FILTER_VALIDATE_EMAIL) && ($number == 6 || $number == "kuusi") ) {

        $check_user = mysqli_query($connection, "SELECT * FROM `kayttajat` WHERE `kayttaja_tunnus` = '$login' OR `kayttaja_sahkoposti` = '$mail'");

        if ( mysqli_num_rows($check_user) > 0 ) {

            $_SESSION['message'] = 'Syötetyt tiedot on jo rekisteröity!';
            header('Location: ../registration.php');

        }else {

            // exit("INSERT INTO `kayttajat` (`kayttaja_tunnus`, `kayttaja_salasana`, `kayttaja_sahkoposti`)
            // VALUES ('".$_POST['login']."', '".$encrypt_password."', '".$_POST['mail']."')");

            mysqli_query($connection, "INSERT INTO `kayttajat` (`kayttaja_tunnus`, `kayttaja_salasana`, `kayttaja_sahkoposti`)
            VALUES ('".$_POST['login']."', '".$encrypt_password."', '".$_POST['mail']."')");

            $check_user = mysqli_query($connection, "SELECT * FROM `kayttajat` WHERE `kayttaja_tunnus` = '$login' AND `kayttaja_sahkoposti` = '$mail'");
            $user = mysqli_fetch_assoc($check_user);

            $_SESSION['user'] = [
                "id" => $user['kayttaja_id'],
                "mail" => $user['kayttaja_sahkoposti'],
                "level" => $user['kayttaja_taso']
            ];

            $_SESSION['user']['welcome'] = "Olet rekisteröitynyt onnistuneesti";
    
            header('Location: ../info_page.php');
        }
    } else {

        $_SESSION['message'] = 'Tiedonsyöttövirhe!';
        header('Location: ../registration.php');
    }
?>