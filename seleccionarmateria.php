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

    
    $idperiodo=$_POST['idperiodo'];
    $idanio=$_POST['idanio'];
    $idseccion=$_POST['idseccion'];

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

    echo'
<table align="right">
    <form  action="Consultaraniocompleto.php" method="POST" > 
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


 <br><br><br><br>
    ';


    $sql = "SELECT * FROM anio WHERE id_anio='$idanio'";
    $resultado = mysql_query($sql)or die(mysql_error());

    if(mysql_num_rows($resultado) == 0){
    echo "<script language='javascript'> alert('No hay Años registrados...');</script>";              
           echo "<script language='javascript'>window.location.href='Bienvenido.php';</script>"; 
    }
    else{
          
      if($resultado = mysql_query($sql)){
        
        while($fila = mysql_fetch_array($resultado)){
            
         $idanio2=$fila["id_anio"];
          $codigoanio = $fila["codigo_anio"];
          $nombreanio = $fila["nombre_anio"];
          $statusanio = $fila["status_anio"];
          echo '
          <div class=" modal-header fondorojo letrablanca">
            <center><h4 class="modal-title " id="myModalLabel"> '.$nombreperiodo.' - '.$nombreanio.' - '.$nombreseccion.'</h4></center>
        </div><br>';
           

    $sql2 = "SELECT * FROM materias WHERE id_anio='$idanio2' ORDER BY id_materia ASC";
    $resultado2 = mysql_query($sql2)or die(mysql_error());
    if(mysql_num_rows($resultado2) == 0){
    echo "No hay materias registradas en este Año...<br><br>";              
            
    }
    else{
        
          echo'
          <table class="table">
          <tr>
                            <td>
                                <strong><span class="letraroja">Código de la Materia</span></strong>
                            </td>
                            <td colspan="2">
                                <strong><span class="letraroja">Nombre de la Materia</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Nota mínima</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Status de la Materia</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Opción</span></strong>
                            </td>
                        </tr>
';

        if($resultado2 = mysql_query($sql2)){
        
             while($fila2 = mysql_fetch_array($resultado2)){
                $idmateria=$fila2["id_materia"];
                $codigomateria=$fila2["cod_materia"];
                $nombremateria=$fila2["nombre_materia"];
                $notaminima=$fila2["nota_minima"];
                $statusmateria=$fila2["status_materia"];
                echo'

    <form  action="entrarmateriaseccion.php" method="POST"> 
                            <tr>
                                <td>
                                <input type="hidden" name="idsolicitud" value="'.$idmateria.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio2.'">
                                    
                                    <input type="text" name="codigomateria" value="'.$codigomateria.'"  class="form-control" required>
                                </td>
                                <td colspan="2">
                                   
                                    <input type="text" name="nombremateria" value="'.$nombremateria.'"  class="form-control" required>
                                </td>
                                <td>
                                   
                                    <input type="text" name="notaminima" value="'.$notaminima.'"   class="form-control" required>
                                </td>
                            
                                <td>
                                    <select name="statusmateria" class="form-control" disabled required>
                                    ';
                                        if($statusanio=="Activo"){
                                            echo' <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                            ';
                                        }
                                        else{
                                            echo' <option value="Inactivo">Inactivo</option>
                                            <option value="Activo">Activo</option>
                                            ';
                                        }


                                    echo'
                                    
                                    
                                    </select
                                </td>
                                ';
                                $sqlrev = "SELECT * FROM asignacion_docente WHERE id_periodo = '$idperiodo' AND id_anio = '$idanio2' AND id_seccion = '$idseccion' AND id_materia = '$idmateria'";
                                $resultadorev=mysql_query($sqlrev);
                                if(mysql_num_rows($resultadorev)==0){
                                    if($tipoU=="SuperUser"){
                                        echo'
                                            <td>
                                                <input type="submit" value="Seleccionar" class="btn btn-default form-control fondogris letraroja">
                                            </td>
                                        ';
                                    }
                                    else{
                                       echo'
                                            <td>
                                                <input type="submit" value="Seleccionar" class="btn btn-default form-control fondogris letraroja" disabled="disabled">
                                            </td>
                                        '; 
                                    }
                                }
                                else{
                                    if($resultadorev = mysql_query($sqlrev)){
                                        while($filarev = mysql_fetch_array($resultadorev)){
                                            $idobt=$filarev["id_docente"];

                                        }
                                    }
                                    if($tipoU=="Docente"){
                                        $iddocenteactual=$_SESSION["unic"];
                                        if($iddocenteactual==$idobt){
                                            echo'
                                            <td>
                                                <input type="submit" value="Seleccionar" class="btn btn-default form-control fondogris letraroja">
                                            </td>
                                        ';
                                        }
                                        else{
                                            echo'
                                            <td>
                                                <input type="submit" value="Seleccionar" class="btn btn-default form-control fondogris letraroja" disabled="disabled">
                                            </td>
                                        ';
                                        }
                                    }
                                    else if($tipoU=="SuperUser"){
                                        echo'
                                            <td>
                                                <input type="submit" value="Seleccionar" class="btn btn-default form-control fondogris letraroja">
                                            </td>
                                        ';
                                    }
                                    else{
                                         echo'
                                            <td>
                                                <input type="submit" value="Seleccionar" class="btn btn-default form-control fondogris letraroja" disabled="disabled">
                                            </td>
                                        ';
                                    }

                                }
                                echo'
                            </tr>
                            </form>
                           
                            
          ';  

            }
        }
        echo ' </table>';
    }

    
} }}

echo'
     
                        
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
