<?php
$titolo = "Accedi - Segnalibro.it";
include "headeralto.php";

session_start();
    if(!isset($_SESSION["username"])){
?>

<html>
  <body>
    <div class="accedidiv"> 
        <br> <br>
        <a style="margin: 10px; font-size: 12px;" href="accedi.php" class="<?php if ($titolo=='Accedi - Segnalibro.it') {echo 'active';} ?>">Accedi</a>|<a style="margin: 10px; font-size: 12px;" href="registrati.php" class="<?php if ($titolo=='Registrati - Segnalibro.it') {echo 'active';} ?>">Registrati</a> 
        <h3 style="color: #0f3f4b;"> Accedi </h3>
        <p style="color: #0f3f4b; font-size: 14px; margin-top: -10px; margin-bottom: 20px;"> con il social che preferisci </p>
          <a class="ima" href="https://it-it.facebook.com/"><img src="immagini/facebook.png" style="width: 40px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 20px; margin-right: 10px;"></a>
          <a class="ima" href="https://www.google.com/intl/it/account/about/"><img src="immagini/google.png" style="width: 40px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 20px; margin-left: 10px;"></a>
        <p style="color: #0f3f4b; font-size: 14px;  "> oppure con le tue credenziali </p>

        <?php if (isset($_GET['error'])){ ?>
          <p class="error"> <?php echo $_GET['error'] ?> </p>
        <?php } ?> 

        <?php if (isset($_GET['avviso'])){ ?>
          <p class="avviso"> <?php echo $_GET['avviso'] ?> </p>
        <?php } ?> 
        
        <form action="accesso.php" method="POST">
          <input type="text" style="border: 0.5px solid grey; border-radius: 5px; padding: 8px; width: 300px; font-size: 11px;" placeholder="Username" name="username"/> <br> <br>

          <input type="password" style="border: 0.5px solid grey; border-radius: 5px; padding: 8px; width: 300px; font-size: 11px;" placeholder="Password" name="password"/> <br> <br> <br>
          <input type="submit" style=" cursor: pointer; color: white; background-color: #0f3f4b; border: 0.5px solid grey; padding: 10px; width: 130px; margin-bottom: 40px; border-radius: 5px; " value="Accedi">
        </form>
    </div>
  </body>
</html>

<?php

    } else {
      header("Location: profilo.php");
    }

?>












<?php include "footer.php"; ?>