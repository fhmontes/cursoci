<?php namespace App\Controllers;

// Importar la clase model
use App\Models\UserModel;

class LoginController extends BaseController{

	public function index(){
		helper('form');
		return view('login_view');
	}

	public function login(){
		// Instanciar objetos
		$session = \Config\Services::session();
		$request = \Config\Services::request();
		$userModel = new UserModel();

		// Validar datos del formulario
		if($this->loginFormValidation()){
			// Obtener datos del formulario
			$username = $request->getPostGet('username'); 
			$password = $request->getPostGet('password');
			// Buscar el usuario
			$user = $userModel->buscarUsuario($username, $password);
			if(!is_null($user)){
				// Si existe usuario, crear una variable de sesion
				$session->set([
					'id' => $user->id,
					'username' => $user->username,
					'logged_in' => TRUE,
				]);
				// Redireccionar a listado de usuarios
				return redirect()->to('/user');	
			}else{
				// Si no existe usuario mostrar mensaje	
				$session->setFlashdata('error', 'Nombre de usuario o password incorrectos');
			}			
		}
		return $this->index();
	}

	public function logout(){
		// Instanciar objeto session
		$session = \Config\Services::session();
		// Eliminar variable de sesion
		$session->remove(['id', 'username', 'logged_in']);
		// Destruir sesion
		$session->destroy();
		// Redireccionar al login
		return $this->index();
	}

	private function loginFormValidation(){
		$val = $this->validate(
			// Reglas de validacion para el formulario
			[
				'username' => 'required',
				'password' => 'required',
			]);
		return $val;
	}
}