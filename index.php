<?php
    require_once 'assets/partials/header.php';
    session_start();

    if($_SESSION['logged_in'] !== true) { // se il valore non è uguale a true, indirizzerà di nuovo nel form di login
        header('Location: login.php');
        exit;
    }

    
?>

<main class="container mt-4 mb-5 ">
    <h1 class="fw-semibold">Bentornato!</h1>

    <section class="mt-4 py-3 border-top">
        <h3>Cosa vuoi fare?</h3>
            <div class="container text-center mt-3">
                <div class="row align-items-start">
                    <a href="assets/actions/read.php" class="col bg-dark p-3 border-end azioni-1 text-decoration-none text-light">VISUALIZZA UTENTI</a>
                   
                    <a href="assets/actions/add.php" class="col bg-dark p-3 border-end azioni-1 text-decoration-none text-light">AGGIUNGI UTENTI</a>

                    <a href="assets/actions/delete.php" class="col bg-danger p-3 border-end azioni-2 text-decoration-none text-light">CANCELLA UTENTI</a>
     
                    <a href="assets/actions/update.php" class="col bg-dark p-3 azioni-1 text-decoration-none text-light">MODIFICA UTENTI</a>
     
                </div>
            </div>
    </section>

    <section class="mt-5 pt-4 border-top border-2 border-secondary">
        <h3>Sei nuovo? Non sai come funziona?</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut nulla eligendi iusto quos molestias molestiae, facere nesciunt. Quos, eaque a! Quam iusto dolorum tenetur eius magnam repellendus eligendi vitae quibusdam?</p>
    </section>
</main>
    
<?php require_once 'assets/partials/footer.php'; ?>