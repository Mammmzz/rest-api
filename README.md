# REST API Produk - Laravel

REST API lengkap untuk manajemen produk dengan operasi CRUD (Create, Read, Update, Delete). API ini menggunakan Laravel 12 dengan response dalam bahasa Indonesia.

## Fitur

- ✅ **CRUD Lengkap** untuk produk
- ✅ **Validasi Input** dengan pesan dalam bahasa Indonesia  
- ✅ **Response JSON** terstruktur
- ✅ **Error Handling** yang proper
- ✅ **Database MySQL** dengan migration dan seeder

## Struktur Database

### Tabel `produk`
| Field | Type | Description |
|-------|------|-------------|
| `id` | Primary Key | ID unik produk |
| `nama_barang` | String(255) | Nama produk |
| `harga` | Decimal(15,2) | Harga produk |
| `stok` | Integer | Jumlah stok |
| `created_at` | Timestamp | Tanggal dibuat |
| `updated_at` | Timestamp | Tanggal diupdate |

## Instalasi & Setup

1. **Install Dependencies**
   ```bash
   composer install
   ```

2. **Setup Database**
   - Buat database MySQL: `rest-api-produk`
   - Copy `.env.example` ke `.env`
   - Update konfigurasi database di `.env`

3. **Jalankan Migration & Seeding**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

4. **Jalankan Server**
   ```bash
   php artisan serve
   ```
   Server akan berjalan di: `http://127.0.0.1:8000`

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

## Testing dengan Postman

### Langkah-langkah:

1. **Buka Postman Extension** di Windsurf
2. **Import Collection** atau buat request manual:

#### GET - Ambil Semua Produk
- URL: `http://127.0.0.1:8000/api/produk`
- Method: `GET`
- Headers: `Accept: application/json`

#### POST - Tambah Produk
- URL: `http://127.0.0.1:8000/api/produk` 
- Method: `POST`
- Headers:
  - `Content-Type: application/json`
  - `Accept: application/json`
- Body (raw JSON):
```json
{
    "nama_barang": "Tablet iPad",
    "harga": 12000000,
    "stok": 5
}
```

#### PUT - Update Produk
- URL: `http://127.0.0.1:8000/api/produk/1`
- Method: `PUT`  
- Headers: Same as POST
- Body: Data yang ingin diupdate

#### DELETE - Hapus Produk
- URL: `http://127.0.0.1:8000/api/produk/1`
- Method: `DELETE`
- Headers: `Accept: application/json`

## Validasi

### Rules Validasi:
- `nama_barang`: required, string, max 255 karakter
- `harga`: required, numeric, minimum 0  
- `stok`: required, integer, minimum 0

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

## Status HTTP Codes

- `200` - OK (GET, PUT, DELETE berhasil)
- `201` - Created (POST berhasil)
- `404` - Not Found (Data tidak ditemukan)
- `422` - Validation Error (Data tidak valid)
- `500` - Server Error

## Data Sample

API sudah termasuk 5 produk sample:
- Laptop Asus ROG (Rp 15.000.000)
- Mouse Gaming Logitech (Rp 750.000)  
- Keyboard Mechanical (Rp 1.200.000)
- Monitor 24 inch (Rp 2.500.000)
- Headset Gaming (Rp 900.000)
