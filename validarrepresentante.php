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
    
    <div class="navbar-fixed-top">
        <!-- Marketing Icons Section -->
    <div class="row ">
        <div class="col-lg-12">
            <img src="./img/banner2.jpg" class="img " >
        </div>
        
    </div>
  
     <!-- Navigation -->
    <nav class="navbar navbar-inverse " role="navigation" >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Dr. José Manuel Siso Martínez</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li >
                        <a href="index.php">Inicio</a>
                    </li>
                    <li >
                        <a href="nosotros.php">Nosotros</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Inscripciones <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="validarrepresentante.php">Llenar Planilla</a>
                            </li>
                            <li>
                                <a href="resultadosolicitud.php">Consultar Inscripción</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="contactos.php">Contactos</a>
                    </li>
                    <li>
                        <button type="button" class="btn btn-default nav navbar-right"  data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-user "></i><br>&nbsp;&nbsp;Iniciar Sesión</button>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->

    </nav>


    
</div>
<br><br><br><br><br><br>
    <!-- Header Carousel -->
    

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header fondorojo letrablanca">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title " id="myModalLabel">Iniciar Sesi&oacute;n</h4></center>
            </div>
            <div class="modal-body">
                <form  action="iniciar sesion.php" method="POST">        
                    <div class="login-wrap">          
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon_profile"></i></span> 
                            <input type="text" class="form-control" name="email" placeholder="Usuario" autofocus> 
                            <span class="input-group-addon"> <a class="" href="#modal2">&nbsp;<i class="glyphicon glyphicon-question-sign letraroja"></i></a></span>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                                <input type="password" class="form-control" name="clavee" placeholder="Contraseña">
                                <span class="input-group-addon"> <a class="" href="#modal3">&nbsp;<i class="glyphicon glyphicon-question-sign letraroja"></i></a></span>
                        </div>
                        <label class="checkbox">
                   
                            <span class="pull-right "> <a href="#" class="letranegra" data-toggle="modal" data-target="#myModal2"> Olvidó su Contraseña?</a></span>
                        </label>
                        <button class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit">Entrar</button>            
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div> 



<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header fondorojo letrablanca">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title " id="myModalLabel">Recuperación de Contraseña</h4></center>
            </div>
            <div class="modal-body">
                <form  action="recuperar.php" method="POST">        
                    <div class="login-wrap">          
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon_profile"></i></span> 
                            <input type="text" class="form-control" name="email" placeholder="Usuario" autofocus> 
                            <span class="input-group-addon"> <a class="" href="#modal2">&nbsp;<i class="glyphicon glyphicon-question-sign letraroja"></i></a></span>
                        </div>
                        
                        <br>
                        <button class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit">Recuperar</button>            
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div> 


<div id="modal1" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>
        <center><h4>Ayuda</h4></center>
        
        <p>Para Iniciar Sesión ingresa tu Usuario y Contraseña en los campos respectivos y pulsa entrar,
        tal como se explica en la siguiente imagen: </p>
        <center><img src="../img/Ayudainiciar.jpg" class="img img-responsive"></center>
    </div>
  </div>
<div id="modal2" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>

        <br>
        <p>En este campo debes ingresar tu nombre de usuario (tu correo).</p>

    </div>
  </div>

  <div id="modal3" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>

        <br>
        <p>En este campo debes ingresar tu contraseña.</p>

    </div>
  </div>
   

   

   
    <!-- Page Content -->
   <div class="container">
    <br><br>
        <!-- /.row -->
        <div class="row" >
           
            <div class="col-md-12" >                
                
                <?php

                    include_once("funciones_comunes.php");
    
    $conexion = Conectar();
    $db = mysql_select_db("UEDrJoseManuelSisoMartinez",$conexion)or die("Error al elegir la base de datos");
    
                
    echo'     
    
    <div class="row">
    <div class="col hidden-xs hidden-sm col-md-3 col-lg-3">
        
        <img src="img/sociedad.jpg" class="img img-responsive">

    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Datos del Representante del Estudiante</h4></center>
    </div>

    <form  action="validarrepresentante2.php" method="GET">    
    <table align="center" class="table">
        <tr>
            <td>
                <strong>Ingrese la Cédula del Representante: </strong><br>
                <input type="text" class="form-control" name="cedula" placeholder="Cédula del Representante" required autofocus> 

            </td>
            
        </tr>
        <tr>
            <td>
                <button class="btn btn-default form-control fondogris letraroja btn-lg" type="submit">Buscar</button>   
            </td>
        </tr>


    </table>    
                    
    </form>

    </div>
    <div class="col hidden-xs hidden-sm col-md-3 col-lg-3">
        <img src="img/114.jpg" class="img img-responsive">

    </div>
    </div>

    
    <br><br>

 
    
            </div>
            
        </div>
        <!-- Portfolio Section -->
        <div class="row">
           <div class="col-md-12">
                         
           </div>
        </div>
        <!-- /.row -->

       <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Ministerio del Poder Popular para la Educación Universitaria, Ciencia y Tecnología
                    <br>Unidad Educativa "Dr. José Manuel Siso Martínez". - Copyright &copy; 2016
                </div>
            </div>
        </footer>

    </div>
    ';
    ?>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>

</html>
