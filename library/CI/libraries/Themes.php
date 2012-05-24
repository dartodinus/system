<?PHP  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CI_Themes {
	
    public function __construct(){
		
		$this->obj =& get_instance();
		$this->obj->load->library('smarty');
		
		$this->obj->load->helper('file');
		$dir_theme = 'hrm';
		define('PATH_DIR_THEMES',	APPPATH. 'views/theme/' .$dir_theme. '/templates/');

		$config_dir	= array('BASE_URL' 			=> base_url().INDEX_PAGE,
							'APPPATH'			=> APPPATH,
							'BASEPATH'			=> BASEPATH,
							'PATH_DIR_THEMES'	=> APPPATH. 'views/theme/' .$dir_theme. '/templates/',
							'PATH_DIR_CSS'		=> base_url( APPPATH. 'views/theme/'. $dir_theme .'/stylesheet').'/',
							'PATH_DIR_JS'		=> base_url( APPPATH. 'views/theme/'. $dir_theme .'/script').'/',
							'PATH_DIR_IMG'		=> base_url( APPPATH. 'views/theme/'. $dir_theme .'/images').'/',
							'PATH_DIR_UPLOAD'	=> base_url('uploads'). '/'
							);
		
		$this->obj->smarty->assign($config_dir);
		
	}


}
?>