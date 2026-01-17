<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="max-w-md mx-auto">
    <h2 class="font-bold text-xl mb-6 text-gray-800">Tambah Warisan Kata</h2>

    <form action="/home/simpan" method="post" class="space-y-4">
        
        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Kategori</label>
            <select name="kategori" class="w-full p-3 rounded-xl border border-gray-200 focus:border-green-500 outline-none transition-all">
                <option value="Sapaan">Sapaan</option>
                <option value="Kuliner">Kuliner</option>
                <option value="Arah">Arah</option>
                <option value="Adat">Adat</option>
                <option value="Umum">Umum</option>
            </select>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Bahasa Indonesia</label>
            <input type="text" name="kata_indonesia" placeholder="Contoh: Apa Kabar" class="w-full p-3 rounded-xl border border-gray-200 focus:border-green-500 outline-none">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Bahasa Daerah (Babel)</label>
            <input type="text" name="kata_daerah" placeholder="Contoh: Ape kabar e?" class="w-full p-3 rounded-xl border border-gray-200 focus:border-green-500 outline-none">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Filosofi / Makna</label>
            <textarea name="filosofi" rows="3" class="w-full p-3 rounded-xl border border-gray-200 focus:border-green-500 outline-none"></textarea>
        </div>

        <button type="submit" class="w-full bg-hutan text-emas font-bold p-4 rounded-2xl shadow-lg hover:scale-[1.02] active:scale-[0.98] transition-all">
            Simpan Warisan Kata
        </button>

    </form>
</div>
<?= $this->endSection(); ?>