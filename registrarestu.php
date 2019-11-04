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
    
    $carpeta = "img/Fotos de Estudiantes/";
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
    $cedula1=$_POST["cedula"];
    $sexo=$_POST["sexo"];
    $fechadenacimiento1=$_POST["fecha_nacimiento"];
    $nacionalidad=$_POST["nacionalidad"];
    $celular1=$_POST["telefono_celular"];
    $telefono2=$_POST["telefono_habitacion"];
    $correo1=$_POST["correo"];
    $direccion1=$_POST["direccion"];
    $anio=$_POST["anio"];
    $id_representante=$_POST["id_repre"];
    $plantel=$_POST["plantel"];
    $status=0;
    $aprobacion=0;
 date_default_timezone_set("America/Caracas");
    $fecha = time()-strtotime($fechadenacimiento1);
          $tienes = floor($fecha / 31556926);


        if($anio==1){
   
            if($tienes<10||$tienes>14){
              echo "<script language='javascript'> alert('Su edad no es valida, debe tener entre 10 y 14 años de edad! Si no la posee por favor cancele la operación');setTimeout('window.history.go(-1)',1000);</script>";              
            $contador=$contador+1;  
                 
                
            }
            
          }
          else if($anio==2){
            if($tienes<11||$tienes>15){
                 echo "<script language='javascript'> alert('Su edad no es valida, debe tener entre 11 y 15 años de edad! Si no la posee por favor cancele la operación');setTimeout('window.history.go(-1)',1000);</script>";              
            $contador=$contador+1;  
            
            }
          }
          else if($anio==3){
            if($tienes<12||$tienes>16){
               echo "<script language='javascript'> alert('Su edad no es valida, debe tener entre 12 y 16 años de edad! Si no la posee por favor cancele la operación');setTimeout('window.history.go(-1)',1000);</script>";              
            $contador=$contador+1;  
              
            }

          }
          else if($anio==4||$anio==5){
            if($tienes<13||$tienes>17){
                echo "<script language='javascript'> alert('Su edad no es valida, debe tener entre 13 y 17 años de edad! Si no la posee por favor cancele la operación');setTimeout('window.history.go(-1)',1000);</script>";              
            $contador=$contador+1;  
             
            }

          }
          else if($anio==6||$anio==7){
            if($tienes<14||$tienes>18){
                echo "<script language='javascript'> alert('Su edad no es valida, debe tener entre 14 y 18 años de edad! Si no la posee por favor cancele la operación');setTimeout('window.history.go(-1)',1000);</script>";              
            $contador=$contador+1;  
                
            }
          }

    $sql = "SELECT * FROM estudiante WHERE cedula = '".$cedula1."'";
    $resultado = mysql_query($sql)or die(mysql_error());
    if(mysql_num_rows($resultado) != 0){
        
    echo "<br>Esta cédula ya se encuentra registrada 
    ";
    echo "<script language='javascript'> alert('Esta cédula ya se encuentra registrada!');setTimeout('window.history.go(-1)',1000);</script>";              
            $contador=$contador+1;  
    }


  $sql = "SELECT * FROM estudiante WHERE correo = '".$correo1."'";
  $resultado = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado) != 0){
    
  echo "<br>El correo pertenece a otro Usuario
  ";
  echo "<script language='javascript'> alert('El correo pertenece a otro Usuario!');setTimeout('window.history.go(-1)',1000);</script>";        
      $contador=$contador+1;  
  }
}



    if($contador==0){

        $sql = "INSERT INTO estudiante(nombre1,nombre2,apellido1,apellido2,cedula,sexo,fecha_nacimiento,nacionalidad,celular,telefono_habitacion,correo,direccion,ruta,plantel_procedencia,status,id_representante) 
    VALUES ('".$nombre1."','".$nombre2."','".$apellido1."','".$apellido2."','".$cedula1."','".$sexo."','".$fechadenacimiento1."',
      '".$nacionalidad."','".$celular1."','".$telefono2."','".$correo1."','".$direccion1."','".$ruta."','".$plantel."','".$status."','".$id_representante."');";
        
        if(mysql_query($sql)){
                
            

            $sql2 = "SELECT * FROM estudiante WHERE cedula='$cedula1'";


  $resultado2 = mysql_query($sql2)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
    
     
     echo "<script language='javascript'> alert('Este Estudiante no se encuentra registrado!');</script>"; 
      echo "<script language='javascript'>window.location.href='Estudiante.php';</script>"; 

  
       
  }
  else{
          
      if($resultado2 = mysql_query($sql2)){
        
        while($fila = mysql_fetch_array($resultado2)){
            
         $idest2=$fila["id_estudiante"];
          
          
        }
      }
    }


       

        $fecha1=date("Y/n/j");
        $hora1=date("h:i:s");

        
        
               $status_solicitud=0; 
         $sql4 = "INSERT INTO solicitudes(status_solicitud,fecha_solicitud,hora_solicitud,anio,id_estudiante) 
    VALUES ('".$status_solicitud."','".$fecha1."','".$hora1."','".$anio."','".$idest2."');";


      if(mysql_query($sql4)){
        echo "<script language='javascript'> alert('Solicitud realizada exitosamente!');</script>"; 
        echo "<script language='javascript'>window.location.href='consultarsolicitud.php?idsolicitud=$cedula1'</script>";
        
      }
      else{
        echo "<script language='javascript'>window.location.href='Estudiante.php'</script>";
        
      }

        
   
                    
        }
         else{
            echo mysql_error();
            echo '<script>alert("Error")</script>';
        }

  }
    
                
    

?>
    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
