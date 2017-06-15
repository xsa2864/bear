<?php defined('KING_PATH') or die('访问被拒绝.');
class Public_Controller extends Controller
{
   public $template;
   public function __construct()
   {	
       	parent::__construct();
       	$footer = M("advert_position p")->select("d.pics")->join("advert_detail d","p.id=d.pid")->where("p.id=7")->execute();
  		$data['footer'] = '';
  		if(!empty($footer[0]->pics)){
  			$data['footer'] = json_decode($footer[0]->pics);
  		}
       $this->template = new View('index/public_view',$data);
   }
}
