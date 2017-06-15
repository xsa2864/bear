<?php defined('KING_PATH') or die('访问被拒绝.');
class Template_Controller extends Controller
{
   public $template;
   public function __construct()
   {	
       parent::__construct();
       $this->template = new View('template_view');
   }
}
