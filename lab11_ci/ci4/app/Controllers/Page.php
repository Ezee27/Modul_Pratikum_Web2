<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function home()
    {
        return view('home', [
            'title' => 'Halaman Home',
            'content' => 'Selamat datang di halaman utama praktikum ini.'
        ]);
    }

    public function about()
    {
        return view('about', [
            'title' => 'Halaman About',
            'content' => 'Ini adalah halaman about yang menjelaskan tentang isi halaman ini.'
        ]);
    }

    public function artikel()
    {
        return view('artikel', [
            'title' => 'Halaman Artikel',
            'content' => 'Ini adalah halaman artikel.'
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'title' => 'Halaman Kontak',
            'content' => 'Ini adalah halaman kontak yang bisa Anda hubungi.'
        ]);
    }

    public function faqs()
    {
        echo "Ini halaman FAQ";
    }

    public function tos()
    {
        echo "Ini halaman Term of Services";
    }
}