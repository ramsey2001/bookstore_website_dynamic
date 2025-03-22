<?php
$titolo = "Lista utenti - Segnalibro.it";
include "headeralto.php";

session_start();

$connessione = connetti();
if (!$connessione) {
  return false;
}

?>


<a id="piu" href="inserisci_utente.php"><img class="icone" src="immagini/piu.jpeg"></a>
<br> <br>


<table>
  <tr style="color: #0f3f4b;">
    <th>ID</th>
    <th>Nome</th>
    <th>Cognome</th>
    <th>Username</th>
    <th>Email</th>
    <th>Password</th>
    <th>OPERAZIONI</th>
  </tr>

  <?php

  $sql = "SELECT * FROM `utente`";
  $result = mysqli_query($connessione, $sql);


  foreach ($result as $riga) {   ?>

      <tr>
        <td>
          <?php echo $riga['id']; ?>
        </td>
        <td>
          <?php echo $riga['nome']; ?>
        </td>
        <td>
          <?php echo $riga['cognome']; ?>
        </td>
        <td>
          <?php echo $riga['username']; ?>
        </td>
        <td>
          <?php echo $riga['email']; ?>
        </td>
        <td>
          <?php echo $riga['password']; ?>
        </td>
        <td>
          <?php if ($riga['amministratore'] != 1) { ?>
          <a href="modifica_utente.php?id=<?= $riga['id'] ?>"><img class="icone1" src="immagini/edit.jpg"></a>
          <a href="cancella_utente.php?id=<?= $riga['id'] ?>"><img class="icone1" src="immagini/cestino.jpg"></a> <?php } else {    // se la riga amministratore è diversa da 1 mostra il submit perche amministratori
                                                                                                                  ?> <?php } ?>
        </td>
      </tr>

  <?php } ?>
</table>



<?php include "footer.php"; ?>