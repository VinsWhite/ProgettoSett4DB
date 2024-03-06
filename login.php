<?php 
    require_once 'assets/partials/header.php';
    session_start();

    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        header('Location: index.php');
        exit;
    }

    session_destroy();
?>

<main class="container my-4 d-flex justify-content-center align-items-center" style="height: 80vh;">
    <form action="controller.php" method="POST" enctype="multipart/form-data" class="w-75 bg-body-secondary rounded-2 p-4 shadow">
        <h1>Accedi alla tua area personale! <i class="bi bi-person-fill"></i></h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Indirizzo Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Non condivideremo mai la tua email con nessuno.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Ricordami</label>
        </div>
        <button type="submit" class="btn btn-secondary">Accedi</button>
    </form>
</main>

<?php require_once 'assets/partials/footer.php'; ?>