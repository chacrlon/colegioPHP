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
    
    $conexion = Conectar();
    $db = mysql_select_db("UEDrJoseManuelSisoMartinez",$conexion)or die("Error al elegir la base de datos");

    if(!Autenticado()){
 
      echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.history.go(-1);</script>";
    }
    $tipoU = Autenticado();
    if($tipoU != "SuperUser"){
            echo "<script language='javascript'> alert('Usuario sin permisos para esta acción!'); window.history.go(-1);</script>";
        }
   
   if(isset($_POST['idsolicitud'])){
        $idsolicitud=$_POST['idsolicitud'];
   }

   if(isset($_POST['idperiodoant'])){
        $idperiodoant=$_POST['idperiodoant'];
   }
   if(isset($_POST['idseccionant'])){
        $idseccionant=$_POST['idseccionant'];
   }
    if(isset($_POST['condicion'])){
        $condicion=$_POST['condicion'];
   }

    
    $idperiodo=$_POST['idperiodo'];
    $idanio=$_POST['idanio'];
    $idestudiante=$_POST['idestudiante'];
    $idseccion=$_POST['idseccion'];
    $status=1;

    $sql = "INSERT INTO inscripciones(id_periodo,id_anio,id_seccion,id_estudiante) 
    VALUES ('".$idperiodo."','".$idanio."','".$idseccion."','".$idestudiante."');";

    if(mysql_query($sql)){

        $sql6 = "SELECT id_inscripcion FROM inscripciones WHERE id_periodo='$idperiodo' AND id_anio='$idanio' AND id_seccion='$idseccion' AND id_estudiante='$idestudiante' ";
        if($resultado6 = mysql_query($sql6)){
            while($fila6 = mysql_fetch_array($resultado6)){
                $id=$fila6["id_inscripcion"];
            }
        }


        $sql2 = "UPDATE estudiante SET id_inscripcion='$id',status='$status' WHERE id_estudiante='$idestudiante';" ;
        

        
            if(mysql_query($sql2)){
                if(isset($_POST['idsolicitud'])){
                    $sql3 = "UPDATE solicitudes SET status_solicitud='$status' WHERE id_solicitud='$idsolicitud';" ;
                    if(mysql_query($sql3)){

                        echo "<script language='javascript'> alert('Inscripción realizada con éxito');</script>";
                        echo "<script language='javascript'>window.location.href='listadosolicitudes.php';</script>";
                    }
                    else{
                       echo "<script language='javascript'> alert('Error al Modificar Status de la Solicitud');</script>";
                        echo "<script language='javascript'>window.location.href='listadosolicitudes.php';</script>";

                    }
                }
                else{
                 
                   echo "<script language='javascript'> alert('Inscripción realizada con éxito');</script>";
                    echo "<script language='javascript'>window.location.href='consultarperiodo.php';</script>";
                  
                }
            }
            else{

                if(isset($_POST['idsolicitud'])){
                    echo "<script language='javascript'> alert('Error al Modificar Status de la Inscripción en el Estudiante');</script>";
                    echo "<script language='javascript'>window.location.href='listadosolicitudes.php';</script>";
                }
                else{
            
                   echo "<script language='javascript'> alert('Error al Modificar Status de la Inscripción en el Estudiante');</script>";
                    echo "<script language='javascript'>window.location.href='consultarperiodo.php';</script>";
                }
            }
         
    }
    else{
        if(isset($_POST['idsolicitud'])){
            echo "<script language='javascript'> alert('No se pudó realizar la inscripción');</script>";
            echo "<script language='javascript'>window.location.href='listadosolicitudes.php';</script>";
        }
        else{
            echo "<script language='javascript'> alert('No se pudó realizar la inscripción');</script>";
            echo "<script language='javascript'>window.location.href='consultarperiodo.php';</script>";
                    
        }

    }


?>
    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>

</html>
