<?= $this->include('template/header'); ?>

<h1>Data Artikel</h1>

<div id="artikelContainer">
    <p class="loading-msg">Loading data...</p>
</div>

<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>

<script>
$(document).ready(function() {
    
    // Fungsi untuk mengambil data artikel dari server menggunakan AJAX (Tetap Dipertahankan)
    function loadData() {
        $.ajax({
            url: "<?= base_url('ajax/getData') ?>", 
            method: "GET",
            dataType: "json",
            success: function(data) {
                var htmlContent = "";
                
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        var row = data[i];
                        
                        htmlContent += '<article class="entry">';
                        htmlContent += '    <h2>';
                        htmlContent += '        <a href="<?= base_url('/artikel/') ?>/' + row.slug + '">' + row.judul + '</a>';
                        htmlContent += '    </h2>';
                        
                        // Menampilkan gambar jika ada di database
                        if (row.gambar) {
                            htmlContent += '    <img src="<?= base_url('/gambar/') ?>/' + row.gambar + '" alt="' + row.judul + '" style="max-width: 200px; display: block; margin-bottom: 10px;">';
                        }
                        
                        // Memotong isi artikel sampai 200 karakter
                        var isiPotong = row.isi ? row.isi.substring(0, 200) : '';
                        htmlContent += '    <p>' + isiPotong + '...</p>';
                        htmlContent += '</article>';
                        htmlContent += '<hr class="divider" />';
                    }
                } else {
                    htmlContent = '<article class="entry"><h2>Belum ada data.</h2></article>';
                }
                
                // Masukkan konten ke dalam kontainer utama
                $('#artikelContainer').html(htmlContent);
            }
        });
    }

    // Jalankan fungsi loadData saat pertama kali halaman dibuka
    loadData();
});
</script>

<?= $this->include('template/footer'); ?>