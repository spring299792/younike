<?php
date_default_timezone_set('Asia/Shanghai');
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent :: __construct();
	}
	/**
	* 公共文件
	*/
	public function _common($type="",$cid=0){
		$data=array();
		$data['type']=$type;
		$data['style'] = $this->load->view('style', $data, true);
		//产品分类
		if($type=='pro' || $type=='fangan'){
			$data['cid']=$cid;
			$flist=$this->db->where('type',$type)->order_by('sort asc,id desc')->get('category')->result_array();
			$data['clist']=$flist;
			//print_r($data['clist']);
		}
		
		
        $data['header'] = $this->load->view('header', $data, true);

        $data['left'] = $this->load->view('left', $data, true);
        $data['footer'] = $this->load->view('footer', $data, true);
        return $data;
	}

	function locked(){
		if($_POST['pass']=="locked"){
			$_SESSION['lock']='locked';
			header("Location:/");
		}else{
			echo "<script>alert('密码错误，请联系管理员');history.back();</script>";
		}
	}

	public function index()
	{
		$data = $this->_common();
		$focus=$this->db->order_by('sort asc')->get('flash')->result_array();
        //处理类型  1flash 2单图广告 3推荐产品
        $fd=array();
        if(!empty($focus)){
            foreach($focus as $key=>$vo){
                $fd[$vo['pid']][]=$vo;
            }
        }
        $data['focus']=$fd;
		$this->load->view('index',$data);
		
		
	}

	//新闻列表
	function news(){
		$data=$this->_common('news');
		$p=intval($this->input->get('page'));
		if($p==0){
			$p=1;
		}
		$limit=8;
		$offset=$limit*($p-1);
		$all=$this->arcall();
		$pages=ceil($all/$limit);
		$prev=$p-1;
		if($p<=1){
			$prev=1;
		}
		$next=$p+1;
		if($p==$pages){
			$next=$pages;
		}
		
		$data['list']=$this->arclist($limit,$offset);
		$data['pages']=$pages;
		$data['prev']=$prev;
		$data['next']=$next;
		$data['type']='news';
		$data['page']=$p;
		$data['title']='新闻';
		$data['typename']='新闻';
		$data['posi']='新闻';
		$this->load->view('txtlist',$data);
	}

	function arcall($table="news"){
		$list=$this->db->get($table)->result_array();
		//echo $this->db->last_query();
		return count($list);
	}

	function arclist($limit=9,$offset=0,$table="news",$keywords=""){
		if($keywords){
			$list=$this->db->query("select * from think_".$table." where title like %$keywords% order by id desc limit $offset,$limit")->result_array();
		}else{
			$list=$this->db->limit($limit,$offset)->order_by('id desc')->get($table)->result_array();
		}
		
		//echo $this->db->last_query();
		return $list;
	}

	//产品列表
	function product($cid){
		
		$p=intval($this->input->get('page'));
		$cid=intval($cid);
		//查询父级信息
		$cinfo=$this->db->where('id',$cid)->get('category')->first_row('array');
		if($cinfo['fid']==0){
			$data['fid']=$cid;
		}else{
			$data['fid']=$cinfo['fid'];
		}
		$data=$this->_common('pro',$cid);
		//$keywords=addslashes($this->input->get_post('keywords',true));
		if($p==0){
			$p=1;
		}
		$limit=12;
		$offset=$limit*($p-1);
		//查询跟栏目和子栏目的所有id
		if($cid>0){
			//$all=$this->db->where('cid',$cid)->get('product')->result_array();
			$all=$this->db->query("select * from think_product where cid = $cid")->result_array();
		}else{
			$all=$this->db->get('product')->result_array();
		}
		$all=count($all);
		$pages=ceil($all/$limit);
		$prev=$p-1;
		if($p<=1){
			$prev=1;
		}
		$next=$p+1;
		if($p==$pages){
			$next=$pages;
		}
		if($cid>0){
			$list=$this->db->query("select * from think_product where cid =$cid order by sort asc,id desc limit $offset,$limit")->result_array();
		}else{
			$list=$this->db->limit($limit,$offset)->order_by('id','desc')->get('product')->result_array();
		}
		$data['list']=$list;
		$data['pages']=$pages;
		$data['prev']=$prev;
		$data['next']=$next;
		$data['type']='product';
		$data['page']=$p;
		//$data['keywords']=$keywords;
		$data['cid']=$cid;
		$data['title']='产品与服务';
		$data['typename']='产品与服务';
		$data['posi']='产品与服务';
		$this->load->view('imglist',$data);
	}

	//解决方案
	function fangan($cid){
		
		$p=intval($this->input->get('page'));
		$cid=intval($cid);
		//查询父级信息
		$cinfo=$this->db->where('id',$cid)->get('category')->first_row('array');
		if($cinfo['fid']==0){
			$data['fid']=$cid;
		}else{
			$data['fid']=$cinfo['fid'];
		}
		$data=$this->_common('fangan',$cid);
		//$keywords=addslashes($this->input->get_post('keywords',true));
		if($p==0){
			$p=1;
		}
		$limit=12;
		$offset=$limit*($p-1);
		//查询跟栏目和子栏目的所有id
		if($cid>0){
			//$all=$this->db->where('cid',$cid)->get('product')->result_array();
			$all=$this->db->query("select * from think_product where cid = $cid")->result_array();
		}else{
			$all=$this->db->get('product')->result_array();
		}
		$all=count($all);
		$pages=ceil($all/$limit);
		$prev=$p-1;
		if($p<=1){
			$prev=1;
		}
		$next=$p+1;
		if($p==$pages){
			$next=$pages;
		}
		if($cid>0){
			$list=$this->db->query("select * from think_product where cid =$cid order by sort asc,id desc limit $offset,$limit")->result_array();
		}else{
			$list=$this->db->limit($limit,$offset)->order_by('id','desc')->get('product')->result_array();
		}
		$data['list']=$list;
		$data['pages']=$pages;
		$data['prev']=$prev;
		$data['next']=$next;
		$data['type']='fangan';
		$data['page']=$p;
		//$data['keywords']=$keywords;
		$data['cid']=$cid;
		$data['title']='解决方案';
		$data['typename']='解决方案';
		$data['posi']='解决方案';
		$this->load->view('imglist',$data);
	}

	function getSonId($cid){
		$ids=$cid;
		$rows=$this->db->where('fid',$cid)->get('category')->result_array();
		if($rows && count($rows)>0){
			foreach($rows as $v){
				$ids.=",".$v['id'];
			}
		}
		return $ids;
	}

	
	function view($id){
		$id=intval($id);
		if($id>0){
			$data=$this->_common('news');
			$data['vo']=$this->db->where('id',$id)->get('news')->first_row('array');
			$data['title']=$data['vo']['name'];
			$data['typename']='<a href="'.WEB_URL.base_url().'news">新闻</a> &gt; <a href="'.WEB_URL.base_url().'news/view/'.$data['vo']['id'].'"></a> &gt; '.substr($data['vo']['name'],0,95);
			$data['posi']=$data['typename'];
			$this->load->view('content',$data);
		}else{
			show_404();
		}
	}

	function pview($id){
		$id=intval($id);
		if($id>0){
			$vo=$this->db->where('id',$id)->get('product')->first_row('array');
			$data=$this->_common($vo['type'],$vo['cid']);
			$data['vo']=$vo;
			$data['title']=$data['vo']['name'];
			$type=$data['vo']['type'];
			if($type == 'pro'){
				$type = 'product';
			}
			$type=='product' ? $typename="产品与服务" : $typename="解决方案";
			$data['typename']=$data['vo']['name'];
			$data['posi']='<a href="'.WEB_URL.base_url().$type.'">'.$typename.'</a> <a href="'.WEB_URL.base_url().$type.'/view/'.$data['vo']['id'].'"></a> &gt; '.$data['vo']['name'];
			$this->load->view('content',$data);
		}else{
			show_404();
		}
	}

	//关于我们
	function page($type){
		$types=array('about','contact','zhaopin','zizhi');
		$typenames=array('about'=>'关于我们','contact'=>'联系我们','zhaopin'=>'招聘信息','zizhi'=>'公司资质');
        if(!in_array($type, $types)){
            $type="about";
        }
		$data=$this->_common($type);
		$vo=$this->db->where('type',$type)->get('contact')->row_array();
		//echo $this->db->last_query();
		$typename=$typenames[$type];
		//处理posi
        $posi="";
		$data['vo']=$vo;
		$data['typename']=$typename;
		$data['posi']=$typename;
		$this->load->view('content',$data);
	}

	//联系我们
	function contact(){
		$data=$this->_common('contact');
		$data['title']="Contact Us";
		$data['typename']="Contact Us";
		$data['vo']=$this->db->where('id',3)->get('contact')->first_row('array');
		$this->load->view('content',$data);
	}

}
