<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gestión de reservas</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <header>
            <div>
                <img src="img/logotipo.png" alt="Logo de la escuela">
            </div>
            <nav>
                <a href="">HOME</a>
                <a href="index.php">RESERVAS</a>
                <p id="gestion">GESTIÓN LIBROS</p>
                <div id="submenu">
                    <a href="#lib">LIBROS</a>
                    <a href="#stc">STOCK</a>
                </div>
            </nav>
        </header>
        <main id="gestionReservas">
            <h1>LISTADO DE RESERVAS</h1>
            <?php
                for($i=0; $i< count($dato); $i++) {
                echo '<hr/>
                <div class="tarjeta" id="'.$dato[$i]["idReserva"].'">
                    <div class="img"></div>
                    <div>
                        <ul>
                            <li><p>NOMBRE Y APELLIDOS</p>
                                <ul>
                                    <li><p>'.$dato[$i]["nombre"].', '.$dato[$i]["apellidos"].'</p></li>
                                </ul>
                            </li>
                            <li><p>CURSO</p>
                                <ul>
                                    <li><p>'.$dato[$i]["codCurso"].'</p></li>
                                </ul>
                            </li>
                            <li><p>LIBRO</p>
                                <ul>
                                    <li><p>'.$dato[$i]["titulo"].'</p></li>
                                </ul>
                            </li>
                            <li><p>FECHA RESERVA</p>
                                <ul>
                                    <li><p>'.$dato[$i]["fechaReserva"].'</p></li>
                                </ul>
                            </li>
                            <li><p>FECHA ENTREGA</p>
                                <ul>
                                    <li><p>'.$dato[$i]["fechaEntrega"].'</p></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <form action="">
                        <p id="numero">'.$dato[$i]["idReserva"].'<p>
                        <div>
                            <textarea name="observaciones" placeholder="Observaciones"></textarea>
                            <button type="submit">NOTIFICAR</button>
                        </div>
                        <div>
                            <button type="submit">RECHAZAR</button>
                            <button type="submit">VERIFICAR</button>
                            <button type="submit">ENTREGADO</button>
                        </div>
                    </form>
                </div>
                <p id="resultado'.$dato[$i]["idReserva"].'"></p>';}
            ?>
            <script src="script.js"></script>
        </main>
        <footer>
            <div class="lineaFooter">
                <h3>Contactar</h3>
                <p>C/ Corte de Peleas, 79 06009 Badajoz</p>
                <p>+34 924 25 17 61</p>
            </div>
            <div class="lineaFooter">
                <h3>Colaboradores</h3>
                <ul>
                    <li>Álvaro Gómez</li>
                    <li>Celia Moruno Herrojo</li>
                    <li>Joaquín Telo</li>
                    <li>Miriam López</li>
                </ul>        
            </div>
            <div>
                <a href="">Políticas Cookies</a>
                <a href="">Términos de condiciones</a>
            </div>
        </footer>
    </body>
</html>