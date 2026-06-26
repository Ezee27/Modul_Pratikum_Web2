<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Ajax extends BaseController
{
    public function index()
    {
        return view('ajax/index');
    }

    public function getData()
    {
        $model = new ArtikelModel();
        $data  = $model->findAll();
        
        return $this->response->setJSON($data);
    }

    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);
        
        $data = [
            'status' => 'OK'
        ];
        
        return $this->response->setJSON($data);
    }
}