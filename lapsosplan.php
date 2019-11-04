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
     
      function confirmar(){
        if(confirm("Seguro que desea Modificar la Evaluación?")){
            return true;
        }
        else{
            return false;
        }
      }

      function confirmar2(){
        if(confirm("Seguro que desea Eliminar la Evaluación?")){
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
        if($tipoU != "Docente"){
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
   
    $idseccion=$_POST['idseccion'];
    $idperiodo=$_POST['idperiodo'];
    $idanio=$_POST['idanio'];
    $lapso=$_POST['lapso'];

    if(isset($_POST['iddocente'])){
        $iddocente=$_POST['iddocente'];
    }
    else{
        $iddocente=0;
    }
    
    if($lapso==1){
        $lapso2="Primer Lapso";
    }
    else if($lapso==2){
        $lapso2="Segundo Lapso";
    }
    else if($lapso==3){
        $lapso2="Tercer Lapso";
    }
    else{
        $lapso2="Lapso Inválido";
    }
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

        $sql11 = "SELECT * FROM materias WHERE id_materia='$idmateria'";
        if($resultado11 = mysql_query($sql11)){
            while($fila11 = mysql_fetch_array($resultado11)){
                $notaminima11=$fila11["nota_minima"];
                 $nombremateria11=$fila11["nombre_materia"];
            }
        }

    echo '
   
            <table align="right">
        <form  action="entrarmateriaseccion.php" method="POST" > 
            <tr>              
                <td>
                    <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idsolicitud" value="'.$idmateria.'">
                                
                    <input type="submit" value="Regresar" class="btn btn-default form-control fondogris letraroja">
                </td>
            </tr>
        </form>
    </table>

<br><br><br><br>

    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Plan de Evaluación - '.$lapso2.' - '.$nombremateria11.'</h4></center>
    </div>
          
                        <table class="table">

                        <tr>
                        <td>
                                <strong><span class="letraroja">Nº</span></strong>
                            </td>
                            <td colspan="2">
                                <strong><span class="letraroja">Descripción</span></strong>
                            </td>
                            
                            <td>
                                <strong><span class="letraroja">Escala</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Peso</span></strong>
                            </td>
                            
                            
                            <td colspan="2">
                                <strong><span class="letraroja">Opción</span></strong>
                            </td>



                        </tr>
    ';
    $sumanue=0;
$sqlnue = "SELECT * FROM plan_evaluacion WHERE id_periodo = '$idperiodo' AND id_anio = '$idanio' AND id_seccion = '$idseccion' AND id_materia = '$idmateria' AND id_lapso = '$lapso' ";
    $resultadonue = mysql_query($sqlnue)or die(mysql_error());
    if(mysql_num_rows($resultadonue) == 0){            
           $sumanue=0; 
    }
    else{
        if($resultadonue=mysql_query($sqlnue)){
            while($filanue=mysql_fetch_array($resultadonue)){
                $sumanue=$sumanue+$filanue['peso'];

            }

        }
    }


    $sql6 = "SELECT * FROM plan_evaluacion WHERE id_periodo='$idperiodo' AND id_anio=$idanio AND id_seccion=$idseccion AND id_materia=$idmateria AND id_lapso=$lapso";
    $resultado6 = mysql_query($sql6);
    if(mysql_num_rows($resultado6) == 0){
            echo "<script language='javascript'> alert('No hay Plan de Evaluación Cargado...');</script>"; 
            $sumapeso=0;             
        
    }
    else{
        if($resultado6 = mysql_query($sql6)){
            $sumapeso=0;
            while($fila6 = mysql_fetch_array($resultado6)){
                $idplan=$fila6['id_plan'];
                $numeroevaluacion=$fila6['numero_evaluacion'];
                $descripcion=$fila6['descripcion'];
                $escala=$fila6['escala'];
                $peso=$fila6['peso'];
               $sumapeso=$sumapeso+$peso;

                   echo'
                   <form  action="Modificarplan.php"  method="POST" enctype = "multipart/form-data" onsubmit="return confirmar();"> 
                        
                            <tr>

                            <td>
                                   
                                    <input type="number" name="numero" value="'.$numeroevaluacion.'" class="form-control">
                                </td>
                              <td colspan="2">
                                  
                                    <input type="text" name="descripcion" value="'.$descripcion.'" class="form-control">
                                </td>
                                
                                <td>
                                  
                                    <input type="number" name="escala" value="'.$escala.'" class="form-control">
                                </td>
                                <td>
                                   
                                    <input type="number" name="peso" value="'.$peso.'" class="form-control">
                                </td>
                            <td>
                            
                            
                            
                                <input type="hidden" name="idplan" value="'.$idplan.'">
                                
                                <input type="hidden" name="iddocente" value="'.$iddocente.'">
                                 <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="lapso" value="'.$lapso.'">
                                
                                
                                    ';
                                   
                                        echo '<input type="submit" value="Guardar Cambios" class="btn btn-default form-control fondogris letraroja">';

                                    echo'   
                              
                            </form> 

                            </td>
                            <td>
                            <form  action="eliminarevaluacion.php"  method="POST" enctype = "multipart/form-data" onsubmit="return confirmar2();"> 
                            
                                <input type="hidden" name="idplan" value="'.$idplan.'">
                                <input type="hidden" name="iddocente" value="'.$iddocente.'">
                                 <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="lapso" value="'.$lapso.'">
                                
                                
                                
                                    ';
                                   
                                        echo '<input type="submit" value="Eliminar" class="btn btn-default form-control fondogris letraroja">';

                                    echo'   
                              
                            </form> 

                            </td>
                            </tr>
                                   
                            '; 


            }
            echo'
                    <tr>

                            <td>
                                   
                                   
                                </td>
                              <td colspan="2">
                                  
                                   
                                </td>
                                
                                <td>
                                  
                                    
                                </td>
                                <td>
                                   
                                    <strong><input type="text" value="'.$sumapeso.'" class="form-control" disabled></strong>
                                </td>
                            <td>
                            
                            </td>
                            <td>
                            
                            </td>
                            </tr>


            ';

        }
    }
if($sumapeso<20){
      echo'
                        <form  action="registrarplan.php"  method="POST" enctype = "multipart/form-data" > 
                        <tr>
                            <td>
                              <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="lapso" value="'.$lapso.'">
                                <input type="hidden" name="iddocente" value="'.$iddocente.'">

                                
                                   <br>
                                    <input type="number" name="numeroevaluacion" placeholder="Número de Evaluación" class="form-control" REQUIRED>
                                </td>
                              <td colspan="2">
                            
                                   <br>
                                    <input type="text" name="descripcion" placeholder="Descripción" class="form-control" required>
                                </td>
                               
                                <td>
                                   <br>
                                    <input type="number" name="escala" placeholder="Escala" class="form-control" required>
                                </td>
                                <td>
                                   <br>
                                    <input type="number" name="peso" placeholder="Peso" class="form-control" required>
                                </td>
                                <td colspan="2">
                                     <br>
                                    <input type="submit" value="Agregar" class="btn btn-default form-control fondogris letraroja">
                                </td>
                            </tr>
                        </form>     
    ';
}
echo'
</table>  
';

    echo'
    <br><br>

    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Listado de Estudiantes</h4></center>
    </div>
          <div class="table-responsive">
                        <table class="table">

                        <tr>
                            <td WIDTH="30%">
                                <center><strong><span class="letraroja">Datos del Estudiante</span></strong></center>
                            </td>
                            ';

    $sql8 = "SELECT * FROM plan_evaluacion where id_periodo='$idperiodo' AND id_anio='$idanio' AND id_seccion='$idseccion' AND id_materia='$idmateria' AND id_lapso='$lapso'  ORDER BY numero_evaluacion ASC";
    $resultado8 = mysql_query($sql8);
    if(mysql_num_rows($resultado8) == 0){
              
    }
    else{
        if($resultado8 = mysql_query($sql8)){
            while($fila8 = mysql_fetch_array($resultado8)){
                $idplan8=$fila8['id_plan'];
                $numeroevaluacion8=$fila8['numero_evaluacion'];
                $descripcion8=$fila8['descripcion'];
                $escala8=$fila8['escala'];
                echo '<td><center>


                    <a tabindex="0" class="btn btn-info" role="button" data-toggle="popover" data-trigger="focus" title="Descripción de la Evaluación" data-placement="bottom" data-content="'.$descripcion8.' - Escala: '.$escala8.'">'.$numeroevaluacion8.'</a>
                
                </center></td>';
                
            }
        }
    }              

echo'
<td><center><strong><span class="letraroja">Nota Final</span></strong></center></td>
                        </tr>
    ';

    $sql2 = "SELECT * FROM estudiante INNER JOIN inscripciones ON estudiante.id_estudiante=inscripciones.id_estudiante WHERE inscripciones.id_periodo='$idperiodo' AND inscripciones.id_anio='$idanio' AND inscripciones.id_seccion='$idseccion' ORDER BY estudiante.cedula";
    $resultado2 = mysql_query($sql2)or die(mysql_error());  
    if(mysql_num_rows($resultado2) == 0){
            echo "<script language='javascript'> alert('No hay estudiantes registrados en esta Sección...');</script>";              
        echo "<script language='javascript'>window.location.href='Bienvenido.php';</script>"; 
    }
    else{
        if($resultado2 = mysql_query($sql2)){
            while($fila = mysql_fetch_array($resultado2)){
                $sumanota10=0;
                $idestudiante=$fila['id_estudiante'];
                $nombre1=$fila['nombre1'];
                $nombre2=$fila['nombre2'];
                $apellido1=$fila['apellido1'];
                $apellido2=$fila['apellido2'];
                $cedula=$fila['cedula'];
                $ruta=$fila['ruta'];
                

    $sql9 = "SELECT * FROM plan_evaluacion where id_periodo='$idperiodo' AND id_anio='$idanio' AND id_seccion='$idseccion' AND id_materia='$idmateria' AND id_lapso='$lapso'  ORDER BY numero_evaluacion ASC";
    $resultado9 = mysql_query($sql9);
    if(mysql_num_rows($resultado9) == 0){
              
    }
    else{
        if($resultado9 = mysql_query($sql9)){

             echo'

                        
                            <tr>
                                <td>
                                
                                    
                                    <img src="'.$ruta.'" class="cargarimagen2">
                               
                                    &nbsp;&nbsp;<strong>'.$cedula.'</strong>- '.$nombre1.' '.$nombre2.' '.$apellido1.' '.$apellido2.' 
                            
                            <form  action="Historia.php"  method="GET" enctype = "multipart/form-data" > 
                            
                                <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
                                
                                    ';
                                   
                                   

                                    echo'   
                              
                            </form> 
                            </td>
                            
                            
                                   
                            '; 

                            $sumanota10red=0;
            while($fila9 = mysql_fetch_array($resultado9)){
                $idplan9=$fila9['id_plan'];
                $escala9=$fila9['escala'];
                $peso9=$fila9['peso'];

                $sql10="SELECT * FROM notas WHERE id_estudiante='$idestudiante' AND id_plan='$idplan9'";
                $resultado10 = mysql_query($sql10);

                 
                if(mysql_num_rows($resultado10) == 0){
                   
                    echo '<form action="registrarnota.php" method="POST">';

                               
                             echo '<td><center> ';
                                  

                                    echo'
                            <input type="number" <span name="notaa" value="" class="form-control letraroja"></span>

                            <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="lapso" value="'.$lapso.'">
                                
                                <input type="hidden" name="idplan" value="'.$idplan9.'">
                                <input type="hidden" name="escala" value="'.$escala9.'">


                            <input type="submit" value="OK" class="form-control"></center></td>';
                          
                            echo'
                                
                                </form>
                            ';

                }
                else{
                   
                    if($resultado10 = mysql_query($sql10)){
                        while($fila10 = mysql_fetch_array($resultado10)){
                            $nota10=$fila10['nota'];
                            $totalpeso10=($nota10*$peso9)/$escala9;
                            $calculopeso=($totalpeso10*20)/$peso9;
                            echo '<form action="registrarnota.php" method="POST">';

                               
                                   echo '<td><center> ';
                                  
                                    echo'<input type="number" name="notaa" value="'.$nota10.'" class="form-control ';if($calculopeso<($notaminima11-0.5)){echo' letraroja2';}else{echo' letraroja';}  echo'">
                                       


                                    <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                                <input type="hidden" name="idanio" value="'.$idanio.'">
                                <input type="hidden" name="idseccion" value="'.$idseccion.'">
                                <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
                                <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="lapso" value="'.$lapso.'">
                                
                                <input type="hidden" name="idplan" value="'.$idplan9.'">
                                <input type="hidden" name="escala" value="'.$escala9.'">

                                    <input type="submit" value="OK" class="form-control"></center></td>';
                                }
                                
                        
                            echo'
                               
                                </form>
                            ';
                            
                         $sumanota10=$sumanota10+$totalpeso10;
                         $sumanota10red=round ($sumanota10);
                        }
                       
                    }
                }

                
            }
            if($sumanota10<($notaminima11-0.5)){
                echo '<td><br><center><span class="letraroja2">'.$sumanota10.' = '.$sumanota10red.'</span></center></td>';
            }
            else{
                echo '<td><br><center><span class="letraroja">'.$sumanota10.' = '.$sumanota10red.'</span></center></td>';
            }
             
            echo'
</tr>
';
        }
    }              
                  


            }

        }
    

echo'
</tr>


</table>  

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
    <script >
    $(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>
    <!-- Script to Activate the Carousel -->



</body>

</html>
