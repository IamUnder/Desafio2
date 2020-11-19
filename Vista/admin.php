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
                            <button class="btn white btn-sm" type="button">Cambiar Rol</button>
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
                            <button class="btn white btn-sm" type="button">Ver Alumnos</button>
                        </li>
                        <li class="nav-item">
                            <button class="btn white btn-sm" type="button">Ver Profesores</button>
                        </li>
                        <li class="nav-item">
                            <button class="btn white btn-sm" type="button">Ver Administradores</button>
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
                <?php
                
                ?>
                <div class="col-lg-5 col-md-6 col-sm-12 offset-lg-1 borde">
                    <h3 class="font-weight-bold my-4 pb-2 text-center">Usuarios Desactivados</h3>
                    
                    <!-- Formulario CRUD -->
                    <form>
                        <hr>
                        <h2 class="font-weight-bold my-2 pb-2 text-center dark-grey-text">User</h2>
                        <div class="form-group"> <!-- DNI -->
                            <label for="dni" class="control-label">DNI</label>
                            <input type="text" class="form-control" id="DNI" name="dni" value="" readonly>
                        </div>    

                        <div class="form-group"> <!-- Mail-->
                            <label for="mail" class="control-label">Mail</label>
                            <input type="text" class="form-control" id="mail" name="mail" value="">
                        </div>                                    

                        <div class="form-group"> <!-- Pass -->
                            <label for="pass" class="control-label">Password</label>
                            <input type="text" class="form-control" id="pass" name="pas" value="">
                        </div>
                        
                        <div class="form-group"> <!-- Nombre -->
                            <label for="nombre" class="control-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="">
                        </div>                    

                        <div class="form-group"> <!-- Apellido -->
                            <label for="apellido" class="control-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="">
                        </div>    
                        
                        <div class="form-group"> <!-- Rol -->
                            <label for="rol" class="control-label">Rol</label>
                            <select class="form-control" id="rol" name="rol">
                                <option value="1">Alumno</option>
                                <option value="2">Profesor</option>
                                <option value="3">Administrador</option>
                            </select>                    
                        </div>

                                

                        <div class="form-group"> <!-- Boton de editar -->
                            <button type="submit" class="btn verde white-text" name="editar">Editar</button>
                            <button type="submit" class="btn verde white-text" name="borrar">Borrar</button>
                            <button type="submit" class="btn verde white-text" name="cambiar">Activar/Desactivar</button>
                        </div> 

                    </form>
                    <!-- Formulario CRUD -->
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 borde">
                    <h3 class="font-weight-bold my-4 pb-2 text-center">Usuarios Activados</h3>
                   <!-- Formulario CRUD -->
                    <form>
                        <hr>
                        <h2 class="font-weight-bold my-2 pb-2 text-center dark-grey-text">User</h2>
                        <div class="form-group"> <!-- DNI -->
                            <label for="dni" class="control-label">DNI</label>
                            <input type="text" class="form-control" id="DNI" name="dni" value="" readonly>
                        </div>    

                        <div class="form-group"> <!-- Mail-->
                            <label for="mail" class="control-label">Mail</label>
                            <input type="text" class="form-control" id="mail" name="mail" value="">
                        </div>                                    

                        <div class="form-group"> <!-- Pass -->
                            <label for="pass" class="control-label">Password</label>
                            <input type="text" class="form-control" id="pass" name="pas" value="">
                        </div>
                        
                        <div class="form-group"> <!-- Nombre -->
                            <label for="nombre" class="control-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="">
                        </div>                    

                        <div class="form-group"> <!-- Apellido -->
                            <label for="apellido" class="control-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="">
                        </div>    
                        
                        <div class="form-group"> <!-- Rol -->
                            <label for="rol" class="control-label">Rol</label>
                            <select class="form-control" id="rol" name="rol">
                                <option value="1">Alumno</option>
                                <option value="2">Profesor</option>
                                <option value="3">Administrador</option>
                            </select>                    
                        </div>

                                

                        <div class="form-group"> <!-- Boton de editar -->
                            <button type="submit" class="btn verde white-text" name="editar">Editar</button>
                            <button type="submit" class="btn verde white-text" name="borrar">Borrar</button>
                            <button type="submit" class="btn verde white-text" name="cambiar">Activar/Desactivar</button>
                        </div> 

                    </form>
                    <!-- Formulario CRUD -->
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
