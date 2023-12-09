<?php
// app/Controllers/AuthController.php
namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class AuthController extends BaseController {
    
    public function index(){
        echo view('auth/login');
    }
    public function login() {
        // Obtén los datos del formulario de inicio de sesión
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Instancia el modelo de usuarios
        $userModel = new UserModel();

        // Busca al usuario por su dirección de correo electrónico
        $userData = $userModel->where('email', $email)->first();
        
        // Verifica si el usuario existe y la contraseña es válida
        if (!empty($userData) && $password === $userData['password']) {
            $data = [
                "email" => $userData['email'],
                "first_name" => $userData['first_name'],
                "last_name" => $userData['last_name'],
                "imagen_url" => $userData['imagen_url'],
                "role_id" => $userData['role_id']
            ];
            // Redirige según el rol del usuario
            if ($userData['role_id'] == 1) {
                // Rol de administrador
                $session = session();
			    $session->set($data);
                return redirect()->to('category');
            } else {
                // Rol de usuario normal
                $session = session();
			    $session->set($data);
                return redirect()->to('user');
            }
        } else {
            // Muestra un mensaje de error o redirige a la página de inicio de sesión con un mensaje de error
            return redirect()->to('/')->with('error', 'Credenciales inválidas');
        }
    }
    public function salir(){
		$session = session();
		$session -> destroy();

		return redirect()->to(site_url('/'));
	}
}
