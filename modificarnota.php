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
    
if(!Autenticado()){
 
      echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.history.go(-1);</script>";
    }
    $tipoU = Autenticado();
    if($tipoU != "SuperUser"){
      echo "<script language='javascript'> alert('Usuario sin permisos para esta acción!'); window.history.go(-1);</script>";
    }
    $contador=0;
    $conexion = Conectar();
    $db = mysql_select_db("UEDrJoseManuelSisoMartinez",$conexion)or die("Error al elegir la base de datos");
    
    $accion=0;

        
        $id_nota=$_POST["id_nota"];
        $nota=$_POST["nota"];
        $nombre_materia=$_POST["nombre_materia"];
        $nota_anterior=$_POST["nota_anterior"];
        $cedula=$_POST["cedula"];
        $id_materia=$_POST["id_materia"];
        $id_estudiante=$_POST["id_estudiante"];

        if($nota_anterior==" "){
            $sql = "INSERT INTO notas(nota,id_materia,id_estudiante) 
    VALUES ('".$nota."','".$id_materia."','".$id_estudiante."');";
        
        if(mysql_query($sql)){
                
        echo "<script language='javascript'> alert('Nota Registrada Exitosamente!');</script>"; 
          echo "<script language='javascript'>window.location.href='consultardatosdeestudiante.php?idsolicitud=$cedula'</script>";
                    
        }
         else{
            echo mysql_error();
        }

        }
        else{
            $sql = "UPDATE notas SET nota='".$nota."'WHERE id_nota='".$id_nota."';" ;
        
        if(mysql_query($sql)){
                
                
        echo "<script language='javascript'> alert('Modificación Exitosa!');</script>"; 


         echo "<script language='javascript'>window.location.href='consultardatosdeestudiante.php?idsolicitud=$cedula'</script>";
        
            
                    
        }
         else{
            echo mysql_error();
        }
        }

?>
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
