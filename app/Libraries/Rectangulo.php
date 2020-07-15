<?php namespace App\Libraries;

class Rectangulo{

	private $base = 0;
	private $altura = 0;

	public function setBase($base){
		$this->base = $base;
	}

	public function setAltura($altura){
		$this->altura = $altura;
	}

	public function getArea(){
		$area = $this->base * $this->altura;
		return $area;
	}

	public function getPerimetro(){
		$perimetro = 2 * $this->base + 2 * $this->altura;
		return $perimetro;
	}
}