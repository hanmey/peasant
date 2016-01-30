<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MY_Controller {

	public $subject = "项目管理";
	public function  __construct()
	{
		parent::__construct();
		$this->load->model('project_model', 'project');
	}
}
