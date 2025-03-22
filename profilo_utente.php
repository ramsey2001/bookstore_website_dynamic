<?php
$titolo = "Il mio profilo - Segnalibro.it";
include "header.php";

include "functions.php";
session_start();

if (isset($_SESSION["username"])) { //if non è loggato

?>

    <?php

    $username = $_SESSION["username"];
    $trova_username = trova_username($username);

    if ($trova_username["amministratore"] == 1) {   //se l'utente è un amministratore allora ruolo = amministratore
        $ruolo = "Amministratore";
    } else {
        $ruolo = "Utente";  //se l'utente non era un amministratore = 0 allora ruolo = utente normale
    }


    ?>

    <html>

    <body>

        <nav class="navprofilo">
            <a style="color: #0f3f4b; text-decoration: none;" href="impostazioni.php"> Impostazioni </a> <br> <br>
            <a style="color: #0f3f4b; text-decoration: none;" href="logout.php"> Logout </a> <br> <br>
        </nav>

        <h2 class="intestazione2"> I miei dati </h2>
        <article class="boxprof">
            <div class="boxprofilo">
                <p> <b> Informazioni personali </b> </p>
                <p style="font-size: 14px;"> <?= $trova_username["nome"] ?> </p>
                <p style="font-size: 14px;"> <?= $trova_username["cognome"] ?> </p>
                <p style="font-size: 14px;"> <?= $trova_username["username"] ?> </p>
            </div>

            <div class="boxprofilo">
                <p> <b> Email </b> </p>
                <p style="font-size: 14px;"> <?= $trova_username["email"] ?> </p>
                <p> <b> Password </b> </p>
                <p style="font-size: 14px;"> <?= $trova_username["password"] ?> </p>
            </div>

            <div class="boxprofilo">
                <p> <b> Ruolo </b> </p>
                <p style="font-size: 14px;"> <?= $ruolo ?> </p>
            </div>
        </article>





    </body>

    </html>

<?php

} else {
    header("Location: accedi.php");
}


?>


<?php include "footer.php"; ?>