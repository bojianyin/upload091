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
			<h2 style="font-size:21px;">分类列表</h2><span>共13条数据</span>
			<a href="<?php echo U('add');?>">添加分类</a>
			<div class="table-responsive">
			  <table class="table">
			    <tr>
			    	<th>id</th>
			    	<th>name</th>
			    	<th>info</th>
			    	<th>子类</th>
			    	<th>path</th>
			    </tr>
			    <?php if(is_array($Data)): $i = 0; $__LIST__ = $Data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			    	<td><?php echo ($v['id']); ?></td>
			    	<td><?php echo str_repeat(' * ',$v['str']).$v['name'];?></td>
			    	<td><?php echo ($v['info']); ?></td>
			    	<td><button class="btn btn-primary btn-sm" onclick="location.href='<?php echo U('add',['pid'=>$v[id],'path'=>$v[path]]);?>'"><i class="glyphicon glyphicon-plus"></i></button></td>
			    	<td>[<?php echo ($v['path']); ?>]</td>
			    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			  </table>
			</div>
		</div>
	</body>
</html>