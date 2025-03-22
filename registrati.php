<?php
$titolo = "Registrati - Segnalibro.it";
include "headeralto.php";

session_start();
if (!isset($_SESSION["username"])) {
?>

  <div class="accedidiv">
    <br> <br>
    <a style="margin: 10px;  font-size: 12px; " href="accedi.php" class="<?php if ($titolo == 'Accedi - Segnalibro.it') {
                                                        echo 'active';
                                                      } ?>">Accedi</a>|<a style="margin: 10px; font-size: 12px;" href="registrati.php" class="<?php if ($titolo == 'Registrati - Segnalibro.it') {
                                                                                                                                echo 'active';
                                                                                                                              } ?>">Registrati</a>
    <h3> Sei nuovo? Registrati </h3>
    <p style="color: #0f3f4b; font-size: 14px; margin-top: -10px; margin-bottom: 20px;"> con il social che preferisci </p>
    <a class="ima" href="https://it-it.facebook.com/"><img src="immagini/facebook.png" style="width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 20px; margin-right: 10px;"></a>
    <a class="ima" href="https://www.google.com/intl/it/account/about/"><img src="immagini/google.png" style="width: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius: 20px; margin-left: 10px;"></a>
    <p style="color: #0f3f4b; font-size: 14px;"> oppure registrati creando il tuo profilo </p>

    <?php if (isset($_GET['error'])){ ?>
          <p class="error"> <?php echo $_GET['error'] ?> </p>
        <?php } ?> 
        

    <form action="register.php" method="POST">
      <input type="text" style="border: 0.2px solid grey; border-radius: 5px; padding: 8px; width: 300px; font-size: 11px;" placeholder="Nome" name="nome" /> <br> <br>

      <input type="text" style="border: 0.5px solid grey; border-radius: 5px; padding: 8px; width: 300px; font-size: 11px;" placeholder="Cognome" name="cognome" /> <br> <br>

      <input type="text" style="border: 0.5px solid grey; border-radius: 5px; padding: 8px; width: 300px; font-size: 11px;" placeholder="Username" name="username" /> <br> <br>

      <input type="email" style="border: 0.5px solid grey; border-radius: 5px; padding: 8px; width: 300px; font-size: 11px;" placeholder="Email" name="email" /> <br> <br>

      <input type="password" style="border: 0.5px solid grey; border-radius: 5px; padding: 8px; width: 300px; font-size: 11px;" placeholder="Password" name="password" /> <br>

      <input type="hidden" name="amministratore" value="0" /> <br>

      <p style="color: grey; font-size: 10px; padding-left: 50px; padding-right: 50px;"> Con la presente registrazione dichiaro di aver letto e accettato le <u> condizioni d’uso </u> di Segnalibro.it, le <u> condizioni generali di vendita </u> e l'<u>informativa privacy</u>.</p>
      <input type="submit" style=" cursor: pointer; color: white; background-color: #0f3f4b; border: 0.5px solid grey; padding: 10px; width: 130px; margin-bottom: 40px; " value="Registrati">
    </form>
  </div>
  </body>
<br>
  </html>

<?php

} else {
  header("Location: profilo.php");
}

?>



