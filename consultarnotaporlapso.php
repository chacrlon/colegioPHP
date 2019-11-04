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
   $idestudiante=$_POST['idestudiante'];
  
    $idseccion=$_POST['idseccion'];
    $idperiodo=$_POST['idperiodo'];
    $idanio=$_POST['idanio'];
    $lapso=$_POST['lapso'];
    
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
        
        <center><h4 class="modal-title " id="myModalLabel">Notas - '.$lapso2.' - '.$nombremateria11.'</h4></center>
    </div>
          
                        <table class="table">

                        <tr>
                        <td>
                                <strong><span class="letraroja">Nº</span></strong>
                            </td>
                            <td >
                                <strong><span class="letraroja">Descripción</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Nota</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Escala</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Peso</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Fecha de Carga</span></strong>
                            </td>
                            <td>
                                <strong><span class="letraroja">Responsable</span></strong>
                            </td>


                        </tr>
    ';
    $sumanue=0;
$sqlnue = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodo' 
AND plan_evaluacion.id_anio = '$idanio' AND plan_evaluacion.id_seccion = '$idseccion' 
AND plan_evaluacion.id_materia = '$idmateria' 
    AND plan_evaluacion.id_lapso = '$lapso'
    ";
    $sumanota10red=0;
    $resultadonue = mysql_query($sqlnue)or die(mysql_error());
    if(mysql_num_rows($resultadonue) == 0){            
           $sumapeso=0;       
    }
    else{
        if($resultadonue=mysql_query($sqlnue)){
            $sumapeso=0;
            $sumanota10=0;
            while($filanue=mysql_fetch_array($resultadonue)){
                $idplan=$filanue['id_plan'];
                $numeroevaluacion=$filanue['numero_evaluacion'];
                $descripcion=$filanue['descripcion'];
                $escala=$filanue['escala'];
                $peso=$filanue['peso'];
               $sumapeso=$sumapeso+$peso;
               
                $sql10="SELECT * FROM notas WHERE id_estudiante='$idestudiante' AND id_plan='$idplan'";
                $resultado10 = mysql_query($sql10);

                 
                if(mysql_num_rows($resultado10) == 0){
                   

                }

                else{
                   
                    if($resultado10 = mysql_query($sql10)){
                       
                        while($fila10 = mysql_fetch_array($resultado10)){
                            $nota10=$fila10['nota'];
                            $totalpeso10=($nota10*$peso)/$escala;
                            $calculopeso=($totalpeso10*20)/$peso;
                            $fecha_carga=$fila10['fecha_carga'];
                            $id_usuariores=$fila10['id_usuariores'];

                            $sqlusu = "SELECT * FROM usuario WHERE id_usuario='$id_usuariores'";
                            if($resultadousu = mysql_query($sqlusu)){
                                while($filausu = mysql_fetch_array($resultadousu)){
                                    $nombre_usuariores=$filausu["nombre_usuario"];
                                    
                                }
                            }



                            echo'<tr>
                                <td>
                                    '.$numeroevaluacion.'
                                </td>
                                <td>
                                    '.$descripcion.'
                                </td>
                               
                                    ';
                                    if($calculopeso<($notaminima11-0.5)){

                                         echo ' <td class="letraroja2">';

                                        echo $nota10;

                                            echo ' </td>';

                                    }  
                                    else{
                                       echo ' <td class="letraroja">';

                                        echo $nota10;

                                            echo ' </td>';
                                    }                               
                                echo'   
                               
                                <td>
                                    '.$escala.'
                                </td>
                                <td>
                                    '.$peso.'
                                </td>
                                <td>
                                    '.$fecha_carga.'
                                </td>
                                <td>
                                    '.$nombre_usuariores.'
                                </td>




                            </tr>';
                            
                         $sumanota10=$sumanota10+$totalpeso10;

                         

                         
                         }

                         $sumanota10red=round ($sumanota10);
                    
                        
                        

                     }
                        }
                       
                    }
                     
 echo '<tr>
                        <td>

                        </td>
                    
                        <td>

                        </td>
                        <td>
                        ';

                            if($sumanota10<($notaminima11-0.5)){
                                echo'<span class="letraroja2">'.$sumanota10.' = '.$sumanota10red.'</span>';

                            }
                            else{
                                echo'<span class="letraroja">'.$sumanota10.' = '.$sumanota10red.'</span>';
                            }
                        echo'
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>


                    ';
               
            
                
        
    }
}
   
echo'
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
   
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
</body>

</html>
