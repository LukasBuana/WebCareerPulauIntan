<div class="container-fluid mt-4"> {{-- Added mt-4 for spacing from previous sections --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Riwayat Pendidikan --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}RiwayatPendidikanMainCollapse" {{-- Unique ID for main collapse --}}
                    aria-expanded="false" {{-- Start collapsed by default --}} style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-graduation-cap me-2"></i>Riwayat Pendidikan<span class="required"id="{{ $section_prefix ?? '' }}riwayatPendidikanRequired">*</span>
                    </h5>
                    {{-- Icon will be handled by custom JS below for this main header --}}
                    <i class="fas fa-chevron-up collapse-icon"></i> {{-- Changed to down for initial collapsed state --}}
                </div>

                {{-- Main Card Body for Riwayat Pendidikan --}}
                <div class="collapse" id="{{ $section_prefix ?? '' }}RiwayatPendidikanMainCollapse">
                    {{-- Unique ID for main collapse content --}}
                    <div class="card-body">
                        {{-- Accordion for sub-sections within Riwayat Pendidikan (e.g., Formal Education, Courses) --}}
                        <div class="accordion" id="{{ $section_prefix ?? '' }}accordionRiwayatPendidikan">
                            {{-- Prefixed parent for inner accordions --}}

                            {{-- Formal Education/Education History --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingFormalEducation">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseFormalEducation"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseFormalEducation">
                                        Pendidikan Formal
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseFormalEducation"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingFormalEducation"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionRiwayatPendidikan">
                                    {{-- Prefixed parent --}}
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formPendidikanFormal" method="POST">
                                            <div id="{{ $section_prefix ?? '' }}education-history-container">
                                                {{-- Dynamic education fields will be added here by JS --}}
                                                {{-- Example structure for an education entry:
                                                <div class="education-item border p-3 mb-3 rounded" id="{{ $section_prefix ?? '' }}education-${index}">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="{{ $section_prefix ?? '' }}jenjang_${index}" class="form-label">Jenjang <span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="{{ $section_prefix ?? '' }}jenjang_${index}" name="educations[${index}][jenjang]" placeholder="Contoh: S1, D3, SMA" required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="{{ $section_prefix ?? '' }}institusi_${index}" class="form-label">Nama Institusi <span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="{{ $section_prefix ?? '' }}institusi_${index}" name="educations[${index}][institusi]" required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="{{ $section_prefix ?? '' }}jurusan_${index}" class="form-label">Jurusan <span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="{{ $section_prefix ?? '' }}jurusan_${index}" name="educations[${index}][jurusan]" required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="{{ $section_prefix ?? '' }}tahun_mulai_${index}" class="form-label">Tahun Mulai <span class="required">*</span></label>
                                                            <input type="number" class="form-control" id="{{ $section_prefix ?? '' }}tahun_mulai_${index}" name="educations[${index}][tahun_mulai]" required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="{{ $section_prefix ?? '' }}tahun_selesai_${index}" class="form-label">Tahun Selesai <span class="required">*</span></label>
                                                            <input type="number" class="form-control" id="{{ $section_prefix ?? '' }}tahun_selesai_${index}" name="educations[${index}][tahun_selesai]" required>
                                                            <div class="error-message"></div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="{{ $section_prefix ?? '' }}ipk_${index}" class="form-label">IPK / Nilai Rata-rata</label>
                                                            <input type="text" class="form-control" id="{{ $section_prefix ?? '' }}ipk_${index}" name="educations[${index}][ipk]" placeholder="Contoh: 3.50 (Opsional)">
                                                            <div class="error-message"></div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-danger btn-sm remove-education mt-2" data-target-id="{{ $section_prefix ?? '' }}education-${index}">Hapus</button>
                                                </div>
                                                --}}
                                            </div>
                                            <button type="button" class="btn btn-info btn-sm mt-2"
                                                id="{{ $section_prefix ?? '' }}add-education">Tambah
                                                Pendidikan</button>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="education_history"
                                                        data-prefix="{{ $section_prefix ?? '' }}">
                                                        <i class="fas fa-save me-2"></i>Simpan Pendidikan Formal
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Other Education/Certifications (Optional, if you want more sub-sections) --}}
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingOtherEducation">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseOtherEducation"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseOtherEducation">
                                        Sertifikasi / Kursus Tambahan
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseOtherEducation" class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingOtherEducation"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionRiwayatPendidikan">
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formOtherEducation" method="POST">
                                            <div id="{{ $section_prefix ?? '' }}other-education-container"></div>
                                            <button type="button" class="btn btn-info btn-sm mt-2" id="{{ $section_prefix ?? '' }}add-other-education">Tambah Sertifikasi/Kursus</button>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="otherEducation" data-prefix="{{ $section_prefix ?? '' }}">
                                                        <i class="fas fa-save me-2"></i>Simpan Sertifikasi/Kursus
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}

                        </div> {{-- End of accordionRiwayatPendidikan --}}
                    </div> {{-- End of card-body --}}
                </div> {{-- End of main collapse for Riwayat Pendidikan --}}
            </div> {{-- End of card --}}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Logic for Main Card Header Toggle (Riwayat Pendidikan) ---
        const mainCardHeaderPendidikan = document.querySelector(
                '#{{ $section_prefix ?? '' }}RiwayatPendidikanMainCollapse')
            .previousElementSibling; // Get the header
        const mainCollapsePendidikan = document.getElementById(
            '{{ $section_prefix ?? '' }}RiwayatPendidikanMainCollapse');
        const mainCollapseIconPendidikan = mainCardHeaderPendidikan.querySelector('.collapse-icon');

        if (mainCardHeaderPendidikan && mainCollapsePendidikan && mainCollapseIconPendidikan) {
            mainCollapsePendidikan.addEventListener('show.bs.collapse', function() {
                mainCardHeaderPendidikan.classList.add('active');
                mainCollapseIconPendidikan.classList.remove('fa-chevron-down');
                mainCollapseIconPendidikan.classList.add('fa-chevron-up');
            });

            mainCollapsePendidikan.addEventListener('hide.bs.collapse', function() {
                mainCardHeaderPendidikan.classList.remove('active');
                mainCollapseIconPendidikan.classList.remove('fa-chevron-up');
                mainCollapseIconPendidikan.classList.add('fa-chevron-down');
            });

            // Initial state for main card header
            if (mainCollapsePendidikan.classList.contains('show')) {
                mainCardHeaderPendidikan.classList.add('active');
                mainCollapseIconPendidikan.classList.remove('fa-chevron-down');
                mainCollapseIconPendidikan.classList.add('fa-chevron-up');
            } else {
                mainCardHeaderPendidikan.classList.remove('active');
                mainCollapseIconPendidikan.classList.remove('fa-chevron-up');
                mainCollapseIconPendidikan.classList.add('fa-chevron-down');
            }
        }

        const existingEducationData = @json($applicant->educationHistory ?? []);
        let educationCount = existingEducationData.length; // Initialize count with existing data size
        const educationHistoryContainer = document.getElementById(
            '{{ $section_prefix ?? '' }}education-history-container');
        const addEducationButton = document.getElementById('{{ $section_prefix ?? '' }}add-education');
        const sectionPrefix = '{{ $section_prefix ?? '' }}';
 const riwayatPendidikanRequiredAsterisk = document.getElementById(`${sectionPrefix}riwayatPendidikanRequired`);


        // Fungsi baru untuk memeriksa dan menghapus/menambahkan tanda bintang wajib
        function checkAndRemoveRiwayatPendidikanRequiredAsterisk() {
            // Cek apakah ada data pendidikan yang sudah ada atau yang baru ditambahkan
            const hasExistingData = existingEducationData && existingEducationData.length > 0;
            const hasDynamicFields = educationHistoryContainer.children.length > 0;

            if ((hasExistingData || hasDynamicFields) && riwayatPendidikanRequiredAsterisk) {
                // Jika ada data (dari DB atau yang baru ditambahkan), dan tanda bintang ada, hapus tanda bintang
                riwayatPendidikanRequiredAsterisk.remove();
            } else if (!hasExistingData && !hasDynamicFields && !riwayatPendidikanRequiredAsterisk) {
                // Jika tidak ada data sama sekali (baik dari DB maupun dinamis), dan tanda bintang tidak ada, tambahkan kembali tanda bintang
                const h5Element = mainCardHeaderPendidikan.querySelector('h5');
                h5Element.insertAdjacentHTML('beforeend',
                    `<span class="required" id="${sectionPrefix}riwayatPendidikanRequired">*</span>`);
                // Perbarui referensi ke elemen tanda bintang yang baru ditambahkan
                riwayatPendidikanRequiredAsterisk = document.getElementById(`${sectionPrefix}riwayatPendidikanRequired`);
            }
        }
        // --- Definisi fungsi addEducationField yang BENAR dan HANYA SATU ---
        function addEducationField(prefix, index, data = {}) {
            const id = data.id || ''; // Ambil ID dari data yang ada, jika ada
            const level_of_education = data.level_of_education || '';
            const institution = data.institution || '';
            const major = data.major || '';
            const period_start_year = data.period_start_year || '';
            const period_end_year = data.period_end_year || '';
            const grade = data.grade || '';

            const educationHtml = `
            <div class="education-item border p-3 mb-3 rounded" id="${prefix}education_history-${index}">
                <input type="hidden" name="education_history[${index}][id]" value="${id}"> 

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="${prefix}level_of_education_${index}" class="form-label">
                                Jenjang <span class="required">*</span>
                            </label>
                            <select class="form-select" id="${prefix}level_of_education_${index}" name="education_history[${index}][level_of_education]" required>
                                <option value="">Pilih Jenjang Anda</option>
                                <option value="SMA/SMK" ${level_of_education === 'SMA/SMK' ? 'selected' : ''}>SMA/SMK</option>
                                <option value="S1" ${level_of_education === 'S1' ? 'selected' : ''}>S1 (Sarjana)</option>
                                <option value="S2" ${level_of_education === 'S2' ? 'selected' : ''}>S2 (Master)</option>
                                <option value="S3" ${level_of_education === 'S3' ? 'selected' : ''}>S3 (Doktor)</option>
                            </select>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="${prefix}institution_${index}" class="form-label">Nama Institusi / Sekolah <span class="required">*</span></label>
                        <input type="text" class="form-control" id="${prefix}institution_${index}" name="education_history[${index}][institution]" value="${institution}" required>
                        <div class="error-message"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="${prefix}period_start_year_${index}" class="form-label">Tahun Mulai <span class="required">*</span></label>
                        <input type="number" class="form-control" id="${prefix}period_start_year_${index}" name="education_history[${index}][period_start_year]" placeholder="YYYY" min="1900" max="2100" value="${period_start_year}" required>
                        <div class="error-message"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="${prefix}period_end_year_${index}" class="form-label">Tahun Selesai <span class="required">*</span></label>
                        <input type="number" class="form-control" id="${prefix}period_end_year_${index}" name="education_history[${index}][period_end_year]" placeholder="YYYY" min="1900" max="2100" value="${period_end_year}" required>
                        <div class="error-message"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="${prefix}major_${index}" class="form-label">Jurusan <span class="required">*</span></label>
                        <input type="text" class="form-control" id="${prefix}major_${index}" name="education_history[${index}][major]" value="${major}" required>
                        <div class="error-message"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="${prefix}grade_${index}" class="form-label">IPK / Nilai Rata-rata</label>
                        <input type="text" class="form-control" id="${prefix}grade_${index}" name="education_history[${index}][grade]" placeholder="Contoh: 3.50" value="${grade}">
                        <div class="error-message"></div>
                    </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-education mt-2" data-target-id="${prefix}education_history-${index}">Hapus</button>
            </div>
        `;
            if (educationHistoryContainer) {
                educationHistoryContainer.insertAdjacentHTML('beforeend', educationHtml);
                                checkAndRemoveRiwayatPendidikanRequiredAsterisk();

            }
        }

        // --- Fungsi untuk memperbarui nama field setelah penghapusan ---
        function updateEducationFieldNames(prefix, container) {
            const educationItems = container.querySelectorAll('.education-item');
            educationItems.forEach((item, index) => {
                // Perbarui ID dari elemen pendidikan itu sendiri
                item.id = `${prefix}education_history-${index}`;

                // Perbarui semua atribut nama input/select
                // Menggunakan selector yang benar: [name^="education_history["]
                item.querySelectorAll('[name^="education_history["]').forEach(input => {
                    const oldName = input.name;
                    // Regex untuk menangkap kunci field (misalnya, 'level_of_education')
                    const match = oldName.match(/education_history\[\d+\]\[(.*)\]/);
                    if (match && match[1]) {
                        input.name = `education_history[${index}][${match[1]}]`;
                    }
                });

                // Perbarui data-target-id pada tombol hapus
                const removeButton = item.querySelector('.remove-education');
                if (removeButton) {
                    removeButton.dataset.targetId = `${prefix}education_history-${index}`;
                }
            });
            educationCount = educationItems.length; // Update educationCount after re-indexing
        }

        // Load existing education data when the page loads
        // Ini harus berjalan PERTAMA kali untuk menampilkan data yang sudah ada
        if (existingEducationData && existingEducationData.length > 0) {
            existingEducationData.forEach((data, index) => {
                addEducationField(sectionPrefix, index, data);
            });
                            checkAndRemoveRiwayatPendidikanRequiredAsterisk();

        }else{
                            checkAndRemoveRiwayatPendidikanRequiredAsterisk();

        }

        // Event listener for "Tambah Pendidikan" button
        if (addEducationButton) {
            addEducationButton.addEventListener('click', function() {
                addEducationField(sectionPrefix, educationCount);
                educationCount++;
            });
        }

        // --- Event Delegation untuk tombol Hapus Pendidikan ---
        // PENTING: Listener ini harus berada di luar fungsi addEducationField
        // dan dipasang pada kontainer induk yang statis (educationHistoryContainer)
        if (educationHistoryContainer) {
            educationHistoryContainer.addEventListener('click', function(e) {
                // Memeriksa apakah elemen yang diklik atau salah satu leluhurnya memiliki kelas 'remove-education'
                // Kita menggunakan .closest() untuk memastikan kita menangkap tombol jika ada elemen nested di dalamnya
                if (e.target.classList.contains('remove-education') || e.target.closest(
                        '.remove-education')) {
                    const removeButton = e.target.closest(
                        '.remove-education'); // Dapatkan tombol yang sebenarnya
                    const targetId = removeButton.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                        // Panggil fungsi untuk memperbarui nama atribut setelah penghapusan
                        updateEducationFieldNames(sectionPrefix, educationHistoryContainer);
                                        checkAndRemoveRiwayatPendidikanRequiredAsterisk();

                    }
                }
            });
        }


        // --- Validation Logic for Individual Sections ---
     
    });
</script>
