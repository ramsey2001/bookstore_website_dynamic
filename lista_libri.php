<?php
$titolo = "Lista libri - Segnalibro.it";
include "headeralto.php";

session_start();

$connessione = connetti();
if (!$connessione) {
  return false;
}

?>


<a id="piu" href="inserisci_libro.php"><img class="icone" src="immagini/piu.jpeg"></a>
<br> <br>


<table>
  <tr style="color: #0f3f4b;">
    <th>ID</th>
    <th>Titolo</th>
    <th>Autore</th>
    <th>Prezzo</th>
    <th>Genere</th>
    <th>Descrizione</th>
    <th>OPERAZIONI</th>
  </tr>

  <?php

  $sql = "SELECT * FROM `libro`";
  $result = mysqli_query($connessione, $sql);


  foreach ($result as $riga) {   ?>


      <tr>
        <td>
          <?php echo $riga['id']; ?>
        </td>
        <td>
          <?php echo $riga['titolo']; ?>
        </td>
        <td>
          <?php echo $riga['autore']; ?>
        </td>
        <td>
          <?php echo $riga['prezzo']; ?> €
        </td>
        <td>
          <?php echo $riga['genere']; ?> 
        </td>
        <td style="width: 200px;">
          <?php echo $riga['descrizione']; ?> 
        </td>
        <td>
        <a href="modifica_libro.php?id=<?= $riga['id'] ?>"><img class="icone1" src="immagini/edit.jpg"></a>
        <a href="cancella_libro.php?id=<?= $riga['id'] ?>"><img class="icone1" src="immagini/cestino.jpg"></a>
        </td>
      </tr>

  <?php } ?>
</table>


