<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Artikel extends BaseController
{
    // 1. Dashboard Admin langsung tampil tanpa cek login
    public function dashboard()
    {
        $model = new ArtikelModel();
        $data = [
            'title'         => 'Dashboard Admin',
            'total_artikel' => $model->countAllResults()
        ];
        return view('admin/dashboard', $data);
    }

    // 2. Daftar artikel untuk umum (Mendukung AJAX & Pagination 4 Data)
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $page = $this->request->getVar('page') ?? 1;
        
        $builder = $model->select('artikel.*, kategori.nama_kategori')
                         ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
                         ->orderBy('artikel.id', 'DESC');
                         
        $artikel = $builder->paginate(4, 'default', $page);
        
        $pagerDetails = ['links' => []];
        $pager = $model->pager;
        if ($pager) {
            $details = $pager->getDetails('default');
            if (isset($details['viewData']['links'])) {
                foreach ($details['viewData']['links'] as $link) {
                    $pagerDetails['links'][] = [
                        'url'    => $link['uri'] ?? '#',
                        'title'  => $link['title'] ?? '',
                        'active' => $link['active'] ?? false
                    ];
                }
            }
        }
        
        $data = [
            'title'   => $title,
            'artikel' => $artikel,
            'pager'   => $pagerDetails
        ];
        
        if ($this->request->isAJAX()) {
            return $this->response->setJSON($data);
        }
        
        return view('artikel/index', $data);
    }

    // 3. Detail Artikel umum
    public function view($slug)
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->where('slug', $slug)->first();

        if (empty($data['artikel'])) {
            throw new PageNotFoundException('Cannot find the article.');
        }

        $data['title'] = $data['artikel']['judul'];
        return view('artikel/detail', $data);
    }

    // 4. Daftar tabel artikel internal admin (Mendukung AJAX, Filter & Sorting)
    public function admin_index()
    {
        $title = 'Daftar Artikel (Admin)';
        $model = new ArtikelModel();
        
        $q = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';
        $page = $this->request->getVar('page') ?? 1;
        
        $sort_by = $this->request->getVar('sort_by') ?? 'artikel.id';
        $sort_order = $this->request->getVar('sort_order') ?? 'DESC';
        
        $builder = $model->table('artikel')
                         ->select('artikel.*, kategori.nama_kategori')
                         ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
                         ->orderBy($sort_by, $sort_order);
            
        if ($q != '') {
            $builder->like('artikel.judul', $q);
        }
        
        if ($kategori_id != '') {
            $builder->where('artikel.id_kategori', $kategori_id);
        }
        
        $artikel = $builder->paginate(10, 'default', $page);
        
        $pagerDetails = ['links' => []];
        $pager = $model->pager;
        if ($pager) {
            $details = $pager->getDetails('default');
            if (isset($details['viewData']['links'])) {
                foreach ($details['viewData']['links'] as $link) {
                    $pagerDetails['links'][] = [
                        'url'    => $link['uri'] ?? '#',
                        'title'  => $link['title'] ?? '',
                        'active' => $link['active'] ?? false
                    ];
                }
            }
        }
        
        $data = [
            'title'       => $title,
            'q'           => $q,
            'kategori_id' => $kategori_id,
            'sort_by'     => $sort_by,
            'sort_order'  => $sort_order,
            'artikel'     => $artikel,
            'pager'       => $pagerDetails
        ];
        
        if ($this->request->isAJAX()) {
            return $this->response->setJSON($data);
        } else {
            $kategoriModel = new KategoriModel();
            $data['kategori'] = $kategoriModel->findAll();
            return view('artikel/admin_index', $data);
        }
    }

    // 5. Tambah Artikel Langsung
    public function add()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'id_kategori' => 'required|integer'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $file = $this->request->getFile('gambar');
            $namaGambar = '';

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $file->move(ROOTPATH . 'public/gambar');
                $namaGambar = $file->getName();
            }

            $model = new ArtikelModel();
            $model->insert([
                'judul'       => $this->request->getPost('judul'),
                'isi'         => $this->request->getPost('isi'),
                'slug'        => url_title($this->request->getPost('judul'), '-', true),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'gambar'      => $namaGambar,
            ]);

            return redirect()->to('/admin/artikel');
        } else {
            $kategoriModel = new KategoriModel();
            $data['kategori'] = $kategoriModel->findAll();
            $data['title']    = "Tambah Artikel";
            return view('artikel/form_add', $data);
        }
    }

    // 6. Edit Artikel Langsung
    public function edit($id)
    {
        $model = new ArtikelModel();
        
        if ($this->request->getMethod() == 'post' && $this->validate([
            'judul'       => 'required',
            'id_kategori' => 'required|integer'
        ])) {
            $model->update($id, [
                'judul'       => $this->request->getPost('judul'),
                'isi'         => $this->request->getPost('isi'),
                'id_kategori' => $this->request->getPost('id_kategori')
            ]);
            return redirect()->to('/admin/artikel');
        } else {
            $data['artikel']  = $model->find($id);
            $kategoriModel    = new KategoriModel();
            $data['kategori'] = $kategoriModel->findAll();
            $data['title']    = "Edit Artikel";
            return view('artikel/form_edit', $data);
        }
    }

    // 7. Hapus Artikel Langsung
    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);
        return redirect()->to('/admin/artikel');
    }
}