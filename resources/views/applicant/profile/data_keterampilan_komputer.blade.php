<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Keterampilan Komputer --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}ComputerSkillsMainCollapse"
                    aria-expanded="false" style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-laptop-code me-2"></i>Keterampilan Komputer<span class="required">*</span>
                    </h5>
                    <i class="fas fa-chevron-up collapse-icon"></i>
                </div>

                {{-- Main Card Body for Keterampilan Komputer --}}
                <div class="collapse" id="{{ $section_prefix ?? '' }}ComputerSkillsMainCollapse">
                    <div class="card-body">
                        <div class="accordion" id="{{ $section_prefix ?? '' }}accordionComputerSkills">

                            {{-- Computer Skills Proficiency --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingComputerSkills">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseComputerSkills"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseComputerSkills">
                                        Daftar Keterampilan Komputer
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseComputerSkills"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingComputerSkills"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionComputerSkills">
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formComputerSkills" method="POST">
                                            <div class="row">
                                                {{-- MS Word --}}
                                                <div class="col-md-6 mb-3">
                                                    <label for="{{ $section_prefix ?? '' }}skill_ms_word" class="form-label">MS. Word <span class="required">*</span></label>
                                                    <select class="form-select" id="{{ $section_prefix ?? '' }}skill_ms_word" name="computer_skills[ms_word]" required>
                                                        <option value="">Pilih Tingkat</option>
                                                        <option value="Baik sekali">Baik sekali</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Cukup">Cukup</option>
                                                        <option value="Kurang">Kurang</option>
                                                    </select>
                                                    <div class="error-message"></div>
                                                </div>
                                                {{-- MS Excel --}}
                                                <div class="col-md-6 mb-3">
                                                    <label for="{{ $section_prefix ?? '' }}skill_ms_excel" class="form-label">MS. Excel <span class="required">*</span></label>
                                                    <select class="form-select" id="{{ $section_prefix ?? '' }}skill_ms_excel" name="computer_skills[ms_excel]" required>
                                                        <option value="">Pilih Tingkat</option>
                                                        <option value="Baik sekali">Baik sekali</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Cukup">Cukup</option>
                                                        <option value="Kurang">Kurang</option>
                                                    </select>
                                                    <div class="error-message"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                {{-- MS PowerPoint --}}
                                                <div class="col-md-6 mb-3">
                                                    <label for="{{ $section_prefix ?? '' }}skill_ms_powerpoint" class="form-label">MS. PowerPoint <span class="required">*</span></label>
                                                    <select class="form-select" id="{{ $section_prefix ?? '' }}skill_ms_powerpoint" name="computer_skills[ms_powerpoint]" required>
                                                        <option value="">Pilih Tingkat</option>
                                                        <option value="Baik sekali">Baik sekali</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Cukup">Cukup</option>
                                                        <option value="Kurang">Kurang</option>
                                                    </select>
                                                    <div class="error-message"></div>
                                                </div>
                                                {{-- AutoCAD --}}
                                                <div class="col-md-6 mb-3">
                                                    <label for="{{ $section_prefix ?? '' }}skill_autocad" class="form-label">AutoCAD <span class="required">*</span></label>
                                                    <select class="form-select" id="{{ $section_prefix ?? '' }}skill_autocad" name="computer_skills[autocad]" required>
                                                        <option value="">Pilih Tingkat</option>
                                                        <option value="Baik sekali">Baik sekali</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Cukup">Cukup</option>
                                                        <option value="Kurang">Kurang</option>
                                                    </select>
                                                    <div class="error-message"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                {{-- ZWCAD --}}
                                                <div class="col-md-6 mb-3">
                                                    <label for="{{ $section_prefix ?? '' }}skill_zwcad" class="form-label">ZWCAD <span class="required">*</span></label>
                                                    <select class="form-select" id="{{ $section_prefix ?? '' }}skill_zwcad" name="computer_skills[zwcad]" required>
                                                        <option value="">Pilih Tingkat</option>
                                                        <option value="Baik sekali">Baik sekali</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Cukup">Cukup</option>
                                                        <option value="Kurang">Kurang</option>
                                                    </select>
                                                    <div class="error-message"></div>
                                                </div>
                                                {{-- Photoshop/CorelDRAW --}}
                                                <div class="col-md-6 mb-3">
                                                    <label for="{{ $section_prefix ?? '' }}skill_photoshop_coreldraw" class="form-label">Photoshop/CorelDRAW <span class="required">*</span></label>
                                                    <select class="form-select" id="{{ $section_prefix ?? '' }}skill_photoshop_coreldraw" name="computer_skills[photoshop_coreldraw]" required>
                                                        <option value="">Pilih Tingkat</option>
                                                        <option value="Baik sekali">Baik sekali</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Cukup">Cukup</option>
                                                        <option value="Kurang">Kurang</option>
                                                    </select>
                                                    <div class="error-message"></div>
                                                </div>
                                            </div>
                                            <hr> {{-- Separator for generic fields --}}
                                            <h5>Keterampilan Komputer Lainnya (Opsional)</h5>
                                            <div id="{{ $section_prefix ?? '' }}other-computer-skills-container">
                                                {{-- Dynamic other skills will be added here by JS --}}
                                            </div>
                                            <button type="button" class="btn btn-info btn-sm mt-2"
                                                id="{{ $section_prefix ?? '' }}add-other-computer-skill">Tambah Keterampilan Lain</button>

                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="computer_skills"
                                                        data-prefix="{{ $section_prefix ?? '' }}">
                                                        <i class="fas fa-save me-2"></i>Simpan Keterampilan Komputer
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- End of accordionComputerSkills --}}
                    </div> {{-- End of card-body --}}
                </div> {{-- End of main collapse for Keterampilan Komputer --}}
            </div> {{-- End of card --}}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Re-usable dropdown options for proficiency ---
        const proficiencyOptionsHtml = `
            <option value="">Pilih Tingkat</option>
            <option value="Baik sekali">Baik sekali</option>
            <option value="Baik">Baik</option>
            <option value="Cukup">Cukup</option>
            <option value="Kurang">Kurang</option>
        `;

        // --- Logic for Main Card Header Toggle (Keterampilan Komputer) ---
        const mainCardHeaderComputerSkills = document.querySelector(
                '#{{ $section_prefix ?? '' }}ComputerSkillsMainCollapse')
            .previousElementSibling; // Get the header
        const mainCollapseComputerSkills = document.getElementById(
            '{{ $section_prefix ?? '' }}ComputerSkillsMainCollapse');
        const mainCollapseIconComputerSkills = mainCardHeaderComputerSkills.querySelector('.collapse-icon');

        if (mainCardHeaderComputerSkills && mainCollapseComputerSkills && mainCollapseIconComputerSkills) {
            mainCollapseComputerSkills.addEventListener('show.bs.collapse', function() {
                mainCardHeaderComputerSkills.classList.add('active');
                mainCollapseIconComputerSkills.classList.remove('fa-chevron-down');
                mainCollapseIconComputerSkills.classList.add('fa-chevron-up');
            });

            mainCollapseComputerSkills.addEventListener('hide.bs.collapse', function() {
                mainCardHeaderComputerSkills.classList.remove('active');
                mainCollapseIconComputerSkills.classList.remove('fa-chevron-up');
                mainCollapseIconComputerSkills.classList.add('fa-chevron-down');
            });

            // Initial state for main card header
            if (mainCollapseComputerSkills.classList.contains('show')) {
                mainCardHeaderComputerSkills.classList.add('active');
                mainCollapseIconComputerSkills.classList.remove('fa-chevron-down');
                mainCollapseIconComputerSkills.classList.add('fa-chevron-up');
            } else {
                mainCardHeaderComputerSkills.classList.remove('active');
                mainCollapseIconComputerSkills.classList.remove('fa-chevron-up');
                mainCollapseIconComputerSkills.classList.add('fa-chevron-down');
            }
        }

        // --- Populate pre-defined computer skills from existing data ---
        const existingComputerSkillsData = @json($applicant->computerSkills ?? []); // Assuming $applicant->computerSkills for predefined
        const existingOtherComputerSkillsData = @json($applicant->otherComputerSkills ?? []); // Assuming $applicant->otherComputerSkills for dynamic ones
        const formComputerSkills = document.getElementById('{{ $section_prefix ?? '' }}formComputerSkills');

        if (formComputerSkills && existingComputerSkillsData) {
            for (const skillKey in existingComputerSkillsData) {
                const selectElement = formComputerSkills.querySelector(`[name="computer_skills[${skillKey}]"]`);
                if (selectElement) {
                    selectElement.value = existingComputerSkillsData[skillKey];
                }
            }
        }

        // --- Dynamic Fields for Other Computer Skills ---
        let otherComputerSkillCount = existingOtherComputerSkillsData.length;
        const otherComputerSkillsContainer = document.getElementById(
            '{{ $section_prefix ?? '' }}other-computer-skills-container');
        const addOtherComputerSkillButton = document.getElementById('{{ $section_prefix ?? '' }}add-other-computer-skill');
        const sectionPrefix = '{{ $section_prefix ?? '' }}';

        function addOtherComputerSkillField(prefix, index, data = {}) {
            const skill_name = data.skill_name || '';
            const proficiency = data.proficiency || '';

            const otherSkillHtml = `
                <div class="other-skill-item row align-items-end mb-3" id="${prefix}other-skill-${index}">
                    <div class="col-md-5 mb-3">
                        <label for="${prefix}other_skill_name_${index}" class="form-label">Nama Keterampilan Lain <span class="required">*</span></label>
                        <input type="text" class="form-control" id="${prefix}other_skill_name_${index}" name="other_computer_skills[${index}][skill_name]" value="${skill_name}" required>
                        <div class="error-message"></div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="${prefix}other_skill_proficiency_${index}" class="form-label">Tingkat Penguasaan <span class="required">*</span></label>
                        <select class="form-select" id="${prefix}other_skill_proficiency_${index}" name="other_computer_skills[${index}][proficiency]" required>
                            ${proficiencyOptionsHtml.replace(`value="${proficiency}"`, `value="${proficiency}" selected`)}
                        </select>
                        <div class="error-message"></div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <button type="button" class="btn btn-danger btn-sm remove-other-skill w-100" data-target-id="${prefix}other-skill-${index}">Hapus</button>
                    </div>
                </div>
            `;
            if (otherComputerSkillsContainer) {
                otherComputerSkillsContainer.insertAdjacentHTML('beforeend', otherSkillHtml);
            }
        }

        // Load existing other computer skills data
        if (existingOtherComputerSkillsData && existingOtherComputerSkillsData.length > 0) {
            existingOtherComputerSkillsData.forEach((data, index) => {
                addOtherComputerSkillField(sectionPrefix, index, data);
            });
        }

        // Event listener for "Tambah Keterampilan Lain" button
        if (addOtherComputerSkillButton) {
            addOtherComputerSkillButton.addEventListener('click', function() {
                addOtherComputerSkillField(sectionPrefix, otherComputerSkillCount);
                otherComputerSkillCount++;
            });
        }

        // Event listener for "Hapus" button on dynamic other skills fields
        if (otherComputerSkillsContainer) {
            otherComputerSkillsContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-other-skill')) {
                    const targetId = e.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                    }
                }
            });
        }


        // --- Rest of your existing JavaScript for other sections (Education, Organization, Training) ---
        // This part would typically be loaded from other included files or a single main script.
        // For brevity, I am not duplicating the existing full script here again.
        // However, I will show the updated `save-section-btn` validation for 'computer_skills'.

        // Existing validation logic for `save-section-btn` is assumed to be present.
        // I will only add the new validation for `computer_skills` here.

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

                // --- Validation for Education History --- (Existing)
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

                // --- Validation for Foreign Language ---
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

                // --- Validation for Computer Skills --- (NEW)
                if (sectionId === 'computer_skills') {
                    // Validate predefined skills (MS Word, Excel, etc.)
                    const predefinedSkills = [
                        'ms_word', 'ms_excel', 'ms_powerpoint', 'autocad', 'zwcad', 'photoshop_coreldraw'
                    ];
                    predefinedSkills.forEach(skillKey => {
                        const selectElement = sectionElement.querySelector(`[name="computer_skills[${skillKey}]"]`);
                        if (selectElement && !selectElement.value) {
                            selectElement.classList.add('is-invalid');
                            const errorMsg = selectElement.parentElement.querySelector('.error-message');
                            if (errorMsg) {
                                errorMsg.textContent = `Tingkat penguasaan ${skillKey.replace(/_/g, ' ').toUpperCase()} harus dipilih.`;
                                errorMsg.style.display = 'block';
                            }
                            isValid = false;
                        }
                    });

                    // Validate dynamic 'other' skills
                    const otherSkillItems = sectionElement.querySelectorAll('.other-skill-item');
                    otherSkillItems.forEach((item, idx) => {
                        const skillNameField = item.querySelector(`[name="other_computer_skills[${idx}][skill_name]"]`);
                        const proficiencyField = item.querySelector(`[name="other_computer_skills[${idx}][proficiency]"]`);

                        const fieldsToCheck = [
                            { field: skillNameField, msg: 'Nama keterampilan harus diisi' },
                            { field: proficiencyField, msg: 'Tingkat penguasaan harus dipilih' }
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


                // If validation passes, submit the form via AJAX
                if (isValid) {
                    const formData = new FormData(formElement);
                    const allFormData = {};
                    formData.forEach((value, key) => {
                        const match = key.match(/(\w+)\[(\d+)\]\[(\w+)\]/); // Matches array like computer_skills[0][skill_name]
                        const simpleMatch = key.match(/(\w+)\[(\w+)\]/); // Matches simple objects like computer_skills[ms_word]

                        if (match) { // For dynamic arrays
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
                        } else if (simpleMatch) { // For simple key-value objects like predefined computer skills
                            const parentKey = simpleMatch[1];
                            const fieldKey = simpleMatch[2];
                            if (!allFormData[parentKey]) {
                                allFormData[parentKey] = {};
                            }
                            allFormData[parentKey][fieldKey] = value;
                        }
                        else { // For single fields (if any)
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