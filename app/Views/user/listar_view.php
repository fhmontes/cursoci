<?php echo view('templates/header'); ?>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>USUARIO</th>
			<th>EMAIL</th>
			<th>FECHA REGISTRO</th>
		</tr>
		<?php foreach($users as $user) { ?>
		<tr>
			<td><?php echo $user->id; ?></td>
			<td><?php echo $user->username; ?></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo $user->created_at; ?></td>
		</tr>
		<?php } ?>
	</table>
<?php echo view('templates/footer'); ?>