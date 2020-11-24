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
        <title>Mamas 2.0 Profesor</title>
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
        <link rel="stylesheet" href="../css/fuentes.css">
    </head>
    <body>
        
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light verde">

            <div class="container"> 

                <a class="navbar-brand" href="#">
                    <img src="../img/logo.png" height="30" alt="mdb logo">
                </a>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="basicExampleNav">

                    <!-- Right -->
                    <ul class="navbar-nav offset-10">
                        <li class="nav-item">
                            <a href="../controlador.php?Estado=Profesor"><button class="btn white btn-sm" type="button">Cambiar Rol</button></a>
                        </li>
                        <li class="nav-item">
                            <a href="../controlador.php?Back=Back"><button class="btn white btn-sm" type="button">Cerrar Sesion</button></a>
                        </li>
                    </ul>

                </div>

            </div>

        </nav>
        <!--/.Navbar-->
        
        <!-- Section -->
        <div class="container-fluid my-2">
            <div class="row">
                <div class="col-lg-2">

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

                </div>
                <div class="col-lg-10">
                    ejemplo2
                </div>
            </div>
        </div>
        <!-- !Section -->
        
         <!-- Footer -->
        <div class="container-fluid">

            <!--Section: Content-->
            <section class="py-5 text-center white-text verde z-depth-1 rounded">

                <h3 class="">Made with <i class="fas fa-heart orange-text mx-1"></i> by Jorge y Alejandro</h3>

            </section>
            <!--Section: Content-->

        </div>
        <!-- ./Contenido -->
        
        <!-- jQuery -->
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="../js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="../js/mdb.min.js"></script>
        <!-- Your custom scripts (optional) -->
        <script type="text/javascript" src="../js/vFormulario.js"></script>
    </body>
</html>
