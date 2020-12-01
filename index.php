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
        <!-- Codigo recaptcha v3 -->
        <script src='https://www.google.com/recaptcha/api.js?render=6Lft9OMZAAAAAFV8-iefk3fFBnHLeb6VYp_LWaAF'>
        </script>
        <script>
            grecaptcha.ready(function () {
                grecaptcha.execute('6Lft9OMZAAAAAFV8-iefk3fFBnHLeb6VYp_LWaAF', {action: 'formulario'})
                        .then(function (token) {
                            var recaptchaResponse = document.getElementById('recaptchaResponse');
                            recaptchaResponse.value = token;
                        });
            });
        </script>
    </head>
    <body onload="vLogin()" class="verde">
        <?php
        session_start();
        if (isset($_SESSION['recuperarPass'])) {
            unset($_SESSION['recuperarPass']);
        }
        ?>
        <div class="container-fluid justify-content-center">
            <div class="row">
                <div class="mx-auto">
                    <img src="img/logo.png" alt="Logos Mamas 2.0" class="img-fluid"/>
                </div>
            </div>
        </div>
        <!--Section: Content-->
        <section class="text-center">

            <form class="mx-md-5" action="controlador.php" method="POST" name="formulario" novalidate>

                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <!-- Material form login -->
                        <div class="card">

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Form -->
                                <form class="text-center" style="color: #757575;" action="controlador.php" method="POST" name="formulario" novalidate>

                                    <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Accede al entorno educativo</h3>
                                    <?php
                                    if (isset($_SESSION['mensaje'])) {
                                        echo $_SESSION['mensaje'];
                                        $_SESSION['mensaje'] = null;
                                    }
                                    ?>
                                    <!-- Mail -->
                                    <input type="email" name="mail" id="defaultSubscriptionFormEmail" class="form-control" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$">
                                    <small id="emailError" class="form-text mb-4" aria-live="polite"></small>

                                    <!-- Pass -->
                                    <input type="password" name="pass" id="defaultSubscriptionFormPassword" class="form-control" placeholder="Password" required minlength="8" maxlength="10" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}">
                                    <small id="passError" class="form-text" aria-live="polite"></small>

                                    <!-- Redireciones -->
                                    <small id="passwordHelpBlock" class="form-text text-right blue-text">
                                        <a href="Vista/panelRecuperar.php">Recuperar contraseña</a>
                                    </small>
                                    <small id="passwordHelpBlock" class="form-text text-right blue-text">
                                        Sin cuenta? <a href="Vista/panelRegistro.php">Registrate</a>
                                    </small>

                                    <!-- Captcha -->
                                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">


                                    <!-- Boton de envio -->
                                    <div class="text-center">
                                        <button type="submit" name="LogIn" class="btn btn-outline-green btn-rounded my-4 waves-effect rounded">LogIn</button>
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
            <script type="text/javascript" src="js/vFormulario.js"></script>
    </body>
</html>
