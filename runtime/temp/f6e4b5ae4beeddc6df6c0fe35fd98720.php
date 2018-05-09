<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp3\wamp64\www\lieliu\public/../application/admin\view\video\edit.html";i:1525828519;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>视频管理</title>
<link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css" />
</head>
<body style="overflow:scroll;">

	<form class="layui-form" action=""  style="width:70%;">
	
	
 <div class="layui-form-item layui-form-text">
    <div class="layui-input-block" style="margin-left:130px;">
      <p style="text-align:center;margin:15px;">视频名称</p>
       <input type="text" name="name" lay-verify="required" class="layui-input" placeholder="请输入视频名称">
    </div>
  </div>
  
 <div class="layui-form-item layui-form-text">
    <div class="layui-input-block"  style="margin-left:130px;">
    <p style="text-align:center;margin:15px;">视频地址</p>
      <input type="text" name="path" lay-verify="required" class="layui-input" placeholder="请输入视频地址">
    </div>
  </div>
  
  
  <div class="layui-form-item">
    <div class="layui-input-block" style="margin-left:130px;">
      <button class="layui-btn" lay-submit lay-filter="addTeam">立即发布</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>

  </form>
    
	<script src="/static/js/jquery-3.2.1.min.js"></script>
	<script src="/static/layui/layui.js"></script>
	<script>
	layui.use('form', function(){
		  var form = layui.form;
		  
		  
		  <?php if(isset($data)): ?>
		  var desc="<?php echo $data['desc']; ?>";
		  var result="<?php echo $data['result']; ?>";
		  var reg=new RegExp("<br>","g"); //创建正则RegExp对象    
		  desc=desc.replace(reg,"\n");
		  result=result.replace(reg,"\n")
		  $("textarea[name='desc']").text(desc)
		  $("textarea[name='detail']").text(result)
           form.render()
		  <?php endif; ?>
		  
		  
		  //监听提交
		  form.on('submit(addTeam)', function(data){
			 
			  var url="<?php echo url('save'); ?>";
			  var data={data:data.field};
			  <?php if(isset($data)): ?>
			  url="<?php echo url('teamEdit'); ?>"
			  data['teamid']="<?php echo $data['teamid']; ?>"
			  <?php endif; ?>
			  
			  
			  $.ajax({
			    	url:url,
			    	beforeSend:function(){
			    		layer.load(2)
			    	},
			    	data:data,
			    	type:"post",
			    	success:function(data){
			    		if(data==1){
			    			layer.msg("保存成功")
			    			setTimeout(function(){
			    				history.go(0)
			    			},500)
			    		}
			    	},
			    	complete:function(){
			    		layer.closeAll("loading")
			    	}
			    	
			  });
			  return false;
		
		  });
			  
		});
	</script>

</body>
</html>