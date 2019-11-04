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
				
			
			function Table($datos )
			{
				$this->SetFont('Times','I');
				
				
				$this->Ln(1);
				
				// Datos
				$fill = false;
				
				
										
				// Colores, ancho de línea y fuente en negrita
				$this->SetFillColor(138,8,8);
				$this->SetTextColor(255);
				//$this->SetDrawColor(128,0,0);
				$this->SetDrawColor(100,100,100);
				$this->SetLineWidth(.4);
				$this->SetFont('','B');
				// Cabecera
				
				$w = array(25, 25, 25,25,20,20,20,20);
			
				
	
				
				// Nuevos colores y fuentes
				//$this->SetFillColor(224,235,255);
				$this->SetFillColor(255,255,255);
				$this->SetTextColor(0);
				$this->SetFont('');
				
					$datos[0] = iconv('UTF-8', 'ISO-8859-1', $datos[0]);			
					$datos[1] = iconv('UTF-8', 'ISO-8859-1', $datos[1]);
					$datos[2] = iconv('UTF-8', 'ISO-8859-1', $datos[2]);
					$datos[3] = iconv('UTF-8', 'ISO-8859-1', $datos[3]);
					$datos[4] = iconv('UTF-8', 'ISO-8859-1', $datos[4]);
					$datos[5] = iconv('UTF-8', 'ISO-8859-1', $datos[5]);
					$datos[6] = iconv('UTF-8', 'ISO-8859-1', $datos[6]);
					$datos[7] = iconv('UTF-8', 'ISO-8859-1', $datos[7]);
					
					$this->Cell($w[0],6,$datos[0],'LR',0,'C',$fill);
					$this->Cell($w[1],6,$datos[1],'LR',0,'C',$fill);
					$this->Cell($w[2],6,$datos[2],'LR',0,'C',$fill);
					$this->Cell($w[3],6,$datos[3],'LR',0,'C',$fill);
					$this->Cell($w[4],6,$datos[4],'LR',0,'C',$fill);
					$this->Cell($w[5],6,$datos[5],'LR',0,'C',$fill);
					$this->Cell($w[6],6,$datos[6],'LR',0,'C',$fill);
					$this->Cell($w[7],6,$datos[7],'LR',0,'C',$fill);
					
	

					$this->Ln();
					$fill = !$fill;
					
				// Línea de cierre
				$this->Cell(array_sum($w),0,'','T');
				$this->Ln();
				
				
				$this->Ln();
				$this->Cell(array_sum($w),0,'','T');
			}
			
			function Table2($header )
            {
                
                $this->Cell(20);
                $this->SetFont('Times','I');
                $this->Ln(5);

                // Datos
                $fill = false;
                                 
                // Colores, ancho de línea y fuente en negrita
                $this->SetFillColor(5,109,178);
                $this->SetTextColor(255);
                //$this->SetDrawColor(128,0,0);
                $this->SetDrawColor(100,100,100);
                $this->SetLineWidth(.4);
                $this->SetFont('','B');
                // Cabecera
                
                $w = array(25, 25, 25,25,20,20,20,20);
                
                for($i=0;$i<count($header);$i++)
                    $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
                $this->Ln();
                
                // Nuevos colores y fuentes
                //$this->SetFillColor(224,235,255);
                $this->SetFillColor(255,255,255);
                $this->SetTextColor(0);
                $this->SetFont('');
                
                    $fill = !$fill;
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

            function Table4($titulo)
            {
                $this->ln(6);
                // Colores, ancho de línea y fuente en negrita
                $this->SetFillColor(255,255,255);
                $this->SetTextColor(0,0,0);
                $this->SetFont('','B');
                //$this->SetDrawColor(128,0,0);
                $this->SetDrawColor(255,255,255);
                $this->Cell(200,7,utf8_decode($titulo),1,0,'L',true);
                $this->ln(2);
            }


             function Table5($promedio)
            {
                $this->ln(2);
                // Colores, ancho de línea y fuente en negrita
                $this->SetFillColor(255,255,255);
                $this->SetTextColor(0,0,0);
               
                //$this->SetDrawColor(128,0,0);
                $this->SetDrawColor(255,255,255);
                $this->Cell(200,7,utf8_decode($promedio),1,0,'L',true);
                $this->ln(7);
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
		

$idestudiantenn=$_GET['idestudiantenn'];

$sql3 = "SELECT * FROM estudiante WHERE id_estudiante='$idestudiantenn'";
        if($resultado3 = mysql_query($sql3)){
            while($fila3 = mysql_fetch_array($resultado3)){
                $nombre1_estudiante=$fila3["nombre1"];
                $nombre2_estudiante=$fila3["nombre2"];
                $apellido1_estudiante=$fila3["apellido1"];
                $apellido2_estudiante=$fila3["apellido2"];
                $cedula_estudiante=$fila3["cedula"];
                $nacionalidad_estudiante=$fila3["nacionalidad"];
                $ruta_estudiante=$fila3["ruta"];
            }
        }


  $pdf->Table3($nombre1_estudiante,$nombre2_estudiante,$apellido1_estudiante,$apellido2_estudiante,$cedula_estudiante,$nacionalidad_estudiante,$ruta_estudiante);
                  
       $pdf->Table6('Situación Acádemica');                  
$notafinalestu=0;
  $sumaanio=0;
        $contadoranio=0;
        $contad=0;
    $sqlanio="SELECT * FROM anio";
     if($resultadoanio = mysql_query($sqlanio)){
        $sumaanio=0;
        $contadoranio=0;
        while($filaanio = mysql_fetch_array($resultadoanio)){
        	


        	$contad++;
            $idaniocon=$filaanio['id_anio'];
            $nombre_aniocon=$filaanio['nombre_anio'];
            $titulo = $nombre_aniocon;
            $pdf->Table4($titulo);
			$header = array(utf8_decode('Cód.'),'Materia',utf8_decode('Período'),utf8_decode('Sección'),'1er Lapso','2do Lapso','3er Lapso','Def.');
            $pdf->Table2($header);
            	

            $sqlmateriacon="SELECT * FROM materias WHERE id_anio='$idaniocon' ORDER BY nombre_materia ASC  ";

            if($resultadomateriacon = mysql_query($sqlmateriacon)){
        
                while($filamateriacom = mysql_fetch_array($resultadomateriacon)){
                    
                    $contadoranio=$contadoranio+1;


                    $id_materiacc=$filamateriacom["id_materia"];
                    $cod_materiacc=$filamateriacom["cod_materia"];
                    $nombre_materiacc = $filamateriacom["nombre_materia"];
                    $idaniocc= $filamateriacom["id_anio"];
                    $notaminima11=$filamateriacom["nota_minima"];


                    //comienzo segunda consulta
                    $notascc=" ";
                    $idnotacc=" ";
                      
                    $sql2="SELECT * FROM inscripciones where id_estudiante='$idestudiantenn' and id_anio='$idaniocon'";
                    $resultado2=mysql_query($sql2);
                    if(mysql_num_rows($resultado2)==0){
                       
                        $datos = array($cod_materiacc,$nombre_materiacc,'','','','','','');
                        $pdf->Table($datos);

                    }
                    else{
                    if($resultado2 = mysql_query($sql2)){
                        while($fila = mysql_fetch_array($resultado2)){   
                            $idperiodocc=$fila["id_periodo"];
                            $idseccioncc=$fila["id_seccion"];
                            $notafinalestu=0;
                            $sql3 = "SELECT * FROM seccion WHERE id_seccion='$idseccioncc'";
                            if($resultado3 = mysql_query($sql3)){
                                while($fila3 = mysql_fetch_array($resultado3)){
                                    $codigoseccioncc=$fila3["cod_seccion"];
                                }
                            }
                             $sql4 = "SELECT * FROM periodo WHERE id_periodo='$idperiodocc'";
                            if($resultado4 = mysql_query($sql4)){
                                while($fila4 = mysql_fetch_array($resultado4)){
                                    $nombreperiodocc=$fila4["nombre_periodo"];
                                }
                            } 

                            
                            $sumanota101=0;
                            $sqlnue1 = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodocc' 
                            AND plan_evaluacion.id_anio = '$idaniocon' AND plan_evaluacion.id_seccion = '$idseccioncc' 
                            AND plan_evaluacion.id_materia = '$id_materiacc' AND plan_evaluacion.id_lapso = 1
                            ";
                            $resultadonue1 = mysql_query($sqlnue1)or die(mysql_error());
                            if(mysql_num_rows($resultadonue1) == 0){            
                                $sumapeso1=0;       
                            }
                            else{
                                if($resultadonue1=mysql_query($sqlnue1)){
                                    $sumapeso1=0;
                                    $sumanota101=0;
                                    while($filanue1=mysql_fetch_array($resultadonue1)){
                                        $idplan1=$filanue1['id_plan'];
                                        $numeroevaluacion1=$filanue1['numero_evaluacion'];
                                        $descripcion1=$filanue1['descripcion'];
                                        $escala1=$filanue1['escala'];
                                        $peso1=$filanue1['peso'];
                                        $sumapeso1=$sumapeso1+$peso1;

                                        $sql101="SELECT * FROM notas WHERE id_estudiante='$idestudiantenn' AND id_plan='$idplan1'";
                                        $resultado101 = mysql_query($sql101);

                 
                                        if(mysql_num_rows($resultado101) == 0){
                                
                                        }

                                        else{
                                            if($resultado101 = mysql_query($sql101)){
                       
                                                while($fila101 = mysql_fetch_array($resultado101)){
                                                    $nota101=$fila101['nota'];
                                                    $totalpeso101=($nota101*$peso1)/$escala1;
                                                    $calculopeso1=($totalpeso101*20)/$peso1;
                                                    $sumanota101=$sumanota101+$totalpeso101;
                                                }
                                            }
                                        }
                       
                                    }
                     
                                }
                            }

                            $sumanota10red1=round ($sumanota101);

                            if($sumanota101<=0){
                               
                                $sumalapso1m=0;
                            }
                            else{
                                if($sumanota101<($notaminima11-0.5)){
                                    

                                }
                                else{
                                    
                                }
                                $sumalapso1m=$sumanota10red1;
                        
                            }

                            $notafinalestu=$notafinalestu+$sumanota10red1;



                            $sumanota102=0;

                            $sqlnue2 = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodocc' 
                            AND plan_evaluacion.id_anio = '$idaniocc' AND plan_evaluacion.id_seccion = '$idseccioncc' 
                            AND plan_evaluacion.id_materia = '$id_materiacc' AND plan_evaluacion.id_lapso = 2
                            ";
                            $resultadonue2 = mysql_query($sqlnue2)or die(mysql_error());
                            if(mysql_num_rows($resultadonue2) == 0){            
                                $sumapeso2=0;  
                            }
                            else{
                                if($resultadonue2=mysql_query($sqlnue2)){
                                    $sumapeso2=0;
                                    $sumanota102=0;
                                    while($filanue2=mysql_fetch_array($resultadonue2)){
                                        $idplan2=$filanue2['id_plan'];
                                        $numeroevaluacion2=$filanue2['numero_evaluacion'];
                                        $descripcion2=$filanue2['descripcion'];
                                        $escala2=$filanue2['escala'];
                                        $peso2=$filanue2['peso'];
                                        $sumapeso2=$sumapeso2+$peso2;

                                        $sql102="SELECT * FROM notas WHERE id_estudiante='$idestudiantenn' AND id_plan='$idplan2'";
                                        $resultado102 = mysql_query($sql102);

                 
                                        if(mysql_num_rows($resultado102) == 0){
                   
                    
                                        }
                                        else{
                   
                                            if($resultado102 = mysql_query($sql102)){
                       
                                                while($fila102 = mysql_fetch_array($resultado102)){
                                                    $nota102=$fila102['nota'];
                                                    $totalpeso102=($nota102*$peso2)/$escala2;
                                                    $calculopeso2=($totalpeso102*20)/$peso2;
                                                    $sumanota102=$sumanota102+$totalpeso102;
                                                }
                                            }
                                        }
                       
                                    }
                     
                                }
                            }
            
                            $sumanota10red2=round ($sumanota102);

                            if($sumanota102<=0){
                                
                                $sumalapso2m=0;
                            }
                            else{
                                if($sumanota102<($notaminima11-0.5)){
                                    

                                }
                                else{
                                    
                                }
                                $sumalapso2m=$sumanota10red2;
                            }       
                            $notafinalestu=$notafinalestu+$sumanota10red2;




                            $sumanota103=0;
                            $sqlnue3 = "SELECT * FROM plan_evaluacion WHERE plan_evaluacion.id_periodo = '$idperiodocc' 
                            AND plan_evaluacion.id_anio = '$idaniocc' AND plan_evaluacion.id_seccion = '$idseccioncc' 
                            AND plan_evaluacion.id_materia = '$id_materiacc' AND plan_evaluacion.id_lapso = 3
                            ";
                            $resultadonue3 = mysql_query($sqlnue3)or die(mysql_error());
                            if(mysql_num_rows($resultadonue3) == 0){            
                                $sumapeso3=0;       
                            }
                            else{
                                if($resultadonue3=mysql_query($sqlnue3)){
                                    $sumapeso3=0;
                                    $sumanota103=0;
                                    while($filanue3=mysql_fetch_array($resultadonue3)){
                                        $idplan3=$filanue3['id_plan'];
                                        $numeroevaluacion3=$filanue3['numero_evaluacion'];
                                        $descripcion3=$filanue3['descripcion'];
                                        $escala3=$filanue3['escala'];
                                        $peso3=$filanue3['peso'];
                                        $sumapeso3=$sumapeso3+$peso3;

                                        $sql103="SELECT * FROM notas WHERE id_estudiante='$idestudiantenn' AND id_plan='$idplan3'";
                                        $resultado103 = mysql_query($sql103);

                 
                                        if(mysql_num_rows($resultado103) == 0){
                  
                                        }

                                        else{
                   
                                            if($resultado103 = mysql_query($sql103)){
                       
                                                while($fila103 = mysql_fetch_array($resultado103)){
                                                    $nota103=$fila103['nota'];
                                                    $totalpeso103=($nota103*$peso3)/$escala3;
                                                    $calculopeso3=($totalpeso103*20)/$peso3;
                                                    $sumanota103=$sumanota103+$totalpeso103;
                                                }
                                            }
                                        }
                       
                                    }
                     
                                }
                            }

                            $sumanota10red3=round ($sumanota103);

                            if($sumanota103<=0){
                               
                                $sumalapso3m=0;
                            }
                            else{
                                if($sumanota103<($notaminima11-0.5)){
                                     

                                }
                                else{
                                   
                                }
                                 $sumalapso3m=$sumanota103;
                                 $sumalapso3mred=$sumanota10red3;
                            }
                            

                            $notafinalestu=$notafinalestu+$sumanota10red3;
                            $notafinalestu=$notafinalestu/3;

                            $notafinalestured=round ($notafinalestu);
                            $sumaanio=$sumaanio+$notafinalestured;
                            

                            if($notafinalestu<=0){
                               
                                $sumanotafinalm=0;
                            }
                            else{

               
                              
                                 $sumanotafinalm=$notafinalestured;
                            }
                            $datos = array($cod_materiacc,$nombre_materiacc,$nombreperiodocc,$codigoseccioncc,$sumalapso1m,$sumalapso2m,$sumalapso3m,$sumanotafinalm);
                            


                            $pdf->Table($datos);


                         
                        }
                    }
}

          //fin segunda consulta
            
        }
    }

    if($contadoranio==0||$sumaanio==0){
        $promedio=" ";
        $pdf->Table5($promedio);
    }
    else{
         $promedio=$sumaanio/$contadoranio;
        $datosP = array($promedio);
        $pdf->Table5('Promedio de Notas: '.$promedio);

    }
       
    $contadoranio=0;
    $promedio=0;
    $sumaanio=0;




        }
    }


				
				
				$pdf->Output();
			
	
	
?>