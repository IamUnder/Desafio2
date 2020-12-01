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
    <body onload="validacion()" class="rosemary">

        <?php
        require_once '../Clases/User.php';
        session_start();
        $user = $_SESSION['user'];
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
                            <li class="nav-item">
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
                                    <form action="../controladorAlumno.php" name="menu" method="POST">
                                        <li class="nav-item">
                                            <button class="btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaPrincipal" type="submit">Vista principal&nbsp;<i class="fas fa-file-medical"></i></button>
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
                    <div class="row my-4">
                        <div class="container my-0 py-0 z-depth-1">

                            <!--Section: Content-->
                            <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


                                <!--Grid row-->
                                <div class="row d-flex justify-content-center">

                                    <!--Grid column-->
                                    <div class="col-md-6">

                                        <!-- Default form contact -->
                                        <form class="text-center" id="registro" action="../controladorAlumno.php" novalidate>

                                            <h3 class="font-weight-bold mb-4">Editar Perfil</h3>

                                            <input type="hidden" id="dni" name="dni" value="<?= $user->getDNI() ?>" readonly class="form-control-plaintext">
                                            <input type="hidden" id="rol" name="rol" value="<?= $user->getRol() ?>" readonly class="form-control-plaintext">
                                            <!-- Mail -->
                                            <label>Mail</label>
                                            <input type="text" id="mail" class="form-control mb-4" name="mail" value="<?= $user->getMail() ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$">
                                            <small id="mailError" class="form-text" aria-live="polite"></small>

                                            <!-- Pass -->
                                            <label>Password</label>
                                            <input type="password" id="pass" class="form-control mb-4" name="pass" value="" placeholder="Nueva Password" minlength="8" maxlength="10" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}">
                                            <small id="passError" class="form-text" aria-live="polite"></small>

                                            <!-- Subject -->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>Nombre</label>
                                                    <input type="text" id="nombre" class="form-control mb-4" name="nombre" value="<?= $user->getNombre() ?>" required>
                                                    <small id="nombreError" class="form-text" aria-live="polite"></small>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Apellido</label>
                                                    <input type="text" id="apellido" class="form-control mb-4" name="apellido" value="<?= $user->getApellido() ?>" required>
                                                    <small id="apellidoError" class="form-text" aria-live="polite"></small>
                                                </div>
                                            </div>

                                            <!-- Send button -->
                                            <button class="btn background-green text-white btn-block" type="submit" name="editarPerfil">Guardar cambios</button>

                                        </form>
                                        <!-- Default form contact -->

                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->


                            </section>
                            <!--Section: Content-->


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
        <script type="text/javascript" src="../js/registroValidacion_2.js"></script>
    </body>
</html>
