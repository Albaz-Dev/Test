<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scythe electronics</title>
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body>

<div id="header">
        <a href="index.html" class="site-name-link">
            <div class="site-name">
                <span class="brand-part1">Scythe</span>
                <span class="brand-part2">Electronics</span>
            </div>
        </a>
        <div class="nav-links">
            <a class="link-1" href="../index.php">Inicio</a>
            <a class="link-2"href="services.php">Servicios</a>
            <a class="link-3"href="contact.php">Contacto</a>
        </div>
    </div>

    <main>
        <section class="contact-section">
            <div class="contact-header">
                <h2>Contacto</h2>
                <p>Estamos aquí para ayudarte. Escríbenos y nos pondremos en contacto contigo pronto.</p>
            </div>
    
            <div class="contact-container">
                <form action="ruta-de-tu-script-de-procesamiento.php" method="post" id="contact-form">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="message">Mensaje:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                    
                    <input type="submit" value="Enviar">
                </form>
    
                <div class="contact-info">
                    <h3>Información de contacto</h3>
                    <p><strong>Dirección:</strong> Calle Principal, Ciudad </p>
                    <p><strong>Teléfono:</strong> +051 987 654 321</p>
                    <p><strong>Email:</strong> contacto@scythe-electronics.com</p>
    
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1950.8971111762573!2d-77.0391896723859!3d-12.057674843756681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c6b2532503%3A0x3007e35ec09cc19f!2sAv.%20Garcilaso%20de%20la%20Vega%201390%2C%20Lima%2015001!5e0!3m2!1ses-419!2spe!4v1695497576974!5m2!1ses-419!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
</body>
</html>