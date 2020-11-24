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
        <script>
            function allowDrop(ev) {
                ev.preventDefault();
            }

            function drag(ev) {
                ev.dataTransfer.setData("p", ev.target.id);

            }

            function drop(ev) {
                ev.preventDefault();
                var data = ev.dataTransfer.getData("p");
                ev.target.appendChild(document.getElementById(data));
            }
        </script>
    </head>
    <body class="rosemary">
        <?php
        require_once '../Clases/PreguntaAux.php';
        session_start();
        //Comprobamos las sesiones y recogemos los tipos de preguntas disponibles
        if (isset($_SESSION['preguntasDisponiblesTexto'])) {
            $tipoTexto = $_SESSION['preguntasDisponiblesTexto'];
        }
        if (isset($_SESSION['preguntasDisponiblesNumerico'])) {
            $tipoNumerico = $_SESSION['preguntasDisponiblesNumerico'];
        }
        if (isset($_SESSION['preguntasDisponiblesUnaOpcion'])) {
            $tipoUnaOpcion = $_SESSION['preguntasDisponiblesUnaOpcion'];
        }
        if (isset($_SESSION['preguntasDisponiblesVariasOpciones'])) {
            $tipoVariasOpciones = $_SESSION['preguntasDisponiblesVariasOpciones'];
        }
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
                <aside class="col-md-2 col-sm-2 border-green overflow-auto pl-0 pr-0" style="max-height: 80vh;">
                    <nav class="navbar navbar-expand-lg navbar-light">


                        <!-- Collapse button -->
                        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> 

                        <!-- Collapsible content -->
                        <div class="collapse navbar-collapse" style="width: 100%;" id="navbarSupportedContent">

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
                                        <button class="btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaAddPreguntas" type="submit">Añadir preguntas&nbsp;<i class="fas fa-plus-circle"></i></button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="active btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaAddExamen" type="submit">Crear examen&nbsp;<i class="fas fa-file-medical"></i></button>
                                    </li>
                                    <hr>
                                </form>


                                <!--Accordion wrapper-->
                                <div class="accordion md-accordion w-100" id="accordionEx1" role="tablist" aria-multiselectable="true">

                                    <?php
                                    //Cargar preguntas de tipo texto
                                    if (isset($tipoTexto)) {
                                        ?>
                                        <!-- Card - TipoTexto -->
                                        <div class="card">

                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingTwo1">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
                                                   aria-expanded="false" aria-controls="collapseTwo1">
                                                    <h6 class="mb-0 text-success">
                                                        Preguntas de texto&nbsp;<i class="fas fa-angle-down rotate-icon"></i>
                                                    </h6>
                                                </a>
                                            </div>

                                            <!-- Card body -->
                                            <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1"
                                                 data-parent="#accordionEx1">
                                                <div class="card-body p-0 pl-2 pt-2 pr-2">
                                                    <?php
                                                    for ($i = 0; $i < sizeof($tipoTexto); $i++) {
                                                        $descripcion = $tipoTexto[$i]->getPregunta();
                                                        ?>
                                                        <p class="bg-success text-white"><?php echo $descripcion ?></p>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- Fin Card - Tipo Texto -->
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    //Cargar preguntas de tipo texto
                                    if (isset($tipoNumerico)) {
                                        ?>
                                        <!-- Accordion card -->
                                        <div class="card">

                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingTwo2">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo21"
                                                   aria-expanded="false" aria-controls="collapseTwo21">
                                                    <h6 class="mb-0 text-success">
                                                        Preguntas numéricas&nbsp;<i class="fas fa-angle-down rotate-icon"></i>
                                                    </h6>
                                                </a>
                                            </div>

                                            <!-- Card body -->
                                            <div id="collapseTwo21" class="collapse" role="tabpanel" aria-labelledby="headingTwo21"
                                                 data-parent="#accordionEx1">
                                                <div class="card-body p-0 pl-2 pt-2 pr-2">
                                                    <?php
                                                    for ($i = 0; $i < sizeof($tipoNumerico); $i++) {
                                                        $descripcion = $tipoNumerico[$i]->getPregunta();
                                                        ?>
                                                        <p class="bg-success text-white"><?php echo $descripcion ?></p>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    //Cargar preguntas de una sola opcion
                                    if (isset($tipoUnaOpcion)) {
                                        ?>
                                        <!-- Accordion card -->
                                        <div class="card">

                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingThree31">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31"
                                                   aria-expanded="false" aria-controls="collapseThree31">
                                                    <h6 class="mb-0 text-success">
                                                        Preguntas de una sola opción&nbsp;<i class="fas fa-angle-down rotate-icon"></i>
                                                    </h6>
                                                </a>
                                            </div>

                                            <!-- Card body -->
                                            <div id="collapseThree31" class="collapse" role="tabpanel" aria-labelledby="headingThree31"
                                                 data-parent="#accordionEx1">
                                                <div class="card-body p-0 pl-2 pt-2 pr-2">
                                                    <?php
                                                    for ($i = 0; $i < sizeof($tipoUnaOpcion); $i++) {
                                                        $descripcion = $tipoUnaOpcion[$i]->getPregunta();
                                                        ?>
                                                        <p class="bg-success text-white"><?php echo $descripcion ?></p>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Accordion card -->
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    //Cargar preguntas de tipo texto
                                    if (isset($tipoVariasOpciones)) {
                                        ?>
                                        <!-- Card - TipoTexto -->
                                        <div class="card">

                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingFour41">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseFour41"
                                                   aria-expanded="false" aria-controls="collapseFour41">
                                                    <h6 class="mb-0 text-success">
                                                        Preguntas de varias opciones&nbsp;<i class="fas fa-angle-down rotate-icon"></i>
                                                    </h6>
                                                </a>
                                            </div>

                                            <!-- Card body -->
                                            <div id="collapseFour41" class="collapse" role="tabpanel" aria-labelledby="headingFour41"
                                                 data-parent="#accordionEx1">
                                                <div class="card-body p-0 pl-2 pt-2 pr-2">
                                                    <?php
                                                    for ($i = 0; $i < sizeof($tipoVariasOpciones); $i++) {
                                                        $descripcion = $tipoVariasOpciones[$i]->getPregunta();
                                                        ?>
                                                        <p class="bg-success text-white"><?php echo $descripcion ?></p>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- Fin Card - Tipo Texto -->
                                        <?php
                                    }
                                    ?>
                                </div>
                                <!-- Accordion wrapper -->
                            </ul>

                            <!-- Links -->

                            <!-- CTA -->

                        </div>

                    </nav>
                </aside>

                <section class="col-md-10 col-sm-10 border-green vh-80 w-100 overflow-auto d-flex justify-content-center">

                    <img src="../img/add.png" id="add" style="width: 50px; height: 50px;">

                </section>
            </main>
            <footer class="row vh-10 background-green">
                <div class="col-sm-12 col-md-12 d-flex justify-content-center align-items-center">
                    <h3 class="">Made with <i class="fas fa-heart text-warning mx-1"></i> by Jorge y Alejandro</h3>
                </div>
            </footer>
        </div>
    </body>
</html>
