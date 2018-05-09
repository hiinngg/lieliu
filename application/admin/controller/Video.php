<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;


class Video extends  Controller{

public function index($page="",$limit=""){
       $count = Db::name("video")->count();
        if ($count == 0) {
            $this->assign("none", "none");
        }
       if ($this->request->isAjax()) {
           $result = Db::name("video")->page($page, $limit)->select();
           
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
            'name'=>$post['data']['name'],
            'path'=>$post['data']['path'],
            'type'=>1,
            'status'=>1,
            'createtime'=>date("Y-m-d H:i:s")
         ];
         if(Db::name("video")->insert($data)){
          return 1;
         }
}


}
