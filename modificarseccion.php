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

    
    $idseccion=$_POST['idsolicitud'];
    $codigoseccion=$_POST['codigoseccion'];
    $nombreseccion=$_POST['nombreseccion'];
    $statusseccion=$_POST['statusseccion'];
   
    $sql2 = "UPDATE seccion SET cod_seccion='".$codigoseccion."',nombre_seccion='".$nombreseccion."',status_seccion='".$statusseccion."' WHERE id_seccion='".$idseccion."';" ;
        
    if(mysql_query($sql2)){
           
            echo "<script language='javascript'> alert('Modificación realizada con éxito');</script>";
            echo "<script language='javascript'>window.location.href='consultarsecciones.php';</script>";
            
    }
    else{
        echo "<script language='javascript'> alert('Error al Modificar la Sección');</script>";
        echo "<script language='javascript'>window.location.href='consultarsecciones.php';</script>";
    }

?>

    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    

</body>

</html>
