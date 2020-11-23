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

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">


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


                        <img src="../img/logo.png" alt="Logo_mamas2.0" class="vh-10" />

                        <!-- Collapse button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Links -->
                        <div class="collapse navbar-collapse background-green" id="basicExampleNav">

                            <!-- Right -->
                            <ul class="navbar-nav offset-10">
                                <li class="nav-item mr-1">
                                    <a href="../controlador.php?Estado=Profesor"><button class="btn white btn text-success bg-light btn-sm-sm" type="button">Cambiar Rol</button></a>
                                </li>
                                <li class="nav-item">
                                    <a href="../controlador.php?Back=Back"><button class="btn white btn text-success bg-light btn-sm-sm" type="button">Cerrar Sesion</button></a>
                                </li>
                            </ul>

                        </div>


                    </nav>
                    <!--/.Navbar-->
                </div>
            </header>

            <main class="row">
                <aside class="col-md-2 col-sm-2 border-green pl-0 pr-0">
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
                                <form action="../controlador.php" name="menu" method="POST">
                                    <li class="nav-item">
                                        <button class="btn btn-outline-success w-100 border-green rounded" name="vistaExamenesActivados" type="submit">Ver exámenes activados&nbsp;<i class="fas fa-file-signature"></i></button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaExamenesDesactivados" type="submit">Ver exámenes desactivados&nbsp;<i class="fas fa-file-excel"></i></button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaExamenesRealizados" type="submit">Ver exámenes realizados&nbsp;<i class="fas fa-clipboard-check"></i></button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="active btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaAddPreguntas" type="submit">Añadir preguntas&nbsp;<i class="fas fa-plus-circle"></i></button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaAddExamen" type="submit">Crear examen&nbsp;<i class="fas fa-file-medical"></i></button>
                                    </li>
                                </form>
                            </ul>
                            <!-- Links -->

                            <!-- CTA -->

                        </div>

                    </nav>
                </aside>
                <section class="col-md-10 col-sm-10 border-green vh-80 w-100">
                    <nav class="nav ml-3 align-items-center mt-1">
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

                    <form action="../controladorProfesorPreguntas.php" name="pregunta">
                        <div class="w-100 text-center mt-3">
                            <h3>Descripción</h3>
                            <textarea id="ta_resp_texto" name="descripcion" rows="5" class="w-50"></textarea>
                        </div>
                        <?php
                        if (isset($_SESSION['tipo'])) {
                            $tipo = $_SESSION['tipo'];
                            switch ($tipo) {
                                case 'texto':
                                    ?>
                                    <div class="w-100 text-center">
                                        <h3>Respuesta</h3>
                                        <textarea id="ta_resp_texto" name="ta_resp_correcta_texto" rows="5" class="w-50"></textarea>
                                    </div>
                                    <?php
                                    break;
                                case 'numerico':
                                    ?>
                                    <div class="w-100 text-center">
                                        <h3>Respuesta</h3>
                                        <input type="number" id="resp_correcta_numerico" name="resp_correcta_numerico" class="w-50">
                                    </div>
                                    <?php
                                    break;
                                case 'unaOpcion':
                                    ?>
                                    <div class="w-100 text-center">
                                        <h3>Seleccione la respuesta correcta</h3>
                                        <input type="radio" class="mr-2" id="resp_opc_a" name="opcion" value="opc_a">
                                        <input type="text" name="resp_a">
                                        <input type="radio" class="ml-2" id="resp_opc_b" name="opcion" value="opc_b">
                                        <input type="text" name="resp_b">
                                    </div>
                                    <div class="w-100 text-center mt-2">
                                        <input type="radio" class="mr-2" id="resp_opc_c" name="opcion" value="opc_c">
                                        <input type="text" name="resp_c">
                                        <input type="radio" class="ml-2" id="resp_opc_d" name="opcion" value="opc_d">
                                        <input type="text" name="resp_d">
                                    </div>
                                    <?php
                                    break;
                                case 'variasOpciones':
                                    ?>
                                    <div class="w-100 text-center">
                                        <h3>Seleccione las respuestas correctas</h3>
                                        <label class="mr-2"><input type="checkbox" id="cboxa" name="cboxa">
                                            <input type="text" name="resp_cbox_a"></label>
                                        <label class="ml-2"><input type="checkbox" id="cboxb" name="cboxb">
                                            <input type="text" name="resp_cbox_b"></label>
                                    </div>
                                    <div class="w-100 text-center">
                                        <label class="mr-2"><input type="checkbox" id="cboxc" name="cboxc">
                                            <input type="text" name="resp_cbox_c"></label>
                                        <label class="ml-2"><input type="checkbox" id="cboxd" name="cboxd">
                                            <input type="text" name="resp_cbox_d"></label>
                                    </div>
                                    <?php
                                    break;
                            }
                        } else {
                            $_SESSION['tipo'] = 'texto';
                            ?>
                            <div class="w-100 text-center">
                                <h3>Respuesta</h3>
                                <textarea id="ta_resp_texto" name="ta_resp_correcta_texto" rows="5" class="w-50"></textarea>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="w-100 text-center mt-3">
                            <button type="submit" name="addPregunta" class="btn btn-outline-success">Añadir pregunta</button>
                        </div>
                    </form>

                </section>
            </main>

            <footer class="row vh-10 background-green">
                <div class="col-sm-12 col-md-12 d-flex justify-content-center align-items-center">
                    <h3 class="">Made with <i class="fas fa-heart text-warning mx-1"></i> by Jorge y Alejandro</h3>
                </div>
            </footer>
        </div>
        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
</html>
