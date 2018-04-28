<?php
namespace  app\admin\controller;

use think\Controller;
use app\admin\model\Order;

class Order extends  Controller{
    
  
   public function orderlist($page="",$limit=""){
       
       $order = new Order();
       $count = Db::name("param")->count();
       if ($count == 0) {
           $this->assign("none", "none");
       }
       
       if ($this->request->isAjax()) {
           $result = Db::name("param")->page($page, $limit)->select();
           
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