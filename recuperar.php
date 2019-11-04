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
    <nav class="navbar navbar-inverse fondorojo " role="navigation" >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Misión Sucre</a>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Programas Nacionales de Formación <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.html">Informática</a>
                            </li>
                            <li>
                                <a href="blog-home-2.html">Administración</a>
                            </li>
                            <li>
                                <a href="blog-post.html">Gestión Ambiental</a>
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
    
    

                
    $email=$_POST['email'];

        
      $sql = "SELECT * FROM usuario WHERE nombre_usuario='$email'";


  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
    
     
     echo "<script language='javascript'> alert('Este Usuario no se encuentra registrado!');</script>"; 
      echo "<script language='javascript'>window.location.href='index.php';</script>"; 

  
       
  }
  else{
          
      if($resultado = mysql_query($sql)){
        
        while($fila = mysql_fetch_array($resultado)){
            
         $id_usuario=$fila["id_usuario"];
          $pregunta_seguridad = $fila["pregunta_seguridad"];
          $respuesta_seguridad = $fila["respuesta_seguridad"];
         

           echo'     

    <br><br><br>
 
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Planilla de Recuperación de Contraseña</h4></center>
    </div>
    <form  action="consultarpregunayrespuesta.php" method="POST"  name="cambiarclave">        
                    
                        <table class="table">
                            <tr>
                                
                                <td>
                                    <strong>Pregunta de Seguridad</strong>
                                    <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                                    <input type="text" class="form-control" name="pregunta" value="'.$pregunta_seguridad.'" placeholder="Pregunta de Seguridad" disabled autofocus required> 
                                    
                                </td>
                                <td>
                                <strong>Respuesta a la Pregunta</strong>
                                     <input type="text" class="form-control" name="respuesta"  placeholder="Ingrese la Respuesta de la Pregunta" autofocus required> 
                                    
                                </td>                
                            </tr>

                            <tr>
                                <td colspan="2">
                                
                                    <button class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit">Enviar</button>   
                                </td>
                            </tr>
                            

                        </table>         
                        
                </form>
    ';
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
