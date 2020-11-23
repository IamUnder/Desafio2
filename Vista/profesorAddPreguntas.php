<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/fuentes.css">
        <link rel="stylesheet" href="../css/fondos.css">
        <link rel="stylesheet" href="../css/tamanios.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <title>Panel de profesorado</title>
    </head>
    <body class="rosemary">
        <?php
        require_once '../Clases/Pregunta.php';
        session_start();
        ?>
        <div class="container-fluid">
            <header class="row text-white background-green align-items-center">
                <div class="col-md-12 col-sm-12">
                    <!--Navbar-->
                    <nav class="navbar navbar-expand-lg navbar-light pt-0 pb-0">


                        <img src="../img/logo.png" alt="Logo_mamas2.0" class="img-fluid vh-10" />

                        <!-- Collapse button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Links -->
                        <div class="collapse navbar-collapse background-green" id="basicExampleNav">

                            <!-- Right -->
                            <ul class="navbar-nav offset-10">
                                <li class="nav-item">
                                    <button class="btn text-white btn-sm" type="button">Cambiar Rol</button>
                                </li>
                                <li class="nav-item">
                                    <a href="../controlador.php?Back=Back"><button class="btn text-white btn-sm" type="button">Cerrar Sesion</button></a>
                                </li>
                            </ul>

                        </div>


                    </nav>
                    <!--/.Navbar-->
                </div>
            </header>

            <main class="row">
                <aside class="col-md-2 col-sm-2 border-green">
                    <nav class="navbar navbar-expand-lg navbar-light">


                        <!-- Collapse button -->
                        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> 

                        <!-- Collapsible content -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <!-- Links -->
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link bt text-success" href="#">Ver exámenes activado</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bt text-success" href="#">Ver exámenes desactivados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bt text-success" href="#">Ver exámenes realizados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active bt text-success" href="#">Añadir preguntas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bt text-success" href="#">Crear examen</a>
                                </li>
                            </ul>
                            <!-- Links -->

                            <!-- CTA -->

                        </div>

                    </nav>
                </aside>
                <section class="col-md-10 col-sm-10 border-green vh-80">
                    <nav class="nav ml-3 align-items-center">
                        <h3>Tipo:</h3> 
                        <form action="../controladorProfesorPreguntas.php" name="prof_setPregunta">
                            <select name="tipo" class="ml-2">
                                <?php
                                if (isset($_SESSION['tipo'])) {
                                    $tipo = $_SESSION['tipo'];
                                    switch ($tipo) {
                                        case 'texto':
                                            ?>
                                            <option name="texto" value="texto" selected>Texto</option>
                                            <option name="numerico" value="numerico">Numérico</option>
                                            <option name="unaOpcion" value="unaOpcion">Una opción</option>
                                            <option name="variasOpciones" value="variasOpciones">Varias opciones</option>
                                            <?php
                                            break;
                                        case 'numerico':
                                            ?>
                                            <option name="texto" value="texto">Texto</option>
                                            <option name="numerico" value="numerico" selected>Numérico</option>
                                            <option name="unaOpcion" value="unaOpcion">Una opción</option>
                                            <option name="variasOpciones" value="variasOpciones">Varias opciones</option>
                                            <?php
                                            break;
                                        case 'unaOpcion':
                                            ?>
                                            <option name="texto" value="texto">Texto</option>
                                            <option name="numerico" value="numerico">Numérico</option>
                                            <option name="unaOpcion" selected>Una opción</option>
                                            <option name="variasOpciones" value="variasOpciones">Varias opciones</option>
                                            <?php
                                            break;
                                        case 'variasOpciones':
                                            ?>
                                            <option name="texto" value="texto">Texto</option>
                                            <option name="numerico" value="numerico">Numérico</option>
                                            <option name="unaOpcion" value="unaOpcion">Una opción</option>
                                            <option name="variasOpciones" value="variasOpciones" selected>Varias opciones</option>
                                            <?php
                                            break;
                                    }
                                } else {
                                    ?>
                                    <option name="texto" value="texto" selected>Texto</option>
                                    <option name="numerico" value="numerico">Numérico</option>
                                    <option name="unaOpcion" value="unaOpcion">Una opción</option>
                                    <option name="variasOpciones" value="variasOpciones">Varias opciones</option>   
                                    <?php
                                }
                                ?>

                            </select>
                            <button type="submit" name="crearPregunta" class="btn btn-outline-primary">Crear</button> 
                        </form>
                    </nav>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <form action="../controladorProfesorPreguntas.php" name="pregunta">
                                <tr>
                                    <td class="text-right"><label for="ta_pregunta">Descripción:</label></td>
                                    <td class="text-left"><textarea id="ta_pregunta" name="descripcion" rows="5" class="w-75"></textarea></td>
                                </tr>
                                <?php
                                if (isset($_SESSION['tipo'])) {
                                    $tipo = $_SESSION['tipo'];
                                    switch ($tipo) {
                                        case 'texto':
                                            ?>
                                            <tr>
                                                <td class="text-right"><label for="ta_resp_correcta_texto">Respuesta:</label></td>
                                                <td class="text-left"><textarea id="ta_resp_texto" name="ta_resp_correcta_texto" rows="5" class="w-75"></textarea></td>
                                            </tr>
                                            <?php
                                            break;
                                        case 'numerico':
                                            ?>
                                            <tr>
                                                <td class="text-right"><label for="resp_correcta_numerico">Respuesta:</label></td>
                                                <td class="text-left"><input type="number" id="resp_correcta_numerico" name="resp_correcta_numerico" class="w-75"></td>
                                            </tr>
                                            <?php
                                            break;
                                        case 'unaOpcion':
                                            ?>
                                            <tr>
                                                <td class="text-right"> <input type="radio" id="resp_opc_a" name="opcion" value="opc_a">
                                                    <input type="text" name="resp_a"></td>
                                                <td class="text-left"> <input type="radio" id="resp_opc_b" name="opcion" value="opc_b">
                                                    <input type="text" name="resp_b"></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"> <input type="radio" id="resp_opc_c" name="opcion" value="opc_c">
                                                    <input type="text" name="resp_c"></td>
                                                <td class="text-left"> <input type="radio" id="resp_opc_d" name="opcion" value="opc_d">
                                                    <input type="text" name="resp_d"></td>
                                            </tr>
                                            <?php
                                            break;
                                        case 'variasOpciones':
                                            ?>
                                            <tr>
                                                <td class="text-right">
                                                    <label><input type="checkbox" id="cboxa" name="cboxa">
                                                        <input type="text" name="resp_cbox_a"></label>
                                                </td>
                                                <td class="text-left">
                                                    <label><input type="checkbox" id="cboxb" name="cboxb">
                                                        <input type="text" name="resp_cbox_b"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <label><input type="checkbox" id="cboxc" name="cboxc">
                                                        <input type="text" name="resp_cbox_c"></label>
                                                </td>
                                                <td class="text-left">
                                                    <label><input type="checkbox" id="cboxd" name="cboxd">
                                                        <input type="text" name="resp_cbox_d"></label>
                                                </td>
                                            </tr>
                                            <?php
                                            break;
                                    }
                                } else {
                                    $_SESSION['tipo'] = 'texto';
                                    ?>
                                    <tr>
                                        <td class="text-right"><label for="ta_resp_correcta_texto">Respuesta:</label></td>
                                        <td class="text-left"><textarea id="ta_resp_texto" name="ta_resp_correcta_texto" rows="5" class="w-75"></textarea></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <button type="submit" name="addPregunta" class="btn btn-outline-success">Añadir pregunta</button>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </section>
            </main>

            <footer class="row vh-10 background-green">
                <div class="col-sm-12 col-md-12 d-flex justify-content-center align-items-center">
                    <h3 class="">Made by Jorge y Alejandro</h3>
                </div>
            </footer>
        </div>
    </body>
</html>
