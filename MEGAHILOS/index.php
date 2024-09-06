<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEGAHILOS S.A.C</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/382f57ddc0.js" crossorigin="anonymous"></script>
    <link rel="stylSCYesheet" href="css/index.css">

</head>
<body>

        <header>
            <div class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a href="#" class="navbar-brand">
                        <strong>MEGAHILOS S.A.C</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#navbarHeader" aria-controls="navbarHeader" 
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class= "collapse navbar-collapse" id="navbarHeader">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link active">Inicio</a>
                            </li>

                            <li class="nav-item">
                                <a href="pages/services.php" class="nav-link ">Tienda</a>
                            </li>

                            <li class="nav-item">
                                <a href="pages/contact.php" class="nav-link ">Contacto</a>
                            </li>
                        </ul>

                        <a href="php/pasarelapagos/checkout.php" class="btn btn-primary btn-sm me-2">
                            carrito <span id="num_cart" class="badge bg-secondary"><i class="fa-sharp fa-solid fa-cart-shopping"></i>  <?php echo $num_cart; ?></span>

                        </a>

                        <?php if (isset($_SESSION['user_id'])) { ?>
                            <div class="dropdown">
                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="btn_session" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i> &nbsp;<?php echo $_SESSION['user_name']; ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btn_session">
                                    <li><a class="dropdown-item" href="pages/logout.php">Cerrar sesión</a></li>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <a href="pages/loger.php" class="btn btn-success btn-sm"><i class="fas fa-user"></i> Ingresar</a>
                        <?php } ?>

                        
                    </div>
                </div>
            </div>
        </header>       

        <!-- Hero (cabecera grande) -->
        <div class="hero-section text-center text-white py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('media/mainimg.png') no-repeat center center; background-size: cover;">
            <div class="container my-5">
            <h1 class="display-3">Descubre lo último en hilos de alta calidad</h1>
            <p class="lead my-3">Explora nuestra amplia selección de hilos importados para todas tus necesidades de tejido y confección</p>
            <a href="pages/services.php" class="btn btn-primary btn-lg">Descubre Más</a>
            </div>
        </div>

        <section class="about-section py-5">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <!-- Asegúrate de incluir el logo de Scythe Electronics aquí -->
                    <img src="media/index_logo.png" alt="Scythe Electronics Logo" class="img-fluid">
                </div>
                <div class="col-lg-6">
                    <div class="about-text bg-dark text-white p-4 rounded">
                    <h2>MEGAHILOS S.A.C</h2>
                    <p>Brindamos una gran variedad de hilos para la industria textil. Nuestros productos son seleccionados para ofrecerte la más alta calidad de trabajo.</p>
                    <p class="mb-0">"Innovamos para llevarte lo mejor en producto textil a tu negocio ".</p>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <div class="products-section py-5 bg-light">
            <div class="container">
            <h2 class="text-center mb-5">Productos Destacados</h2>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="media/carrusel/1/carousel01.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="media/carrusel/1/carousel02.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="media/carrusel/1/carousel03.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>
        </div>

        
        <!-- Footer -->
        <footer class="footer bg-dark text-white pt-4 pb-2">
            <div class="container">
                <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>MEGAHILOS S.A.C</h5>
                    <p>Descubre la mas alta calidad de productos de hilo y poliester</p>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                    <li><a href="index.php" class="text-white">Inicio</a></li>
                    <li><a href="pages/services.php" class="text-white">Tienda</a></li>
                    <li><a href="pages/contact.php" class="text-white">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Síguenos</h5>
                    <a href="#" class="text-white me-2">
                    <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white me-2">
                    <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white me-2">
                    <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-white me-2">
                    <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                </div>
                <div class="text-center py-3 border-top border-secondary">
                <small>© 2023 MEGAHILOS S.A.C. Todos los derechos reservados.</small>
                </div>
            </div>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>