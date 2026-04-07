# Sistem Peminjaman Laravel

Sistem Peminjaman Laravel adalah aplikasi manajemen peminjaman barang laboratorium berbasis Laravel. Aplikasi ini mendukung alur peminjaman oleh mahasiswa, pengelolaan barang oleh admin, dan pengelolaan data pengguna oleh super admin.

## Fitur Utama

- Autentikasi login berbasis Laravel UI
- Multi role: `SuperAdmin`, `Admin`, dan `mahasiswa`
- Manajemen data admin dan mahasiswa
- Manajemen laboratorium dan barang
- Keranjang peminjaman barang
- Proses pengajuan, persetujuan, penolakan, dan penyelesaian peminjaman
- Seeder data awal untuk lab dan akun demo

## Teknologi yang Digunakan

- PHP 8.1+
- Laravel 10
- MySQL
- Vite
- Bootstrap
- JWT Auth

## Struktur Peran Pengguna

### Super Admin

- Mengelola data admin
- Mengelola data mahasiswa
- Melihat dashboard utama

### Admin

- Mengelola data barang
- Melihat permintaan peminjaman
- Menyetujui, menolak, dan menyelesaikan peminjaman
- Melihat data pengembalian

### Mahasiswa

- Melihat daftar lab dan barang
- Menambahkan barang ke keranjang
- Checkout peminjaman
- Melihat riwayat peminjaman

## Cara Setup Setelah Clone

### 1. Clone repository

```bash
git clone https://github.com/rifkiizzulhaq/sistem-peminjaman-laravel.git
cd sistem-peminjaman-laravel
```

### 2. Install dependency PHP

```bash
composer install
```

### 3. Install dependency frontend

```bash
npm install
```

### 4. Buat file environment

```bash
cp .env.example .env
```

Jika menggunakan Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Atur koneksi database di file `.env`

Sesuaikan bagian berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

Project ini juga bisa menggunakan MySQL cloud seperti Aiven, selama kredensial database di `.env` sudah benar.

### 7. Jalankan migration dan seeder

```bash
php artisan migrate --seed
```

Jika ingin mengulang database dari awal:

```bash
php artisan migrate:fresh --seed
```

### 8. Jalankan server Laravel

```bash
php artisan serve
```

### 9. Jalankan Vite

```bash
npm run dev
```

Setelah itu aplikasi bisa diakses di:

- Laravel: `http://127.0.0.1:8000`

## Akun Demo Seeder

Setelah menjalankan `php artisan migrate --seed`, akun berikut akan tersedia:

| Role | Email | Username | Password |
| --- | --- | --- | --- |
| SuperAdmin | `SuperAdmin@polindra.ac.id` | `Superadmin` | `123456` |
| Admin | `Admin@polindra.ac.id` | `Admin` | `123456` |
| Mahasiswa | `mahasiswa@polindra.ac.id` | `mahasiswa` | `123456` |

Seeder juga membuat data lab awal:

- IOT
- Robotika
- Multimedia

## Perintah Penting

```bash
php artisan serve
php artisan migrate
php artisan migrate --seed
php artisan migrate:fresh --seed
npm run dev
npm run build
```

## Catatan Deployment

- Project ini sudah memiliki `Dockerfile` untuk kebutuhan deploy berbasis container
- Jika deploy ke platform cloud, pastikan `APP_ENV=production` dan `APP_DEBUG=false`
- Pastikan `APP_KEY`, `APP_URL`, dan seluruh variabel `DB_*` sudah diisi dengan benar

## Catatan Tambahan

- Session default masih menggunakan `file`
- Cache default masih menggunakan `file`
- Untuk production, Anda bisa menyesuaikan session, cache, queue, dan storage sesuai kebutuhan server

## License

Project ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).
