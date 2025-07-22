<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Bahasa Asing yang Dikuasai --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}ForeignLanguageMainCollapse"
                    aria-expanded="false" style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-language me-2"></i>Bahasa Asing yang Dikuasai<span class="required">*</span>
                    </h5>
                    <i class="fas fa-chevron-up collapse-icon"></i>
                </div>

                {{-- Main Card Body for Bahasa Asing yang Dikuasai --}}
                <div class="collapse" id="{{ $section_prefix ?? '' }}ForeignLanguageMainCollapse">
                    <div class="card-body">
                        <div class="accordion" id="{{ $section_prefix ?? '' }}accordionForeignLanguage">

                            {{-- Foreign Language Proficiency --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingForeignLanguage">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseForeignLanguage"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseForeignLanguage">
                                        Daftar Bahasa Asing
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseForeignLanguage"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingForeignLanguage"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionForeignLanguage">
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formForeignLanguage" method="POST">
                                            <div id="{{ $section_prefix ?? '' }}foreign-language-container">
                                                {{-- Dynamic language fields will be added here by JS --}}
                                            </div>
                                            <button type="button" class="btn btn-info btn-sm mt-2"
                                                id="{{ $section_prefix ?? '' }}add-foreign-language">Tambah Bahasa</button>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="foreign_language"
                                                        data-prefix="{{ $section_prefix ?? '' }}">
                                                        <i class="fas fa-save me-2"></i>Simpan Bahasa Asing
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- End of accordionForeignLanguage --}}
                    </div> {{-- End of card-body --}}
                </div> {{-- End of main collapse for Bahasa Asing yang Dikuasai --}}
            </div> {{-- End of card --}}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Logic for Main Card Header Toggle (Bahasa Asing yang Dikuasai) ---
        const mainCardHeaderForeignLanguage = document.querySelector(
                '#{{ $section_prefix ?? '' }}ForeignLanguageMainCollapse')
            .previousElementSibling; // Get the header
        const mainCollapseForeignLanguage = document.getElementById(
            '{{ $section_prefix ?? '' }}ForeignLanguageMainCollapse');
        const mainCollapseIconForeignLanguage = mainCardHeaderForeignLanguage.querySelector('.collapse-icon');

        if (mainCardHeaderForeignLanguage && mainCollapseForeignLanguage && mainCollapseIconForeignLanguage) {
            mainCollapseForeignLanguage.addEventListener('show.bs.collapse', function() {
                mainCardHeaderForeignLanguage.classList.add('active');
                mainCollapseIconForeignLanguage.classList.remove('fa-chevron-down');
                mainCollapseIconForeignLanguage.classList.add('fa-chevron-up');
            });

            mainCollapseForeignLanguage.addEventListener('hide.bs.collapse', function() {
                mainCardHeaderForeignLanguage.classList.remove('active');
                mainCollapseIconForeignLanguage.classList.remove('fa-chevron-up');
                mainCollapseIconForeignLanguage.classList.add('fa-chevron-down');
            });

            // Initial state for main card header
            if (mainCollapseForeignLanguage.classList.contains('show')) {
                mainCardHeaderForeignLanguage.classList.add('active');
                mainCollapseIconForeignLanguage.classList.remove('fa-chevron-down');
                mainCollapseIconForeignLanguage.classList.add('fa-chevron-up');
            } else {
                mainCardHeaderForeignLanguage.classList.remove('active');
                mainCollapseIconForeignLanguage.classList.remove('fa-chevron-up');
                mainCollapseIconForeignLanguage.classList.add('fa-chevron-down');
            }
        }

        // --- Dynamic Fields for Foreign Language Proficiency ---
        // Assuming $applicant->foreignLanguages holds existing data
        const existingForeignLanguageData = @json($applicant->foreignLanguages ?? []);
        let foreignLanguageCount = existingForeignLanguageData.length;
        const foreignLanguageContainer = document.getElementById(
            '{{ $section_prefix ?? '' }}foreign-language-container');
        const addForeignLanguageButton = document.getElementById('{{ $section_prefix ?? '' }}add-foreign-language');
        const sectionPrefix = '{{ $section_prefix ?? '' }}';

        function addForeignLanguageField(prefix, index, data = {}) {
            const language_name = data.language_name || '';
            const listening_proficiency = data.listening_proficiency || '';
            const reading_proficiency = data.reading_proficiency || '';
            const speaking_proficiency = data.speaking_proficiency || '';
            const writing_proficiency = data.writing_proficiency || '';

            const proficiencyOptions = [
                { value: 'Baik sekali', text: 'Baik sekali' },
                { value: 'Baik', text: 'Baik' },
                { value: 'Cukup', text: 'Cukup' },
                { value: 'Kurang', text: 'Kurang' }
            ];

            const createSelectOptions = (selectedValue) => {
                let optionsHtml = '<option value="">Pilih Tingkat</option>';
                proficiencyOptions.forEach(option => {
                    optionsHtml += `<option value="${option.value}" ${selectedValue === option.value ? 'selected' : ''}>${option.text}</option>`;
                });
                return optionsHtml;
            };

            const foreignLanguageHtml = `
                <div class="foreign-language-item border p-3 mb-3 rounded" id="${prefix}foreign-language-${index}">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="${prefix}language_name_${index}" class="form-label">Jenis Bahasa <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}language_name_${index}" name="foreign_languages[${index}][language_name]" value="${language_name}" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="${prefix}listening_proficiency_${index}" class="form-label">Mendengar <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}listening_proficiency_${index}" name="foreign_languages[${index}][listening_proficiency]" required>
                                ${createSelectOptions(listening_proficiency)}
                            </select>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="${prefix}reading_proficiency_${index}" class="form-label">Membaca <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}reading_proficiency_${index}" name="foreign_languages[${index}][reading_proficiency]" required>
                                ${createSelectOptions(reading_proficiency)}
                            </select>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="${prefix}speaking_proficiency_${index}" class="form-label">Berbicara <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}speaking_proficiency_${index}" name="foreign_languages[${index}][speaking_proficiency]" required>
                                ${createSelectOptions(speaking_proficiency)}
                            </select>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="${prefix}writing_proficiency_${index}" class="form-label">Menulis <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}writing_proficiency_${index}" name="foreign_languages[${index}][writing_proficiency]" required>
                                ${createSelectOptions(writing_proficiency)}
                            </select>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-foreign-language mt-2" data-target-id="${prefix}foreign-language-${index}">Hapus</button>
                </div>
            `;
            if (foreignLanguageContainer) {
                foreignLanguageContainer.insertAdjacentHTML('beforeend', foreignLanguageHtml);
            }
        }

        // Load existing foreign language data
        if (existingForeignLanguageData && existingForeignLanguageData.length > 0) {
            existingForeignLanguageData.forEach((data, index) => {
                addForeignLanguageField(sectionPrefix, index, data);
            });
        }

        // Event listener for "Tambah Bahasa" button
        if (addForeignLanguageButton) {
            addForeignLanguageButton.addEventListener('click', function() {
                addForeignLanguageField(sectionPrefix, foreignLanguageCount);
                foreignLanguageCount++;
            });
        }

        // Event listener for "Hapus" button on dynamic foreign language fields
        if (foreignLanguageContainer) {
            foreignLanguageContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-foreign-language')) {
                    const targetId = e.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                    }
                }
            });
        }

        // --- Validation Logic for Saving Sections ---
        document.querySelectorAll('.save-section-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const sectionId = this.dataset.section;
                const prefix = this.dataset.prefix;
                // Dynamically determine the form ID based on sectionId
                const formIdSuffix = sectionId.split('_').map((word, idx) => idx === 0 ? word : word.charAt(0).toUpperCase() + word.slice(1)).join('');
                const formElement = document.getElementById(`${prefix}form${formIdSuffix}`);

                const sectionCollapseId = `#${prefix}collapse${sectionId.charAt(0).toUpperCase() + sectionId.slice(1).replace(/_([a-z])/g, (g) => g[1].toUpperCase())}`;
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

                // --- Validation for Education History ---
                if (sectionId === 'education_history') {
                    const educationItems = sectionElement.querySelectorAll('.education-item');
                    if (educationItems.length === 0) {
                        isValid = false;
                        alert('Mohon tambahkan setidaknya satu Riwayat Pendidikan.');
                    } else {
                        educationItems.forEach((item, idx) => {
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

                // --- Validation for Organization History ---
                if (sectionId === 'organization_history') {
                    const organizationItems = sectionElement.querySelectorAll('.organization-item');
                    if (organizationItems.length === 0) {
                        isValid = false;
                        alert('Mohon tambahkan setidaknya satu Riwayat Organisasi.');
                    } else {
                        organizationItems.forEach((item, idx) => {
                            const organizationNameField = item.querySelector(`[name="organization_history[${idx}][organization_name]"]`);
                            const positionField = item.querySelector(`[name="organization_history[${idx}][position]"]`);
                            const periodStartYearOrgField = item.querySelector(`[name="organization_history[${idx}][period_start_year]"]`);
                            const periodEndYearOrgField = item.querySelector(`[name="organization_history[${idx}][period_end_year]"]`);

                            const fieldsToCheck = [
                                { field: organizationNameField, msg: 'Nama organisasi harus diisi' },
                                { field: positionField, msg: 'Jabatan harus diisi' },
                                { field: periodStartYearOrgField, msg: 'Tahun mulai harus diisi' },
                                { field: periodEndYearOrgField, msg: 'Tahun selesai harus diisi' }
                            ];

                            fieldsToCheck.forEach(f => {
                                if (f.field && !f.field.value.trim()) {
                                    f.field.classList.add('is-invalid');
                                    const errorMsg = f.field.parentElement.querySelector('.error-message');
                                    if (errorMsg) {
                                        errorMsg.textContent = f.msg;
                                        errorMsg.style.display = 'block';
                                    }
                                    isValid = false;
                                }
                            });

                            if (periodStartYearOrgField && periodEndYearOrgField && periodStartYearOrgField.value && periodEndYearOrgField.value) {
                                const startYear = parseInt(periodStartYearOrgField.value);
                                const endYear = parseInt(periodEndYearOrgField.value);
                                if (startYear > endYear) {
                                    periodEndYearOrgField.classList.add('is-invalid');
                                    const errorMsg = periodEndYearOrgField.parentElement.querySelector('.error-message');
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

                // --- Validation for Training Course ---
                if (sectionId === 'training_course') {
                    const trainingCourseItems = sectionElement.querySelectorAll('.training-course-item');
                    if (trainingCourseItems.length === 0) {
                        isValid = false;
                        alert('Mohon tambahkan setidaknya satu Pengalaman Kursus/Training.');
                    } else {
                        trainingCourseItems.forEach((item, idx) => {
                            const trainingNameField = item.querySelector(`[name="training_courses[${idx}][training_name]"]`);
                            const yearField = item.querySelector(`[name="training_courses[${idx}][year]"]`);
                            const organizerField = item.querySelector(`[name="training_courses[${idx}][organizer]"]`);
                            const rankingField = item.querySelector(`[name="training_courses[${idx}][ranking]"]`);

                            const fieldsToCheck = [
                                { field: trainingNameField, msg: 'Nama Training harus diisi' },
                                { field: yearField, msg: 'Tahun harus diisi dan berupa angka 4 digit' },
                                { field: organizerField, msg: 'Penyelenggara harus diisi' },
                                { field: rankingField, msg: 'Peringkat harus diisi' }
                            ];

                            fieldsToCheck.forEach(f => {
                                if (f.field && (!f.field.value || !f.field.value.trim())) {
                                    f.field.classList.add('is-invalid');
                                    const errorMsg = f.field.parentElement.querySelector('.error-message');
                                    if (errorMsg) {
                                        errorMsg.textContent = f.msg;
                                        errorMsg.style.display = 'block';
                                    }
                                    isValid = false;
                                } else if (f.field === yearField && (isNaN(parseInt(f.field.value)) || f.field.value.length !== 4)) {
                                    f.field.classList.add('is-invalid');
                                    const errorMsg = f.field.parentElement.querySelector('.error-message');
                                    if (errorMsg) {
                                        errorMsg.textContent = 'Tahun harus diisi dan berupa angka 4 digit yang valid.';
                                        errorMsg.style.display = 'block';
                                    }
                                    isValid = false;
                                }
                            });
                        });
                    }
                }

                // --- Validation for Foreign Language --- (NEW)
                if (sectionId === 'foreign_language') {
                    const foreignLanguageItems = sectionElement.querySelectorAll('.foreign-language-item');
                    if (foreignLanguageItems.length === 0) {
                        isValid = false;
                        alert('Mohon tambahkan setidaknya satu Bahasa Asing yang dikuasai.');
                    } else {
                        foreignLanguageItems.forEach((item, idx) => {
                            const languageNameField = item.querySelector(`[name="foreign_languages[${idx}][language_name]"]`);
                            const listeningField = item.querySelector(`[name="foreign_languages[${idx}][listening_proficiency]"]`);
                            const readingField = item.querySelector(`[name="foreign_languages[${idx}][reading_proficiency]"]`);
                            const speakingField = item.querySelector(`[name="foreign_languages[${idx}][speaking_proficiency]"]`);
                            const writingField = item.querySelector(`[name="foreign_languages[${idx}][writing_proficiency]"]`);

                            const fieldsToCheck = [
                                { field: languageNameField, msg: 'Jenis Bahasa harus diisi' },
                                { field: listeningField, msg: 'Tingkat Mendengar harus dipilih' },
                                { field: readingField, msg: 'Tingkat Membaca harus dipilih' },
                                { field: speakingField, msg: 'Tingkat Berbicara harus dipilih' },
                                { field: writingField, msg: 'Tingkat Menulis harus dipilih' }
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
                        });
                    }
                }


                // If validation passes, submit the form via AJAX
                if (isValid) {
                    const formData = new FormData(formElement);
                    const allFormData = {};
                    formData.forEach((value, key) => {
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

                    fetch(formElement.action, {
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