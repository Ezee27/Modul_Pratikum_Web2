<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div style="padding: 10px 0;">
    
    <div style="background: linear-gradient(135deg, #007acc, #005a87); color: #ffffff; padding: 40px; border-radius: 6px; margin-bottom: 35px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
        <span style="background-color: rgba(255,255,255,0.2); padding: 5px 12px; border-radius: 20px; font-size: 12px; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">Ruang Redaksi</span>
        <h1 style="font-size: 32px; margin-top: 15px; margin-bottom: 12px; font-weight: 600; color: #ffffff; border: none; padding: 0;"><?= $title; ?></h1>
        <p style="font-size: 16px; opacity: 0.95; max-width: 750px; line-height: 1.6; margin: 0;">
            Selamat datang di platform simulasi portal informasi digital kami. Temukan ragam publikasi artikel ilmiah, liputan berita kampus, hingga dokumentasi praktikum terintegrasi di sini.
        </p>
    </div>

    <h3 style="font-size: 20px; color: #222; margin-bottom: 20px; font-weight: 600; border-bottom: 2px solid #007acc; padding-bottom: 8px; display: inline-block;">Fokus Utama Portal</h3>
    
    <div style="display: flex; gap: 20px; margin-bottom: 35px;">
        
        <div style="flex: 1; background-color: #ffffff; padding: 20px; border-radius: 6px; border: 1px solid #e1e4e8;">
            <div style="font-size: 24px; margin-bottom: 10px;">📰</div>
            <h4 style="font-size: 16px; color: #222; margin-bottom: 8px; font-weight: 600;">Manajemen Berita</h4>
            <p style="font-size: 14px; color: #555; line-height: 1.5; margin: 0;">Penyusunan data artikel terstruktur menggunakan database relasional MySQL dan CodeIgniter 4.</p>
        </div>

        <div style="flex: 1; background-color: #ffffff; padding: 20px; border-radius: 6px; border: 1px solid #e1e4e8;">
            <div style="font-size: 24px; margin-bottom: 10px;">⚙️</div>
            <h4 style="font-size: 16px; color: #222; margin-bottom: 8px; font-weight: 600;">Panel Kontrol Admin</h4>
            <p style="font-size: 14px; color: #555; line-height: 1.5; margin: 0;">Kelola, tambah, modifikasi, dan hapus rilis berita utama secara dinamis melalui halaman admin khusus.</p>
        </div>

        <div style="flex: 1; background-color: #ffffff; padding: 20px; border-radius: 6px; border: 1px solid #e1e4e8;">
            <div style="font-size: 24px; margin-bottom: 10px;">⚡</div>
            <h4 style="font-size: 16px; color: #222; margin-bottom: 8px; font-weight: 600;">Arsitektur MVC</h4>
            <p style="font-size: 14px; color: #555; line-height: 1.5; margin: 0;">Pemisahan logika backend, manajemen rute URL, serta representasi view yang rapi dan aman.</p>
        </div>

    </div>

    <div style="background-color: #fafafa; padding: 22px 25px; border-radius: 6px; border: 1px solid #e1e4e8; border-left: 4px solid #222;">
        <h4 style="font-size: 15px; color: #222; margin-bottom: 6px; font-weight: 600;">Catatan Rilis Sistem</h4>
        <p style="font-size: 14px; color: #57606a; line-height: 1.6; margin: 0;">
            Sistem ini sedang dalam tahap pengembangan praktikum aktif laboratorium komputer. Anda dapat meninjau rincian pengkodean serta manipulasi database melalui bilah menu navigasi di atas.
        </p>
    </div>

</div>
<?= $this->endSection() ?>