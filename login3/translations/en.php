<?php

/**
 * Please note: we can use unencoded characters like ö, é etc here as we use the html5 doctype with utf8 encoding
 * in the application's header (in views/_header.php). To add new languages simply copy this file,
 * and create a language switch in your root files.
 */

// login & registration classes
define("MESSAGE_ACCOUNT_NOT_ACTIVATED", "A fiókod még nincs aktiválva. Kérlek nyist meg a linket a visszaigazoló emailben.");
define("MESSAGE_CAPTCHA_WRONG", "Hibás captcha!");
define("MESSAGE_COOKIE_INVALID", "Hibás sütik");
define("MESSAGE_DATABASE_ERROR", "Adatbázis kapcsolati hiba.");
define("MESSAGE_EMAIL_ALREADY_EXISTS", "Ez az email már regisztrálva van. Kérlek használd a \"Elfelejtett jelszó\"  oldalt ha elfelejtetted a jelszavad.");
define("MESSAGE_EMAIL_CHANGE_FAILED", "Sajnos az email változtatás sikertelen volt.");
define("MESSAGE_EMAIL_CHANGED_SUCCESSFULLY", "Az email változtatás sikeres volt, az új email ");
define("MESSAGE_EMAIL_EMPTY", "Email nem lehet üres");
define("MESSAGE_EMAIL_INVALID", "Az email címed nem elfogadható formátumú");
define("MESSAGE_EMAIL_SAME_LIKE_OLD_ONE", "Az új email címed megegyezik a régivel. Kérlek válassz másikat.");
define("MESSAGE_EMAIL_TOO_LONG", "Email nem lehet 64 karakternél hosszabb");
define("MESSAGE_LINK_PARAMETER_EMPTY", "Üres link adat");
define("MESSAGE_LOGGED_OUT", "Sikeresen kijelentkeztél.");
// The "login failed"-message is a security improved feedback that doesn't show a potential attacker if the user exists or not
define("MESSAGE_LOGIN_FAILED", "Kijelenetkezés sikertelen");
define("MESSAGE_OLD_PASSWORD_WRONG", "A RÉGI jelszavad hibás volt.");
define("MESSAGE_PASSWORD_BAD_CONFIRM", "Jelszó és ismételt jelszó nem egyezik meg");
define("MESSAGE_PASSWORD_CHANGE_FAILED", "Sajnos a jelszó csere sikertelen volt.");
define("MESSAGE_PASSWORD_CHANGED_SUCCESSFULLY", "Jelszó sikeresen megváltoztatva!");
define("MESSAGE_PASSWORD_EMPTY", "Jelszó mező üres volt");
define("MESSAGE_PASSWORD_RESET_MAIL_FAILED", "Jelszó visszaállító mailt nem sikerült elküldeni! HIBA: ");
define("MESSAGE_PASSWORD_RESET_MAIL_SUCCESSFULLY_SENT", "A jelszó visszaállító mail sikeresen el lett küldve!");
define("MESSAGE_PASSWORD_TOO_SHORT", "A jelszónak legalább 6 karakter hosszúnak kell lennie");
define("MESSAGE_PASSWORD_WRONG", "Hibás jelszó. Próblkozz újra.");
define("MESSAGE_PASSWORD_WRONG_3_TIMES", "Hibás jelszót adtál meg 3 vagy több alkalmmal. Kérlek várja 30 másodpercet, majd próbálkozz újra.");
define("MESSAGE_REGISTRATION_ACTIVATION_NOT_SUCCESSFUL", "Sajnos itt nincs ilyen azonosító/visszaigazoló kód páros...");
define("MESSAGE_REGISTRATION_ACTIVATION_SUCCESSFUL", "Sikeres aktiválás! Most már bejelentkezhetsz!");
define("MESSAGE_REGISTRATION_FAILED", "Sajnos a regisztráció sikertelen volt. Kérlek menj vissza és próbáld meg újra.");
define("MESSAGE_RESET_LINK_HAS_EXPIRED", "A visszaállító linked lejárt. Kérlek használd a visszaállító linked egy órán belül.");
define("MESSAGE_VERIFICATION_MAIL_ERROR", "Sajnos nem tudtunk neked visszaállító mailt küldeni. A fiókod NEM lett létrehozva.");
define("MESSAGE_VERIFICATION_MAIL_NOT_SENT", "Visszaigazoló mail NEM lett elküldve! HIBA: ");
define("MESSAGE_VERIFICATION_MAIL_SENT", "A fiókod sikeresen létre lett hozva és küldtünk egy emailt. Kérlek kattints az emailben a visszaigazoló linkre!");
define("MESSAGE_USER_DOES_NOT_EXIST", "Ez a felhasználó nem létezik");
define("MESSAGE_USERNAME_BAD_LENGTH", "A felhasználónév nem tartalmazhat kettőnél kevesebb vagy 64-nél több karaktert");
define("MESSAGE_USERNAME_CHANGE_FAILED", "Sajnos az átnevezés sikertelen volt");
define("MESSAGE_USERNAME_CHANGED_SUCCESSFULLY", "A felhasználóneved sikeresen megváltozott. Az új felhasználóneved ");
define("MESSAGE_USERNAME_EMPTY", "A felhasználónév mező üres volt");
define("MESSAGE_USERNAME_EXISTS", "Sajnos ez a fehasználónév már foglalt. Kérlek válassz egy másikat.");
define("MESSAGE_USERNAME_INVALID", "A felhasználónév nem illeszkedi a név sémára: csak a-Z és számok engedélyezettek, 2 és 64 karakter között");
define("MESSAGE_USERNAME_SAME_LIKE_OLD_ONE", "A megadott felhasználónév megegyezik a régivel. Kérlek válassz egy új felhasználónevet.");

// views
define("WORDING_BACK_TO_LOGIN", "Vissza a kezdő oldalra");
define("WORDING_CHANGE_EMAIL", "Email megváltoztatása");
define("WORDING_CHANGE_PASSWORD", "Jelszó megváltoztatása");
define("WORDING_CHANGE_USERNAME", "Felhasználónév megváltoztatása");
define("WORDING_CURRENTLY", "jelenleg");
define("WORDING_EDIT_USER_DATA", "Felhasználói adatok módosítása");
define("WORDING_EDIT_YOUR_CREDENTIALS", "Be vagy jelentkezve és itt szerkesztheted az adataidat");
define("WORDING_FORGOT_MY_PASSWORD", "Elfelejtettem a jelszavam");
define("WORDING_LOGIN", "Bejelentkezés");
define("WORDING_LOGOUT", "Kijelentkezés");
define("WORDING_NEW_EMAIL", "Őj email");
define("WORDING_NEW_PASSWORD", "Új jelszó");
define("WORDING_NEW_PASSWORD_REPEAT", "Ismételt jelszó");
define("WORDING_NEW_USERNAME", "Új felhasználónév (felhasználónév nem lehet üres és azAZ09 és 2-64 karakternek hossz között kell lennie)");
define("WORDING_OLD_PASSWORD", "A RÉGI jelszavad");
define("WORDING_PASSWORD", "Jelszó");
define("WORDING_PROFILE_PICTURE", "Profil képed (gravatarról):");
define("WORDING_REGISTER", "Regisztráció");
define("WORDING_REGISTER_NEW_ACCOUNT", "Új fiók létrehozása");
define("WORDING_REGISTRATION_CAPTCHA", "Kérlek add meg ezeket a karaktereket");
define("WORDING_REGISTRATION_EMAIL", "Felhasználó emailje (kérlek valós emailt addj meg, egy visszaigazoló emailt fogsz kapni egy aktiváló linkkel)");
define("WORDING_REGISTRATION_PASSWORD", "Jelszó (legalább 6 karakter!)");
define("WORDING_REGISTRATION_PASSWORD_REPEAT", "Ismételt jelszó");
define("WORDING_REGISTRATION_USERNAME", "Felhasználónév (csak betűk és számok, 2 és 64 karakter hossz között)");
define("WORDING_REMEMBER_ME", "Tarts bejelentkezve (2 hétig)");
define("WORDING_REQUEST_PASSWORD_RESET", "Jelszó visszaállítás kérése. Add meg a felhasználóneved és küldünk egy mailt további utasításokkal:");
define("WORDING_RESET_PASSWORD", "A jelszavam visszaállítása");
define("WORDING_SUBMIT_NEW_PASSWORD", "Új jelszó elküldése");
define("WORDING_USERNAME", "Felhasználónév");
define("WORDING_YOU_ARE_LOGGED_IN_AS", "Bejelentkezve ");
