<?php
$titolo = "Modifica utente - Segnalibro.it";
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
  <h2> Modifica utente </h2>
  <form action="modify_user.php" method="POST">

  <?php if (isset($_GET['error'])){ ?>
          <p class="error"> <?php echo $_GET['error'] ?> </p>
        <?php } ?> 

        <?php if (isset($_GET['avviso'])){ ?>
          <p class="avviso"> <?php echo $_GET['avviso'] ?> </p>
        <?php } ?> 

       
    
    <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Nome" name="nome" /> <br> <br>

    <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Cognome" name="cognome" /> <br> <br>

    <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Username" name="username" /> <br> <br>

    <input type="email" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Email" name="email" /> <br> <br>

    <input type="password" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Password" name="password" /> <br> <br>

    <input type="hidden" name="id" value="<?= $_GET['id'] ?>"> 

    <input type="submit" style=" cursor: pointer; color: white; background-color: #0f3f4b; border: 0.5px solid grey; padding: 10px; width: 130px; margin-bottom: 40px; " value="Modifica">
  </form>
</div>

<?php 

include "footer.php"; ?> 