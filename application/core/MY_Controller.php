<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author  Hanmy
 * @data    2016/1/28
 */
abstract class   MY_Controller extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
    }

    /**
     * @param $template
     */
    protected function view($template)
    {
        if (file_exists(VIEWPATH.$template.'.php')) {
            $this->load->view('common\header');
            $this->load->view($template)
            ;
            $this->load->view('common\footer');
        }
        else {
            throw new  Exception("template is not exists");
        }
    }

    protected function _list()
    {

    }

    protected function add()
    {

    }

    protected function edit()
    {

    }

    protected function update()
    {

    }

    protected function delete()
    {

    }
}