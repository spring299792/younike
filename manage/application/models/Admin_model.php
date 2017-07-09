<?
class admin_model extends CI_Model
{
	public function __construct()
	{	
		parent::__construct();
	}

	/**
	* 提取群组和节点
	*/
	function getGroup($pid=1){
		//$rows=$this->db->query("select * from why_power where status=1 and pid=".$pid)->result_array();//群组
		$array = array('status' => 1);
		$rows=$this->db->where($array)->get('group')->result_array(); 
		if($rows && count($rows)>0){
			foreach($rows as $k=>$v){
				if($v['id']>0){
					$rows[$k]['child']=$this->getGroup($v['id']);//递归成功
				}
				
			}
		}
		return $rows;
	}

	function getGroups(){
		//$rows=$this->db->query("select * from why_power where pid=".$pid)//群组
		$rows=$this->db->get('group')->result_array();
		if(!empty($rows)){
			foreach($rows as $k=>$v){
				$rows[$k]['child']=$this->db->where(array('group_id'=>$v['id'],'status'=>1))->order_by('sort','asc')->get('node')->result_array();
			}
		}
		//print_r($rows);
		return $rows;
	}

	function getGroupInfo($id){
		//$row=$this->db->query("select * from why_power where id=".$id)->first_row('array');
		$row=$this->db->where('id',$id)->get('group')->first_row('array');
		return $row;
	}

	/**
	* 根据群组id获取节点列表
	*/
	function getNodes($gid=""){
		$map=array();
		if($gid>0){
			$map=array('group_id'=>$gid);
		}
		$rows=$this->db->where($map)->get('node')->result_array();
		return $rows;
	}

	/**
	* 根据id获取节点详细信息
	*/
	function getNodeInfo($id){
		$row=$this->db->where('id',$id)->get('node')->first_row('array');
		return $row;
	}

	function getPages(){
		$rows=$this->db->order_by('sort','asc')->get('page')->result_array();
		return $rows;
	}

	function getPageInfo($id){
		$row=$this->db->where('id',$id)->get('page')->first_row('array');
		return $row;
	}

	function getFlag($name){
		$row=$this->db->where('title',$name)->get('node')->first_row('array');
		$flag=$row['id'];
		return $flag;
	}
	
}
?>