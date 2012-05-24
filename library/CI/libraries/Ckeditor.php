<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require_once( BASEPATH.'plugins/ckeditor/ckeditor.php' );
require_once APPPATH."/third_party/ckeditor/ckeditor.php"; 

class CI_Ckeditor extends CKEditor{

	public function __construct() { 
        parent::__construct(); 
    } 
	
	/**
	public function editor(){
		$CKEditor = new CKEditor();
		

		$this->returnOutput = true;
		$this->basePath = base_url().'catalog/third_party/ckeditor/';
		$this->config['width'] = 600;
		$this->textareaAttributes = array("cols" => 80, "rows" => 10);
		
		$initialValue = '<p>This is some <strong>sample text</strong>. You are using <a href="http://ckeditor.com/">CKEditor</a>.</p>';
		$this->editor("editor", $initialValue);
	}
	*/
}
// END Smarty Class