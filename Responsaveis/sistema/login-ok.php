<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>NOTÍCIAS/AVISOS ESCOLARES</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../assets/css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

        <!--     BOTOES INICIAIS     -->
        <link href="../assets/css/botoes.css" rel="stylesheet" />

        <script src="../sistema/noticias.js"></script> 

    </head>
    <body>

        <!-- ACIMA, DO TEMPLATE / ABAIXO, DO EEXEMPLO DO PROFESSOR -->

        <div class="container">
            <div class="row" style="padding-top: 80px">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">NOTÍCIAS/AVISOS ESCOLARES</h3>
                        </div>
                        <div class="panel-body">

                            <?php
                            session_start();
                            include_once "../class/Carregar.class.php";

                            $objUsuario = new Responsavel();
                            $objUsuario->email = strip_tags($_POST['email']);
                            $objUsuario->senha = strip_tags($_POST['senha']);
                            $login = $objUsuario->login();
                            if ($login) {
                                $_SESSION["admin"] = $login->admin;
                                $_SESSION["logado"] = true;
                                $_SESSION["id"] = $login->id;
                                $_SESSION["nome"] = $login->name;
                                //echo "Admin: ".$login->id." / Nome: ".$login->nome." / Email: ".$login->email;
                                header("location:../sistema/index.php");
                            } else {
                                ?>
                                <div class="col-lg-12" >
                                    <div class="panel panel-red">
                                        <div class="panel-heading">
                                            <!-- h5>Erro no login:</h5 -->
                                        </div>
                                        <div class="panel-body">
                                            <h4>Usuário e senha inválidos!</h4>
                                            <a href="login.php" class="btn btn-lg btn-success btn-block">Tentar novamente...</a>
                                        </div>
                                    </div>
                                </div> 

                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ABAIXO, DO TEMPLATE -->

    </body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="../assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="../assets/js/demo.js"></script>

</html>
