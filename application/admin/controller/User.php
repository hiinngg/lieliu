<?php
namespace  app\admin\controller;

use think\Controller;

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
     
    
}