<?php

include "functions.php";

if(dati_obbligatori()){
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $username = $_POST["username"];

        if(!trova_username($username)){
            $password = $_POST["password"];
            $amministratore = $_POST["amministratore"];

            $email = $_POST["email"];
            if(!trova_email($email)){

                if(insert_user($nome,$cognome,$username,$email,$password,$amministratore)){
                    header("Location:accedi.php?avviso=Accedi con le tue credenziali appena registrate");

                } else {
                    header("Location:registrati.php?error=Errore");
                }

            } else {
                header("Location:registrati.php?error=Email già utilizzata");
            }

        } else {
            header("Location:registrati.php?error=Utente già esistente");
        }

} else {
    header("Location:registrati.php?error=Dati mancanti");
}

?>
