<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="max-w-md mx-auto text-center px-4">
    <div class="bg-white rounded-3xl p-8 shadow-lg border-b-8 border-green-600">
        <h2 class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-2">Tebak Arti Kata</h2>

        <h1 class="text-4xl font-black text-gray-900 mb-6">"<?= $soal['kata_daerah']; ?>"</h1>

        <div class="space-y-3">
            <?php foreach ($pilihan as $p) : ?>
                <button onclick="cekJawaban('<?= $p['kata_indonesia']; ?>', '<?= $soal['kata_indonesia']; ?>')"
                    class="w-full p-4 rounded-2xl border-2 border-gray-100 font-bold text-gray-700 hover:bg-green-50 hover:border-green-500 transition-all active:scale-95">
                    <?= $p['kata_indonesia']; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>

    <a href="<?= base_url('game'); ?>" class="inline-block mt-8 text-green-600 font-bold border-b-2 border-green-600">
        Ganti Soal ↻
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function cekJawaban(pilihan, benar) {
        if (pilihan === benar) {
            Swal.fire({
                title: 'MANTAP! ✅',
                text: 'Kamu beneran pinter bahasa Bangka!',
                icon: 'success',
                confirmButtonText: 'Main Lagi',
                confirmButtonColor: '#059669'
            }).then(() => {
                window.location.reload();
            });
        } else {
            Swal.fire({
                title: 'YAHHH... ❌',
                text: 'Jawabannya yang bener itu: ' + benar,
                icon: 'error',
                confirmButtonText: 'Coba Lagi',
                confirmButtonColor: '#dc2626'
            });
        }
    }
</script>
<?= $this->endSection(); ?>