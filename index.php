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
        <title>LogIn</title>
        <!-- MDB icon -->
        <link rel="icon" href="" type="image/x-icon">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="css/mdb.min.css">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container-fluid justify-content-center">
            <div class="row">
                <div class="mx-auto">
                    <img src="img/logo.png" alt="Logos Mamas 2.0" class="img-fluid"/>
                </div>
            </div>
        </div>
        <!--Section: Content-->
        <section class="text-center">

            <form class="mx-md-5" action="controlador.php" method="POST">

                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <!-- Material form login -->
                        <div class="card">

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Form -->
                                <form class="text-center" style="color: #757575;" action="controlador.php" method="POST">

                                    <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Accede al entorno educativo</h3>

                                    <!-- Name -->
                                    <input type="email" name="mail" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Email">

                                    <!-- Email -->
                                    <input type="password" name="pass" id="defaultSubscriptionFormEmail" class="form-control" placeholder="Password">

                                    <small id="passwordHelpBlock" class="form-text text-right blue-text">
                                        <a href="Vista/panelRecuperar.php">Recuperar contraseña</a>
                                    </small>
                                    <small id="passwordHelpBlock" class="form-text text-right blue-text">
                                        Sin cuenta? <a href="Vista/panelRegistro.php">Registrate</a>
                                    </small>

                                    <div class="text-center">
                                        <button type="submit" name="LogIn" class="btn btn-outline-green btn-rounded my-4 waves-effect">LogIn</button>
                                    </div>

                                </form>
                                <!-- Form -->

                            </div>

                        </div>
                        <!-- Material form login -->
                    </div>
                </div>

            </form>


        <!-- jQuery -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <!-- Your custom scripts (optional) -->
        <script type="text/javascript"></script>
    </body>
</html>
