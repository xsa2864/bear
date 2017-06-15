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
      $asset = M("article")->select("id,thumb,title,subtitle")->where("status=1 and catid=5")->orderby("addtime desc")->limit(0,1)->execute();
      foreach ($asset as $key => $value) {
         $title_len = mb_strlen($value->title,'utf-8');
         $value->title = $title_len>26 ? mb_substr($value->title, 0,26,'utf-8').'...':$value->title;
         $subtitle_len = mb_strlen($value->subtitle,'utf-8');
         $value->subtitle = $subtitle_len>92 ? mb_substr($value->subtitle, 0,92,'utf-8').'...':$value->subtitle;
      }
      $data['asset'] = $asset[0];

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
    	$this->template->content = new View('index/index/wisdom_view',$data);
  	  	$this->template->render();
    }
    // 精品课程
    public function subject(){
    	$this->template->content = new View('index/index/subject_view',$data);
  	  	$this->template->render();
    }
    // 精品课程
    public function activity(){
    	$this->template->content = new View('index/index/activity_view',$data);
  	  	$this->template->render();
    }
    // 文章详情
    public function detail(){
      $id = G("id");
      $result = M("article a")->select("a.title,a.subtitle,a.content,c.catname,a.addtime")->join("article_cat c","c.id=a.catid")->where("a.id='$id'")->limit(0,1)->execute();
      $data['content'] = $result[0];
      $this->template->content = new View('index/index/detail_view',$data);
      $this->template->render();
    }
}