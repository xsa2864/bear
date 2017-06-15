<?php defined('KING_PATH') or die('访问被拒绝.');
class Index_Controller extends Controller
{
   // 首页
   public function index(){
     $this->template = new View('admin/index/index_view');
     $this->template->render();
   }
   // 欢迎页面
   public function welcome(){
      $this->template = new View('admin/index/welcome_view');
      $this->template->render();
   }
}