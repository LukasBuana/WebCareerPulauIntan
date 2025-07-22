<div class="container-fluid mt-4"> {{-- Added mt-4 for spacing from previous sections --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Riwayat Pendidikan --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}RiwayatPendidikanMainCollapse" {{-- Unique ID for main collapse --}}
                    aria-expanded="false" {{-- Start collapsed by default --}} style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-graduation-cap me-2"></i>Riwayat Pendidikan<span class="required">*</span>
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

        

         function addEducationField(prefix, index, data = {}) {
            // Use provided data or empty strings if no data
            const level_of_education = data.level_of_education || '';
            const institution = data.institution || '';
            const major = data.major || '';
            const period_start_year = data.period_start_year || '';
            const period_end_year = data.period_end_year || '';
            const grade = data.grade || '';

            const educationHtml = `
                <div class="education-item border p-3 mb-3 rounded" id="${prefix}education-${index}">
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
                    <button type="button" class="btn btn-danger btn-sm remove-education mt-2" data-target-id="${prefix}education-${index}">Hapus</button>
                </div>
            `;
            if (educationHistoryContainer) {
                educationHistoryContainer.insertAdjacentHTML('beforeend', educationHtml);
            }
        }

        // Load existing education data when the page loads
        if (existingEducationData && existingEducationData.length > 0) {
            existingEducationData.forEach((data, index) => {
                addEducationField(sectionPrefix, index, data);
            });
        } else {
            // If no existing data, add one empty field by default (optional, based on UX)
            // addEducationField(sectionPrefix, educationCount);
            // educationCount++;
        }

        // Event listener for "Tambah Pendidikan" button remains the same,
        // it will just use the updated `educationCount`.
        if (addEducationButton) {
            addEducationButton.addEventListener('click', function() {
                addEducationField(sectionPrefix, educationCount);
                educationCount++;
            });
        }


        // --- Validation Logic for Individual Sections ---
        // This part needs to be in your main script or a script that loads after all includes
        // and iterates over all .save-section-btn. It needs to know the prefix.
        // For demonstration, I'll put it here, but ideally, this validation logic
        // would be consolidated in your main application script.

        document.querySelectorAll('.save-section-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const sectionId = this.dataset.section;
                const prefix = this.dataset.prefix;
                const sectionCollapseId = `#${prefix}collapse${sectionId.charAt(0).toUpperCase() + sectionId.slice(1)}`;
                const sectionElement = document.querySelector(sectionCollapseId);
                let isValid = true;

                if (!sectionElement) {
                    console.error(`Section element not found for ID: ${sectionCollapseId}`);
                    return;
                }

                // Reset error messages and invalid class for the specific section
                sectionElement.querySelectorAll('.error-message').forEach(msg => {
                    msg.style.display = 'none';
                });
                sectionElement.querySelectorAll('.form-control, .form-select, textarea').forEach(input => {
                    input.classList.remove('is-invalid');
                });

                // --- Dynamic Fields Validation ---
                if (sectionId === 'education_history') { // Corrected sectionId to match data-section attribute
                    const educationItems = educationHistoryContainer.querySelectorAll('.education-item');
                    if (educationItems.length === 0) {
                        isValid = false;
                        alert('Mohon tambahkan setidaknya satu Riwayat Pendidikan.');
                    } else {
                        educationItems.forEach((item, idx) => {
                            // Corrected field selectors to match `name` attributes
                            const jenjangField = item.querySelector(`[name="education_history[${idx}][level_of_education]"]`);
                            const institusiField = item.querySelector(`[name="education_history[${idx}][institution]"]`);
                            const jurusanField = item.querySelector(`[name="education_history[${idx}][major]"]`);
                            const tahunMulaiField = item.querySelector(`[name="education_history[${idx}][period_start_year]"]`);
                            const tahunSelesaiField = item.querySelector(`[name="education_history[${idx}][period_end_year]"]`);

                            const fieldsToCheck = [
                                { field: jenjangField, msg: 'Jenjang harus diisi' },
                                { field: institusiField, msg: 'Nama institusi harus diisi' },
                                { field: jurusanField, msg: 'Jurusan harus diisi' },
                                { field: tahunMulaiField, msg: 'Tahun mulai harus diisi' },
                                { field: tahunSelesaiField, msg: 'Tahun selesai harus diisi' }
                            ];

                            fieldsToCheck.forEach(f => {
                                if (f.field && (f.field.type === 'select-one' ? !f.field.value : !f.field.value.trim())) {
                                    f.field.classList.add('is-invalid');
                                    const errorMsg = f.field.parentElement.querySelector('.error-message');
                                    if (errorMsg) {
                                        errorMsg.textContent = f.msg;
                                        errorMsg.style.display = 'block';
                                    }
                                    isValid = false;
                                }
                            });

                            if (tahunMulaiField && tahunSelesaiField && tahunMulaiField.value && tahunSelesaiField.value) {
                                const startYear = parseInt(tahunMulaiField.value);
                                const endYear = parseInt(tahunSelesaiField.value);
                                if (startYear > endYear) {
                                    tahunSelesaiField.classList.add('is-invalid');
                                    const errorMsg = tahunSelesaiField.parentElement.querySelector('.error-message');
                                    if (errorMsg) {
                                        errorMsg.textContent = 'Tahun selesai tidak boleh sebelum tahun mulai.';
                                        errorMsg.style.display = 'block';
                                    }
                                    isValid = false;
                                }
                            }
                        });
                    }
                }

                // If validation passes, you'd typically submit the form via AJAX
                if (isValid) {
                    // This assumes you're submitting the specific form, not the whole page.
                    // If you want to submit the whole form, you can do:
                    // document.getElementById(`${prefix}formPendidikanFormal`).submit();

                    // For AJAX submission, you'd collect data and send it:
                    const form = document.getElementById(`${prefix}formPendidikanFormal`);
                    const formData = new FormData(form);
                    const allFormData = {};
                    formData.forEach((value, key) => {
                        // Handle array inputs correctly
                        const match = key.match(/(\w+)\[(\d+)\]\[(\w+)\]/);
                        if (match) {
                            const parentKey = match[1];
                            const index = match[2];
                            const fieldKey = match[3];

                            if (!allFormData[parentKey]) {
                                allFormData[parentKey] = [];
                            }
                            if (!allFormData[parentKey][index]) {
                                allFormData[parentKey][index] = {};
                            }
                            allFormData[parentKey][index][fieldKey] = value;
                        } else {
                            allFormData[key] = value;
                        }
                    });

                    // Convert to JSON and send with Fetch API or Axios
                    fetch(form.action, {
                        method: 'POST', // Or PATCH/PUT for updates
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Add CSRF token
                        },
                        body: JSON.stringify(allFormData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.redirect) {
                            window.location.href = data.redirect;
                        } else {
                            alert(data.message);
                            // Handle success (e.g., refresh part of the page or show success message)
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menyimpan data.');
                        // Handle errors (e.g., display specific error messages from backend)
                    });
                }
            });
        });
    });
</script>
