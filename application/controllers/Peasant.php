<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peasant extends MY_Controller {

	public function index()
	{
		$template =  'peasant\list';
		$this->view($template);
	}
}
