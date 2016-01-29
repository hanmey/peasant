<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peasant extends MY_Controller {
	public function  __construct(){
		parent::__construct();
		$this->load->model('peasant_model','peasant');
	}
	public function index()
	{
		$template =  'peasant\list';
		$this->view($template);
	}
	public function ilist(){

		$datalist =  $this->get_onepage_data($this->peasant);
		$this->view('admin/peasant/list',$datalist);
	}
}
