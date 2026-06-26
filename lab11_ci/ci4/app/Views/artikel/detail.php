<?= $this->include('template/header'); ?>

<div class="detail-artikel">
    <h2 class="detail-title"><?= $artikel['judul']; ?></h2>
    <div class="detail-meta">
        <span>Kategori: Berita</span>
    </div>

    <?php if (!empty($artikel['gambar'])) : ?>
        <div class="detail-img-wrapper">
            <img src="<?= base_url('gambar/' . $artikel['gambar']); ?>" alt="<?= $artikel['judul']; ?>">
        </div>
    <?php endif; ?>

    <div class="detail-text">
        <?= nl2br($artikel['isi']); ?>
    </div>
</div>

<?= $this->include('template/footer'); ?>