<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;


class Task extends Controller{
  


  public function index($page="",$limit=""){
       
   
        $count = Db::name("task")->count();
        if ($count == 0) {
            $this->assign("none", "none");
        }
        
        if ($this->request->isAjax()) {
            $result =Db::view("task")->view("user","tel","user.userid = task.userid")->page($page,$limit)->order("createtime desc")->select();
            return json([
                'code' => 0,
                'msg' => "",
                "count" => $count,
                "data" => $result
            ]);
        }
        
        return $this->fetch();
    }


}