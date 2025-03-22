<?php
$titolo = "Inserisci utente - Segnalibro.it";
include "headeralto.php";
?>

<div class="accedidiv">
    <h2> Inserisci un nuovo utente </h2>

    <?php if (isset($_GET['error'])){ ?>
          <p class="error"> <?php echo $_GET['error'] ?> </p>
        <?php } ?> 

        
    <form action="insert_user.php" method="POST">
        <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Nome" name="nome" /> <br> <br>

        <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Cognome" name="cognome" /> <br> <br>

        <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Username" name="username" /> <br> <br>

        <input type="email" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Email" name="email" /> <br> <br>

        <input type="password" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Password" name="password" /> <br>

        <input type="hidden" name="amministratore" value="0" /> <br>

        <input type="submit" style=" cursor: pointer; color: white; background-color: #0f3f4b; border: 0.5px solid grey; padding: 10px; width: 130px; margin-bottom: 40px; " value="Inserisci">
    </form>
</div>



<?php include "footer.php"; ?>