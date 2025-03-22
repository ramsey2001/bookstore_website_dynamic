<?php
include("functions.php");
session_start();

if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("ID mancante o non valido.");
} else {
    $id = intval($_POST['id']);
    echo "ID ricevuto tramite POST: " . $id; // Debug
}

    if (isset($_POST["titolo"]) && $_POST["titolo"]
        && isset($_POST["autore"]) && $_POST["autore"]
        && isset($_POST["prezzo"]) && $_POST["prezzo"]
        && isset($_POST["genere"]) && $_POST["genere"]
        && isset($_POST["descrizione"]) && $_POST["descrizione"]
        ) {
            $id = $_POST['id'];
            $titolo = $_POST["titolo"];
            $autore = $_POST["autore"];
            $prezzo = $_POST["prezzo"];
            
            $trova_titolo = trova_titolo($titolo);

            if (!trova_titolo($titolo)) {
                $genere = $_POST["genere"];
                $descrizione = $_POST["descrizione"];

                    if (update_book($titolo, $autore, $prezzo, $genere, $descrizione, $id)) {
                        header("Location: lista_libri.php");
                        exit;

                } else {
                    header("Location:modifica_libro.php?id=$id&error=Errore");
                    exit;
                }

        } else {
            header("Location:modifica_libro.php?id=$id&error=Titolo già esistente");
            exit;
        }

    } else {
        header("Location:modifica_libro.php?id=$id&error=Dati mancanti");
    }

