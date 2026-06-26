<?= $this->include('template/header'); ?>

<div style="padding: 10px 0;">
    <div style="background-color: #007acc; color: #ffffff; padding: 45px; border-radius: 6px; margin-bottom: 35px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
        <h2 style="font-size: 32px; margin-bottom: 12px; font-weight: 600; letter-spacing: -0.5px;">Hubungi Kami</h2>
        <p style="font-size: 16px; opacity: 0.95; max-width: 850px; line-height: 1.7; margin: 0;">
            Kami berkomitmen untuk terus meningkatkan kualitas informasi yang kami sajikan. Jika Anda memiliki pertanyaan, kritik konstruktif, atau saran pengembangan terkait portal berita ini, silakan sampaikan pesan Anda melalui formulir di bawah atau hubungi layanan redaksi resmi kami.
        </p>
    </div>

    <div style="display: flex; gap: 40px; margin-bottom: 40px; align-items: flex-start;">
        
        <div style="flex: 1.5; min-width: 0; background-color: #ffffff; padding: 30px; border-radius: 6px; border: 1px solid #e1e4e8;">
            <h3 style="font-size: 20px; color: #222; margin-bottom: 20px; font-weight: 600; border-bottom: 2px solid #f0f2f5; padding-bottom: 10px;">Kirim Pesan</h3>
            
            <form action="#" method="post" onsubmit="event.preventDefault(); alert('Pesan simulasi berhasil dikirim!');">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; font-size: 14px; margin-bottom: 6px; color: #24292f;">Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan nama Anda" style="width: 100%; padding: 10px 12px; border: 1px solid #d0d7de; border-radius: 6px; font-family: inherit; font-size: 14px; box-sizing: border-box;" required>
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: 600; font-size: 14px; margin-bottom: 6px; color: #24292f;">Alamat Email</label>
                    <input type="text" placeholder="nama@email.com" style="width: 100%; padding: 10px 12px; border: 1px solid #d0d7de; border-radius: 6px; font-family: inherit; font-size: 14px; box-sizing: border-box;" required>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; font-size: 14px; margin-bottom: 6px; color: #24292f;">Isi Pesan</label>
                    <textarea placeholder="Tuliskan pesan atau masukan Anda di sini..." style="width: 100%; min-height: 140px; padding: 10px 12px; border: 1px solid #d0d7de; border-radius: 6px; font-family: inherit; font-size: 14px; box-sizing: border-box; resize: vertical;" required></textarea>
                </div>
                
                <button type="submit" style="background-color: #007acc; color: #ffffff; padding: 10px 24px; border: none; border-radius: 6px; cursor: pointer; font-size: 14px; font-weight: 600; transition: background-color 0.15s ease;">
                    Kirim Kirim
                </button>
            </form>
        </div>

        <div style="flex: 1; background-color: #fafafa; padding: 25px; border-radius: 6px; border: 1px solid #e1e4e8;">
            <h3 style="font-size: 18px; color: #222; margin-bottom: 20px; font-weight: 600;">Informasi Kontak</h3>
            
            <div style="margin-bottom: 18px;">
                <h4 style="font-size: 13px; text-transform: uppercase; color: #007acc; margin-bottom: 4px; font-weight: 700; letter-spacing: 0.5px;">Alamat</h4>
                <p style="font-size: 14px; color: #444; line-height: 1.6; margin: 0;">
                    Kampus Universitas Pelita Bangsa<br>
                    Jl. Inspeksi Kalimalang No.9, Cibatu, Cikarang Pusat, Kab. Bekasi, Jawa Barat
                </p>
            </div>
            
            <div style="margin-bottom: 18px;">
                <h4 style="font-size: 13px; text-transform: uppercase; color: #007acc; margin-bottom: 4px; font-weight: 700; letter-spacing: 0.5px;">Surat Elektronik (Email)</h4>
                <p style="font-size: 14px; color: #444; margin: 0;">
                    <a href="mailto:redaksi@pelitabangsa.ac.id" style="color: #007acc; text-decoration: none;">zaenalmaulana182@gmail.com</a>
                </p>
            </div>
            
            <div>
                <h4 style="font-size: 13px; text-transform: uppercase; color: #007acc; margin-bottom: 4px; font-weight: 700; letter-spacing: 0.5px;">Kontak Telepon</h4>
                <p style="font-size: 14px; color: #444; margin: 0; line-height: 1.5;">
                    No Handphone: +62 85694951186<br>
                </p>
            </div>
        </div>

    </div>
</div>

<?= $this->include('template/footer'); ?>