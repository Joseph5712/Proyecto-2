<?php
// app/Controllers/AuthController.php
namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class AuthController extends BaseController {
    
    public function index(){
        echo view('auth/login');
    }
    public function show_form_user(){
        
        echo view('auth/create_user');
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
                "id" => $userData['id'],
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
    public function register()
    {
        
        // Recupera los datos del formulario
        $firstName = $this->request->getPost('first_name');
        $lastName = $this->request->getPost('last_name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validaciones adicionales (por ejemplo, verificar si el correo ya está registrado)

        // Hash de la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Guarda el nuevo usuario en la base de datos
        $userModel = new UserModel();
        $userModel->save([
            'email' => $email,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'password' => $hashedPassword,
            'imagen_url' => "",
            'role_id' => 2,
        ]);

        // Puedes redirigir a otra página después del registro
        return redirect()->to(site_url('/'));
    }
    public function save_user()
{
    
    $userModel = new UserModel();

    // Validación de formulario aquí, si es necesario

    // Obtener datos del formulario
    $data = [
        'first_name' => $this->request->getPost('first_name'),
        'last_name'  => $this->request->getPost('last_name'),
        'email'      => $this->request->getPost('email'),
        'password'   => $this->request->getPost('password'),
        'imagen_url' => '', // Puedes agregar un valor por defecto si es necesario
        'role_id'    => '2',
    ];

    // Insertar en la base de datos
    $userModel->insert($data);

    // Redireccionar a la vista deseada o realizar otras acciones después de la inserción
    return redirect()->to('/');
}




    public function salir(){
		$session = session();
		$session -> destroy();

		return redirect()->to(site_url('/'));
	}
    public function validateSession()
    {
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }
    }
}
