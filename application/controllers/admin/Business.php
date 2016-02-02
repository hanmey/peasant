<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends MY_Controller
{
	public $subject = "用人单位";
	public function  __construct()
	{
		parent::__construct();
		$this->load->model('business_model', 'business');
	}



}
