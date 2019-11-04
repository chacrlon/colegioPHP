<?php 

	include_once("funciones_comunes.php");

  $conexion = Conectar();
  $db = mysql_select_db("Consejo Comunal India Rosa",$conexion)or die("Error al elegir la base de datos");
  
  
  if(!Autenticado()){
 
      echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.history.go(-1);</script>";
    }

		require('../FPDF/fpdf.php');
		
		
		class PDF extends FPDF
		{
				
			
			function Table($datos , $datosP , $titulo , $header)
			{
				$this->Image('../IMAGENES/asocsuveas.png',10,10,190,40);
				$this->Cell(20);
				$this->SetFont('Times','I');
				$this->Ln(45);
				$this->Cell(200,8,utf8_decode($titulo),0,0,'C');
				$this->Ln(10);
				
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
				
				$w = array(63, 63, 63);
				
				for($i=0;$i<count($header);$i++)
					$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
				$this->Ln();
				
				// Nuevos colores y fuentes
				//$this->SetFillColor(224,235,255);
				$this->SetFillColor(255,255,255);
				$this->SetTextColor(0);
				$this->SetFont('');
				
					$datos[0] = iconv('UTF-8', 'ISO-8859-1', $datos[0]);			
					$datos[1] = iconv('UTF-8', 'ISO-8859-1', $datos[1]);
					$datos[2] = iconv('UTF-8', 'ISO-8859-1', $datos[2]);
					
					$this->Cell($w[0],6,$datos[0],'LR',0,'C',$fill);
					$this->Cell($w[1],6,$datos[1],'LR',0,'C',$fill);
					$this->Cell($w[2],6,$datos[2],'LR',0,'C',$fill);
					
	

					$this->Ln();
					$fill = !$fill;
					
				// Línea de cierre
				$this->Cell(array_sum($w),0,'','T');
				$this->Ln();
				$datosP[0] = iconv('UTF-8', 'ISO-8859-1', $datosP[0]);			
				$datosP[1] = iconv('UTF-8', 'ISO-8859-1', $datosP[1]);
				$datosP[2] = iconv('UTF-8', 'ISO-8859-1', $datosP[2]);
				
				$this->Cell($w[0],6,$datosP[0],'LR',0,'C',$fill);
				$this->Cell($w[1],6,$datosP[1],'LR',0,'C',$fill);
				$this->Cell($w[2],6,$datosP[2],'LR',0,'C',$fill);
				
				
				$this->Ln();
				$this->Cell(array_sum($w),0,'','T');
			}
			

			function Table2($datos , $datosP , $titulo , $header)
			{
				
				$this->Ln(5);
				
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
				
				$w = array(47, 47, 47, 47);
				
				for($i=0;$i<count($header);$i++)
					$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
				$this->Ln();
				
				// Nuevos colores y fuentes
				//$this->SetFillColor(224,235,255);
				$this->SetFillColor(255,255,255);

				$this->SetTextColor(0);
				$this->SetFont('');
				
					$datos[0] = iconv('UTF-8', 'ISO-8859-1', $datos[0]);			
					$datos[1] = iconv('UTF-8', 'ISO-8859-1', $datos[1]);
					$datos[2] = iconv('UTF-8', 'ISO-8859-1', $datos[2]);
					$datos[3] = iconv('UTF-8', 'ISO-8859-1', $datos[3]);
					
					$this->Cell($w[0],6,$datos[0],'LR',0,'C',$fill);
					$this->Cell($w[1],6,$datos[1],'LR',0,'C',$fill);
					$this->Cell($w[2],6,$datos[2],'LR',0,'C',$fill);
					$this->Cell($w[3],6,$datos[3],'LR',0,'C',$fill);
					
	

					$this->Ln();
					$fill = !$fill;
					
				// Línea de cierre
				$this->Cell(array_sum($w),0,'','T');
				$this->Ln();
				$datosP[0] = iconv('UTF-8', 'ISO-8859-1', $datosP[0]);			
				$datosP[1] = iconv('UTF-8', 'ISO-8859-1', $datosP[1]);
				$datosP[2] = iconv('UTF-8', 'ISO-8859-1', $datosP[2]);
				$datosP[3] = iconv('UTF-8', 'ISO-8859-1', $datosP[3]);
				
				$this->Cell($w[0],6,$datosP[0],'LR',0,'C',$fill);
				$this->Cell($w[1],6,$datosP[1],'LR',0,'C',$fill);
				$this->Cell($w[2],6,$datosP[2],'LR',0,'C',$fill);
				$this->Cell($w[3],6,$datosP[3],'LR',0,'C',$fill);
				
				$this->Ln();
				$this->Cell(array_sum($w),0,'','T');
			}

			function Table3($datos , $datosP , $titulo , $header)
			{

				$this->Cell(20);
				$this->SetFont('Times','I');
				$this->Ln(10);
				$this->Cell(200,8,utf8_decode($titulo),0,0,'C');
				$this->Ln(10);
				
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
				
				$w = array(63, 63, 63);
				
				for($i=0;$i<count($header);$i++)
					$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
				$this->Ln();
				
				// Nuevos colores y fuentes
				//$this->SetFillColor(224,235,255);
				$this->SetFillColor(255,255,255);
				$this->SetTextColor(0);
				$this->SetFont('');
				
					$datos[0] = iconv('UTF-8', 'ISO-8859-1', $datos[0]);			
					$datos[1] = iconv('UTF-8', 'ISO-8859-1', $datos[1]);
					$datos[2] = iconv('UTF-8', 'ISO-8859-1', $datos[2]);
					
					$this->Cell($w[0],6,$datos[0],'LR',0,'C',$fill);
					$this->Cell($w[1],6,$datos[1],'LR',0,'C',$fill);
					$this->Cell($w[2],6,$datos[2],'LR',0,'C',$fill);
					
	

					$this->Ln();
					$fill = !$fill;
					
				// Línea de cierre
				$this->Cell(array_sum($w),0,'','T');
				$this->Ln();
				$datosP[0] = iconv('UTF-8', 'ISO-8859-1', $datosP[0]);			
				$datosP[1] = iconv('UTF-8', 'ISO-8859-1', $datosP[1]);
				$datosP[2] = iconv('UTF-8', 'ISO-8859-1', $datosP[2]);
				
				$this->Cell($w[0],6,$datosP[0],'LR',0,'C',$fill);
				$this->Cell($w[1],6,$datosP[1],'LR',0,'C',$fill);
				$this->Cell($w[2],6,$datosP[2],'LR',0,'C',$fill);
				
				
				$this->Ln();
				$this->Cell(array_sum($w),0,'','T');
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
		


  $sql = "SELECT * FROM censo";

  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
  $casas=0;
  
  }
  else{ 
          $casas = mysql_num_rows($resultado2);
     }   
      

  $sql = "SELECT * FROM habitante WHERE estado=1";
  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
     $habitantesactivos = 0;
  }
  else{ 
   
    $habitantesactivos = mysql_num_rows($resultado2);
  } 

  $sql = "SELECT * FROM habitante WHERE estado=0";
  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
    $habitantesinactivos = 0;
  }
  else{ 
    $habitantesinactivos = mysql_num_rows($resultado2);
  } 
  $totalhabitantes=$habitantesactivos+$habitantesinactivos;


  $sql = "SELECT * FROM habitante WHERE nacionalidad='Venezolano(a)'";
  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
    $habitantesvenezolanos = 0;
  }
  else{ 
    
    $habitantesvenezolanos = mysql_num_rows($resultado2);
  } 

  $habitantesextranjeros= $totalhabitantes-$habitantesvenezolanos;

$sql = "SELECT * FROM habitante WHERE sexo='Masculino'";
  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
    $habitantesmasculinos = 0;
  }
  else{ 
    
    $habitantesmasculinos = mysql_num_rows($resultado2);
  } 

  $habitantesfemeninos= $totalhabitantes-$habitantesmasculinos;



  $sql = "SELECT * FROM usuario WHERE tipo='Vocero' and status=1";
  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
    $vocerosactivos = 0;
  }
  else{ 
    $vocerosactivos = mysql_num_rows($resultado2);
  } 
  
  $sql = "SELECT * FROM usuario WHERE tipo='Vocero' and status=0";
  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
    $vocerosinactivos = 0;
  }
  else{ 
    $vocerosinactivos = mysql_num_rows($resultado2);
  } 
  $totalvoceros=$vocerosactivos+$vocerosinactivos;
  


$totalingresos=0;
$totalegresos=0;

  $sql = "SELECT * FROM ingresos";
          
      if($resultado = mysql_query($sql)){
       
        while($fila = mysql_fetch_array($resultado)){
            
          $ingresos = $fila["cantidad"];
          $totalingresos+=$ingresos;
      }
       }   
    else{
      echo mysql_error();
    }


     $sql2 = "SELECT * FROM egresos";
          
      if($resultado = mysql_query($sql2)){
       
        while($fila = mysql_fetch_array($resultado)){
            
          $egresos = $fila["cantidad"];
          $totalegresos+=$egresos;
      }

}
          
    else{
      echo mysql_error();
    }

    $capital=$totalingresos-$totalegresos;
    $porcentajetotalcapital=($capital*100)/$capital;
    $porcentajetotalcapital=number_format($porcentajetotalcapital,2,",",".");


    $porcentajeingresos=($totalingresos*100)/$capital;
    $porcentajeingresos=number_format($porcentajeingresos,2,",",".");

    $porcentajeegresos=($totalegresos*100)/$capital;
    $porcentajeegresos=number_format($porcentajeegresos,2,",",".");

    $porcentajetotalhabitantes=($totalhabitantes*100)/$totalhabitantes;
    $porcentajetotalhabitantes=number_format($porcentajetotalhabitantes,2,",",".");

    $porcentajeactivos=($habitantesactivos*100)/$totalhabitantes;
    $porcentajeactivos=number_format($porcentajeactivos,2,",",".");

    $porcentajeinactivos=($habitantesinactivos*100)/$totalhabitantes;
    $porcentajeinactivos=number_format($porcentajeinactivos,2,",",".");

    $porcentajevenezolanos=($habitantesvenezolanos*100)/$totalhabitantes;
    $porcentajevenezolanos=number_format($porcentajevenezolanos,2,",",".");

    $porcentajeextranjeros=($habitantesextranjeros*100)/$totalhabitantes;
    $porcentajeextranjeros=number_format($porcentajeextranjeros,2,",",".");

    $porcentajemasculinos=($habitantesmasculinos*100)/$totalhabitantes;
    $porcentajemasculinos=number_format($porcentajemasculinos,2,",",".");

    $porcentajefemeninos=($habitantesfemeninos*100)/$totalhabitantes;
    $porcentajefemeninos=number_format($porcentajefemeninos,2,",",".");

    $porcentajetotalvoceros=($totalvoceros*100)/$totalvoceros;
    $porcentajetotalvoceros=number_format($porcentajetotalvoceros,2,",",".");

    $porcentajevocerosactivos=($vocerosactivos*100)/$totalvoceros;
    $porcentajevocerosactivos=number_format($porcentajevocerosactivos,2,",",".");

    $porcentajevocerosinactivos=($vocerosinactivos*100)/$totalvoceros;
    $porcentajevocerosinactivos=number_format($porcentajevocerosinactivos,2,",",".");

				
				$titulo = utf8_decode('Habitantes');
				$header = array('Total ','Activos','Inactivos',);
				$datos = array($totalhabitantes,$habitantesactivos,$habitantesinactivos);
				$porcentajetotalhabitantes .= "%";
				$porcentajeactivos .= "%";
				$porcentajeinactivos .= "%";
				
				$datosP = array($porcentajetotalhabitantes,$porcentajeactivos,$porcentajeinactivos);
				$pdf->Table($datos,$datosP,$titulo,$header);
				
				$titulo=" ";
				$header = array('Venezolanos' , 'Extranjeros', 'Masculinos', 'Femeninos');
				$datos = array($habitantesvenezolanos,$habitantesextranjeros,$habitantesmasculinos,$habitantesfemeninos);
				$datos = array($habitantesvenezolanos,$habitantesextranjeros,$habitantesmasculinos,$habitantesfemeninos);
				$porcentajevenezolanos .= "%";
				$porcentajeextranjeros .= "%";
				$porcentajemasculinos .= "%";
				$porcentajefemeninos .= "%";
				$datosP = array($porcentajevenezolanos,$porcentajeextranjeros,$porcentajemasculinos,$porcentajefemeninos);
				$pdf->Table2($datos,$datosP,$titulo,$header);


				$titulo = utf8_decode('Usuarios');
				$header = array('Total','Activos','Inactivos',);
				$datos = array($totalvoceros,$vocerosactivos,$vocerosinactivos);
				$porcentajetotalvoceros .= "%";
				$porcentajevocerosactivos .= "%";
				$porcentajevocerosinactivos .= "%";
				
				$datosP = array($porcentajetotalvoceros,$porcentajevocerosactivos,$porcentajevocerosinactivos);
				$pdf->Table3($datos,$datosP,$titulo,$header);
			

				$titulo = utf8_decode('Fondos');
				$header = array('Actual','Ingresos','Egresos',);
				$datos = array($capital,$totalingresos,$totalegresos);
				$porcentajetotalcapital .= "%";
				$porcentajeingresos .= "%";
				$porcentajeegresos .= "%";
				
				$datosP = array($porcentajetotalcapital,$porcentajeingresos,$porcentajeegresos);
				$pdf->Table3($datos,$datosP,$titulo,$header);
				$pdf->Output();
			
	
	
?>