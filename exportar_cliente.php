<?php
    //Incluimos librería y archivo de conexión
    require 'Classes/PHPExcel.php';
    require 'conexion.php';
    
    //Consulta
    $sql=("SELECT * FROM empleados ");

    $resultado =mysqli_query($con,$sql);
    $fila = 7; //Establecemos en que fila inciara a imprimir los datos
    
    
    //Objeto de PHPExcel
    $objPHPExcel  = new PHPExcel();
    
    //Propiedades de Documento
    $objPHPExcel->getProperties()->setCreator("Marko robles")->setDescription("Reporte de Empleados");
    
    //Establecemos la pestaña activa y nombre a la pestaña
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle("Empleados");
    
        
    $estiloTituloReporte = array(
    'font' => array(
    'name'      => 'Arial',
    'bold'      => true,
    'italic'    => false,
    'strike'    => false,
    'size' =>13
    ),
    'fill' => array(
    'type'  => PHPExcel_Style_Fill::FILL_SOLID
    ),
    'borders' => array(
    'allborders' => array(
    'style' => PHPExcel_Style_Border::BORDER_NONE
    )
    ),
    'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
    );
    
    $estiloTituloColumnas = array(
    'font' => array(
    'name'  => 'Arial',
    'bold'  => true,
    'size' =>10,
    'color' => array(
    'rgb' => 'FFFFFF'
    )
    ),
    'fill' => array(
    'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
    'allborders' => array(
    'style' => PHPExcel_Style_Border::BORDER_THIN
    )
    ),
    'alignment' =>  array(
    'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
    );
    
    $estiloInformacion = new PHPExcel_Style();
    $estiloInformacion->applyFromArray( array(
    'font' => array(
    'name'  => 'Arial',
    'color' => array(
    'rgb' => '000000'
    )
    ),
    'fill' => array(
    'type'  => PHPExcel_Style_Fill::FILL_SOLID
    ),
    'borders' => array(
    'allborders' => array(
    'style' => PHPExcel_Style_Border::BORDER_THIN
    )
    ),
    'alignment' =>  array(
    'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
    ));
   
    $objPHPExcel->getActiveSheet()->getStyle('A1:Q6')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A6:Q6')->applyFromArray($estiloTituloColumnas);
    
    $objPHPExcel->getActiveSheet()->setCellValue('D3', 'REPORTE DE CLIENTES');
    $objPHPExcel->getActiveSheet()->mergeCells('D3:J3');
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
    $objPHPExcel->getActiveSheet()->setCellValue('A6', 'Numero del Cliente');
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
    $objPHPExcel->getActiveSheet()->setCellValue('B6', 'Cedula');
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $objPHPExcel->getActiveSheet()->setCellValue('C6', 'Nombre');
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('D6', 'Telefono');
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(40);
    $objPHPExcel->getActiveSheet()->setCellValue('E6', 'Email');
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('F6', 'Provincia');
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('G6', 'Canton');
     $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('H6', 'Distrito');


    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('I6', 'Tiempo');
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('J6', 'Plan');
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('K6', 'ClaveATV');
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('L6', 'Bloque');
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('M6', 'Estado del Pago');
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('N6', 'Fecha de Inicio');
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('O6', 'Banco');
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('P6', '#N de Deposito');
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('Q6', 'Fecha del Pago');
    
   
    
    //Recorremos los resultados de la consulta y los imprimimos
    while($rows = $resultado->fetch_assoc()){       
       

        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['numero_cliente']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['Cedula']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['Nombre']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['Telefono']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['Email']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['Provincia']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['Canton']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['Distrito']);

        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['Tiempo']);
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $rows['Plan']);
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $rows['ClaveATV']);
        $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, $rows['Bloque']);
        $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila, $rows['estado_pago']);
        $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila, $rows['fecha_inicio']);
        $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila, $rows['banco_pago']);
        $objPHPExcel->getActiveSheet()->setCellValue('P'.$fila, $rows['deposito']);
        $objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila, $rows['fecha_pago']);        
        $fila++; //Sumamos 1 para pasar a la siguiente fila
    }
    
    $fila = $fila-1;
    
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:Q".$fila);
    
    $filaGrafica = $fila+2;
    
    // definir origen de los valores
    
    // definir origen de los rotulos
    
    // definir  gráfico
    
    
    
    
    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    
    // incluir gráfico
    
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment;filename="Empleados.xlsx"');
    header('Cache-Control: max-age=0');
    
    $writer->save('php://output');
?>