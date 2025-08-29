<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ProdukController extends Controller
{
    // Menampilkan semua produk
    public function index(): JsonResponse
    {
        try {
            $produk = Produk::all();
            
            return response()->json([
                'status' => 'berhasil',
                'pesan' => 'Data produk berhasil diambil',
                'data' => $produk
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'gagal',
                'pesan' => 'Gagal mengambil data produk',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Menampilkan produk berdasarkan ID
    public function show($id): JsonResponse
    {
        try {
            $produk = Produk::findOrFail($id);
            
            return response()->json([
                'status' => 'berhasil',
                'pesan' => 'Data produk berhasil ditemukan',
                'data' => $produk
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'gagal',
                'pesan' => 'Produk tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    // Menambah produk baru
    public function store(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'nama_barang' => 'required|string|max:255',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0'
            ], [
                'nama_barang.required' => 'Nama barang wajib diisi',
                'nama_barang.string' => 'Nama barang harus berupa teks',
                'nama_barang.max' => 'Nama barang maksimal 255 karakter',
                'harga.required' => 'Harga wajib diisi',
                'harga.numeric' => 'Harga harus berupa angka',
                'harga.min' => 'Harga tidak boleh kurang dari 0',
                'stok.required' => 'Stok wajib diisi',
                'stok.integer' => 'Stok harus berupa angka bulat',
                'stok.min' => 'Stok tidak boleh kurang dari 0'
            ]);

            $produk = Produk::create($validatedData);
            
            return response()->json([
                'status' => 'berhasil',
                'pesan' => 'Produk berhasil ditambahkan',
                'data' => $produk
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'gagal',
                'pesan' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'gagal',
                'pesan' => 'Gagal menambahkan produk',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Mengupdate produk
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $produk = Produk::findOrFail($id);
            
            $validatedData = $request->validate([
                'nama_barang' => 'sometimes|required|string|max:255',
                'harga' => 'sometimes|required|numeric|min:0',
                'stok' => 'sometimes|required|integer|min:0'
            ], [
                'nama_barang.required' => 'Nama barang wajib diisi',
                'nama_barang.string' => 'Nama barang harus berupa teks',
                'nama_barang.max' => 'Nama barang maksimal 255 karakter',
                'harga.required' => 'Harga wajib diisi',
                'harga.numeric' => 'Harga harus berupa angka',
                'harga.min' => 'Harga tidak boleh kurang dari 0',
                'stok.required' => 'Stok wajib diisi',
                'stok.integer' => 'Stok harus berupa angka bulat',
                'stok.min' => 'Stok tidak boleh kurang dari 0'
            ]);

            $produk->update($validatedData);
            
            return response()->json([
                'status' => 'berhasil',
                'pesan' => 'Produk berhasil diupdate',
                'data' => $produk->fresh()
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'gagal',
                'pesan' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'gagal',
                'pesan' => 'Gagal mengupdate produk atau produk tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    // Menghapus produk
    public function destroy($id): JsonResponse
    {
        try {
            $produk = Produk::findOrFail($id);
            $produk->delete();
            
            return response()->json([
                'status' => 'berhasil',
                'pesan' => 'Produk berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'gagal',
                'pesan' => 'Gagal menghapus produk atau produk tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }
}
