<?php

defined('BASEPATH') OR exit('No direct script access allowed');


#[\AllowDynamicProperties]
class CI_Controller {

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

		$this->load->helper("back_end_helper");
		$this->load->helper("form_helper");
		$this->load->helper("yro_helper");
		$this->load->helper("url_helper");
		$this->load->helper("secure_helper");
		$this->POST = (! empty($this->input->post())? $this->input->post() : [] );
		$this->FORM_SUBMITTED = (! empty($this->input->post()) ? true : false);
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
