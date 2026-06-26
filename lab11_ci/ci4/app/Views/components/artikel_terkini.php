<h3>Artikel Terkini</h3>
<ul>
    <?php if (!empty($artikel) && is_array($artikel)): ?>
        <?php foreach ($artikel as $row): ?>
            <li>
                <a href="<?= base_url('/artikel/' . $row['slug']); ?>">
                    <?= $row['judul']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>Belum ada artikel terbaru.</li>
    <?php endif; ?>
</ul>