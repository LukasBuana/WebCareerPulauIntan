<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Bahasa Asing yang Dikuasai --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}ForeignLanguageMainCollapse" aria-expanded="false"
                    style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-language me-2"></i>Bahasa Asing yang Dikuasai<span class="required"id="{{ $section_prefix ?? '' }}foreignLanguageRequired">*</span>
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
                                                id="{{ $section_prefix ?? '' }}add-foreign-language">Tambah
                                                Bahasa</button>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="languages"
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
        const existingForeignLanguageData = @json($applicant->languages ?? []);
        let foreignLanguageCount = existingForeignLanguageData.length;
        const foreignLanguageContainer = document.getElementById(
            '{{ $section_prefix ?? '' }}foreign-language-container');
        const addForeignLanguageButton = document.getElementById(
            '{{ $section_prefix ?? '' }}add-foreign-language');
        const sectionPrefix = '{{ $section_prefix ?? '' }}';
                const requiredAsterisk = document.getElementById(`${sectionPrefix}foreignLanguageRequired`);


        function addForeignLanguageField(prefix, index, data = {}) {
            const id = data.id || '';

            const language_name = data.language_name || '';
            const listening_proficiency = data.listening_proficiency || '';
            const reading_proficiency = data.reading_proficiency || '';
            const speaking_proficiency = data.speaking_proficiency || '';
            const written_proficiency = data.written_proficiency || '';

            const proficiencyOptions = [{
                    value: 'Baik Sekali',
                    text: 'Baik Sekali'
                },
                {
                    value: 'Baik',
                    text: 'Baik'
                },
                {
                    value: 'Cukup',
                    text: 'Cukup'
                },
                {
                    value: 'Kurang',
                    text: 'Kurang'
                }
            ];

            const createSelectOptions = (selectedValue) => {
                let optionsHtml = '<option value="">Pilih Tingkat</option>';
                proficiencyOptions.forEach(option => {
                    optionsHtml +=
                        `<option value="${option.value}" ${selectedValue === option.value ? 'selected' : ''}>${option.text}</option>`;
                });
                return optionsHtml;
            };

            const foreignLanguageHtml = `
                <div class="foreign-language-item border p-3 mb-3 rounded" id="${prefix}foreign-language-${index}">
                            <input type="hidden" name="languages[${index}][id]" value="${id}"> 

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="${prefix}language_name_${index}" class="form-label">Jenis Bahasa <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}language_name_${index}" name="languages[${index}][language_name]" value="${language_name}" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="${prefix}listening_proficiency_${index}" class="form-label">Mendengar <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}listening_proficiency_${index}" name="languages[${index}][listening_proficiency]" required>
                                ${createSelectOptions(listening_proficiency)}
                            </select>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="${prefix}reading_proficiency_${index}" class="form-label">Membaca <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}reading_proficiency_${index}" name="languages[${index}][reading_proficiency]" required>
                                ${createSelectOptions(reading_proficiency)}
                            </select>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="${prefix}speaking_proficiency_${index}" class="form-label">Berbicara <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}speaking_proficiency_${index}" name="languages[${index}][speaking_proficiency]" required>
                                ${createSelectOptions(speaking_proficiency)}
                            </select>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="${prefix}written_proficiency_${index}" class="form-label">Menulis <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}written_proficiency_${index}" name="languages[${index}][written_proficiency]" required>
                                ${createSelectOptions(written_proficiency)}
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
            checkAndRemoveRequiredAsterisk();
        }

        function checkAndRemoveRequiredAsterisk() {
            if (foreignLanguageContainer && foreignLanguageContainer.children.length > 0 && requiredAsterisk) {
                requiredAsterisk.remove();
            }
        }

        // Load existing foreign language data
        if (existingForeignLanguageData && existingForeignLanguageData.length > 0) {
            existingForeignLanguageData.forEach((data, index) => {
                addForeignLanguageField(sectionPrefix, index, data);
            });
                        checkAndRemoveRequiredAsterisk();

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
                    if (foreignLanguageContainer.children.length === 0 && !requiredAsterisk) {
                        const h5Element = mainCardHeaderForeignLanguage.querySelector('h5');
                        h5Element.insertAdjacentHTML('beforeend',
                            `<span class="required" id="${sectionPrefix}foreignLanguageRequired">*</span>`);
                    }
                }
            });
        }

    });
</script>
