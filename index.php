<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapStore - Tienda de Gorras</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/index_main.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php
    session_start();
    // Mostrar mensaje de bienvenida si existe
    if(isset($_SESSION['welcome_message'])) {
        echo '<script>alert("'.$_SESSION['welcome_message'].'");</script>';
        unset($_SESSION['welcome_message']);
    }
    ?>
    
    <header id="main-header">
        <div class="container">
            <div class="header-left">
                <a href="/E-commerce_Gorras/index.php" class="logo">
                    <img src="assets/images/logo.png" alt="">
                    <span>CapStore</span>
                </a>
                <nav class="main-nav">
                    <ul>
                        <li><a href="hombre.html">Hombres</a></li>
                        <li><a href="mujeres.html">Mujeres</a></li>
                        <li><a href="ninos.html">Niños</a></li>
                        <li><a href="ofertas.html">Ofertas</a></li>
                        <?php if(isset($_SESSION['usuario'])): ?>
                            <li><a href="/E-commerce_Gorras/pages/cuenta/perfil.html">Mi Perfil</a></li>
                            <li><a href="/E-commerce_Gorras/pages/cuenta/logout.php">Cerrar Sesión</a></li>
                        <?php else: ?>
                            <li><a href="/E-commerce_Gorras/pages/cuenta/login.html">Iniciar sesión</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>

            <div class="header-right">
                <div class="search-container">
                    <input type="text" placeholder="Buscar...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="cart-icon">
                    <a href="pages/cart.html">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="cart-count">0</span>
                    </a>
                </div>
                <?php if(isset($_SESSION['nombre'])): ?>
                    <div class="user-greeting">
                        ¡Hola, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
    
    <main>
        <div class="container2">
            <section class="principal" >
                <h2 class="principal-text" >Encuentra tu estilo perfecto</h2>
                
                <h3 class="description" >Descubre nuestra colección exclusiva de gorras para toda la familia. Encuentra la combinación perfecta de calidad, estilo y confort en un solo lugar, con diseños pensados para cada ocasión.</h3>
                    <div class="main_cap_container"> 
                        <img src="images/main_cap.webp" alt="main_cap" class="main_cap">
                    </div>

                </section>
        </div>

        <div class="container3">
        <section class="categorias">
    <h2 class="text-cat">Categorías</h2>
    <h3 class="des-cat">Explora nuestras colecciones para hombres, mujeres y niños</h3>

    <div class="categoria-contenedor">
        <div class="categoriad">
            <img src="images/sks.webp" alt="Hombres">
            <div class="texto-categoria">Hombres</div>
        </div>

        <div class="categoriad">
            <img src="images/61HYUuBDoUL._AC_UY1000_.jpg" alt="Mujeres">
            <div class="texto-categoria">Mujeres</div>
        </div>

        <div class="categoriad">
            <img src="images/Wekolf_sesiondeestudio_2830.webp" alt="Niños">
            <div class="texto-categoria">Niños</div>
        </div>
    </div>
</section>


   

                </section>
        </div>
        
        
    </main>
    
    <footer>
        <div class="container">
            <div class="footer-columns">
                <div class="footer-column">
                    <h3>Comprar</h3>
                    <ul>
                        <li><a href="hombre.html">Hombres</a></li>
                        <li><a href="mujeres.html">Mujeres</a></li>
                        <li><a href="ninos.html">Niños</a></li>
                        <li><a href="ofertas.html">Ofertas</a></li>

                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Ayuda</h3>
                    <ul>
                        <li><a href="/E-commerce_Gorras/info/contacto.html">Contacto</a></li>
                        <li><a href="/E-commerce_Gorras/info/envios.html">Envíos</a></li>
                        <li><a href="/E-commerce_Gorras/info/devoluciones.html">Devoluciones</a></li>
                        <li><a href="/E-commerce_Gorras/info/faq.html">Preguntas frecuentes</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Empresa</h3>
                    <ul>
                        <li><a href="/E-commerce_Gorras/info/nosotros.html"">Sobre nosotros</a></li>
                        <li><a href="/E-commerce_Gorras/info/tiendas.html"">Nuestras tiendas</a></li>
                        <li><a href="/E-commerce_Gorras/info/trabaja.html"">Trabaja con nosotros</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Suscríbete</h3>
                    <p>Recibe nuestras novedades y ofertas exclusivas</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Tu email">
                        <button type="submit">Suscribirse</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
               
                <div class="footer-links">
                    <a href="privacidad.html">Privacidad</a>
                    <a href="terminos.html">Términos</a>
                   
                </div>
            </div>
        </div>
    </footer>
    
    
    
    <script src="js/main.js"></script>
    <script src="js/products.js"></script>
</body>
</html>