<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsSourcesModel;
use App\Models\CategoryModel;
use App\Models\NewsModel;
use DOMDocument;

class NewsController extends BaseController
{
    public function index()
{
    $session = session();
    if (!$session->get('id')) {
        return redirect()->to('/');
    }

    $user_id = session('id');

    $newsModel = model(NewsModel::class);
    $categoryModel = model(CategoryModel::class);

    $data['pageTitle'] = 'My News';
    $data['showLogo'] = true;

    // Obtén las noticias asociadas al usuario actual
    $data['newsList'] = $newsModel->where('user_id', $user_id)->findAll();

    // Obtén las categorías para mostrar detalles adicionales si es necesario
    $data['categories'] = $categoryModel->findAll();

    $content = view('user/my_news_cover', $data);
    return parent::renderTemplate($content, $data);
}
// Agrega esto al final de tu controlador
public function search()
{
    $session = session();
    if (!$session->get('id')) {
        return redirect()->to('/');
    }

    $user_id = session('id');

    $newsModel = model(NewsModel::class);
    $categoryModel = model(CategoryModel::class);

    // Recupera la palabra clave del formulario de búsqueda
    $searchTerm = $this->request->getPost('search');

    // Filtra las noticias por la palabra clave en el título o short_description
    $data['newsList'] = $newsModel
        ->where('user_id', $user_id)
        ->groupStart()
            ->like('title', $searchTerm)
            ->orLike('short_description', $searchTerm)
        ->groupEnd()
        ->findAll();

    // Obtén las categorías para mostrar detalles adicionales si es necesario
    $data['categories'] = $categoryModel->findAll();

    $content = view('user/my_news_cover', $data);
    return parent::renderTemplate($content, $data);
}



    
    

    
    }


    


