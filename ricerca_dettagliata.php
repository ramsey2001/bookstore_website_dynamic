<?php
$titolo = "Ricerca avanzata - Segnalibro.it";
include "headeralto.php";
session_start();

$connessione = connetti();
if (!$connessione) {
  return false;
}

?>

<form action="detailed_search.php" method="GET">
<h1 class="intestazione"> Effettua una ricerca avanzata </h1> 
<fieldset style="border: 0.5px solid grey; padding: 10px; width: 300px; margin-left: 170px; color: #0f3f4b;">
<legend> <strong> Genere </strong> </legend>
<input type="text" style="border: none; padding: 10px; width: 300px;" class="" placeholder="Romanzo, autobiografia..." name="genere_libro">
</fieldset>
<button type="submit" style=" cursor: pointer; color: white; background-color: #0f3f4b; margin-left: 170px; margin-top:10px; border: 0.5px solid grey; padding: 10px; width: 130px; margin-bottom: 40px;"> Cerca </button>





<?php include "footer.php"; ?>