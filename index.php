<?php
    require './config/database.php';
    
    $db = new Database();
    $con = $db->conectar();

    $sql = $con->prepare("SELECT id_Categoria, Categoria FROM categorias");
    $sql->execute();
    $categorias = $sql->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = $con->prepare("SELECT id_Producto, Nombre_Producto , Precio , id_Categoria FROM productos");
    $sql2->execute();
    $productos= $sql2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/media.css">
    <link rel="stylesheet" href="./css/CyP-Carrusel.css">
    <title>El Buen Precio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
</head>
<body>

<!-- *************************************************************** -->
<!-- ****************** CABECERA DE LA WEB************************** -->
<!-- *************************************************************** -->
<header id="cajacabeceraa">
     <!-- Contactos -->
    <div id="cabecera1">
        <div class="contactos">
            <ul>
                <i class="fa-solid fa-headset" style="color: black; background-color: #FFB200;"></i>
                <li>+503 63234659</li>
                <i class="fa-regular fa-envelope" style="color: black; background-color: #FFB200;"></i>
                <li>elbuenprecio@gmail.com</li>
            </ul>
        </div>
        <nav class="redes">
            <!-- Redes sociales -->
                 <a href="#facebook"><i class="fa-brands fa-facebook-f" style="color: #ffffff; background-color: #297EFD;"></i></a>
                 <a href="#instagram"><i class="fa-brands fa-instagram" style="color: #ffffff; background-color: #F42BD4;"></i></a>
                 <a href="#twitter"><i class="fa-brands fa-twitter" style="color: #ffffff; background-color: #41D1FF;"></i></a>
        </nav>
    </div>
    <div id="cabecera2">
        <!-- Logotipo -->
        <figure id="logo">
            <a href="./index.php?idC=1"><img src="./img/logo.png" alt=""></a>
        </figure>

        <!-- Buscador de producto -->
        <input type="text" id="buscador" autocomplete="off" placeholder="Ingrese su búsqueda ..." required name="buscador">
        <i class="fa-sharp fa-solid fa-magnifying-glass" style="color: black; background-color: #FFB200;"></i>

        <!-- Datos almacenados del usuario -->
        <nav class="menu">
            <ul>
                <i class="fa-solid fa-user" style="color: black; background-color: #FFB200;"></i>
                <li><a href="#perfil">Perfil</a></li>
                <i class="fa-solid fa-bag-shopping" style="color: black; background-color: #FFB200;"></i>
                <li><a href="#pedidos">Pedidos</a></li>
                <i class="fa-solid fa-cart-shopping" style="color: black; background-color: #FFB200;"></i>
                <li><a href="#carrito">Carrito</a></li>
            </ul>
        </nav>
    </div>
    <div id="cabecera3">
        <nav class="info menu-h">
            <ul>
                <i class="fa-solid fa-bars"></i>
                <li><a href="#Acerca_nosotros">Acerca de nosotros</a></li>
                <li><a href="#Contacto">Contacto</a></li>
                <li><a href="#Ayuda">Ayuda</a></li>
            </ul>
        </nav>
    </div>
</header>
    <!-- Carrusel de productos que ofrecemos -->
    <div>
        <div class="P_ofrecemos" id="slick-list">
            <button class="slick-flecha slick-prev" id="button-prev" data-button="button-prev" onclick="app.processingButton(event)">
                <i class="fa-solid fa-chevron-left" style="color: white;"></i>
            </button>
            <div class="slick-track" id="track">
                <div class="slick imgenF">
                    <img src="./imagenes/CarruselSuperior/1.jpg" alt="Image">
                </div>
                <div class="slick imgenF">
                    <img src="./imagenes/CarruselSuperior/2.jpg" alt="Image">
                </div>
                <div class="slick imgenF">
                    <img src="./imagenes/CarruselSuperior/3.jpeg" alt="Image">
                </div>
                <div class="slick imgenF">
                    <img src="./imagenes/CarruselSuperior/4.jpg" alt="Image">
                </div>
            </div>
            <button class="slick-flecha slick-next" id="button-next" data-button="button-next" onclick="app.processingButton(event)">
                <i class="fa-solid fa-chevron-right" style="color: white;"></i>
            </button>
        </div>
    </div>
    <!-- Carousel de categorias -->
    <div class="Carousell">
        <div class="slick-list" id="slick-list">
            <button class="slick-arrow slick-prev" id="button-prev" data-button="button-prev" onclick="app.processingButton(event)">
                <i class="fa-solid fa-chevron-left" style="color: #000000;"></i>
            </button>
            <div class="slick-track" id="track">
                <?php foreach($categorias as $row) { ?>
                    <div class="slick">
                        <?php
                            $id = $row['id_Categoria'];
                            $imagen = "./imagenes/categorias/" . $id . "/main.png";
                            
                            if(!file_exists($imagen)){
                                $imagen = "./imagenes/error.png";
                            }
                        ?>
                        <div class="borde">
                            <h4><?php echo $row['Categoria']; ?></h4>
                            <a href="./index.php?idC=<?php echo $id; ?>#ancla" name="ancla">
                                <picture>
                                    <img loading="lazy" src="<?php echo $imagen; ?>" alt="Image">
                                </picture>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <button class="slick-arrow slick-next" id="button-next" data-button="button-next" onclick="app.processingButton(event)">
                <i class="fa-solid fa-chevron-right" style="color: #000000;"></i>
            </button>
        </div>
    </div>

    <!-- Carousel de productos -->
    <div class="Carousell Carousel-P">
        <div class="slick-list listaP fondo" id="slick-list">
            <?php foreach($categorias as $row) { ?>
                <?php if($row['id_Categoria'] == $_GET['idC']) { ?>
                    <div class="NameCat">
                        <h4><?php echo $row['Categoria']; ?></h4>
                    </div>
                <?php } ?>
            <?php } ?>
            <button class="slick-arrow arrow slick-prev" id="button-prev" data-button="button-prev" onclick="app.processingButton(event)">
                <i class="fa-solid fa-chevron-left" style="color: #000000;"></i>
            </button>
            <div class="slick-track" id="track">
                <?php foreach($productos as $row) { ?>
                    <?php if($row['id_Categoria'] == $_GET['idC']) { ?> 
                        <div class="slick picturP">
                            <?php
                                $id = $row['id_Producto'];
                                $imagen = "./imagenes/productos/" . $id . "/main.webp";
                                
                                if(!file_exists($imagen)){
                                    $imagen = "./imagenes/error.png";
                                }
                            ?>
                            <div>
                                <a href="./producto.php?idP=<?php echo $id; ?>">
                                    <picture>
                                        <img loading="lazy" src="<?php echo $imagen; ?>" alt="Image">
                                    </picture>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <button class="slick-arrow arrow slick-next" id="button-next" data-button="button-next" onclick="app.processingButton(event)">
                <i class="fa-solid fa-chevron-right" style="color: #000000;"></i>
            </button>
        </div>
    </div>

    <!-- Carruselpublicidad-->
    <div class="Carousell Carousel-P">
        <div class="slick-list listaP publicidad" id="slick-list">
            <button class="slick-flecha slick-prev" id="button-prev" data-button="button-prev" onclick="app.processingButton(event)">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <div class="slick-track" id="track">
                <div class="slick imgenPl">
                    <img src="./imagenes/CarruselPublicidad/p1.jpg" alt="Image">
                </div>
                <div class="slick imgenPl">
                    <img src="./imagenes/CarruselPublicidad/p2.jpg" alt="Image">
                </div>
                <div class="slick imgenPl">
                    <img src="./imagenes/CarruselPublicidad/p3.jpg" alt="Image">
                </div>
            </div>
            <button class="slick-flecha slick-next" id="button-next" data-button="button-next" onclick="app.processingButton(event)">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>


    <!-- Pie de Pagina -->
    <footer>
        <div class="secc1">
            <p id="secc1p1"><b>Sobre nosotros</b></p>
            <p id="nosotros">Somos una empresa con más de 20 años de recorrido al servicio 
                de la gente procurando dar siempre los precios más justos según 
                el mercado para mantener una dinámica de confianza con los clientes, 
                buscamos dar un impulso incorporando el uso de la tecnología para agilizar 
                y favorecer la atención al cliente y el trabajo a los empleados automatizando 
                procesos de pedidos y cuentas.</p>
        </div>
        <div class="secc2">
            <p id="secc2p1"><b>Contáctanos</b></p>
            <p id="direcc"><b>Dirección</b><p>
            <p id="secc2p2">Sonsonate,sonsonate calle principal casa#23</p>
            <p id="horario"><b>Horario de Atención</b><p>
            <p id="secc2p3">Lun - Sab: 8AM - 6:30PM<br>Dom: 8AM - 5:30PM</p>
            <p id="numt"><b>Número de Teléfono</b></p>
            <p id="secc2p4">Atención al Cliente: +503 63234659</p>
            <p id="correo"><b>Correo Electrónico</b></p>
            <p id="secc2p5">Atención al Cliente: elbuenprecio@gmail.com</p>
        </div>
        <div class="secc3">
            <p id="secc3p1"><b>Siguenos en</b></p>
            <nav class="redespp">
                <a href="#facebook"></a><i class="fa-brands fa-facebook-f iconoF"></i></a>
                <a href="#instagram"><i class="fa-brands fa-instagram iconoInst"></i></a>
                <a href="#twitter"><i class="fa-brands fa-twitter iconoT"></i></a>
            </nav>
            <p id="secc3p2"><b>Mantente informado</b></p>
            <div class="correocontenedor">
                <span class="icono">
                <i class="fa-regular fa-envelope"></i>
                </span>
                <input type="email" placeholder="Correo electronico" class="input-correo">
            </div>
            <button class="suscribete"><b>Suscribirte</b></button>
            <p id="secc3p3">* Suscríbase a nuestro boletín para recibir ofertas de descuentos anticipados, 
                actualizaciones e información sobre nuevos productos.</p>
            <p id="secc3p4"><b>Formas de Pago</b></p>
            <img id="agricola" src="./img/bancoagricola.jpg" alt="agricola">
            <img id="mastercard" src="./img/mastercard.jpg" alt="mastercard">
            <img id="visa" src="./img/visa.jpg" alt="visa">
        </div>
    </footer>
    <div class="copyright">
        <p>© 2023 El Buen Precio. Todos los derechos reservados.</p>
    </div>
    <script src="./js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>