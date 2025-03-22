<?php

/* FORMAT CONNESSIONE AL DB CON MOSTRA ERRORE 
$connessione = mysqli_connect("localhost", "root", "", "libreria");
if(!$connessione) {
    $error = mysqli_error($connessione);
    die($error);
}; */

// ------------- funzione di connessione al server db
function connetti()
{
    $servername = "localhost";
    $db_user = "root";
    $db_psw = "root";
    $database = "libreria";

    $connessione = mysqli_connect($servername, $db_user, $db_psw, $database);
    return $connessione; // mi restituisce il risultato della variabile connessione che può essere utilizzato dopo
}



// -------------- funzione inserimento utente
function insert_user($nome, $cognome, $username, $email, $password, $amministratore)
{
    $connessione = connetti();
    if (!$connessione) {
        return false;
    }

    $query = "INSERT INTO utente (nome, cognome, username, email, password, amministratore) 
              VALUES ('$nome', '$cognome', '$username', '$email', '$password', '$amministratore')";

    $result = mysqli_query($connessione, $query);

    return $result; //lo restituisco perchè sarà poi chi utilizza la funzione insert_user
}



// -------------- funzione modifica utente
function update_user($nome, $cognome, $username, $email, $password, $id)
{

    $connessione = connetti();
    if (!$connessione) {
        return false;
    }

    

    $query = "UPDATE utente 
                    SET nome='$nome',
                        cognome='$cognome',
                        username='$username', 
                        email='$email', 
                        password='$password' WHERE id = '$id'";
                        
    $result = mysqli_query($connessione, $query);
    return $result;
}



// -------------- funzione modifica dati
function update_dati($nome, $cognome, $username, $email, $password)
{

    $connessione = connetti();
    if (!$connessione) {
        return false;
    }

    $query = "UPDATE utente 
                    SET nome='$nome',
                        cognome='$cognome',
                        username='$username', 
                        email='$email', password='$password' WHERE username = '$_SESSION[username]'";

    $result = mysqli_query($connessione, $query) or die;
   
}





// --------------- funzione trova username già esistente
function trova_username($username)
{
    $connessione = connetti();
    if (!$connessione) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM utente WHERE username = '$username'";

    $risultato = mysqli_query($connessione, $sql);

    if (mysqli_num_rows($risultato) > 0) { //mysqli_num_rows restituisce numero di stringhe 

        $riga = mysqli_fetch_assoc($risultato); //recupera un array associativo, una riga dei risultati

        $_SESSION['username'] = $riga['username'];
        $_SESSION['amministratore'] = $riga['amministratore'];

        mysqli_close($connessione);

        return $riga; //ritorno un array associativo che rappresenta la riga che soddisfa il mio criterio di ricerca

    } else {
        mysqli_close($connessione);

        return false;
    }
}




// --------------- funzione trova titolo già esistente
function trova_titolo($titolo)
{
    $connessione = connetti();
    if (!$connessione) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM libro WHERE titolo = '$titolo'";

    $risultato = mysqli_query($connessione, $sql);

    if (mysqli_num_rows($risultato) > 0) { //mysqli_num_rows restituisce numero di stringhe 

        $riga = mysqli_fetch_assoc($risultato); //recupera un array associativo, una riga dei risultati

        $_SESSION['titolo'] = $riga['titolo'];
        $_SESSION['autore'] = $riga['autore'];

        mysqli_close($connessione);

        return $riga; //ritorno un array associativo che rappresenta la riga che soddisfa il mio criterio di ricerca

    } else {
        mysqli_close($connessione);

        return false;
    }
}




// ------------------ funzione trova email già esistente
function trova_email($email)
{
    $connessione = connetti();
    if (!$connessione) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM utente WHERE email = '$email'";
    $risultato = mysqli_query($connessione, $sql);

    mysqli_close($connessione);

    return mysqli_num_rows($risultato) > 0; //mi restituisce una valore booleano (T se c'è l'email, F altrimenti)
    #se la query restituisce un numero di righe > 0 allora vuol dire che esiste già un utente con quell'email
}




// ------------------ funzione dati mancanti
function dati_obbligatori()
{
    return (isset($_POST["nome"]) && $_POST["nome"]

        && isset($_POST["cognome"]) && $_POST["cognome"]
        && isset($_POST["username"]) && $_POST["username"]
        && isset($_POST["email"]) && $_POST["email"]
        && isset($_POST["password"]) && $_POST["password"]);
}



// ------------------ funzione dati mancanti (libro)
function dati_obbligatori_libro()
{
    return (isset($_POST["titolo"]) && $_POST["titolo"]

        && isset($_POST["autore"]) && $_POST["autore"]
        && isset($_POST["prezzo"]) && $_POST["prezzo"]
        && isset($_POST["genere"]) && $_POST["genere"]
        && isset($_POST["descrizione"]) && $_POST["descrizione"]);
}



// ------------------ controllo log
function controlla_log()
{
    if (isset($_SESSION["username"])) {
    } else {
        header("Location: accedi.php");
    }
}




// -------------- funzione inserimento libro
function insert_book($titolo, $autore, $prezzo, $genere, $descrizione)
{
    $connessione = connetti();
    if (!$connessione) {
        return false;
    }

    $titolo = mysqli_real_escape_string($connessione, $_POST['titolo']);
    $autore = mysqli_real_escape_string($connessione, $_POST['autore']);
    $genere = mysqli_real_escape_string($connessione, $_POST['genere']);
    $descrizione = mysqli_real_escape_string($connessione, $_POST['descrizione']);

    $query = "INSERT INTO libro (titolo, autore, prezzo, genere, descrizione) 
              VALUES ('$titolo', '$autore', '$prezzo', '$genere', '$descrizione')";

    $result = mysqli_query($connessione, $query);

    return $result; //lo restituisco perchè sarà poi chi utilizza la funzione insert_book
}




// -------------- funzione modifica libro
function update_book($titolo, $autore, $prezzo, $genere, $descrizione, $id)
{

    $connessione = connetti();
    if (!$connessione) {
        return false;
    }

    $titolo = mysqli_real_escape_string($connessione, $_POST['titolo']);
    $autore = mysqli_real_escape_string($connessione, $_POST['autore']);
    $genere = mysqli_real_escape_string($connessione, $_POST['genere']);
    $descrizione = mysqli_real_escape_string($connessione, $_POST['descrizione']);

    $query = "UPDATE libro 
                    SET titolo='$titolo',
                        autore='$autore',
                        prezzo='$prezzo', 
                        genere='$genere', 
                        descrizione='$descrizione' WHERE id = '$id'";

    $result = mysqli_query($connessione, $query);
    return $result;
}
