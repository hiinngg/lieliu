<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp3\wamp64\www\lieliu\public/../application/admin\view\user\index.html";i:1525769564;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新闻管理</title>
<link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css" />
</head>
<style type="text/css">
.flex-row {
	display: flex;
	align-items: center;
}
</style>

<body  style="scroll-x:scroll;padding:15px;">
<!-- 	<blockquote class="layui-elem-quote flex-row">
		<input style="width: 200px; margin-right: 15px;" type="text"
			name="keyword" placeholder="请输入新闻名" autocomplete="off"
			class="layui-input">
		<button class="layui-btn articleSearch" >
			<i class="layui-icon">&#xe615;</i>查询
		</button>
		<button class="layui-btn layui-btn-normal add" data-url="<?php echo url('create'); ?>">
			<i class="layui-icon">&#xe654;</i>新增新闻
		</button>
		<button class="layui-btn layui-btn-danger">
			<i class="layui-icon">&#xe640;</i>批量删除
		</button> -->
		<button class="layui-btn " onclick="refresh()">
			刷新
		</button>
	</blockquote>
		
	
    <?php if(isset($none)): ?>
	<div style="position: absolute; left: 50%; top:50%;margin-top:-30px; margin-left:-63px; text-align: center;">
			<i class="layui-icon" style="font-size: 36px;color: #009688;">&#xe69c;</i>
			<p>这里一篇新闻都没有</p>			
		</div>
		<?php else: ?>
		<table class="layui-table"  id="table"  lay-filter="table" style="width:auto;" >
	    </table>
	<?php endif; ?>
    <script src="/static/layui/layui.js"></script>
	<script type="text/javascript">
	var tranStatus={
			'发布':1,
			'不发布':0
	}
		layui.use([ 'table', 'layer','jquery','form' ], function() {
			var $=layui.jquery;
			var table = layui.table;
			var layer=layui.layer;		
			var form = layui.form
		<?php if(!isset($none)): ?>
			var init= layer.load(2, {shade: false});
		var articleTable = table.render({
			        elem:"#table",	
			       
			        url: "<?php echo url('index'); ?>",
			        cols:[[
			         {checkbox: true},
			         {field: 'userid', title: '编号',type:"numbers" },
			         {field: 'tel', title: '手机' },
			          {field: 'integrate', title: '积分' },
			         {field: 'createtime', title: '创建时间' },
			         {field: 'score', title: '操作', width:250, toolbar: '#bar'}
			        ]],
				   page:true,
				   done: function(res, curr, count){ //res:返回的数据  curr:当前页码  count：数据总量
			        layer.close(init)
			    }
				});
			 
			 

			 $(".articleSearch").on("click",function(){
				 var keyword=$("input[name='keyword']").val();
				 if(keyword==""){
					 return;
				 }
				 articleTable.reload({
					  where: { 
					    keyword:keyword
					  }
					  ,page: {
					    curr: 1 //重新从第 1 页开始
					  }
					});
				 
			 })
			 
			 
			<?php endif; ?>
	
			
				$(".add").on("click",function(){			
					var data = {
							title:"新增新闻",
							href : $(this).attr("data-url")
						}
					window.parent.navtab.tabAdd(data)
					
				})
			
				


				table.on('tool(table)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
					  var data = obj.data; //获得当前行数据
					  var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
					  var tr = obj.tr; //获得当前行 tr 的DOM对象	
					  var dtd=$.Deferred();
					  console.log(data)
					  if(layEvent === 'detail'){ //查看
						  layer.open({
						      type: 2,
						      title: '内容查看',
						      shadeClose: true,
						      shade: false,
						      maxmin: true, //开启最大化最小化按钮
						      area: ['893px', '600px'],
						      content: "articlePreview?id="+data.postid
						    });

					  } else if(layEvent === 'del'){ //删除
					    layer.confirm('确定删除该新闻么', function(index){
					    	  _ajax("<?php echo url('delete'); ?>",{newsid:data.newsid},dtd)
							  dtd.done(function(){
								  obj.del(); 
								  layer.close(index);
							  })
					    });
					  } else if(layEvent === 'log'){ //编辑
						  layer.open({
						      type: 2,
						      title: '内容编辑',
						      shadeClose: true,
						      shade: false,
						      area: ['100%', '100%'],
						      content: "log?userid="+data.userid
						    });
					    
					  }else if(layEvent === 'recharge'){

                         layer.open({
                           type:1,
                           content: '<div style="margin:15px;"><input type="number"  class="layui-input recharge"  /></div>',
                           btn: ['确定', '取消'],
                           title:'请输入充值金额'
                            ,yes: function(index, layero){
                            	if($(layero).find(".recharge").val()==""){
                                   layer.msg("请输入金额")
                                   layer.close(index)
                                   return;
                            	}
						    var load = layer.load(1, {
							 shade: [0.1,'#fff'] //0.1透明度的白色背景
						   });
						   $.ajax({
                           url:"<?php echo url('recharge'); ?>",
                           data:{integrate:$(layero).find(".recharge").val(),userid:data.userid},
                           type:"post",
                           success:function(data){
                           	layer.closeAll();
                             if(data==1){
                             	layer.msg("充值成功")
                             	articleTable.reload();
                             }
                           }


                        })
						  }
						  ,cancel: function(){ 
						    //右上角关闭回调
						    
						    //return false 开启该代码可禁止点击该按钮关闭
						  }
						});

   
						   	
					  }else if(layEvent === 'change2off'){
						  _ajax("<?php echo url('statusChange'); ?>",{newsid:data.newsid,status:0},dtd)
						 dtd.done(function(){
					     $(tr).find("button.off").get(0).outerHTML='<button class="layui-btn layui-btn-xs on" lay-event="change2on">发布</button>'
						  obj.update({
							status:0
						 });
						})
					
					  }
					});
				
				function  _ajax(url,data,deferred){
					var index = layer.load(2, {shade: false});
					$.ajax({
						url:url,
						data:data,
						type:"post",
						success:function(data){
							layer.close(index)
							if(data==1){
								deferred.resolve();
							}else{
								layer.msg("操作失败");
							}
							
						}
						
					})
					
					
				}
				 
		});
	
	function refresh(){
		history.go(0)
	}
	

		
		
	</script>
<script type="text/html" id="bar">
  <button class="layui-btn layui-btn-xs" lay-event="recharge">充值</button>
  <button class="layui-btn layui-btn-xs" lay-event="log">充值记录</button>

 
  <!-- 这里同样支持 laytpl 语法，如： -->

</script>
<script type="text/html" id="statusTpl">
  {{#  if(d.status== 1){ }}
    <span style="color:#5FB878;">发布中</span>
  {{#  } else { }}
     <span style="color:#FFB800;">未发布</span>
  {{#  } }}
</script>
</body>

</html>