<?php

namespace App\Models;

use CodeIgniter\Model;

// Nama class harus sama dengan nama file
class BahasaModel extends Model
{
    // 1. Kasih tau CI4 tabel mana yang mau kita obok-obok
    protected $table            = 'bahasa';

    // 2. Kasih tau kunci utamanya (Primary Key) yang mana
    protected $primaryKey       = 'id_bahasa';

    // 3. Biar CI4 otomatis ngurusin ID yang nambah sendiri (auto increment)
    protected $useAutoIncrement = true;

    // 4. Hasil datanya mau kita bentuk jadi 'array' biar gampang dibaca
    protected $returnType       = 'array';

    // 5. INI PENTING: Daftar kolom yang BOLEH diisi lewat aplikasi. 
    // Kalau gak didaftarin di sini, datanya gak bakal masuk ke database (fitur keamanan).
    protected $allowedFields    = [
        'kategori',
        'kata_indonesia',
        'kata_inggris',
        'kata_daerah',
        'dialek_wilayah',
        'filosofi',
        'file_audio',
        'file_gambar'
    ];

    // 6. Fungsi tambahan buat nyari kosa kata berdasarkan kategorinya
    public function getKamusByKategori($kategori)
    {
        return $this->where('kategori', $kategori)->findAll();
    }
}