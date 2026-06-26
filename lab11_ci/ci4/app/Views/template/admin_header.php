<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        /* ==========================================
           THEME: MODERN FLAT BLUE - STANDAR MODUL
           ========================================== */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f0f2f5;
            color: #2c3e50;
            line-height: 1.6;
        }

        #container {
            width: 1100px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            min-height: 85vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #0073aa; /* Warna biru halaman utama */
            padding: 25px 35px;
            color: #ffffff;
        }

        header h1 {
            font-size: 24px;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        nav {
            background-color: #23282d; /* Hitam navigasi halaman utama */
            padding: 0 25px;
            height: 50px;
            display: flex;
            align-items: center;
        }

        nav a {
            color: #b4b9be;
            text-decoration: none;
            padding: 0 18px;
            line-height: 50px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        nav a:hover {
            color: #ffffff;
            background-color: #191e23;
        }

        nav a.active {
            color: #ffffff;
            background-color: #0073aa; /* Menandakan posisi aktif */
        }

        .admin-content {
            padding: 40px;
            flex: 1;
        }

        .admin-content h2 {
            font-size: 22px;
            font-weight: 600;
            color: #1d2327;
            margin-bottom: 25px;
            border-bottom: 2px solid #f0f2f5;
            padding-bottom: 12px;
        }

        /* Styling Elemen Form Bawaan Modul */
        form label {
            display: block;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
            color: #1d2327;
        }

        form input[type="text"], form textarea, form select {
            width: 100%;
            max-width: 700px;
            padding: 10px 14px;
            margin-bottom: 22px;
            border: 1px solid #8c8f94;
            border-radius: 4px;
            font-family: inherit;
            font-size: 14px;
            background-color: #fff;
            color: #2c3e50;
            display: block;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        form input[type="text"]:focus, form textarea:focus, form select:focus {
            border-color: #0073aa;
            outline: 0;
            box-shadow: 0 0 0 2px rgba(0, 115, 170, 0.25);
        }

        form textarea {
            min-height: 220px;
            resize: vertical;
        }

        form input[type="submit"], .btn-kirim {
            background-color: #0073aa;
            color: #ffffff;
            padding: 10px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: background-color 0.15s ease;
        }

        form input[type="submit"]:hover {
            background-color: #005a87;
        }

        /* Styling Elemen Tabel Bawaan Modul */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #f0f2f5;
            color: #1d2327;
            padding: 14px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            border-bottom: 2px solid #dcdcde;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #f0f2f5;
            font-size: 14px;
        }

        tr:hover td {
            background-color: #f6f8f9;
        }
    </style>
</head>
<body>
<div id="container">
    <header>
        <h1>Panel Kendali Admin</h1>
    </header>
    <nav>
        <?php 
            $uri = service('uri');
            $segment2 = $uri->getSegment(2); 
            $path = service('request')->getUri()->getPath();
        ?>
        <a href="<?= base_url('/admin/dashboard'); ?>" class="<?= ($segment2 == 'dashboard') ? 'active' : ''; ?>">Dashboard</a>
        <a href="<?= base_url('/admin/artikel'); ?>" class="<?= ($segment2 == 'artikel' && strpos($path, 'add') === false && strpos($path, 'edit') === false) ? 'active' : ''; ?>">Artikel</a>
        <a href="<?= base_url('/admin/artikel/add'); ?>" class="<?= ($segment2 == 'artikel' && strpos($path, 'add') !== false) ? 'active' : ''; ?>">Tambah Artikel</a>
    </nav>
    <div class="admin-content">