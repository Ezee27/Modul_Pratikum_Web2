# Laporan Modul Pratikum 1-14 Pemograman Web2
---

## 👤 Identitas Mahasiswa
* **Nama Lengkap:** Zaenal Maulana Rizki
* **NIM:** 312410332
* **Kelas:** I241D
* **Jurusan:** Teknik Informatika
* **Mata Kuliah:** Pemrograman Web 2

---

# 🚀 Portal Informasi & Manajemen Artikel Terintegrasi (Full-Stack Web Project)

Repositori ini berisi dokumentasi dan kode sumber lengkap untuk proyek pengembangan website Portal Informasi & Manajemen Artikel. Proyek ini dikembangkan secara bertahap mulai dari rancangan statis hingga bertransformasi menjadi **Aplikasi Satu Halaman (Single Page Application - SPA)** berbasis komponen yang dinamis dengan arsitektur pemisahan antara Frontend dan Backend secara modular.

---

## 🛠️ Arsitektur Sistem & Stack Teknologi

Aplikasi ini menggunakan pendekatan arsitektur modern dengan memisahkan tanggung jawab (Separation of Concerns) antara penyedia data (API) dan penyaji antarmuka (UI):

* **Backend Engine:** CodeIgniter 4.7.3 (Framework PHP berbasis MVC yang dikonfigurasi sebagai RESTful API Server).
* **Database:** MySQL / MariaDB (Penyimpanan relasional untuk data artikel, kategori, dan user).
* **Frontend Engine:** VueJS 3 (Menggunakan Progressive JavaScript Framework untuk arsitektur SPA berbasis komponen secara internal tanpa build-step rumit).
* **Routing Client-side:** Vue Router 4 (Mengelola navigasi halaman di frontend menggunakan mekanisme *Web Hash History* `#/`).
* **HTTP Client:** Axios (Library berbasis Promise untuk melakukan request data asinkronus ke API Server).
* **Base Layout:** Vanilla CSS Modern (Sistem tata letak Fluid Grid 1200px dengan pendekatan Clean Typography).

---

## 📸 Antarmuka Aplikasi & Penjelasan Halaman

### 1. Halaman Depan / Beranda (Home)
Halaman utama yang diakses oleh publik. Berfungsi untuk menyajikan ringkasan artikel terbaru secara dinamis. Tampilan layout menggunakan grid modern berukuran maksimal **1200px** untuk memastikan kenyamanan membaca. 
* **Fitur Utama:** Banner utama, daftar ringkasan artikel terbaru dengan potongan teks pembuka, sidebar widget (kategori, arsip, dan info penulis), serta tautan baca selengkapnya yang mengarah ke detail artikel.

<img width="1909" height="988" alt="image" src="https://github.com/user-attachments/assets/75a6504e-0e6b-41ba-81fc-001b8ae11046" />

### 2. Halaman Katalog Artikel (Client-Side)
Halaman yang menampilkan seluruh daftar artikel yang telah diterbitkan (status: `Publish`). Halaman ini terintegrasi dengan fitur **Pagination Asinkronus**.
* **Fitur Utama:** Data artikel dimuat di latar belakang menggunakan Axios tanpa memicu *reload* halaman global. Menampilkan maksimal **4 artikel per halaman**. Navigasi angka halaman (1, 2, 3) di-render secara dinamis berdasarkan total data dari database.

<img width="1919" height="984" alt="image" src="https://github.com/user-attachments/assets/4ebc4113-4cf1-4c23-9bd4-b72ddd1bb3ba" />

### 3. Halaman Tentang Kami (About)
Halaman statis yang memberikan informasi mendalam mengenai profil pembuat sistem, visi-misi portal, serta deskripsi fungsionalitas web. Layout dirancang bersih dengan tipografi yang dioptimalkan untuk membaca teks naratif yang panjang.

<img width="1919" height="987" alt="image" src="https://github.com/user-attachments/assets/ac68a375-57a3-4b74-8985-3812033eb964" />

### 4. Halaman Kontak (Contact)
Menyediakan form interaktif bagi pengunjung untuk mengirimkan pesan atau masukan kepada pengelola website. Dilengkapi dengan peta lokasi interaktif atau elemen mockup informasi alamat, email, dan nomor telepon resmi.

<img width="1906" height="988" alt="image" src="https://github.com/user-attachments/assets/81a3eb45-0ea9-4083-9ff9-1422971e71ff" />

### 5. Halaman Login Admin
Gerbang masuk otentikasi bagi administrator sistem. Meskipun pada tahap integrasi akhir SPA filter keamanan dilonggarkan untuk mempermudah pengujian REST API, form ini secara arsitektur dirancang untuk mengirimkan data kredensial (`username` & `password`) ke endpoint `/api/login`.

<img width="1187" height="508" alt="image" src="https://github.com/user-attachments/assets/3cb8c8ee-b335-4e10-8c9d-c48d130739b2" />

### 6. Halaman Dasbor & Manajemen Admin (CRUD)
Panel khusus administrator untuk melakukan pengelolaan data secara penuh (*Create, Read, Update, Delete*). Di sinilah komponen VueJS memainkan peran vital untuk manipulasi data secara *real-time*.
* **Fitur Utama:** Tabel dinamis daftar seluruh artikel (ID, Judul, Status), tombol Aksi (Edit & Hapus), tombol Tambah Data yang memicu kemunculan jendela dialog interaktif (Modal Form) untuk pengisian judul, konten teks, pilihan kategori, serta status publikasi (`Draft` / `Publish`).

<img width="1919" height="990" alt="image" src="https://github.com/user-attachments/assets/ff2b5088-d1ee-4cdf-bd30-1864e80eca5f" />

---

## 📑 Rekam Jejak Perkembangan Modul (1 - 14)

### 📁 Modul 1 & 2: Fondasi HTML Semantik & Pewarnaan CSS
* Penyusunan struktur dokumen web menggunakan tag semantik HTML5 (`<header>`, `<nav>`, `<section>`, `<aside>`, `<footer>`) untuk SEO yang lebih baik.
* Penerapan CSS Reset dan aturan `box-sizing: border-box` untuk menyeragamkan kalkulasi ukuran elemen di seluruh tipe browser.

### 📁 Modul 3 & 4: Rekayasa Layout Grid 1200px & Tipografi
* Mengubah struktur layout lama menjadi tata letak lebar terpusat **1200px** agar website terlihat seimbang di monitor resolusi tinggi.
* Implementasi teknik float dengan bantuan *clearfix* (`#wrapper::after`) untuk merapikan susunan konten utama berdampingan dengan kolom sidebar (*widget*).

### 📁 Modul 5: Ekspansi Halaman Statis & Navigasi
* Penyusunan halaman pelengkap informasi: *About Me*, *Kontak*, *FAQs*, dan *Terms of Service (ToS)* menggunakan skema warna terpadu yang konsisten.

### 📁 Modul 6: Migrasi ke Framework CodeIgniter 4 & Basis Data
* Memecah potongan HTML menjadi struktur template engine yang dinamis menggunakan fitur `layout` bawaan CodeIgniter 4 (`app/Views/layout/main.php`).
* Membuat database MySQL serta merancang tabel `artikel` dan `kategori`. Pengambilan data artikel di level Controller mulai memanfaatkan teknik `JOIN` SQL via Query Builder CI4.

### 📁 Modul 7: Validasi Input Server & Manajemen Upload Gambar
* Membangun form tambah data artikel di sisi backend CI4.
* Menambahkan fungsi upload file gambar otomatis ke dalam direktori `public/gambar/`.
* Implementasi validasi server-side (`isValid()`) untuk memeriksa ekstensi file, ukuran maksimal gambar, serta pembuatan URL ramah mesin pencari secara otomatis (`slug`) menggunakan fungsi `url_title()`.

### 📁 Modul 8: Bypass Filter Keamanan untuk Eksperimen CRUD
* Melonggarkan sementara mekanisme penguncian session login guna mempermudah proses pengujian, pengosongan, dan manipulasi data artikel langsung pada rute grup `admin/*`.

### 📁 Modul 9 & 10: Era Asynchronous JavaScript & AJAX jQuery
* Merombak sistem pemuatan artikel umum dari yang awalnya berbasis reload halaman penuh (*synchronous*) menjadi berbasis muat data latar belakang (*asynchronous*) memanfaatkan method `$.ajax()` milik library jQuery.

### 📁 Modul 11: Sistem Pagination Dinamis & Anti-Cache
* Membatasi pemuatan katalog utama maksimal **4 data artikel per halaman**. Komponen navigasi nomor halaman digenerasikan secara real-time via skrip JavaScript.
* Pemasangan trik parameter waktu buster (`?v=<?= time(); ?>`) pada pemanggilan `style.css` untuk memaksa browser selalu membaca baris kode gaya visual terbaru dari server daripada memuat memori cache usang.

### 📁 Modul 12: Arsitektur RESTful API Resource Controller
* Membangun kluster Controller mandiri khusus API di dalam folder `app/Controllers/Api/Post.php` yang mewarisi class `ResourceController` CodeIgniter 4.
* Menghasilkan endpoint API murni berbasis format data JSON yang merespon metode HTTP `GET` (ambil data), `POST` (simpan baru), `PUT` (perbarui data), dan `DELETE` (hapus data).

### 📁 Modul 13: Transformasi SPA (Single Page Application) VueJS 3
* Menyuntikkan library VueJS 3 dan Vue Router 4 lewat CDN pada file `index.html`.
* Membagi halaman menjadi komponen-komponen JavaScript modular (`Home`, `Artikel`, `About`) yang diatur navigasinya menggunakan skema URL Hash History (`#/`).

### 📁 Modul 14: Pembersihan Jalur Otorisasi Akhir & Integrasi Sempurna
* Menghapus seluruh *Axios Interceptors* dan aturan *Navigation Guards* login pada file frontend `assets/js/app.js` karena sistem beralih menggunakan akses tanpa token.
* Mematikan filter `apiauth` dan filter `auth` global pada file `app/Config/Filters.php` dan `app/Config/Routes.php` di sisi CodeIgniter 4, sehingga frontend VueJS dapat leluasa mengeksekusi operasi CRUD secara instan ke database.

---

## ⚙️ Penjelasan Nilai & Logika Kode VueJS (`Artikel.js`)

Komponen `Artikel` pada file `assets/js/components/Artikel.js` bertanggung jawab penuh atas manajemen data di panel admin tanpa memicu penyegaran halaman (*zero-reload*). Berikut adalah rincian nilai properti (*reactive data*) dan fungsi (*methods*) yang bekerja di dalamnya:

### 1. Struktur Data Reactivity (`data()`)
* `artikel: []`: Array kosong yang berfungsi sebagai tempat penampungan seluruh objek data artikel yang berhasil ditarik dari server melalui API. Setiap kali array ini terisi, Vue akan otomatis me-render baris tabel secara real-time.
* `formData: { id: null, judul: '', isi: '', status: 0 }`: Objek reaktif yang diikat (*two-way data binding*) menggunakan direktif `v-model` ke elemen form input di dalam modal. Berfungsi menyimpan data sementara saat admin sedang mengetik artikel baru atau mengubah artikel lama.
* `showForm: false`: Variabel boolean penanda visibilitas modal form. Jika bernilai `true`, modal form input akan muncul menyembul ke layar, dan jika `false` modal tersembunyi kembali (`v-if="showForm"`).
* `formTitle: 'Tambah Data'`: Menyimpan teks string dinamis untuk judul header modal, otomatis berubah menjadi "Tambah Data" atau "Ubah Data" tergantung tombol aksi yang diklik oleh admin.

### 2. Penjelasan Fungsi Utama (`methods`)
* `loadData()`: Menjalankan perintah `axios.get(apiUrl + '/post')` ke server. Begitu mendapat respon sukses dari CodeIgniter, nilai `this.artikel` diisi dengan data JSON dari database. Jika gagal, akan memicu *alert exception catch*.
* `tambah()`: Mengubah status `this.showForm = true`, menyetel `this.formTitle` menjadi baru, dan mengosongkan seluruh properti di dalam `this.formData` agar form bersih dari sisa pengetikan sebelumnya.
* `edit(data)`: Fungsi yang dipicu saat tombol Edit di baris tabel diklik. Fungsi ini membawa objek data artikel terpilih, memunculkan modal form, lalu menyalin nilai `id`, `judul`, `isi`, dan `status` artikel tersebut ke dalam `this.formData` agar admin tinggal mengubah isinya.
* `saveData()`: Fungsi krusial penentu arah manipulasi data. Fungsi ini mengemas nilai inputan menjadi objek `payload`.
    * **Kondisi Update:** Jika `this.formData.id` terdeteksi memiliki angka ID, fungsi akan mengeksekusi `axios.put()` menuju rute API `/post/id`.
    * **Kondisi Insert:** Jika properti ID bernilai `null`, fungsi akan mengeksekusi `axios.post()` menuju rute API `/post`.
    Setelah proses selesai, fungsi memanggil `this.loadData()` untuk memperbarui isi tabel secara instan dan menutup modal form (`this.showForm = false`).
* `hapus(index, id)`: Menampilkan dialog konfirmasi bawaan browser `confirm()`. Jika admin memilih 'OK', Axios akan mengirimkan request bermetode `DELETE` ke rute API `/post/id`. Setelah sukses terhapus di database server, Vue langsung memuat ulang data tabel.

---

## ⚙️ Panduan Instalasi & Pengoperasian Lokal

### 1. Kloning Proyek
```bash
git clone [https://github.com/username-anda/nama-repo.git](https://github.com/username-anda/nama-repo.git)
cd nama-repo

```

### 2. Penyiapan Database MySQL

* Aktifkan service **Apache** dan **MySQL** melalui XAMPP Control Panel.
* Buka web browser dan akses halaman **phpMyAdmin** (`http://localhost/phpmyadmin`).
* Buat database baru bernama `nama_database_anda`.
* Impor file struktur tabel atau jalankan perintah SQL berikut untuk membuat tabel `artikel`:

```sql
CREATE TABLE `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

```

### 3. Konfigurasi Environment Backend (CodeIgniter 4)

* Masuk ke folder direktori CodeIgniter 4 proyek Anda.
* Salin file bernama `.env.example` dan ubah namanya menjadi **`.env`**.
* Buka file `.env` tersebut menggunakan teks editor, cari dan sesuaikan baris kredensial database berikut:

```env
database.default.hostname = localhost
database.default.database = nama_database_anda
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi

```

### 4. Menjalankan Server Lokal

* Buka terminal/command prompt tepat di dalam folder root CodeIgniter 4 Anda, lalu eksekusi perintah pemanggil server bawaan:

```bash
php spark serve

```

* Backend REST API kini aktif berjalan di alamat: `http://localhost:8080`

### 5. Menjalankan Frontend Aplikasi SPA VueJS

* Buka folder proyek tempat file frontend `index.html` berada.
* Klik kanan pada file `index.html` lalu pilih opsi **Open with Live Server** (Jika menggunakan VS Code) untuk menghindari batasan kebijakan CORS lokal.
* Aplikasi frontend SPA siap digunakan penuh melalui alamat lokal Live Server Anda (biasanya `http://127.0.0.1:5500/index.html`).

---
