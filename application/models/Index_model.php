<?
class Index_model extends CI_Model
{
	public function __construct()
	{	
		parent::__construct();
	}

	/**
	* 获取活动
	*/
	function getNews($type){
		//$rows=$this->db->where('cid',$cid)->get('news')->result_array();
		$rows=$this->db->where('type',$type)->get('news')->result_array();
		return $rows;
	}

	function getNewsInfo($id){
		$row=$this->db->where('id',$id)->get('news')->first_row('array');
		return $row;
	}

	// 幻灯
	function getFlash($type='flash',$limit = ''){
		//$rows=$this->db->get('news')->result_array();
        if($limit != ''){
            $this->db->limit($limit);
        }
		$rows=$this->db->where('type',$type)->order_by('sort','asc')->get('flash')->result_array();
		return $rows;
	}
	function getFlashInfo($id){
		$row=$this->db->where('id',$id)->get('flash')->first_row('array');
		return $row;
	}

	// 单页
    function getPages(){
        $rows=$this->db->order_by('sort','asc')->get('page')->result_array();
        return $rows;
    }

    function getPageInfo($id){
        $row=$this->db->where('id',$id)->get('page')->first_row('array');
        return $row;
    }

    // 服务
    function getProduct(){
        $rows=$this->db->query("select a.*,b.name as cname from you_product a left join you_category b on a.type=b.id order by a.sort asc,a.id desc")->result_array();
        return $rows;
    }
    function getProductInfo($id){
        $rows=$this->db->query("select a.*,b.name as cname from you_product a left join you_category b on a.type=b.id where a.id=$id")->first_row('array');
        return $rows;
    }

	/**
	* 获取分类列表
	*/
	function getCategory($type,$fid=0){
		$rows=$this->db->where('type',$type)->get('category')->result_array();
		if(count($rows)>0){
			foreach($rows as $k=>$v){
					$finfo=$this->getCategoryInfo($v['fid']);
					if(!$finfo){
						$rows[$k]['fname']="顶级分类";
					}else{
						$rows[$k]['fname']=$finfo['name'];
					}
			}
		}
		return $rows;
		
	}

	function getCategorys($ids){
		$infos=$this->db->query("select * from re_category where id in($ids)")->result_array();
		return $infos;
	}

	function getCategoryInfo($id){
		$row=$this->db->where('id',$id)->get('category')->first_row('array');
		return $row;
	}
	
}
?>