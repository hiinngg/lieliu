<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;

/**
 *
 * @author Administrator
 *         父级控制器
 */
class Common extends Controller
{

    public function _initialize()
    {

        
      /*   if (!Session::has("adminuser")) {
//            var_dump($_SESSION);
//            var_dump(session_id());
            return $this->redirect('login/login');

        }else{

            $this->assign("adminuser",Session::get("adminuser"));
        } */
    }
}