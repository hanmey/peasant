<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author  Hanmy
 * @data    2016/1/28
 */
abstract class   MY_Controller extends CI_Controller
{
    public $pagination;

    function  __construct()
    {
        parent::__construct();
    }

    /**
     * @param $template
     */
    protected function view($template)
    {
        if (file_exists(VIEWPATH . $template . '.php')) {
            $this->load->view('common\header');
            $this->load->view($template);
            $this->load->view('common\footer');
        } else {
            throw new  Exception("template is not exists");
        }
    }

    /**
     * 获取列表中的数据
     * @param $m
     * @param array $map
     * @param int $limit
     * @throws Exception
     */
    protected function get_onepage_data($m, $map = array(), $limit = 20)
    {
        if ($m) {
            $count = $m->get_data_count();
            if ($count) {
                $get = $this->input->get();
                $p = $get['p'];

                $offset = $this->get_data_limit($p, $limit);
                $data_list = $m->get_datalist($map, "*", $offset);
                $this->pagination = $this->create_page_html();
                return $data_list;
            }
        } else {
            throw new Exception('没有加载Modal');
        }
    }

    /**
     * 获取数据条数
     * @param $p
     * @param $limit
     */
    private function get_data_limit($p, $limit)
    {
        return array(($p - 1) * $limit, $limit);
    }

    /**
     * @param $count
     * @param $page
     * @param $limit
     */
    protected function create_page_html($count, $page, $limit)
    {
        $this->load->library('pagination');
        //基础URL
        $get = $this->input->get();
        unset ($get['p']);
        $base_url = $_SERVER['HTTP_HOST'] . $_SERVER['HTTP_REFERER'];
        if (!empty($get)) $base_url .= '?' . http_build_query($get);
        $config['base_url'] = $base_url;
        $config['total_rows'] = $count;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();
    }

    public function add()
    {
        $this->view('common/form');

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    protected function delete()
    {

    }
}