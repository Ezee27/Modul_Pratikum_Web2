<?= $this->include('template/admin_header'); ?>

<div style="padding: 10px 0;">
    <h2>Tambah Artikel Baru</h2>
    <hr style="border:0; height:1px; background-color:#eaecef; margin-bottom:25px;">

    <form action="<?= base_url('admin/artikel/add') ?>" method="post" enctype="multipart/form-data">
        <p style="margin-bottom: 15px;">
            <label style="display:block; font-weight:600; margin-bottom:5px;">Judul Artikel</label>
            <input type="text" name="judul" class="form-control" style="width:100%; padding:8px; border:1px solid #d0d7de; border-radius:4px;" required>
        </p>
        
        <p style="margin-bottom: 15px;">
            <label style="display:block; font-weight:600; margin-bottom:5px;">Isi Artikel</label>
            <textarea name="isi" class="form-control" rows="10" style="width:100%; padding:8px; border:1px solid #d0d7de; border-radius:4px; font-family:inherit;"></textarea>
        </p>
        
        <p style="margin-bottom: 15px;">
            <label style="display:block; font-weight:600; margin-bottom:5px;">Kategori Berita</label>
            <select name="id_kategori" class="form-control" style="width:100%; padding:8px; border:1px solid #d0d7de; border-radius:4px;" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach($kategori as $k): ?>
                    <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        
        <p style="margin-bottom: 20px;">
            <label style="display:block; font-weight:600; margin-bottom:5px;">Unggah Gambar Sampul</label>
            <input type="file" name="gambar">
        </p>
        
        <p>
            <input type="submit" value="Kirim Artikel" class="btn btn-large" style="background-color:#007acc; color:#fff; border:none; padding:10px 20px; border-radius:4px; font-weight:600; cursor:pointer;">
        </p>
    </form>
</div>

<?= $this->include('template/admin_footer'); ?>