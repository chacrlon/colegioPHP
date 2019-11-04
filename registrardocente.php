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
   
  $carpeta = "img/Fotos de Docentes/";
  opendir($carpeta);

  if($_FILES['files']['name']==""){
    $destino="avatar.gif";
  }
  else{
    $destino = $_FILES['files']['name'];
  }
  
  $ruta = $carpeta.$destino;
  $tamano=$_FILES['files']['size'];


  if ($tamano > 1000000) {  
     echo "<script language='javascript'> alert('Solo se permiten imagenes de 1MB como máximo!'); window.history.go(-1);</script>";
     $contador=1;
  }

  $tipodearchivo=$_FILES['files']['type'];
  if ($tipodearchivo!="image/jpeg" && $tipodearchivo!="image/png" && $tipodearchivo!="image/gif" && $tipodearchivo!="image/jpg"&& $tipodearchivo!="") {  
     echo "<script language='javascript'> alert('Tipo de Archivo Inválido. Solo se permiten imagenes con formato jpg, png ó gif!'); window.history.go(-1);</script>";
     $contador=1;
  }

if($contador==0){

if($_FILES['files']['name']!=""){
  copy($_FILES['files']['tmp_name'],$ruta);

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
    $telefono2=$_POST["telefono_habitacion"];
    $correo1=$_POST["correo"];
    $direccion1=$_POST["direccion"];
    
    
    $status=1;


    $sql = "SELECT cedula FROM docente WHERE cedula = '".$cedula1."'";
    $resultado = mysql_query($sql)or die(mysql_error());
    if(mysql_num_rows($resultado) != 0){
        
    echo "<br>Esta cédula ya se encuentra registrada 
    ";
    echo "<script language='javascript'> alert('Esta cédula ya se encuentra registrada!');setTimeout('window.history.go(-1)',1000);</script>";              
            $contador=$contador+1;  
    }


  $sql = "SELECT correo FROM docente WHERE cedula = '".$cedula1."'";
  $resultado = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado) != 0){
    
  echo "<br>El correo pertenece a otro Usuario
  ";
  echo "<script language='javascript'> alert('El correo pertenece a otro Usuario!');setTimeout('window.history.go(-1)',1000);</script>";        
      $contador=$contador+1;  
  }

}
    if($contador==0){

        $sql = "INSERT INTO docente(nombre1,nombre2,apellido1,apellido2,cedula,sexo,fecha_nacimiento,nacionalidad,celular,telefono_habitacion,correo,direccion,ruta,status) 
    VALUES ('".$nombre1."','".$nombre2."','".$apellido1."','".$apellido2."','".$cedula1."','".$sexo."','".$fechadenacimiento1."','".$nacionalidad."','".$celular1."','".$telefono2."','".$correo1."','".$direccion1."','".$ruta."','".$status."');";
        
        if(mysql_query($sql)){
                
                
        echo "<script language='javascript'> alert('Docente Registrado Exitosamente!');</script>"; 


         echo "<script language='javascript'>window.location.href='consultardocente.php?cedula=$cedula1'</script>";
        
            
                    
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
