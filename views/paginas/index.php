   <main class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>

    <?php include 'iconos.php'; ?>
    
    </main>

    <section class="seccion contenedor"> 
        <h2>Casas y Depas en Venta</h2>
        <?php 
            include 'listado.php';
        ?>

        <div class="alinear-derecha">
            <a href="/anuncios" class="boton-verde">Ver Todas</a>

        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario y un asesor se pondrá en contacto contigo.</p>
        <a href="/contacto" class="boton boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h2>Nuestro Blog</h2>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" alt="Texto Entrada Blog" src="build/img/blog1.jpg">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>1 de enero, 2023</span> por: <span>Admin</span></p>
                    <p> Consejos para construir una terraza en el techo de tu casa con los mejores 
                        materiales y ahorrando dinero.
                    </p>
                </a>
            </div>

        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" alt="Texto Entrada Blog" src="build/img/blog1.jpg">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>1 de enero, 2023</span> por: <span>Admin</span></p>
                    <p> Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y 
                        colores para darle vida a tu espacio
                    </p>
                </a>
            </div>

        </article>
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal se comportó de una manera excelente, muy buena atención y el proceso de compra fue muy rápido y fácil.
            </blockquote>
            <p>- Jose Malca</p>
        </div>

    </section>
    </div>