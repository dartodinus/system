<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

require_once APPPATH."/third_party/PHPExcel/PHPExcel.php"; 
 
class Excel extends PHPExcel{ 
    public function __construct() { 
        parent::__construct(); 
    } 
}


/**
public function index() 
    { 
        $this->load->library('excel');//Panggil Library Excel 
 
                $this->excel->setActiveSheetIndex(0) 
                               ->setCellValue('A1', 'Hello') 
                               ->setCellValue('B2', 'world!') 
                               ->setCellValue('C1', 'Hello') 
                               ->setCellValue('D2', 'world!'); 
                $this->excel->getActiveSheet()->setTitle('Simple'); 
 
                $this->excel->setActiveSheetIndex(0); 
 
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007'); 
 
                $objWriter->save(APPPATH."../assets/doc/apalah.xlsx");    //Simpan sebagai apalah.xlsx 
}
*/
?>