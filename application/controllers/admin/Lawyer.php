<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lawyer extends MY_Controller {

	public function index()
	{
		$template =  'peasant\list';
		$this->view($template);
	}
}
