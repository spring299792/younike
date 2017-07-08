<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {
	public $types;
	function __construct(){
		parent :: __construct();
		$this->types=array('xinwen','wenzhang','xiazai','biaozhun','zhaopin');
	}
	public function index($type)
	{

		$type=addslashes($type);
		if(!in_array($type, $this->types)){
			show_404();
		}
		switch($type){
			case 'wenzhang':
				$flag="92";
				break;
			case 'xiazai':
				$flag="93";
				break;
			case 'biaozhun':
				$flag="95";
				break;
			case 'zhaopin':
				$flag="96";
				break;
			default:
				$flag="91";
				break;
		}
		$data = $this->_common($flag);
		$data['list']=$this->news_model->getNews($type);
		$data['type']=$type;
		$this->load->view('news/index',$data);
	}

	public function add(){
		$type=addslashes($this->input->get('type'));
		//$flag=$this->admin_model->getFlag($fid);
		switch($type){
			case 'wenzhang':
				$flag="92";
				break;
			case 'xiazai':
				$flag="93";
				break;
			case 'biaozhun':
				$flag="95";
				break;
			case 'zhaopin':
				$flag="96";
				break;
			default:
				$flag="91";
				break;
		}
		$data = $this->_common($flag);
		$data['type']=$type;
		$this->load->view('news/edit',$data);
	}

	public function insert(){
		$id=intval($this->input->post('id',true));
		//文件上传
		$dir = '../data/news/';
		$allowedext=array('gif','jpg','png','pdf');
		$allowedsize=2048000;
		$filenames="";
		if($id>0){
			//缩略图处理
			// $filename="";
			// if($_FILES['img'] && $_FILES['img']['size']>0 && $_FILES['img']['size']<$allowedsize){
			// 	//获取扩展名
			// 	$filepos=strpos($_FILES['img']['name'], ".");//查找出来第一个.出现的地方。以这个点来获取后面的后缀，如果不是.pdf或者.jpg，直接判断为错误，不入库，提示重新上传，为了避免***.jpg.pdf多扩展的文件
			// 	$fileext=substr($_FILES['img']['name'],$filepos+1);
			// 	if(in_array($fileext, $allowedext)){
			// 		$num=mt_rand(0,10000);
			// 		$filename=time().$num.".".$fileext;
			// 		if (move_uploaded_file($_FILES['img']['tmp_name'], $dir . $filename)) {
			// 			$filenames=$filename;
			// 		}
			// 	}	
			// }else{
			// 	$filename=addslashes($this->input->post('img',true));
			// }
			$_POST['pubdate']=time();
			$data=$this->create();
			// $data=array(
			// 	'title'=>$this->input->post('title',true),
			// 	'short_title'=>$this->input->post('short_title',true),
			// 	'description'=>$this->input->post('description',true),
			// 	'content'=>$this->input->post('content'),
			// 	'img'=>$filename,
			// 	'create_time'=>strtotime($this->input->post('create_time',true)),
			// 	);
			$this->db->where('id', $id);
			$this->db->update('news',$data);
			//echo $this->db->last_query();exit;
			$msg="修改新闻成功";
			// $nrow=$this->news_model->getNewsInfo($id);
			// $cid=$nrow['cid'];
		}else{
			//缩略图处理
			// $filename="";
			// if($_FILES['img'] && $_FILES['img']['size']>0 && $_FILES['img']['size']<$allowedsize){
			// 	//获取扩展名
			// 	$filepos=strpos($_FILES['img']['name'], ".");//查找出来第一个.出现的地方。以这个点来获取后面的后缀，如果不是.pdf或者.jpg，直接判断为错误，不入库，提示重新上传，为了避免***.jpg.pdf多扩展的文件
			// 	$fileext=substr($_FILES['img']['name'],$filepos+1);
			// 	if(in_array($fileext, $allowedext)){
			// 		$num=mt_rand(0,10000);
			// 		$filename=time().$num.".".$fileext;
			// 		if (move_uploaded_file($_FILES['img']['tmp_name'], $dir . $filename)) {
			// 			$filenames=$filename;
			// 		}
			// 	}	
			// }else{
			// 	$filename=addslashes($this->input->post('img',true));
			// }
			// $cid=intval($this->input->post('cid',true));
			// $data=array(
			// 	'title'=>$this->input->post('title',true),
			// 	'short_title'=>$this->input->post('short_title',true),
			// 	'cid'=>$cid,
			// 	'description'=>$this->input->post('description',true),
			// 	'content'=>$this->input->post('content'),
			// 	'img'=>$filename,
			// 	'create_time'=>strtotime($this->input->post('create_time',true)),
			// 	);
			$_POST['pubdate']=time();
			$data=$this->create();
			$this->db->insert('news',$data);
			//echo $this->db->last_query();exit;
			$aid=$this->db->insert_id();
			$msg="新闻发布成功";
		}
		$type=addslashes($this->input->post('type',true));
		echo "<script>alert('".$msg."');location.href='".MANAGE_URL.base_url()."News/".$type."';</script>";
	}
	public function edit(){
		$id=intval($this->input->get('id',true));
		
		$row=$this->news_model->getNewsInfo($id);
		$type=$row['type'];
		switch($type){
			case 'wenzhang':
				$flag="92";
				break;
			case 'xiazai':
				$flag="93";
				break;
			case 'biaozhun':
				$flag="95";
				break;
			case 'zhaopin':
				$flag="96";
				break;
			default:
				$flag="91";
				break;
		}
		$data = $this->_common($flag);

		$data['row']=$row;
		$this->load->view('news/edit',$data);
	}

	public function del(){
		$id=intval($this->input->get('id',true));
		$row=$this->news_model->getNewsInfo($id);
		$this->db->delete('news', array('id' => $id)); 
		echo "<script>location.href='".MANAGE_URL.base_url()."News/".$row['type']."';</script>";
	}

}
