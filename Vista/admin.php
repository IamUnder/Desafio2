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
    </head>
    <body class="white">
        <?php
        require_once '../Clases/User.php';
        session_start();
        $allUser = $_SESSION['allUser'];
//        foreach ($allUser as $value) {
//    echo $value . '<br>';
//    
//    if (isset($_REQUEST['rol'])) {
//        echo $_REQUEST['rol'];
//    }
//        }
        ?>
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
                            <a href="../controlador.php?cambiar=cambiar"><button class="btn white btn-sm" type="button">Cambiar Rol</button></a>
                        </li>
                        <li class="nav-item">
                            <a href="../controlador.php?Back=Back"><button class="btn white btn-sm" type="button">Cerrar Sesion</button></a>
                        </li>
                    </ul>

                </div>

            </div>

        </nav>
        <!--/.Navbar-->
        <!--Navba2r-->
        <nav class="navbar navbar-expand-lg navbar-light verde">

            <div class="container">

                <!-- Collapse button -->
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> 

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

                    <!-- Links -->
                    <ul class="navbar-nav">


                        <li class="nav-item">
                            <a href="admin.php?rol=0"><button class="btn white btn-sm" type="button">Ver Alumnos</button></a>
                        </li>
                        <li class="nav-item">
                            <a href="admin.php?rol=1"><button class="btn white btn-sm" type="button">Ver Profesores</button></a>
                        </li>
                        <li class="nav-item">
                            <a href="admin.php?rol=2"><button class="btn white btn-sm" type="button">Ver Administradores</button></a>
                        </li>

                    </ul>
                    <!-- Links -->

                </div>
                <!-- CTA -->

            </div>

        </nav>
        <!--/.Navbar2-->

        <!-- Contenido -->
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-5 col-md-6 col-sm-12 offset-lg-1 borde">
                    <h3 class="font-weight-bold my-4 pb-2 text-center">Usuarios Desactivados</h3>
                    <?php
                    foreach ($allUser as $u) {
                        if ($u->getActivado() == 0 && $_REQUEST['rol'] == $u->getRol()) {
                            ?>
                            <!-- Formulario CRUD -->
                            <form action="../controlador.php" method="POST">
                                <hr>
                                <h2 class="font-weight-bold my-2 pb-2 text-center dark-grey-text">User</h2>
                                <div class="form-group"> <!-- DNI -->
                                    <label for="dni" class="control-label">DNI</label>
                                    <input type="text" class="form-control" id="DNI" name="dni" value="<?php echo $u->getDni(); ?>" readonly>
                                </div>    

                                <div class="form-group"> <!-- Mail-->
                                    <label for="mail" class="control-label">Mail</label>
                                    <input type="text" class="form-control" id="mail" name="mail" value="<?php echo $u->getMail(); ?>">
                                </div>                                    

                                <div class="form-group"> <!-- Pass -->
                                    <label for="pass" class="control-label">Password</label>
                                    <input type="text" class="form-control" id="pass" name="pass" value="<?php echo $u->getPass(); ?>">
                                </div>

                                <div class="form-group"> <!-- Nombre -->
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $u->getNombre(); ?>">
                                </div>                    

                                <div class="form-group"> <!-- Apellido -->
                                    <label for="apellido" class="control-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $u->getApellido(); ?>">
                                </div>    

                                <div class="form-group"> <!-- Rol -->
                                    <label for="rol" class="control-label">Rol</label>
                                    <select class="form-control" id="rol" name="rol">
                                        <option value="0" 
                                        <?php
                                        if ($u->getRol() == 0) {
                                            echo 'selected="true"';
                                        }
                                        ?>
                                                >Alumno</option>
                                        <option value="1"  
                                        <?php
                                        if ($u->getRol() == 1) {
                                            echo 'selected="true"';
                                        }
                                        ?>
                                                >Profesor</option>
                                        <option value="2"  
                                        <?php
                                        if ($u->getRol() == 2) {
                                            echo 'selected="true"';
                                        }
                                        ?>
                                                >Administrador</option>
                                    </select>                    
                                </div>



                                <div class="form-group"> <!-- Boton de editar -->
                                    <button type="submit" class="btn verde white-text" name="editar">Editar</button>
                                    <button type="submit" class="btn verde white-text" name="borrar">Borrar</button>
                                    <button type="submit" class="btn verde white-text" name="cambiar">Activar/Desactivar</button>
                                </div> 

                            </form>
                            <!-- Formulario CRUD -->
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 borde">
                    <h3 class="font-weight-bold my-4 pb-2 text-center">Usuarios Activados</h3>
                    <?php
                    foreach ($allUser as $u) {
                        if ($u->getActivado() == 1 && $_REQUEST['rol'] == $u->getRol()) {
                            ?>
                            <!-- Formulario CRUD -->
                            <form action="../controlador.php" method="POST">
                                <hr>
                                <h2 class="font-weight-bold my-2 pb-2 text-center dark-grey-text">User</h2>
                                <div class="form-group"> <!-- DNI -->
                                    <label for="dni" class="control-label">DNI</label>
                                    <input type="text" class="form-control" id="DNI" name="dni" value="<?php echo $u->getDni(); ?>" readonly>
                                </div>    

                                <div class="form-group"> <!-- Mail-->
                                    <label for="mail" class="control-label">Mail</label>
                                    <input type="text" class="form-control" id="mail" name="mail" value="<?php echo $u->getMail(); ?>">
                                </div>                                    

                                <div class="form-group"> <!-- Pass -->
                                    <label for="pass" class="control-label">Password</label>
                                    <input type="text" class="form-control" id="pass" name="pass" value="<?php echo $u->getPass(); ?>">
                                </div>

                                <div class="form-group"> <!-- Nombre -->
                                    <label for="nombre" class="control-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $u->getNombre(); ?>">
                                </div>                    

                                <div class="form-group"> <!-- Apellido -->
                                    <label for="apellido" class="control-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $u->getApellido(); ?>">
                                </div>    

                                <div class="form-group"> <!-- Rol -->
                                    <label for="rol" class="control-label">Rol</label>
                                    <select class="form-control" id="rol" name="rol">
                                        <option value="0" 
                                        <?php
                                        if ($u->getRol() == 0) {
                                            echo 'selected="true"';
                                        }
                                        ?>
                                                >Alumno</option>
                                        <option value="1"  
                                        <?php
                                        if ($u->getRol() == 1) {
                                            echo 'selected="true"';
                                        }
                                        ?>
                                                >Profesor</option>
                                        <option value="2"  
                                        <?php
                                        if ($u->getRol() == 2) {
                                            echo 'selected="true"';
                                        }
                                        ?>
                                                >Administrador</option>
                                    </select>                    
                                </div>



                                <div class="form-group"> <!-- Boton de editar -->
                                    <button type="submit" class="btn verde white-text" name="editar">Editar</button>
                                    <button type="submit" class="btn verde white-text" name="borrar">Borrar</button>
                                    <button type="submit" class="btn verde white-text" name="cambiar">Activar/Desactivar</button>
                                </div> 

                            </form>
                            <!-- Formulario CRUD -->
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            
            <!-- Formulario de registro -->
            
            <div class="row">
                <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 borde">
                    <form novalidate class="text-center mt-2 jus" action="../controlador.php" method="POST" name="formulario">
                        <h3 class="font-weight-bold my-4 pb-2 text-center">Usuarios Desactivados</h3>
                        <?php
                        if (isset($_SESSION['mensaje'])) {
                            echo $_SESSION['mensaje'];
                            $_SESSION['mensaje'] = null;
                        }
                        ?>
                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- Primer nombre -->
                                <input type="text" id="nombre" name="registro_nombre" aria-describedby="nombreError" class="form-control" placeholder="Introduce el nombre" required>
                                <small id="nombreError" class="form-text bg-danger" aria-live="polite"></small>
                            </div>
                            <div class="col">
                                <!--<!-- Apellidos -->
                                <input type="text" id="apellido" name="registro_apellido" aria-describedby="apellidoError" class="form-control" placeholder="Introduce tus apellidos" required>
                                <small id="apellidoError" class="form-text bg-danger" aria-live="polite"></small>
                            </div>
                        </div>

                        <!-- DNI -->
                        <input type="text" id="dni" name="registro_dni" aria-describedby="dniError" class="form-control mb-4" placeholder="Introduce tu DNI" required pattern="\d{9}[A-Z]">
                        <small id="dniError" class="form-text bg-danger" aria-live="polite"></small>

                        <!-- E-mail -->
                        <input type="email"  id="mail" name="registro_mail" class="form-control mb-4" placeholder="Introduce tu E-mail" required>
                        <small id="mailError" class="form-text bg-danger" aria-live="polite"></small>

                        <!-- Contraseña -->
                        <input type="password" name="registro_pass" id="pass" class="form-control mb-4" placeholder="Introduce tu contraseña" aria-describedby="pass" required minlength="8" maxlength="10" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}">
                        <small id="passError" class="form-text bg-danger" aria-live="polite"></small>

                        <!-- Rol -->
                        <select class="form-control" id="rol" name="registro_rol">
                            <option value="0" >Alumno</option>
                            <option value="1" >Profesor</option>
                            <option value="2" >Administrador</option>
                        </select>  

                        <!-- Registro -->
                        <div class="form-row mb-4">
                            <div class="col">
                                <button name="crud_registrar" class="btn verde white-text my-4 btn-block" type="submit">Registrar</button>
                            </div
                        </div>

                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                    </form>
                </div>
            </div>
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
        <script type="text/javascript" src="../"></script>
    </body>
</html>
