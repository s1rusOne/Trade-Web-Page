<?php 

    session_start();   
    require_once "../includes/config.php";

    if ( !$_SESSION['user'] ) header('Location: ../');

    $password_old = $_POST['password_old'];
    $decrypt_password_old = md5($password_old);

    $password_new = $_POST['password_new'];
    $decrypt_password_new = md5($password_new);

    $user_id = $_SESSION['user']['id'];
    $new_posti = $_POST['mail_new'];

    if ( strlen($new_posti) > 0 && filter_var($new_posti, FILTER_VALIDATE_EMAIL) ) $posti_new = $_POST['mail_new'];
    else $posti_new = $_POST['mail_old'];

    $get_old_password = mysqli_query($connection, "SELECT * FROM `kayttajat` WHERE `kayttaja_salasana` = '$decrypt_password_old' AND `kayttaja_id` = '$user_id'");

    if ( mysqli_num_rows($get_old_password) <= 0 )  {

        $_SESSION['message'] = 'Virheellinen vanha salasana';
        header('Location: ../change_info.php');
    }
    else if ( strlen($password_new) > 15 || strlen($password_new) < 3) {

        $_SESSION['message'] = 'Virhe kirjautumiskentän täyttämisessä!';
        header('Location: ../change_info.php');
    } else {

        mysqli_query($connection, "UPDATE `kayttajat` SET `kayttaja_salasana`='".$decrypt_password_new."', `kayttaja_sahkoposti`='".$posti_new."' 
        WHERE `kayttaja_id` = " . $_SESSION['user']['id']);


        $_SESSION['user']['welcome'] = "Olet vaihtanut onnistuneesti";
        header('Location: ../info_page.php');
    }
?>