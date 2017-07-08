<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class MY_Controller extends CI_Controller {

	/**

	 * 用户信息

	 * @var array

	 */

	public $userinfo;

	/**

	 * 用户ID

	 * @var int

	 */

	public $uid = 0;

	public $islogin = false;



	function __construct(){

		parent :: __construct();

		$this->load->model(array('user_model','admin_model','news_model'));

		if($this->user_model->isLogin()){

			$this->islogin = true;

			$this->uid = $_SESSION['auid'];

			$this->userinfo = $this->user_model->getUserInfo($this->uid);

		} else {

			echo "<script> window.location.href='".MANAGE_URL.base_url()."center/login'</script>";

			exit;

		}

	}



	/**

	* 公共文件

	* @param $sidebar_num:左侧选中状态;$editor:是否引入编辑器js

	*/

	public function _common($editor=0){
        $sidebar_num = intval($_GET['node_id']);
        if($sidebar_num > 0){
            $_SESSION['node_id'] = $sidebar_num;
        }else{
            $sidebar_num = $_SESSION['node_id'];
        }
		$data=array();

		$data['username'] = $_SESSION['ausername'];

		$data['nickname'] = $this->userinfo['nickname'];

		$data['editor']=$editor;

		$data['style'] = $this->load->view('public/style', $data, true);

        $data['top'] = $this->load->view('public/top', $data, true);

        $data['sidebar'] = $this->sidebar($sidebar_num);

        $data['footer'] = $this->load->view('public/footer', $data, true);

        return $data;

	}



	function sidebar($num){

		$data['typenum'] = $num;

		//提取群组和节点

		$infos=$this->admin_model->getGroups();

		//dump($infos);exit;

		$data['sidebar']=$infos;

		return $this->load->view('public/sidebar', $data, true);

	}



	public function create($data=array()) {

        // 如果没有传值默认取POST数据

        if(empty($data)){

            $data    =   $this->input->post();

        }

        // 验证完成生成数据对象

            $vo   =  array();

            foreach ($data as $key=>$name){

                //保证赋值有效

                if(!is_null($name)){

                	if($name!=='do' && $key!='cid1'){

                		$vo[$key] = (MAGIC_QUOTES_GPC && is_string($name))?   stripslashes($name)  :  stripslashes($name);

                	}

                    

                }

            }

        return $vo;

     }



    



     //function log

}

