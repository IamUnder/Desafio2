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
        <title>CRUD Administracion</title>
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
    <body onload="validacion()" class="white rosemary">
        <?php
        require_once '../Clases/User.php';
        session_start();
        $user = $_SESSION['user'];
        $allUser = $_SESSION['allUser'];
        foreach ($allUser as $value) {

            if (isset($_REQUEST['rol'])) {
                
            }
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
                            <a href="../controlador.php?Estado=Admin" class="btn btn-white btn-sm text-success">Cambiar rol</a>
                        </li>
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
            <div class="row my-5">
                <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1">
                    <div class="row">
                        <div class="col-lg-10  col-md-12 text-right my-3 offset-lg-1">
                            <p>Bienvenido: <?= $user->getNombre() ?> <i class="fas fa-tools"></i></i></p>
                        </div>
                    </div>
                    <!-- Formulario de registro -->
            <div class="row my-5">
                <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1">
                    <div class="table-responsive">
                        <h1 class="text-center">Agregar Usuario</h1>
                        <table class="table border shadow">
                            <tr class="background-light-green">
                                <th>DNI</th>
                                <th>Mail</th>
                                <th>Password</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                            <form action="../controlador.php" id="registro" novalidate>
                                <tr>
                                    <td><!-- DNI -->
                                        <input type="text" id="dni" name="registro_dni" value="" placeholder="DNI" class="form-control" required pattern="\d{8}[A-Z]">
                                        <small id="dniError" class="form-text" aria-live="polite"></small>
                                    </td>
                                    <td><!-- Mail -->
                                        <input type="email" id="mail" name="registro_mail" value="" placeholder="Mail" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$">
                                        <small id="mailError" class="form-text" aria-live="polite"></small>
                                    </td>
                                    <td><!-- Password -->
                                        <input type="password" id="pass" name="registro_pass" value="" placeholder="Password" class="form-control" required minlength="8" maxlength="10" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}">
                                        <small id="passError" class="form-text" aria-live="polite"></small>
                                    </td>
                                    <td><!-- Nombre -->
                                        <input type="text" id="nombre" name="registro_nombre" value="" placeholder="Nombre" class="form-control" required>
                                        <small id="nombreError" class="form-text" aria-live="polite"></small>
                                    </td>
                                    <td><!-- Apellido -->
                                        <input type="text" id="apellido" name="registro_apellido" value=""  placeholder="Apellido" class="form-control" required>
                                        <small id="apellidoError" class="form-text" aria-live="polite"></small>
                                    </td>
                                    <td><!-- Rol -->
                                        <select class="form-control" name="registro_rol">
                                            <option value="0" >Alumno</option>
                                            <option value="1" >Profesor</option>
                                            <option value="2" >Administrador</option>
                                        </select> 
                                    </td>
                                    <td><!-- Acciones -->
                                        <button name="crud_registrar" type="submit" class="btn-white border-0">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle-fill" fill="#03A655" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-11.5.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
                    <div class="table-responsive">
                        <h1 class="text-center">Lista de usuarios</h1>
                        <table class="table border shadow">
                            <tr class="background-light-green">
                                <th>DNI</th>
                                <th>Mail</th>
                                <th>Password</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Estado</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                            <?php
                            foreach ($allUser as $v) {
                                ?>
                                <form action="../controlador.php">
                                    <tr>
                                        <td><input type="text" name="dni" value="<?= $v->getDNI() ?>" readonly class="form-control-plaintext"></td><!-- DNI -->
                                        <td><input type="email" name="mail" value="<?= $v->getMail() ?>" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required></td><!-- Mail -->
                                        <td><input type="password" name="pass" value="" placeholder="Nueva Contraseña" class="form-control" minlength="8" maxlength="10" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}"></td><!-- Password -->
                                        <td><input type="text" name="nombre" value="<?= $v->getNombre() ?>" class="form-control" required></td><!-- Nombre -->
                                        <td><input type="text" name="apellido" value="<?= $v->getApellido() ?>" class="form-control" required></td><!-- Apellido -->
                                        <td><!-- Estado -->
                                            <?php
                                            if ($v->getActivado() == 0) {
                                                $estado = '#dc3545';
                                            } else {
                                                $estado = '#28a745';
                                            }
                                            ?>
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-circle-fill align-middle" fill="<?= $estado ?>" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8" cy="8" r="8"/>
                                            </svg>
                                        </td>
                                        <td><!-- Rol -->
                                            <select class="form-control" name="rol">
                                                <option value="0" 
                                                <?php
                                                if ($v->getRol() == 0) {
                                                    echo 'selected="true"';
                                                }
                                                ?>
                                                        >Alumno</option>
                                                <option value="1"  
                                                <?php
                                                if ($v->getRol() == 1) {
                                                    echo 'selected="true"';
                                                }
                                                ?>
                                                        >Profesor</option>
                                                <option value="2"  
                                                <?php
                                                if ($v->getRol() == 2) {
                                                    echo 'selected="true"';
                                                }
                                                ?>
                                                        >Administrador</option>
                                            </select> 
                                        </td>
                                        <td><!-- Acciones -->
                                            <button name="cambiar" type="submit" class="btn-white border-0">
                                                <?php
                                                if ($v->getActivado() == 0) {
                                                    ?>
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="#03A655" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                    </svg>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="#03A655" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                                    </svg>
                                                    <?php
                                                }
                                                ?>
                                            </button>
                                            <button name="editar" type="submit" class="btn-white border-0">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="#03A655" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                </svg>
                                            </button>
                                            <button name="borrar" type="submit" class="btn-white border-0">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="#dc3545" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
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
        <script type="text/javascript" src="../js/registroValidacion_1.js"></script>
    </body>
</html>
