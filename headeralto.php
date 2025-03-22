<?php

include "functions.php";
  
?>

<!DOCTYPE html>
<html lang="it">
  <html>
   <head>
     <meta charset= "utf-8"/>
     <meta name="keywords" content="libreria online, libri, libri per univerità, libri scolastici"/>
     <meta name="description" content="Libreria Online, Sito web di: Segnalibro.it, la tua libreria online"/>
     <meta name="author" content="Ramona Orsi"/>
     <link rel="stylesheet" type="text/css" href="style.css"/>
     <title> <?php echo $titolo; ?> </title>
   </head>
   <body>
     <header>
       <a href="index.php"> <img id="logo" src="immagini/logo.svg" alt="logo della pagina web Segnalibro.it" title="Logo di Segnalibro.it"> </a>
     </header>

     <nav id="nav1">
       <ul>
         <li class="li1"> <a href="accedi.php" class="<?php if ($titolo=='Accedi - Segnalibro.it') {echo 'active';} ?>"> <img class="icone" src="immagini/profilo.png" alt="accedi di Segnalibro.it" title="Accedi"> </a> </li>
         <li class="li1" > <a href="impostazioni.php" class="<?php if ($titolo=='Impostazioni - Segnalibro.it') {echo 'active';} ?>"> <img class="icone" src="immagini/impostazioni.png" alt="carrello di Segnalibro.it" title="Impostazioni"> </a> </li>
       </ul>
     </nav>


     <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> 

             
