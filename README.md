# 🚀 REST API Produk - Laravel

REST API lengkap untuk manajemen produk dengan operasi CRUD (Create, Read, Update, Delete). API ini menggunakan Laravel 12 dengan response dalam bahasa Indonesia.

## 📋 Fitur

- ✅ **CRUD Lengkap** untuk produk
- ✅ **Validasi Input** dengan pesan dalam bahasa Indonesia  
- ✅ **Response JSON** terstruktur
- ✅ **Error Handling** yang proper
- ✅ **Database MySQL** dengan migration dan seeder
- ✅ **Dokumentasi API** lengkap dengan contoh Postman

## 📦 Prerequisites

Sebelum memulai, pastikan Anda sudah menginstall:

### Untuk Windows:
- **PHP 8.1+** - Download dari [php.net](https://windows.php.net/download/)
- **Composer** - Download dari [getcomposer.org](https://getcomposer.org/download/)
- **MySQL/MariaDB** - Bisa menggunakan [XAMPP](https://www.apachefriends.org/) atau [WAMP](https://www.wampserver.com/)
- **Git** - Download dari [git-scm.com](https://git-scm.com/)

### Untuk Linux/macOS:
```bash
# Ubuntu/Debian
sudo apt update
sudo apt install php8.1 php8.1-mysql php8.1-xml php8.1-curl composer mysql-server git

# macOS (dengan Homebrew)
brew install php composer mysql git
```

## 🚀 Quick Start - Clone & Run

### 1. Clone Repository
```bash
git clone https://github.com/Mammmzz/rest-api.git
cd rest-api
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Setup Environment
```bash
# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Konfigurasi Database

#### a. Buat Database MySQL
**Menggunakan XAMPP/WAMP (Windows):**
1. Start Apache dan MySQL di XAMPP Control Panel
2. Buka http://localhost/phpmyadmin
3. Klik "New" untuk buat database baru
4. Nama database: `rest-api-produk`
5. Klik "Create"

**Menggunakan Command Line:**
```bash
mysql -u root -p
CREATE DATABASE `rest-api-produk`;
EXIT;
```

#### b. Edit File .env
Buka file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rest-api-produk
DB_USERNAME=root
DB_PASSWORD=
```

**Catatan untuk Windows XAMPP:**
- DB_HOST: `127.0.0.1`
- DB_USERNAME: `root`
- DB_PASSWORD: (kosong, kecuali Anda sudah set password)

### 5. Setup Database
```bash
# Jalankan migration untuk membuat tabel
php artisan migrate

# Jalankan seeder untuk data sample
php artisan db:seed
```

### 6. Jalankan Server
```bash
php artisan serve
```

**✅ Server berjalan di: http://127.0.0.1:8000**

## 🗃️ Struktur Database

### Tabel `produk`
| Field | Type | Description |
|-------|------|-------------|
| `id` | Primary Key | ID unik produk |
| `nama_barang` | String(255) | Nama produk |
| `harga` | Decimal(15,2) | Harga produk |
| `stok` | Integer | Jumlah stok |
| `created_at` | Timestamp | Tanggal dibuat |
| `updated_at` | Timestamp | Tanggal diupdate |

## API Endpoints

Base URL: `http://127.0.0.1:8000/api`

### 1. **GET /api/produk** - Ambil Semua Produk
**Response:**
```json
{
    "status": "berhasil",
    "pesan": "Data produk berhasil diambil",
    "data": [...]
}
```

### 2. **GET /api/produk/{id}** - Ambil Produk Berdasarkan ID
**Response:**
```json
{
    "status": "berhasil", 
    "pesan": "Data produk berhasil ditemukan",
    "data": {...}
}
```

### 3. **POST /api/produk** - Tambah Produk Baru
**Headers:**
- `Content-Type: application/json`
- `Accept: application/json`

**Body:**
```json
{
    "nama_barang": "Laptop Gaming",
    "harga": 15000000,
    "stok": 10
}
```

**Response:**
```json
{
    "status": "berhasil",
    "pesan": "Produk berhasil ditambahkan", 
    "data": {...}
}
```

### 4. **PUT /api/produk/{id}** - Update Produk
**Headers:**
- `Content-Type: application/json`
- `Accept: application/json`

**Body:**
```json
{
    "nama_barang": "Laptop Gaming Updated",
    "harga": 16000000,
    "stok": 8
}
```

**Response:**
```json
{
    "status": "berhasil",
    "pesan": "Produk berhasil diupdate",
    "data": {...}
}
```

### 5. **DELETE /api/produk/{id}** - Hapus Produk
**Response:**
```json
{
    "status": "berhasil",
    "pesan": "Produk berhasil dihapus"
}
```

## 🧪 Testing API

### Menggunakan cURL (Command Line)
```bash
# Test GET - Ambil semua produk
curl -X GET http://127.0.0.1:8000/api/produk -H "Accept: application/json"

# Test POST - Tambah produk baru
curl -X POST http://127.0.0.1:8000/api/produk \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"nama_barang":"Tablet iPad","harga":12000000,"stok":5}'
```

### Menggunakan Postman

1. **Download & Install Postman** dari [postman.com](https://www.postman.com/downloads/)

2. **Import Collection** atau buat request manual:

#### GET - Ambil Semua Produk
- **URL:** `http://127.0.0.1:8000/api/produk`
- **Method:** `GET`
- **Headers:** `Accept: application/json`

#### POST - Tambah Produk
- **URL:** `http://127.0.0.1:8000/api/produk` 
- **Method:** `POST`
- **Headers:**
  - `Content-Type: application/json`
  - `Accept: application/json`
- **Body (raw JSON):**
```json
{
    "nama_barang": "Tablet iPad",
    "harga": 12000000,
    "stok": 5
}
```

#### PUT - Update Produk
- **URL:** `http://127.0.0.1:8000/api/produk/1`
- **Method:** `PUT`  
- **Headers:** Same as POST
- **Body:** Data yang ingin diupdate

#### DELETE - Hapus Produk
- **URL:** `http://127.0.0.1:8000/api/produk/1`
- **Method:** `DELETE`
- **Headers:** `Accept: application/json`

## ⚡ Troubleshooting

### Problem: "composer: command not found"
**Solution:**
- **Windows:** Restart command prompt setelah install Composer
- **Linux/macOS:** Jalankan `sudo apt install composer` atau `brew install composer`

### Problem: "php: command not found"
**Solution:**
- **Windows:** Tambahkan PHP ke PATH environment variable
- **XAMPP Users:** Gunakan `C:\xampp\php\php.exe artisan serve`

### Problem: "Connection refused" saat akses database
**Solution:**
1. Pastikan MySQL berjalan (`mysql.exe` di XAMPP)
2. Cek username/password di file `.env`
3. Untuk XAMPP: username=`root`, password=kosong

### Problem: "Class 'PDO' not found"
**Solution:**
- Enable extension `php_pdo_mysql` di `php.ini`
- Restart Apache/web server

### Problem: Migration error
**Solution:**
```bash
# Reset dan jalankan ulang migration
php artisan migrate:fresh --seed
```

## 📊 Data Sample

API sudah termasuk 5 produk sample:
- **Laptop Asus ROG** - Rp 15.000.000 (stok: 5)
- **Mouse Gaming Logitech** - Rp 750.000 (stok: 20)
- **Keyboard Mechanical** - Rp 1.200.000 (stok: 15)
- **Monitor 24 inch** - Rp 2.500.000 (stok: 8)
- **Headset Gaming** - Rp 900.000 (stok: 12)

## 📋 Validasi & Error Handling

### Rules Validasi:
- `nama_barang`: required, string, max 255 karakter
- `harga`: required, numeric, minimum 0  
- `stok`: required, integer, minimum 0

### Success Response:
```json
{
    "status": "berhasil",
    "pesan": "Data produk berhasil diambil",
    "data": [...]
}
```

### Error Response:
```json
{
    "status": "gagal",
    "pesan": "Data tidak valid",
    "errors": {
        "nama_barang": ["Nama barang wajib diisi"]
    }
}
```

## 🔢 HTTP Status Codes

- `200` - OK (GET, PUT, DELETE berhasil)
- `201` - Created (POST berhasil)
- `404` - Not Found (Data tidak ditemukan)
- `422` - Validation Error (Data tidak valid)
- `500` - Server Error

## 📞 Support

Jika Anda mengalami kesulitan:
1. Cek bagian [Troubleshooting](#troubleshooting) di atas
2. Pastikan semua prerequisites terinstall dengan benar
3. Buat issue di [GitHub Repository](https://github.com/Mammmzz/rest-api/issues)

## 📄 License

Project ini adalah open source dan tersedia di bawah [MIT License](LICENSE).
