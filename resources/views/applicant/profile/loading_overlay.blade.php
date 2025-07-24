{{-- resources/views/partials/loading_overlay.blade.php --}}

<div id="loadingOverlay" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.8); z-index: 9999; flex-direction: column; justify-content: center; align-items: center;">
    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
        <span class="visually-hidden">Loading...</span>
    </div>
    <p class="mt-2 text-muted">Memproses data Anda...</p> {{-- Pesan bisa lebih generik --}}
</div>

<script>
    // Pastikan fungsi ini didefinisikan secara global atau di scope yang bisa diakses
    // Cara terbaik adalah meletakkannya di file JavaScript umum Anda (common.js)
    // Tapi jika hanya di partial ini, pastikan ia di atas DOMContentLoaded listener.
    function toggleLoading(show) {
        const loadingOverlayElement = document.getElementById('loadingOverlay');
        if (loadingOverlayElement) {
            loadingOverlayElement.style.display = show ? 'flex' : 'none';
        }
    }

    // Listener untuk memastikan tombol save dinonaktifkan dan loading aktif saat AJAX dimulai
    // Ini bisa di tempatkan di common.js jika Anda punya satu listener global
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.save-section-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                // Jangan panggil e.preventDefault() dulu, biarkan DOMContentLoaded di common.js yang handle
                // Cek apakah form valid, lalu tampilkan loading
                // Ini hanyalah contoh, logic validasi utama harus ada di common.js
                // if (isFormValid) { // Asumsi isFormValid sudah dicek
                     // toggleLoading(true);
                     // e.target.disabled = true;
                // }
                // Pastikan common.js yang akan mengatur ini.
            });
        });
    });
</script>