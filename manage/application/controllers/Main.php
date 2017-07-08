<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	
	public function index()
	{
		$data = $this->_common(1);

		$this->load->view('index',$data);
	}
	public function changepass()
	{
		$uid=intval($_SESSION['uid']);
		$do = $this->input->post('do',true);
		if($do == '1'){
			//验证旧密码是否正确
			$oldpass=md5($this->input->post('oldpass'));
			$rec=$this->user_model->checkPass($uid,$oldpass);
			if($rec){
				$data=array('password'=>md5($_POST['password']));
				$this->db->where('id', $uid);
				$this->db->update('user',$data);
				$msg="修改密码成功";
			}else{
				$msg="原密码错误";
			}
			echo "<script>alert('".$msg."');history.back();</script>";
		}else{
			$data = $this->_common(15);
			$this->load->view('public/changepass');
		}
		
	}
}
