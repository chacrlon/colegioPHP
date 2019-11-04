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
      function validar(){
        //Validacion de Contraseñas para que sean iguales
        var dia1= document.consultarfecha.dia.value;
        var mes1= document.consultarfecha.mes.value;
        var anio1= document.consultarfecha.anio.value;
       
    
        if(dia1!=""){
            if(dia1<=0||dia1>31){
            alert("Por favor verifique el día ingresado...");
            return false;
            }
            if(mes1==0){
                alert("Por favor verifique el mes ingresado...");
                return false;
            }

            if(anio1==" "){
                alert("Por favor verifique el año ingresado...");
                return false;
            }
        }
        if(mes1!=0){
           if(anio1==""){
                alert("Por favor verifique el año ingresado...");
                return false;
            }
        }

        return true;
    
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
 
        <!-- /.row -->
        <div class="row" >
           
            <div class="col-md-12" >                
                
                <?php

    
    $idestudiante=$_GET['idestudiantehist'];
  $sql51 = "SELECT cedula FROM estudiante WHERE id_estudiante='$idestudiante'";
                    
            if($resultado51 = mysql_query($sql51)){
                     while($fila = mysql_fetch_array($resultado51)){
                        
                    $cedula1 = $fila["cedula"];
                }

            }
        

echo'
<table align="right">
                            <tr>
                                <td >
                                    <br>
                                    <form  action="consultardatosdeestudiante.php" method="GET" "> 
                                      
                                        <input type="hidden" name="idsolicitud" value="'.$cedula1.'"> 
                                        
                                        <center><input type="submit" value="Regresar" class="btn btn-default form-control fondogris letraroja "></center>
                                    </form>
                                </td>
                            

                            </tr>


</table>  

';



    echo'   
    

    <br><br>
 
    ';
    
$sql5 = "SELECT * FROM historia WHERE id_estudiante='$idestudiante' ORDER BY id_historia DESC LIMIT 500";
                    
            if($resultado5 = mysql_query($sql5)){
                if(mysql_num_rows($resultado5)==0){
                     echo "<script language='javascript'>alert('Este Estudiante no tiene Historia Registrada');</script>";
                     echo "<script language='javascript'>window.location.href='consultardatosdeestudiante.php?idsolicitud=$cedula1'</script>";
                     
                }
                echo' 
                <br>
                         <div class="panel-heading fondorojo bordeazul letrablanca text-center">
                                 <h4> <strong>HISTORIA - Últimos 500 Acontecimientos</strong></h4>
                            </div>
                     <br>';

                      echo'
<table align="right">
                            <tr>
                            <form  action="historiaporfecha2.php" method="POST" onSubmit="return validar();" name="consultarfecha"> 
                             <td>
                             <br>
                                <strong><i>Buscar por Fecha:</i> &nbsp;&nbsp;</strong>
                            </td>
                            <td>
                                <center><strong><i>Día</i></strong><br></center>
                                 <input type="number" name="dia" class="form-control"> 
                                  <input type="hidden" name="idestudiante" value="'.$idestudiante.'" class="form-control"> 
                            </td>
                            <td>
                               <center><strong><i> Mes</i></strong><br></center>
                                 <select name="mes" class="form-control">
                                    <option value="0">Seleccione...</option>
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </td>
                            <td>
                                <center><strong><i>Año</i></strong><br></center>
                                 <input type="number" name="anio" class="form-control" required> 
                            </td>
                            <td>
                                <br>
                                 <input type="submit" value="Buscar" class="btn btn-default form-control fondogris letraroja ">
                            </td>
                           
                                </form>
                            

                            </tr>
                            
</table>  
<br><br><br><br>
';
                while($fila = mysql_fetch_array($resultado5)){
                        
                    $fecha1 = $fila["fecha"];
                    $hora1 = $fila["hora"];
                    $descripcion1 = $fila["descripcion"];
                    $id_periodo1 = $fila["id_periodo"];
                    $id_anio1 = $fila["id_anio"];
                    $id_seccion1 = $fila["id_seccion"];
                    $id_materia1 = $fila["id_materia"];
                    $id_docente1 = $fila["id_docente"];
                    $id_estudiante1 = $fila["id_estudiante"];
                        $sql6 = "SELECT nombre_periodo FROM periodo WHERE id_periodo='$id_periodo1'  ";
                            if($resultado6 = mysql_query($sql6)){
                                while($fila6 = mysql_fetch_array($resultado6)){
                                    $nombreperiodo1=$fila6["nombre_periodo"];
                                }
                            }


                           $sql7 = "SELECT nombre_anio FROM anio WHERE id_anio='$id_anio1'  ";
                            if($resultado7 = mysql_query($sql7)){
                                while($fila7 = mysql_fetch_array($resultado7)){
                                    $nombreanio1=$fila7["nombre_anio"];
                                }
                            }

                            $sql8 = "SELECT nombre_seccion FROM seccion WHERE id_seccion='$id_seccion1'  ";
                            if($resultado8 = mysql_query($sql8)){
                                while($fila8 = mysql_fetch_array($resultado8)){
                                    $nombreseccion1=$fila8["nombre_seccion"];
                                }
                            }

                            $sql9 = "SELECT nombre_materia FROM materias WHERE id_materia='$id_materia1'  ";
                            if($resultado9 = mysql_query($sql9)){
                                while($fila9 = mysql_fetch_array($resultado9)){
                                    $nombremateria1=$fila9["nombre_materia"];
                                }
                            }

                            $sql10 = "SELECT * FROM docente WHERE id_docente='$id_docente1'  ";
                            if($resultado10 = mysql_query($sql10)){
                                while($fila10 = mysql_fetch_array($resultado10)){
                                    $nombredocente1=$fila10["nombre1"];
                                    $apellidodocente1=$fila10["apellido1"];
                                    $ceduladocente1=$fila10["cedula"];
                                }
                            }

                            $sql11 = "SELECT * FROM estudiante WHERE id_estudiante='$id_estudiante1'  ";
                            if($resultado11 = mysql_query($sql11)){
                                while($fila11 = mysql_fetch_array($resultado11)){
                                    $nombreestudiante1=$fila11["nombre1"];
                                    $apellidoestudiante1=$fila11["apellido1"];
                                    $cedulaestudiante1=$fila11["cedula"];
                                }
                            }
                    
                    
                    echo '
                    
                   
                        <div class="panel panel-default">
                            <div class="panel-heading  letraroja">
                                 <h4><i class="fa fa-fw fa-check"></i> <strong>
                                 '.$fecha1.'&nbsp;&nbsp;'.$hora1.'<br>
                                 &nbsp;&nbsp;&nbsp;&nbsp;'.$nombreperiodo1.' - '.$nombreanio1.' - '.$nombreseccion1.' - '.$nombremateria1.'<br>
                                 &nbsp;&nbsp;&nbsp;&nbsp;Docente: '.$nombredocente1.' '.$apellidodocente1.' - C.I: '.$ceduladocente1.'
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estudiante: '.$nombreestudiante1.' '.$apellidoestudiante1.' - C.I: '.$cedulaestudiante1.'
                                 </strong></h4>
                            </div>
                            <div class="panel-body text-justify">
                                '.$descripcion1.'
                                <br>
                            </div>
                        </div>
                   <br><br>
           
                    
                    ';
        
                }
                 echo'
                 <a href="PDFHistoria.php?idestudiantenn='.$idestudiante.'" target="_blank" class=" btn btn-center fondorojo letrablanca" >Generar PDF</a>
            ';
            }
                    
        else{
            echo mysql_error();
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
