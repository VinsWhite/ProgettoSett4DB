<?php
require_once '../partials/header.php'; 
require_once '../database/database.php';
require_once '../database/gestioneUtentiDTO.php';
require_once '../database/config.php';
session_start();

if($_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

use db\DB_PDO;
use GestioneUtentiDTO\Admin;

if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $PDOConn = DB_PDO::getInstance($config);
    $conn = $PDOConn->getConnection();

    $utenti = new Admin($conn);

    $result = $utenti->addUser($name, $email, $password);
}
?>

<main class="container mt-4 mb-5 ">
    <h1 class="fw-semibold">Pagina di aggiunta! <i class="bi bi-pencil-square"></i></h1>

    <section class="mt-4 py-3 border-top">
        <h3 class="ms-5">Aggiungi un nuovo utente!</h3>
        <form action="add.php" method="POST" enctype="multipart/form-data" class="mx-5 bg-body-secondary rounded-2 p-4 shadow">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Indirizzo Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Nome <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-secondary">Aggiungi</button>
            <?php 
                /* if(isset($_SESSION['add-user'])) {
                    if($_SESSION['add-user']) {
                        echo "
                            <div class='alert alert-warning' role='alert'>
                                Utente aggiunto con successo!
                            </div>";
                    } else {
                        echo "
                            <div class='alert alert-warning mt-4' role='alert'>
                                Errore durante l'aggiunta dell'utente.
                            </div>";
                    }
                } */
            ?>
        </form>
    </section>

    <section class="mt-5 pt-4 border-top border-2 border-secondary">
        <h3>Sei nuovo? Non sai come funziona?</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut nulla eligendi iusto quos molestias molestiae, facere nesciunt. Quos, eaque a! Quam iusto dolorum tenetur eius magnam repellendus eligendi vitae quibusdam?</p>
    </section>
</main>


<?php require_once '../partials/footer.php'; ?>

