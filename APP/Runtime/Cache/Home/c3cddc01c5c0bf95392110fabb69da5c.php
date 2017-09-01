<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<script src="http://www.jq22.com/jquery/jquery-2.1.1.js"></script>
		<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
		<script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script>
		<style>
			.list{padding:15px;width:900px;display: block;margin:30px auto;border:1px solid #ddd;}
			
		</style>
	</head>
	<body>
		<div class="list">
			<h2 style="font-size:21px;">轮播列表</h2>
			<a href="<?php echo U('Slider/addSlider');?>">添加轮播</a>
			<div class="table-responsive">
			  <table class="table">
			    <tr>
			    	<th>id</th>
			    	<th>name</th>
			    	<th>url</th>
			    	<th>sort</th>
			    	<th>img</th>
			    	<th>操作</th>
			    </tr>
			    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="tli">
			    	<td><?php echo ($v['id']); ?></td>
			    	<td><?php echo ($v['name']); ?></td>
			    	<td><?php echo ($v['url']); ?></td>
			    	<td><input class="sort" type="text" value="<?php echo ($v['sort']); ?>" data-msg="<?php echo ($v['id']); ?>"/></td>
			    	<td><img src="/xialian/Uploads/<?php echo ($v['img']); ?>" alt="" width="30" height="30px"/></td>
			    	<td>
			    		[<a href="<?php echo U('Slider/addSlider',['id'=>$v['id']]);?>">修改</a>][<a href="<?php echo U('Slider/delData',['id'=>$v['id']]);?>">删除</a>]
			    	</td>
			    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			  </table>
			  
			</div>
		</div>
		
		<script>
			function callAjax(id,val){
				$.post("<?php echo U('Slider/newSort');?>",{"id":id,"sort":val},function(data){
					if(data.error==0){
						location.reload();
					}else{
						alert(data.msg);
					}
				})
			}
			$(".sort").change(function(){
				callAjax($(this).attr("data-msg"),$(this).val());
			})
		</script>
	</body>
</html>