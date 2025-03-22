<?php
include "headeralto.php";

$connessione = connetti();
if (!$connessione) {
    return false;
}

if (!isset($_GET['id'])) {
    // if nella get non sono presenti valori per la insert
    header("Location: index.php");
}

//leggo id in get e cancello RIGA
$query = "DELETE FROM `libro` WHERE id = $_GET[id]";

$result = mysqli_query($connessione, $query) or die;
header("Location: lista_libri.php");
