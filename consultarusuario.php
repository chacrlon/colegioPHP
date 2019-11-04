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
      
      function validar(){
        //Validacion de Contraseñas para que sean iguales
        var clave1= document.cambiarclave.clavenueva1.value
        var clave2= document.cambiarclave.clavenueva2.value
        var contador=0;
         
        if(clave1==clave2){
          return true;
        }
        else{
         
            alert("Las Claves Introducidas no Coinciden...");
             return false;
        
        }
      }
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

    $email=$_POST['buscar'];

        
      $sql = "SELECT * FROM usuario WHERE nombre_usuario='$email'";


  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
    
     
     echo "<script language='javascript'> alert('Este Usuario no se encuentra registrado!');</script>"; 
      echo "<script language='javascript'>window.location.href='Usuario.php';</script>"; 

  
       
  }
  else{
          
      if($resultado = mysql_query($sql)){
        
        while($fila = mysql_fetch_array($resultado)){
            
         $id_usuario=$fila["id_usuario"];
          $nombre_usuario = $fila["nombre_usuario"];
          $clave_usuario = $fila["clave_usuario"];
         
          $tipo_usuario= $fila["tipo_usuario"];
          $status=$fila["status"];
          $pregunta_seguridad=$fila["pregunta_seguridad"];
      
          if($status==1){
            $status2="Activo";
          }
          else{
            $status2="Inactivo";
          }    

          if($tipo_usuario=="Docente"){
            $tipo_usuario2="Docente";
          }  
          if($tipo_usuario=="SuperUser"){
            $tipo_usuario2="Súper Usuario";
          }  
          if($tipo_usuario=="Estudiante"){
            $tipo_usuario2="Estudiante";
          }  


           echo'     
           <form  action="consultarusuario.php" method="POST">    
    <table align="right">
        <tr>
            <td>
                
                <input type="email" class="form-control" name="buscar" placeholder="Buscar" required autofocus> 

            </td>
            <td>
                <button class="btn btn-default btn-lg fondogris letraroja " type="submit">Buscar</button>   
            </td>
        </tr>


    </table>    
                    
    </form>

    <br><br><br>
 
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Planilla de Datos de Usuario</h4></center>
    </div>
    <form  action="modificarusuario.php" method="POST"  name="cambiarclave">        
                    
                        <table class="table">
                            <tr>
                                
                                <td>
                                    <strong>Nombre de Usuario</strong>
                                    <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                                    <input type="email" class="form-control" name="nombre_usuario" value="'.$nombre_usuario.'" placeholder="Nombre de Usuario" autofocus required> 
                                    
                                </td>
                                <td>
                                <strong>Tipo de Usuario</strong>
                                     <select name="tipo" required class="form-control" disabled>

                                        <option value="'.$tipo_usuario.'">'.$tipo_usuario2.'</option>
                                        <option value="SuperUser" disabled>Súper Usuario</option>
                                        <option value="Administrador">Administrador</option>

                                    </select>
                                    
                                </td>                
                            </tr>
                            <tr>
                                <td>
                                <strong>Pregunta de Seguridad</strong>
                                     <input type="text" class="form-control" name="pregunta" value="'.$pregunta_seguridad.'" placeholder="Pregunta de Seguridad" autofocus required> 
                                    
                                </td>
                                <td>
                                <strong>Status</strong>
                                   <select name="status" required class="form-control">

                                        <option value="'.$status.'">'.$status2.'</option>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>

                                    </select>
                                </td>
                                
                            </tr>
                            
                             
                             
                            <tr>
                                <td colspan="2">
                                
                                    <button class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit">Guardar Cambios</button>   
                                </td>
                                
                                
                            </tr>
                            <tr>
                             <td >
                                    <button type="button" class="btn btn-default btn-block btn-lg  fondogris letraroja"  data-toggle="modal" data-target="#myModal">Cambiar Pregunta</button>
                                     
                                </td>
                                <td >
                                
                                    <button type="button" class="btn btn-default btn-block btn-lg  fondogris letraroja"  data-toggle="modal" data-target="#myModal2">Cambiar Clave</button>  
                                </td>

                            </tr>
                            

                        </table>         
                        
                </form>
    ';
} }}


//inicio modal
    echo '


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header fondorojo letrablanca">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title " id="myModalLabel">Planilla de Cambio de Pregunta de Seguridad</h4></center>
            </div>
            <div class="modal-body">

    
    <form  action="modificarpregunta.php" method="POST" name="cambiarclave">        
                    
                        <table class="table">
                            <tr>
                                
                                <td>
                                    <strong>Pregunta de Seguridad</strong>
                                    <input type="text" class="form-control" name="pregunta" placeholder="Nueva Pregunta de Seguridad" autofocus required> 
                                    <input type="hidden"  name="id_usuario2"  value="'.$id_usuario.'"> 
                                    <input type="hidden"  name="nombre_usuario2"  value="'.$nombre_usuario.'"> 

                                </td>
                                <td>
                                    <strong>Respuesta a la Pregunta</strong>
                                    <input type="text" class="form-control" name="respuesta" placeholder="Respuesta a la Pregunta" autofocus required> 
                                   
                                </td>

                                
                                
                                
                            </tr>
                             
                             
                            <tr>
                                <td colspan="4">
                                
                                    <button class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit">Guardar</button>   
                                </td>
                            </tr>
                            

                        </table>         
                        
                </form>


            </div>       
        </div>
    </div>
</div> 

';



//finmodal



//inicio modal2
    echo '


    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header fondorojo letrablanca">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title " id="myModalLabel">Planilla de Cambio de Clave</h4></center>
            </div>
            <div class="modal-body">

    
    <form  action="modificarclave.php" method="POST" onSubmit="return validar();" name="cambiarclave">        
                    
                        <table class="table">
                            <tr>
                                
                                <td>
                                    <strong>Contraseña</strong>
                                    <input type="password" class="form-control" name="clavenueva1" placeholder="Nueva Contraseña" autofocus required> 
                                    <input type="hidden"  name="id_usuario2"  value="'.$id_usuario.'"> 
                                    <input type="hidden"  name="nombre_usuario2"  value="'.$nombre_usuario.'"> 

                                </td>
                                <td>
                                    <strong>Repita la Contraseña</strong>
                                    <input type="password" class="form-control" name="clavenueva2" placeholder="Repita la Nueva Contraseña" autofocus required> 
                                   
                                </td>

                                
                                
                                
                            </tr>
                             
                             
                            <tr>
                                <td colspan="4">
                                
                                    <button class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit">Guardar</button>   
                                </td>
                            </tr>
                            

                        </table>         
                        
                </form>


            </div>       
        </div>
    </div>
</div> 

';



//finmodal2
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

   

</body>

</html>
