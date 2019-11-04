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
    
    $carpeta = "img/Fotos de Representantes/";
  opendir($carpeta);
  $destino = $_FILES['files']['name'];
  $ruta = $carpeta.$destino;
  copy($_FILES['files']['tmp_name'],$ruta);
  
 $tamano=$_FILES['files']['size']; 
  if ($tamano > 1000000) {  
     echo "<script language='javascript'> alert('Solo se permiten imagenes de 1MB como máximo!'); window.history.go(-1);</script>";
     $contador=1;
  }

 $tipodearchivo=$_FILES['files']['type'];
  if ($tipodearchivo!="image/jpeg" && $tipodearchivo!="image/png" && $tipodearchivo!="image/gif") {  
     echo "<script language='javascript'> alert('Tipo de Archivo Inválido. Solo se permiten imagenes con formato jpg, png ó gif!'); window.history.go(-1);</script>";
     $contador=1;
  }
  if($contador==0){

    $nombre1=$_POST["nombre1"];
    $nombre2=$_POST["nombre2"];
    $apellido1=$_POST["apellido1"];
    $apellido2=$_POST["apellido2"];
    $cedula1=$_POST["cedula1"];
    $sexo=$_POST["sexo"];
    $fechadenacimiento1=$_POST["fecha_nacimiento"];
    $nacionalidad=$_POST["nacionalidad"];
    $celular1=$_POST["telefono_celular"];
    
    $correo1=$_POST["correo"];
    $direccion1=$_POST["direccion"];
    

    $sql = "SELECT * FROM representante WHERE cedula_representante = '".$cedula1."'";
    $resultado = mysql_query($sql)or die(mysql_error());
    if(mysql_num_rows($resultado) != 0){
        
    echo "<br>Esta cédula ya se encuentra registrada 
    ";
    echo "<script language='javascript'> alert('Esta cédula ya se encuentra registrada!');setTimeout('window.history.go(-1)',1000);</script>";              
            $contador=$contador+1;  
    }


  $sql = "SELECT * FROM representante WHERE correo_representante = '".$correo1."'";
  $resultado = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado) != 0){
    
  echo "<br>El correo pertenece a otro Usuario
  ";
  echo "<script language='javascript'> alert('El correo pertenece a otro Usuario!');setTimeout('window.history.go(-1)',1000);</script>";        
      $contador=$contador+1;  
  }

}


    if($contador==0){

        $sql = "INSERT INTO representante(nombre1_representante,nombre2_representante,apellido1_representante,apellido2_representante,
          cedula_representante,sexo_representante,fechan_representante,nacionalidad_representante,telefono_representante,
          correo_representante,direccion_representante,ruta_representante) 
    VALUES ('".$nombre1."','".$nombre2."','".$apellido1."','".$apellido2."','".$cedula1."','".$sexo."','".$fechadenacimiento1."',
      '".$nacionalidad."','".$celular1."','".$correo1."','".$direccion1."','".$ruta."');";
        
         if(mysql_query($sql)){
                
            

            $sql2 = "SELECT * FROM representante WHERE cedula_representante='$cedula1'";


  $resultado2 = mysql_query($sql2)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
    
     
     echo "<script language='javascript'> alert('Este Representante no se encuentra registrado!');</script>"; 
      echo "<script language='javascript'>window.location.href='validarrepresentante2.php';</script>"; 

  
       
  }
  else{
          
      if($resultado2 = mysql_query($sql2)){
        
        while($fila = mysql_fetch_array($resultado2)){
            
         $idest2=$fila["id_representante"];
          
          
        }
      }

      echo "<script language='javascript'>window.location.href='Estudiante.php?id_repre=".$idest2."';</script>"; 
    }
        
        
                  
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
