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
		}
		else {
			throw new  Exception("template is not exists");
		}
	}

	/**
	 * 获取列表中的数据
	 * @param       $m
	 * @param array $map
	 * @param int   $limit
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
		}
		else {
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

	/**
	 * 更新数据
	 * @param       $m
	 * @param       $id
	 * @param array $ext_data
	 * @return bool
	 */
	protected function update_post_data_by_id($m, $id, $ext_data = array())
	{
		$post = $this->input->post();
		$fields = $m->get_table_fileds();
		foreach ($post as $key => $value) {
			if (in_array($key, $fields)) {
				$updateData[$key] = $value;
			}
		}
		if (!empty($updateData)) {
			$affected_rows = $m->update_data(array());
			return $affected_rows ?: false;
		}
		else
			return false;
	}

	/**
	 * 向数据库中插入POST数据
	 * @param       $m
	 * @param array $ext_data
	 * @return int
	 */
	protected function insert_post_data($m, $ext_data = array())
	{
		$post = $this->input->post();
		$fields = $m->get_table_fileds();
		foreach ($post as $key => $value) {
			if (in_array($key, $fields)) {
				$insertData[$key] = $value;
			}
		}
		if (!empty($insertData) && is_array($insertData)) {
			if (in_array('add_time', $fields)) {
				$insertData['add_time'] = time();
			}
			$insert_id = $m->add_data(array_merge($insertData, $ext_data));
			return $insert_id ?: false;
		}
		else
			return false;
	}

	/**
	 * 列表页
	 */
	public function ilist()
	{
		$className = $this->router->class;
		$datalist['list'] = $this->get_onepage_data($this->$className);
		$datalist['page_title'] = $this->subject . "列表";
		$this->view('admin/' . $this->router->class . '/list', $datalist);
	}

	/**
	 * 新增信息
	 */
	public function add()
	{
		if ($this->input->post()) {
			$className = $this->router->class;
			$insert_id = $this->insert_post_data($this->$className);
			if ($insert_id) {
				$this->view('admin/' . $this->router->class . '/add', array('page_title' => "添加" . $this->subject . "成功", 'opResult' => 'ok', 'redirectUrl' => '/admin/' . $this->router->class . '/ilist'));
			}
			else {
				if ($insert_id) {
					$this->view('admin/' . $this->router->class . '/add', array('page_title' => "添加" . $this->subject . "成功", 'opResult' => 'error'));
				}
			}
		}
		else {
			$this->view('admin/' . $this->router->class . '/add', array('page_title' => "添加" . $this->subject));
		}
	}

	/**
	 * 编辑信息
	 * @param $id
	 */
	public function edit($id)
	{
		if ($this->input->post()) {
			//保存
			$className = $this->router->class;
			$this->update_post_data_by_id($this->$className, $id);
			$this->view('admin/' . $this->router->class . '/add', array('page_title' => "资料更新成功", 'opResult' => 'ok', 'redirectUrl' => '/admin/' . $this->router->class . '/ilist'));
		}
		else {
			if ($id) {
				$className = $this->router->class;
				$data = $this->$className->get_ond_data(array('id' => $id));
			}
			else redirect('/admin/' . $this->router->class . '/add');
			$this->view('admin/' . $this->router->class . '/add', $data);
		}
	}
}