<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/custom-style.css">
    <?php
    // Determina il percorso dell'icona dell'header in base alla pagina corrente
    $iconPath = basename($_SERVER['PHP_SELF']) == 'index.php' || basename($_SERVER['PHP_SELF']) == 'login.php' ? 'assets/img/corporate-user-icon.webp' : '../img/corporate-user-icon.webp';
    ?>
    <link rel="icon" href="<?php echo $iconPath; ?>">
    <title>Gestione utenti</title>
</head>
<body>

    <header>
        <?php require_once 'navbar.php'; ?>
    </header>
