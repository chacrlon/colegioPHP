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
    date_default_timezone_set("America/Caracas");


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



    $titulo1=$_POST["titulo"];
    $descripcion1=$_POST["descripcion"];
    
    $fecha1=date("Y/n/j");
        $hora1=date("h:i:s");

   


    if($contador==0){

        $sql = "INSERT INTO noticias(fecha,hora,titulo,descripcion) 
    VALUES ('".$fecha1."','".$hora1."','".$titulo1."','".$descripcion1."');";
        
        if(mysql_query($sql)){
        
        $email_usuario1=$_SESSION["email_usuario"];
        $tipo_usuario1=$_SESSION["tipo_usuario"];
        $proceso1="Publicación de Noticia";
        $descripcion1="El Usuario publico la noticia titulada como: ".$titulo1;
       $fecha1=date("Y/n/j");
        $hora1=date("h:i:s");

        $sql = "INSERT INTO bitacora(email_usuario,tipo_usuario,proceso,descripcion,fecha,hora) VALUES ('".$email_usuario1."','".$tipo_usuario1."',
            '".$proceso1."','".$descripcion1."','".$fecha1."','".$hora1."')";
        $res=mysql_query($sql) or die("Error en Bitácora");
                
        echo "<script language='javascript'> alert('La Noticia ha sido Publicada Exitosamente!');</script>"; 
         echo "<script language='javascript'>window.location.href='Noticias.php';</script>";
        
            
                    
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