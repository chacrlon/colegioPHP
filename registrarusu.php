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

    $usuario=$_POST["usuario"];
    $clave=$_POST["clavenueva1"];
    $tipo=$_POST["tipo"];
    $pregunta=$_POST["pregunta"];
    $respuesta=$_POST["respuesta"];
    
    $estado1=1;
    $estatus=1;
    
    

    $sql = "SELECT nombre_usuario FROM usuario WHERE nombre_usuario = '".$usuario."'";
    $resultado = mysql_query($sql)or die(mysql_error());
    if(mysql_num_rows($resultado) != 0){
        
    
    echo "<script language='javascript'> alert('Este Usuario ya se encuentra registrado!');setTimeout('window.history.go(-1)',1000);</script>";              
            $contador=$contador+1;  
    }

    $sql = "SELECT * FROM docente WHERE correo='".$usuario."'";
    $resultado = mysql_query($sql)or die(mysql_error());
    if(mysql_num_rows($resultado) == 0){
        
    
    echo "<script language='javascript'> alert('Este Docente no está registrado en el Sistema, por favor registre sus datos en el módulo Docentes y luego cree su cuenta!');setTimeout('window.history.go(-1)',1000);</script>";              
            $contador=$contador+1;  
    }
    else{
        if($resultado=mysql_query($sql)){
            if($fila=mysql_fetch_array($resultado)){
                $idobt=$fila["id_docente"];
            }
        }
    }

    if($contador==0){

        $sql = "INSERT INTO usuario(nombre_usuario,clave_usuario,tipo_usuario,status,estado,pregunta_seguridad,respuesta_seguridad) 
    VALUES ('".$usuario."','".$clave."','".$tipo."','".$estatus."','".$estado1."','".$pregunta."','".$respuesta."');";
        
        if(mysql_query($sql)){
            $sqlcons = "SELECT * FROM usuario WHERE nombre_usuario = '".$usuario."'";
            $resultadocons = mysql_query($sqlcons)or die(mysql_error());
            if(mysql_num_rows($resultadocons) == 0){
                $idusucons="";
            }
            else{
                if($resultadocons=mysql_query($sqlcons)){
                    if($filacons=mysql_fetch_array($resultadocons)){
                        $idusucons=$fila["id_usuario"];
                    }
                }
            }
            
            $sqlmod = "UPDATE docente SET id_usuario='$idusucons' WHERE id_docente='$idobt';" ;
            if(mysql_query($sqlmod)){
                echo "<script language='javascript'> alert('Cuenta Creada Exitosamente!');</script>"; 
            echo "<script language='javascript'>window.location.href='Usuario.php';</script>";
            }
            else{
                echo "<script language='javascript'> alert('Error al Crear la Cuenta!');</script>"; 
            echo "<script language='javascript'>window.location.href='Usuario.php';</script>";
            }
            

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
