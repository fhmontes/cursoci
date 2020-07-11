<?php namespace App\Controllers;

class PersonaController extends BaseController {

	public function index() {
	}

	public function datosAction($nombre, $edad){
		$data['nombre'] = $nombre;
		$data['edad'] = $edad;
		$data['observacion'] = $edad>=18?'Mayor de edad':'Menor de edad';
		return view('persona/datos_view', $data);
	}

	public function listarAction(){
		// Definir listado de personas
		$lista = array(
			array('id'=>1, 'nombre'=>'Mateo', 'edad'=>25),
			array('id'=>2, 'nombre'=>'Marcos', 'edad'=>35),
			array('id'=>3, 'nombre'=>'Lucas', 'edad'=>15),
			array('id'=>4, 'nombre'=>'Juan', 'edad'=>55),
		);
		// Adicionar lista en $data
		$data['personas']=$lista;
		// Llamar a la vista
		return view('persona/lista_view', $data);
	}
}