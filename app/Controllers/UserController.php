<?php namespace App\Controllers;

// Importar la clase model
use App\Models\UserModel;

class UserController extends BaseController {

	public function index() {
		// 1. Instanciar un objeto del modelo
		$userModel = new UserModel();
		// 2. Realizar consulta a la base de datos
		$users = $userModel->findAll();
		// var_dump($users);
		// 3. Enviar resultado de la consulta a una vista
		$data['users'] = $users;
		$data['title'] = 'Lista de Usuarios';
		return view('user/listar_view', $data);
	}

	public function guardarAction(){
		// 1. Instanciar un objeto del modelo
		$userModel = new UserModel();
		// 2. Definir un objeto a guardar
		$user = array(
			'username' => 'hugo', 
			'password'=> MD5('123456'), 
			'email' => 'hugo@gmail.com',
		);
		// 3. Guardar el registro
		$userModel->insert($user);
		// 4. Mostrar un mensaje
		echo 'El usuario '.$user['username'].' fue adicionado exitosamente';
	}

	public function actualizarAction(){
		// 1. Instanciar un objeto del modelo
		$userModel = new UserModel();
		// 2. Definir un objeto a acualizar
		$user = array(
			'username' => 'maria',  
			'email' => 'maria@gmail.com',
		);
		// 3. Guardar cambios en el registro
		$userModel->update(1, $user);
		// 4. Mostrar un mensaje
		echo 'El usuario '.$user['username'].' fue editado exitosamente';	
	}

	// funcion save() : Permite guardar un nuevo registro y tambien actualizarlo

	public function eliminarAction($id){
		// 1. Instanciar un objeto del modelo
		$userModel = new UserModel();
		// 2. Buscar registro a eliminar
		if($userModel->find($id)) {
			// 3. Eliminar el registro
			$userModel->delete($id);
			// 4. Mostrar un mensaje
			echo 'El usuario fue eliminado exitosamente';
		} else {
			// 5. Mostrar mensaje no se encuentra
			echo 'No existe el usuario con id '.$id.', favor revisar.';
		}	
	}

	public function consultasAction($num){
		$userModel = new UserModel();
		$title='';
		if($num==1){
			$title='Mostrar todos los registros excepto eliminados';
			$users = $userModel->findAll();
		} else if($num==2){
			$title='Mostrar todos los registros incluidos eliminados';
			$users = $userModel->withDeleted()->findAll();
		} else if($num==3){
			$title='Mostrar todos los registros eliminados';
			$users = $userModel->onlyDeleted()->findAll();
		}
		$data['title'] = $title;
		$data['users'] = $users;
		return view('user/listar_view', $data);
	}

	public function consultaSqlAction(){
		$userModel = new UserModel();
		$users = $userModel->obtenerUsuarios();
		foreach($users as $user){
			echo $user->id.' - ';
			echo $user->username.' - ';
			echo $user->email.'<br/>';
		}
		echo 'Total : '.count($users);
	}

	// Renderizar formulario guardar
	public function newAction(){
		helper('form');
		$data['title'] = 'Nuevo Usuario';
		return view('user/nuevo_view', $data);
	}

	// Guardar datos del formulario
	public function createAction(){
		if($this->userCreateFormValidation()){
			// Instanciar un objeto del modelo
			$userModel = new UserModel();
			// Instanciar objeto de peticion
			$request = \Config\Services::request();
			// Instanciar objeto session
			$session = \Config\Services::session();
			
			// Obtener datos del formulario
			$user = $request->getPostGet();
			// Cifrar password
			$user['password'] = MD5($request->getPostGet('password'));

			// Guardar el registro en la bd
			$userModel->insert($user);

			// Mostrar un mensaje
			// echo 'El usuario '.$user['username'].' fue adicionado exitosamente';
			$session->setFlashdata('message', 'El usuario '.$user['username'].' fue adicionado exitosamente');

			// Redireccionar al listado
			return redirect()->to('/user');
		} else {
			// Mostrar mensajes de error para la validacion
			// var_dump(\Config\Services::validation()->getErrors());
			return $this->newAction();
		}
	}

	private function userCreateFormValidation(){
		$val = $this->validate(
			// Reglas de validacion para el formulario
			[
				'username' => 'required|min_length[3]',
				'password' => 'required|min_length[6]',
				'email' => 'required|valid_email|is_unique[users.email]',
			],
			// Mensajes de validacion
			[]);
		return $val;
	}

	// Generar formulario para editar
	public function editAction($id){
		$userModel = new UserModel();
		helper('form');
		// Buscar registro a ditar
		$user = $userModel->find($id);
		$data['user'] = $user;
		$data['title'] = 'Editar Usuario';
		return view('user/editar_view',$data); 
	}

	// Guardar datos del formulario
	public function updateAction(){
		// if($this->userEditFormValidation()){
			// Instanciar un objeto del modelo
			$userModel = new UserModel();
			// Instanciar objeto de peticion
			$request = \Config\Services::request();
			// Instanciar objeto session
			$session = \Config\Services::session();
			
			// Obtener datos del formulario
			$user = $request->getPostGet();
			// Cifrar password
			// $user['password'] = MD5($request->getPostGet('password'));

			// Guardar el registro en la bd
			$id = $request->getPostGet('id');
			$userModel->update($id ,$user);

			// Mostrar un mensaje
			// echo 'El usuario '.$user['username'].' fue adicionado exitosamente';
			$session->setFlashdata('message', 'El usuario '.$user['username'].' fue editado exitosamente');

			// Redireccionar al listado
			return redirect()->to('/user');
		// } else {
			// Mostrar mensajes de error para la validacion
			// var_dump(\Config\Services::validation()->getErrors());
			// return $this->newAction();
		// }
	}

	public function deleteAction($id){
		// Instanciar model
		$userModel = new UserModel();
		// Buscar registro a eliminar
		$user = $userModel->find($id);
		if($user){
			// Eliminar registro
			$userModel->delete($id);
			// Instanciar objeto session
			$session = \Config\Services::session();
			// Mostrar un mensaje
			$session->setFlashdata('message', 'El usuario '.$user->username.' fue eliminado exitosamente');
			// Redireccionar al listado
			return redirect()->to('/user');
		}else{
			// Mensaje no existe
			echo 'No existe el registro a eliminar';
		}
	}
}





