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
    $idmateria=$_POST["idmateria"];
    $lapso=$_POST["lapso"];
    $iddocente=$_POST["iddocente"];
    
    $numeroevaluacion=$_POST["numeroevaluacion"];
    $descripcion=$_POST["descripcion"];
    $peso=$_POST["peso"];

    $escala=$_POST["escala"];
    $status="Activo";
    $suma=0;
    $sql = "SELECT * FROM plan_evaluacion WHERE id_periodo = '$idperiodo' AND id_anio = '$idanio' AND id_seccion = '$idseccion' AND id_materia = '$idmateria' AND id_lapso = '$lapso' AND id_docente='$iddocente'";
    $resultado = mysql_query($sql)or die(mysql_error());
    if(mysql_num_rows($resultado) == 0){            
           $suma=0; 
    }
    else{
        if($resultado=mysql_query($sql)){
            while($fila=mysql_fetch_array($resultado)){
                $suma=$suma+$fila['peso'];

            }

        }
    }

    

    if($suma+$peso>20){
        $contador=1;
         echo'
                <form  action="lapsosplan.php" id="enviar2" name="enviar2" method="POST" > 
                    <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                    <input type="hidden" name="idanio" value="'.$idanio.'">
                    <input type="hidden" name="idseccion" value="'.$idseccion.'">
                    <input type="hidden" name="iddocente" value="'.$iddocente.'">
                    <input type="hidden" name="idmateria" value="'.$idmateria.'">    
                    <input type="hidden" value="'.$lapso.'" name="lapso">
                </form>
            ';             
        echo "<script language='javascript'> alert('Error al Registrar Evaluación... Verifique el peso de la evaluación, ya que la suma de evaluaciones no debe exceder los 20 puntos! ');</script>"; 
         echo "<script language='javascript'>envia2();</script>";
    }



    if($contador==0){

        $sql = "INSERT INTO plan_evaluacion(numero_evaluacion,descripcion,escala,peso,id_periodo,id_anio,id_seccion,id_materia,id_lapso,id_docente) 
    VALUES ('".$numeroevaluacion."','".$descripcion."','".$escala."','".$peso."','".$idperiodo."','".$idanio."','".$idseccion."','".$idmateria."','".$lapso."','".$iddocente."');";
        
        if(mysql_query($sql)){
         echo'
                <form  action="lapsosplan.php" id="enviar" name="enviar" method="POST" > 
                    <input type="hidden" name="idperiodo" value="'.$idperiodo.'">
                    <input type="hidden" name="idanio" value="'.$idanio.'">
                    <input type="hidden" name="idseccion" value="'.$idseccion.'">
                    <input type="hidden" name="iddocente" value="'.$iddocente.'">
                    <input type="hidden" name="idmateria" value="'.$idmateria.'">    
                    <input type="hidden" value="'.$lapso.'" name="lapso">
                </form>
            ';             
        echo "<script language='javascript'> alert('Evaluación Agregada Exitosamente!');</script>"; 
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
