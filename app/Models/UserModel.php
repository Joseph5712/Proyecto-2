<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    // Define la tabla y la clave primaria
    protected $table = 'users';
    protected $primaryKey = 'id';

    // Aquí puedes agregar lógica para manejar la autenticación, por ejemplo, verificar contraseñas, etc.
}
