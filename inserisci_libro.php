<?php
$titolo = "Inserisci libro - Segnalibro.it";
include "headeralto.php";
?>

<div class="accedidiv">
    <h2> Inserisci un nuovo libro </h2>

    <?php if (isset($_GET['error'])){ ?>
          <p class="error"> <?php echo $_GET['error'] ?> </p>
        <?php } ?> 

        
    <form action="insert_book.php" method="POST">
        <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Titolo del libro" name="titolo" /> <br> <br>

        <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Autore" name="autore" /> <br> <br>

        <input type="number" step="any" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Prezzo" name="prezzo" /><br> <br>

        <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Genere" name="genere" /><br> <br>
        
        <input type="text" style="border: 0.5px solid grey; padding: 10px; width: 300px;" placeholder="Descrizione" name="descrizione" /><br> <br>

        <input type="submit" style=" cursor: pointer; color: white; background-color: #0f3f4b; border: 0.5px solid grey; padding: 10px; width: 130px; margin-bottom: 40px;" value="Inserisci">
    </form>
</div>




<?php include "footer.php"; ?>