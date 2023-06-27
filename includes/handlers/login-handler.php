<?php

if(isset($_POST['loginButton'])) {
    $un = $_POST['usernameEmail'];
    $pw = $_POST['loginPassword'];

    $result = $account->login($un, $pw);

    if($result == true) {
        //$Q = mysqli_query($con, "SELECT * FROM users WHERE (username = '$usernameEmail' OR email='$usernameEmail')");
        //$R = mysqli_fetch_array($Q);

        $_SESSION['userLoggedIn'] = $un;

        header("Location: ".$indexUrl);
    }

}

?>