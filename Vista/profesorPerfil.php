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
        <link rel="stylesheet" href="../css/mdb.min.css">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/fondos.css">
        <link rel="stylesheet" href="../css/tamanios.css">
        <link rel="stylesheet" href="../css/fuentes.css">
    </head>
    <body>
        
        <?php
        
        require_once '../Clases/User.php';
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
        
        <main class="container-fluid">
            <div class="row">
                <aside class="col-md-2 col-sm-2 border-green pl-0 pr-0">
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
                                <form action="../controlador.php" name="menu" method="POST">
                                    <li class="nav-item">
                                        <button class="btn btn-outline-success w-100 mt-1 border-green rounded" name="vistaEditProfile" type="submit">Editar Perfil&nbsp;<i class="fas fa-user"></i></button>
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
                <section class="col-md-10 col-sm-10 border-green">
                        <div class="row">
                            <div class="col-lg-10  col-md-12 text-right my-3 offset-lg-1">
                                <p>Bienvenido: <?= $user->getNombre() ?> <i class="fas fa-user"></i></p>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="container my-5 py-5 z-depth-1">

                                <!--Section: Content-->
                                <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


                                    <!--Grid row-->
                                    <div class="row d-flex justify-content-center">

                                        <!--Grid column-->
                                        <div class="col-md-6">

                                            <!-- Default form contact -->
                                            <form class="text-center" action="#!">

                                                <h3 class="font-weight-bold mb-4">Contact Us</h3>

                                                <!-- Name -->
                                                <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Name">

                                                <!-- Email -->
                                                <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail">

                                                <!-- Subject -->
                                                <label>Subject</label>
                                                <select class="browser-default custom-select mb-4">
                                                    <option value="" disabled>Choose option</option>
                                                    <option value="1" selected>Feedback</option>
                                                    <option value="2">Report a bug</option>
                                                    <option value="3">Feature request</option>
                                                    <option value="4">Feature request</option>
                                                </select>

                                                <!-- Message -->
                                                <div class="form-group">
                                                    <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"
                                                              placeholder="Message"></textarea>
                                                </div>

                                                <!-- Copy -->
                                                <div class="custom-control custom-checkbox mb-4">
                                                    <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">
                                                    <label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>
                                                </div>

                                                <!-- Send button -->
                                                <button class="btn btn-info btn-block" type="submit">Send</button>

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
