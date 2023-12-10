<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsSourcesModel;
use App\Models\CategoryModel;

class UserController extends BaseController
{
    public function index()
    {
        $categoryModel= model(CategoryModel::class);
        $data['categories'] = $categoryModel->findAll();

        $data['pageTitle'] = 'My News Cover';
        $data['showLogo'] = true;
        $newsSourcesModel= model(NewsSourcesModel::class);
        $data['news_sources'] = $newsSourcesModel->findAll();

        $content = view('user/my_news_cover', $data);
        return parent::renderTemplate($content, $data);
    }
    public function show_sources_input()
    {
        $categoryModel= model(CategoryModel::class);
        $data['categories'] = $categoryModel->findAll();

        $data['pageTitle'] = 'My News Cover';
        $data['showLogo'] = true;
        $newsSourcesModel= model(NewsSourcesModel::class);
        $data['news_sources'] = $newsSourcesModel->findAll();

        $content = view('user/form_news_sources', $data);
        return parent::renderTemplate($content, $data);
    }
    public function show_sources()
    {
        $categoryModel= model(CategoryModel::class);
        $data['categories'] = $categoryModel->findAll();

        $data['pageTitle'] = 'My News Cover';
        $data['showLogo'] = true;
        $newsSourcesModel= model(NewsSourcesModel::class);
        $data['news_sources'] = $newsSourcesModel->findAll();

        $content = view('user/news_sources', $data);
        return parent::renderTemplate($content, $data);
    }

    public function create(){

        $categoryModel= model(CategoryModel::class);
        $data['categories'] = $categoryModel->findAll();

        $data['pageTitle'] = 'New source';
        $data['actionTitle'] = 'Create new source';

        $content = view('user/form_news_sources', $data);
        return parent::renderTemplate($content, $data);
    }

    public function edit($id){
        $categoryModel= model(CategoryModel::class);
        $data['categories'] = $categoryModel->findAll();

        $newsSourcesModel = model(NewsSourcesModel::class);
        $data['newsSource'] = $newsSourcesModel->where('id', $id)->first();

        $data['pageTitle'] = 'New Source Page';
        $data['actionTitle'] = 'Edit New Source';
        $content = view('user/form_news_sources',$data);
        return parent::renderTemplate($content, $data);
    }

    public function save() {
        $newsSourcesModel = model(NewsSourcesModel::class);
        $user_id = session('id');
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'url' => $this->request->getVar('url'),
            'category_id' => $this->request->getVar('category_id'),
            'user_id' => $user_id,
        ];
        if ($id) {
            $newsSourcesModel->update($id, $data);
        } else {
            $newsSourcesModel->insert($data);
        }
        return $this->response->redirect(site_url('/user'));
    }

    public function delete($id = null){
        $newsSourcesModel = model(NewsSourcesModel::class);
        $newsSourcesModel->where('id', $id)->delete();

        return $this->response->redirect(site_url('/user'));
    }
}
