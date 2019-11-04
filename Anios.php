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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>
    
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
                    <li >
                        <a href="listadosolicitudes.php">Solicitudes</a>
                    </li>
                    <li>
                        <a href="Gestionarinscripcion.php">Inscripciones</a>
                       
                    </li>
                    <li >
                        <a href="Estudiante2.php">Estudiantes</a>
                    </li>
                    <li>
                        <a href="Docentes.php">Docentes</a>
                    </li>
                     <li>
                        <a href="consultarperiodo.php">Periodos</a>
                    </li>
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
<br><br><br>
    <!-- Header Carousel -->
    


   

   
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
    
     if(!Autenticado()){
 
      echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.history.go(-1);</script>";
    }
    $tipoU = Autenticado();
    if($tipoU != "SuperUser"){
      echo "<script language='javascript'> alert('Usuario sin permisos para esta acción!'); window.history.go(-1);</script>";
    }

                
    echo'     
    


    <br><br><br><br>
    <div class="row">

 <div class="col hidden-xs hidden-sm col-md-3 col-lg-3">
        <img src="img/periodos.gif" class="img img-responsive">

    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Planilla para agregar un Nuevo Año</h4></center>
    </div>
    <form  action="registraranio.php" method="POST" name="agregarperiodo">        
                    
                        <table class="table">

                            <tr>
                                
                                <td>
                                    <strong>Código del Año</strong>
                                    <input type="text" class="form-control" name="codigoanio" placeholder="Código del Año" autofocus required> 
                                </td>
                                <td>
                                    <strong>Nombre del Año</strong>
                                    <input type="text" class="form-control" name="nombreanio" placeholder="Nombre del Año" autofocus required> 
                                </td>
                            <tr>
                           
                    
                            <tr>
                                <td >
                                
                                    <button class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit">Agregar Año</button>   
                                </td>
                                <td >
                                
                                    <a href="consultaranio.php" class="btn btn-default btn-lg btn-block fondogris letraroja ">Cancelar</a> 
                                </td>
                                
                            </tr>
                            

                        </table>         
                        
                </form>
                </div
    ';

echo '
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
';

echo "
     <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

";
   



                ?>
                
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
                    <br>
                    <p>Ministerio del Poder Popular para la Educación Universitaria, Ciencia y Tecnología
                    <br>Unidad Educativa "Dr. José Manuel Siso Martínez". - Copyright &copy; 2016</P>
                    
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
