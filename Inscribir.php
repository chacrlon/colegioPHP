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
      //Ajusta el tamaño de un iframe al de su contenido interior para evitar scroll
 

      function confirmar(){
        if(confirm("Seguro que desea culminar la Inscripción?")){
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

                 
    if(isset($_POST['idsolicitudaprobar'])){
        $idsolicitudaprobar=$_POST['idsolicitudaprobar'];
    }
    if(isset($_POST['idseccionant'])){
        $idseccionant=$_POST['idseccionant'];
    }
    if(isset($_POST['condicion'])){
        $condicion=$_POST['condicion'];
    }
    if(isset($_POST['idperiodoant'])){
        $idperiodoant=$_POST['idperiodoant'];
    }
    
    $idperiodo=$_POST['idperiodo'];
    $aniosol=$_POST['idaniosol'];
    $idestudiante=$_POST['idestudiante'];
    echo'

    <br><br><br><br>
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Seleccione la Sección</h4></center>
    </div>
          
                        <table class="table">

                        <tr>
                            <td>
                                <strong><span class="letraroja">Código de Sección</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Nombre de la Sección</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Cantidad de Estudiantes Registrados</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Cantidad Disponible</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Opcion</span></strong>
                            </td>



                        </tr>
    ';


    $sql2 = "SELECT * FROM seccion";
    $resultado2 = mysql_query($sql2)or die(mysql_error());  
    if(mysql_num_rows($resultado2) == 0){
            echo "<script language='javascript'> alert('Aún no hay Secciones registradas en el Sistema... Registre una Sección');</script>";              
        echo "<script language='javascript'>window.location.href='Secciones.php';</script>"; 
    }
    else{
        if($resultado2 = mysql_query($sql2)){
            while($fila = mysql_fetch_array($resultado2)){
                $idseccion=$fila['id_seccion'];
                $cod_seccion=$fila['cod_seccion'];
                $nombre_seccion=$fila['nombre_seccion'];
                $sql = "SELECT * FROM Inscripciones where id_periodo='$idperiodo' AND id_anio='$aniosol' AND id_seccion='$idseccion'";
                $resul = mysql_query($sql);
                $resultado=mysql_num_rows($resul);
                $disponible=30-$resultado;

                   echo'

                        <form  action="Culminarinscripcion.php" onsubmit="return confirmar()" method="POST" enctype = "multipart/form-data" > 
                            <tr>
                                <td>
                                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">

                                ';
                                if(isset($_POST['idsolicitudaprobar'])){
                                echo'
                                <input type="hidden" name="idsolicitud" value="'.$idsolicitudaprobar.'">
                                ';
                                }

                               if(isset($_POST['idseccionant'])){
                                  
                                   echo' <input type="hidden" name="idseccionant" value="'.$idseccionant.'">';
                                }
                                if(isset($_POST['idperiodoant'])){
                             
                                    echo' <input type="hidden" name="idperiodoant" value="'.$idperiodoant.'">';
                                }
                                if(isset($_POST['idperiodoant'])){
                                    echo'<input type="hidden" name="condicion" value="'.$condicion.'">';
                                }
                                echo'
                                <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
                                <input type="hidden" name="idanio" value="'.$aniosol.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                
                                    
                                    <span class="letraroja">'.$cod_seccion.'</span>
                                </td>
                                <td>
                                   
                                    '.$nombre_seccion.'
                                </td>
                            
                                <td>
                                    
                                    '.$resultado.'
                                </td>
                                <td>
                                    
                                    '.$disponible.'
                                </td>
                                
                                <td>
                                    ';
                                    if($disponible<1){
                                        echo '<input type="submit" value="Seleccionar" class="btn btn-default form-control fondogris letraroja" disabled="disabled">';

                                    }
                                    else{
                                        echo '<input type="submit" value="Seleccionar" class="btn btn-default form-control fondogris letraroja">';
                                    }
                                    echo'   
                                </td>
                            </tr>
                            </form>         
                            '; 


            }

        }
    }


 if(isset($_POST['condicion'])){
echo'

<tr>
                                
                             <td colspan="5">
                                    <br>
                                    <form  action="Gestionarinscripcion.php" method="POST" "> 
                                        
                                        <input type="hidden" name="idestudiante" value="'.$idestudiante.'"> 
                                        <input type="hidden" name="idanio" value="'.$aniosol.'"> 
                                        <input type="hidden" name="condicion" value="'.$condicion.'"> 
                                        <input type="hidden" name="idseccion" value="'.$idseccionant.'"> 
                                        <input type="hidden" name="idperiodo" value="'.$idperiodoant.'"> 
                                        <center><input type="submit" value="Regresar" class="btn btn-default form-control fondogris letraroja "></center>
                                    </form>
                                </td>

                            </tr>     
';
}
else{
    echo'

<tr>
                               
                        <td colspan="5">
                                    <br>
                                    <form  action="aprobars.php" method="POST" "> 
                                        <input type="hidden" name="idsolapro" value="'.$idsolicitudaprobar.'"> 
                                        <input type="hidden" name="idestudiante" value="'.$idestudiante.'"> 
                                        <input type="hidden" name="aniosol" value="'.$aniosol.'"> 
                                        
                                        <center><input type="submit" value="Regresar" class="btn btn-default form-control fondogris letraroja "></center>
                                    </form>
                                </td>    

                            </tr>     
';
}


echo '</table>';
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
