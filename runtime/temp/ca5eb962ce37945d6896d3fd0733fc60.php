<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"D:\wamp3\wamp64\www\lieliu\public/../application/index\view\index\index.html";i:1525833598;s:27:"./template/indexlayout.html";i:1525833583;}*/ ?>
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


a{
  color:#000 ;
  text-decoration:none !important;
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


</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand " href="#"><img src="/static/images/logo.png"></a>
     <ul id="mynav" class="navbar-nav  my-0">
      <li class="nav-item  active ">
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



<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/static/images/banner3.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container mt-4">
<div class="text-center d-flex justify-content-center align-items-center"> 
	<div class="lline"></div>
	<h3>三板斧将为你带来什么</h3>
	<div class="rline"></div>	
</div>


<div class="mt-4 row">
<div class="col-md-3">
	<div class="media">
	  <img class="align-self-center mr-3" src="/static/images/blue.png" alt="Generic placeholder image">
	  <div  class="media-body">
	    <strong class="mt-0">真实访问量</strong>
	    <p style="font-size:14px;">完全自然人工游览，不同地区IP真实流量，安全可靠</p>
	  </div>
	</div>
</div>
<div class="col-md-3">
<div class="media">
	  <img class="align-self-center mr-3" src="/static/images/green.png" alt="Generic placeholder image">
	  <div  class="media-body">
	    <strong class="mt-0">升店铺权重</strong>
	    <p style="font-size:14px;">百万人同时在线，深度访问 增加店铺宝贝收藏，提高排名</p>
	  </div>
	</div>
</div>
<div class="col-md-3">
<div class="media">
	  <img class="align-self-center mr-3" src="/static/images/yellow.png" alt="Generic placeholder image">
	  <div  class="media-body">
	    <strong class="mt-0">提高点击率</strong>
	    <p style="font-size:14px;">专业的关键词优化，提高点击率 有点击率才会有流量</p>
	  </div>
	</div>
</div>
<div class="col-md-3">
<div class="media">
	  <img class="align-self-center mr-3" src="/static/images/red.png" alt="Generic placeholder image">
	  <div  class="media-body">
	    <strong class="mt-0">打造爆款</strong>
	    <p style="font-size:14px;"></p>
	  </div>
	</div>
</div>
</div>



</div><!--#container  -->

<div class="my-5 " style="background:#edeeef;">
<div class="container d-flex justify-content-around align-items-center py-4">
   <div class="card mr-3" style="height:360px;">
  <img class="card-img-top" src="/static/images/video.png" alt="Card image cap">
   <div class="card-header d-flex align-items-center justify-content-between" >
    <strong style="color:#d9363a;" class="my-0">视频演示</strong>
    <p class="my-0"><a href="<?php echo url('tutorial'); ?>">查看更多</a><span class="ml-2 fa fa-angle-right"></span> <span style="color:#d9363a;" class="fa fa-video-camera"></span></p>
  </div>
  <div class="card-body">
    <ul class="list-unstyled"> 
      <?php if(is_array($video) || $video instanceof \think\Collection || $video instanceof \think\Paginator): $i = 0; $__LIST__ = $video;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
       <li><span style="color:#dce0e3;" class="fa fa-youtube-play mr-3"></span><a href="<?php echo url('tutorial'); ?>"><?php echo $vo['name']; ?></a></li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>

</div><!-- video -->

 <div class="card mr-3" style="height:360px;">
  <img class="card-img-top" src="/static/images/contact.png" alt="Card image cap">
   <div class="card-header d-flex align-items-center justify-content-between" >
    <strong style="color:#d9363a;" class="my-0">电商咨询</strong>
    <p class="my-0"><a href="<?php echo url('help'); ?>">查看更多</a><span class="ml-2 fa fa-angle-right"></span> <span style="color:#d9363a;" class="fa fa-globe"></span></p>
  </div>
  <div class="card-body">
    <ul class="list-unstyled">
     <?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
       <li><a href="<?php echo url('news','id='.$vo['newsid']); ?>"><?php echo $vo['name']; ?></a></li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>

</div><!--  -->

 <div class="card mr-3" style="height:360px;">
  <img class="card-img-top" src="/static/images/qa.png" alt="Card image cap">
   <div class="card-header d-flex align-items-center justify-content-between" >
    <strong style="color:#d9363a;" class="my-0">常见问题</strong>
    <p class="my-0"><a href="<?php echo url('question'); ?>">查看更多</a><span class="ml-2 fa fa-angle-right"></span> <span style="color:#d9363a;" class="fa fa-share-alt"></span></p>
  </div>
  <div class="card-body">
    <ul class="">
     <?php if(is_array($question) || $question instanceof \think\Collection || $question instanceof \think\Paginator): $i = 0; $__LIST__ = $question;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
       <li><a href="<?php echo url('question'); ?>"><?php echo $vo['ask']; ?></a></li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>

</div>





</div>



</div><!--  -->

<div class="container  d-flex flex-column align-items-center">
<div class="text-center d-flex justify-content-center align-items-center"> 
	<div class="lline"></div>
	<h3>我们用心，为您省心</h3>
	<div class="rline"></div>	
</div>
<p class="text-center">轻松推广店铺，只需一步，免费获取流量，就是这么简单！</p>

<div class="media mt-3">
  <img class=" mr-3" src="/static/images/send.png"  alt="Generic placeholder image">
  <div class="media-body align-self-center">
      <div class="d-flex align-items-center mb-3"> 
         <img src="/static/images/1.png" alt="" />
         <dl class="ml-3 my-0">
         <dt>发布任务</dt>
         <dd>您只需在三板斧推广系统上发布流量任务，剩下的交给三板斧！</dd>
         </dl>
      </div>
      <ul class="list-unstyled" style="width:600px;">
	   <li class="list-inline-item mb-2" style="width:40%;">
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>淘宝电脑端任务</span>
	   </li>
	   <li class="list-inline-item mb-2" style="width:40%;">
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>淘宝手机APP推广</span>
	   </li>
	   <li class="list-inline-item mb-2" style="width:40%;">
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>天猫电脑端任务</span>
	   </li>
	   <li class="list-inline-item mb-2" style="width:40%;">
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>天猫手机APP推广</span>
	   </li>
	   <li class="list-inline-item mb-2" style="width:40%;">
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>直访店铺</span>
	   </li>
	     <li class="list-inline-item mb-2" style="width:40%;">
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>直访商品</span>
	   </li>
      </ul>
      <button type="button" class="btn btn-outline-danger">立即发布任务<span class="fa  fa-arrow-circle-down ml-2"></span></button>
  </div>
</div>

<div class="media mt-3">
  <img class=" mr-3" src="/static/images/fenpei.png"  alt="Generic placeholder image">
  <div class="media-body align-self-center">
      <div class="d-flex align-items-center mb-3"> 
         <img src="/static/images/2.png" alt="" />
         <dl class="ml-3 my-0">
         <dt>分配任务</dt>
         <dd>三板斧将您的任务发布到全网各大任务推广平台！</dd>
         </dl>
      </div>
      <ul class="list-unstyled" style="width:600px;">
	   <li class=" mb-2" >
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>店铺引流，需要专业的团队运作，才能率先抢占商机</span>
	   </li>
	   <li class=" mb-2" >
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>猎流推广服务，覆盖95%营销型网站，汇聚海量商业需求，让店铺营销更加高效</span>
	   </li>
	   <li class=" mb-2" >
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>将任务需求实时精准的发布到各大平台，快速提升店铺浏览量与商品点击率</span>
	   </li>
      </ul>
      <button type="button" class="btn btn-outline-danger">点击免费体验<span class="fa  fa-arrow-circle-down ml-2"></span></button>
  </div>
</div>
<div class="media mt-3">
  <img class=" mr-3" src="/static/images/jieshou.png"  alt="Generic placeholder image">
  <div class="media-body align-self-center">
      <div class="d-flex align-items-center mb-3"> 
         <img src="/static/images/3.png" alt="" />
         <dl class="ml-3 my-0">
         <dt>接收任务</dt>
         <dd>来自全国各地的无数网客争相接收任务！</dd>
         </dl>
      </div>
      <ul class="list-unstyled" style="width:600px;">
	   <li class=" mb-2" >
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>真实访问量：完全自然人工浏览，不同地区IP，真实流量，安全稳定</span>
	   </li>
	   <li class=" mb-2" >
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>升店铺权重：多种人工流量渠道，深度访问，提升店铺权重，提高商品排名</span>
	   </li>
	   <li class=" mb-2" >
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>提高点击率：专业的优化提高点击率，让宝贝更靠前，引爆搜索流量</span>
	   </li>
      </ul>
      <button type="button" class="btn btn-outline-danger">点击免费体验<span class="fa  fa-arrow-circle-down ml-2"></span></button>
  </div>
</div>
<div class="media mt-3">
  <img class=" mr-3" src="/static/images/zhixing.png"  alt="Generic placeholder image">
  <div class="media-body align-self-center">
      <div class="d-flex align-items-center mb-3"> 
         <img src="/static/images/4.png" alt="" />
         <dl class="ml-3 my-0">
         <dt>执行任务</dt>
         <dd>任务接收者根据您发布的任务要求进行以下相关操作：</dd>
         </dl>
      </div>
      <ul class="list-unstyled" style="width:600px;">
	   <li class=" mb-2" >
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>打开搜索入口，搜索关键字</span>
	   </li>
	   <li class=" mb-2" >
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>查找页数，找到指定商品</span>
	   </li>
	   <li class=" mb-2" >
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>按设定停留时长浏览店内所有指定商品</span>
	   </li>
	    <li class=" mb-2" >
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>深度访问店铺、收藏指定宝贝</span>
	   </li>
      </ul>
      <button type="button" class="btn btn-outline-danger">点击免费体验<span class="fa  fa-arrow-circle-down ml-2"></span></button>
  </div>
</div>

<div class="media mt-3">
  <img class=" mr-3" src="/static/images/done.png"  alt="Generic placeholder image">
  <div class="media-body align-self-center">
      <div class="d-flex align-items-center mb-3"> 
         <img src="/static/images/5.png" alt="" />
         <dl class="ml-3 my-0">
         <dt>完成</dt>
         <dd>恭喜，您发布的任务已完成，店铺流量已上增！</dd>
         </dl>
      </div>
      <ul class="list-unstyled" style="width:600px;">
	   <li class=" mb-2" >
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>您成功发布任务后，系统实时为您推广并执行任务，无需漫长等候，瞬间即可完成</span>
	   </li>
	   <li class=" mb-2" >
	      <span style='color:#d9363a;' class=" fa fa-check-square-o"></span>
	      <span>每日登录，系统免费赠送100点积分！</span>
	   </li>
      </ul>
      <button type="button" class="btn btn-outline-danger">点击免费体验<span class="fa  fa-arrow-circle-down ml-2"></span></button>
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