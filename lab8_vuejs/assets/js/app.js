const { createApp } = Vue;
const { createRouter, createWebHashHistory } = VueRouter;

// Tentukan lokasi API REST End Point sesuai port lokal proyek Anda (Port 8080)
const apiUrl = 'http://localhost:8080';

// =========================================================================
// AXIOS INTERCEPTORS (Dibersihkan dari penyuntikan token JWT)
// =========================================================================
// Cukup kembalikan konfigurasi standar tanpa pengecekan token atau error 401
axios.interceptors.request.use(
    (config) => {
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

axios.interceptors.response.use(
    (response) => {
        return response;
    },
    (error) => {
        return Promise.reject(error);
    }
);

// =========================================================================
// 1. Definisikan mapping rute URL ke Komponen (Tanpa Proteksi & Rute Login)
// =========================================================================
const routes = [
    { path: '/', component: Home },
    { path: '/artikel', component: Artikel },
    { path: '/about', component: About }
];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

// NOTE: Bagian Navigation Guards (router.beforeEach) telah DIHAPUS TOTAL 
// agar perpindahan rute langsung tembus tanpa pengecekan status login.

// =========================================================================
// 2. Inisialisasi Root Instance VueJS Application
// =========================================================================
const app = createApp({
    data() {
        return {
            // Kita kunci ke true agar menu navigasi menganggap user selalu aktif
            isLoggedIn: true 
        }
    },
    mounted() {
        // Tidak perlu lagi memuat data dari localStorage
        this.isLoggedIn = true;
    },
    methods: {
        logout() {
            // Jika tombol logout tidak sengaja tertekan, arahkan saja kembali ke beranda
            this.$router.push('/');
        }
    }
});

app.use(router);
app.mount('#app');