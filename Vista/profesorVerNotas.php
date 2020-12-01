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
        require_once '../Clases/examenAlumno.php';
        session_start();
        $user = $_SESSION['user'];
        $notas = $_SESSION['notas'];
        $alumnos = $_SESSION['alumnos'];
        if (isset($_SESSION['allExamen'])) {
            $allExamen = $_SESSION['allExamen'];
//            foreach ($allExamen as $v) {
//                echo $v->getTitulo();
//                echo $v->getFecha_fin() . '<br>';
//            }
        }
        ?>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light background-green py-0 ">

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
                                <a href="../controlador.php?Estado=Profesor" class="white btn text-success bg-light btn-sm-sm">Cambiar rol</a>
                            </li>
                            <?php
                        }
                        ?>

                        <li class="nav-item">
                            <a href="../controlador.php?Back=Back" class="white btn text-success bg-light btn-sm-sm">Cerrar sesion</a>
                        </li>
                    </ul>
                    <!-- Links -->

                </div>
                <!-- Collapsible content -->

            </div>

        </nav>
        <!--/.Navbar--> 


        <main class="container-fluid">
            <div class="row">
                <aside class="col-md-2 col-sm-2 border-green pl-0 pr-0">


                    <nav class="navbar navbar-expand-lg navbar-light py-0">

                        <div class="container-fluid">

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav1"
                                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- Collapsible content -->
                            <div class="collapse navbar-collapse" id="basicExampleNav1">

                                <!-- Links -->
                                <ul class="nav flex-column">
                                    <form action="../controlador.php" name="menu" method="POST">
                                        <li class="nav-item">
                                            <button class="btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaEditProfile" type="submit">Editar Perfil&nbsp;<i class="fas fa-user"></i></button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaExamenesRealizados" type="submit">Ver examenes&nbsp;<i class="fas fa-file-signature"></i></button>
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

                            </div>
                            <!-- Collapsible content -->

                        </div>

                    </nav>
                </aside>
                <section class="col-md-10 col-sm-10 border-green vh-80 overflow-auto">
                    <div class="row">
                        <div class="col-lg-10  col-md-12 text-right my-3 offset-lg-1">
                            <p>Bienvenido: <?= $user->getNombre() ?> <i class="fas fa-user"></i></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-sm-12 offset-lg-1">
                            <h1> <?= $_SESSION['titulo'] ?> </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-sm-12 offset-lg-1">
                            <div class="table-responsive">
                                <table class="table border shadow">
                                    <tr class="background-light-green">
                                        <th>DNI</th> 
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Nota</th>
                                    </tr>
                                    <?php
                                    foreach ($notas as $v) {
                                        for ($i = 0; $i <= count($alumnos) - 1; $i++) {
                                            if ($v->getId_Alumno() == $alumnos[$i]->getDni()) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="text" name="dni" value="<?= $alumnos[$i]->getDni() ?>" class="form-control-plaintext">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="nombre" value="<?= $alumnos[$i]->getNombre() ?>" class="form-control-plaintext">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="titulo" value="<?= $alumnos[$i]->getApellido() ?>" class="form-control-plaintext">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="titulo" value="<?= $v->getNota() ?>" class="form-control-plaintext">
                                                    </td>
                                                </tr>
                                                <?php
                                            }
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
