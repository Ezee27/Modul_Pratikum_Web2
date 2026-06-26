<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ArtikelModel;

class Post extends ResourceController
{
    protected $modelName = 'App\Models\ArtikelModel';
    protected $format    = 'json'; // Memastikan semua respon otomatis berbentuk JSON untuk Vue

    // 1. Mengambil semua data artikel (Merespon GET /post)
    public function index()
    {
        // Mengambil seluruh artikel dan mengurutkan dari yang terbaru
        $data = $this->model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    // 2. Menyimpan artikel baru (Merespon POST /post)
    public function create()
    {
        // Menangkap payload JSON yang dikirim oleh Axios Vue
        $json = $this->request->getJSON(); 
        
        if ($json) {
            $data = [
                'judul'  => $json->judul,
                'isi'    => $json->isi,
                'status' => $json->status ?? 0,
                'slug'   => url_title($json->judul, '-', true)
            ];
        } else {
            // Fallback jika dikirim via form biasa
            $data = [
                'judul'  => $this->request->getPost('judul'),
                'isi'    => $this->request->getPost('isi'),
                'status' => $this->request->getPost('status') ?? 0,
                'slug'   => url_title($this->request->getPost('judul') ?? 'artikel-baru', '-', true)
            ];
        }

        if ($this->model->insert($data)) {
            return $this->respondCreated(['status' => 'success', 'message' => 'Data berhasil disimpan']);
        }
        return $this->fail('Gagal menyimpan data');
    }

    // 3. Memperbarui artikel yang sudah ada (Merespon PUT /post/id)
    public function update($id = null)
    {
        $json = $this->request->getJSON();
        
        if ($json) {
            $data = [
                'judul'  => $json->judul,
                'isi'    => $json->isi,
                'status' => $json->status ?? 0
            ];
        } else {
            $data = $this->request->getRawInput();
        }

        if ($this->model->update($id, $data)) {
            return $this->respond(['status' => 'success', 'message' => 'Data berhasil diubah']);
        }
        return $this->fail('Gagal mengubah data');
    }

    // 4. Menghapus artikel (Merespon DELETE /post/id)
    public function delete($id = null)
    {
        // Cek dulu apakah datanya ada
        if ($this->model->find($id)) {
            $this->model->delete($id);
            return $this->respondDeleted(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        }
        return $this->failNotFound('Data artikel tidak ditemukan');
    }
}