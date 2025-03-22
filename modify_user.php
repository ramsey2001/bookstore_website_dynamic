<?php
include("functions.php");
session_start();

if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("ID mancante o non valido.");
} else {
    $id = intval($_POST['id']);
    echo "ID ricevuto tramite POST: " . $id; // Debug
}

    if (isset($_POST["nome"]) && $_POST["nome"]
        && isset($_POST["cognome"]) && $_POST["cognome"]
        && isset($_POST["username"]) && $_POST["username"]
        && isset($_POST["email"]) && $_POST["email"]
        && isset($_POST["password"]) && $_POST["password"]
        ) {
            $id = $_POST['id'];
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            $username = $_POST["username"];
            
            $trova_username = trova_username($username);

            if (!trova_username($username)) {
                $password = $_POST["password"];
                $email = $_POST["email"];

                if (!trova_email($email)) {
                    if (update_user($nome, $cognome, $username, $email, $password, $id)) {
                        header("Location: listauser.php");
                        exit;

                } else {
                    header("Location:modifica_utente.php?id=$id&error=Errore");
                    exit;
                }
            } else {
                header("Location:modifica_utente.php?id=$id&error=Email già usata");
                exit;
            }
        } else {
            header("Location:modifica_utente.php?id=$id&error=Utente già esistente");
            exit;
        }
    } else {
        header("Location:modifica_utente.php?id=$id&error=Dati mancanti");
    }

