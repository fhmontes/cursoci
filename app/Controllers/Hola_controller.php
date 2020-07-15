<?php namespace App\Controllers;

class Hola_controller extends BaseController{
	
	public function index(){
		echo 'Hola desde Hola_controller.php';
	}

	public function parametrosAction($nombre, $edad){
		$mensaje = 'Nombre:'.$nombre.'<br/>';
		$mensaje .= 'Edad:'.$edad.'<br/>';
		echo $mensaje;
	}

	public function vistaAction(){
		$data['title'] = 'Hola Vista';
		return view('hola_view', $data);
	}
}