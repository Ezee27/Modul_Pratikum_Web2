<?= $this->include('template/admin_header'); ?>

<h2>Edit Artikel</h2>
<form action="" method="post">
    <p>
        <label>Judul</label>
        <input type="text" name="judul" value="<?= $artikel['judul']; ?>" class="form-control" required>
    </p>
    <p>
        <label>Isi</label>
        <textarea name="isi" class="form-control" rows="10"><?= $artikel['isi']; ?></textarea>
    </p>
    <p>
        <label>Kategori</label>
        <select name="id_kategori" class="form-control" required>
            <?php foreach($kategori as $k): ?>
                <option value="<?= $k['id_kategori']; ?>" <?= ($artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>>
                    <?= $k['nama_kategori']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>

<?= $this->include('template/admin_footer'); ?>