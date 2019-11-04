<?php

	session_start();
	
	function Conectar(){ 
	$conexion = mysql_connect("localhost","root","")or die("Error de conexion");
	
	return $conexion;
	}

	function Autenticado(){
	
		if(isset($_SESSION["email_usuario"]) && isset($_SESSION["tipo_usuario"])){
			return $_SESSION["tipo_usuario"];
		}else{
			return false;
		}
	}
?>