<?php defined('KING_PATH') or die('访问被拒绝.');
class Member_Controller extends Template_Controller{
    private $mod;
    private $id;
    private $regTime;
    private $purchaseAmount;

    // public function __construct()
    // {
    //     parent::__construct();
    //     comm_ext::validUser();
    //     $this->mod = M('member');
    // }
    // 会员展示列表页
    public function index()
    {
         $this->template->content = new View('admin/member/index_view');
         $this->template->render();
    }

    // 下级会员列表
    public function getMember(){
      $page = P("page",1);
      $pagesize = P("pagesize",30);
      $snum = ($page-1)*$pagesize;

      $where = 1;
      $id = P("id","");
      $mobile = P("mobile","");
      $where = empty($id) ? $where : "id='$id'";
      $where = empty($mobile) ? $where : "mobile='$mobile'";
      //会员列表     
      $sql = "select * from tf_member where $where order by regtime desc limit ".$snum.",".$pagesize."";
      $result = M()->query($sql);      
      // $result = M("member")->where($where)->limit("'$snum','$pagesize'")->execute();
      foreach($result as $value)
      {
          $value->regtime = date("Y-m-d H:i:s",$value->regtime);
      }
      
      $data['Rows'] = $result;
      $data['Total'] = M("member")->getAllCount();
      echo json_encode($data);
    }
}
