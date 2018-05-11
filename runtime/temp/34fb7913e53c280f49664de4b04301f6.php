<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"D:\wamp3\wamp64\www\lieliu\public/../application/index\view\index\contact.html";i:1526020225;s:27:"./template/indexlayout.html";i:1526019982;}*/ ?>
<!doctype html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta charset="UTF-8" />

	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<title>三板斧</title>
</head>
<style>
a{
  color:#000 ;
  text-decoration:none !important;
}
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





</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand " href="#"><img src="/static/images/logo.png"></a>
     <ul id="mynav" class="navbar-nav  my-0">
      <li class="nav-item   ">
        <a class="nav-link p-md-4" href="<?php echo url('index'); ?>">首页 <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
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
      <a  style="color:#fff;" class="btn btn-danger mx-0" role="button"  href="<?php echo url('customer/index/index'); ?>"><span class="fa fa-user-o"> </span> 登录</a>
      <a  class="btn btn-outline-danger mx-0" role="button"  href="<?php echo url('customer/index/index'); ?>"><span class="fa fa-edit "></span> 注册</a>
    </div>
  </div>
</nav>



<div class="container">

<h5 class="text-center mb-3">关于本站</h5>
<p>
定位于为传统品牌商家提供电子商务服务，通过专业的技术助力传统品牌商完善电子商务模式，协助商家全方位，多角度的 打通全球电子商务销售链，使其在竞争激烈的电子商务市场有效提升销售收入和品牌价值。
</p>
<p>联系电话：15625365915</p>
<p><img src="/static/images/qrcode.jpg" width="337px"  height="448px" /></p>
</div>
	
	




<footer class="footer text-center text-truncate" >
<ul id="fot" class="list-inline ">
<li class="list-inline-item"><a href="<?php echo url('index/index'); ?>">三板斧</a></li>
<li class="list-inline-item">淘宝引流</li>
<li class="list-inline-item"><a href="<?php echo url('index/tutorial'); ?>">视频教程</a></li>
<li class="list-inline-item"><a href="<?php echo url('index/contact'); ?>">联系我们</a></li>
<li class="list-inline-item"><a href="<?php echo url('index/about'); ?>">关于我们</a></li>
<li class="list-inline-item">电商干货</li>
</ul>

技术支持：中山掌门人网络科技有限公司<a class="text-white" href="http://www.zszmr.com">ZSZMR </a>
</footer>
	
	
	
	
	
	
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
<script src="/static/js/wow.min.js"></script>
<script type="text/javascript">
 new WOW().init();
</script>

</body>
</html>