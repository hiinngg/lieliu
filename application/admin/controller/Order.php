<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;


class Order extends  Controller{
    
  
   public function orderlist($page="",$limit=""){
       
       $count = Db::name("order")->count();
       if ($count == 0) {
           $this->assign("none", "none");
       }
       
       if ($this->request->isAjax()) {
           $result = Db::view("order")->view("user","tel","user.userid = order.userid")->page($page, $limit)->order("createtime desc")->select();
           
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