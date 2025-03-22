<?php
$titolo = "Home - Segnalibro.it";
include "header.php";
include "functions.php";

session_start();

$connessione = connetti();
if (!$connessione) {
  return false;
}

$query = "SELECT * FROM libro";
$result = mysqli_query($connessione, $query) or
  die("Errore");
?>

<img style="width: 1100px; display: block; text-align:center; margin:0px auto;" src="immagini/imgindex.png" title="index">
<br> <br>

<h1 class="intestazione"> Novità della settimana </h1>
<p class="int2"> Scegli la tua prossima lettura </p>

<div class="vetrina">

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>

    <div class="card">
      <img class="imgvetrina" src="immagini/copertina.jpeg" title="libro" alt="libro in vetrina"> <br /> <br />
      <a href="libro.php?id=<?php echo $row['id'] ?>" class="titololibro"> <strong> <?= $row['titolo'] ?> </strong> </p> </a>
      <p class="autore"> di <strong> <?= $row['autore'] ?> </strong> </p>
      <p class="prezzo"> <?= $row['prezzo'] ?> € </p>
    </div>

  <?php } ?>

</div>
