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

        $tipoU = Autenticado();
        if($tipoU != "SuperUser"){
            echo "<script language='javascript'> alert('Usuario sin permisos para esta acción!'); window.history.go(-1);</script>";
        }

        $conexion = Conectar();
        $db = mysql_select_db("UEDrJoseManuelSisoMartinez",$conexion)or die("Error al elegir la base de datos");

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
<br><br><br>
    <!-- Header Carousel -->
    
   
    <!-- Page Content -->
   <div class="container">
    <br><br>
        <!-- /.row -->
        <div class="row" >
           
            <div class="col-md-12" >                
                
                <?php

                    
    $idestudiante=$_POST['idestudiante'];
    $aniosol=$_POST['idanio'];
    $condicion=$_POST['condicion'];
    $idseccionant=$_POST['idseccion'];
    $idperiodoant=$_POST['idperiodo'];

    echo'

    <br><br><br><br>
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Seleccione el Período</h4></center>
    </div>
          
          
                        <table class="table table-responsive">

                        <tr>
                            <td>
                                <strong><span class="letraroja">Nombre o Código del Período</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Fecha de Inicio</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Fecha de Cierre</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Opción</span></strong>
                            </td>



                        </tr>
    ';

    date_default_timezone_set("America/Caracas");
    $fechaactual=date("Y-m-d");
    $sql = "SELECT * FROM periodo WHERE status_periodo='Activo' AND fecha_final>'$fechaactual' ORDER BY id_periodo DESC";
    $resultado = mysql_query($sql)or die(mysql_error());

    if(mysql_num_rows($resultado) == 0){
    echo "<script language='javascript'> alert('No hay periodos Disponibles... Por favor habrá un nuevo período');</script>";              
           echo "<script language='javascript'>window.location.href='bienvenido.php';</script>"; 
    }
    else{
          
      if($resultado = mysql_query($sql)){
        
        while($fila = mysql_fetch_array($resultado)){
            
         $idperiodo=$fila["id_periodo"];
         
          $nombre_periodo = $fila["nombre_periodo"];
          $fecha_comienzo = $fila["fecha_comienzo"];
          $fecha_final= $fila["fecha_final"];
           
          echo'

    <form  action="Inscribir.php" method="POST" enctype = "multipart/form-data" > 
                            <tr>
                                <td>
                                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                
                                <input type="hidden" name="idaniosol" value="'.$aniosol.'">
                                <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
                                <input type="hidden" name="idseccionant" value="'.$idseccionant.'">
                                <input type="hidden" name="condicion" value="'.$condicion.'">
                                  <input type="hidden" name="idperiodoant" value="'.$idperiodoant.'">  
                                    <span class="letraroja">'.$nombre_periodo.'</span>
                                </td>
                                <td>
                                   
                                    '.$fecha_comienzo.'
                                </td>
                            
                                <td>
                                    
                                    '.$fecha_final.'
                                </td>
                                
                                <td>
                                    <input type="submit" value="Seleccionar" class="btn btn-default form-control fondogris letraroja">
                                </td>
                            </tr>

                            </form>

                            
                            
          ';  
} }}


echo'

<tr>
                                <td colspan="4">
                                    <br>
                                    <form  action="veraprobados.php" method="POST" "> 
                                        <input type="hidden" name="idseccion" value="'.$idseccionant.'"> 
                                        <input type="hidden" name="idperiodo" value="'.$idperiodo.'"> 
                                        <input type="hidden" name="idanio" value="'.$aniosol.'"> 
                                        <center><input type="submit" value="Regresar" class="btn btn-default form-control fondogris letraroja "></center>
                                    </form>
                                </td>
                            

                            </tr>

                            
</table>         
                        ';
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
            <div class="col-lg-12 text-center">
                    
                    <p>Ministerio del Poder Popular para la Educación Universitaria, Ciencia y Tecnología
                    <br>Unidad Educativa "Dr. José Manuel Siso Martínez". - Copyright &copy; 2016
                    
                </div>
        </footer>

    </div>
    <!-- /.container -->

    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    
</body>

</html>
