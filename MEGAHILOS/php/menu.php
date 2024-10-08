<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand"><strong>Scythe Electronics</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarHeader">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link active">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="services.php" class="nav-link active">Tienda</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contacto</a>
                    </li>
                </ul>

                <a href="../php/pasarelapagos/checkout.php" class="btn btn-primary btn-sm me-2">
                <i class="fas fa-cart-shopping"></i> <span id="num_cart" class="badge bg-secondary">
                        <?php echo $num_cart; ?></span>
                </a>

                <?php if (isset($_SESSION['user_id'])) { ?>
                <div class="dropdown">
                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="btn_session"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> &nbsp;<?php echo $_SESSION['user_name']; ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btn_session">
                        <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </div>
                <?php } else { ?>
                <a href="loger.php" class="btn btn-success btn-sm"><i class="fas fa-user"></i> Ingresar</a>
                <?php } ?>
            </div>
        </div>
    </nav>
</header>