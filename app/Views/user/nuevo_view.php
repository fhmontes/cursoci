<?php echo view('templates/header'); ?>

	<?php echo form_open('/user/create'); ?>
	<div class="form-group">
		<?php echo form_label('Nombre de usuario:', 'txtUsername'); ?>
		<?php echo form_input([
			'id' => 'txtUsername',
			'name' => 'username',
			'value' => set_value('username'),
			'placeholder' => 'Ingrese nombre de usuario',
			'class' => 'form-control',
		]); ?>

		<?php echo form_label('Contraseña:', 'txtPassword'); ?>
		<?php echo form_password([
			'id' => 'txtPassword',
			'name' => 'password',
			'value' => set_value('password'),
			'placeholder' => 'Ingrese un password',
			'class' => 'form-control',
		]); ?>

		<?php echo form_label('Correo electronico:', 'txtEmail'); ?>
		<?php echo form_input([
			'id' => 'txtEmail',
			'name' => 'email',
			'value' => set_value('email'),
			'placeholder' => 'ejemplo@gmail.com',
			'class' => 'form-control',
		]); ?>
	</div>
	<?php echo form_submit(['value'=>'Guardar',
							'class'=>'btn btn-primary']); ?>
	<?php echo form_close(); ?>

<?php echo view('templates/footer'); ?>