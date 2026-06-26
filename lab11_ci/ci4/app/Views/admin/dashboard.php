<?= $this->include('template/admin_header'); ?>

<h2>Selamat Datang, Administrator</h2>
<p style="color: #57606a; margin-bottom: 30px; font-size: 14px;">Berikut adalah rangkuman statistik data aplikasi portal berita saat ini.</p>

<div style="display: flex; gap: 20px; margin-bottom: 30px;">
    
    <div style="flex: 1; background: #ffffff; padding: 25px; border-radius: 6px; border: 1px solid #d0d7de; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
        <h4 style="font-size: 13px; text-transform: uppercase; color: #57606a; margin-bottom: 8px; font-weight: 600; letter-spacing: 0.5px;">Total Artikel</h4>
        <p style="font-size: 36px; font-weight: 700; color: #0073aa; margin: 0;">12</p>
    </div>

    <div style="flex: 1; background: #ffffff; padding: 25px; border-radius: 6px; border: 1px solid #d0d7de; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
        <h4 style="font-size: 13px; text-transform: uppercase; color: #57606a; margin-bottom: 8px; font-weight: 600; letter-spacing: 0.5px;">Status Server</h4>
        <p style="font-size: 18px; font-weight: 700; color: #2da44e; margin-top: 15px; display: flex; align-items: center; gap: 8px;">
            <span style="height: 10px; width: 10px; background-color: #2da44e; border-radius: 5px; display: inline-block;"></span>
            Active (Development)
        </p>
    </div>

</div>

<div style="background: #f6f8fa; padding: 20px; border-radius: 6px; border-left: 4px solid #0073aa; border: 1px solid #d0d7de; border-left: 4px solid #0073aa;">
    <h4 style="margin-bottom: 8px; font-size: 15px; color: #24292f; font-weight: 600;">Navigasi Cepat Administrasi</h4>
    <p style="font-size: 14px; color: #57606a; line-height: 1.5;">
        Gunakan menu navigasi hitam di atas untuk mengelola portal berita Anda. Anda dapat melihat, mengubah, atau menghapus artikel yang sudah ada melalui menu <strong>Artikel</strong>, atau langsung menerbitkan postingan baru menggunakan menu <strong>Tambah Artikel</strong>.
    </p>
</div>

<?= $this->include('template/admin_footer'); ?>