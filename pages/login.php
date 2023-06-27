<?php
    include("includes/includedFiles.php");
?>

<?php

    include("includes/constants/Constants.php");
    //require_once("includes/classes/SendEmail.php");
    $constants = new Constants();

    include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");
    //require_once("includes/handlers/newPassword-handler.php");

    function getInputValue($inputText) {
        if(isset($_POST[$inputText])) {
            echo strip_tags($_POST[$inputText]);
        }
    }
?>

<div class="center2 login-all">

    <!--LOGIN START -->
    <div id="login">
        <form id="loginForm" action="/login" method="POST" onsubmit="return false;">

            <div class="loginHeader">Zaloguj się</div>

            <div class="input">
                <i class="fas fa-user icon"></i>
                <input id="usernameEmail" class="button1 inputLogin radius1" name="usernameEmail" type="text" placeholder="" value="<?php echo getInputValue('usernameEmail'); ?>" required>
                <div class="placeholder">Login lub E-mail</div>
                <?php echo $account->getError(Constants::$loginFailed, "usernameEmail"); ?>
            </div>

            <div class="input">
                <i class="fas fa-lock icon"></i>
                <input id="passwordL" class="button1 inputLogin radius1" name="loginPassword" type="password" placeholder="" value="" required>
                <div class="placeholder">Hasło</div>
            </div>

            <button class="button2 buttonLogin radius1 linkHoverEffect" name="loginButton">Zaloguj się</button>

            <div id="resetShow" class="loginShow linkHoverEffect resetShow">Nie pamiętasz hasła?</div>
            <div id="registerShow" class="loginShow linkHoverEffect">Nie masz konta? Stwórz je tutaj!</div>

        </form>

    </div>
    <!--LOGIN END -->

    <!--REGISTER START -->
    <div id="register">
        <form id="registerForm" action="register/1" method="POST">

            <div class="loginHeader">Stwórz konto</div>

            <div class="input">
                <i class="fas fa-user icon"></i>
                <input id="firsName" class="button1 inputLogin radius1" name="firsName" type="text" placeholder="" value="<?php echo getInputValue('firsName'); ?>" required>
                <div class="placeholder">Imię</div>
                <?php echo $account->getError(Constants::$firstNameStrlen, "firsName"); ?>
            </div>

            <div class="input">
                <i class="fas fa-user icon"></i>
                <input id="lastName" class="button1 inputLogin radius1" name="lastName" type="text" placeholder="" value="<?php echo getInputValue('lastName'); ?>" required>
                <div class="placeholder">Nazwisko</div>
                <?php echo $account->getError(Constants::$lastNameStrlen, "lastName"); ?>
            </div>

            <div class="input">
                <i class="fas fa-user icon"></i>
                <input id="username" class="button1 inputLogin radius1" name="username" type="text" placeholder="" value="<?php echo getInputValue('username'); ?>" required>
                <div class="placeholder">Login</div>
                <?php echo $account->getError(Constants::$usernameStrlen, "username"); ?>
                <?php echo $account->getError(Constants::$usernameInvalidCharacters, "username"); ?>
                <?php echo $account->getError(Constants::$usernameTaken, "username"); ?>
            </div>

            <div class="input">
                <i class="fas fa-at icon"></i>
                <input id="email" class="button1 inputLogin radius1" name="email" type="email" placeholder="" value="<?php echo getInputValue('email'); ?>" required>
                <div class="placeholder">E-mail</div>
                <?php echo $account->getError(Constants::$emailInvalid, "email"); ?>
                <?php echo $account->getError(Constants::$emailTaken, "email"); ?>
                <?php echo $account->getError(Constants::$emailsDonNoMatch, "email"); ?>
            </div>

            <div class="input">
                <i class="fas fa-at icon"></i>
                <input class="button1 inputLogin radius1" name="email2 " type="email" placeholder="" value="<?php echo getInputValue('email2'); ?>" required>
                <div class="placeholder">Potwierdź E-mail</div>
            </div>

            <div class="input">  
                <i class="fas fa-lock icon"></i>
                <input id="password" class="button1 inputLogin radius1" name="password" type="password" placeholder="" value="" required>
                <div class="placeholder">Hasło</div>
                <?php echo $account->getError(Constants::$passwordStrlen, "password"); ?>
                <?php echo $account->getError(Constants::$passwordInvalidCharacters, "password"); ?>
                <?php echo $account->getError(Constants::$passwordsDoNoMatch, "password"); ?>
            </div>

            <div class="input">
                <i class="fas fa-lock icon"></i>
                <input class="button1 inputLogin radius1" name="password2" type="password" placeholder="" value="" required>
                <div class="placeholder">Potwierdź hasło</div>
            </div>

            <label class="container">
                <div class="checkboxBox">
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </div>

                <div class="checkboxText">
                    Akceptuję <a href="regulamin" class="regulaminAccept">regulamin</a> świadczenia usługi i zobowiązuję się do jego przestrzegania.
                </div>
            </label>

            <button class="button2 buttonLogin radius1 linkHoverEffect" name="registerButton">Stwórz</button>

            <div id="loginShow" class="loginShow linkHoverEffect">Masz już konto? Zaloguj się tutaj!</div>

        </form>
    </div>
    <!--REGISTER END -->

    <!--RESET PASSWORD START -->
    <div id="reset">
        <form id="resetForm" action="reset/1" method="POST">      

            <div class="loginHeader">Nowe hasło</div>

            <div class='input'>
                <i class='fas fa-at icon'></i>
                <input id='emailTel' class='button1 inputLogin radius1' name='emailTel' type='email' placeholder='' value='' required>
                <div class='placeholder'>E-mail lub numer telefonu</div>
                <?php echo $account->getError(Constants::$resetPasswordEmail, "emailTel"); ?>
            </div>

            <button class='button2 buttonLogin radius1 linkHoverEffect' name='resetPasswordButton'>Resetuj hasło</button>

            <div id="loginShow2" class="loginShow linkHoverEffect">Zaloguj się tutaj!</div>

        </form>
    </div>
    <!--RESET PASSWORD END -->

    <!--RESET2 PASSWORD START -->
    <div id="reset2">
        <form id="reset2Form" action="reset2/1" method="POST">

            <div class="loginHeader">Nowe hasło</div>

            <input name="usernameR" type="hidden" value="<?php echo $username; ?>">

            <input name="passwordR" type="hidden" value="<?php echo $password; ?>">

            <div class="input">  
                <i class="fas fa-lock icon"></i>
                <input id="passwordRN" class="button1 inputLogin radius1" name="passwordRN" type="password" placeholder="" value="" required>
                <div class="placeholder">Nowe hasło</div>
                <?php echo $account->getError(Constants::$passwordStrlen, "passwordRN"); ?>
                <?php echo $account->getError(Constants::$passwordInvalidCharacters, "passwordRN"); ?>
                <?php echo $account->getError(Constants::$passwordsDoNoMatch, "passwordRN"); ?>
            </div>

            <div class="input">
                <i class="fas fa-lock icon"></i>
                <input class="button1 inputLogin radius1" name="passwordRN2" type="password" placeholder="" value="" required>
                <div class="placeholder">Potwierdź nowe hasło</div>
            </div>

            <button class='button2 buttonLogin radius1 linkHoverEffect' name='resetPassword2Button'>Zmień hasło</button>

        </form>
    </div>
    <!--RESET2 PASSWORD END -->

    <!--NEW PASSWORD START -->
    <div id="new">
        <form id="newForm" action="new/1" method="POST">

            <div class="loginHeader">Nowe hasło</div>

            <div class="input">
                <i class="fas fa-lock icon"></i>
                <input id="passwordC" class="button1 inputLogin radius1" name="passwordC" type="password" placeholder="" value="" required>
                <div class="placeholder">Aktualne hasło</div>
                <?php echo $account->getError(Constants::$newPassword, "passwordC"); ?>
            </div>

            <div class="input">  
                <i class="fas fa-lock icon"></i>
                <input id="passwordN" class="button1 inputLogin radius1" name="passwordN" type="password" placeholder="" value="" required>
                <div class="placeholder">Nowe hasło</div>
                <?php echo $account->getError(Constants::$passwordStrlen, "passwordN"); ?>
                <?php echo $account->getError(Constants::$passwordInvalidCharacters, "passwordN"); ?>
                <?php echo $account->getError(Constants::$passwordsDoNoMatch, "passwordN"); ?>
            </div>

            <div class="input">
                <i class="fas fa-lock icon"></i>
                <input class="button1 inputLogin radius1" name="passwordN2" type="password" placeholder="" value="" required>
                <div class="placeholder">Potwierdź nowe hasło</div>
            </div>

            <button class='button2 buttonLogin radius1 linkHoverEffect' name='newPasswordButton'>Zmień hasło</button>

        </form>
    </div>
    <!--NEW PASSWORD END -->  

</div>

<style><?php require_once("assets/css/login.css"); ?></style>
<script>
    var show = <?php echo json_encode($show); ?>;
    show = "#"+show;
    //console.log(show);
    $(show).attr('style','display: block!important');

    <?php require_once("assets/js/login.js"); ?>
</script>
