<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {

	
	public function index()
	{
		$data = $this->_common(105);
		$list=$this->db->get('member')->result_array();
		$data['list']=$list;
		$this->load->view('member/index',$data);
	}

	public function add(){
		$data = $this->_common(105);
		$this->load->view('member/edit',$data);
	}

	public function insert(){
		$uid=intval($this->input->post('uid',true));
		$_POST['create_time']=time();
		$data=$this->create();
		if($uid>0){
			$this->db->where('uid', $uid);
			$this->db->update('member',$data);
			$msg="修改用户成功";
		}else{
			//判断用户是否存在
			$check=$this->db->where('email',$data['email'])->get('member')->first_row('array');
			if($check && $check['uid']>0){
				$msg="该用户已存在";
				echo "<script>alert('".$msg."');history.back();</script>";
				exit;
			}
			$this->db->insert('member',$data);
			$msg="新增用户成功";
		}
		echo "<script>alert('".$msg."');location.href='".MANAGE_URL.base_url()."member';</script>";
	}

	public function edit(){
		$uid=intval($this->input->get('uid'));
		$data = $this->_common(105);
		$data['row']=$this->db->where('uid',$uid)->get('member')->first_row('array');
		$this->load->view('member/edit',$data);
	}

	public function del(){
		$uid=intval($this->input->get('uid'));
		$this->db->delete('member', array('uid' => $uid)); 
		echo "<script>location.href='".MANAGE_URL.base_url()."member';</script>";
	}

	//获取随机密码，仿照验证码来写
	function getSecret(){
		$this->load->helper('captcha');
		$vals = array(
			'img_path' => './captcha/',
		    'img_url' => MANAGE_URL.'/captcha/',
		    'img_width' => 150,
    		'img_height' => 38,
    		'expiration'    => 120,
    		'word_length'   => 8,
    		'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
		    );

		$cap = create_captcha($vals);
		$word=$cap['word'];
		//删掉生成的验证码
		unlink('./captcha/'.$cap['filename']);
		echo $word;
	}
}
