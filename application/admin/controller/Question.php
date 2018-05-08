<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;


class Question extends  Controller{

public function index($page="",$limit=""){
       $count = Db::name("question")->count();
        if ($count == 0) {
            $this->assign("none", "none");
        }
       if ($this->request->isAjax()) {
           $result = Db::name("question")->page($page, $limit)->select();
           
           return json([
               'code' => 0,
               'msg' => "",
               "count" => $count,
               "data" => $result
           ]);
       }
     return $this->fetch();
}

public function edit(){



  return $this->fetch();
}

public function save(){
   $post = $this->request->post();
         $data=[
            'ask'=>$post['data']['desc'],
            'question'=>$post['data']['detail'],
            'createtime'=>date("Y-m-d H:i:s")
         ];
         if(Db::name("question")->insert($data)){
          return 1;
         }
}

}
 