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
			<th>OPCIONES</th>
		</tr>
		<?php foreach($users as $user) { ?>
		<tr>
			<td><?php echo $user->id; ?></td>
			<td><?php echo $user->username; ?></td>
			<td><?php echo $user->email; ?></td>
			<td><?php echo $user->created_at; ?></td>
			<td>
				<a href="<?php echo base_url('user/edit/'.$user->id); ?>" 
				   title="Editar" class="btn btn-success btn-sm">
					<span class="fa fa-pencil"></span>
				</a>

				<a href="<?php echo base_url('user/delete/'.$user->id); ?>" 
				   title="Eliminar" class="btn btn-danger btn-sm">
					<span class="fa fa-trash"></span>
				</a>
			</td>
		</tr>
		<?php } ?>
	</table>
<?php echo view('templates/footer'); ?>