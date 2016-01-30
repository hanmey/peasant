<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peasant extends MY_Controller
{
	public $subject = "农民工";
	public function  __construct()
	{
		parent::__construct();
		$this->load->model('peasant_model', 'peasant');
	}
}
