<?php 

	include_once("funciones_comunes.php");

  $conexion = Conectar();
        $db = mysql_select_db("UEDrJoseManuelSisoMartinez",$conexion)or die("Error al elegir la base de datos");
  
  
 if(!Autenticado()){
            echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.history.go(-1);</script>";
        }

        $tipoU = Autenticado();


		require('./FPDF/fpdf.php');
		
		
		class PDF extends FPDF
		{
				
			
			function Table($fecha1,$hora1,$nombreperiodo1,$nombreanio1,$nombreseccion1,$nombremateria1,$nombredocente1,$apellidodocente1,$ceduladocente1)
            {
                $this->Ln(5);
                // Colores, ancho de línea y fuente en negrita
                $this->SetFillColor(225,211,240);
                $this->SetTextColor(0,0,0);
                //$this->SetDrawColor(128,0,0);
                $this->SetDrawColor(169,176,198);
             
                
                $this->Cell(190,7,utf8_decode('Fecha / Hora: '.$fecha1.' / '.$hora1.'                      Período '.$nombreperiodo1.' / '.$nombreanio1.' / '.$nombreseccion1),1,0,'L',true);
                $this->Ln();
             
                 $this->Cell(190,7,utf8_decode('Docente: '.$nombredocente1.' '.$apellidodocente1.' / Cédula de Identidad: '.$ceduladocente1),1,0,'L',true);
                $this->Ln();
    
                
            }

            function Tableaux($descripcion1)
            {
                
                // Colores, ancho de línea y fuente en negrita
                $this->SetFillColor(255,255,255);
                $this->SetTextColor(0,0,0);
                //$this->SetDrawColor(128,0,0);
                $this->SetDrawColor(169,176,198);
              
            
                $this->Cell(190,7,utf8_decode($descripcion1),1,0,'L',true);
                $this->Ln();
                
                
                
                $this->SetFont('Times','I');
                $this->Ln(10);
            }


			

            function Table3($nombre1,$nombre2,$apellido1,$apellido2,$cedula,$nacionalidad,$ruta)
            {
                $this->Image('./img/banner2.jpg',10,10,190,10);

                $this->ln(15);
                // Colores, ancho de línea y fuente en negrita
                $this->SetFillColor(255,255,255);
                $this->SetTextColor(0,0,0);
                //$this->SetDrawColor(128,0,0);
                $this->SetDrawColor(255,255,255);
              
                

                $nombrecompleto=utf8_decode($nombre1.' '.$nombre2.' '.$apellido1.' '.$apellido2);
                $this->Image($ruta,10,25,20,20);
                $this->Cell(30);
                
                $this->Cell(160,7,$nombrecompleto,1,0,'L',true);
                 $this->Ln();
                $this->Cell(30);
                $this->Cell(160,7,'Nacionalidad: '.$nacionalidad,1,0,'L',true);
                $this->Ln();
                $this->Cell(30);
                $this->Cell(160,7,utf8_decode('Cédula de Identidad: '.$cedula),1,0,'L',true);
                
                
                $this->SetFont('Times','I');
                $this->Ln(10);
            }

            


            function Table6($promedio)
            {
                $this->ln(2);
                // Colores, ancho de línea y fuente en negrita
                $this->SetFillColor(255,255,255);
                $this->SetTextColor(0,0,0);
               $this->SetFont('','B');
                //$this->SetDrawColor(128,0,0);
                $this->SetDrawColor(255,255,255);
                $this->Cell(200,7,utf8_decode($promedio),1,0,'C',true);
                $this->ln(7);
            }


			// Pie de página
			function Footer()
			{
			// Posición: a 1,5 cm del final
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Número de página
			$this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
			}
		}

		$pdf = new PDF();
		// Títulos de las columnas
		
		// Carga de datos
		$pdf->SetFont('Arial','',12);
		$pdf->AddPage();
		

    $idestudiante=$_GET['idestudiante'];
    $dia=$_GET['dia'];
    $mes=$_GET['mes'];
    $anio=$_GET['anio'];
 
   

                $sql3 = "SELECT * FROM estudiante WHERE id_estudiante='$idestudiante'";
        if($resultado3 = mysql_query($sql3)){
            while($fila3 = mysql_fetch_array($resultado3)){
                $nombre1_estudiante=$fila3["nombre1"];
                $nombre2_estudiante=$fila3["nombre2"];
                $apellido1_estudiante=$fila3["apellido1"];
                $apellido2_estudiante=$fila3["apellido2"];
                $cedula1=$fila3["cedula"];
                $nacionalidad_estudiante=$fila3["nacionalidad"];
                $ruta_estudiante=$fila3["ruta"];
            }
        }


  $pdf->Table3($nombre1_estudiante,$nombre2_estudiante,$apellido1_estudiante,$apellido2_estudiante,$cedula1,$nacionalidad_estudiante,$ruta_estudiante);


if($anio!=""){
        if($mes==0){
            $sql5 = "SELECT * FROM historia WHERE historia.id_estudiante='$idestudiante' AND EXTRACT(YEAR FROM historia.fecha)='$anio' ORDER BY historia.id_historia DESC ";
                   
        }
        else{
            if($dia!=""){
                $sql5 = "SELECT * FROM historia WHERE historia.id_estudiante='$idestudiante' AND EXTRACT(YEAR FROM historia.fecha)='$anio' AND EXTRACT(MONTH FROM historia.fecha)='$mes' AND EXTRACT(DAY FROM historia.fecha)='$dia' ORDER BY historia.id_historia DESC ";
               
            }
            else{
                $sql5 = "SELECT * FROM historia WHERE historia.id_estudiante='$idestudiante' AND EXTRACT(YEAR FROM historia.fecha)='$anio' AND EXTRACT(MONTH FROM historia.fecha)='$mes' ORDER BY historia.id_historia DESC ";
            }
        }
    }


            if($resultado5 = mysql_query($sql5)){
                if(mysql_num_rows($resultado5)==0){
                     echo "<script language='javascript'>alert('Este Estudiante no tiene Historia Registrada');</script>";
                     echo "<script language='javascript'>window.close();</script>";
                     
                }
                
               

                 $pdf->Table6('HISTORIA');
                while($fila = mysql_fetch_array($resultado5)){
                        
                    $fecha1 = $fila["fecha"];
                    $hora1 = $fila["hora"];
                    $descripcion1 = $fila["descripcion"];
                    $id_periodo1 = $fila["id_periodo"];
                    $id_anio1 = $fila["id_anio"];
                    $id_seccion1 = $fila["id_seccion"];
                    $id_materia1 = $fila["id_materia"];
                    $id_docente1 = $fila["id_docente"];
                    $id_estudiante1 = $fila["id_estudiante"];
                        $sql6 = "SELECT nombre_periodo FROM periodo WHERE id_periodo='$id_periodo1'  ";
                            if($resultado6 = mysql_query($sql6)){
                                while($fila6 = mysql_fetch_array($resultado6)){
                                    $nombreperiodo1=$fila6["nombre_periodo"];
                                }
                            }


                           $sql7 = "SELECT nombre_anio FROM anio WHERE id_anio='$id_anio1'  ";
                            if($resultado7 = mysql_query($sql7)){
                                while($fila7 = mysql_fetch_array($resultado7)){
                                    $nombreanio1=$fila7["nombre_anio"];
                                }
                            }

                            $sql8 = "SELECT nombre_seccion FROM seccion WHERE id_seccion='$id_seccion1'  ";
                            if($resultado8 = mysql_query($sql8)){
                                while($fila8 = mysql_fetch_array($resultado8)){
                                    $nombreseccion1=$fila8["nombre_seccion"];
                                }
                            }

                            $sql9 = "SELECT nombre_materia FROM materias WHERE id_materia='$id_materia1'  ";
                            if($resultado9 = mysql_query($sql9)){
                                while($fila9 = mysql_fetch_array($resultado9)){
                                    $nombremateria1=$fila9["nombre_materia"];
                                }
                            }

                            $sql10 = "SELECT * FROM docente WHERE id_docente='$id_docente1'  ";
                            if($resultado10 = mysql_query($sql10)){
                                while($fila10 = mysql_fetch_array($resultado10)){
                                    $nombredocente1=$fila10["nombre1"];
                                    $apellidodocente1=$fila10["apellido1"];
                                    $ceduladocente1=$fila10["cedula"];
                                }
                            }

                            $sql11 = "SELECT * FROM estudiante WHERE id_estudiante='$id_estudiante1'  ";
                            if($resultado11 = mysql_query($sql11)){
                                while($fila11 = mysql_fetch_array($resultado11)){
                                    $nombreestudiante1=$fila11["nombre1"];
                                    $apellidoestudiante1=$fila11["apellido1"];
                                    $cedulaestudiante1=$fila11["cedula"];
                                }
                            }
                

                $pdf->Table($fecha1,$hora1,$nombreperiodo1,$nombreanio1,$nombreseccion1,$nombremateria1,$nombredocente1,$apellidodocente1,$ceduladocente1);
                $pdf->Tableaux($descripcion1);
        
                }
            }


				
				
				$pdf->Output();
			
	
	
?>