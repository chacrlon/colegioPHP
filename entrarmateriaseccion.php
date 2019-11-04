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

                   
   
    $idmateria=$_POST['idsolicitud'];
    
    $idseccion=$_POST['idseccion'];
    $idperiodo=$_POST['idperiodo'];
    $idanio=$_POST['idanio'];

    $sql3 = "SELECT * FROM seccion WHERE id_seccion='$idseccion'";
        if($resultado3 = mysql_query($sql3)){
            while($fila3 = mysql_fetch_array($resultado3)){
                $nombreseccion=$fila3["nombre_seccion"];
            }
        }

    $sql4 = "SELECT * FROM periodo WHERE id_periodo='$idperiodo'";
        if($resultado4 = mysql_query($sql4)){
            while($fila4 = mysql_fetch_array($resultado4)){
                $nombreperiodo=$fila4["nombre_periodo"];
            }
        }

        $sql5 = "SELECT * FROM anio WHERE id_anio='$idanio'";
        if($resultado5 = mysql_query($sql5)){
            while($fila5 = mysql_fetch_array($resultado5)){
                $nombreanio=$fila5["nombre_anio"];
            }
        }

        $sql6 = "SELECT * FROM materias WHERE id_materia='$idmateria'";
        if($resultado6 = mysql_query($sql6)){
            while($fila6 = mysql_fetch_array($resultado6)){
                $codigomateria=$fila6["cod_materia"];
                
                $nombremateria=$fila6['nombre_materia'];
                $notaminima=$fila6['nota_minima'];
            }
        }


    echo'
     <table align="right">
        <form  action="seleccionarmateria.php" method="POST" > 
            <tr>              
                <td>
                    <input type="hidden" value="'.$idperiodo.'" name="idperiodo">
                    <input type="hidden" value="'.$idanio.'" name="idanio">
                    <input type="hidden" value="'.$idseccion.'" name="idseccion">
                    <input type="submit" value="Regresar" class="btn btn-default form-control fondogris letraroja">

                </td>
            </tr>
        </form>
    </table>
';
   


        $sql3 = "SELECT * FROM asignacion_docente WHERE id_periodo = '$idperiodo' AND id_anio = '$idanio' AND id_seccion = '$idseccion' AND id_materia = '$idmateria'";
        $resultado3=mysql_query($sql3);



        if(mysql_num_rows($resultado3)==0){
             $iddocentenue=0;
            echo '<strong><i>Esta materia no tiene profesor Asignado</i></strong>';
            echo'
        
    <table >
        <form  action="asignardocente.php" method="POST" > 
            <tr>              
                <td>
                    <input type="hidden" value="'.$idperiodo.'" name="idperiodo">
                    <input type="hidden" value="'.$idanio.'" name="idanio">
                    <input type="hidden" value="'.$idseccion.'" name="idseccion">
                    


                    <input type="hidden" name="idmateria" value="'.$idmateria.'">
                    <input type="hidden" name="codigomateria" value="'.$codigomateria.'">
                    <input type="hidden" name="nombremateria" value="'.$nombremateria.'">
                    <input type="hidden" name="notaminima" value="'.$notaminima.'">

                    <input type="submit" value="Asignar Docente" class="btn btn-default form-control fondogris letraroja">
                </td>
            </tr>
        </form>
    </table>
        ';

        }
        else{
            if($resultado4 = mysql_query($sql3)){
                while($fila4 = mysql_fetch_array($resultado4)){
                    $idobt=$fila4["id_docente"];
                     $sql5 = "SELECT * FROM docente WHERE id_docente='$idobt'";
                     $resultado5=mysql_query($sql5);

                     if(mysql_num_rows($resultado5)==0){
                        $iddocentenue=0;
                     }
                     else{
                        if($resultado5 = mysql_query($sql5)){
                            while($fila5 = mysql_fetch_array($resultado5)){
                                $iddocentenue=$fila5["id_docente"];
                                $nombredocenteobt=$fila5["nombre1"];
                                $apellidodocenteobt=$fila5["apellido1"];
                                $ceduladocenteobt=$fila5["cedula"];
                            }
                        }
                     }
                    

                }
            }
            echo '<strong><i>Docente de la Materia: '.$nombredocenteobt.' '.$apellidodocenteobt.' - C.I: '.$ceduladocenteobt.'</i></strong>';
       echo'
        
    <table >
        <form  action="modificarasignaciondocente.php" method="POST" > 
            <tr>              
                <td>
                    <input type="hidden" value="'.$idperiodo.'" name="idperiodo">
                    <input type="hidden" value="'.$idanio.'" name="idanio">
                    <input type="hidden" value="'.$idseccion.'" name="idseccion">
                    <input type="hidden" value="'.$iddocentenue.'" name="iddocente">
                    


                    <input type="hidden" name="idmateria" value="'.$idmateria.'">
                    <input type="hidden" name="codigomateria" value="'.$codigomateria.'">
                    <input type="hidden" name="nombremateria" value="'.$nombremateria.'">
                    <input type="hidden" name="notaminima" value="'.$notaminima.'">
                    ';

                    if($tipoU=="SuperUser"){
                        echo '<input type="submit" value="Cambiar Docente" class="btn btn-default form-control fondogris letraroja">';
                    }
                    else{
                        echo '<br>';
                    }
                    

                    echo'
                </td>
            </tr>
        </form>
    </table>
        ';
        }

        
        
    
    echo'
   <br><br>
   ';


   if($tipoU=="Docente"){
   echo'

    <table align="left">
        <tr>
            <td>
                <form  action="lapsosplan.php" method="POST" > 
                    <input type="hidden" value="1" name="lapso">
                    <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" value="'.$iddocentenue.'" name="iddocente">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="codigomateria" value="'.$codigomateria.'">
                                <input type="hidden" name="nombremateria" value="'.$nombremateria.'">
                                 <input type="hidden" name="notaminima" value="'.$notaminima.'">
                    <input type="submit" value="Primer Lapso" class="btn btn-default form-control letraroja">
                </form>
            </td>
            <td>
                <form  action="lapsosplan.php" method="POST" > 
                <input type="hidden" value="2" name="lapso">
                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                 <input type="hidden" value="'.$iddocentenue.'" name="iddocente">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="codigomateria" value="'.$codigomateria.'">
                                <input type="hidden" name="nombremateria" value="'.$nombremateria.'">
                                 <input type="hidden" name="notaminima" value="'.$notaminima.'">
                    
                    <input type="submit" value="Segundo Lapso" class="btn btn-default form-control  letraroja">
                </form>
            </td>
            <td>
                <form  action="lapsosplan.php" method="POST" > 
                <input type="hidden" value="3" name="lapso">
                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" value="'.$iddocentenue.'" name="iddocente">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="codigomateria" value="'.$codigomateria.'">
                                <input type="hidden" name="nombremateria" value="'.$nombremateria.'">
                                 <input type="hidden" name="notaminima" value="'.$notaminima.'">
                    
                    <input type="submit" value="Tercer Lapso" class="btn btn-default form-control letraroja">
                </form>
            </td>
        </tr>
    </table>
    ';
    }
    else{
       echo'

    <table align="left">
        <tr>
            <td>
                <form  action="lapsosplan.php" method="POST" > 
                    <input type="hidden" value="1" name="lapso">
                    <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" value="'.$iddocentenue.'" name="iddocente">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="codigomateria" value="'.$codigomateria.'">
                                <input type="hidden" name="nombremateria" value="'.$nombremateria.'">
                                 <input type="hidden" name="notaminima" value="'.$notaminima.'">
                    <input type="submit" value="Primer Lapso" class="btn btn-default form-control letraroja" disabled="disabled">
                </form>
            </td>
            <td>
                <form  action="lapsosplan.php" method="POST" > 
                <input type="hidden" value="2" name="lapso">
                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                 <input type="hidden" value="'.$iddocentenue.'" name="iddocente">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="codigomateria" value="'.$codigomateria.'">
                                <input type="hidden" name="nombremateria" value="'.$nombremateria.'">
                                 <input type="hidden" name="notaminima" value="'.$notaminima.'">
                    
                    <input type="submit" value="Segundo Lapso" class="btn btn-default form-control  letraroja" disabled="disabled">
                </form>
            </td>
            <td>
                <form  action="lapsosplan.php" method="POST" > 
                <input type="hidden" value="3" name="lapso">
                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" value="'.$iddocentenue.'" name="iddocente">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="codigomateria" value="'.$codigomateria.'">
                                <input type="hidden" name="nombremateria" value="'.$nombremateria.'">
                                 <input type="hidden" name="notaminima" value="'.$notaminima.'">
                    
                    <input type="submit" value="Tercer Lapso" class="btn btn-default form-control letraroja" disabled="disabled">
                </form>
            </td>
        </tr>
    </table>
    '; 
    }
    echo'
    <br><br>
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Listado de Estudiantes - '.$nombreperiodo.' - '.$nombreanio.' - '.$nombreseccion.' - '.$nombremateria.'</h4></center>
    </div>
          
                        <table class="table">

                        <tr>
                            <td>
                                <strong><span class="letraroja">Foto</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Primer Nombre</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Segundo Nombre</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Primer Apellido</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Segundo Apellido</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Cédula</span></strong>
                            </td>
                            <td >
                                <strong><span class="letraroja">Opción</span></strong>
                            </td>
                            <td colspan="4">
                                <strong><span class="letraroja">Notas por Lapso</span></strong>
                            </td>



                        </tr>
    ';


    $sql2 = "SELECT * FROM estudiante INNER JOIN inscripciones ON estudiante.id_estudiante=inscripciones.id_estudiante WHERE inscripciones.id_periodo='$idperiodo' AND inscripciones.id_anio='$idanio' AND inscripciones.id_seccion='$idseccion'";
    $resultado2 = mysql_query($sql2)or die(mysql_error());  
    if(mysql_num_rows($resultado2) == 0){
            echo "<script language='javascript'> alert('No hay estudiantes registrados en esta Sección...');</script>";              
        echo "<script language='javascript'>window.location.href='Bienvenido.php';</script>"; 
    }
    else{
        if($resultado2 = mysql_query($sql2)){
            while($fila = mysql_fetch_array($resultado2)){
                $idestudiante=$fila['id_estudiante'];
                $nombre1=$fila['nombre1'];
                $nombre2=$fila['nombre2'];
                $apellido1=$fila['apellido1'];
                $apellido2=$fila['apellido2'];
                $cedula=$fila['cedula'];
                $ruta=$fila['ruta'];
                
                   echo'

                        
                            <tr>
                                <td>
                                <center>
                                    
                                    <img src="'.$ruta.'" class="cargarimagen2">
                                    </center>
                                </td>
                                <td>
                                   <br>
                                    '.$nombre1.'
                                </td>
                                <td>
                                   <br>
                                    '.$nombre2.'
                                </td>
                                <td>
                                   <br>
                                    '.$apellido1.'
                                </td>
                                <td>
                                   <br>
                                    '.$apellido2.'
                                </td>
                                <td>
                                   <br>
                                    '.$cedula.'
                                </td>
                                <td>
                                   
                                    <br>
                                    <form  action="Historia.php"  method="POST" enctype = "multipart/form-data" > 

                                <input type="hidden" name="id_docente" value="'.$_SESSION["unic"].'">
                                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="codigomateria" value="'.$codigomateria.'">
                                <input type="hidden" name="nombremateria" value="'.$nombremateria.'">
                                 <input type="hidden" name="notaminima" value="'.$notaminima.'">

                                
                                    ';
                                   
                                        echo '<input type="submit" value="Historia" class="btn btn-default form-control fondogris letraroja">';

                                    echo'   
                              
                            </form>  
                            </td>
                            <td>
                             <br>
                            <form  action="consultarnotaporlapso.php"  method="POST" enctype = "multipart/form-data" > 
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
                                
                                <input type="hidden" name="lapso" value="1">
                                
                                    ';
                                   
                                        echo '<input type="submit" value="1" class="btn btn-default form-control fondogris letraroja">';

                                    echo'   
                              
                            </form> 
                            </td>
                            <td>    
                             <br>
                            <form  action="consultarnotaporlapso.php"  method="POST" enctype = "multipart/form-data" > 
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
                                
                                <input type="hidden" name="lapso" value="2">
                                
                                    ';
                                   
                                        echo '<input type="submit" value="2" class="btn btn-default form-control fondogris letraroja">';

                                    echo'   
                              
                            </form>  
                            </td>
                            <td>
                             <br>
                            <form  action="consultarnotaporlapso.php"  method="POST" enctype = "multipart/form-data" > 
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
                                
                                 <input type="hidden" name="lapso" value="3">
                                    ';
                                   
                                        echo '<input type="submit" value="3" class="btn btn-default form-control fondogris letraroja">';

                                    echo'   
                              
                            </form>                             
                                </td>
                                <td>
                             <br>
                            <form  action="consultarnotafinal.php"  method="POST" enctype = "multipart/form-data" > 
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
                                
                                    ';
                                   
                                        echo '<input type="submit" value="Final" class="btn btn-default form-control fondogris letraroja">';

                                    echo'   
                              
                            </form>                             
                                </td>
                                
                            </tr>
                                   
                            '; 


            }

        }
    }

echo'



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
