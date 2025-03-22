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
                    header("Location: listauser.php");
            
                } else {
                    header("Location:inserisci_utente.php?error=Errore");
                }

            } else {
                header("Location:inserisci_utente.php?error=Email già utilizzata");
            }

        } else {
            header("Location:inserisci_utente.php?error=Utente già esistente");
        }

} else {
    header("Location:inserisci_utente.php?error=Dati mancanti");
}

?>