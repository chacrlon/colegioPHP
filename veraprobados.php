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
                $fechacierre=$fila4["fecha_final"];
            }
        }

        $sql5 = "SELECT * FROM anio WHERE id_anio='$idanio'";
        if($resultado5 = mysql_query($sql5)){
            while($fila5 = mysql_fetch_array($resultado5)){
                $nombreanio=$fila5["nombre_anio"];
            }
        }
         date_default_timezone_set("America/Caracas");
    $fechaactual=date("Y-n-j");
    echo'
     <table align="right">
        <form  action="consultaraniocompleto.php" method="POST" > 
            <tr>              
                <td>
                    <input type="hidden" value="'.$idperiodo.'" name="idperiodo">
                    <input type="hidden" value="'.$idanio.'" name="idanio">
                   
                    <input type="submit" value="Regresar" class="btn btn-default form-control fondogris letraroja">

                </td>
            </tr>
        </form>
    </table>
';
   
    echo'
    <br><br><br><br>
    <div class="modal-header fondorojo letrablanca">
        
        <center><h4 class="modal-title " id="myModalLabel">Listado de Estudiantes - '.$nombreperiodo.' - '.$nombreanio.' - '.$nombreseccion.'</h4></center>
    </div>
          
                        <table class="table">

                        <tr>
                            <td>
                                <center><strong><span class="letraroja">Foto</span></strong></center>
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
                                <strong><span class="letraroja">Condición</span></strong>
                            </td>
                            <td colspan="2">
                                <strong><span class="letraroja">Opción</span></strong>
                            </td>
                        </tr>
    ';
               
    
          
                $sqlestu = "SELECT * FROM estudiante INNER JOIN inscripciones ON estudiante.id_estudiante=inscripciones.id_estudiante WHERE inscripciones.id_periodo='$idperiodo' AND inscripciones.id_anio='$idanio' AND inscripciones.id_seccion='$idseccion'";
                $resultadoestu = mysql_query($sqlestu)or die(mysql_error());  
                if(mysql_num_rows($resultadoestu) == 0){
                    echo "<script language='javascript'> alert('No hay estudiantes registrados en esta Sección...');</script>";              
                    echo "<script language='javascript'>window.location.href='Bienvenido.php';</script>"; 
                }
                else{
                    if($resultadoestu = mysql_query($sqlestu)){
                        while($fila = mysql_fetch_array($resultadoestu)){

                            $notafinalestu=0;
                
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
                                ';
                            $contadoranio=0;
                            $materiasaprobadas=0;
    $sumaanio=0;   
    $sqlmateriacon="SELECT * FROM materias WHERE id_anio='$idanio' ORDER BY nombre_materia ASC  ";
    $resultadomateriacon=mysql_query($sqlmateriacon);
    $contadoranio=mysql_num_rows($resultadomateriacon);
        if($resultadomateriacon = mysql_query($sqlmateriacon)){
        
            while($filamateriacom = mysql_fetch_array($resultadomateriacon)){
                    
                
                $sumanota101=0;
                $sumanota102=0;
                $sumanota103=0;
                

                $id_materiacc=$filamateriacom["id_materia"];
                $cod_materiacc=$filamateriacom["cod_materia"];
                $nombre_materiacc = $filamateriacom["nombre_materia"];
                $idaniocc= $filamateriacom["id_anio"];
                $notaminima11=$filamateriacom["nota_minima"];
                $notafinalestu=0;

                                $sumanue=0;


                $sumanota101=0;
                $sqlnue1 = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodo' 
                AND plan_evaluacion.id_anio = '$idanio' AND plan_evaluacion.id_seccion = '$idseccion' 
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

                            $sql101="SELECT * FROM notas WHERE id_estudiante='$idestudiante' AND id_plan='$idplan1'";
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
                $notafinalestu=$notafinalestu+$sumanota10red1;




                $sumanota102=0;

                $sqlnue2 = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodo' 
                AND plan_evaluacion.id_anio = '$idanio' AND plan_evaluacion.id_seccion = '$idseccion' 
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

                            $sql102="SELECT * FROM notas WHERE id_estudiante='$idestudiante' AND id_plan='$idplan2'";
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

                
                $notafinalestu=$notafinalestu+$sumanota10red2;




                $sumanota103=0;
                $sqlnue3 = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodo' 
                AND plan_evaluacion.id_anio = '$idanio' AND plan_evaluacion.id_seccion = '$idseccion' 
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

                            $sql103="SELECT * FROM notas WHERE id_estudiante='$idestudiante' AND id_plan='$idplan3'";
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


                $notafinalestu=$notafinalestu+$sumanota10red3;
                
                $notafinalestu=$notafinalestu/3;

                $notafinalestured=round ($notafinalestu);
                
                if($notafinalestured>=$notaminima11){
                    $materiasaprobadas=$materiasaprobadas+1;
                }



            }
}


if($materiasaprobadas<$contadoranio){
    echo'<td ><br><span class="fondorojo2 letrablanca">Reprobado</span></td>
    <td>
        <form  action="verdetallenota.php"  method="POST"  > 
            <br>
            
            <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
            <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
            <input type="hidden" name="idanio" value="'.$idanio.'">
            <input type="hidden" name="idseccion" value="'.$idseccion.'">
            <input type="hidden" name="aprobado" value="'.$idseccion.'">
            <input type="submit" value="Ver" class="btn btn-default form-control fondogris letraroja">
        
        </form>
    </td>
    
    <td>
        <form  action="Gestionarinscripcion.php"  method="POST" enctype = "multipart/form-data" > 
            <br>
            <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
            <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
            <input type="hidden" name="idanio" value="'.$idanio.'">
            <input type="hidden" name="idseccion" value="'.$idseccion.'">
             <input type="hidden" name="condicion" value="repitiente">
            <input type="submit" value="Inscribir" class="btn btn-default form-control fondogris letraroja">
        
        </form>
    </td>
    ';

}
else{
    echo'<td ><br><span class="fondoverde2 letrablanca">Aprobado</span></td>
    <td>
        <form  action="verdetallenota.php"  method="POST"  > 
            <br>
            
            <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
            <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
            <input type="hidden" name="idanio" value="'.$idanio.'">
            <input type="hidden" name="idseccion" value="'.$idseccion.'">
            <input type="hidden" name="aprobado" value="'.$idseccion.'">
            <input type="submit" value="Ver" class="btn btn-default form-control fondogris letraroja">
        
        </form>
    </td>
    

    ';

    if($idanio!=6&&$idanio!=7&&$idanio!=3){
        echo'
        <td>
        <form  action="Gestionarinscripcion.php"  method="POST" enctype = "multipart/form-data" > 
            <br>
            ';
            


            if($idanio==4){
                $idanio2=6;
            }
            else if($idanio==5){
                $idanio2=7;
            }
            else{
                $idanio2=$idanio+1;
            }
            
            echo'
            <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
            <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
            <input type="hidden" name="idanio" value="'.$idanio2.'">
            <input type="hidden" name="condicion" value="aprobado">
            <input type="hidden" name="idseccion" value="'.$idseccion.'">
            <input type="submit" value="Inscribir" class="btn btn-default form-control fondogris letraroja">
        
        </form>
    </td>


    ';
    }
    if($idanio==3){
        echo'
        <td>
        <form  action="Gestionarinscripcion.php"  method="POST" enctype = "multipart/form-data" > 
            <br>
            ';

         
            
            echo'
            <input type="hidden" name="idestudiante" value="'.$idestudiante.'">
            <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
            <select name="idanio" class="form-control">
                <option value="4">Cuarto Año - Primero de Ciencias</option>
                <option value="5">Cuarto Año - Primero de Humanidades</option>

            </select>
            <input type="hidden" name="condicion" value="aprobado">
            <input type="hidden" name="idseccion" value="'.$idseccion.'">
            <input type="submit" value="Inscribir" class="btn btn-default form-control fondogris letraroja">
        
        </form>
    </td>


    ';
    }
    

}

echo'</tr>';
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
