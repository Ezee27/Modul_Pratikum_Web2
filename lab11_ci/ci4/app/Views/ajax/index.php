<?= $this->include('template/header'); ?> <h1>Data Artikel</h1>
<table class="table-data" id="artikelTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody> </table>

<script src="<?= base_url('assets/js/jquery-4.0.0.min.js') ?>"></script>

<script>
$(document).ready(function() {
    
    // Fungsi untuk menampilkan teks "Loading"
    function showLoadingMessage() {
        $('#artikelTable tbody').html('<tr><td colspan="5">Loading data...</td></tr>');
    }

    // Fungsi untuk mengambil data dari server tanpa refresh (Mendukung data Kategori)
    function loadData() {
        showLoadingMessage();
        $.ajax({
            url: "<?= base_url('ajax/getData') ?>",
            method: "GET",
            dataType: "json",
            success: function(data) {
                var tableBody = "";
                for (var i = 0; i < data.length; i++) {
                    var row = data[i];
                    var kategori = row.nama_kategori ? row.nama_kategori : 'Tanpa Kategori';
                    tableBody += '<tr>';
                    tableBody += '<td>' + row.id + '</td>';
                    tableBody += '<td>' + row.judul + '</td>';
                    tableBody += '<td>' + kategori + '</td>';
                    tableBody += '<td>' + (row.status ? row.status : '---') + '</td>';
                    tableBody += '<td>';
                    tableBody += '<a href="<?= base_url('artikel/edit/') ?>' + row.id + '">Edit</a> ';
                    tableBody += '<a href="#" class="btn-delete" data-id="' + row.id + '">Delete</a>';
                    tableBody += '</td>';
                    tableBody += '</tr>';
                }
                $('#artikelTable tbody').html(tableBody);
            }
        });
    }

    // Jalankan fungsi saat halaman dibuka
    loadData();

    // Fungsi menghapus data saat tombol delete diklik
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        
        if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
            $.ajax({
                url: "<?= base_url('ajax/delete/') ?>/" + id,
                method: "POST", // Menggunakan POST agar aman
                dataType: "json",
                success: function(data) {
                    loadData(); // Refresh tabel otomatis
                }
            });
        }
    });
});
</script>

<?= $this->include('template/footer'); ?>