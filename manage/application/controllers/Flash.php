<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flash extends MY_Controller {
	public function index($type)
	{
		$data = $this->_common();
		$data['list']=$this->news_model->getFlash($type);
		//echo $this->db->last_query();exit;
		$data['type']=$type;
		$this->load->view('flash/index',$data);
	}

	public function add(){
        $type=addslashes($this->input->get('type'));
		$data = $this->_common();
		$data['type']=$type;
		$this->load->view('flash/edit',$data);
	}

	public function insert(){
		$id=intval($this->input->post('id',true));
		//文件上传
		$dir = '../data/flash/';
		$allowedext=array('gif','jpg','png');
		$allowedsize=2048000;
		$filenames="";
		if($id>0){
			//缩略图处理
			$filename="";
			if($_FILES['img'] && $_FILES['img']['size']>0 && $_FILES['img']['size']<$allowedsize){
				//获取扩展名
				$filepos=strpos($_FILES['img']['name'], ".");//查找出来第一个.出现的地方。以这个点来获取后面的后缀，如果不是.pdf或者.jpg，直接判断为错误，不入库，提示重新上传，为了避免***.jpg.pdf多扩展的文件
				$fileext=substr($_FILES['img']['name'],$filepos+1);
				if(in_array($fileext, $allowedext)){
					$num=mt_rand(0,10000);
					$filename=time().$num.".".$fileext;
					if (move_uploaded_file($_FILES['img']['tmp_name'], $dir . $filename)) {
						$filenames=$filename;
					}
				}	
			}else{
				$filename=addslashes($this->input->post('img',true));
			}
			$_POST['img']=$filename;
			$data=$this->create();
			$this->db->where('id', $id);
			$this->db->update('flash',$data);
			$msg="幻灯修改成功";
		}else{
			//缩略图处理
			$filename="";
			if($_FILES['img'] && $_FILES['img']['size']>0 && $_FILES['img']['size']<$allowedsize){
				//获取扩展名
				$filepos=strpos($_FILES['img']['name'], ".");//查找出来第一个.出现的地方。以这个点来获取后面的后缀，如果不是.pdf或者.jpg，直接判断为错误，不入库，提示重新上传，为了避免***.jpg.pdf多扩展的文件
				$fileext=substr($_FILES['img']['name'],$filepos+1);
				if(in_array($fileext, $allowedext)){
					$num=mt_rand(0,10000);
					$filename=time().$num.".".$fileext;
					if (move_uploaded_file($_FILES['img']['tmp_name'], $dir . $filename)) {
						$filenames=$filename;
					}
				}	
			}else{
				$filename=addslashes($this->input->post('img',true));
			}
			$_POST['img']=$filename;
			$data=$this->create();
			$this->db->insert('flash',$data);
			$aid=$this->db->insert_id();
			$msg="幻灯发布成功";
		}
		$type=addslashes($this->input->post('type'));
		echo "<script>alert('".$msg."');location.href='".MANAGE_URL.base_url()."flash/index/".$type."';</script>";
	}
	public function edit(){
		$id=intval($this->input->get('id',true));
		
		$row=$this->news_model->getflashInfo($id);
		$type=$row['type'];
		$data = $this->_common();
		$data['type']=$type;

		$data['row']=$row;
		$this->load->view('flash/edit',$data);
	}

	public function del(){
		$id=intval($this->input->get('id',true));
		$row=$this->news_model->getflashInfo($id);
		$this->db->delete('flash', array('id' => $id)); 
		echo "<script>location.href='".MANAGE_URL.base_url()."flash/index/".$row['type']."';</script>";
	}

}
