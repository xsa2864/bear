<?php defined('KING_PATH') or die('访问被拒绝.');
class Card_Controller extends Public_Controller
{
	// 会员卡列表
	public function cardList()
	{
		$data['list'] = M("item")->select("id,mainPic")->where("catid=1 and status=1")->orderby("addtime desc")->limit(0,3)->execute();
		$this->template->content = new View('wechat/card/cardList_view',$data);
  	  	$this->template->render();
	}
	// 会员卡详情
	public function cardDetail(){
		$id = G("id");
		$data['item'] = M("item")->getOneData("id='$id'");
		$this->template->content = new View('wechat/card/cardDetail_view',$data);
  	  	$this->template->render();
	}
}