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
    <script type="text/javascript">
      

      function confirmardenegacion(){
        if(confirm("Seguro que desea rechazar esta solicitud?")){
            return true;
        }
        else{
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

                    

    if(!isset($_POST['idsolicitud'])){
         echo "<script language='javascript'>window.location.href='listadosolicitudes.php';</script>"; 
    }

    $idsolicitud=$_POST['idsolicitud'];

    $sql = "SELECT * FROM solicitudes INNER JOIN estudiante ON solicitudes.id_estudiante=estudiante.id_estudiante WHERE solicitudes.id_solicitud='$idsolicitud'";
    $resultado = mysql_query($sql)or die(mysql_error());

    if(mysql_num_rows($resultado) == 0){
    echo "<script language='javascript'> alert('No hay solicitudes nuevas...');</script>";              
           echo "<script language='javascript'>window.location.href='bienvenido.php';</script>"; 
    }
    else{
          
      if($resultado = mysql_query($sql)){
        
        while($fila = mysql_fetch_array($resultado)){
        $idest=$fila["id_estudiante"];
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
                                            </select>
                                    
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
                            
                                <td colspan="2">
                                  <br>
                                    <form  action="aprobars.php" method="POST" > 
                                        <input type="hidden" name="idsolapro" value="'.$idsol.'">
                                        <input type="hidden" name="idestudiante" value="'.$idest.'">
                                        <input type="hidden" name="aniosol" value="'.$anio.'"> 
                                        <input type="submit" value="Aprobar Solicitud" class="btn btn-default form-control fondogris letraroja" >
                                    </form>

                                    

                                </td>
                                <td colspan="2">
                                   <br>
                                    <form  action="rechazars.php" method="POST" onsubmit="return confirmardenegacion()"> 
                                        <input type="hidden" name="idsolapro" value="'.$idsol.'"> 
                                        <input type="hidden" name="idestudiante" value="'.$idest.'">
                                        <input type="hidden" name="aniosol" value="'.$anio.'"> 
                                        <input type="submit" value="Denegar Solicitud" class="btn btn-default form-control fondogris letraroja ">
                                    </form>

                                </td>
                                <td>
                                   <br>
                                    <a href="listadosolicitudes.php" class="btn btn-default form-control fondogris letraroja ">Regresar</a>
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
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
