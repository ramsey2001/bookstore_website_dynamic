<?php
include("functions.php");
session_start();


if (!isset($_SESSION["username"])) {
    if (
        isset($_POST["username"]) && $_POST["username"]
        && isset($_POST["password"]) && $_POST["password"]
    ) {
        $username = $_POST["username"];
        $trova_username = trova_username($username);

        if ($trova_username) {
            $password = $_POST["password"];
            if ($password == $trova_username["password"]) {
                header("Location: profilo.php");
                $_SESSION["username"] = $username;
            } else {
                header("Location:accedi.php?error=Password errata");
                session_destroy();
                exit;
            }
        } else {
            header("Location:accedi.php?error=Utente non trovato");
            session_destroy();
            exit;
        }
    } else {
        header("Location:accedi.php?error=Dati mancanti");
    }
} else {
    header("Location: profilo.php");
}
