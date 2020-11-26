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
