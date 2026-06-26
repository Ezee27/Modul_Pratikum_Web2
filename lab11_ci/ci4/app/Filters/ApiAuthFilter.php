<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class ApiAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Izinkan rute OPTIONS (CORS Preflight) lolos tanpa pemeriksaan token
        if (strtolower($request->getMethod()) === 'options') {
            return;
        }

        // 1. Mengambil data HTTP Header Authorization
        $authHeader = $request->getServer('HTTP_AUTHORIZATION') ?? $request->header('Authorization');

        if (!$authHeader) {
            // Jika header tidak ditemukan, kirim respon error 401
            $response = Services::response();
            $response->setStatusCode(401);
            return $response->setJSON([
                'status'   => 401,
                'error'    => 401,
                'messages' => 'Akses Ditolak. Token tidak ditemukan pada request!'
            ]);
        }

        // 2. Ekstrak string token (Memisahkan kata 'Bearer' dengan string token)
        $token = null;
        if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $token = $matches[1];
        }

        // 3. Validasi Token
        if (!$token || empty($token)) {
            $response = Services::response();
            $response->setStatusCode(401);
            return $response->setJSON([
                'status'   => 401,
                'error'    => 401,
                'messages' => 'Sesi Token tidak valid atau kedaluwarsa!'
            ]);
        }

        // Validasi struktur isi token buatan Modul 13
        $decodedToken = base64_decode($token);
        if (strpos($decodedToken, 'TOKEN-SECRET-') === false) {
            $response = Services::response();
            $response->setStatusCode(401);
            return $response->setJSON([
                'status'   => 401,
                'error'    => 401,
                'messages' => 'Token tidak sah atau manipulatif!'
            ]);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak diperlukan aksi setelah request diproses
    }
}