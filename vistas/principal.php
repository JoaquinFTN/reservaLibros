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
        <main id="mainGesReservas">
            <h1>GESTIÓN DE RESERVAS</h1>
            <figure class="botones">
                <a href="#">
                    <img src="img/añadir.png" alt="Añadir">
                    <figcaption>AÑADIR</figcaption>
                </a>
            </figure>
            <figure class="botones">
                <a href="gestion.php">
                    <img src="img/listar.png" alt="Listar Todo">
                    <figcaption>LISTAR TODO</figcaption>
                </a>
            </figure>
            <form action="filtrar.php" method="post" class="formPrincipal">
                <fieldset>
                    <legend>
                        <img src="img/buscar.png" alt="lupa">
                        <h1>Buscar reserva</h1>
                    </legend>
                    <label>NOMBRE
                        <input type="text" name="nombre">
                    </label>
                    <label>ETAPA
                        <select name="etapa">
                            <option selected disabled></option>
                            <?php
                                for($i = 0; $i < count($etapas); $i++){
                                    echo '<option value="'.$etapas[$i]["idEtapa"].'">'.$etapas[$i]["nombreEtapa"].'</option>';
                                }
                            ?>
                        </select></label>
                    <label>CURSO
                        <select name="curso">
                            <option selected disabled></option>
                            <?php
                                for($i = 0; $i <count($clases); $i++){
                                    echo '<option value="'.$clases[$i]["codCurso"].'">'.$clases[$i]["nombreCurso"].'</option>';
                                }
                            ?>
                        </select></label>
                        <input type="submit" value="AÑADIR" >    
                </fieldset>
            </form>
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