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
    if(!Autenticado()){
 
      echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.history.go(-1);</script>";
    }
    $tipoU = Autenticado();
    if($tipoU != "SuperUser"){
      echo "<script language='javascript'> alert('Usuario sin permisos para esta acción!'); window.history.go(-1);</script>";
    }
    $accion=0;

        $nombre1=$_POST["nombre1"];
        $nombre2=$_POST["nombre2"];
        $apellido1=$_POST["apellido1"];
        $apellido2=$_POST["apellido2"];
        $cedula1=$_POST["cedula"];
        $sexo=$_POST["sexo"];
        $fechadenacimiento1=$_POST["fecha_nacimiento"];
        $nacionalidad=$_POST["nacionalidad"];
        $celular1=$_POST["telefono_celular"];
        $telefono2=$_POST["telefono_habitacion"];
        $correo1=$_POST["correo"];
        $direccion1=$_POST["direccion"];
        $status1=$_POST["status"];
        $idestudiantee=$_POST["id_nuevo"];
        

        $sql = "UPDATE docente SET nombre1='".$nombre1."', nombre2='".$nombre2."',apellido1='".$apellido1."'
        ,apellido2='".$apellido2."',cedula='".$cedula1."',sexo='".$sexo."',fecha_nacimiento='".$fechadenacimiento1."'
    ,nacionalidad='".$nacionalidad."',celular='".$celular1."',telefono_habitacion='".$telefono2."',correo='".$correo1."'
    ,direccion='".$direccion1."',status='".$status1."'
     WHERE id_docente='".$idestudiantee."';" ;
        
        if(mysql_query($sql)){
                
                
        echo "<script language='javascript'> alert('Modificación Exitosa!');</script>"; 


         echo "<script language='javascript'>window.location.href='consultardocente.php?cedula=$cedula1'</script>";
        
            
                    
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
