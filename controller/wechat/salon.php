<?php defined('KING_PATH') or die('访问被拒绝.');
class Salon_Controller extends Public_Controller
{
	// 沙龙列表页面
	public function salonIndex(){
		$data['list'] = M("article")->select()->where("catid=1 and status=1")->orderby("addtime desc")->limit(0,3)->execute();
		$this->template->content = new View('wechat/salon/salonIndex_view',$data);
  	  	$this->template->render();
	}
	// 沙龙详情页面
	public function salonDetail(){
		$id = G("id",'');
		$data['item'] = M("article")->getOneData("id='$id'");
		$this->template->content = new View('wechat/salon/salonDetail_view',$data);
  	  	$this->template->render();
	}
  	// 沙龙报名页面
  	public function enroll(){
      $data['id'] = G("id",'');
  		$this->template->content = new View('wechat/salon/enroll_view',$data);
  	  	$this->template->render();
  	}
  	// 保存预约
  	public function saveEnroll(){
      $data['alid'] = P("alid",'');
  		$data['name'] = P("name",'');
  		$data['mobile'] = P("mobile",'');
  		$data['baby'] = P("baby",'');  		
      $member_id = 0;
  		$re_msg['success'] = 0;
  		$re_msg['msg'] = '预约失败';
  		$flag = true;
  		if(empty($data['name'])){
  			$re_msg['msg'] = '姓名不能为空';
  		}else if(!validate_ext::valiMobile($data['mobile'])){
  			$re_msg['msg'] = '手机号错误';
  		}else{
  			if($data['baby'] == 1){
  				$data['age'] = P("age",'');
  				if(!is_numeric($data['age'])){
  					$flag = false;
  				}
  			}
         $enroll = M("salon_enroll")->getOneData("alid = '".$data['alid']."' and member_id='$member_id'");
         if($enroll){
            $re_msg['msg'] = '您已经预约成功';
            die(json_encode($re_msg));
         }
         $article = M("article")->getOneData("id = '".$data['alid']."' and status=1");
         if($article){
            if(time()<$article->stime){
               if($flag){              
                  if($article->number >= $article->total){
                     $re_msg['msg'] = '预约名额已满';
                     die(json_encode($re_msg));
                  }
                  $data['member_id'] = $member_id;
                  $data['addtime'] = time();
                  $rs = M("salon_enroll")->insert($data);
                  if($rs){
                     $art['number +'] = 1;
                     M("article")->update($art,"id = '".$data['alid']."'");
                     $re_msg['success'] = 1;
                     $re_msg['msg'] = '预约成功';
                  }
               }else{
                  $re_msg['msg'] = '周岁处请填入正确的数值';
               }
            }else if(time()>$article->etime){
               $re_msg['msg'] = '活动已结束';
            }else{
               $re_msg['msg'] = '活动预约已结束';
            } 
         }else{
            $re_msg['msg'] = '活动不存在';
         }	
  		}
  		echo json_encode($re_msg);
  	}
}