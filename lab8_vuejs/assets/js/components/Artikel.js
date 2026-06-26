const Artikel = {
    template: `
        <div>
            <h3>Manajemen Data Artikel</h3>
            <button id="btn-tambah" @click="tambah">Tambah Data</button>

            <div v-if="showForm" class="modal">
                <div class="modal-content">
                    <span class="close" @click="showForm = false">&times;</span>
                    <h3>{{ formTitle }}</h3>
                    <form @submit.prevent="saveData">
                        <div>
                            <label>Judul</label>
                            <input type="text" v-model="formData.judul" required placeholder="Masukkan judul artikel">
                        </div>
                        <div>
                            <label>Isi Artikel</label>
                            <textarea v-model="formData.isi" rows="5" required placeholder="Masukkan konten artikel"></textarea>
                        </div>
                        <div>
                            <label>Status</label>
                            <select v-model="formData.status">
                                <option v-for="option in statusOptions" :value="option.value">
                                    {{ option.text }}
                                </option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" id="btnSimpan">Simpan</button>
                            <button type="button" @click="showForm = false">Batal</button>
                        </div>
                    </form>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th width="50" class="center-text">ID</th>
                        <th>Judul</th>
                        <th width="100">Status</th>
                        <th width="150" class="center-text">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(row, index) in artikel" :key="row.id">
                        <td class="center-text">{{ row.id }}</td>
                        <td><b>{{ row.judul }}</b></td>
                        <td>{{ statusText(row.status) }}</td>
                        <td class="center-text">
                            <button @click="edit(row)" style="cursor:pointer; margin-right:5px;">Edit</button>
                            <button @click="hapus(index, row.id)" style="cursor:pointer; color:red;">Hapus</button>
                        </td>
                    </tr>
                    <tr v-if="artikel.length === 0">
                        <td colspan="4" class="center-text">Tidak ada data artikel tersedia.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    `,
    data() {
        return {
            artikel: [],
            formData: { id: null, judul: '', isi: '', status: 0 },
            showForm: false,
            formTitle: 'Tambah Data',
            statusOptions: [
                { text: 'Draft', value: 0 },
                { text: 'Publish', value: 1 }
            ]
        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        loadData() {
            axios.get(apiUrl + '/post')
                .then(response => {
                    this.artikel = response.data || [];
                })
                .catch(error => {
                    console.log(error);
                    alert('Gagal memuat daftar artikel. Pastikan Controller API (Api/Post.php) Anda aktif.');
                });
        },
        tambah() {
            this.showForm = true;
            this.formTitle = 'Tambah Data';
            this.formData = { id: null, judul: '', isi: '', status: 0 };
        },
        edit(data) {
            this.showForm = true;
            this.formTitle = 'Ubah Data';
            this.formData = { id: data.id, judul: data.judul, isi: data.isi, status: data.status ?? 0 };
        },
        hapus(index, id) {
            if (confirm('Yakin menghapus data?')) {
                axios.delete(apiUrl + '/post/' + id)
                    .then(response => {
                        alert('Data berhasil dihapus.');
                        this.loadData();
                    })
                    .catch(error => {
                        console.log(error);
                        alert('Gagal menghapus data dari server.');
                    });
            }
        },
        saveData() {
            const payload = {
                judul: this.formData.judul,
                isi: this.formData.isi,
                status: this.formData.status
            };

            if (this.formData.id) {
                // Aksi Update (PUT)
                axios.put(apiUrl + '/post/' + this.formData.id, payload)
                    .then(response => { 
                        alert('Data sukses diperbarui.');
                        this.loadData(); 
                        this.showForm = false;
                    })
                    .catch(error => {
                        console.log(error);
                        alert('Gagal memperbarui data.');
                    });
            } else {
                // Aksi Insert (POST)
                axios.post(apiUrl + '/post', payload)
                    .then(response => { 
                        alert('Data sukses disimpan.');
                        this.loadData(); 
                        this.showForm = false;
                    })
                    .catch(error => {
                        console.log(error);
                        alert('Gagal menyimpan data baru. Periksa tab Console browser Anda.');
                    });
            }
        },
        statusText(status) {
            if (!status || status == 0) return 'Draft';
            return status == 1 ? 'Publish' : 'Draft';
        }
    }
};