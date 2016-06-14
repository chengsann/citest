<?php 
/**
* 
*/
class MY_Loader extends CI_Loader
{
	protected $_theme ='default/';
	
	public function switch_themes_on()
	{
		$this->_ci_view_paths = array(FCPATH . THEMES_DIR . $this->_theme => TRUE );
	}

	public function switch_theme_off()
	{

	}
}












 ?>