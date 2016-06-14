<?php


/**
* 
*/
class Home_Controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->switch_themes_on();
	}

}
/**
* 
*/
class Admin_Controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->switch_theme_off();
	}
}