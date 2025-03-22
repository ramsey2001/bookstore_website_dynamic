<?php
$titolo = "Modifica libro - Segnalibro.it";
include "headeralto.php";
session_start();

$connessione = connetti();
if (!$connessione) {
  return false;
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
  die("ID mancante o non valido.");
} else {
  $id = intval($_GET['id']);
} 


?>

<div class="accedidiv">
  <h2> Modifica libro </h2>
  <form action="modify_book.php" method="POST">


  <?php if (isset($_GET['error'])){ ?>
          <p class="error"> <?php echo $_GET['error'] ?> </p>
        <?php } ?> 

        <?php if (isset($_GET['avviso'])){ ?>
          <p class="avviso"> <?php echo $_GET['avviso'] ?> </p>
        <?php } ?> 


    <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Titolo" name="titolo" /> <br> <br>

    <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Autore" name="autore" /> <br> <br>

    <input type="number" step="any" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Prezzo" name="prezzo" /> <br> <br>

    <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Genere" name="genere" /> <br> <br>

    <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Descrizione" name="descrizione" /><br> <br>

    <input type="hidden" name="id" value="<?= $_GET['id'] ?>"> 

    <input type="submit" style=" cursor: pointer; color: white; background-color: #0f3f4b; border: 0.5px solid grey; padding: 10px; width: 130px; margin-bottom: 40px; " value="Modifica">
  </form>
</div>


<?php

  include "footer.php"; 