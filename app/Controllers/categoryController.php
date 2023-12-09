<?php
// app/Controllers/AuthController.php
namespace App\Controllers;

use App\Models\CategoryModel;
use App\Controllers\BaseController;

class categoryController extends BaseController {
    
    public function index(){
        $data['pageTitle'] = 'Categories';
        $data['showLogo'] = true;
        $categoryModel= model(CategoryModel::class);
        $data['categories'] = $categoryModel->findAll();

        $content = view('category/index', $data);
        return parent::renderTemplate($content, $data);
    }

    public function create(){
        $data['pageTitle'] = 'New Category';
        $data['actionTitle'] = 'Create category';
        $content = view('category/form', $data);
        return parent::renderTemplate($content, $data);
    }

    public function edit($id){
        $categoryModel = model(CategoryModel::class);
        $data['category'] = $categoryModel->where('id', $id)->first();
        $data['pageTitle'] = 'Category Page';
        $data['actionTitle'] = 'Edit Category';
        $content = view('category/form',$data);
        return parent::renderTemplate($content, $data);
    }

    public function save() {
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

    public function delete($id = null){
        $categoryModel = model(CategoryModel::class);
        $categoryModel->where('id', $id)->delete();

        return $this->response->redirect(site_url('/category'));
    }
}
