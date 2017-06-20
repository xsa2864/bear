<?php defined('KING_PATH') or die('访问被拒绝.');
class Index_Controller extends Public_Controller
{
  	// 首页
  	public function index(){
      // 首页轮播
  		$result = M("advert_position p")->select("d.pics")->join("advert_detail d","p.id=d.pid")->where("p.id=6")->execute();
  		$data['pics'] = '';
  		if(!empty($result[0]->pics)){
  			$data['pics'] = json_decode($result[0]->pics);
  		}  		
      // 课程展示
  		$subject = M("advert_position p")->select("d.pics")->join("advert_detail d","p.id=d.pid")->where("p.id=1")->execute();
  		$data['subject'] = '';
  		if(!empty($subject[0]->pics)){
  			$data['subject'] = json_decode($subject[0]->pics);
  		}  
      // 为您推荐
  		$recommend = M("advert_position p")->select("d.pics")->join("advert_detail d","p.id=d.pid")->where("p.id=9")->execute();
  		$data['recommend'] = '';
  		if(!empty($recommend[0]->pics)){
  			$data['recommend'] = json_decode($recommend[0]->pics);
  			
  		}
      // 智慧学院     
      $school = M("article")->select("id,thumb,subtitle")->where("status=1 and catid=13")->orderby("addtime desc")->limit(0,1)->execute();
      foreach ($school as $key => $value) {        
         $subtitle_len = mb_strlen($value->subtitle,'utf-8');
         $value->subtitle = $subtitle_len>52 ? mb_substr($value->subtitle, 0,52,'utf-8').'...':$value->subtitle;
      }
      $data['school'] = $school[0];
      // 二维码
		  $qrcode = M("advert_position p")->select("d.pics")->join("advert_detail d","p.id=d.pid")->where("p.id=8")->execute();
  		$data['qrcode'] = '';
  		if(!empty($qrcode[0]->pics)){
  			$data['qrcode'] = json_decode($qrcode[0]->pics);
  			
  		}  		  
      // 新闻资讯公告
      $news = M("article")->select("id,title,subtitle")->where("status=1 and catid=1")->orderby("addtime desc")->limit(0,3)->execute();
      foreach ($news as $key => $value) {
         $title_len = mb_strlen($value->title,'utf-8');
         $value->title = $title_len>26 ? mb_substr($value->title, 0,26,'utf-8').'...':$value->title;
         $subtitle_len = mb_strlen($value->subtitle,'utf-8');
         $value->subtitle = $subtitle_len>52 ? mb_substr($value->subtitle, 0,52,'utf-8').'...':$value->subtitle;
      }
      $data['news'] = $news;
      // 资产管理
      $asset = M("article")->select("id,thumb,title,subtitle,content")->where("status=1 and catid=5")->orderby("addtime desc")->limit(0,1)->execute();
      foreach ($asset as $key => $value) {
         $title_len = mb_strlen($value->title,'utf-8');
         $value->title = $title_len>26 ? mb_substr($value->title, 0,26,'utf-8').'...':$value->title;
         $subtitle_len = mb_strlen($value->subtitle,'utf-8');
         $value->subtitle = $subtitle_len>92 ? mb_substr($value->subtitle, 0,92,'utf-8').'...':$value->subtitle;
         $content_len = mb_strlen($value->content,'utf-8');
         $value->content = $content_len>92 ? mb_substr($value->content, 0,92,'utf-8').'...':$value->content;
      }
      $data['asset'] = $asset[0];
      // 课程列表
       $subject = M("item")->select("id,title,subtitle")->where("status=1")->orderby("addtime desc")->limit(0,5)->execute();
      foreach ($subject as $key => $value) {
         $title_len = mb_strlen($value->title,'utf-8');
         $value->title = $title_len>26 ? mb_substr($value->title, 0,26,'utf-8').'...':$value->title;
         $subtitle_len = mb_strlen($value->subtitle,'utf-8');
         $value->subtitle = $subtitle_len>52 ? mb_substr($value->subtitle, 0,52,'utf-8').'...':$value->subtitle;
      }
      $data['subjects'] = $subject;
      // 导师介绍
      $data['teacher'] = M("article")->where("status=1 and catid=7")->orderby("addtime desc")->limit(0,3)->execute();

      // 移动社交
      $move = M("article")->select("id,thumb,title,subtitle,addtime")->where("status=1 and catid=6")->orderby("addtime desc")->limit(0,5)->execute();
      foreach ($move as $key => $value) {
         $title_len = mb_strlen($value->title,'utf-8');
         if($key==0){            
            $value->title = $title_len>26 ? mb_substr($value->title, 0,26,'utf-8').'...':$value->title;
            $subtitle_len = mb_strlen($value->subtitle,'utf-8');
            $value->subtitle = $subtitle_len>52 ? mb_substr($value->subtitle, 0,52,'utf-8').'...':$value->subtitle;
         }else{
            $value->title = $title_len>18 ? mb_substr($value->title, 0,18,'utf-8').'...':$value->title;
         }         
         $value->addtime = date("Y-m-d H:i:s",$value->addtime);
      }
      $data['move'] = $move;

  	  	$this->template->content = new View('index/index/index_view',$data);
  	  	$this->template->render();
  	}
    
    // 众合智慧
    public function wisdom(){
      $type = G("type",$this->category);

      $total = M("item")->getAllCount("catid='$type' and status=1");
      $data['pagination'] = pagination::getClass(array(
            'total'     => $total,
            'perPage'      => 10,
            'segment'      => 'page',
            ));
      $start    = ($data['pagination']->currentPage-1)*10;
      $result = M("item")->select()->where("catid='$type'  and status=1")->orderby("addtime desc")->limit($start,10)->execute();
      foreach ($result as $key => $value) {
         $title_len = mb_strlen($value->title,'utf-8');
         $value->title = $title_len>22 ? mb_substr($value->title, 0,22,'utf-8').'...':$value->title;
         $subtitle_len = mb_strlen($value->subtitle,'utf-8');
         $value->subtitle = $subtitle_len>92 ? mb_substr($value->subtitle, 0,92,'utf-8').'...':$value->subtitle;
         $value->addtime = date("Y-m-d H:i:s",$value->addtime);
      }
      $data['list'] = $result;    
      $data['parent_name'] = $this->parent_name;
      $data['child_name'] = $this->child_name;
    	$this->template->content = new View('index/index/wisdom_view',$data);
  	  	$this->template->render();
    }
    // 精品课程
    public function subject(){
      $id = G("id");
      $result = M("item")->getOneData("id='$id'");
      $data['list'] = $result;
      $data['parent_name'] = $this->parent_name;
      $data['child_name'] = $this->child_name;
    	$this->template->content = new View('index/index/subject_view',$data);
  	  	$this->template->render();
    }
    // 精品课程
    public function activity(){
      $type = G("type",$this->category);

      $total = M("article")->getAllCount("catid='$type' and status=1");
      $data['pagination'] = pagination::getClass(array(
            'total'     => $total,
            'perPage'      => 5,
            'segment'      => 'page',
            ));
      $start    = ($data['pagination']->currentPage-1)*5;
      $result = M("article")->select()->where("catid='$type'  and status=1")->orderby("addtime desc")->limit($start,5)->execute();
      foreach ($result as $key => $value) {
         $title_len = mb_strlen($value->title,'utf-8');
         $value->title = $title_len>26 ? mb_substr($value->title, 0,26,'utf-8').'...':$value->title;
         $subtitle_len = mb_strlen($value->subtitle,'utf-8');
         $value->subtitle = $subtitle_len>92 ? mb_substr($value->subtitle, 0,92,'utf-8').'...':$value->subtitle;
         $value->addtime = date("Y-m-d H:i:s",$value->addtime);
      }
      $data['list'] = $result;
      $data['parent_name'] = $this->parent_name;
      $data['child_name'] = $this->child_name;
    	$this->template->content = new View('index/index/activity_view',$data);
  	  	$this->template->render();
    }
    // 精品课程
    public function search(){
      $keyword = G("keyword",'');

      $total = M("article")->getAllCount("title like '%$keyword%' and status=1");
      $data['pagination'] = pagination::getClass(array(
            'total'     => $total,
            'perPage'      => 5,
            'segment'      => 'page',
            ));
      $start    = ($data['pagination']->currentPage-1)*5;
      $result = M("article")->select()->where("title like '%$keyword%'  and status=1")->orderby("addtime desc")->limit($start,5)->execute();
      foreach ($result as $key => $value) {
         $title_len = mb_strlen($value->title,'utf-8');
         $value->title = $title_len>26 ? mb_substr($value->title, 0,26,'utf-8').'...':$value->title;
         $subtitle_len = mb_strlen($value->subtitle,'utf-8');
         $value->subtitle = $subtitle_len>92 ? mb_substr($value->subtitle, 0,92,'utf-8').'...':$value->subtitle;
         $value->addtime = date("Y-m-d H:i:s",$value->addtime);
      }
      $data['list'] = $result;
      $data['parent_name'] = '搜索结果';
      $data['child_name'] = $keyword;
      $this->template->content = new View('index/index/activity_view',$data);
      $this->template->render();
    }
    // 文章详情
    public function detail(){
      $id = G("id");
      $result = M("article a")->select("a.title,a.subtitle,a.content,c.catname,a.addtime,a.catid")->join("article_cat c","c.id=a.catid")->where("a.id='$id'")->limit(0,1)->execute();
      $data['content'] = $result[0];
      $data['parent_name'] = empty($this->parent_name)?$data['content']->catname:$this->parent_name;
      $data['child_name'] = empty($this->child_name)?$data['content']->title:$this->child_name;
      // $menu = M("index_menu")->execute();
      // $sort = '';
      // foreach ($menu as $key => $value) {
      //    if(!empty($value->child_menu)){
      //       $arr = json_decode($value->child_menu,1);
      //       if(in_array($data['content']['catid'], $arr)){
      //          $sort = $value->sort;
      //       }
      //    }else{
      //       $sort = 5;
      //    }
      // }
      $this->template->content = new View('index/index/detail_view',$data);
      $this->template->render();
    }

    // 留言页面
    public function writeMsg(){
      $this->template->content = new View('index/index/message_view',$data);
      $this->template->render();
    }
    // 保存留言
    public function saveMsg(){
         $content = P("content",'');
         $email = P("email",'');
         $re_msg['success'] = 0;
         $re_msg['msg'] = '操作失败';
         $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
         if(mb_strlen($content)>360){
            $re_msg['msg'] = '内容不能超过120个字';
            echo json_encode($re_msg);
            exit;
         }
         if (preg_match( $pattern, $email)){
            $data['content'] = $content;
            $data['email'] = $email;
            $stime = strtotime(date("Y-m-d",time()));
            $etime = strtotime("+1 day",$stime);
            $result = M("leaving_msg")->getAllCount("email='$email' and addtime>='$stime' and addtime<'$etime'");
            if($result<2){
               $data['addtime'] = time();
               $rs = M("leaving_msg")->insert($data);
               if($rs){
                  $re_msg['msg'] = '留言成功';
               }else{
                  $re_msg['msg'] = '留言失败';
               }               
            }else{
               $re_msg['msg'] = '当天留言不能超过两条';
            }            
         }else{
            $re_msg['msg'] = '邮箱格式错误';
         }
         echo json_encode($re_msg);
    }
}