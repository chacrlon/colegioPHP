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
   if($tipoU!="SuperUser"){
      echo "<script language='javascript'> alert('Usuario sin permisos para esta acción!'); window.history.go(-1);</script>";
    }



    $codigoanio=$_POST["codigoanio"];
    $nombreanio=$_POST["nombreanio"];
    $status="Activo";
    
    $sql = "SELECT codigo_anio FROM anio WHERE codigo_anio = '".$codigoanio."'";
    $resultado = mysql_query($sql)or die(mysql_error());
    if(mysql_num_rows($resultado) != 0){
        
    
    echo "<script language='javascript'> alert('Ya hay un año registrado con este código !');setTimeout('window.history.go(-1)',1000);</script>";              
            $contador=$contador+1;  
    }

    $sql2 = "SELECT nombre_anio FROM anio WHERE nombre_anio = '".$nombreanio."'";
    $resultado2 = mysql_query($sql2)or die(mysql_error());
    if(mysql_num_rows($resultado2) != 0){
        
    
    echo "<script language='javascript'> alert('Ya hay un año registrado con este nombre !');setTimeout('window.history.go(-1)',1000);</script>";              
            $contador=$contador+1;  
    }

    if($contador==0){

        $sql = "INSERT INTO anio(codigo_anio,nombre_anio,status_anio) 
    VALUES ('".$codigoanio."','".$nombreanio."','".$status."');";
        
        if(mysql_query($sql)){
                      
        echo "<script language='javascript'> alert('Año Registrado Exitosamente!');</script>"; 
         echo "<script language='javascript'>window.location.href='Anios.php';</script>";
        
            
                    
        }
         else{
            echo mysql_error();
        }

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
