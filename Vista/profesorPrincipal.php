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
        <title>Panel de Profesorado</title>
        <!-- MDB icon -->
        <link rel="icon" href="" type="../image/x-icon">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/fondos.css">
        <link rel="stylesheet" href="../css/tamanios.css">
        <link rel="stylesheet" href="../css/fuentes.css">
    </head>
    <body class="rosemary">
        <?php
        require_once '../Clases/Pregunta.php';
        require_once '../Clases/User.php';
        require_once '../MVC/Examen.php';
        session_start();
        $user = $_SESSION['user'];
        if (isset($_SESSION['allExamen'])) {
            $allExamen = $_SESSION['allExamen'];
//            foreach ($allExamen as $v) {
//                echo $v->getTitulo();
//                echo $v->getFecha_fin() . '<br>';
//            }
        }
        ?>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light background-green py-0">

            <div class="container-fluid">

                <img src="../img/logo.png" alt="Logo_mamas2.0" class="vh-10" />

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">

                    <!-- Links -->
                    <ul class="navbar-nav mr-auto offset-9 align-items-end text-right">
                        <?php
                        if ($user->getRol() == 2) {
                            ?>
                            <li class="nav-item mr-1">
                                <a href="../controlador.php?Estado=Profesor" class="btn white btn text-success bg-light btn-sm-sm">Cambiar rol</a>
                            </li>
                            <?php
                        }
                        ?>

                        <li class="nav-item">
                            <a href="../controlador.php?Back=Back" class="btn white btn text-success bg-light btn-sm-sm">Cerrar sesion</a>
                        </li>
                    </ul>
                    <!-- Links -->

                </div>
                <!-- Collapsible content -->

            </div>

        </nav>
        <!--/.Navbar--> 


        <main class="container-fluid vh-80">
            <div class="row">
                <aside class="col-md-2 col-sm-2 border-green pl-0 pr-0">
                    <nav class="navbar navbar-expand-lg navbar-light my-2">


                        <!-- Collapse button -->
                        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> 

                        <!-- Collapsible content -->
                        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">

                            <!-- Links -->
                            <ul class="nav flex-column">
                                <form action="../controlador.php" name="menu" method="POST">
                                    <li class="nav-item">
                                        <button class="btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaEditProfile" type="submit">Editar Perfil&nbsp;<i class="fas fa-user"></i></button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="active btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaExamenesRealizados" type="submit">Ver examenes&nbsp;<i class="fas fa-file-signature"></i></button>
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
                <section class="col-md-10 col-sm-10 border-green vh-80 overflow-auto">
                    <div class="row">
                        <div class="col-lg-10  col-md-12 text-right my-3 offset-lg-1">
                            <p>Bienvenido: <?= $user->getNombre() ?> <i class="fas fa-user"></i></p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-lg-5 col-sm-12 offset-lg-1 align-self-center">
                            <h1 class="text-left">Listado de Examenes</h1>
                        </div>
                        <div class="col-lg-5 col-sm-12">
                            <div class="accordion" id="accordionExample">
                                <div class="card z-depth-0 border-success">
                                    <div class="card-header " id="headingOne">
                                        <h5 class="mb-0 text-right">
                                            <button class="border-success rounded text-decoration-none" data-toggle="collapse" data-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                <h3 class="text-success">Leyenda <i class="fas fa-angle-down rotate-icon"></i></h3>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <ul>
                                                            <li>Estados:</li>
                                                            <ul>
                                                                <li>
                                                                    Corregido:
                                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-circle-fill align-middle" fill="#007bff" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="8" cy="8" r="8"/>
                                                                    </svg> 
                                                                </li>
                                                                <li>
                                                                    Activo:
                                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-circle-fill align-middle" fill="#28a745" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="8" cy="8" r="8"/>
                                                                    </svg>
                                                                </li>
                                                                <li>
                                                                    Desactivo:
                                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-circle-fill align-middle" fill="#dc3545" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="8" cy="8" r="8"/>
                                                                    </svg>
                                                                </li>
                                                            </ul>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6">
                                                        <ul>
                                                            <li>Acciones:</li>
                                                            <ul>
                                                                <li>
                                                                    Activar examen:
                                                                    <i class="fas fa-check text-success"></i>
                                                                </li>
                                                                <li>
                                                                    Desactivar examen:
                                                                    <i class="fas fa-times text-success"></i>
                                                                </li>
                                                                <li>
                                                                    Editar:
                                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="#03A655" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                                    </svg>
                                                                </li>
                                                                <li>
                                                                    Corregir:
                                                                    <i class="fas fa-file-import text-success"></i>
                                                                </li>
                                                                <li>
                                                                    Ver notas:
                                                                    <i class="fas fa-eye text-success"></i>
                                                                </li>
                                                                <li>
                                                                    Borrar:
                                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="#dc3545" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                                                    </svg>
                                                                </li>
                                                            </ul>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-sm-12 offset-lg-1">
                            <div class="table-responsive">
                                <table class="table border shadow">
                                    <tr class="background-light-green">
                                        <th>Titulo</th> 
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                    <?php
                                    foreach ($allExamen as $v) {
                                        if ($v->getId_Profesor() == $user->getDni()) {
                                            ?>
                                            <form action="../controladorEditarExamen.php">
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="id" value="<?= $v->getId() ?>" class="form-control-plaintext">
                                                        <input type="text" name="titulo" value="<?= $v->getTitulo() ?>" class="form-control">
                                                    </td>
                                                    <td><input type="text" name="fecha_inicio" value="<?= $v->getFecha_Inicio() ?>" class="form-control"></td>
                                                    <td><input type="text" name="fecha_fin" value="<?= $v->getFecha_Fin() ?>" class="form-control"></td>
                                                    <td><input type="text" name="descripcion" value="<?= $v->getDescripcion() ?>" class="form-control"></td>
                                                    <td>
                                                        <?php
                                                        if ($v->getEstado() == 0) {
                                                            $estado = '#dc3545';
                                                        } else if ($v->getEstado() == 1) {
                                                            $estado = '#28a745';
                                                        } else if ($v->getEstado() == 2) {
                                                            $estado = '#007bff';
                                                        }
                                                        ?>
                                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-circle-fill align-middle" fill="<?= $estado ?>" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="8" cy="8" r="8"/>
                                                        </svg>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($v->getEstado() == 0) {
                                                            ?>
                                                            <button name="activar_examen" type="submit" class="btn border-0"><!-- Activar -->
                                                                <i class="fas fa-check text-success"></i>
                                                            </button>
                                                            <?php
                                                        } else if ($v->getEstado() == 1) {
                                                            ?>
                                                            <button name="desactivar_examen" type="submit" class="btn border-0"><!-- Desactivar -->
                                                                <i class="fas fa-times text-success"></i>
                                                            </button>
                                                            <?php
                                                        }
                                                        ?>

                                                        <button name="editar_examen" type="submit" class="btn border-0"><!-- Editar -->
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="#03A655" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                            </svg>
                                                        </button>
                                                        <?php
                                                        if ($v->getEstado() == 2) {
                                                            ?>
                                                            <button name="ver_examen" type="submit" class="btn border-0"><!-- Ver Notas -->
                                                                <i class="fas fa-eye text-success"></i>
                                                            </button>
                                                            <?php
                                                        }
                                                        if ($v->getEstado() == 1) {
                                                            ?>
                                                            <button name="corregir_examen" type="submit" class="btn border-0"><!-- Correguir -->
                                                                <i class="fas fa-file-import text-success"></i>
                                                            </button>
                                                            <?php
                                                        }
                                                        ?>

                                                        <button name="borrar_examen" type="submit" class="btn border-0"><!-- Borrar -->
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="#dc3545" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </form>
                                            <?php
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <!-- Footer -->
        <div class="container-fluid background-green vh-10 d-flex align-items-center justify-content-center">

            <!--Section: Content-->
            <section class="text-center white-text">
                <h3 class="">Made with <i class="fas fa-heart text-warning mx-1"></i> by Jorge y Alejandro</h3>
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
