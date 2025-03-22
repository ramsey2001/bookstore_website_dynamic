<?php
include "header.php";
include "functions.php";
$titolo = "Risultati - Segnalibro.it";

session_start();

$connessione = connetti();
if (!$connessione) {
    return false;
}

if (isset($_GET['id'])) {   //se ho scelto un libro cliccandoci
    $id = $_GET['id'];  //allora prendo il codice di quel brano in GET 

} else {
    header("Location:index.php");
    exit;
}


$id = mysqli_real_escape_string($connessione, $_GET['id']);
$query = "SELECT * FROM libro WHERE id = " . $id;
$result = mysqli_query($connessione, $query) or die("<a href='index.php'>Errore! Torna alla pagina di login</a>");

if (mysqli_num_rows($result) == 0) {
    echo "Nessun risultato!";
    exit;
}

$result = mysqli_query($connessione, $query) or die("<a href='index.php'>Errore! Torna alla pagina di login</a>");
$libro = mysqli_fetch_assoc($result);


?>

<div class="divlibro">

    <img src="immagini/copertina.jpeg" style="width: 270px; height: 400px; border: 0.5px solid rgb(205, 205, 205);">

</div>

<div class="divlibro1">

    <p style="font-size: 30px; display: inline;"> <strong> <?= $libro['titolo'] ?> </strong></p>

    <p style="font-size: 15px;"> di <strong> <?= $libro['autore'] ?> </strong> </p>

    <p style="font-size: 15px;"> <?= $libro['genere'] ?> </p> 

    <p style="font-size: 20px;"> <strong> <?= $libro['prezzo'] ?> € </strong> </p> <br>

    <p class="int3"> <strong> Descrizione </strong></p>
    <p style="font-size: 13px; "> <?= $libro['descrizione'] ?> </p>

</div>



<?php include "footer.php"; ?>