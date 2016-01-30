<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lawyer extends MY_Controller {

	public $subject = "法律援助";
	public function  __construct()
	{
		parent::__construct();
		$this->load->model('lawyer_model', 'lawyer');
	}
}
