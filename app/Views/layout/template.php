<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Warna khusus hutan Bangka (Hijau Gelap) dan Emas */
        .bg-hutan {
            background-color: #064e3b;
        }

        .text-emas {
            color: #d4af37;
        }
    </style>
</head>

<body class="bg-gray-50 flex flex-col min-h-screen">

    <header class="bg-hutan p-6 shadow-xl text-center">
        <h1 class="text-3xl font-bold text-emas tracking-widest">KELEKAK.ID</h1>
        <p class="text-white text-[10px] italic mt-1 uppercase tracking-tighter">Warisan Literasi Digital Bangka Belitung</p>
    </header>

    <main class="flex-grow p-4">
        <?= $this->renderSection('content'); ?>
    </main>

    <nav class="fixed bottom-0 w-full bg-white border-t flex justify-around p-3 text-[10px] text-gray-500 shadow-2xl">
        <a href="/" class="text-green-900 font-bold text-center">
            <p>🏠</p> Beranda
        </a>
        <a href="/tambah" class="text-center">
            <p>📖</p> Tambah Kata
        </a>
        <a href="#" class="text-center">
            <p>🎮</p> Game
        </a>
        <a href="#" class="text-center">
            <p>👤</p> Profil
        </a>
    </nav>

</body>

</html>