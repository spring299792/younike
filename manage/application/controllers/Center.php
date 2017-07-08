<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Center extends CI_Controller {

	public $dbpre="you_";
	function __construct(){
		parent :: __construct();
		$this->load->model(array('user_model'));
	}
	public function login()
	{
		if($this->user_model->isLogin()){
			header('Location:'.MANAGE_URL);
			exit;
		}
		$do = $this->input->post('do',true);
		if($do == '1'){
			$username = addslashes($this->input->post('username',true));
			$password = addslashes($this->input->post('password',true));
			$captcha = addslashes($this->input->post('captcha',true));
			$ip=$this->input->ip_address();
			if(empty($username) || empty($password)){
				echo "<script>alert('请填写用户名和密码');history.back();</script>";
				exit;
			}else{
				//检查登陆锁定间隔时间
				$lockfile = './data/login.lock.inc';
				$lasttime = file_get_contents($lockfile);
				if(!empty($lasttime) && ($lasttime + LOGINTIME) > time())
				{
				    echo "<script>alert('您上次输错了密码，请等会在输入。');history.back();</script>";
					exit;
				}
				// 首先删除旧的验证码
				$expiration = time()-120; // 2分钟限制
				$this->db->query("DELETE FROM ".$this->dbpre."captcha WHERE captcha_time < ".$expiration); 

				// 然后再看是否有验证码存在:
				$sql = "SELECT COUNT(*) AS count FROM ".$this->dbpre."captcha WHERE word = '{$captcha}' AND ip_address = '{$ip}' AND captcha_time > $expiration";
				
				//$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
				$query = $this->db->query($sql);
				$row = $query->row();

				if ($row->count == 0)
				{
				    echo "<script>alert('验证码错误');history.back();</script>";
					exit;
				}
				$rec = $this->user_model->login($username,$password);
				if($rec == 1){
					header('Location:'.MANAGE_URL."?node_id=1");
					exit;
				}else{//密码错误
					$info['ip_address']=$this->input->ip_address();
					$info['error_content']="用户名或密码错误";
					$info['add_time']=time();
					$info['user']=$username;
					$data=$this->create($info);
					file_put_contents($lockfile, time());
					echo "<script>alert('用户名或密码错误');history.back();</script>";
					exit;
				}
			}
		}else{
			$data['verify']=$this->verify();
			$this->load->view('public/login',$data);
		}
	}


	public function logout(){
		session_destroy();
		header('Location:'.MANAGE_URL.base_url().'center/login');
	}

	public function create($data) {
        // 如果没有传值默认取POST数据
        if(empty($data)){
            $data    =   $this->input->post();
        }
        // 验证完成生成数据对象
            $vo   =  array();
            foreach ($data as $key=>$name){
                //保证赋值有效
                if(!is_null($name)){
                	if($name!='do'){
                		$vo[$key] = (MAGIC_QUOTES_GPC && is_string($name))?   stripslashes($name)  :  $name;
                	}
                    
                }
            }
        return $vo;
     }

     function verify(){
     	$this->load->helper('captcha');
		$vals = array(
		    'img_path' => './captcha/',
		    'img_url' => MANAGE_URL.'/captcha/',
		    'img_width' => 150,
    		'img_height' => 38,
    		'expiration'    => 120,
    		'word_length'   => 4,
    		'pool'      => '0123456789abcdefghijklmnopqrstuvwxyz',
		    );

		$cap = create_captcha($vals);
		$data = array(
		    'captcha_time' => $cap['time'],
		    'ip_address' => $this->input->ip_address(),
		    'word' => $cap['word']
		    );

		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);
		return $cap['image'];
     }


     function test(){
     	$this->load->helper('path');
     	$directory = './data/login.lock.inc';
		echo set_realpath($directory,true);
     }
}
