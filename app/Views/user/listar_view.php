<?php echo view('templates/header'); ?>
	<?php if(session('message')){ ?>
		<div class="bs-component">
            <div class="alert alert-dismissible alert-success">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <strong>Correcto!</strong> <?php echo session('message'); ?>
            </div>
        </div>		
	<?php } ?>

	<a href="<?php echo base_url('/user/new'); ?>"
	   class="btn btn-primary">
		Nuevo Usuario
	</a>
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