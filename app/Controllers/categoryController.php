<?php
// app/Controllers/CategoryController.php
namespace App\Controllers;

use App\Models\CategoryModel;
use App\Controllers\BaseController;

class CategoryController extends BaseController {
    
    public function index() {
        // Verifica si el usuario está autenticado
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }

        $data['pageTitle'] = 'Categories';
        $data['showLogo'] = true;
        $categoryModel = model(CategoryModel::class);
        $data['categories'] = $categoryModel->findAll();

        $content = view('category/index', $data);
        return parent::renderTemplate($content, $data);
    }

    public function create() {
        // Verifica si el usuario está autenticado
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }

        $data['pageTitle'] = 'New Category';
        $data['actionTitle'] = 'Create category';
        $content = view('category/form', $data);
        return parent::renderTemplate($content, $data);
    }

    public function edit($id) {
        // Verifica si el usuario está autenticado
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }

        $categoryModel = model(CategoryModel::class);
        $data['category'] = $categoryModel->where('id', $id)->first();
        $data['pageTitle'] = 'Category Page';
        $data['actionTitle'] = 'Edit Category';
        $content = view('category/form', $data);
        return parent::renderTemplate($content, $data);
    }

    public function save() {
        // Verifica si el usuario está autenticado
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }

        $categoryModel = model(CategoryModel::class);
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
        ];
        if ($id) {
            $categoryModel->update($id, $data);
        } else {
            $categoryModel->insert($data);
        }
        return $this->response->redirect(site_url('/category'));
    }

    public function delete($id = null) {
        // Verifica si el usuario está autenticado
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }

        $categoryModel = model(CategoryModel::class);
        $categoryModel->where('id', $id)->delete();

        return $this->response->redirect(site_url('/category'));
    }
    public function validateSession()
    {
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }
    }
}
