<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{

    // 首页
    public function index()
    {
 
        return $this->fetch();
    }

    // 教程页
    public function tutorial()
    {
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
        return $this->fetch();
    }
}
