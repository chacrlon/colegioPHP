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

   
   
    $idmateria=$_POST['idmateria'];
    $codigomateria=$_POST['codigomateria'];
    $nombremateria=$_POST['nombremateria'];
    $notaminima=$_POST['notaminima'];
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


        echo'
<table align="right">
                            <tr>
                                <td >
                                    <br>
                                    <form  action="entrarmateriaseccion.php" method="POST" "> 
                                        <input type="hidden" name="idperiodo" value="'.$idperiodo.'"> 
                                        <input type="hidden" name="idanio" value="'.$idanio.'"> 
                                        <input type="hidden" name="idseccion" value="'.$idseccion.'"> 
                                       
                                        <input type="hidden" name="idsolicitud" value="'.$idmateria.'">
                                <input type="hidden" name="codigomateria" value="'.$codigomateria.'">
                                <input type="hidden" name="nombremateria" value="'.$nombremateria.'">
                                 <input type="hidden" name="notaminima" value="'.$notaminima.'">
                                
                                        
                                        <center><input type="submit" value="Regresar" class="btn btn-default form-control fondogris letraroja "></center>
                                    </form>
                                </td>
                            

                            </tr>


</table>  

';
echo'
        <br><br><br><br>
 
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Planilla de Asignación de Docentes</h4></center>
    </div>
    <form  action="registrarasignaciondedocente.php" method="POST" >        
                    
                        <table class="table">
                            <tr>
                                
                                <td colspan="3">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="idperiodo" value="'.$idperiodo.'"> 
                                <input type="hidden" name="idanio" value="'.$idanio.'"> 
                                <input type="hidden" name="idseccion" value="'.$idseccion.'"> 

                                    <strong>Materia</strong>
                                    <input type="text" class="form-control" name="materia" placeholder="Materia" disabled value="'.$nombremateria.'" autofocus required> 
                                </td>

                            </tr>
                            <tr>
                                
                                <td>
                                    <strong>Período</strong>
                                    <input type="text" class="form-control" name="periodo" placeholder="Período" value="'.$nombreperiodo.'" disabled autofocus required> 
                                </td>
                                
                                <td>
                                    <strong>Año</strong>
                                    <input type="text" class="form-control" name="anio" placeholder="Año" value="'.$nombreanio.'" autofocus disabled required> 
                                </td>

                                <td>
                                    <strong>Sección</strong>
                                    <input type="text" class="form-control" name="seccion" placeholder="Sección" value="'.$nombreseccion.'" disabled autofocus required> 
                                </td>

                            </tr>
                            <tr>
                                <td colspan="3">
                                    <strong>Docente para Asignar</strong>
                                            <select name="iddocente" class="form-control" >
                                            ';

                                            $sql2 = "SELECT * FROM docente where status=1";
                                            $resultado2 = mysql_query($sql2)or die(mysql_error());  
                                            if(mysql_num_rows($resultado2) == 0){
                                                echo "<script language='javascript'> alert('No hay docentes activos');window.history.go(-1);</script>";              
                                                 
                                            }
                                            else{
                                                if($resultado2 = mysql_query($sql2)){
                                                     while($fila = mysql_fetch_array($resultado2)){
                                                        
                                                        $iddocente=$fila['id_docente'];
                                                        $nombredocente=$fila['nombre1'];
                                                        $apellidodocente=$fila['apellido1'];
                                                        $ceduladocente=$fila['cedula'];
                                                        
                                                            echo' 
                                                            <option value="'.$iddocente.'">'.$nombredocente.' '.$apellidodocente.'- C.I: '.$ceduladocente.' </option>
                                                            ';
                                                       
                                                        
                                                        

                                                    }
                                                }
                                            }
                                            echo'
                                            </select>


                                </td>

                            </tr>
                             
                             
                            <tr>
                                <td colspan="3">
                                
                                    <button class="btn btn-default btn-lg btn-block fondogris letraroja" type="submit">Asignar Docente</button>   
                                </td>
                            </tr>
                            

                        </table>         
                        
                </form>
    ';

                ?>
                
            </div>
            
        </div>

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

    <!-- Script to Activate the Carousel -->
    

</body>

</html>
