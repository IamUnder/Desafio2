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
                <div class="col-lg-5 col-md-6 col-sm-12 offset-lg-1 borde">
                    <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Usuarios Desactivados</h3>
                    <form>
                        <hr>
                        <h2 class="font-weight-bold my-2 pb-2 text-center">User</h2>
                        <div class="form-group"> <!-- Full Name -->
                            <label for="full_name_id" class="control-label">Full Name</label>
                            <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                        </div>    

                        <div class="form-group"> <!-- Street 1 -->
                            <label for="street1_id" class="control-label">Street Address 1</label>
                            <input type="text" class="form-control" id="street1_id" name="street1" placeholder="Street address, P.O. box, company name, c/o">
                        </div>                    

                        <div class="form-group"> <!-- Street 2 -->
                            <label for="street2_id" class="control-label">Street Address 2</label>
                            <input type="text" class="form-control" id="street2_id" name="street2" placeholder="Apartment, suite, unit, building, floor, etc.">
                        </div>    

                        <div class="form-group"> <!-- City-->
                            <label for="city_id" class="control-label">City</label>
                            <input type="text" class="form-control" id="city_id" name="city" placeholder="Smallville">
                        </div>                                    

                        <div class="form-group"> <!-- State Button -->
                            <label for="state_id" class="control-label">State</label>
                            <select class="form-control" id="state_id">
                            
                            </select>                    
                        </div>

                        <div class="form-group"> <!-- Zip Code-->
                            <label for="zip_id" class="control-label">Zip Code</label>
                            <input type="text" class="form-control" id="zip_id" name="zip" placeholder="#####">
                        </div>        

                        <div class="form-group"> <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Buy!</button>
                        </div>     

                    </form>
                   
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 borde">
                    <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Usuarios Activados</h3>
                    <form>
                        
                        <hr>
                        <h2 class="font-weight-bold my-2 pb-2 text-center">User</h2>
                        
                        <div class="form-group"> <!-- Full Name -->
                            <label for="full_name_id" class="control-label">Full Name</label>
                            <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                        </div>    

                        <div class="form-group"> <!-- Street 1 -->
                            <label for="street1_id" class="control-label">Street Address 1</label>
                            <input type="text" class="form-control" id="street1_id" name="street1" placeholder="Street address, P.O. box, company name, c/o">
                        </div>                    

                        <div class="form-group"> <!-- Street 2 -->
                            <label for="street2_id" class="control-label">Street Address 2</label>
                            <input type="text" class="form-control" id="street2_id" name="street2" placeholder="Apartment, suite, unit, building, floor, etc.">
                        </div>    

                        <div class="form-group"> <!-- City-->
                            <label for="city_id" class="control-label">City</label>
                            <input type="text" class="form-control" id="city_id" name="city" placeholder="Smallville">
                        </div>                                    

                        <div class="form-group"> <!-- State Button -->
                            <label for="state_id" class="control-label">State</label>
                            <select class="form-control" id="state_id">
                                
                            </select>                    
                        </div>

                        <div class="form-group"> <!-- Zip Code-->
                            <label for="zip_id" class="control-label">Zip Code</label>
                            <input type="text" class="form-control" id="zip_id" name="zip" placeholder="#####">
                        </div>        

                        <div class="form-group"> <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Buy!</button>
                        </div>     

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
