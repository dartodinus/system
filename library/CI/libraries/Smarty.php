<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once( THIRDPATH.'/smarty/libs/Smarty.class.php' );

class CI_Smarty extends Smarty {

	public function __construct(){
		parent::__construct();
		
		$this->error_reporting = E_ALL & ~E_NOTICE;
		$this->debugging = true;
		$this->caching = true;

		$this->cache_lifetime 	= 0;
		$cache_dir				= str_replace("\\", "/", FCPATH)."temp/cache/";
	  	$compile_dir 			= str_replace("\\", "/", FCPATH)."temp/templates_c/";
		$config_dir				= str_replace("\\", "/", FCPATH)."temp/configs/";
		
		$this->setTemplateDir(APPPATH.'views/');
		$this->setCompileDir($compile_dir);
		$this->setCacheDir($cache_dir);
		$this->setConfigDir($config_dir);
		$this->clearAllCache();
		$this->clearCompiledTemplate();
		//$this->testInstall();
		
		// Assign CodeIgniter object by reference to CI
		if ( method_exists( $this, 'assignByRef') ){
			$ci =& get_instance();
			$this->assignByRef("ci", $ci);
		}

	}


	/**
	 *  Parse a template using the Smarty engine
	 *
	 * This is a convenience method that combines assign() and
	 * display() into one step. 
	 *
	 * Values to assign are passed in an associative array of
	 * name => value pairs.
	 *
	 * If the output is to be returned as a string to the caller
	 * instead of being output, pass true as the third parameter.
	 *
	 * @access	public
	 * @param	string
	 * @param	array
	 * @param	bool
	 * @return	string
	 */
	 
	public function view($template, $data = array(), $return = FALSE){
		
		while (list($var, $val) = each($data)) {
        	$this->assign($var, $val);
    	}
		
		if ($return == FALSE){
			$CI =& get_instance();
			if (method_exists( $CI->output, 'set_output' )){
				$CI->output->set_output( $this->fetch($template) );
			}else{
				$CI->output->final_output = $this->fetch($template);
			}
			
			return;
			
		}else{
			return $this->fetch($template);
		}
	}
}
// END Smarty Class