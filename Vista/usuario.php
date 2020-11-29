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
        <title>Panel de Alumno</title>
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
        session_start();
        $user = $_SESSION['user'];
        $allExamen = $_SESSION['allExamen'];
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
                        <?php
                        if ($user->getRol() == 2) {
                            ?>
                            <li class="nav-item">
                                <a href="../controlador.php?Estado=Profesor" class="btn btn-white btn-sm text-success">Cambiar rol</a>
                            </li>
                            <?php
                        }
                        ?>

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

        <!-- Contenido -->

        <div class="container-fluid">
            <div class="row">
                <aside class="col-md-2 col-sm-2 col-lg-2 border-green pl-0 pr-0">
                    <nav class="navbar navbar-expand-lg navbar-light my-2">


                        <!-- Collapse button -->
                        <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> 

                        <!-- Collapsible content -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <!-- Links -->
                            <ul class="nav flex-column">
                                <form action="../controladorAlumno.php" name="menu" method="POST">
                                    <li class="nav-item">
                                        <button class="btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaEditProfile" type="submit">Editar Perfil&nbsp;<i class="fas fa-user"></i></button>
                                    </li>
                                </form>
                            </ul>
                            <!-- Links -->

                            <!-- CTA -->

                        </div>
                    </nav> 
                </aside>
                <section class="col-md-10 col-lg-10 border-green">
                    <div class="row">
                        <div class="col-lg-10  col-md-12 text-right my-3 offset-lg-1">
                            <p>Bienvenido: <?= $user->getNombre() ?> <i class="fas fa-user"></i></p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-6 offset-1">
                            
                            <div class="table-responsive">
                                <table class="table border shadow">
                                    <tr class="background-light-green">
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th>Fecha Fin</th>
                                        <th>Acciones</th>
                                    </tr>
                                    <?php
                                    foreach ($allExamen as $v) {
                                        if ($v->getEstado() == 1) {
                                            ?>
                                    <form action="../controladorAlumno.php">   
                                    <tr>
                                        <td>
                                            <input type="hidden" name="id" value="<?= $v->getId() ?>" class="form-control-plaintext">
                                            <input type="text" name="titulo" value="<?= $v->getTitulo() ?>" class="form-control-plaintext">
                                        </td>
                                        <td>
                                            <input type="text" name="descripcion" value="<?= $v->getDescripcion() ?>" class="form-control-plaintext">
                                        </td>
                                        <td>
                                            <input type="text" name="fecha_inicio" value="<?= $v->getFecha_Inicio() ?>" class="form-control-plaintext">
                                        </td>
                                        <td>
                                            <button name="realizar_examen" type="submit" class="btn-white border-0"><!-- Activar -->
                                                <i class="fas fa-arrow-right green-text"></i>
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
                        <div class="col-3 bg-secondary offset-1">
                            Aqui van las notas
                        </div>
                    </div>
                </section>
            </div>
        </div>


        <!-- !Contenido -->

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
