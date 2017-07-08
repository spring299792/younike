<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends MY_Controller {

	
	public function index()
	{
		$data = $this->_common(83);
		$list=$this->admin_model->getGroups();
		$data['list']=$list;
		$this->load->view('group/index',$data);
	}

	public function add(){
		$data = $this->_common(83);
		$this->load->view('group/edit',$data);
	}

	public function insert(){
		$id=intval($this->input->post('id',true));
		$data=$this->create();
		if($id>0){
			$this->db->where('id', $id);
			$this->db->update('group',$data);
			//echo $this->db->last_query();exit;
			$msg="修改数据成功";
		}else{
			$this->db->insert('group',$data);
			$msg="新增数据成功";
		}
		echo "<script>alert('".$msg."');location.href='".MANAGE_URL.base_url()."group';</script>";
	}

	public function edit(){
		$id=intval($this->input->get('id'));
		$data = $this->_common(83);
		$data['row']=$this->admin_model->getGroupInfo($id);
		$this->load->view('group/edit',$data);
	}

	public function del(){
		$id=intval($this->input->get('id'));
		$this->db->delete('group', array('id' => $id)); 
		echo "<script>location.href='".MANAGE_URL.base_url()."group';</script>";
	}
}
