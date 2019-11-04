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

                   
    
    $idperiodo=$_POST['idsolicitud'];
     $sql3 = "SELECT * FROM periodo WHERE id_periodo='$idperiodo'";
        if($resultado3 = mysql_query($sql3)){
            while($fila3 = mysql_fetch_array($resultado3)){
                $nombreperiodo2=$fila3["nombre_periodo"];
            }
        }

        echo'
<table align="right">
    <form  action="consultarperiodo.php" method="POST" > 
                            <tr>
                               
                                <td>
                                
                                

                                    <input type="submit" value="Regresar" class="btn btn-default form-control fondogris letraroja">
                                </td>
                            </tr>
                            </form>
                            </table>


    ';


    echo'

    <br><br><br><br>
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Seleccione el Año - '.$nombreperiodo2.'</h4></center>
    </div>
          
                        <table class="table">

                        <tr>
                            <td>
                                <strong><span class="letraroja">Código del Año</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Nombre del Año</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Status del Año</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Total de Estudiantes</span></strong>
                            </td>
                            
                            <td>
                                <strong><span class="letraroja">Opcion</span></strong>
                            </td>



                        </tr>
    ';


    $sql2 = "SELECT * FROM anio";
    $resultado2 = mysql_query($sql2)or die(mysql_error());  
    if(mysql_num_rows($resultado2) == 0){
            echo "<script language='javascript'> alert('Aún no hay Años registrados en el Sistema... Registre una Sección');</script>";              
        echo "<script language='javascript'>window.location.href='Anios.php';</script>"; 
    }
    else{
        if($resultado2 = mysql_query($sql2)){
            while($fila = mysql_fetch_array($resultado2)){
                $idanio=$fila['id_anio'];
                $cod_anio=$fila['codigo_anio'];
                $nombre_anio=$fila['nombre_anio'];
                $status_anio=$fila['status_anio'];
                $sql = "SELECT * FROM inscripciones where id_periodo='$idperiodo' AND id_anio='$idanio'";
                $resul = mysql_query($sql);
                $resultado=mysql_num_rows($resul);
                

                   echo'

                        <form  action="Consultaraniocompleto.php"  method="POST" enctype = "multipart/form-data" > 
                            <tr>
                                <td>
                                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                               
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                
                                    
                                    <span class="letraroja">'.$cod_anio.'</span>
                                </td>
                                <td>
                                   
                                    '.$nombre_anio.'
                                </td>
                                <td>
                                   
                                    '.$status_anio.'
                                </td>
                            
                                <td>
                                    
                                    '.$resultado.'
                                </td>    
                                
                            
                            </form> 
                           

                                </form>
                                <td>
                                    <form  action="Consultaraniocompleto.php" method="POST" enctype = "multipart/form-data" > 
                           
                                        <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                               
                                        <input type="hidden" name="idanio" value="'.$idanio.'">
                                        <input type="submit" value="Ver más" class="btn btn-default fondogris form-control letraroja">
                                </td>
                                
                            </tr>
                                    </form>        
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
