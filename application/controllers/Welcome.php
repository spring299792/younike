<?php
date_default_timezone_set('Asia/Shanghai');
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent :: __construct();
		$this->load->model('Index_model','mod');
	}
	/**
	* 公共文件
	*/
	public function _common($type="",$cid=0){
		$data=array();
		$data['type']=$type;
		$data['style'] = $this->load->view('style', $data, true);
		//产品分类
//		if($type=='pro' || $type=='fangan'){
//			$data['cid']=$cid;
//			$flist=$this->db->where('type',$type)->order_by('sort asc,id desc')->get('category')->result_array();
//			$data['clist']=$flist;
//			//print_r($data['clist']);
//		}
		
		
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
		$focus=$this->mod->getFlash('flash');
		$four = $this->mod->getFlash('four',4);
        $data['focus']=$focus;
        $data['four']=$four;

        $pro = $this->arclist(9,0,'product','');
        //echo $this->db->last_query();
        //print_r($pro);
        $data['pros'] = $pro;
		$this->load->view('index',$data);
		
		
	}

	//新闻列表
	function huodong(){
		$data=$this->_common();
        $p=intval($this->input->get('page'));
        //$keywords=addslashes($this->input->get_post('keywords',true));
        if($p==0){
            $p=1;
        }
        $limit=5;
        $offset=$limit*($p-1);
        //查询跟栏目和子栏目的所有id
        $all = $this->arcall('news','active');
        $pages=ceil($all/$limit);
        $prev=$p-1;
        if($p<=1){
            $prev=1;
        }
        $next=$p+1;
        if($p==$pages){
            $next=$pages;
        }
        $list = $this->arclist($limit,$offset,'news','active');
        $data['list']=$list;
        $data['pages']=$pages;
        $data['prev']=$prev;
        $data['next']=$next;
        $data['page']=$p;
        // 活动右侧
        //提取广告
        //提取广告
        $advs = $this->mod->getFlash('adv',1);
        $data['advert'] = $advs[0];
        $data['right'] = $this->load->view('hd_right', $data, true);
		$this->load->view('huodong',$data);
	}

	function arcall($table="news",$type=''){
	    if($type !=''){
	        $this->db->where('type',$type);
        }
		$list=$this->db->get($table)->result_array();
		//echo $this->db->last_query();
		return count($list);
	}

	function arclist($limit=9,$offset=0,$table="news",$type='active',$keywords=""){
        if($type !=''){
            $this->db->where('type',$type);
        }
		if($keywords){
			$list=$this->db->query("select * from you_".$table." where title like %$keywords% and type= '{$type}' order by id desc limit $offset,$limit")->result_array();
		}else{
			$list=$this->db->limit($limit,$offset)->order_by('id desc')->get($table)->result_array();
		}
		
		//echo $this->db->last_query();
		return $list;
	}

	//产品列表
	function fuwu($cid=''){
        $data=$this->_common();
        $p=intval($this->input->get('page'));
        //$keywords=addslashes($this->input->get_post('keywords',true));
        if($p==0){
            $p=1;
        }
        $limit=9;
        $offset=$limit*($p-1);
        //查询跟栏目和子栏目的所有id
        $all = $this->arcall('product',$cid);
        $pages=ceil($all/$limit);
        $prev=$p-1;
        if($p<=1){
            $prev=1;
        }
        $next=$p+1;
        if($p==$pages){
            $next=$pages;
        }
        $list = $this->arclist($limit,$offset,'product',$cid);
        //echo $this->db->last_query();
        $data['list']=$list;
        $data['pages']=$pages;
        $data['prev']=$prev;
        $data['next']=$next;
        $data['page']=$p;
        // 提取分类
        $data['clist'] = $this->arclist(100,0,'category','pro');
        //echo $this->db->last_query();
        $data['cid'] = $cid;
		$this->load->view('fuwu',$data);
	}

    /**
     * 服务详情页
     * @param $id
     */
	public function product($id){
	    $id = intval($id);
	    if($id == 0){
	        show_404();
	        exit;
        }
        $data=$this->_common();
        $info = $this->mod->getProductInfo($id);
        $data['info'] = $info;
        // 提取地区
        $data['clist'] = $this->arclist(100,0,'category','area');
        $this->load->view('fuwu_view',$data);
    }

	//关于我们
	function page($type){
	    // 查询对应英文名称信息
        $info = $this->db->where('name',$type)->get('page')->row_array();
        //print_r($info);
        if(!$info){
            show_404();
            exit;
        }
		$data=$this->_common($type);
        // 查询所有单页列表
        $pages = $this->mod->getPages();
        $data['pages'] = $pages;
        // 用于tab选中
        $data['page_type'] = $type;
        $data['page_nav'] = $this->load->view('page_header',$data,true);

		//处理posi
		$data['info']=$info;

		// 根据类型判断模板形式
        if($info['type'] == 'list'){
            // 查找列表
            $p=intval($this->input->get('page'));
            //$keywords=addslashes($this->input->get_post('keywords',true));
            if($p==0){
                $p=1;
            }
            $limit=10;
            $offset=$limit*($p-1);
            //查询跟栏目和子栏目的所有id
            $all = $this->arcall('news',$info['id']);
            $pages=ceil($all/$limit);
            $prev=$p-1;
            if($p<=1){
                $prev=1;
            }
            $next=$p+1;
            if($p==$pages){
                $next=$pages;
            }
            $list = $this->arclist($limit,$offset,'news',$info['id']);
            $data['list']=$list;
            $data['pages']=$pages;
            $data['prev']=$prev;
            $data['next']=$next;
            $data['page']=$p;
            $this->load->view('page_list',$data);
        }else{
            $this->load->view('page',$data);
        }

	}

	// 新闻内容页
    public function view($id){
	    $id = intval($id);
	    $info = $this->mod->getNewsInfo($id);
	    if(!$info){
            show_404();
            exit;
        }
        $data=$this->_common();
	    $data['info'] = $info;
        // 查找当前栏目上一条和下一条

        $data['next'] = $this->db->query("select * from you_news where type='{$info['type']}' and id<$id order by id desc limit 1")->row_array();
        //echo  $this->db->last_query();
        $data['prev'] = $this->db->query("select * from you_news where type='{$info['type']}' and id>$id order by id asc limit 1")->row_array();
	    if($info['type'] !='active'){
            $page = $this->mod->getPageInfo($info['type']);
            $data['type'] = $page['name'];
            // 查询所有单页列表
            $pages = $this->mod->getPages();
            $data['pages'] = $pages;
            // 用于tab选中
            $data['page_type'] = $data['type'];
            $data['page_nav'] = $this->load->view('page_header',$data,true);

            $data['flag'] = 'news';
            $this->load->view('page',$data);
        }else{
	        //刷新页面，点击+1
            $this->db->query("update you_news set click=click+1 where id=".$id);
	        // 活动详情
            //提取广告
            $advs = $this->mod->getFlash('adv',1);
            $data['advert'] = $advs[0];
            $data['right'] = $this->load->view('hd_right', $data, true);
            $this->load->view('view',$data);
        }

    }


}
