<?php
    //Incluimos librería y archivo de conexión
    require 'Classes/PHPExcel.php';
    require 'conexion.php';
    
    //Consulta
    $sql=("SELECT e.numero_cliente,e.Cedula,e.Nombre,e.Telefono,e.Email,e.Provincia,e.Canton,e.Tiempo,e.Plan,e.ClaveATV,e.Bloque, p.id_provi,p.nom_provi,c.id_canto,c.nom_canto,c.id_provi, pl.* FROM empleados as e inner join provincias as p on (p.id_provi=e.Provincia) inner join cantones as c on (c.id_canto=e.Canton) inner join planes as pl on (pl.id_plan=e.Plan)");

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
    
    $objPHPExcel->getActiveSheet()->getStyle('A1:P6')->applyFromArray($estiloTituloReporte);
    $objPHPExcel->getActiveSheet()->getStyle('A6:P6')->applyFromArray($estiloTituloColumnas);
    
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
    $objPHPExcel->getActiveSheet()->setCellValue('H6', 'Tiempo');
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('I6', 'Plan');
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('J6', 'ClaveATV');
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('K6', 'Bloque');
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('L6', 'Estado del Pago');
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('M6', 'Fecha de Inicio');
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('N6', 'Banco');
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('O6', '#N de Deposito');
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
    $objPHPExcel->getActiveSheet()->setCellValue('P6', 'Fecha del Pago');
    
   
    
    
    
    $fila = $fila-1;
    
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:P".$fila);
    
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