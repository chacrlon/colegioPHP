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
      

      function confirmardenegacion(){
        if(confirm("Seguro que desea rechazar esta solicitud?")){
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

                    include_once("funciones_comunes.php");
    
    $conexion = Conectar();
    $db = mysql_select_db("UEDrJoseManuelSisoMartinez",$conexion)or die("Error al elegir la base de datos");

   
$idaniobt=$_POST['idanio'];
$idestudianteobt=$_POST['idestudiante'];
$idperiodoobt=$_POST['idperiodo'];
$idseccionobt=$_POST['idseccion'];


  echo'
     <table align="right">
        <form  action="veraprobados.php" method="POST" > 
            <tr>              
                <td>
                    <input type="hidden" value="'.$idperiodoobt.'" name="idperiodo">
                    <input type="hidden" value="'.$idaniobt.'" name="idanio">
                   <input type="hidden" value="'.$idseccionobt.'" name="idseccion">
                    <input type="submit" value="Regresar" class="btn btn-default form-control fondogris letraroja">

                </td>
            </tr>
        </form>
    </table>


<br><br><br><br>

    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Detalle de las Notas</h4></center>
    </div>
';
echo '<table class="table">';
                        
        
                            
$notafinalestu=0;
  $sumaanio=0;
        $contadoranio=0;
    $sqlanio="SELECT * FROM anio WHERE id_anio='$idaniobt'";
     if($resultadoanio = mysql_query($sqlanio)){
        $sumaanio=0;
        $contadoranio=0;
        while($filaanio = mysql_fetch_array($resultadoanio)){
            $idaniocon=$filaanio['id_anio'];
            $nombre_aniocon=$filaanio['nombre_anio'];

            echo'
            <tr>

                <td colspan="8" >
                    &nbsp;
                </td>

            </tr>
            <tr>

                <td colspan="8" class=" bordeazul  fondotitulos letrablanca text-center">
                    <h6> <strong>'.$nombre_aniocon.'</strong></h6>
                </td>

            </tr>

            <tr>
                
                <td>
                    
                    <strong class="letraroja">Cód.</strong>
                </td>
                <td>
                   
                    <strong class="letraroja">Materia</strong>
                </td>
                <td>
                    
                    <strong class="letraroja">Período</strong>
                </td>
                <td>
                    
                    <strong class="letraroja">Sección</strong>
                </td>
                
                <td>
                    
                    <strong class="letraroja">1er Lapso</strong>
                </td>
                 <td >
                    
                    <strong class="letraroja">2do Lapso</strong>
                </td>
                <td >
                  
                    <strong class="letraroja">3er Lapso</strong>
                </td>
                 <td class="fondogrisclaro">

                    <center><strong class="letraroja">Def.</strong></center>
                </td>

                                
            </tr>';
            $sqlmateriacon="SELECT * FROM materias WHERE id_anio='$idaniocon' ORDER BY nombre_materia ASC  ";

            if($resultadomateriacon = mysql_query($sqlmateriacon)){
        
                while($filamateriacom = mysql_fetch_array($resultadomateriacon)){
                    
                    $contadoranio=$contadoranio+1;


                    $id_materiacc=$filamateriacom["id_materia"];
                    $cod_materiacc=$filamateriacom["cod_materia"];
                    $nombre_materiacc = $filamateriacom["nombre_materia"];
                    $idaniocc= $filamateriacom["id_anio"];
                    $notaminima11=$filamateriacom["nota_minima"];


                    //comienzo segunda consulta
                    $notascc=" ";
                    $idnotacc=" ";
                      echo '
                        <tr>
                            <td>
                                <span>'.$cod_materiacc.'</span>
                            </td>
                             <td>
                                <span>'.$nombre_materiacc.'</span>
                            </td>  
                        ';
                    $sql2="SELECT * FROM inscripciones where id_estudiante='$idestudianteobt' and id_anio='$idaniocon' and id_periodo='$idperiodoobt' and id_seccion='$idseccionobt'";
                    $resultado2=mysql_query($sql2);
                    if(mysql_num_rows($resultado2)==0){
                        echo'
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
                            <td>
                                &nbsp;
                            </td>  
                            <td class="fondogrisclaro">
                                &nbsp;
                            </td>  

                                
                        ';
                    }
                    if($resultado2 = mysql_query($sql2)){
                        while($fila = mysql_fetch_array($resultado2)){   
                            $idperiodocc=$fila["id_periodo"];
                            $idseccioncc=$fila["id_seccion"];
                            $notafinalestu=0;
                            $sql3 = "SELECT * FROM seccion WHERE id_seccion='$idseccioncc'";
                            if($resultado3 = mysql_query($sql3)){
                                while($fila3 = mysql_fetch_array($resultado3)){
                                    $codigoseccioncc=$fila3["cod_seccion"];
                                }
                            }
                             $sql4 = "SELECT * FROM periodo WHERE id_periodo='$idperiodocc'";
                            if($resultado4 = mysql_query($sql4)){
                                while($fila4 = mysql_fetch_array($resultado4)){
                                    $nombreperiodocc=$fila4["nombre_periodo"];
                                }
                            } 

                            echo'
                            <td>
                                <span>'.$nombreperiodocc.'</strong>
                            </td>  
                            <td>
                                <span>'.$codigoseccioncc.'</strong>
                            </td>  
                                
                        ';
                            $sumanota101=0;
                            $sqlnue1 = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodocc' 
                            AND plan_evaluacion.id_anio = '$idaniocon' AND plan_evaluacion.id_seccion = '$idseccioncc' 
                            AND plan_evaluacion.id_materia = '$id_materiacc' AND plan_evaluacion.id_lapso = 1
                            ";
                            $resultadonue1 = mysql_query($sqlnue1)or die(mysql_error());
                            if(mysql_num_rows($resultadonue1) == 0){            
                                $sumapeso1=0;       
                            }
                            else{
                                if($resultadonue1=mysql_query($sqlnue1)){
                                    $sumapeso1=0;
                                    $sumanota101=0;
                                    while($filanue1=mysql_fetch_array($resultadonue1)){
                                        $idplan1=$filanue1['id_plan'];
                                        $numeroevaluacion1=$filanue1['numero_evaluacion'];
                                        $descripcion1=$filanue1['descripcion'];
                                        $escala1=$filanue1['escala'];
                                        $peso1=$filanue1['peso'];
                                        $sumapeso1=$sumapeso1+$peso1;

                                        $sql101="SELECT * FROM notas WHERE id_estudiante='$idestudianteobt' AND id_plan='$idplan1'";
                                        $resultado101 = mysql_query($sql101);

                 
                                        if(mysql_num_rows($resultado101) == 0){
                                
                                        }

                                        else{
                                            if($resultado101 = mysql_query($sql101)){
                       
                                                while($fila101 = mysql_fetch_array($resultado101)){
                                                    $nota101=$fila101['nota'];
                                                    $totalpeso101=($nota101*$peso1)/$escala1;
                                                    $calculopeso1=($totalpeso101*20)/$peso1;
                                                    $sumanota101=$sumanota101+$totalpeso101;
                                                }
                                            }
                                        }
                       
                                    }
                     
                                }
                            }

                            $sumanota10red1=round ($sumanota101);

                            if($sumanota101<=0){
                                echo'<td><span class="letraroja2">0</span></td>';
                            }
                            else{
                                if($sumanota101<($notaminima11-0.5)){
                                    echo'<td><span class="letraroja2">'.$sumanota10red1.'</span></td>';
                                }
                                else{
                                    echo'<td><span class="letraroja">'.$sumanota10red1.'</span></td>';
                                }
                        
                            }
                            $notafinalestu=$notafinalestu+$sumanota10red1;



                            $sumanota102=0;

                            $sqlnue2 = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodocc' 
                            AND plan_evaluacion.id_anio = '$idaniocc' AND plan_evaluacion.id_seccion = '$idseccioncc' 
                            AND plan_evaluacion.id_materia = '$id_materiacc' AND plan_evaluacion.id_lapso = 2
                            ";
                            $resultadonue2 = mysql_query($sqlnue2)or die(mysql_error());
                            if(mysql_num_rows($resultadonue2) == 0){            
                                $sumapeso2=0;  
                            }
                            else{
                                if($resultadonue2=mysql_query($sqlnue2)){
                                    $sumapeso2=0;
                                    $sumanota102=0;
                                    while($filanue2=mysql_fetch_array($resultadonue2)){
                                        $idplan2=$filanue2['id_plan'];
                                        $numeroevaluacion2=$filanue2['numero_evaluacion'];
                                        $descripcion2=$filanue2['descripcion'];
                                        $escala2=$filanue2['escala'];
                                        $peso2=$filanue2['peso'];
                                        $sumapeso2=$sumapeso2+$peso2;

                                        $sql102="SELECT * FROM notas WHERE id_estudiante='$idestudianteobt' AND id_plan='$idplan2'";
                                        $resultado102 = mysql_query($sql102);

                 
                                        if(mysql_num_rows($resultado102) == 0){
                   
                    
                                        }
                                        else{
                   
                                            if($resultado102 = mysql_query($sql102)){
                       
                                                while($fila102 = mysql_fetch_array($resultado102)){
                                                    $nota102=$fila102['nota'];
                                                    $totalpeso102=($nota102*$peso2)/$escala2;
                                                    $calculopeso2=($totalpeso102*20)/$peso2;
                                                    $sumanota102=$sumanota102+$totalpeso102;
                                                }
                                            }
                                        }
                       
                                    }
                     
                                }
                            }
            
                            $sumanota10red2=round ($sumanota102);

                            if($sumanota102<=0){
                                echo'<td><span class="letraroja2">0</span></td>';
                            }
                            else{
                                if($sumanota102<($notaminima11-0.5)){
                                    echo'<td><span class="letraroja2">'.$sumanota10red2.'</span></td>';
                                }
                                else{
                                    echo'<td><span class="letraroja">'.$sumanota10red2.'</span></td>';
                                }
                            }       
                            $notafinalestu=$notafinalestu+$sumanota10red2;




                            $sumanota103=0;
                            $sqlnue3 = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodocc' 
                            AND plan_evaluacion.id_anio = '$idaniocc' AND plan_evaluacion.id_seccion = '$idseccioncc' 
                            AND plan_evaluacion.id_materia = '$id_materiacc' AND plan_evaluacion.id_lapso = 3
                            ";
                            $resultadonue3 = mysql_query($sqlnue3)or die(mysql_error());
                            if(mysql_num_rows($resultadonue3) == 0){            
                                $sumapeso3=0;       
                            }
                            else{
                                if($resultadonue3=mysql_query($sqlnue3)){
                                    $sumapeso3=0;
                                    $sumanota103=0;
                                    while($filanue3=mysql_fetch_array($resultadonue3)){
                                        $idplan3=$filanue3['id_plan'];
                                        $numeroevaluacion3=$filanue3['numero_evaluacion'];
                                        $descripcion3=$filanue3['descripcion'];
                                        $escala3=$filanue3['escala'];
                                        $peso3=$filanue3['peso'];
                                        $sumapeso3=$sumapeso3+$peso3;

                                        $sql103="SELECT * FROM notas WHERE id_estudiante='$idestudianteobt' AND id_plan='$idplan3'";
                                        $resultado103 = mysql_query($sql103);

                 
                                        if(mysql_num_rows($resultado103) == 0){
                  
                                        }

                                        else{
                   
                                            if($resultado103 = mysql_query($sql103)){
                       
                                                while($fila103 = mysql_fetch_array($resultado103)){
                                                    $nota103=$fila103['nota'];
                                                    $totalpeso103=($nota103*$peso3)/$escala3;
                                                    $calculopeso3=($totalpeso103*20)/$peso3;
                                                    $sumanota103=$sumanota103+$totalpeso103;
                                                }
                                            }
                                        }
                       
                                    }
                     
                                }
                            }

                            $sumanota10red3=round ($sumanota103);

                            if($sumanota103<=0){
                                echo'<td><span class="letraroja2">0</span></td>';
                            }
                            else{
                                if($sumanota103<($notaminima11-0.5)){
                                     echo'<td><span class="letraroja2">'.$sumanota103.' = '.$sumanota10red3.'</span></td>';

                                }
                                else{
                                    echo'<td><span class="letraroja">'.$sumanota103.' = '.$sumanota10red3.'</span></td>';
                                }
                            }


                            $notafinalestu=$notafinalestu+$sumanota10red3;
                            $notafinalestu=$notafinalestu/3;

                            $notafinalestured=round ($notafinalestu);
                            $sumaanio=$sumaanio+$notafinalestured;
                            

                            if($notafinalestu<=0){
                                echo'<td class="fondogrisclaro"><center><span class="letraroja2">0</span></center></td>';
                            }
                            else{

               
                                if($notafinalestu<($notaminima11-0.5)){
                                    echo'<td class="fondogrisclaro"><center><span class="letraroja2">'.$notafinalestured.'</span></center></td>';
                                }
                                else{
                                    echo'<td class="fondogrisclaro"><center><span class="letraroja">'.$notafinalestured.'</span></center></td>';
                                }
                            }



                            

                        }
                    }


          //fin segunda consulta
            
        }
    }

    if($contadoranio==0||$sumaanio==0){
        echo'</tr>
                            <tr>
                                <td colspan="8">
                                    &nbsp;

                                </td>

                            </tr>


                            ';
    }
    else{
         $promedio=$sumaanio/$contadoranio;
                    echo'</tr>
                            <tr>
                                <td colspan="8">
                                    <span class="letraroja">Promedio=</span> '.$promedio.'

                                </td>

                            </tr>


                            ';
    }
       
    $contadoranio=0;
    $promedio=0;
    $sumaanio=0;




        }
    }
   
    echo'
     </tr>
     </table>    

    ';

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
            <div class="row">
                <div class="col-lg-12 text-center">
                    
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
