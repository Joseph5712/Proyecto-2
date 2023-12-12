<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\NewsController;
use App\Models\NewsSourcesModel;
use App\Models\CategoryModel;
use App\Models\NewsModel;
use DOMDocument;

class UserController extends BaseController
{
    public function index()
{
    
}

    public function show_sources_input()
    {
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }
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
    $session = session();
    if (!$session->get('id')) {
        return redirect()->to('/');
    }

    $user_id = session('id'); // Obtén el user_id de la sesión

    $categoryModel = model(CategoryModel::class);
    $data['categories'] = $categoryModel->findAll();

    $data['pageTitle'] = 'My News Cover';
    $data['showLogo'] = true;
    $newsSourcesModel = model(NewsSourcesModel::class);
    
    // Filtra las fuentes de noticias por user_id
    $data['news_sources'] = $newsSourcesModel->where('user_id', $user_id)->findAll();

    $content = view('user/news_sources', $data);
    return parent::renderTemplate($content, $data);
}


    public function create(){
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }
        $categoryModel= model(CategoryModel::class);
        $data['categories'] = $categoryModel->findAll();

        $data['pageTitle'] = 'New source';
        $data['actionTitle'] = 'Create new source';

        $content = view('user/form_news_sources', $data);
        return parent::renderTemplate($content, $data);
    }

    public function edit($id){
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }
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
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }
        $newsSourcesModel = model(NewsSourcesModel::class);
        $newsModel = model(NewsModel::class);
    
        $user_id = session('id');
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'url' => $this->request->getVar('url'),
            'category_id' => $this->request->getVar('category_id'),
            'user_id' => $user_id,
        ];
    
        if ($id) {
            // Elimina las noticias asociadas a esta fuente antes de actualizar
            $newsModel->where('news_source_id', $id)->delete();
            $newsSourcesModel->update($id, $data);
        } else {
            $insertedId = $newsSourcesModel->insert($data);
            $this->add_news($insertedId, $data['url'], $user_id, $data['category_id']);
        }
        
        return $this->response->redirect(site_url('user/'));
    }
    
    public function add_news($newsSourceId, $rssUrl, $user_id, $category_id) {
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }
        $newsModel = model(NewsModel::class);
    
        $rss = simplexml_load_file($rssUrl);
    
        foreach ($rss->channel->item as $item) {
            $title = (string)$item->title;
            $description = (string)$item->description;
            $link = (string)$item->link;
            $pubDate = strtotime((string)$item->pubDate);
    
            $doc = new DOMDocument();
            $doc->loadHTML($description);
            $img = $doc->getElementsByTagName('img')->item(0);
            if ($img) {
                $imgurl = $img->getAttribute('src');
            } else {
                $imgurl = 'https://www.shutterstock.com/image-vector/default-ui-image-placeholder-wireframes-600nw-1037719192.jpg';
            }
    
            $description = strip_tags($description);
            $description = substr($description, 0, 200);
    
            // Verificar si la noticia ya existe en la base de datos por el enlace permanente
            $existingNews = $newsModel->where('perman_link', $link)->first();
    
            if (empty($existingNews)) {
                // La noticia no existe, insertarla en la base de datos
                $newsModel->insert([
                    'title'             => $title,
                    'short_description' => $description,
                    'perman_link'       => $link,
                    'date'              => date('Y-m-d H:i:s', $pubDate),
                    'img_url'           => $imgurl,
                    'news_source_id'    => $newsSourceId,
                    'user_id'           => $user_id,
                    'category_id'       => $category_id,
                ]);
            }
        }
    }

    public function delete($id = null){
        $session = session();
        if (!$session->get('id')) {
            return redirect()->to('/');
        }
        $newsSourcesModel = model(NewsSourcesModel::class);
        $newsModel = model(NewsModel::class);
    
        // Obtener las noticias asociadas a la fuente que se eliminará
        $associatedNews = $newsModel->where('news_source_id', $id)->findAll();
    
        // Eliminar las noticias asociadas
        foreach ($associatedNews as $news) {
            $newsModel->delete($news['id']);
        }
    
        // Ahora elimina la fuente
        $newsSourcesModel->delete($id);
    
        return $this->response->redirect(site_url('/user'));
    }
    
}
