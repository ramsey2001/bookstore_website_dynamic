<?php

include "functions.php";

if(dati_obbligatori_libro()){
    $titolo = $_POST["titolo"];
    $autore = $_POST["autore"];

        if(!trova_titolo($titolo)){
            $prezzo = $_POST["prezzo"];
            $genere = $_POST["genere"];
            $descrizione = $_POST["descrizione"];

                if(insert_book($titolo,$autore,$prezzo, $genere, $descrizione)){
                    header("Location: lista_libri.php");
            
                } else {
                    header("Location:inserisci_libro.php?error=Errore");
                }

        } else {
            header("Location:inserisci_libro.php?error=Titolo già esistente");
        }

} else {
    header("Location:inserisci_libro.php?error=Dati mancanti");
}

?>