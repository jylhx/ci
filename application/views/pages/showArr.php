<html>
<head></head>
<body>
<table border='1px' width='400px'>
	<tr><td>id</td><td>name</td><td>age</td></tr>
	<?php foreach($list as $v) :?>
	<tr>
		<td><?=$v['id']?></td>  <!-- 短标签格式代替 php 的 echo  -->
		<td><?=$v['name']?></td>
		<td><?=$v['age']?></td>
	</tr>
	<?php endforeach;?>
</table>
</body>
</html>