<?php

namespace App\Controllers;

// panggil Model Bahasa yang tadi sudah dibuat biar bisa dipakai di sini
use App\Models\BahasaModel;

class Home extends BaseController
{
    public function index()
    {
        // 1. buat objek baru dari BahasaModel (Panggil kurirnya)
        $bahasaModel = new BahasaModel();

        // 2. suruh si kurir ambil SEMUA data dari tabel bahasa
        $semua_kata = $bahasaModel->findAll();

        // 3. bungkus datanya ke dalam variabel 'data' buat dikirim ke View
        $data = [
            'title' => 'KELEKAK.ID - Beranda', // Judul halaman
            'kamus' => $semua_kata             // Isi datanya
        ];

        // 4. tampilin halaman view bernama 'v_beranda' sambil bawa bungkusan datanya
        return view('beranda', $data);
    }

    public function tambah()
    {
        // Saya buat fungsi ini cuma buat ngebuka halaman form tambah data
        $data = [
            'title' => 'Tambah Kosa Kata Baru'
        ];
        return view('tambah', $data);
    }
}