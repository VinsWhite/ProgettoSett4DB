<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-fluid">
            <?php
            // Determino il percorso dell'immagine in base alla pagina corrente
            $homeUrl = basename($_SERVER['PHP_SELF']) == 'index.php' || basename($_SERVER['PHP_SELF']) == 'login.php' ? 'index.php' : '../../index.php';
            ?>
    <a class="navbar-brand fw-bold text-uppercase" href="<?php echo $homeUrl; ?>">
            <?php
            // Determino il percorso dell'immagine in base alla pagina corrente
            $imagePath = basename($_SERVER['PHP_SELF']) == 'index.php' || basename($_SERVER['PHP_SELF']) == 'login.php' ? 'assets/img/corporate-user-icon.webp' : '../img/corporate-user-icon.webp';
            ?>
            <img src="<?php echo $imagePath; ?>" alt="Logo" width="24" height="24" class="d-inline-block align-text-top">
            Gestione
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Aiuto</a>
                 </li>
            </ul>
            <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') { 
                echo "<a href='logout.php' class='text-decoration-none text-dark fw-semibold border border-2 p-1'>Esci</a>";
            }
            ?>
        </div>
    </div>
</nav>