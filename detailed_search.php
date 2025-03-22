<?php
include "headeralto.php";
$titolo = "Risultati - Segnalibro.it";

session_start();

$connessione = connetti();
if (!$connessione) {
    return false;
}


if (!isset($_GET['genere_libro']) && isset($_GET[""])) {

    $query = "SELECT * FROM libro";
    $result = mysqli_query($connessione, $query) or
        die("error");
} else if (isset($_GET['genere_libro'])) {
    $genere = mysqli_real_escape_string($connessione, $_GET['genere_libro']);
    $query = "SELECT * FROM libro WHERE genere like '%$genere%'";
    $result = mysqli_query($connessione, $query) or die("error");
}

if (mysqli_num_rows($result) == 0) {
    echo $errore = "<p class='int2'> Nessun risultato";
    exit;
}


?> 
<p class="int2"> Risultati per: <strong> <?php echo $_GET['genere_libro']; ?> (<?php echo mysqli_num_rows($result); ?>)</strong></p>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>


    <div class="divrisul">
        <p style="font-size: 18px; float:right; display:inline;"> <strong> <?= $row['prezzo'] ?> € </strong> </p>
        <a style="text-decoration: none; color: #0f3f4b;" href="libro.php?id=<?php echo $row['id'] ?>">
            <p style="font-size: 20px;"> <strong> <?= $row['titolo'] ?> </strong></p>
        </a>

        <p style="font-size: 13px;"> di <strong> <?= $row['autore'] ?> </strong> </p>
        <p style="font-size: 13px; padding-right: 120px;"> <?= $row['descrizione'] ?> </p>
    </div>
<?php } ?>





