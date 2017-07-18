<?
class news_model extends CI_Model
{
	public $table;
	public function __construct()
	{	
		parent::__construct();
		$this->table="think_news";
	}

	/**
	* 获取新闻列表
	*/
	function getNews($type){
		//$rows=$this->db->where('cid',$cid)->get('news')->result_array();
		$rows=$this->db->where('type',$type)->get('news')->result_array();
		return $rows;
	}

	/**
	* 根据id获取职位详细信息
	*/
	function getNewsInfo($id){
		$row=$this->db->where('id',$id)->get('news')->first_row('array');
		return $row;
	}

	function getFlash($type='flash'){
		//$rows=$this->db->get('news')->result_array();
		$rows=$this->db->where('type',$type)->order_by('sort','asc')->get('flash')->result_array();
		return $rows;
	}
	function getFlashInfo($id){
		$row=$this->db->where('id',$id)->get('flash')->first_row('array');
		return $row;
	}
	function getProduct($type){
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

    function getOrder($type){
        $rows=$this->db->query("select a.*,b.name as pname,b.price from you_order a left join you_product b on a.pid=b.id order by a.id desc")->result_array();
        return $rows;
    }
    function getOrderInfo($id){
        $rows=$this->db->query("select a.*,b.name as pname,b.price from you_order a left join you_product b on a.pid=b.id where a.id=$id")->first_row('array');
        return $rows;
    }
	
}
?>