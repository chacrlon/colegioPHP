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
        function envia2(){
            document.forms["enviar2"].submit();
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


    $idperiodo=$_POST["idperiodo"];
    $idanio=$_POST["idanio"];
    $idseccion=$_POST["idseccion"];
    $idestudiante=$_POST["idestudiante"];
    $idmateria=$_POST["idmateria"];
    $lapso=$_POST["lapso"];
    
    $idplan=$_POST["idplan"];
    $escala=$_POST["escala"];
    $nota=$_POST["notaa"];
    $fecha=date("Y/n/j");


    $id_usuario=$_SESSION["id_usuario"];
    if($nota>$escala){
        echo'
                <form  action="lapsosplan.php" id="enviar" name="enviar2" method="POST" > 
                    <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                    <input type="hidden" name="idanio" value="'.$idanio.'">
                    <input type="hidden" name="idseccion" value="'.$idseccion.'">
                    
                    <input type="hidden" name="idmateria" value="'.$idmateria.'">    
                    <input type="hidden" value="'.$lapso.'" name="lapso">
                </form>
            ';             
        echo "<script language='javascript'> alert('Error, la Nota obtenida no puede ser mayor que la Escala...');</script>"; 
         echo "<script language='javascript'>envia2();</script>";
    }
    else  {
    $sql = "SELECT * FROM notas WHERE id_plan = '$idplan' AND id_estudiante = '$idestudiante';";
    $resultado = mysql_query($sql)or die(mysql_error());
    if(mysql_num_rows($resultado) == 0){            
            $sql2 = "INSERT INTO notas(nota,fecha_carga,id_plan,id_estudiante,id_usuariores) 
    VALUES ('".$nota."','".$fecha."','".$idplan."','".$idestudiante."','".$id_usuario."');";
    }
    else{
         $sql2 = "UPDATE notas SET nota='$nota',fecha_carga='$fecha',id_usuariores='$id_usuario' WHERE id_plan = '$idplan' AND id_estudiante = '$idestudiante';" ;
    }

    if(mysql_query($sql2)){
         echo'
                <form  action="lapsosplan.php" id="enviar" name="enviar" method="POST" > 
                    <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                    <input type="hidden" name="idanio" value="'.$idanio.'">
                    <input type="hidden" name="idseccion" value="'.$idseccion.'">
                    
                    <input type="hidden" name="idmateria" value="'.$idmateria.'">    
                    <input type="hidden" value="'.$lapso.'" name="lapso">
                </form>
            '; 
        echo "<script language='javascript'> alert('Nota Guardada Exitosamente');</script>"; 
         echo "<script language='javascript'>envia();</script>";
        
            
                    
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
