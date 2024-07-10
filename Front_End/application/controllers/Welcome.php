<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CY_Controller {

	
	public function index()
	{ 
		CY_VIEW('welcome_message');	
	}
}
