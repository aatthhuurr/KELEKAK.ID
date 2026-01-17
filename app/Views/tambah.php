<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="max-w-md mx-auto">
    <h2 class="font-bold text-xl mb-6 text-gray-800">Tambah Warisan Kata</h2>

    <form action="<?= base_url('simpan'); ?>" method="post" enctype="multipart/form-data" class="space-y-4">

        <div
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
            <input type="text" name="kata_indonesia" class="w-full p-3 bg-gray-50 border border-gray-100 rounded-xl text-sm" placeholder="Contoh: Halo">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Bahasa Inggris (English)</label>
            <input type="text" name="kata_inggris" class="w-full p-3 bg-gray-50 border border-gray-100 rounded-xl text-sm" placeholder="Contoh: Hello">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Bahasa Daerah (Bangka)</label>
            <input type="text" name="kata_daerah" class="w-full p-3 bg-gray-50 border border-gray-100 rounded-xl text-sm" placeholder="Contoh: Uii Seperadik">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Foto Budaya / Objek (.jpg atau .png)</label>
            <input type="file" name="file_gambar" accept="image/*" class="w-full p-2 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
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