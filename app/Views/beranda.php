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
                    <div class="flex items-center gap-3 mt-4">
                        <button onclick="putarSuara('indonesia', '<?= $k['kata_indonesia']; ?>')" class="bg-blue-100 p-2 rounded-lg text-[10px] font-bold text-blue-700">
                            🔊 INA
                        </button>

                        <button onclick="putarSuara('inggris', '<?= $k['kata_inggris']; ?>')" class="bg-purple-100 p-2 rounded-lg text-[10px] font-bold text-purple-700">
                            🔊 ENG
                        </button>

                        <button onclick="putarSuara('daerah', '<?= $k['kata_daerah']; ?>', '<?= $k['file_audio']; ?>')" class="bg-green-600 p-2 rounded-lg text-[10px] font-bold text-white shadow-md">
                            🔊 DAERAH
                        </button>

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
<script>
    function putarSuara(tipe, teks, fileAudio = '') {
        // 1. Kalau yang dipencet suara daerah dan ada file rekamannya, kita putar filenya
        if (tipe === 'daerah' && fileAudio !== '') {
            const audio = new Audio('<?= base_url('uploads/audio/'); ?>' + fileAudio);
            audio.play();
        } else {
            // 2. Kalau gak ada file, atau itu bahasa Indonesia/Inggris, kita suruh robot AI ngomong
            const robot = window.speechSynthesis;
            const ucapan = new SpeechSynthesisUtterance(teks);

            // Atur bahasa robotnya
            if (tipe === 'inggris') {
                ucapan.lang = 'en-US';
            } else {
                ucapan.lang = 'id-ID'; // Default bahasa Indonesia
            }

            robot.speak(ucapan);
        }
    }
</script>