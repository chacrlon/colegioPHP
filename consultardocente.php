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

                    
    $cedula1=$_GET['cedula'];

        
      $sql = "SELECT * FROM docente WHERE cedula='$cedula1'";


  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
    
     
     echo "<script language='javascript'> alert('Este Docente no se encuentra registrado!');</script>"; 
      echo "<script language='javascript'>window.location.href='Docentes.php';</script>"; 

  
       
  }
  else{
          
      if($resultado = mysql_query($sql)){
        
        while($fila = mysql_fetch_array($resultado)){
            
         $idest=$fila["id_docente"];
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
            
          



        
          echo'


          <form  action="consultardocente.php" method="GET">    
    <table align="right">
        <tr>
            <td>
                
                <input type="text" class="form-control" name="cedula" placeholder="Cédula del Docente" required autofocus> 

            </td>
            <td>
                <button class="btn btn-default btn-lg fondogris letraroja " type="submit">Buscar</button>   
            </td>
        </tr>


    </table>    
                    
    </form>


    <br><br><br>
 
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Consulta de Docente</h4></center>
    </div>
   
    <form  action="modificardocente.php" method="POST" enctype = "multipart/form-data" >        
                     
                        <table class="table">
                            
                            <tr>
                                <td rowspan="3">
                                    <br>
                                    <center><span class="letraroja" ><strong>Foto de Identificación </strong> </span> <br>
                                    <img class="thumb" src="'.$ruta.'">
                                    <br><button type="button" class="btn btn-default fondogris letraroja"  data-toggle="modal" data-target="#cambiarfoto">Cambiar Foto</button>
                                    </center>
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
                            </tr>
                            <tr>
                                <td>
                                    <strong>Primer Nombre</strong>
                                    <input type="hidden" name="id_nuevo" value="'.$idest.'">
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
                                    <input type="text" class="form-control" name="cedula" placeholder="Cédula" value="'.$cedula.'" required autofocus> 
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
                                <td>
                                <strong>Correo</strong>
                                    <input type="email" class="form-control" name="correo" placeholder="Correo" value="'.$correo.'" autofocus required> 
                                </td>
                                <td colspan="2">
                                   <strong>Dirección</strong>
                                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="'.$direccion.'" autofocus required> 

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Edad</strong>
                                    <input type="text" class="form-control" name="edad" placeholder="Edad"  value="'.$edad.'" disabled required autofocus> 
                                </td>
                                <td>
                                    <strong>Status</strong>
                                    
                                    <select name="status" required class="form-control">
                                    ';
                                      if($status==1){
                                          echo '<option value="1">Activo</option>
                                          <option value="2">Inactivo</option>';

                                      }
                                      else if($status=="2"){
                                        echo '<option value="1">Inactivo</option>
                                          <option value="2">Activo</option>';
                                      }
                                      else{
                                        echo '<option value="3">Error</option>
                                        <option value="1">Activo</option>
                                          <option value="2">Inactivo</option>';
                                      }

                                    echo'

                                    </select>

                                </td>
                                <td>

                                </td>
                                <td>
                                   
                                    

                                </td>
                            </tr>
                            
                            <tr>
                               

                                 <td colspan="5"> 
                                 ';
                                if($tipoU != "SuperUser"){
                                      echo'
                                    <input class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit" name="guardar" disabled value="Guardar Cambios">  ';
                                  }
                                  else{
                                      echo'
                                    <input class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit" name="guardar" value="Guardar Cambios">  ';
                                  }

                                

                                    echo' 
                                    
                                </td>
                               
                                

                            </tr>
                            

                        </table>         
                        
                </form>





          ';  
} }}




echo'


            </div>       
        </div>
    </div>
</div> 


<div class="modal fade" id="cambiarfoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header fondorojo letrablanca">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title " id="myModalLabel">Iniciar Sesi&oacute;n</h4></center>
            </div>
            <div class="modal-body">
                <form  action="modificarfotodocente.php" method="POST" enctype = "multipart/form-data" >        
                     
                        <table class="table">
                            <tr>
                            <td colspan="5">
                            <input type="file" id="files" class="adjuntedefoto" name="files" required/>
                            <input type="hidden" name="iddocente" value="'.$idest.'">
                            <input type="hidden" name="ceduladocentee" value="'.$cedula.'">
                            <input type="hidden" name="rutaanterior" value="'.$ruta.'">

                            </td>
     
                            </tr>
                            <tr>
                                <td rowspan="3">
                                    <br>
                                    <center><span class="letraroja" ><strong>Foto de Identificación </strong> </span> 
                                    <output  id="list" class="cargarimagen"></output></center>
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
                            </tr>

                            
                            <tr>
                               

                                 <td colspan="4"> 
                                 ';
                                if($tipoU != "SuperUser"){
                                      echo'
                                    <input class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit" name="guardar" disabled value="Guardar Cambios">  ';
                                  }
                                  else{
                                      echo'
                                    <input class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit" name="guardar" value="Guardar Cambios">  ';
                                  }

                                

                                    echo' 
                                    
                                </td>
                               
                                

                            </tr>
                            

                        </table>         
                        
                </form>
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
                    <br><br>
                    <p>Ministerio del Poder Popular para la Educación Universitaria, Ciencia y Tecnología
                    <br>Unidad Educativa "Dr. José Manuel Siso Martínez". - Copyright &copy; 2016
                    
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->

    <script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb"  src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
      </script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    

</body>

</html>
