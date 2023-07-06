<?php
  namespace app\models\constants;

  class Constants {

    //------------------------------REGISTER------------------------------------------
    public static $firstNameStrlen = "Twóje imię musi zawierać od 2 do 25 znaków";
    public static $lastNameStrlen = "Twóje nazwisko musi zawierać od 2 do 25 znaków";
    public static $usernameInvalidCharacters = "Dostępne: litery, cyfry, '_', oraz '-'";
    public static $usernameTaken = "Ten login jest już zajęty";
    public static $usernameStrlen = "Twój login musi zawierać od 4 do 25 znaków";
    public static $emailTaken = "Istnieje konto o podanym adresie email";
    public static $emailInvalid = "Twój email jest niepoprawy";
    public static $emailsDonNoMatch = "Adresy email nie są identyczne";
    public static $passwordStrlen = "Twoje hasło musi zawierać od 5 do 30 znaków";
    public static $passwordInvalidCharacters = "Twoje hasło musi zawierać cyfry";
    public static $passwordsDoNoMatch = "Podane hasła nie są identyczne";

    //------------------------------LOGIN--------------------------------------------
    public static $loginFailed = "Niepoprawny login lub hasło";

    //------------------------------RESET PASSWORD--------------------------------------------
    public static $resetPasswordEmail = "Niepoprawny E-mail";
    public static $resetPasswordTel = "Niepoprawny numer telefonu";

    //------------------------------NEW PASSWORD--------------------------------------------
    public static $newPassword = "Niepoprawne hasło";

  }
?>