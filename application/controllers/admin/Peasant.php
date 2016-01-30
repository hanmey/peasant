<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peasant extends MY_Controller
{
	public function  __construct()
	{
		parent::__construct();
		$this->load->model('peasant_model', 'peasant');
	}

	public function index()
	{
		$template = 'peasant\list';
		$this->view($template);
	}

	public function ilist()
	{
		$datalist['list'] = $this->get_onepage_data($this->peasant);
		$datalist['page_title'] = "农民工列表";
		$this->view('admin/peasant/list', $datalist);
	}

	/**
	 * 新增信息
	 * @throws Exception
	 */
	public function add()
	{
		if ($this->input->post()) {
			$insert_id = $this->insert_post_data($this->peasant);
			if ($insert_id) {
				$this->view('admin/peasant/add', array('page_title' => "添加工人成功", 'opResult' => 'ok', 'redirectUrl' => '/admin/peasant/ilist'));
			}
			else {
				if ($insert_id) {
					$this->view('admin/peasant/add', array('page_title' => "添加工人成功", 'opResult' => 'error'));
				}
			}
		}
		else {

			$this->view('admin/peasant/add', array('page_title' => "添加工人"));
		}
	}

	/**
	 * 编辑信息
	 * @param $id
	 * @throws Exception
	 */
	public function edit($id)
	{
		if ($this->input->post()) {
			//保存
			$this->update_post_data_by_id($this->peasant, $id);
		}
		else {
			if ($id) {
				$data = $this->peasant->get_ond_data(array('id' => $id));
			}
			else redirect('/admin/peasant/add');
			$this->view('admin/peason/add', $data);
		}
	}
}
