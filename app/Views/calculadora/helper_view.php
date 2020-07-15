<?php echo view('templates/header'); ?>
	<p>Valor A : <?php echo $valora; ?></p>
	<p>Valor B : <?php echo $valorb; ?></p>
	<p>Suma : <?php echo sumar($valora, $valorb); ?></p>
	<p>Resta : <?php echo restar($valora, $valorb); ?></p>
<?php echo view('templates/footer'); ?>