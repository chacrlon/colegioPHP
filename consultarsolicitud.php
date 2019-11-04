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

    

    if(!isset($_GET['idsolicitud'])){
         echo "<script language='javascript'>window.location.href='resultadosolicitud.php';</script>"; 
    }

    $idsolicitud=$_GET['idsolicitud'];

    $sql = "SELECT * FROM solicitudes INNER JOIN estudiante ON solicitudes.id_estudiante=estudiante.id_estudiante WHERE estudiante.cedula='$idsolicitud'";
    $resultado = mysql_query($sql)or die(mysql_error());

    if(mysql_num_rows($resultado) == 0){
    echo "<script language='javascript'> alert('Usted no ha realizado solicitudes o la misma fue rechazada... Intente inscribirse nuevamente');</script>";              
           echo "<script language='javascript'>window.location.href='resultadosolicitud.php';</script>"; 
    }
    else{
          
      if($resultado = mysql_query($sql)){
        
        while($fila = mysql_fetch_array($resultado)){
            
         $idsol=$fila["id_solicitud"];
          $fecha_solicitud = $fila["fecha_solicitud"];
          $hora_solicitud = $fila["hora_solicitud"];
          $anio= $fila["anio"];
          $nombre1 = $fila["nombre1"];
          $nombre2 = $fila["nombre2"];
          $apellido1= $fila["apellido1"];
          $apellido2= $fila["apellido2"];
          $cedula= $fila["cedula"];
          $sexo= $fila["sexo"];
          $fecha_nacimiento= $fila["fecha_nacimiento"];
          $nacionalidad= $fila["nacionalidad"];
          $celular=$fila["celular"];
          $telefono_habitacion=$fila["telefono_habitacion"];
          $correo=$fila["correo"];
          $direccion=$fila["direccion"];
          $ruta=$fila["ruta"];
          $status=$fila["status"];
          $fecha = time()-strtotime($fecha_nacimiento);
          $edad = floor($fecha / 31556926);
          $status_solicitud1=$fila["status_solicitud"];
          $plantel_procedencia1=$fila["plantel_procedencia"];
          $id_repre=$fila["id_representante"];
          if($status_solicitud1==0){
            $status_solicitud2="En Espera";
          }
          else{
            $status_solicitud2="Aprobada";
          }
            
          if($status==1){
            $status2="Activo";
          }
          else{
            $status2="Inactivo";
          }      
           
          echo'


         


    <br><br>
 
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Solicitud Nº '.$idsol.'</h4></center>
    </div>
   
    <form  action="modificarestu.php" method="POST" enctype = "multipart/form-data" >        
                     
                        <table class="table">
                         <tr>
                                <td rowspan="3">
                                    <br>
                                    <center><span class="letraroja" ><strong>Foto de Identificación </strong> </span> 
                                    <br>
                                    <img src="'.$ruta.'" class="cargarimagen"></center>

                                </td>

                                <td>
                                    &nbsp; 
                                    <input type="hidden" name="id_nuevo" value="'.$idsol.'">
                                  
                                </td>
                                <td>
                                    
                                    &nbsp;
                                </td>
                                <td>
                                    
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Fecha de Solicitud</strong>
                                    <input type="text" class="form-control" name="fecha_solicitud" placeholder="Fecha de Solicitud" value="'.$fecha_solicitud.'" disabled required autofocus> 
                                </td>
                                <td>
                                    <strong>Hora de Solicitud</strong>
                                    <input type="text" class="form-control" name="hora_solicitud" placeholder="Hora de Solicitud" value="'.$hora_solicitud.'" disabled autofocus> 
                                </td>
                                <td>
                                    <strong>Status de Solicitud</strong>
                                    <input type="text" class="form-control" name="status_solicitud" placeholder="Status de Solicitud" value="'.$status_solicitud2.'" required disabled autofocus> 
                                </td>
                                <td>
                                    <strong>Año de Solicitud</strong>
                                       <select name="anio" class="form-control" id="anio" disabled>
                                            ';

                                            $sql2 = "SELECT * FROM anio WHERE id_anio='$anio'";
                                            $resultado2 = mysql_query($sql2)or die(mysql_error());  
                                            if(mysql_num_rows($resultado2) == 0){
                                                echo "<script language='javascript'> alert('No hay años registrados en el sistema');</script>";              
                                                echo "<script language='javascript'>window.location.href='index.php';</script>"; 
                                            }
                                            else{
                                                if($resultado2 = mysql_query($sql2)){
                                                     while($fila = mysql_fetch_array($resultado2)){
                                                        $nombreanio=$fila['nombre_anio'];
                                                        $idanio=$fila['id_anio'];

                                                        echo' 
                                                        <option value="'.$idanio.'">'.$nombreanio.' </option>
                                                        ';

                                                    }
                                                }
                                            }
                                            $sql2 = "SELECT * FROM anio WHERE id_anio!='$anio'";
                                            $resultado2 = mysql_query($sql2)or die(mysql_error());  
                                            if(mysql_num_rows($resultado2) == 0){
                                                echo "<script language='javascript'> alert('No hay años registrados en el sistema');</script>";              
                                                echo "<script language='javascript'>window.location.href='index.php';</script>"; 
                                            }
                                            else{
                                                if($resultado2 = mysql_query($sql2)){
                                                     while($fila = mysql_fetch_array($resultado2)){
                                                        $nombreanio=$fila['nombre_anio'];
                                                        $idanio=$fila['id_anio'];

                                                        echo' 
                                                        <option value="'.$idanio.'">'.$nombreanio.' </option>
                                                        ';

                                                    }
                                                }
                                            }
                                            echo'
                                            
                                    
                                            </select>';
                                    
                                                echo'
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Primer Nombre</strong>
                                    <input type="text" class="form-control" name="fecha_solicitud" placeholder="Fecha de Solicitud" value="'.$nombre1.'" disabled required autofocus> 
                                </td>
                                <td>
                                    <strong>Segundo Nombre</strong>
                                    <input type="text" class="form-control" name="nombre2" placeholder="Segundo Nombre" value="'.$nombre2.'" disabled autofocus> 
                                </td>
                                <td>
                                    <strong>Primer Apellido</strong>
                                    <input type="text" class="form-control" name="apellido1" placeholder="Primer Apellido" value="'.$apellido1.'" required disabled autofocus> 
                                </td>
                                <td>
                                    <strong>Segundo Apellido</strong>
                                    <input type="text" class="form-control" name="apellido2" placeholder="Segundo Apellido" value="'.$apellido2.'" disabled autofocus> 
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <strong>Cédula</strong>
                                    <input type="text" class="form-control" name="cedula" placeholder="Cédula" value="'.$cedula.'" required disabled autofocus> 
                                </td>
                                <td>
                                <strong>Sexo</strong>
                                    <select name="sexo" required class="form-control" disabled>
                                        <option value="'.$sexo.'">'.$sexo.'</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>

                                    </select>
                                    
                                </td>
                                <td>
                                    <strong>Fecha de Nacimiento</strong>
                                    <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" value="'.$fecha_nacimiento.'" disabled required autofocus>
                                </td>
                                <td>
                                    <strong>Nacionalidad</strong>
                                    <select name="nacionalidad" required class="form-control" disabled>
                                        <option value="'.$nacionalidad.'">'.$nacionalidad.'</option>
                                        <option value="Venezolano(a)">Venezolano(a)</option>
                                        <option value="Extranjero(a)">Extranjero(a)</option>

                                    </select>

                                </td>
                                <td>
                                    <strong>Edad</strong>
                                    <input type="text" class="form-control" name="edad" placeholder="Edad"  value="'.$edad.'" disabled required autofocus> 
                                </td>
                            </tr>

                            <tr>
                                
                                <td>
                                    <strong>Teléfono Celular</strong>
                                    <input type="text" class="form-control" name="telefono_celular" placeholder="Teléfono Celular"  value="'.$celular.'" required disabled autofocus> 
                                </td>
                                <td>
                                    <strong>Teléfono de Habitación</strong>
                                    <input type="text" class="form-control" name="telefono_habitacion" placeholder="Teléfono de Habitación" value="'.$telefono_habitacion.'" required disabled autofocus> 
                                </td>
                                <td colspan="3">
                                <strong>Correo</strong>
                                    <input type="email" class="form-control" name="correo" placeholder="Correo" value="'.$correo.'"  disabled autofocus required> 
                                </td>
                                
                                
                            </tr>
                            <tr>
                            <td colspan="2">
                                    <strong>Plantel de Procedencia</strong>
                                    <input type="text" class="form-control" name="plantel" placeholder="Plantel"  value="'.$plantel_procedencia1.'" disabled required autofocus> 
                                </td>
                            <td colspan="3">
                                   <strong>Dirección</strong>
                                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="'.$direccion.'" disabled autofocus required> 

                                </td>
                                
                                
                                
                                
                                
                                
                            </tr>
                            
                        
                        </table>         
                        </form>
               





          ';  
} }}


 $sql = "SELECT * FROM representante WHERE id_representante='$id_repre'";


  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
        echo'     



        ';

    }
    else{
            if($resultado = mysql_query($sql)){
        
        while($fila = mysql_fetch_array($resultado)){
            
         $idest_representante=$fila["id_representante"];
          $nombre1_representante = $fila["nombre1_representante"];
          $nombre2_representante = $fila["nombre2_representante"];
          $apellido1_representante= $fila["apellido1_representante"];
          $apellido2_representante= $fila["apellido2_representante"];
          $cedula_representante= $fila["cedula_representante"];
          $sexo_representante= $fila["sexo_representante"];
          $fecha_nacimiento_representante= $fila["fechan_representante"];
          $nacionalidad_representante= $fila["nacionalidad_representante"];
          $celular_representante=$fila["telefono_representante"];
          $correo_representante=$fila["correo_representante"];
          $direccion_representante=$fila["direccion_representante"];
          $ruta=$fila["ruta_representante"];
       
          $fecha_representante = time()-strtotime($fecha_nacimiento_representante);
          $edad_representante = floor($fecha_representante / 31556926);
            
        
          echo'
          
    <br>
 
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Datos del Representante</h4></center>
    </div>
   
    <form  action="modificarestu.php" method="POST" enctype = "multipart/form-data" >        
                     
                        <table class="table">
                        <tr>
                                <td rowspan="3">
                                    <br>
                                    <center><span class="letraroja" ><strong>Foto de Identificación </strong> </span> 
                                    <br>
                                    <img src="'.$ruta.'" class="cargarimagen"></center>

                                </td>

                                <td>
                                    &nbsp; 
                                    <input type="hidden" name="id_nuevo" value="'.$idest_representante.'">
                                  
                                </td>
                                <td>
                                    
                                    &nbsp;
                                </td>
                                <td>
                                    
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Primer Nombre</strong>
                                    <input type="text" class="form-control" name="nombre1" placeholder="Primer Nombre" value="'.$nombre1_representante.'" required disabled autofocus> 
                                </td>
                                <td>
                                    <strong>Segundo Nombre</strong>
                                    <input type="text" class="form-control" name="nombre2"  value="'.$nombre2_representante.'" disabled autofocus> 
                                </td>
                                <td>
                                    <strong>Primer Apellido</strong>
                                    <input type="text" class="form-control" name="apellido1" placeholder="Primer Apellido" value="'.$apellido1_representante.'" disabled required autofocus> 
                                </td>
                                <td>
                                    <strong>Segundo Apellido</strong>
                                    <input type="text" class="form-control" name="apellido2"  value="'.$apellido2_representante.'" disabled autofocus> 
                                </td>
                            </tr>
                             <tr>
                            
                                <td>
                                    <strong>Cédula</strong>
                                    <input type="text" class="form-control" name="cedula" placeholder="Cédula" value="'.$cedula_representante.'" disabled required autofocus> 
                                </td>
                                <td>
                                <strong>Sexo</strong>
                                    <select name="sexo" required disabled class="form-control">
                                        <option value="'.$sexo_representante.'">'.$sexo_representante.'</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>

                                    </select>
                                    
                                </td>
                                <td>
                                    <strong>Fecha de Nacimiento</strong>
                                    <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" disabled value="'.$fecha_nacimiento_representante.'" required autofocus>
                                </td>
                                <td>
                                    <strong>Nacionalidad</strong>
                                    <select name="nacionalidad" required class="form-control" disabled>
                                        <option value="'.$nacionalidad_representante.'">'.$nacionalidad_representante.'</option>
                                        <option value="Venezolano(a)">Venezolano(a)</option>
                                        <option value="Extranjero(a)">Extranjero(a)</option>

                                    </select>

                                </td>


                            </tr>

                            <tr>
                            <td>
                                    <strong>Edad</strong>
                                    <input type="text" class="form-control" name="edad_representante" placeholder="Edad" disabled  value="'.$edad_representante.'" required autofocus> 
                                </td>
                                <td>
                                    <strong>Teléfono Celular</strong>
                                    <input type="text" class="form-control" name="telefono_celular" placeholder="Teléfono Celular" disabled  value="'.$celular_representante.'" required autofocus> 
                                </td>
                                
                                <td >
                                <strong>Correo</strong>
                                    <input type="email" class="form-control" name="correo" placeholder="Correo" disabled value="'.$correo_representante.'" autofocus required> 
                                </td>
                                <td colspan="2">
                                   <strong>Dirección</strong>
                                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" disabled value="'.$direccion_representante.'" autofocus required> 

                                </td>
                                
                            </tr>
                            
                           
                        

                        </form>
                        <tr>

                                <td colspan="5">';
                                echo '<br>';
                                    
                                                if($status_solicitud1==0){
                                               
                                                    echo '<div class="alert alert-warning" role="alert"><span><strong>Resultado:</strong></span> Su Solicitud se encuentra activa, pero aún no ha sido aprobada...</div>';
                                                }
                                               if($status_solicitud1==1){
                                                   
                                                   echo '<div class="alert alert-info" role="alert"><span><strong>Resultado:</strong></span> Su Solicitud ya fue aprobada... Usted ya está inscrito en la Institución... Asegurese de entregar los requisitos de su Año!!!</div>';
                                                }
                                                
                                            
                                    echo'
                                </td>
                            </tr>
               
</table>  




          ';  
} }
    }       

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
