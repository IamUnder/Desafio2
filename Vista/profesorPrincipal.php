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
        require_once '../MVC/Examen.php';
        session_start();
        if (isset($_SESSION['allExamen'])) {
            $allExamen = $_SESSION['allExamen'];
            foreach ($allExamen as $v) {
                echo $v->getTitulo();
                echo $v->getFecha_fin() . '<br>';
            }
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
                                    <li class="nav-item justify-content-center">
                                        <button class="btn btn-outline-success w-100 border-green rounded
                                        <?php
                                        if ($_REQUEST['estado'] == 1) {
                                            echo 'active';
                                        }
                                        ?>
                                                " name="vistaExamenesActivados" type="submit">Ver exámenes activados&nbsp;<i class="fas fa-file-signature"></i></button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn btn-outline-success w-100 mt-1 border-green rounded
                                        <?php
                                        if ($_REQUEST['estado'] == 0) {
                                            echo 'active';
                                        }
                                        ?>
                                                " name="vistaExamenesDesactivados" type="submit">Ver exámenes desactivados&nbsp;<i class="fas fa-file-excel"></i></button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn btn-outline-success w-100 mt-1 border-green rounded
                                        <?php
                                        if ($_REQUEST['estado'] == 2) {
                                            echo 'active';
                                        }
                                        ?>
                                                " name="vistaExamenesRealizados" type="submit">Ver exámenes realizados&nbsp;<i class="fas fa-clipboard-check"></i></button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaAddPreguntas" type="submit">Añadir preguntas&nbsp;<i class="fas fa-plus-circle"></i></button>
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
                    <div class="row text-center">
                        <?php
                        $estado = $_REQUEST['estado'];
                        switch ($estado) {
                            case 0:
                                echo '<h1 class="font-weight-bold my-2 pb-2 text-center dark-grey-text">Examenes Desactivados</h1>';
                                break;
                            case 1:
                                echo '<h1 class="font-weight-bold my-2 pb-2 text-center dark-grey-text">Examenes Activados</h1>';
                                break;
                            case 2:
                                echo '<h1 class="font-weight-bold my-2 pb-2 text-center dark-grey-text">Examenes Realizados</h1>';
                                break;
                            default:
                                echo '<h1 class="font-weight-bold my-2 pb-2 text-center dark-grey-text">Error al recoger los datos</h1>';
                                break;
                        }
                        ?>
                    </div>
                    <div id="accordion" class="overflow-auto">
                        <?php
                        foreach ($allExamen as $k => $v) {
                            if ($v->getEstado() == $estado) {
                                ?>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn text-success" data-toggle="collapse" data-target="#collapse<?php echo $k; ?>" aria-expanded="true" aria-controls="collapse<?php echo $k; ?>">
                                                <?php
                                                echo $v->getTitulo();
                                                ?>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse<?php echo $k; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <form>
                                                <div class="container">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <input type="type" name="titulo" class="form-control mb-4" readonly value="<?php echo $v->getTitulo(); ?>">
                                                        </div>
                                                        <div class="col">
                                                            <input type="type" name="fecha_Inicio" class="form-control mb-4" readonly value="<?php echo $v->getFecha_Inicio(); ?>">
                                                        </div>
                                                        <div class="col">
                                                            <input type="type" name="fecha_Fin" class="form-control mb-4" readonly value="<?php echo $v->getFecha_Fin(); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="descripcion" rows="5" class="form-control" readonly><?php echo $v->getDescripcion(); ?></textarea>
                                                    </div>
                                                    <div class="form-group"> <!-- Boton de editar -->
                                                        <button type="submit" class="btn white btn text-success bg-light btn-sm-sm" name="ver_examen">Ver</button>
                                                        <?php
                                                        if ($v->getEstado() == 1) {
                                                            ?>
                                                            <button type="submit" class="btn white btn text-success bg-light btn-sm-sm" name="fin_examen">Finalizar Examen</button>
                                                            <?php
                                                        }
                                                        if ($v->getEstado() == 0 || $v->getEstado() == 1) {
                                                            ?>
                                                            <button type="submit" class="btn white btn text-success bg-light btn-sm-sm" name="estado_examen">Activar/Desactivar</button>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <button type="submit" class="btn white btn text-success bg-light btn-sm-sm" name="corregir_examen">Corregir</button>
                                                            <?php
                                                        }
                                                        ?>
                                                        <button type="submit" class="btn white btn text-danger bg-light btn-sm-sm" name="borrar_examen">Borrar</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
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
