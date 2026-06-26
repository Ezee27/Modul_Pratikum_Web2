<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<div style="margin-bottom: 20px;">
    <form id="search-form" style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
        <input type="text" name="q" id="search-box" value="<?= $q; ?>" placeholder="Cari judul artikel..." style="padding: 6px; width: 200px;">
        
        <select name="kategori_id" id="category-filter" style="padding: 6px;">
            <option value="">Semua Kategori</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
            <?php endforeach; ?>
        </select>
        
        <select name="sort_by" id="sort-by" style="padding: 6px;">
            <option value="artikel.id">Urutkan: ID</option>
            <option value="artikel.judul">Urutkan: Judul</option>
        </select>
        
        <select name="sort_order" id="sort-order" style="padding: 6px;">
            <option value="DESC">Menurun (DESC)</option>
            <option value="ASC">Menaik (ASC)</option>
        </select>
        
        <input type="submit" value="Cari" style="padding: 6px 15px; cursor: pointer;">
    </form>
</div>

<div id="loading-indicator" style="display: none; font-weight: bold; color: blue; margin-bottom: 15px;">
    Sedang mengambil data dari server...
</div>

<div id="article-container"></div>
<div id="pagination-container" style="margin-top: 15px;"></div>

<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
<script>
$(document).ready(function() {
    const articleContainer = $('#article-container');
    const paginationContainer = $('#pagination-container');
    const loadingIndicator = $('#loading-indicator');
    const searchForm = $('#search-form');

    const fetchData = (url) => {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            beforeSend: function() {
                loadingIndicator.show(); // Tampilkan tulisan loading
            },
            success: function(data) {
                loadingIndicator.hide(); // Sembunyikan tulisan loading jika sukses
                renderArticles(data.artikel);
                renderPagination(data.pager, data.q, data.kategori_id, data.sort_by, data.sort_order);
            },
            error: function() {
                loadingIndicator.hide();
                articleContainer.html('<p style="color:red;">Gagal mengambil data dari server.</p>');
            }
        });
    };

    const renderArticles = (articles) => {
        let html = '<table class="table" border="1" width="100%" style="border-collapse: collapse; text-align: left;">';
        html += '<thead><tr style="background:#f4f4f4;"><th style="padding:8px;">ID</th><th style="padding:8px;">Judul</th><th style="padding:8px;">Kategori</th><th style="padding:8px;">Status</th><th style="padding:8px;">Aksi</th></tr></thead><tbody>';
        
        if (articles.length > 0) {
            articles.forEach(article => {
                let kategori = article.nama_kategori ? article.nama_kategori : '-';
                let isiPotong = article.isi ? article.isi.substring(0, 50) : '';
                
                html += `<tr>
                    <td style="padding:8px;">${article.id}</td>
                    <td style="padding:8px;">
                        <b>${article.judul}</b>
                        <p style="margin:5px 0 0 0;"><small>${isiPotong}...</small></p>
                    </td>
                    <td style="padding:8px;">${kategori}</td>
                    <td style="padding:8px;">${article.status}</td>
                    <td style="padding:8px;">
                        <a class="btn" href="<?= base_url('/admin/artikel/edit/'); ?>/${article.id}">Ubah</a> | 
                        <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/artikel/delete/'); ?>/${article.id}" style="color:red;">Hapus</a>
                    </td>
                </tr>`;
            });
        } else {
            html += '<tr><td colspan="5" style="text-align: center; padding:10px;">Tidak ada data artikel ditemukan.</td></tr>';
        }
        
        html += '</tbody></table>';
        articleContainer.html(html);
    };

    const renderPagination = (pager, q, kategori_id, sort_by, sort_order) => {
        let html = '<nav><ul class="pagination" style="display:flex; list-style:none; padding:0; gap:5px;">';
        
        if (pager && pager.links && pager.links.length > 0) {
            pager.links.forEach(link => {
                let url = link.url !== '#' ? `${link.url}&q=${q}&kategori_id=${kategori_id}&sort_by=${sort_by}&sort_order=${sort_order}` : '#';
                let activeStyle = link.active ? 'background: blue; color: white;' : 'background: #eee;';
                
                html += `<li class="page-item">
                    <a class="page-link" href="${url}" style="padding: 5px 10px; text-decoration: none; border: 1px solid #ccc; ${activeStyle}">${link.title}</a>
                </li>`;
            });
        }
        
        html += '</ul></nav>';
        paginationContainer.html(html);
    };

    // Deteksi klik pada pagination link dinamis
    $(document).on('click', '.pagination .page-link', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        if (url !== '#') {
            fetchData(url);
        }
    });

    // Deteksi submit form pencarian
    searchForm.on('submit', function(e) {
        e.preventDefault();
        const q = $('#search-box').val();
        const kategori_id = $('#category-filter').val();
        const sort_by = $('#sort-by').val();
        const sort_order = $('#sort-order').val();
        
        fetchData(`<?= base_url('admin/artikel'); ?>?q=${q}&kategori_id=${kategori_id}&sort_by=${sort_by}&sort_order=${sort_order}`);
    });

    // Submit otomatis saat filter kategori atau opsi sorting berubah
    $('#category-filter, #sort-by, #sort-order').on('change', function() {
        searchForm.trigger('submit');
    });

    // Eksekusi pemuatan data awal
    fetchData(`<?= base_url('admin/artikel'); ?>`);
});
</script>

<?= $this->include('template/admin_footer'); ?>