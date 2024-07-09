<?php

defined('BASEPATH') OR exit('No direct script access allowed');

define("CY_SUCCESS", 200);

#[\AllowDynamicProperties]
class CY_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * CI_Loader
	 *
	 * @var	CI_Loader
	 */
	public $load;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->helper("back_end_helper");
		$this->load->helper('security');
		$this->load->helper("form_helper");
		$this->load->helper("yro_helper");
		$this->load->helper("fe_sql_helper");
		$this->load->helper("url_helper");
		$this->load->helper("secure_helper");
		$this->load->library('form_validation');
		$this->load->helper('script_helper');
		$this->load->helper('file_manage_helper');
		if(isset(getallheaders()['Content-Type'])){
			$heading111 = getallheaders()['Content-Type'];
			if($heading111 == "application/json"){
				$this->POST = json_decode($this->input->raw_input_stream, true);
			}
			else{
				$this->POST = (! empty($this->input->post())? $this->input->post() : [] );	
			}
		}
		define("POST_ACTIVE", empty($this->POST)? false : true);

		$this->load->helper('cy_helper');
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
		
	}



	
	

}
