<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="max-w-md mx-auto">

    <h2 class="font-bold text-xl mb-4 text-gray-800">Daftar Kosa Kata</h2>

    <div class="grid grid-cols-1 gap-4 mb-20">
        <?php foreach ($kamus as $k) : ?>
            <div class="bg-white rounded-2xl shadow-sm border-l-4 border-green-600 hover:shadow-md transition-all overflow-hidden mb-4">

                <?php if (!empty($k['file_gambar'])) : ?>
                    <img src="<?= base_url('uploads/img/' . $k['file_gambar']); ?>"
                        alt="Foto Budaya"
                        class="w-full h-48 object-cover shadow-inner"
                        onerror="this.style.display='none'">
                <?php endif; ?>

                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xs font-bold text-green-700 uppercase mb-1 tracking-wider"><?= $k['kategori']; ?></h3>
                            <p class="text-lg font-bold text-gray-900 leading-none"><?= $k['kata_daerah']; ?></p>
                            <p class="text-sm text-gray-500 font-medium mt-1">"<?= $k['kata_indonesia']; ?>"</p>
                            <p class="text-[11px] text-blue-600 font-medium mt-1 uppercase"><?= $k['kata_inggris']; ?></p>
                        </div>

                        <div class="flex items-center gap-2 mt-2">
                            <button onclick="putarSuara('indonesia', '<?= $k['kata_indonesia']; ?>')"
                                class="bg-blue-600 px-3 py-1.5 rounded-lg text-[10px] font-bold text-white shadow-sm hover:bg-blue-700 transition-all">
                                INA
                            </button>

                            <button onclick="putarSuara('inggris', '<?= $k['kata_inggris']; ?>')"
                                class="bg-purple-600 px-3 py-1.5 rounded-lg text-[10px] font-bold text-white shadow-sm hover:bg-purple-700 transition-all">
                                ENG
                            </button>

                            <button onclick="putarSuara('daerah', '<?= $k['kata_daerah']; ?>', '<?= $k['file_audio']; ?>')"
                                class="bg-green-600 p-2 rounded-lg text-white shadow-md hover:bg-green-700 transition-all">
                                🔊
                            </button>

                            <a href="<?= base_url('hapus/' . $k['id_bahasa']); ?>"
                                onclick="return confirm('Yakin mau hapus kata ini?')"
                                class="bg-red-100 p-2 rounded-full text-red-500 hover:bg-red-200 transition-all"
                                title="Hapus">
                                🗑️
                            </a>
                        </div>
                    </div>

                    <hr class="my-3 border-gray-100">
                    <p class="text-xs text-gray-600 leading-relaxed">
                        <span class="font-bold text-gray-400 uppercase text-[10px]">Filosofi:</span><br>
                        <?= $k['filosofi']; ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        function putarSuara(tipe, teks, fileAudio = '') {
            const robot = window.speechSynthesis;
            robot.cancel(); // Reset suara biar gak tumpang tindih

            if (tipe === 'daerah' && fileAudio !== '' && fileAudio !== null) {
                console.log("Memutar file audio asli: " + fileAudio);
                const audio = new Audio('<?= base_url('uploads/audio/'); ?>' + fileAudio);
                audio.play().catch(error => console.log("Gagal putar file: ", error));
            } else {
                const ucapan = new SpeechSynthesisUtterance(teks);
                const daftarSuara = robot.getVoices();

                if (tipe === 'inggris') {
                    // Cari suara yang beneran English (US atau UK)
                    const suaraEnglish = daftarSuara.find(voice => voice.lang.includes('en-'));
                    if (suaraEnglish) {
                        ucapan.voice = suaraEnglish;
                        ucapan.lang = 'en-US';
                    }
                } else {
                    // Cari suara yang beneran Indonesia
                    const suaraIndo = daftarSuara.find(voice => voice.lang.includes('id-'));
                    if (suaraIndo) {
                        ucapan.voice = suaraIndo;
                        ucapan.lang = 'id-ID';
                    }
                }

                ucapan.rate = 1.0; // Kecepatan normal
                robot.speak(ucapan);
            }
        }

        // Pancing daftar suara agar selalu siap
        window.speechSynthesis.onvoiceschanged = () => window.speechSynthesis.getVoices();
    </script>

</div> <?= $this->endSection(); ?>