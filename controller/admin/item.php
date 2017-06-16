<?php defined('KING_PATH') or die('访问被拒绝.');
class Item_Controller extends Template_Controller{
    // public function __construct()
    // {
    //     parent::__construct();
    //     comm_ext::validUser();
    //     $this->mod = M('member');
    // }

    // 商品分类页
    public function cateList(){
        $this->template->content = new View('admin/item/itemCategory_view');
        $this->template->render();
    }

    // 获取商品分类列表
    public function getCategory()
    {
       $page = P("page",1);
       $pagesize = P("pagesize",20);
       $snum = ($page-1)*$pagesize;
       $sql = "select * from tf_item_category where status!=-1 order by addtime desc limit ".$snum.",".$pagesize."";
       $result = M()->query($sql);
       // $result = M('advert_position')->where(array('status'=>1))->orderby('addtime desc')->limit($snum,$pagesize)->execute();
       foreach($result as $value)
       {
           $value->addtime = date("Y-m-d H:i:s",$value->addtime);
       }
       
       $data['Rows'] = $result;
       $data['Total'] = M("item_category")->getAllCount();
       echo json_encode($data);
    }
    // 保存分类
    public function saveCategory(){
       $id = P("id",'');
       $data = array();
       $data['cname'] = P("cname");
       $data['status'] = P("status");
       $data['menuID'] = P("menuID");
       $rs = 0;
       if(empty($id)){
          $data['addtime'] = time();
          $rs = M("item_category")->insert($data);
       }else{
          $rs = M("item_category")->update($data,"id=$id");
       }
       menu_ext::toArray($data['menuID'],$id,$data['cname']);
       echo $rs;
    }
    // 删除分类
    public function delCategory(){
       $id = P("id",'');
       $data = array();
       $data['status'] = -1;
       $rs = 0;
       if(!empty($id)){
          $rs = M("item_category")->update($data,"id=$id");
       }
       echo $rs;
    }

    // 添加商品
    public function itemAdd(){
        $id = G("id");
        $data['list'] = '';
        if(!empty($id)){
            $data['list'] = M("item")->getOneData("id=$id");
        }   
        $data['category'] = M("item_category")->where("status=1")->execute();
        $this->template->content = new View('admin/item/itemAdd_view',$data);
        $this->template->render();
    }
    // 保存商品
    public function saveItem(){
        $id = P("id");
        $re_msg['success'] = 0;
        $re_msg['msg'] = '操作失败';

        $data['title']      = P("title");
        $data['subtitle']   = P("subtitle");
        $data['catid']      = P("catid");
        $data['oldprice']   = P("oldprice");
        $data['price']      = P("price");
        $data['shopinfo']   = P("shopinfo");
        $data['store']      = P("store");
        $data['mainPic']    = common_ext::getsimpicurl(P("mainPic"));
        $data['status']     = P("status");        
        $data['content']    = P("content");
        $data['validtime']  = P("validtime");
        $data['usetime']    = P("usetime");
        $rs = 0;
        if(empty($id)){
            $data['title'] = time();
            $rs = M("item")->insert($data);
            if($rs){
                $re_msg['success'] = 1;
                $re_msg['msg'] = '添加成功';
            }
        }else{
            $rs = M("item")->update($data,"id='$id'");
            if($rs){
                $re_msg['success'] = 1;
                $re_msg['msg'] = '更新成功';
            }
        }
        echo json_encode($re_msg);
    }
    // 商品列表页面
    public function itemList(){
        $this->template->content = new View('admin/item/itemList_view',$data);
        $this->template->render();
    }
    // 获取商品列表
    public function getItemList(){
        $page = P("page",1);
        $pagesize = P("pagesize",10);
        $snum = ($page-1)*$pagesize;
        $sql = "SELECT a.id,a.title,a.subtitle,c.cname,a.status,a.price,a.shopinfo,a.addtime FROM tf_item a LEFT JOIN  tf_item_category c ON a.catid=c.id 
             WHERE a.`status`!=-1 order by a.addtime desc limit ".$snum.",".$pagesize."";
        $result = M()->query($sql);
        // $result = M('advert_position')->where(array('status'=>1))->orderby('addtime desc')->  limit($snum,$pagesize)->execute();
        foreach($result as $value)
        {
            $value->addtime = date("Y-m-d H:i:s",$value->addtime);
        }        
        $data['Rows'] = $result;
        $total = M()->query("SELECT count(*) as total FROM tf_item a LEFT JOIN tf_item_category c ON a. catid=c.id WHERE a.`status`!=-1");
        $data['Total'] = $total['0']->total;
        echo json_encode($data);
    }
    // 删除商品
    public function delItem(){
       $id = P("id",'');
       $data = array();
       $data['status'] = -1;
       $rs = 0;
       if(!empty($id)){
          $rs = M("item")->update($data,"id=$id");
       }
       echo $rs;
    }
}
