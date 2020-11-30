<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Realizacion de examen</title>
        <!-- MDB icon -->
        <link rel="icon" href="" type="../image/x-icon">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="../css/mdb.min.css">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/fondos.css">
        <link rel="stylesheet" href="../css/tamanios.css">
        <link rel="stylesheet" href="../css/fuentes.css">
    </head>
    <body class="rosemary">
        <?php
        require_once '../Clases/User.php';
        require_once '../MVC/Examen.php';
        require_once '../MVC/PreguntaAux.php';
        require_once '../Clases/Pregunta.php';
        
        session_start();
        
        $user = $_SESSION['user'];
        $examen = $_SESSION['examen'];
        $respuestasExamen = $_SESSION['respuestasExamen'];
        $preguntasExamen = $_SESSION['preguntasExamen'];
        
        foreach ($respuestasExamen as $v) {
            echo $v->getTipo() . '<br>';
        }

        echo '-----------------------------------' . '<br>';

        foreach ($preguntasExamen as $k => $v) {
            echo 'La pregunta es: ' . $v->getPregunta() . ' y la respuesta correcta es: ' . $respuestasExamen[$k]->getRespuestaCorrecta() . ' y el tipo es: ' . $respuestasExamen[$k]->getTipo() . '<br>';
        }
        ?>
        
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light background-green">

            <div class="container-fluid">

                <a class="navbar-brand" href="#">
                    <img src="../img/logo.png" class="vh-10" alt="mdb logo">
                </a>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">

                    <!-- Links -->
                    <ul class="navbar-nav mr-auto offset-9 align-items-end text-right">
                        <li class="nav-item">
                            <a href="../controlador.php?Back=Back" class="btn btn-white btn-sm text-success">Cerrar sesion</a>
                        </li>
                    </ul>
                    <!-- Links -->

                </div>
                <!-- Collapsible content -->

            </div>

        </nav>
        <!--/.Navbar--> 
        
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-lg-10  col-md-12 text-right my-3 offset-lg-1">
                    <p>Bienvenido: <?= $user->getNombre() ?> <i class="fas fa-user"></i></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12 offset-lg-1 border shadow">
                    <div class="row my-2">
                        <div class="col text-center">
                            <h1> <?= $examen->getTitulo() ?> </h1>
                        </div>
                    </div>
                    <form action="../controladorAlumno.php">
                    <?php
                    
                    foreach ($preguntasExamen as $k => $v) {
//                        echo 'La pregunta es: ' . $v->getPregunta() . ' y la respuesta correcta es: ' . $respuestasExamen[$k]->getRespuestaCorrecta() . '<br>';
                            switch ($v->getTipo()) {
                                case 'texto':
                                    ?>
                                <div class="row my-3">
                                    <div class="col-lg-10 offset-1 border shadow p-2">
                                        <h1>Pregunta: <?= $v->getPregunta() ?> </h1>
                                        <h2>Tipo: <?= $v->getTipo() ?></h2>
                                        <textarea name="respuesta[]" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <?php
                                    break;
                                case 'numerico':
                                    ?>
                                <div class="row my-3">
                                    <div class="col-lg-10 offset-1 border shadow p-2">
                                        <h1>Pregunta: <?= $v->getPregunta() ?> </h1>
                                        <h2>Tipo: <?= $v->getTipo() ?></h2>
                                        <input type="number" name="respuesta[]" class="form-control" placeholder="Respuesta">
                                    </div>
                                </div>
                                <?php
                                    break;
                                case 'unaOpcion':
                                    ?>
                                <div class="row my-3">
                                    <div class="col-lg-10 offset-1 border shadow p-2">
                                        <h1>Pregunta: <?= $v->getPregunta() ?> </h1>
                                        <h2>Tipo: <?= $v->getTipo() ?></h2>
                                        <!--<input type="number" name="respuesta[]" class="form-control" placeholder="Respuesta">-->
                                        <div class="text-center">
                                            <input type="hidden" name="respuesta[]" value="">
                                            <input type="radio" class="mr-2" id="resp_opc_a" name="respuesta<?= $k ?>[]" value=" <?= $respuestasExamen[$k]->getRespuesta1() ?> ">
                                            <input type="text" name="op" class="" readonly value=" <?= $respuestasExamen[$k]->getRespuesta1() ?> ">
                                            <input type="radio" class="ml-2" id="resp_opc_b" name="respuesta<?= $k ?>[]" value=" <?= $respuestasExamen[$k]->getRespuesta2() ?> ">
                                            <input type="text" name="op" class="" readonly value=" <?= $respuestasExamen[$k]->getRespuesta2() ?> ">
                                        </div>
                                        <div class="text-center my-2">
                                            <input type="radio" class="mr-2" id="resp_opc_c" name="respuesta<?= $k ?>[]" value="<?= $respuestasExamen[$k]->getRespuesta3() ?>">
                                            <input type="text" name="op" class="" readonly value=" <?= $respuestasExamen[$k]->getRespuesta3() ?> ">
                                            <input type="radio" class="ml-2" id="resp_opc_d" name="respuesta<?= $k ?>[]" value=" <?= $respuestasExamen[$k]->getRespuesta4() ?> ">
                                            <input type="text" name="op" class="" readonly value=" <?= $respuestasExamen[$k]->getRespuesta4() ?> ">
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    break;
                                case 'variasOpciones':
                                    ?>
                                <div class="row my-3">
                                    <div class="col-lg-10 offset-1 border shadow p-2">
                                        <h1>Pregunta: <?= $v->getPregunta() ?> </h1>
                                        <h2>Tipo: <?= $v->getTipo() ?></h2>
                                        <!--<input type="number" name="respuesta[]" class="form-control" placeholder="Respuesta">-->
                                        <div class="text-center">
                                            <input type="checkbox" id="cbox2" value="<?= $respuestasExamen[$k]->getRespuesta1() ?>" name="respuesta<?= $k ?>[]"> <label for="cbox2"><?= $respuestasExamen[$k]->getRespuesta1() ?></label>
                                            <input type="checkbox" id="cbox2" value="<?= $respuestasExamen[$k]->getRespuesta2() ?>" name="respuesta<?= $k ?>[]"> <label for="cbox2"><?= $respuestasExamen[$k]->getRespuesta2() ?></label>
                                        </div>
                                        <div class="text-center my-2">
                                            <input type="checkbox" id="cbox2" value="<?= $respuestasExamen[$k]->getRespuesta3() ?>" name="respuesta<?= $k ?>[]"> <label for="cbox2"><?= $respuestasExamen[$k]->getRespuesta3() ?></label>
                                            <input type="checkbox" id="cbox2" value="<?= $respuestasExamen[$k]->getRespuesta4() ?>" name="respuesta<?= $k ?>[]"> <label for="cbox2"><?= $respuestasExamen[$k]->getRespuesta4() ?></label>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    break;

                                default:
                                    echo 'Error al cargar la pregunta';
                                    break;
                            }
                        ?>
                    
                    
                    
                        <?php
                        
                    }
                    
                    ?>
                    
                    <div class="row"> <!-- botones de entrega -->
                        <div class="col">
                            <a href="usuario.php" class="btn btn-outline-danger my-4 btn-block" type="submit">Cancelar</a>
                        </div>
                        <div class="col">
                            <button name="send_examen" class="btn btn-outline-success my-4 btn-block" type="submit">Entregar examen</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="container-fluid background-green">

            <!--Section: Content-->
            <section class="py-5 text-center white-text">

                <h3 class="">Made with <i class="fas fa-heart orange-text mx-1"></i> by Jorge y Alejandro</h3>

            </section>
            <!--Section: Content-->

        </div>
        
       <!-- SCRIPTS -->
        <!-- jQuery -->
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="../js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="../js/mdb.min.js"></script>
        <!-- Your custom scripts (optional) -->
        <script type="text/javascript" src="../js/registroValidacion_1.js"></script>    
    </body>
</html>
