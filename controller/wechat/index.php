<?php defined('KING_PATH') or die('访问被拒绝.');
class Index_Controller extends Controller
{
  	// 首页
  	public function index(){
  		// 首页-top
  		$data['headPic'] = M("advert_detail")->getOneData("pid=1");
  		//首页-中间广告位	
  		$data['centerPic'] = M("advert_detail")->getOneData("pid=7");
  		$this->template = new View('wechat/index/index_view',$data);
  	  	$this->template->render();
  	}
}