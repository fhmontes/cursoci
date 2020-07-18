<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    // Indicar nombre de la tabla y su PK
    protected $table      = 'users';
    protected $primaryKey = 'id';
    // Tipo de retorno array y object
    // protected $returnType     = 'array';
    protected $returnType     = 'object';
    // Activar eliminar registros logicamente
    protected $useSoftDeletes = true;
    // Indicar campos a manipular
    protected $allowedFields = ['username', 'password', 'email'];
    // Indicar que los campos para auditoria
    // sean gestionados por codeigniter
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    // Adicionar reglas de validacion a nivel del modelo
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // Consulta SQL Nativo
    public function obtenerUsuarios(){
        // 1 Instanciar objeto de conexion
        $db = \Config\Database::connect();
        // 2 Ejecutar consulta
        $query = $db->query('select id, username, email from users;');
        // 3 Obtener resultados
        $result = $query->getResult();
        // 4 Retornar resultados
        return $result;
    }
}