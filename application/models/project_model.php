<?php

/**
 * User: hanmy
 * Date: 2016/1/31
 */
class Project_model extends base_model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->table = 'project';

	}
}