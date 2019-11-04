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
    
    

                
    $id_usuario=$_POST['id_usuario'];
    $respuesta=$_POST['respuesta'];

        
      $sql = "SELECT nombre_usuario, clave_usuario, respuesta_seguridad FROM usuario WHERE id_usuario='$id_usuario'";


  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
    
     
     echo "<script language='javascript'> alert('Este Usuario no se encuentra registrado!');</script>"; 
      echo "<script language='javascript'>window.location.href='index.php';</script>"; 

  
       
  }
  else{
          
      if($resultado = mysql_query($sql)){
        
        while($fila = mysql_fetch_array($resultado)){
            
       
          $respuesta_seguridad = $fila["respuesta_seguridad"];
          $nombre_usuario = $fila["nombre_usuario"];
          $clave_usuario= $fila["clave_usuario"];
         
          if($respuesta_seguridad==$respuesta){
                     echo'     

    <br><br><br>
 
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Datos de la Cuenta</h4></center>
    </div>
    
                        <table class="table">
                            <tr>
                                
                                <td>
                                    <strong>Usuario</strong>
                                    '.$nombre_usuario.'
                                    
                                </td>
                                <td>
                                <strong>Contraseña</strong>
                                    '.$clave_usuario.'
                                    
                                </td>                
                            </tr>

                            

                        </table>         
                        
              
    ';


          }
          else{

            echo "<script language='javascript'> alert('No se pudó procesar la Recuperación de Contraseña. La Respuesta es Incorrecta!');</script>"; 
      echo "<script language='javascript'>window.location.href='index.php';</script>"; 
          }
          
} }}



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
