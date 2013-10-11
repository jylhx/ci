<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CI数据库操作</title>
</head>
<body>

	<?=$this ->input->server('REMOTE_ADDR'); ?>  <!-- 在模板中直接使用超级对象$this -->
	<table border='2px'>
		<tr>
			<td>brand_id</td><td>brand_name</td><td>brand_logo</td><td>brand_desc</td><td>site_url</td>
		</tr>
		<?php foreach ($brand as $v) :?>
			<tr>
				<td><?=$v['brand_id']?></td><td><?=$v['brand_name']?></td><td><?=$v['brand_logo']?></td><td><?=$v['brand_desc']?></td><td><?=$v['site_url']?></td>
			</tr>
		<?php endforeach ;?>
		
	</table>
</body>
</html>