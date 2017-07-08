<?
class user_model extends CI_Model
{
	public $uid = 0;

	public function __construct()
	{	
		@session_start();
		parent::__construct();
	}
	public function isLogin()
	{
		if(isset($_SESSION['auid']) && !empty($_SESSION['auid']))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function getUserInfo($uid = "")
	{
		if($uid) $this->uid = $uid;
		$row=$this->db->where('id',$uid)->get('user')->first_row('array');
		//$row = $this->db->query("select * from think_user where id=".$uid)
		//echo $this->db->last_query();
		return $row;
	}

	/**
	* 登录
	*/
	function login($username,$password){
		//$rec = $this->db->query("select id from think_user where account='".$username."' and password='".md5($password)."'")->first_row('array');
		$array = array('account' => $username, 'password' => md5($password));
		$rec=$this->db->where($array)->get('user')->first_row('array'); 
		if($rec && $rec['id'] > 0){
			$_SESSION['auid'] = $rec['id'];
			$this->uid = $rec['id'];
			$_SESSION['ausername'] = $username;
			return 1;
		}
		return 0;
	}

	/**
	* 检查密码是否正确
	*/
	function checkPass($uid,$pass){
		$row=$this->db->where(array('id'=>$uid,'password'=>$pass))->get('user')->first_row('array');
		return $row;
	}
}
?>