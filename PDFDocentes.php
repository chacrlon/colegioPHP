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
				
			
			function Table()
            {
                $this->Ln(5);
                // Colores, ancho de línea y fuente en negrita
                $this->SetFillColor(225,211,240);
                $this->SetTextColor(0,0,0);
                //$this->SetDrawColor(128,0,0);
                $this->SetDrawColor(169,176,198);
             
                
                $this->Cell(26,7,utf8_decode('Cédula'),1,0,'C',true);
                $this->Cell(27,7,utf8_decode('Primer Nombre'),1,0,'C',true);
                $this->Cell(27,7,utf8_decode('Primer Apellido'),1,0,'C',true);
               $this->Cell(25,7,utf8_decode('Celular'),1,0,'C',true);
               $this->Cell(25,7,utf8_decode('Tlf. de Hab.'),1,0,'C',true);
                $this->Cell(35,7,utf8_decode('Correo'),1,0,'C',true);
                $this->Cell(25,7,utf8_decode('Status'),1,0,'C',true);
                $this->Ln();
    
                
            }


            function Tableaux($nombre1,$apellido1,$cedula,$celular,$telefono,$correo1,$status2)
            {
                
                // Colores, ancho de línea y fuente en negrita
                $this->SetFillColor(255,255,255);
                $this->SetTextColor(0,0,0);
                //$this->SetDrawColor(128,0,0);
                $this->SetDrawColor(169,176,198);
             
                $this->SetFont('Arial','',10);
                $this->Cell(20,7,utf8_decode($cedula),1,0,'L',true);
                $this->Cell(27,7,utf8_decode($nombre1),1,0,'L',true);
                $this->Cell(27,7,utf8_decode($apellido1),1,0,'L',true);
               $this->Cell(25,7,utf8_decode($celular),1,0,'L',true);
                $this->Cell(25,7,utf8_decode($telefono),1,0,'L',true);
                $this->Cell(50,7,utf8_decode($correo1),1,0,'L',true);
                $this->Cell(16,7,utf8_decode($status2),1,0,'L',true);
                $this->Ln();
               
    
                
            }

            function Table6($promedio)
            {
                
                $this->Image('./img/banner2.jpg',10,10,190,10);

                $this->ln(20);
                // Colores, ancho de línea y fuente en negrita
                $this->SetFillColor(255,255,255);
                $this->SetTextColor(0,0,0);
               $this->SetFont('Arial','I',12);
                //$this->SetDrawColor(128,0,0);
                $this->SetDrawColor(255,255,255);
                $this->Cell(200,7,utf8_decode($promedio),1,0,'C',true);
                $this->ln(15);
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
		
        $sql = "SELECT * FROM docente";


  $resultado2 = mysql_query($sql)or die(mysql_error());
  if(mysql_num_rows($resultado2) == 0){
    
     
     echo "<script language='javascript'> alert('No hay Docentes registrados!');</script>"; 
     echo "<script language='javascript'>window.close();</script>";

  
       
  }
  else{
          
      if($resultado = mysql_query($sql)){
        $pdf->Table6('Listado de Docentes');
        $pdf->Tableaux('Primer Nombre','Primer Apellido','Cédula','Celular','Tlf. Habitación','Correo','Status');
        while($fila = mysql_fetch_array($resultado)){
            
        
          $nombre1 = $fila["nombre1"];
          $apellido1= $fila["apellido1"];
          $cedula= $fila["cedula"];
          $celular=$fila["celular"];
          $telefono=$fila["telefono_habitacion"];
          $correo=$fila["correo"];
          $status=$fila["status"];
          if($status==1){
            $status="Activo";
          }
          else{
            $status="Inactivo";
          }
          $pdf->Tableaux($nombre1,$apellido1,$cedula,$celular,$telefono,$correo,$status);
        }
                                     

    } 
}


		$pdf->Output();
			
	
	
?>