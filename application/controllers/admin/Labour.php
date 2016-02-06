<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Labour extends MY_Controller {

	public $subject = "包工团队";
	public function  __construct()
	{
		parent::__construct();
		$this->load->model('labour_model', 'labour');
	}
}
