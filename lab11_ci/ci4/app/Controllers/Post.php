<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ArtikelModel;

class Post extends ResourceController
{
    use ResponseTrait;

    // Menampilkan seluruh data pada database (GET /post)
    public function index()
    {
        $model = new ArtikelModel();
        $data = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data, 200);
    }

    // Menampilkan suatu data spesifik dari database (GET /post/{id})
    public function show($id = null)
    {
        $model = new ArtikelModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }

    // Menambahkan data baru ke database via JSON Payload (POST /post)
    public function create()
    {
        $model = new ArtikelModel();
        $json = $this->request->getJSON();
        
        if (!empty($json)) {
            // Mengambil langsung properti utama JSON
            $judul = $json->judul ?? null;
            $isi   = $json->isi ?? null;
            $status = $json->status ?? 0;

            // Validasi manual agar memberikan respon terstruktur
            if (empty($judul)) {
                return $this->failValidationErrors(['judul' => 'The judul field is required.']);
            }

            $data = [
                'judul'  => $judul,
                'isi'    => $isi,
                'status' => $status,
                'slug'   => url_title($judul, '-', true)
            ];
            
            $model->insert($data);
            
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Data artikel berhasil ditambahkan.'
                ]
            ];
            return $this->respondCreated($response);
        }
        
        return $this->fail('Data input tidak valid atau kosong.', 400);
    }

    // Mengubah suatu data pada database via JSON Payload (PUT /post/{id})
    public function update($id = null)
    {
        $model = new ArtikelModel();
        $json = $this->request->getJSON();
        
        // JALAN KELUAR MUTLAK: Jika $id rute bernilai null/kosong, ambil dari ujung segmen URL asli request
        if (empty($id)) {
            $segments = $this->request->getUri()->getSegments();
            $id = end($segments); 
        }
        
        if (!empty($json) && !empty($id)) {
            $judul = $json->judul ?? null;
            $isi   = $json->isi ?? null;
            $status = $json->status ?? 0;

            if (empty($judul)) {
                return $this->failValidationErrors(['judul' => 'The judul field is required untuk pembaruan.']);
            }

            // Pastikan data yang di-update ada di database
            $cekData = $model->find($id);
            if (!$cekData) {
                return $this->failNotFound('Data dengan ID ' . $id . ' tidak ditemukan di server.');
            }

            $data = [
                'judul'  => $judul,
                'isi'    => $isi,
                'status' => $status,
                'slug'   => url_title($judul, '-', true)
            ];

            $model->update($id, $data);
            
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data artikel berhasil diubah.'
                ]
            ];
            return $this->respond($response, 200);
        }
        
        return $this->fail('Gagal memperbarui data, parameter ID tidak valid.', 400);
    }

    // Menghapus data dari database (DELETE /post/{id})
    public function delete($id = null)
    {
        $model = new ArtikelModel();
        
        // Fallback jika ID delete tidak tertangkap rute akibat CORS preflight intercept
        if (empty($id)) {
            $segments = $this->request->getUri()->getSegments();
            $id = end($segments);
        }

        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data artikel berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}