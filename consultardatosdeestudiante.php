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


    if(!isset($_GET['idsolicitud'])){
         echo "<script language='javascript'>window.location.href='Estudiante2.php';</script>"; 
    }
    else{
        $idsolicitud=$_GET['idsolicitud'];
    }

    

    $sql = "SELECT * FROM inscripciones INNER JOIN estudiante ON estudiante.id_inscripcion=inscripciones.id_inscripcion INNER JOIN anio ON anio.id_anio=inscripciones.id_anio INNER JOIN periodo ON periodo.id_periodo=inscripciones.id_periodo INNER JOIN seccion ON seccion.id_seccion=inscripciones.id_seccion WHERE estudiante.cedula='$idsolicitud'";
    $resultado = mysql_query($sql)or die(mysql_error());

    if(mysql_num_rows($resultado) == 0){
    echo "<script language='javascript'> alert('Este estudiante no se encuentra registrado');</script>";              
           echo "<script language='javascript'>window.location.href='Estudiante2.php';</script>"; 
    }
    else{
          
      if($resultado = mysql_query($sql)){
        
        while($fila = mysql_fetch_array($resultado)){
            //Datos del Estudiante
        $idestudiantenn=$fila["id_estudiante"];
          $nombre1 = $fila["nombre1"];
          $nombre2 = $fila["nombre2"];
          $apellido1= $fila["apellido1"];
          $apellido2= $fila["apellido2"];
          $cedulann= $fila["cedula"];
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
          
          $plantel_procedencia1=$fila["plantel_procedencia"];
          $id_repre=$fila["id_representante"];  
          if($status==1){
            $status2="Activo";
          }
          else{
            $status2="Inactivo";
          } 

          $nombreaniocursante=$fila["nombre_anio"];  
          $nombreperiodocursante=$fila["nombre_periodo"];
          $nombreseccioncursante=$fila["nombre_seccion"];   

           
          echo'


         


    <br><br>
 
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Consulta de Datos de Estudiante</h4></center>
    </div>
   
    <form  action="modificarestu.php" method="POST" enctype = "multipart/form-data" >        
                     
                        <table class="table">
                         <tr>
                                <td rowspan="3">
                                    <br>
                                    <input type="hidden" name="idestudiantemod" value="'.$idestudiantenn.'">
                                    <center><span class="letraroja" ><strong>Foto de Identificación </strong> </span> 
                                    <br>
                                    <img src="'.$ruta.'" class="cargarimagen"></center>

                                </td>

                                <td>
                                    &nbsp; 
                                    
                                  
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
                                <strong>Status del Estudiante</strong>
                                    <select name="statusestudiante" class="form-control" required>
                                    ';
                                        if($status==1){
                                            echo' <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                            ';
                                        }
                                        else{
                                            echo' <option value="0">Inactivo</option>
                                            <option value="1">Activo</option>
                                            ';
                                        }


                                    echo'
                                    
                                    
                                    </select
                                </td>
                                
                                <td>
                                    <strong>Período Cursante</strong>
                                    ';
                                    if($status2=="Inactivo"){
                                        $period="Ninguno";
                                        
                                    }
                                    else{
                                        $period=$nombreperiodocursante;
                                    }
                                    echo'
                                        <input type="text" class="form-control" name="periodocursante" placeholder="Período Cursante" value="'.$period.'" disabled autofocus> 
                                        ';
                                    echo'
                                    
                                </td>
                                <td>
                                    <strong>Año Cursante</strong>
                                    ';
                                    if($status2=="Inactivo"){
                                        $ani="Ninguno. Quedó Cursando ".$nombreaniocursante;
                                        
                                    }
                                    else{
                                        $ani=$nombreaniocursante;
                                    }
                                    echo'
                                        <input type="text" class="form-control" name="aniocursante" placeholder="Año Cursante" value="'.$ani.'" disabled autofocus> 
                                        ';
                                    echo'
                                    
                                </td>
                                <td>
                                    <strong>Sección Cursante</strong>
                                    ';
                                    if($status2=="Inactivo"){
                                        $secc="Ninguno";
                                        
                                    }
                                    else{
                                        $secc=$nombreseccioncursante;
                                    }
                                    echo'
                                        <input type="text" class="form-control" name="seccioncursante" placeholder="Sección Cursante" value="'.$secc.'" disabled autofocus> 
                                        ';
                                    echo'
                                    
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <strong>Primer Nombre</strong>
                                    <input type="text" class="form-control" name="nombre1" placeholder="Primer Nombre" value="'.$nombre1.'" required autofocus> 
                                </td>
                                <td>
                                    <strong>Segundo Nombre</strong>
                                    <input type="text" class="form-control" name="nombre2" placeholder="Segundo Nombre" value="'.$nombre2.'" autofocus> 
                                </td>
                                <td>
                                    <strong>Primer Apellido</strong>
                                    <input type="text" class="form-control" name="apellido1" placeholder="Primer Apellido" value="'.$apellido1.'" required autofocus> 
                                </td>
                                <td>
                                    <strong>Segundo Apellido</strong>
                                    <input type="text" class="form-control" name="apellido2" placeholder="Segundo Apellido" value="'.$apellido2.'" autofocus> 
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <strong>Cédula</strong>
                                    <input type="text" class="form-control" name="cedula" placeholder="Cédula" value="'.$cedulann.'" required autofocus> 
                                </td>
                                <td>
                                <strong>Sexo</strong>
                                    <select name="sexo" required class="form-control">
                                        <option value="'.$sexo.'">'.$sexo.'</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>

                                    </select>
                                    
                                </td>
                                <td>
                                    <strong>Fecha de Nacimiento</strong>
                                    <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" value="'.$fecha_nacimiento.'" required autofocus>
                                </td>
                                <td>
                                    <strong>Nacionalidad</strong>
                                    <select name="nacionalidad" required class="form-control">
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
                                    <input type="text" class="form-control" name="telefono_celular" placeholder="Teléfono Celular"  value="'.$celular.'" required autofocus> 
                                </td>
                                <td>
                                    <strong>Teléfono de Habitación</strong>
                                    <input type="text" class="form-control" name="telefono_habitacion" placeholder="Teléfono de Habitación" value="'.$telefono_habitacion.'" required autofocus> 
                                </td>
                                <td colspan="3">
                                <strong>Correo</strong>
                                    <input type="email" class="form-control" name="correo" placeholder="Correo" value="'.$correo.'" autofocus required> 
                                </td>
                                
                                
                            </tr>
                            <tr>
                            <td colspan="2">
                                    <strong>Plantel de Procedencia</strong>
                                    <input type="text" class="form-control" name="plantel" placeholder="Plantel"  value="'.$plantel_procedencia1.'" required autofocus> 
                                </td>
                            <td colspan="3">
                                   <strong>Dirección</strong>
                                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="'.$direccion.'" autofocus required> 

                                </td>
                                
                                
                                
                                
                                
                                
                            </tr>
                            
                            ';


                            if($tipoU=="SuperUser"){
                                echo'
                                <tr>
                                
                                    <td colspan="5">
                                      <br>
                                        <input type="submit" value="Guardar Cambios" class="btn btn-default form-control fondogris letraroja ">
                                    </td>
                                </tr>
                                '; 

                            }
                            else{
                                echo'
                                <tr>
                                
                                    <td colspan="5">
                                      <br>
                                        <input type="submit" value="Guardar Cambios" disabled="disabled" class="btn btn-default form-control fondogris letraroja ">
                                    </td>
                                </tr>
                                '; 
                            }
                             echo'
                             </form>     

                              ';


                            if($tipoU=="SuperUser"){
                                echo'
                                    <tr>
                                    
                                        <td colspan="2">
                                           <br>
                                            
                                           <a href="#modalnotas" class="btn btn-default form-control fondogris letraroja" data-toggle="modal">Ver Situación Acádemica</a>
                                        </td>
                                        <td colspan="2">
                                           <br>
                                           <form action="Historia2.php" method="GET">
                                                <input type="hidden" name="idestudiantehist" value="'.$idestudiantenn.'">
                                           <input type="submit" class="btn btn-default form-control fondogris letraroja" VALUE="Ver Historia">
                                           </form>
                                        </td>
                                        <td>
                                           <br>
                                            <a href="Estudiante2.php" class="btn btn-default form-control fondogris letraroja ">Regresar</a>
                                        </td>
                                    </tr>
                                ';
                            }
                            else{
                                echo'
                                    <tr>
                                    
                                        <td colspan="2">
                                           <br>
                                            
                                           <a href="#modalnotas" class="btn btn-default form-control fondogris letraroja" data-toggle="modal" disabled="disabled">Ver Situación Acádemica</a>
                                        </td>
                                        <td colspan="2">
                                           <br>
                                           <form action="Historia2.php" method="GET">
                                                <input type="hidden" name="idestudiantehist" value="'.$idestudiantenn.'">
                                           <input type="submit" class="btn btn-default form-control fondogris letraroja" VALUE="Ver Historia">
                                           </form>
                                        </td>
                                        <td>
                                           <br>
                                            <a href="Estudiante2.php" class="btn btn-default form-control fondogris letraroja ">Regresar</a>
                                        </td>
                                    </tr>
                                ';
                            }
                            echo'
                        </table>    
                       
                        
               





          ';  
} }}


 $sql = "SELECT * FROM representante WHERE id_representante='$id_repre'";


  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
        

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
   
    <form  action="modificarrepre.php" method="POST" enctype = "multipart/form-data" >        
                     
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
                                  <input type="hidden" name="cedulaest" value="'.$cedulann.'"> 
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
                                    <input type="text" class="form-control" name="nombre1" placeholder="Primer Nombre" value="'.$nombre1_representante.'" required autofocus> 
                                </td>
                                <td>
                                    <strong>Segundo Nombre</strong> 
                                    <input type="text" class="form-control" name="nombre2" placeholder="Segundo Nombre" value="'.$nombre2_representante.'" autofocus> 
                                </td>
                                <td>
                                    <strong>Primer Apellido</strong>
                                    <input type="text" class="form-control" name="apellido1" placeholder="Primer Apellido" value="'.$apellido1_representante.'" required autofocus> 
                                </td>
                                <td>
                                    <strong>Segundo Apellido</strong>
                                    <input type="text" class="form-control" name="apellido2"  value="'.$apellido2_representante.'" autofocus> 
                                </td>
                            </tr>
                             <tr>
                            
                                <td>
                                    <strong>Cédula</strong>
                                    <input type="text" class="form-control" name="cedula" placeholder="Cédula" value="'.$cedula_representante.'"  required autofocus> 
                                </td>
                                <td>
                                <strong>Sexo</strong>
                                    <select name="sexo" required class="form-control">
                                        <option value="'.$sexo_representante.'">'.$sexo_representante.'</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>

                                    </select>
                                    
                                </td>
                                <td>
                                    <strong>Fecha de Nacimiento</strong>
                                    <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" value="'.$fecha_nacimiento_representante.'" required autofocus>
                                </td>
                                <td>
                                    <strong>Nacionalidad</strong>
                                    <select name="nacionalidad" required class="form-control">
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
                                    <input type="text" class="form-control" name="telefono_celular" placeholder="Teléfono Celular"   value="'.$celular_representante.'" required autofocus> 
                                </td>
                                
                                <td >
                                <strong>Correo</strong>
                                    <input type="email" class="form-control" name="correo" placeholder="Correo"  value="'.$correo_representante.'" autofocus required> 
                                </td>
                                <td colspan="2">
                                   <strong>Dirección</strong>
                                    <input type="text" class="form-control" name="direccion" placeholder="Dirección"  value="'.$direccion_representante.'" autofocus required> 

                                </td>
                                
                            </tr>
                            ';


                            if($tipoU=="SuperUser"){
                                echo'
                                <tr>
                                
                                    <td colspan="5">
                                      <br>
                                        <input type="submit" value="Guardar Cambios" class="btn btn-default form-control fondogris letraroja ">
                                    </td>
                                    
                                    
                                </tr>
                                ';
                            }
                            else{
                                echo'
                                <tr>
                                
                                    <td colspan="5">
                                      <br>
                                        <input type="submit" value="Guardar Cambios" disabled="disabled" class="btn btn-default form-control fondogris letraroja ">
                                    </td>
                                    
                                    
                                </tr>
                                ';
                            }
                            echo'
                           
                        

                        </form>
                        
               
</table>  




          ';  
} }
    }       

/*

echo '


    <div class="modal fade" id="modalexpediente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header fondorojo letrablanca">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title " id="myModalLabel">Consulta de Expediente</h4></center>
            </div>
            <div class="modal-body">

';

                //Consulta de Expediente
$sql = "SELECT * FROM expediente WHERE id_estudiante='$idestudiantenn'";

  $resultado3 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado3) == 0){
    
     echo'
     <center>
     Este Estudiante no tiene expediente!
     <br><br>
     <a href="Expediente.php?id='.$idestudiantenn.'&cedula='.$cedulann.'"><button class="btn btn-default btn-lg btn-block fondogris letraroja" type="button">Registrar Expediente Ahora</button>   </a>
     </center>
    ';
  }
  else{
         
      if($resultado = mysql_query($sql)){
        
        while($fila = mysql_fetch_array($resultado)){
            
        $foto=$fila["foto"];
          $fotocopia_cedula = $fila["fotocopia_cedula"];
          $titulo_original = $fila["titulo_original"];
          $original_notas= $fila["original_notas"];
          $fondonegro_titulo= $fila["fondonegro_titulo"];
          $fondonegro_notas= $fila["fondonegro_notas"];
          echo '
            <form  action="modificarexpe.php" method="POST" >        
                     
                        <table class="table">
                        
        
                            <tr>
                            <input type="hidden" name="idestudi" value="'.$idestudiantenn.'">
                                        <input type="hidden" name="cedula" value="'.$cedulann.'">
                                ';

                                if($foto==1){
                                    echo '
                                    <td>
                                        <input type="checkbox" name="requisitos[]" value="1" checked autofocus> 
                                        
                                        <strong>Foto</strong>       
                                    </td>';
                                }
                                else{
                                    echo '
                                    <td>
                                        <input type="checkbox" name="requisitos[]" value="1"  autofocus> 
                                        
                                        <strong>Foto</strong>     
                                    </td>';
                                }
                                 


                                 if($fotocopia_cedula==1){ 
                                    echo '
                                        <td>
                                            <input type="checkbox"  name="requisitos[]" value="2" checked autofocus> 
                                           
                                            <strong>Fotocopia de la Cédula</strong>
                                        </td>
                                    ';

                                 }
                                 else{
                                    echo '
                                        <td>
                                            <input type="checkbox"  name="requisitos[]" value="2" autofocus> 
                                           
                                            <strong>Fotocopia de la Cédula</strong>
                                        </td>
                                    ';
                                 } 
                                

                                if($titulo_original==1){ 
                                    echo'
                                        <td>
                                    
                                            <input type="checkbox"  name="requisitos[]" value="3" checked autofocus> 
                                          
                                            <strong>Original del Título</strong>
                                        </td>

                                    ';
                                }
                                else{
                                     echo'
                                        <td>
                                    
                                            <input type="checkbox"  name="requisitos[]" value="3" autofocus>
                                            
                                            <strong>Original del Título</strong>
                                        </td>

                                    ';
                                }

                                
                              echo '
                                     </tr>
                                    <tr>
                              ';
                                if($original_notas==1){ 
                                    echo'
                                        <td>
                                            <input type="checkbox"  name="requisitos[]" value="4" checked autofocus>
                                           
                                            <strong>Original Notas de las Notas Certificadas</strong>
                                        </td>

                                    ';
                                }
                                else{
                                    echo'
                                        <td>
                                            <input type="checkbox"  name="requisitos[]" value="4" autofocus>
                                           
                                            <strong>Original Notas de las Notas Certificadas</strong>
                                        </td>

                                    ';
                                }

                                if($fondonegro_titulo==1){ 
                                    echo'
                                        <td>
                                   
                                            <input type="checkbox"  name="requisitos[]" value="5" checked autofocus>
                                         
                                            <strong>Fondo Negro del Título</strong> 
                                        </td>

                                    ';
                                }
                                else{
                                    echo'
                                        <td>
                                   
                                            <input type="checkbox"  name="requisitos[]" value="5" autofocus>
                                           
                                            <strong>Fondo Negro del Título</strong> 
                                        </td>

                                    ';
                                }

                                if($fondonegro_notas==1){
                                    echo '
                                       <td>
                                            <input type="checkbox"  name="requisitos[]" value="6" checked autofocus>
                                            
                                            <strong>Fondo Negro Notas de las Notas Certificadas</strong> 
                                        </td> 
                                    ';
                                }
                                else{
                                    echo '
                                       <td>
                                            <input type="checkbox"  name="requisitos[]" value="6" autofocus>

                                            <strong>Fondo Negro Notas de las Notas Certificadas</strong> 
                                        </td> 
                                    ';
                                }
                                
                                
                              echo'
                            </tr>
                            

                            
                            <tr>
                                <td colspan="3">
                                 ';
                                if($tipoU != "SuperUser"){
                                      echo'
                                    <button class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit" disabled>Guardar Cambios</button>     ';
                                  }
                                  else{
                                      echo'
                                    <button class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit">Guardar Cambios</button>     ';
                                  }

                                

                                    echo' 
                                    
                                </td>
                            </tr>
                            

                        </table>         
                        
                </form>

          ';


        }
    }
}   


echo'


            </div>       
        </div>
    </div>
</div> 

';




*/




//Consultar Notas
echo '


    <div class="modal fade" id="modalnotas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog masancha">
        <div class="modal-content">
            <div class="modal-header fondorojo letrablanca">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title " id="myModalLabel">Situación Acádemica - '.$nombre1.' '.$apellido1.' / C.I: '.$cedulann.'</h4></center>
            </div>
            <div class="modal-body">

';

                //Consulta de Expediente
/*

$sql = "select estudiante.nombre1, estudiante.nombre2, estudiante.apellido1, estudiante.apellido2, estudiante.cedula, notas.nota , materias.nombre_materia, 
materias.creditos, materias.trayecto, materias.tramo, materias.nota_minima, materias.status, carreras.nombre_carrera  FROM notas INNER JOIN materias  
ON notas.id_materia=materias.id_materia INNER JOIN carreras  ON materias.id_carrera=carreras.id_carrera INNER JOIN estudiante  ON 
estudiante.id_carrera=carreras.id_carrera where estudiante.id_estudiante='$idest'";

*/echo '<table class="table">';
                        
        
                            
$notafinalestu=0;
  $sumaanio=0;
        $contadoranio=0;
    $sqlanio="SELECT * FROM anio";
     if($resultadoanio = mysql_query($sqlanio)){
        $sumaanio=0;
        $contadoranio=0;
        while($filaanio = mysql_fetch_array($resultadoanio)){
            $idaniocon=$filaanio['id_anio'];
            $nombre_aniocon=$filaanio['nombre_anio'];

            echo'
            <tr>

                <td colspan="8" >
                    &nbsp;
                </td>

            </tr>
            <tr>

                <td colspan="8" class=" bordeazul  fondotitulos letrablanca text-center">
                    <h6> <strong>'.$nombre_aniocon.'</strong></h6>
                </td>

            </tr>

            <tr>
                
                <td>
                    
                    <strong class="letraroja">Cód.</strong>
                </td>
                <td>
                   
                    <strong class="letraroja">Materia</strong>
                </td>
                <td>
                    
                    <strong class="letraroja">Período</strong>
                </td>
                <td>
                    
                    <strong class="letraroja">Sección</strong>
                </td>
                
                <td>
                    
                    <strong class="letraroja">1er Lapso</strong>
                </td>
                 <td >
                    
                    <strong class="letraroja">2do Lapso</strong>
                </td>
                <td >
                  
                    <strong class="letraroja">3er Lapso</strong>
                </td>
                 <td class="fondogrisclaro">

                    <center><strong class="letraroja">Def.</strong></center>
                </td>

                                
            </tr>';
            $sqlmateriacon="SELECT * FROM materias WHERE id_anio='$idaniocon' ORDER BY nombre_materia ASC  ";

            if($resultadomateriacon = mysql_query($sqlmateriacon)){
        
                while($filamateriacom = mysql_fetch_array($resultadomateriacon)){
                    
                    $contadoranio=$contadoranio+1;


                    $id_materiacc=$filamateriacom["id_materia"];
                    $cod_materiacc=$filamateriacom["cod_materia"];
                    $nombre_materiacc = $filamateriacom["nombre_materia"];
                    $idaniocc= $filamateriacom["id_anio"];
                    $notaminima11=$filamateriacom["nota_minima"];


                    //comienzo segunda consulta
                    $notascc=" ";
                    $idnotacc=" ";
                      echo '
                        <tr>
                            <td>
                                <span>'.$cod_materiacc.'</span>
                            </td>
                             <td>
                                <span>'.$nombre_materiacc.'</span>
                            </td>  
                        ';
                    $sql2="SELECT * FROM inscripciones where id_estudiante='$idestudiantenn' and id_anio='$idaniocon'";
                    $resultado2=mysql_query($sql2);
                    if(mysql_num_rows($resultado2)==0){
                        echo'
                            <td>
                                &nbsp;
                            </td>  
                            <td>
                                &nbsp;
                            </td> 
                            <td>
                                &nbsp;
                            </td>  
                            <td>
                                &nbsp;
                            </td> 
                            <td>
                                &nbsp;
                            </td>  
                            <td class="fondogrisclaro">
                                &nbsp;
                            </td>  

                                
                        ';
                    }
                    if($resultado2 = mysql_query($sql2)){
                        while($fila = mysql_fetch_array($resultado2)){   
                            $idperiodocc=$fila["id_periodo"];
                            $idseccioncc=$fila["id_seccion"];
                            $notafinalestu=0;
                            $sql3 = "SELECT * FROM seccion WHERE id_seccion='$idseccioncc'";
                            if($resultado3 = mysql_query($sql3)){
                                while($fila3 = mysql_fetch_array($resultado3)){
                                    $codigoseccioncc=$fila3["cod_seccion"];
                                }
                            }
                             $sql4 = "SELECT * FROM periodo WHERE id_periodo='$idperiodocc'";
                            if($resultado4 = mysql_query($sql4)){
                                while($fila4 = mysql_fetch_array($resultado4)){
                                    $nombreperiodocc=$fila4["nombre_periodo"];
                                }
                            } 

                            echo'
                            <td>
                                <span>'.$nombreperiodocc.'</strong>
                            </td>  
                            <td>
                                <span>'.$codigoseccioncc.'</strong>
                            </td>  
                                
                        ';
                            $sumanota101=0;
                            $sqlnue1 = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodocc' 
                            AND plan_evaluacion.id_anio = '$idaniocon' AND plan_evaluacion.id_seccion = '$idseccioncc' 
                            AND plan_evaluacion.id_materia = '$id_materiacc' AND plan_evaluacion.id_lapso = 1
                            ";
                            $resultadonue1 = mysql_query($sqlnue1)or die(mysql_error());
                            if(mysql_num_rows($resultadonue1) == 0){            
                                $sumapeso1=0;       
                            }
                            else{
                                if($resultadonue1=mysql_query($sqlnue1)){
                                    $sumapeso1=0;
                                    $sumanota101=0;
                                    while($filanue1=mysql_fetch_array($resultadonue1)){
                                        $idplan1=$filanue1['id_plan'];
                                        $numeroevaluacion1=$filanue1['numero_evaluacion'];
                                        $descripcion1=$filanue1['descripcion'];
                                        $escala1=$filanue1['escala'];
                                        $peso1=$filanue1['peso'];
                                        $sumapeso1=$sumapeso1+$peso1;

                                        $sql101="SELECT * FROM notas WHERE id_estudiante='$idestudiantenn' AND id_plan='$idplan1'";
                                        $resultado101 = mysql_query($sql101);

                 
                                        if(mysql_num_rows($resultado101) == 0){
                                
                                        }

                                        else{
                                            if($resultado101 = mysql_query($sql101)){
                       
                                                while($fila101 = mysql_fetch_array($resultado101)){
                                                    $nota101=$fila101['nota'];
                                                    $totalpeso101=($nota101*$peso1)/$escala1;
                                                    $calculopeso1=($totalpeso101*20)/$peso1;
                                                    $sumanota101=$sumanota101+$totalpeso101;
                                                }
                                            }
                                        }
                       
                                    }
                     
                                }
                            }

                            $sumanota10red1=round ($sumanota101);

                            if($sumanota101<=0){
                                echo'<td><span class="letraroja2">0</span></td>';
                            }
                            else{
                                if($sumanota101<($notaminima11-0.5)){
                                    echo'<td><span class="letraroja2">'.$sumanota10red1.'</span></td>';
                                }
                                else{
                                    echo'<td><span class="letraroja">'.$sumanota10red1.'</span></td>';
                                }
                        
                            }
                            $notafinalestu=$notafinalestu+$sumanota10red1;



                            $sumanota102=0;

                            $sqlnue2 = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodocc' 
                            AND plan_evaluacion.id_anio = '$idaniocc' AND plan_evaluacion.id_seccion = '$idseccioncc' 
                            AND plan_evaluacion.id_materia = '$id_materiacc' AND plan_evaluacion.id_lapso = 2
                            ";
                            $resultadonue2 = mysql_query($sqlnue2)or die(mysql_error());
                            if(mysql_num_rows($resultadonue2) == 0){            
                                $sumapeso2=0;  
                            }
                            else{
                                if($resultadonue2=mysql_query($sqlnue2)){
                                    $sumapeso2=0;
                                    $sumanota102=0;
                                    while($filanue2=mysql_fetch_array($resultadonue2)){
                                        $idplan2=$filanue2['id_plan'];
                                        $numeroevaluacion2=$filanue2['numero_evaluacion'];
                                        $descripcion2=$filanue2['descripcion'];
                                        $escala2=$filanue2['escala'];
                                        $peso2=$filanue2['peso'];
                                        $sumapeso2=$sumapeso2+$peso2;

                                        $sql102="SELECT * FROM notas WHERE id_estudiante='$idestudiantenn' AND id_plan='$idplan2'";
                                        $resultado102 = mysql_query($sql102);

                 
                                        if(mysql_num_rows($resultado102) == 0){
                   
                    
                                        }
                                        else{
                   
                                            if($resultado102 = mysql_query($sql102)){
                       
                                                while($fila102 = mysql_fetch_array($resultado102)){
                                                    $nota102=$fila102['nota'];
                                                    $totalpeso102=($nota102*$peso2)/$escala2;
                                                    $calculopeso2=($totalpeso102*20)/$peso2;
                                                    $sumanota102=$sumanota102+$totalpeso102;
                                                }
                                            }
                                        }
                       
                                    }
                     
                                }
                            }
            
                            $sumanota10red2=round ($sumanota102);

                            if($sumanota102<=0){
                                echo'<td><span class="letraroja2">0</span></td>';
                            }
                            else{
                                if($sumanota102<($notaminima11-0.5)){
                                    echo'<td><span class="letraroja2">'.$sumanota10red2.'</span></td>';
                                }
                                else{
                                    echo'<td><span class="letraroja">'.$sumanota10red2.'</span></td>';
                                }
                            }       
                            $notafinalestu=$notafinalestu+$sumanota10red2;




                            $sumanota103=0;
                            $sqlnue3 = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodocc' 
                            AND plan_evaluacion.id_anio = '$idaniocc' AND plan_evaluacion.id_seccion = '$idseccioncc' 
                            AND plan_evaluacion.id_materia = '$id_materiacc' AND plan_evaluacion.id_lapso = 3
                            ";
                            $resultadonue3 = mysql_query($sqlnue3)or die(mysql_error());
                            if(mysql_num_rows($resultadonue3) == 0){            
                                $sumapeso3=0;       
                            }
                            else{
                                if($resultadonue3=mysql_query($sqlnue3)){
                                    $sumapeso3=0;
                                    $sumanota103=0;
                                    while($filanue3=mysql_fetch_array($resultadonue3)){
                                        $idplan3=$filanue3['id_plan'];
                                        $numeroevaluacion3=$filanue3['numero_evaluacion'];
                                        $descripcion3=$filanue3['descripcion'];
                                        $escala3=$filanue3['escala'];
                                        $peso3=$filanue3['peso'];
                                        $sumapeso3=$sumapeso3+$peso3;

                                        $sql103="SELECT * FROM notas WHERE id_estudiante='$idestudiantenn' AND id_plan='$idplan3'";
                                        $resultado103 = mysql_query($sql103);

                 
                                        if(mysql_num_rows($resultado103) == 0){
                  
                                        }

                                        else{
                   
                                            if($resultado103 = mysql_query($sql103)){
                       
                                                while($fila103 = mysql_fetch_array($resultado103)){
                                                    $nota103=$fila103['nota'];
                                                    $totalpeso103=($nota103*$peso3)/$escala3;
                                                    $calculopeso3=($totalpeso103*20)/$peso3;
                                                    $sumanota103=$sumanota103+$totalpeso103;
                                                }
                                            }
                                        }
                       
                                    }
                     
                                }
                            }

                            $sumanota10red3=round ($sumanota103);

                            if($sumanota103<=0){
                                echo'<td><span class="letraroja2">0</span></td>';
                            }
                            else{
                                if($sumanota103<($notaminima11-0.5)){
                                     echo'<td><span class="letraroja2">'.$sumanota103.' = '.$sumanota10red3.'</span></td>';

                                }
                                else{
                                    echo'<td><span class="letraroja">'.$sumanota103.' = '.$sumanota10red3.'</span></td>';
                                }
                            }


                            $notafinalestu=$notafinalestu+$sumanota10red3;
                            $notafinalestu=$notafinalestu/3;

                            $notafinalestured=round ($notafinalestu);
                            $sumaanio=$sumaanio+$notafinalestured;
                            

                            if($notafinalestu<=0){
                                echo'<td class="fondogrisclaro"><center><span class="letraroja2">0</span></center></td>';
                            }
                            else{

               
                                if($notafinalestu<($notaminima11-0.5)){
                                    echo'<td class="fondogrisclaro"><center><span class="letraroja2">'.$notafinalestured.'</span></center></td>';
                                }
                                else{
                                    echo'<td class="fondogrisclaro"><center><span class="letraroja">'.$notafinalestured.'</span></center></td>';
                                }
                            }



                            

                        }
                    }


          //fin segunda consulta
            
        }
    }

    if($contadoranio==0||$sumaanio==0){
        echo'</tr>
                            <tr>
                                <td colspan="8">
                                    &nbsp;

                                </td>

                            </tr>


                            ';
    }
    else{
         $promedio=$sumaanio/$contadoranio;
                    echo'</tr>
                            <tr>
                                <td colspan="8">
                                    <span class="letraroja">Promedio=</span> '.$promedio.'

                                </td>

                            </tr>


                            ';
    }
       
    $contadoranio=0;
    $promedio=0;
    $sumaanio=0;




        }
    }



        
    echo'
     </tr>
     <tr>
     <td>
     
 <br><br>
<a href="PDFNotasdeLapso.php?idestudiantenn='.$idestudiantenn.'" target="_blank" class=" btn btn-center fondorojo letrablanca" >Generar PDF</a>
   
     </td>
     </tr>
     </table>    

            </div>       
        </div>
    </div>
</div> 

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

    <!-- Script to Activate the Carousel -->
    

</body>

</html>
