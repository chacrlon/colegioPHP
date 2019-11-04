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
echo'
                 <a href="PDFDocentes.php" target="_blank" class=" btn btn-center fondorojo letrablanca" >Generar Listado de Docentes</a>
            ';
                  
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
        
        <center><h4 class="modal-title " id="myModalLabel">Planilla de Registro de Docentes</h4></center>
    </div>
   
    <form  action="registrardocente.php" method="POST" enctype = "multipart/form-data" >        
                     
                        <table class="table">
                        <tr>
                        <td colspan="5">
                        <input type="file" id="files" class="adjuntedefoto" name="files"/>

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
                                <td>
                                    <strong>Primer Nombre</strong>
                                    <input type="text" class="form-control" name="nombre1" placeholder="Primer Nombre" required autofocus> 
                                </td>
                                <td>
                                    <strong>Segundo Nombre</strong>
                                    <input type="text" class="form-control" name="nombre2" placeholder="Segundo Nombre" autofocus> 
                                </td>
                                <td>
                                    <strong>Primer Apellido</strong>
                                    <input type="text" class="form-control" name="apellido1" placeholder="Primer Apellido" required autofocus> 
                                </td>
                                <td>
                                    <strong>Segundo Apellido</strong>
                                    <input type="text" class="form-control" name="apellido2" placeholder="Segundo Apellido" autofocus> 
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <strong>Cédula</strong>
                                    <input type="text" class="form-control" name="cedula" placeholder="Cédula" required autofocus> 
                                </td>
                                <td>
                                <strong>Sexo</strong>
                                    <select name="sexo" required class="form-control">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>

                                    </select>
                                    
                                </td>
                                <td>
                                    <strong>Fecha de Nacimiento</strong>
                                    <input type="date" class="form-control" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required autofocus>
                                </td>
                                <td>
                                    <strong>Nacionalidad</strong>
                                    <select name="nacionalidad" required class="form-control">
                                        <option value="Venezolano(a)">Venezolano(a)</option>
                                        <option value="Extranjero(a)">Extranjero(a)</option>

                                    </select>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <strong>Teléfono Celular</strong>
                                    <input type="text" class="form-control" name="telefono_celular" placeholder="Teléfono Celular" required autofocus> 
                                </td>
                                <td>
                                    <strong>Teléfono de Habitación</strong>
                                    <input type="text" class="form-control" name="telefono_habitacion" placeholder="Teléfono de Habitación" required autofocus> 
                                </td>
                                <td>
                                    <strong>Correo</strong>
                                    <input type="email" class="form-control" name="correo" placeholder="Correo" autofocus required> 
                                </td>
                                <td colspan="2">
                                   <strong>Dirección</strong>
                                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" autofocus required> 

                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td colspan="5">
                                
                                    <button class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit">Guardar Registro</button>   
                                </td>
                            </tr>
                            

                        </table>         
                        
                </form>


                
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

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
    <!-- Script to Activate the Carousel -->
   

</body>

</html>
