<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;

class User extends  Controller{
    


    public function index($page="",$limit=""){
       
   
        $count = Db::name("user")->count();
        if ($count == 0) {
            $this->assign("none", "none");
        }
        
        if ($this->request->isAjax()) {
            $result = Db::name("user")->page($page, $limit)->select();
            
            return json([
                'code' => 0,
                'msg' => "",
                "count" => $count,
                "data" => $result
            ]);
        }
        
        return $this->fetch();
    }
     


    /*
    充值
    */ 
    public function recharge(){
      $post = $this->request->post();
      if(Db::name("user")->where("userid",$post['userid'])->setInc('integrate',$post['integrate'])>=0&&Db::name("order")->insert(['userid'=>$post['userid'],'integrate'=>$post['integrate'],'createtime'=>date("Y-m-d H:i:s"),'status'=>1])){

        return 1;
      }
    }


/*
充值记录
*/
    public function log($page="",$limit="",$userid=""){
       $count = Db::name("order")->count();
        if ($count == 0) {
            $this->assign("none", "none");
        }
        
        if ($this->request->isAjax()) {
            $result = Db::view("order")->view("user","tel","user.userid = order.userid")->where("userid",$userid)->page($page, $limit)->order("createtime desc ")->select();
            
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