<!DOCTYPE html>
<html lang="it">
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
         <li class="li1"> <a href="accedi.php" class="<?php if ($titolo=='Il mio profilo - Segnalibro.it') {echo 'active';} ?>"> <img class="icone" src="immagini/profilo.png" alt="accedi di Segnalibro.it" title="Accedi"> </a> </li>
         <li class="li1" > <a href="impostazioni.php" class="<?php if ($titolo=='Impostazioni - Segnalibro.it') {echo 'active';} ?>"> <img class="icone" src="immagini/impostazioni.png" alt="carrello di Segnalibro.it" title="Impostazioni"> </a> </li>
       </ul>
     </nav>


     <br/> <br/> <br/> <br/>  <br/> <br/> <br/> <br/> <br/> <br/> 


     <nav id="nav2">
      <form action="cerca.php" method="GET">
       <ul>
         <li class="li2"> <a href="index.php" class="<?php if ($titolo=='Home - Segnalibro.it') {echo 'active';} ?>" title="Home"> Home </a> </li>
         <li class="li2"> <a href="profilo.php" class="<?php if ($titolo=='Il mio profilo - Segnalibro.it') {echo 'active';} ?>" title="Profilo"> Profilo </a> </li>
         <input type="text" class="barracerca" placeholder="Cerca titolo" name="titolo_libro"><button type="submit" class="bottonecerca"><img style="width: 20px; margin-bottom: -5px;" src="immagini/ricerca.png"></button>
         <li class="li3"> <a href="ricerca_dettagliata.php" title="Ricerca"> Ricerca avanzata </a> </li>
       </ul>
     </nav> </form> <br/>
    </body>
    </html>

             
