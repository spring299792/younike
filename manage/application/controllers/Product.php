<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
	public $types;
	function __construct(){
		parent :: __construct();
	}
	public function index()
	{
//		$type=addslashes($type);
//		if(!in_array($type, $this->types)){
//			show_404();
//		}
		//$type=='pro' ? $flag=86:$flag=90;
		$data = $this->_common();
		$data['list']=$this->news_model->getProduct();
		//$data['type']=$type;
		$this->load->view('product/index',$data);
	}

	public function add(){
		//$type=addslashes($this->input->get('type'));
		//$flag=$this->admin_model->getFlag($fid);
		$data = $this->_common();
		//提取分类
		//$data['clist']=$this->news_model->getCategory();
		$data['clist']=$this->db->where('type','pro')->get('category')->result_array();
		//print_r($data['clist']);
		//$data['type']=$type;
		$this->load->view('product/edit',$data);
	}

	public function insert(){
		$id=intval($this->input->post('id',true));
		//文件上传
		$dir = '../data/product/';
		$allowedext=array('gif','jpg','png','pdf');
		$allowedsize=2048000;
		$filenames="";
		if($_FILES['litpic']['name']!=''){
			if($_FILES['litpic']['tmp_name']&& $_FILES['litpic']['size']>0 && $_FILES['litpic']['size']<$allowedsize){
				//获取扩展名
				$filepos=strpos($_FILES['litpic']['name'], ".");//查找出来第一个.出现的地方。以这个点来获取后面的后缀，如果不是.pdf或者.jpg，直接判断为错误，不入库，提示重新上传，为了避免***.jpg.pdf多扩展的文件
				$fileext=substr($_FILES['litpic']['name'],$filepos+1);
				if(in_array($fileext, $allowedext)){
					$num=mt_rand(0,10000);
					$filename=time().$num.".".$fileext;
					if (move_uploaded_file($_FILES['litpic']['tmp_name'], $dir . $filename)) {
						if(!empty($filename)){
							$_POST['litpic']=$filename;
						}
					}
				}	
			}
		}else{
            $_POST['litpic']=addslashes($this->input->post('litpic',true));
        }
        if($_FILES['img']['name']!=''){
            if($_FILES['img']['tmp_name']&& $_FILES['img']['size']>0 && $_FILES['img']['size']<$allowedsize){
                //获取扩展名
                $filepos=strpos($_FILES['img']['name'], ".");//查找出来第一个.出现的地方。以这个点来获取后面的后缀，如果不是.pdf或者.jpg，直接判断为错误，不入库，提示重新上传，为了避免***.jpg.pdf多扩展的文件
                $fileext=substr($_FILES['img']['name'],$filepos+1);
                if(in_array($fileext, $allowedext)){
                    $num=mt_rand(0,10000);
                    $filename=time().$num.".".$fileext;
                    if (move_uploaded_file($_FILES['img']['tmp_name'], $dir . $filename)) {
                        if(!empty($filename)){
                            $_POST['img']=$filename;
                        }
                    }
                }
            }
        }else{
            $_POST['img']=addslashes($this->input->post('img',true));
        }
		// 先处理图片

		if($id>0){
			$cid=intval($_POST['cid']);
			$_POST['cid']=$cid;
			$_POST['pubdate']=time();
			$data=$this->create();
			$this->db->where('id', $id);
			$this->db->update('product',$data);
			$msg="修改成功";
		}else{
			$cid=intval($_POST['cid']);
			$_POST['cid']=$cid;
			$_POST['pubdate']=time();
			$data=$this->create();
			$this->db->insert('product',$data);
			//echo $this->db->last_query();exit;
			$msg="发布成功";
		}
		//$type=addslashes($_POST['type']);
		echo "<script>alert('".$msg."');location.href='".MANAGE_URL.base_url()."Product';</script>";
	}
	public function edit(){
		$id=intval($this->input->get('id',true));
		
		$row=$this->news_model->getproductInfo($id);
		//$type=$row['type'];
		$data = $this->_common();
		//提取分类
		$data['clist']=$this->db->where('type','pro')->get('category')->result_array();
		$data['row']=$row;
		$this->load->view('product/edit',$data);
	}

	public function del(){
		$id=intval($this->input->get('id',true));
		$row=$this->news_model->getproductInfo($id);
		$this->db->delete('product', array('id' => $id)); 
		echo "<script>location.href='".MANAGE_URL.base_url()."Product';</script>";
	}

    /**
     * 服务预约
     */
    public function order(){
        $data = $this->_common();
        $data['list']=$this->news_model->getOrder();
        $this->load->view('product/order',$data);
    }

    public function order_detail($id){
        $id=intval($id);
        $row=$this->news_model->getOrderInfo($id);
        $data = $this->_common();
        $data['row']=$row;
        $this->load->view('product/order_detail',$data);

    }

	public function proimg(){
		$data = $this->_common(105);
		$pid=intval($this->input->get('pid',true));
		$data['pinfo']=$this->db->where('id',$pid)->get('product')->first_row('array');
		if($pid>0){
			$data['list']=$this->db->where('pid',$pid)->get('proimg')->result_array();
		}
		$this->load->view('product/proimg',$data);
	}
	public function imgadd(){	
		$data = $this->_common(105);
		$pid=intval($this->input->get('pid',true));
		$data['row']['pid']=$pid;
		$this->load->view('product/imgedit',$data);
	}

	public function imginsert(){
		$id=intval($this->input->post('id',true));
		//文件上传
		$dir = '../data/product/';
		$allowedext=array('gif','jpg','png','pdf');
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
			$this->db->update('proimg',$data);
			$msg="图片修改成功";
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
			$this->db->insert('proimg',$data);
			$aid=$this->db->insert_id();
			$msg="图片添加成功";
		}
		echo "<script>alert('".$msg."');location.href='".MANAGE_URL.base_url()."product/proimg?pid=".$_POST['pid']."';</script>";
	}
	public function imgedit(){
		$id=intval($this->input->get('id',true));
		
		$row=$this->db->where('id',$id)->get('proimg')->first_row('array');
		$data = $this->_common(105);

		$data['row']=$row;
		$this->load->view('product/imgedit',$data);
	}

	public function imgdel(){
		$id=intval($this->input->get('id',true));
		$row=$this->db->where('id',$id)->get('proimg')->first_row('array');
		$this->db->delete('proimg', array('id' => $id)); 
		echo "<script>location.href='".MANAGE_URL.base_url()."product/proimg?pid=".$row['pid']."';</script>";
	}

	public function cidrela(){
		$fid=intval($this->input->post('fid',true));
		$cid=intval($this->input->post('cid',true));
		$childs=$this->db->where('fid',$fid)->get('category')->result_array();

		if(count($childs)>0){
			$html='<select name="cid1" id="cid1">
              <option value="0" text="选择子目录">选择子目录</option>';
              
			foreach($childs as $key=>$vo){
				$sel="";
				if($cid==$vo['id']){
					$sel="selected='selected'";
				}
				$html.='<option value="'.$vo['id'].'" '.$sel.'>'.$vo['name'].'</option>';
			}
			$html.='</select>';
		}
		echo $html;
	}

}
