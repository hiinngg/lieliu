<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{

    // 首页
    public function index()
    {
       //前6条视频
       $video = Db::name("video")->order("createtime desc")->limit(6)->select();
       //前6条资讯
       $news = Db::name("news")->order("createtime desc")->limit(6)->select();
       //前6条问答
       $question = Db::name("question")->order("createtime desc")->limit(6)->select();

       $this->assign('video',$video);
       $this->assign('news',$news);
       $this->assign('question',$question);
       return $this->fetch();
    }

    // 教程页
    public function tutorial()
    {   

        $video = Db::name("video")->order("createtime desc")->select();
        $this->assign('video',$video);
        return $this->fetch();
    }

    // 产品页
    public function product()
    {
        return $this->fetch();
    }
    // 帮助页
    public function help()
    {
       //前6条问答
       $question = Db::name("question")->order("createtime desc")->limit(6)->select();
       $news = Db::name("news")->order("createtime desc")->select();
       $this->assign('news',$news);
       $this->assign('question',$question);
        return $this->fetch();
    }
    //常见问题
    public function question(){

        $question = Db::name("question")->order("createtime desc")->select();
        $this->assign('question',$question);
        return $this->fetch();
    }

    /*
     资讯内页 
    */
    public function news($id=""){
        if($id==""){
            return $this->fetch('help');
        }
        $res = Db::name("news")->where("newsid",$id)->find();
        $this->assign('res',$res);
        return $this->fetch('detail');
    }
}
