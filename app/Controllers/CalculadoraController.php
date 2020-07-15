<?php namespace App\Controllers;

// Importar libreria Rectangulo
use App\Libraries\Rectangulo;

class CalculadoraController extends BaseController {
	
	public function index(){
	}

	public function aritmeticaAction($valora, $valorb){
		// Llamar al helper
		helper('calculadora');
		
		$data['valora'] = $valora;
		$data['valorb'] = $valorb;
		$data['title'] = 'CALCULADORA ARITMETICA HELPER';
		return view('calculadora/helper_view', $data);
	}

	public function geometriaAction($base, $altura){
		// Instanciar un objeto de la libreria
		$rectangulo = new Rectangulo();
		$rectangulo->setBase($base);
		$rectangulo->setAltura($altura);

		$data['base'] = $base;
		$data['altura'] = $altura;
		// Invocar metodos de la clase
		$data['area'] = $rectangulo->getArea();
		$data['perimetro'] = $rectangulo->getPerimetro();

		return view('calculadora/libreria_view', $data);	
	}

}