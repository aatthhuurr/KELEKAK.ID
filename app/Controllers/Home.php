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

    public function simpan()
    {
        $bahasaModel = new BahasaModel();

        // 1. Ambil file dari request
        $fileAudio = $this->request->getFile('file_audio');
        $fileGambar = $this->request->getFile('file_gambar');

        $namaAudio = '';
        $namaGambar = '';

        // 2. Cek Audio (Hanya proses JIKA ada file yang diupload)
        if ($fileAudio && $fileAudio->isValid() && !$fileAudio->hasMoved()) {
            $namaAudio = $fileAudio->getRandomName();
            $fileAudio->move('uploads/audio', $namaAudio);
        }

        // 3. Cek Gambar (Hanya proses JIKA ada file yang diupload)
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/img', $namaGambar);
        }

        // 4. Masukin ke database
        $dataBaru = [
            'kategori'       => $this->request->getPost('kategori'),
            'kata_indonesia' => $this->request->getPost('kata_indonesia'),
            'kata_inggris'   => $this->request->getPost('kata_inggris'),
            'kata_daerah'    => $this->request->getPost('kata_daerah'),
            'filosofi'       => $this->request->getPost('filosofi'),
            'file_audio'     => $namaAudio,
            'file_gambar'    => $namaGambar
        ];

        $bahasaModel->save($dataBaru);
        return redirect()->to('/');
    }

    public function hapus($id)
    {
        // 1. Saya panggil si kurir (Model)
        $bahasaModel = new BahasaModel();

        // 2. Saya suruh si kurir buat hapus data berdasarkan ID-nya
        $bahasaModel->delete($id);

        // 3. Kalau sudah terhapus, balikkan saya ke halaman Beranda
        return redirect()->to('/');
    }

    public function game()
    {
        $bahasaModel = new BahasaModel();
        $semuaData = $bahasaModel->orderBy('RAND()')->findAll(3);

        // Jika data kurang, kita tetap buka halaman game tapi soalnya kosong
        if (count($semuaData) < 3) {
            return view('game'); // Menu bawah akan tetap muncul karena extend template
        }

        $jawabanBenar = $semuaData[0];
        shuffle($semuaData);

        $data = [
            'pilihan' => $semuaData,
            'soal' => $jawabanBenar
        ];

        return view('game', $data);
    }
}
