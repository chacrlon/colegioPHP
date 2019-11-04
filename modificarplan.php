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
        function envia1(){
            document.forms["enviar1"].submit();
        }
        function envia2(){
            document.forms["enviar2"].submit();
        }
        function envia3(){
            document.forms["enviar3"].submit();
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
    
    $conexion = Conectar();
    $db = mysql_select_db("UEDrJoseManuelSisoMartinez",$conexion)or die("Error al elegir la base de datos");

    if(!Autenticado()){
 
      echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.history.go(-1);</script>";
    }
    $tipoU = Autenticado();
   $contador=0;
    $idplan=$_POST['idplan'];
    $descripcion=$_POST['descripcion'];
    $escala=$_POST['escala'];
    $peso=$_POST['peso'];
    $numero=$_POST['numero'];
    $idmateria=$_POST['idmateria'];
   $iddocente=$_POST['iddocente'];
    $idseccion=$_POST['idseccion'];
    $idperiodo=$_POST['idperiodo'];
    $idanio=$_POST['idanio'];
    $lapso=$_POST['lapso'];
    

$suma=0;
    $sql = "SELECT * FROM plan_evaluacion WHERE id_periodo = '$idperiodo' AND id_anio = '$idanio' AND id_seccion = '$idseccion' AND id_materia = '$idmateria' AND id_lapso = '$lapso' AND id_docente = '$iddocente' ";
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


    $sql1 = "SELECT peso FROM plan_evaluacion  WHERE id_plan='$idplan'";
    $resultado1 = mysql_query($sql1)or die(mysql_error());  
    if(mysql_num_rows($resultado1) == 0){
            echo "<script language='javascript'> alert('Error, no está registrado');</script>";              
    
    }
    else{
        if($resultado1 = mysql_query($sql1)){
            while($fila1 = mysql_fetch_array($resultado1)){
                $pesoev=$fila1['peso'];
            }

        }
    }
    $suma=$suma-$pesoev;
   

     if($suma+$peso>20){
        $contador=1;
         echo'
                <form  action="lapsosplan.php" id="enviar1" name="enviar1" method="POST" > 
                    <input type="hidden" name="idperiodo" value="'.$_POST['idperiodo'].'">
                    <input type="hidden" name="idanio" value="'.$_POST['idanio'].'">
                    <input type="hidden" name="idseccion" value="'.$_POST['idseccion'].'">
                   <input type="hidden" name="iddocente" value="'.$_POST['iddocente'].'">
                    <input type="hidden" name="idmateria" value="'.$_POST['idmateria'].'">    
                    <input type="hidden" value="'.$_POST['lapso'].'" name="lapso">
                </form>
            ';             
        echo "<script language='javascript'> alert('Error al realizar la Modificación... Verifique el peso de la evaluación, ya que la suma de evaluaciones no debe exceder los 20 puntos! ');</script>"; 
         echo "<script language='javascript'>envia1();</script>";
    }


if($contador==0){


   
    $sql2 = "UPDATE plan_evaluacion SET numero_evaluacion='".$numero."',descripcion='".$descripcion."',escala='".$escala."',peso='".$peso."',id_docente='".$iddocente."' WHERE id_plan='".$idplan."';" ;
        
    if(mysql_query($sql2)){
           
            echo'
                <form  action="lapsosplan.php" id="enviar3" name="enviar3" method="POST" > 
                    <input type="hidden" name="idperiodo" value="'.$_POST['idperiodo'].'">
                    <input type="hidden" name="idanio" value="'.$_POST['idanio'].'">
                    <input type="hidden" name="idseccion" value="'.$_POST['idseccion'].'">
                    <input type="hidden" name="iddocente" value="'.$_POST['iddocente'].'">
                    <input type="hidden" name="idmateria" value="'.$_POST['idmateria'].'">    
                    <input type="hidden" value="'.$_POST['lapso'].'" name="lapso">
                </form>
            ';             
        echo "<script language='javascript'> alert('Modificación realizada exitosamente...');</script>"; 
         echo "<script language='javascript'>envia3();</script>";
            
    }
    else{
        echo'
                <form  action="lapsosplan.php" id="enviar2" name="enviar2" method="POST" > 
                    <input type="hidden" name="idperiodo" value="'.$_POST['idperiodo'].'">
                    <input type="hidden" name="idanio" value="'.$_POST['idanio'].'">
                    <input type="hidden" name="idseccion" value="'.$_POST['idseccion'].'">
                    <input type="hidden" name="iddocente" value="'.$_POST['iddocente'].'">
                    <input type="hidden" name="idmateria" value="'.$_POST['idmateria'].'">    
                    <input type="hidden" value="'.$_POST['lapso'].'" name="lapso">
                </form>
            ';             
        echo "<script language='javascript'> alert('Error al realizar la Modificación... ');</script>"; 
         echo "<script language='javascript'>envia2();</script>";
    }

}


?>
    

    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    

</body>

</html>
