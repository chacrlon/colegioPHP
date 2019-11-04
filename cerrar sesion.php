<?php


include_once("funciones_comunes.php");
$conexion = Conectar();
	$db = mysql_select_db("UEDrJoseManuelSisoMartinez",$conexion)or die("Error de la base de datos");
		$email=$_SESSION["email_usuario"];
		
		if(!Autenticado()){
			echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.location.href='index.php'; </script>";
		
		}
	
		$_SESSION["email_usuario"] = "";
	$_SESSION["tipo_usuario"] = "";
	$_SESSION["id_usuario"] = " ";
	

mysql_query("Update usuario set estado=0 where nombre_usuario='$email'");	

					


header("Location: index.php");
?>

