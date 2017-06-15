<?php defined('KING_PATH') or die('访问被拒绝.');
class Article_Controller extends Template_Controller
{
    private $mod;
    public function __construct()
    {
        parent::__construct();
        // comm_ext::validUser();
        // $this->mod = M('article');
        // $this->did = 9;//文章分类的字典 
    }
    
    // 分类页
    public function artList(){
        $this->template->content = new View('admin/article/artList_view');
        $this->template->render();
    }

    // 获取文章分类列表
    public function getArtlist()
    {
       $page = P("page",1);
       $pagesize = P("pagesize",10);
       $snum = ($page-1)*$pagesize;
       $sql = "select * from tf_article_cat where status!=-1 order by addtime desc limit ".$snum.",".$pagesize."";
       $result = M()->query($sql);
       // $result = M('advert_position')->where(array('status'=>1))->orderby('addtime desc')->limit($snum,$pagesize)->execute();
       foreach($result as $value)
       {
           $value->addtime = date("Y-m-d H:i:s",$value->addtime);
       }
       
       $data['Rows'] = $result;
       $data['Total'] = M("article_cat")->getAllCount();
       echo json_encode($data);
    }
    // 保存分类
    public function saveArticle(){
       $id = P("id",'');
       $data = array();
       $data['catname'] = P("catname");
       $data['status'] = P("status");
       $data['sort'] = P("sort");
       $rs = 0;
       if(empty($id)){
          $data['addtime'] = time();
          $rs = M("article_cat")->insert($data);
       }else{
          $rs = M("article_cat")->update($data,"id=$id");
       }
       echo $rs;
    }
    // 删除分类
    public function delArticle(){
       $id = P("id",'');
       $data = array();
       $data['status'] = -1;
       $rs = 0;
       if(!empty($id)){
          $rs = M("article_cat")->update($data,"id=$id");
       }
       echo $rs;
    }
    // 文章详情
    public function artDetail(){
        $id = G("id",'');
        $data['category'] = M("article_cat")->where("status=1")->execute();
        $data['list'] = ''; 
        if(!empty($id)){
            $data['list'] = M("article")->getOneData("id='$id'");
        }
        $this->template->content = new View('admin/article/artDetail_view',$data);
        $this->template->render();
    }
    // 保存文章
    public function saveArtDetail(){
        $id = P("id");
        $re_msg['success'] = 0;
        $re_msg['msg'] = '操作失败';
        $data['catid'] = P("catid");
        $data['title'] = P("title");
        $data['subtitle'] = P("subtitle");
        $data['thumb'] = common_ext::getsimpicurl(P("thumb",''));
        $data['content'] =  P("content");//htmlspecialchars();
        $data['status'] = P("status");
        $rs = 0;

        if(empty($data['catid'])){
            $re_msg['msg'] = '请选择分类';
            echo json_encode($re_msg);
            exit;
        }
        if(empty($data['title'])){
            $re_msg['msg'] = '标题不能为空';
            echo json_encode($re_msg);
            exit;
        }
        if(empty($id)){
            $rs = M("article")->insert($data);
            if($rs){
                $re_msg['success'] = 1;
                $re_msg['msg'] = '添加成功';
            }
        }else{
            $rs = M("article")->update($data,"id='$id'");
            if($rs){
                $re_msg['success'] = 1;
                $re_msg['msg'] = '更新成功';
            }
        }
        echo json_encode($re_msg);
    }
    // 文章列表页面
    public function contentList(){
        $this->template->content = new View('admin/article/contentList_view');
        $this->template->render();
    }
    // 获取文章列表
    public function getContentList()
    {
       $page = P("page",1);
       $pagesize = P("pagesize",10);
       $snum = ($page-1)*$pagesize;
       $sql = "SELECT a.id,a.title,a.subtitle,c.catname,a.status,a.addtime FROM tf_article a LEFT JOIN tf_article_cat c ON a.catid=c.id 
            WHERE c.`status`=1 and a.`status`!=-1 order by a.addtime desc limit ".$snum.",".$pagesize."";
       $result = M()->query($sql);
       // $result = M('advert_position')->where(array('status'=>1))->orderby('addtime desc')->limit($snum,$pagesize)->execute();
       foreach($result as $value)
       {
           $value->addtime = date("Y-m-d H:i:s",$value->addtime);
       }
       
       $data['Rows'] = $result;
       $total = M()->query("SELECT count(*) as total FROM tf_article a LEFT JOIN tf_article_cat c ON a.catid=c.id WHERE c.`status`=1 and a.`status`!=-1");
       $data['Total'] = $total['0']->total;
       echo json_encode($data);
    }
    // 删除文章
    public function delContent(){
       $id = P("id",'');
       $data = array();
       $data['status'] = -1;
       $rs = 0;
       if(!empty($id)){
          $rs = M("article")->update($data,"id=$id");
       }
       echo $rs;
    }
}

