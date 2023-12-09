<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsSourcesModel;

class UserController extends BaseController
{
    public function index()
    {
        $data['pageTitle'] = 'My News Cover';
        $data['showLogo'] = true;
        $newsSourcesModel= model(NewsSourcesModel::class);
        $data['news_sources'] = $newsSourcesModel->findAll();

        $content = view('user/my_news_cover', $data);
        return parent::renderTemplate($content, $data);
    }
}
