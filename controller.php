<?php
require_once 'assets/partials/header.php';
require_once 'assets/database/database.php';
require_once 'assets/database/config.php'; // Includi il file config.php

use db\DB_PDO;

// Verifica che i dati siano stati inviati dal form correttamente
if(isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    // Connessione al database utilizzando le credenziali nel file di configurazione
    $pdoInstance = DB_PDO::getInstance($config); // Utilizza l'array $config definito nel file config.php
    $pdo = $pdoInstance->getConnection();

    // Query per verificare se l'email e la password corrispondono a quelle nel database
    $query = "SELECT * FROM user WHERE email = :email AND passW = :passW"; 
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'email' => $email,
        'passW' => $password
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user) {
        session_start();

        // se l'email corrisponde con questa qui, si tratta di un admin che potrà fare più cose di un utente normale
        if($email == 'Admin@admin.com'){
            $_SESSION['admin'] = true; 
        }

        // Utente autenticato con successo
        $_SESSION['logged_in'] = true; // Evitiamo di memorizzare email e password nella sessione per problemi di sicurezza
        header('Location: index.php');
        exit;
    } else {
        // Credenziali non corrette
        header('Location: login.php');
        exit;
    }
}
?>

<?php require_once 'assets/partials/footer.php'; ?>
