<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {
	public function index()
	{
		$data = $this->_common(13);
		$data['list']=$this->admin_model->getPages();
		$this->load->view('page/index',$data);
	}

	public function add(){
		$data = $this->_common(13,1);
		$this->load->view('page/edit',$data);
	}

	public function insert(){
		$id=intval($this->input->post('id',true));
		$data=$this->create();
		//print_r($data);exit;
		if($id>0){
			$this->db->where('id', $id);
			$this->db->update('contact',$data);
			$msg="修改单页成功";
		}else{
			$this->db->insert('contact',$data);
			$msg="添加单页成功";
		}
		echo "<script>alert('".$msg."');history.back();</script>";
	}

	public function edit(){
		$id=intval($this->input->get('id'));
		$row=$this->admin_model->getPageInfo($id);
		switch($id){
			case 1: 
				$flag=100;
				break;
			case 2: 
				$flag=99;
				break;
			case 4: 
				$flag=103;
				break;
			default:
				$flag=101;
				break;
		}
		//echo $flag;
		$data = $this->_common($flag,1);
		$data['row']=$row;
		$this->load->view('page/edit',$data);
	}

	public function del(){
		$id=intval($this->input->get('id'));
		$this->db->delete('page', array('id' => $id)); 
		echo "<script>location.href='".MANAGE_URL.base_url()."page';</script>";
	}

}
