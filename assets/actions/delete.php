<?php 
    require_once '../partials/header.php'; 
    require_once '../database/database.php';
    require_once '../database/gestioneUtentiDTO.php';
    require_once '../database/config.php';
    session_start();

    if($_SESSION['logged_in'] !== true) {
        header('Location: ../../login.php');
        exit;
    }

    if (!isset($_SESSION['admin']) && $_SESSION['admin'] == false){
        header('Location: ../../index.php');
        exit;
    }

    use db\DB_PDO;
    use GestioneUtentiDTO\Admin;

    $PDOConn = DB_PDO::getInstance($config);
    $conn = $PDOConn->getConnection();

    $utenti = new Admin ($conn);
?>

<main class="container mt-4 mb-5 ">
    <h1 class="fw-semibold">Pagina di eliminazione! <i class="bi bi-pencil-square"></i></h1>

    <section class="mt-4 py-3 border-top">
        <h3><a href="update.php" class="text-danger-emphasis me-2"><i class="bi bi-arrow-clockwise"></i></a>Utenti registrati</h3>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Ottieni tutti gli utenti dal database
                $result = $utenti->getAll();

                // Verifica se ci sono utenti
                if ($result) {
                    // Stampa ogni utente come riga nella tabella
                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row['id'] . "</th>";
                        echo "<td>" . $row['nameUser'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td><a href='updateForm.php?id=" . $row['id'] . "&nameUser=" . $row['nameUser'] . "' class='bg-danger text-light p-2 rounded-2 text-decoration-none'>E</a></td>";

                        echo "</tr>";
                    }
                } else {
                    // Nessun utente trovato
                    echo "<tr><td colspan='4'>Nessun utente trovato</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section class="mt-5 pt-4 border-top border-2 border-secondary">
        <h3>Sei nuovo? Non sai come funziona?</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut nulla eligendi iusto quos molestias molestiae, facere nesciunt. Quos, eaque a! Quam iusto dolorum tenetur eius magnam repellendus eligendi vitae quibusdam?</p>
    </section>
</main>


<?php require_once '../partials/footer.php'; ?>

