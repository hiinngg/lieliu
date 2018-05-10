<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\wamp\www\lieliu\public/../application/index\view\index\product.html";i:1524997993;s:27:"./template/indexlayout.html";i:1524997993;}*/ ?>
<!doctype html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta charset="UTF-8" />

	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<title>三板斧</title>
</head>
<style>
#mynav .nav-item a:hover,.active>a{
	background:#d9363a;
	color:#fff !important;
}
#fot>li{
	 text-align:center;
	 padding: 0 0.75rem;
}
#fot>li:not(:last-child){
	
 	border-right:1px solid #d2d5e4;
}
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px !important;
}
.footer {
	font-size:12px;
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
 /*  line-height: 60px; */ /* Vertically center the text there */
}


.rline{
width:200px;
height:1px;
 background: -webkit-linear-gradient(left, #d9363a ,#fff); /* Safari 5.1 - 6.0 */
  background: -o-linear-gradient(right, #d9363a, #fff); /* Opera 11.1 - 12.0 */
  background: -moz-linear-gradient(right, #d9363a, #fff); /* Firefox 3.6 - 15 */
  background: linear-gradient(to right, #d9363a , #fff); /* 标准的语法 */
}
.lline{

width:200px;
height:1px;
 background: -webkit-linear-gradient(right, #d9363a ,#fff); /* Safari 5.1 - 6.0 */
  background: -o-linear-gradient(left, #d9363a, #fff); /* Opera 11.1 - 12.0 */
  background: -moz-linear-gradient(left, #d9363a, #fff); /* Firefox 3.6 - 15 */
  background: linear-gradient(to left, #d9363a , #fff); /* 标准的语法 */

}
.line{

width:100%;
height:1px;
 background: -webkit-radial-gradient(#b9e1e8 50%, #fff); /* Safari 5.1 - 6.0 */
  background: -o-radial-gradient(#b9e1e8 50%, #fff); /* Opera 11.6 - 12.0 */
  background: -moz-radial-gradient(#b9e1e8 50%, #fff); /* Firefox 3.6 - 15 */
  background: radial-gradient(#b9e1e8 50%, #fff); /* 标准的语法 */

}
.ptext{
padding-left:58px;
}


</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand " href="#">LOGO</a>
     <ul id="mynav" class="navbar-nav  my-0">
      <li class="nav-item   ">
        <a class="nav-link p-md-4" href="<?php echo url('index'); ?>">首页 <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link p-md-4" href="<?php echo url('product'); ?>">产品</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link p-md-4" href="<?php echo url('customer/index/index'); ?>">充值</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link p-md-4" href="<?php echo url('tutorial'); ?>">教程</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link p-md-4" href="<?php echo url('help'); ?>">帮助</a>
      </li>
    </ul>
    <div>
      <button type="button" class="btn btn-danger mx-0"><span class="fa fa-user-o"> </span> 登录</button>
      <button type="button" class="btn btn-outline-danger mx-0"><span class="fa fa-edit "></span> 注册</button>
    </div>
  </div>
</nav>



<div style="width:100%;height:500px;">
<img src="/static/images/banner2.png" style="width:100%;max-height:100%;" alt="" />
</div>

<div class="container">
<div class="banner mb-3">
<img src="/static/images/before.png" alt="" />
</div>
<div class="banner">
<img src="/static/images/after.png" alt="" />
</div>

<div class=" mt-4 text-center d-flex justify-content-center align-items-center"> 
	<div class="lline"></div>
	<h3>三板斧产品功能简介</h3>
	<div class="rline"></div>	
</div>

<div>
<div class="media" >
  <img class=" mr-3" src="/static/images/p1.png" alt="Generic placeholder image">
  <div class="media-body align-self-center">
     <dl>
      <dt ><img class="mr-2" src="/static/images/p1-1.png" alt="" />免费注册，永久使用</dt>
      <dd class="ptext">新用户注册即送1000积分 </dd>
      <dd class="ptext">系统每日免费赠送积分</dd>
     </dl>
  </div>
</div>
<div class="line"></div>
<div class="media" >
  <div class="media-body align-self-center">
     <dl>
      <dt ><img class="mr-2" src="/static/images/p1-2.png" alt="" />发布真实流量任务</dt>
      <dd class="ptext">完全人工搜索游览、安全、稳定、快速 </dd>
      <dd class="ptext">支持发布多种流量类型</dd>
     </dl>
  </div>
   <img class=" ml-3" src="/static/images/p2.png" alt="Generic placeholder image">
</div>
<div class="line"></div>
<div class="media" >
 <img class=" mr-3" src="/static/images/p3.png" alt="Generic placeholder image">
  <div class="media-body align-self-center">
     <dl>
      <dt ><img class="mr-2" src="/static/images/p1-3.png" alt="" />精确控制任务执行</dt>
      <dd class="ptext">自由设定每日访客数、停留时间 </dd>
      <dd class="ptext">每个小时访客数等 </dd>
     </dl>
  </div>
  
</div>
<div class="line"></div>

<div class="media" >
  <div class="media-body align-self-center">
     <dl>
      <dt ><img class="mr-2" src="/static/images/p1-4.png" alt="" />自定义发布方案</dt>
      <dd class="ptext">自动保存发布方案，每日一键批量发布</dd>
     </dl>
  </div>
   <img class=" ml-3" src="/static/images/p4.png" alt="Generic placeholder image">
</div>
<div class="line"></div>
<div class="media" >
 <img class=" mr-3" src="/static/images/p5.png" alt="Generic placeholder image">
  <div class="media-body align-self-center">
     <dl>
      <dt ><img class="mr-2" src="/static/images/p1-5.png" alt="" />全面分析店铺流量</dt>
      <dd class="ptext">支持淘宝官方生意参谋 </dd>
      <dd class="ptext">流量分析一目了然 </dd>
     </dl>
  </div>
  
</div>
<div class="line"></div>
<div class="media" >
  <div class="media-body align-self-center">
     <dl>
      <dt ><img class="mr-2" src="/static/images/p1-6.png" alt="" />代理三板斧推广系统</dt>
      <dd class="ptext">加入代理三板斧系统，获取高额推广佣金 </dd>
     </dl>
  </div>
   <img class=" ml-3" src="/static/images/p6.png" alt="Generic placeholder image">
</div>
</div>



</div>
	
	




<footer class="footer text-center text-truncate" >
<ul id="fot" class="list-inline ">
<li class="list-inline-item">三板斧</li>
<li class="list-inline-item">淘宝引流</li>
<li class="list-inline-item">视频教程</li>
<li class="list-inline-item">联系我们</li>
<li class="list-inline-item">友情链接</li>
<li class="list-inline-item">关于我们</li>
<li class="list-inline-item">网站地图</li>
<li class="list-inline-item">诚招代理</li>
<li class="list-inline-item">微商科员</li>
</ul>

技术支持：中山掌门人网络科技有限公司<a class="text-white" href="http://www.zszmr.com">ZSZMR </a>
</footer>
	
	
	
	
	
	
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
</body>
</html>