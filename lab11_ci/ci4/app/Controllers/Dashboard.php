<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        // Sesuaikan dengan nama view dashboard lu, misal: 'admin/dashboard_view'
        return view('admin/dashboard_view', $data); 
    }
}