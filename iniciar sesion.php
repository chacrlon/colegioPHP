<?php

echo '

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>UEDrJoseManuelSisoMartinez</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/css.css" rel="stylesheet">

    <link rel="shortcut icon" href="./img/logo.jpg">


</head>
';

include_once("funciones_comunes.php");
    
    $conexion = Conectar();
    $db = mysql_select_db("UEDrJoseManuelSisoMartinez",$conexion)or die("Error al elegir la base de datos");
    $clave = $_POST["clavee"];
    $email = $_POST["email"];
    
    $sql = "SELECT * FROM usuario WHERE nombre_usuario = '".$email."' AND clave_usuario = '".$clave."' AND status=1";
    
    $resultado = mysql_query($sql)or die(mysql_error());
    
        if(mysql_num_rows($resultado) == 0){
        
            //header("location: ../HTML/Principal.html?error=1");
            echo "<script language='javascript'> alert('Lo Sentimos... Usuario sin Acceso!'); window.history.go(-1);</script>";
            
        }else{
            if($resultado = mysql_query($sql)){
    
                
                while($fila = mysql_fetch_array($resultado)){
                    

                    $_SESSION["email_usuario"] = $email;                    
                    
                    if($fila["tipo_usuario"] == "SuperUser"){
                        mysql_query("Update usuario set estado=1 where nombre_usuario='$email'");    
                        echo "<script language='javascript'>window.location.href='Bienvenido.php';</script>";
                         $idtipousu="Superuser";

                    }
                    else if($fila["tipo_usuario"] == "Docente"){
                        
                        $sql2 = "SELECT id_docente FROM docente WHERE correo='".$email."'";
                        $resultado2 = mysql_query($sql2)or die(mysql_error());
                        if(mysql_num_rows($resultado2) == 0){
                            echo "<script language='javascript'> alert('Este Docente no está registrado en el Sistema!');setTimeout('window.history.go(-1)',1000);</script>";              
                            $contador=$contador+1;  
                        }
                        if($resultado2 = mysql_query($sql2)){
                            while($fila2 = mysql_fetch_array($resultado2)){
                                $idtipousu=$fila2["id_docente"];
                            }
                        }
                        mysql_query("Update usuario set estado=1 where nombre_usuario='$email'");    
                        echo "<script language='javascript'>window.location.href='Bienvenido.php';</script>";

                    }
                    else if($fila["tipo_usuario"] == "Estudiante"){
                        $sql2 = "SELECT id_estudiante FROM estudiante WHERE correo='".$email."'";
                        $resultado2 = mysql_query($sql2)or die(mysql_error());
                        if(mysql_num_rows($resultado2) == 0){
                            echo "<script language='javascript'> alert('Este Estudiante no está registrado en el Sistema!');setTimeout('window.history.go(-1)',1000);</script>";              
                            $contador=$contador+1;  
                        }
                        if($resultado2 = mysql_query($sql2)){
                            while($fila2 = mysql_fetch_array($resultado2)){
                                $idtipousu=$fila2["id_estudiante"];
                            }
                        }
                        mysql_query("Update usuario set estado=1 where nombre_usuario='$email'");    
                        echo "<script language='javascript'>window.location.href='BienvenidoEstudiante.php';</script>";

                    }
                    $_SESSION["tipo_usuario"] = $fila["tipo_usuario"];
                    $_SESSION["id_usuario"] = $fila["id_usuario"];
                    $_SESSION["unic"] = $idtipousu;
            }
        }
    }


echo '
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
';

echo "
     <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

";
   
    



?>