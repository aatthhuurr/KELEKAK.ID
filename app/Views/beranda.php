<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="max-w-md mx-auto">

    <h2 class="font-bold text-xl mb-4 text-gray-800">Daftar Kosa Kata</h2>

    <div class="grid grid-cols-1 gap-4 mb-20">
        <?php foreach ($kamus as $k) : ?>
            <div class="bg-white rounded-2xl p-5 shadow-sm border-l-4 border-green-600 hover:shadow-md transition-all">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-xs font-bold text-green-700 uppercase mb-1 tracking-wider"><?= $k['kategori']; ?></h3>
                        <p class="text-lg font-bold text-gray-900 leading-none"><?= $k['kata_daerah']; ?></p>
                        <p class="text-sm text-gray-500 italic mt-1">"<?= $k['kata_indonesia']; ?>"</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <button class="bg-green-100 p-2 rounded-full text-xs">🔊</button>

                        <a href="<?= base_url('hapus/' . $k['id_bahasa']); ?>"
                            onclick="return confirm('Yakin mau hapus kata ini?')"
                            class="bg-red-100 p-2 rounded-full text-xs"
                            title="Hapus">
                            🗑️
                        </a>
                    </div>
                </div>
                <hr class="my-3 border-gray-100">
                <p class="text-xs text-gray-600 leading-relaxed">
                    <strong>Filosofi:</strong> <?= $k['filosofi']; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<?= $this->endSection(); ?>