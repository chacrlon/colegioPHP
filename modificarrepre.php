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
    

    $contador=0;
    $conexion = Conectar();
    $db = mysql_select_db("UEDrJoseManuelSisoMartinez",$conexion)or die("Error al elegir la base de datos");
    
    $accion=0;
if(!Autenticado()){
 
      echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.history.go(-1);</script>";
    }
    $tipoU = Autenticado();
    if($tipoU != "SuperUser"){
      echo "<script language='javascript'> alert('Usuario sin permisos para esta acción!'); window.history.go(-1);</script>";
    }
        
        $nombre1=$_POST["nombre1"];
        $nombre2=$_POST["nombre2"];
        $apellido1=$_POST["apellido1"];
        $apellido2=$_POST["apellido2"];
        $cedula1=$_POST["cedula"];
        $sexo=$_POST["sexo"];
        $fechadenacimiento1=$_POST["fecha_nacimiento"];
        $nacionalidad=$_POST["nacionalidad"];
        $celular1=$_POST["telefono_celular"];
        
        $correo1=$_POST["correo"];
        
        $direccion1=$_POST["direccion"];
        
        $idrepresentante=$_POST["id_nuevo"];
        $cedulaest1=$_POST["cedulaest"];

        $sql = "UPDATE representante SET nombre1_representante='".$nombre1."', nombre2_representante='".$nombre2."',apellido1_representante='".$apellido1."'
        ,apellido2_representante='".$apellido2."',cedula_representante='".$cedula1."',sexo_representante='".$sexo."',fechan_representante='".$fechadenacimiento1."'
    ,nacionalidad_representante='".$nacionalidad."',telefono_representante='".$celular1."',correo_representante='".$correo1."'
    ,direccion_representante='".$direccion1."' WHERE id_representante='".$idrepresentante."';" ;
        
        if(mysql_query($sql)){
                
            
        echo "<script language='javascript'> alert('Modificación Exitosa!');</script>"; 


         echo "<script language='javascript'>window.location.href='consultardatosdeestudiante.php?idsolicitud=$cedulaest1'</script>";
        
            
                    
        }
         else{
            echo mysql_error();
        }
    


?>
    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
