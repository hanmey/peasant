<?php

/**
 * User: hanmy
 * Date: 2016/1/29
 * Time: 22:46
 */
class Labour_model extends base_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'labour';

    }
}