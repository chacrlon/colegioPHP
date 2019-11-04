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
        function envia(){
            document.forms["enviar"].submit();
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
    date_default_timezone_set("America/Caracas");


    $contador=0;
    $conexion = Conectar();
    $db = mysql_select_db("UEDrJoseManuelSisoMartinez",$conexion)or die("Error al elegir la base de datos");
    
    if(!Autenticado()){
 
      echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.history.go(-1);</script>";
    }
    $tipoU = Autenticado();


    $idperiodo1=$_POST["idperiodo"];
    $descripcion1=$_POST["descripcion"];
    $idseccion1=$_POST["idseccion"];
    $idestudiante1=$_POST["idestudiante"];
    $idanio1=$_POST["idanio"];
    $idmateria=$_POST['idmateria'];
    $codigomateria=$_POST['codigomateria'];
    $nombremateria=$_POST['nombremateria'];
    $notaminima=$_POST['notaminima'];
    $id_docente=$_POST['id_docente'];
    
    $fecha1=date("Y/n/j");
    $hora1=date("h:i:s");

    if($contador==0){

        $sql = "INSERT INTO historia(fecha,hora,id_periodo,id_anio,id_seccion,descripcion,id_estudiante,id_materia,id_docente) 
    VALUES ('".$fecha1."','".$hora1."','".$idperiodo1."','".$idanio1."','".$idseccion1."','".$descripcion1."','".$idestudiante1."','".$idmateria."','".$id_docente."');";
        
        if(mysql_query($sql)){
        
                
        echo "<script language='javascript'> alert('Acontecimiento registrado Exitosamente!');</script>"; 
         echo'<form  action="Historia.php" method="POST" id="enviar" name="enviar"> 
                                        <input type="hidden" name="idperiodo" value="'.$idperiodo.'"> 
                                        <input type="hidden" name="idanio" value="'.$idanio.'"> 
                                        <input type="hidden" name="idseccion" value="'.$idseccion.'"> 
                                        <input type="hidden" name="idestudiante" value="'.$idestudiante.'"> 
                                        <input type="hidden" name="idmateria" value="'.$idmateria.'">
                                <input type="hidden" name="codigomateria" value="'.$codigomateria.'">
                                <input type="hidden" name="nombremateria" value="'.$nombremateria.'">
                                 <input type="hidden" name="notaminima" value="'.$notaminima.'">
                                 <input type="hidden" name="id_docente" value="'.$id_docente.'">
                                    </form>

';
echo "<script language='javascript'>envia();</script>";
                    
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