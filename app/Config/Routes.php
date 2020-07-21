<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Ruta hola mundo
$routes->get('/hola/ruta', function(){
	echo 'Hola desde Routes.php';
});

$routes->add('/hola/add', function(){
	echo 'Hola desde Routes.php con add()';
});

// Rutas y controladores
$routes->get('/hola/controlador', 'Hola_controller::index');

// Paso de parametros
$routes->get('/hola/parametros/(:any)/(:num)', 'Hola_controller::parametrosAction/$1/$2');

// Renderizando una vista
$routes->get('/hola/vista', 'Hola_controller::vistaAction');

// Enviando datos controlador - vista
$routes->get('/persona/datos/(:any)/(:num)', 'PersonaController::datosAction/$1/$2');

// Envio de colecciones controlador - vista
$routes->get('/persona/listar', 'PersonaController::listarAction');

// RUTAS CALCULADORA
$routes->get('/calculadora/aritmetica/(:num)/(:num)', 
			 'CalculadoraController::aritmeticaAction/$1/$2');

$routes->get('/calculadora/geometrica/(:num)/(:num)', 
			 'CalculadoraController::geometriaAction/$1/$2');

// USER
$routes->add('/user', 'UserController::index');

// USER PRUEBAS CRUD
$routes->add('/user/guardar', 'UserController::guardarAction');
$routes->add('/user/actualizar', 'UserController::actualizarAction');
$routes->add('/user/eliminar/(:num)', 'UserController::eliminarAction/$1');

$routes->add('/user/consultas/(:num)', 'UserController::consultasAction/$1');
$routes->add('/user/consulta/sql', 'UserController::consultaSqlAction');

// USER 
$routes->get('/user/new', 'UserController::newAction');
$routes->post('/user/create', 'UserController::createAction');

$routes->get('/user/edit/(:num)', 'UserController::editAction/$1');
$routes->post('/user/update', 'UserController::updateAction');

$routes->get('/user/delete/(:num)', 'UserController::deleteAction/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
