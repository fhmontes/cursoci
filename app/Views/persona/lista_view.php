<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<table border="1">
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>EDAD</th>
	</tr>
	<?php foreach($personas as $per) { ?>
	<tr>
		<td><?php echo $per['id']; ?></td>
		<td><?php echo $per['nombre']; ?></td>
		<td><?php echo $per['edad']; ?></td>
	</tr>
	<?php } ?>
</table>

</body>
</html>

