<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Dr. José Manuel Siso Martínez</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/css.css" rel="stylesheet">

    <link rel="shortcut icon" href="./img/logo.jpg">

    <script type="text/javascript">
        function nobackbutton(){
            window.location.hash="no-back-button";
            window.location.hash="Again-No-back-button";
            window.onhashchange=function(){window.location.hash="no-back-button";}
        }
    </script>


</head>

<body onload="nobackbutton();">
    
    <?php
        include_once("funciones_comunes.php");
        $email_usuario1=$_SESSION["email_usuario"];
    
        if(!Autenticado()){
            echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.history.go(-1);</script>";
        }

        $tipoU=Autenticado();

    ?>



    <div class="navbar-fixed-top">
        <!-- Marketing Icons Section -->
    <div class="row ">
        <div class="col-lg-12">
            <img src="./img/banner2.jpg" class="img " >
        </div>
        
    </div>
  
    <!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation" >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Bienvenido.php"><span class="glyphicon glyphicon-home"></span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li >
                        <a href="Bienvenido.php">Inicio</a>
                    </li>
                    
                    <?php
                        if($tipoU=="SuperUser"){
                            echo'
                                <li>
                                    <a href="listadosolicitudes.php">Solicitudes</a>
                                </li>
                            ';
                        }
                    ?>

                    <li>
                        <a href="Estudiante2.php">Estudiantes</a>
                    </li>
                    
                    <?php
                        if($tipoU=="SuperUser"){
                            echo'
                                <li>
                                    <a href="Docentes.php">Docentes</a>
                                </li>
                            ';
                        }
                    ?>

                    <li>
                        <a href="consultarperiodo.php">Periodos</a>
                    </li>

                    <?php
                        if($tipoU=="SuperUser"){
                            echo'
                                <li>
                                    <a href="consultaranio.php">Años</a>
                                </li>
                                <li>
                                    <a href="consultarmaterias.php">Materias</a>
                                </li>
                                <li>
                                    <a href="consultarsecciones.php">Secciones</a>
                                </li>
                                <li>
                                    <a href="Noticias.php">Noticias</a>
                                </li>
                                <li>
                                    <a href="Usuario.php">Usuarios</a>
                                </li>
                            ';
                        }
                    ?>
                    <li>
                        <a href="cerrar sesion.php">Salir</a>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->

    </nav>

</div>
<br><br><br><br><br>
    <!-- Header Carousel -->

<?php

echo '<center><strong class="letraroja grande">Bienvenido: </strong><strong class="grande">'.$email_usuario1.'</strong></center>';


?>
   
    <!-- Page Content -->
   <div class="container">
    <br><br>
        <!-- /.row -->
        <div class="row" >
           
            <div class="col-md-12" >                
                
        <!-- codigo aqui -->
                
            </div>
            
        </div>
        <!-- Portfolio Section -->
        <div class="row">
           <div class="col-md-12">
                         
            <div class="col-md-4 col-sm-6">
                <center><img class="img-responsive img-responsive img-rounded img-hover" src="./img/logo2.jpg" alt=""></center>
                    
                
            </div>
            <div class="col-md-4 col-sm-6">
                <br><br>
                    <strong><i><center>Bienvenido al Sistema de Inscripción de la Unidad Educativa "Dr. José Manuel Siso Martínez". 
                        Ahora puede realizar los procesos que desee a tiempo real y de una manera sencilla y óptima...</center></strong></i>
                
            </div>
            <div class="col-md-4 col-sm-6">
               <center> <img class="img-responsive img-responsive img-rounded img-hover" src="./img/usuario.png" alt=""></center>
                    
                
            </div>
            
        </div>
        <!-- /.row -->

       <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <br><br>
                    <p>Ministerio del Poder Popular para la Educación Universitaria, Ciencia y Tecnología
                    <br>Unidad Educativa "Dr. José Manuel Siso Martínez". - Copyright &copy; 2016
                    
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>