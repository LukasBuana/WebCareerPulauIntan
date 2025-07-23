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
                                                        <option value="Baik Sekali">Baik Sekali</option>
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
                                                        <option value="Baik Sekali">Baik Sekali</option>
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
                                                        <option value="Baik Sekali">Baik Sekali</option>
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
                                                        <option value="Baik Sekali">Baik Sekali</option>
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
                                                        <option value="Baik Sekali">Baik Sekali</option>
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
                                                        <option value="Baik Sekali">Baik Sekali</option>
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
    const proficiencyOptionsHtml = `
        <option value="">Pilih Tingkat</option>
        <option value="Baik Sekali">Baik Sekali</option>
        <option value="Baik">Baik</option>
        <option value="Cukup">Cukup</option>
        <option value="Kurang">Kurang</option>
    `;

    // --- Logic for Main Card Header Toggle (Keterampilan Komputer) ---
    const mainCardHeaderComputerSkills = document.querySelector(
            '#{{ $section_prefix ?? '' }}ComputerSkillsMainCollapse')
        .previousElementSibling;
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

    // --- Definisikan daftar keterampilan predefined dengan nama yang rapi ---
    const predefinedSkillsList = [{
        key: 'ms_word',
        name: 'MS. Word'
    }, {
        key: 'ms_excel',
        name: 'MS. Excel'
    }, {
        key: 'ms_powerpoint',
        name: 'MS. PowerPoint'
    }, {
        key: 'autocad',
        name: 'AutoCAD'
    }, {
        key: 'zwcad',
        name: 'ZWCAD'
    }, {
        key: 'photoshop_coreldraw',
        name: 'Photoshop/CorelDRAW'
    }];


    //existingComputerSkillsFromDB sekarang adalah array of objects {skill_name: ..., proficiency: ...}
    const existingComputerSkillsFromDB = @json($applicant->computerSkills ?? []);
    let computerSkillCount = 0; // Counter untuk semua skill (predefined + lainnya)

    const allComputerSkillsContainer = document.getElementById(
        '{{ $section_prefix ?? '' }}all-computer-skills-container');
    const addOtherComputerSkillButton = document.getElementById('{{ $section_prefix ?? '' }}add-other-computer-skill');
    const sectionPrefix = '{{ $section_prefix ?? '' }}';


    // Fungsi untuk menambahkan satu field keterampilan komputer (digunakan untuk predefined dan lainnya)
    function addComputerSkillField(prefix, index, data = {}) {
        const skill_name = data.skill_name || '';
        const proficiency = data.proficiency || '';

        const skillHtml = `
            <div class="computer-skill-item row align-items-end mb-3 border p-3 rounded bg-light" id="${prefix}skill-${index}">
                <div class="col-md-5 mb-3">
                    <label for="${prefix}skill_name_${index}" class="form-label">Nama Keterampilan <span class="required">*</span></label>
                    <input type="text" class="form-control" id="${prefix}skill_name_${index}" name="computer_skills[${index}][skill_name]" value="${skill_name}" required>
                    <div class="error-message"></div>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="${prefix}skill_proficiency_${index}" class="form-label">Tingkat Penguasaan <span class="required">*</span></label>
                    <select class="form-select" id="${prefix}skill_proficiency_${index}" name="computer_skills[${index}][proficiency]" required>
                        ${proficiencyOptionsHtml.replace(`value="${proficiency}"`, `value="${proficiency}" selected`)}
                    </select>
                    <div class="error-message"></div>
                </div>
                <div class="col-md-2 mb-3">
                    <button type="button" class="btn btn-danger btn-sm remove-computer-skill w-100" data-target-id="${prefix}skill-${index}">Hapus</button>
                </div>
            </div>
        `;
        if (allComputerSkillsContainer) {
            allComputerSkillsContainer.insertAdjacentHTML('beforeend', skillHtml);
        }
    }


    // --- Memuat data yang sudah ada (TERMASUK predefined dan "Other" skills) ---
    // Iterate through existingComputerSkillsFromDB and add them to the form
    if (existingComputerSkillsFromDB && existingComputerSkillsFromDB.length > 0) {
        existingComputerSkillsFromDB.forEach((data) => {
            // Kita perlu memastikan skill_name yang berasal dari predefinedSkillsList memiliki key yang sesuai
            // di `name="computer_skills[KEY][skill_name]"`
            let foundPredefined = false;
            for(const ps of predefinedSkillsList) {
                if (data.skill_name === ps.name) {
                    // Ini adalah skill predefined, tambahkan ke form
                    addComputerSkillField(sectionPrefix, computerSkillCount, data);
                    computerSkillCount++;
                    foundPredefined = true;
                    break;
                }
            }
            // Jika bukan predefined, anggap sebagai "other" skill
            if (!foundPredefined) {
                addComputerSkillField(sectionPrefix, computerSkillCount, data);
                computerSkillCount++;
            }
        });
    }

    // --- Tambahkan predefined skills yang belum ada di DB sebagai input kosong jika diinginkan ---
    // Ini optional, jika Anda ingin semua predefined skills selalu muncul di form (meskipun kosong)
    const currentSkillNamesInForm = Array.from(allComputerSkillsContainer.querySelectorAll('input[name$="[skill_name]"]')).map(input => input.value);

    predefinedSkillsList.forEach(predefinedSkill => {
        if (!currentSkillNamesInForm.includes(predefinedSkill.name)) {
            // Jika skill predefined belum ada di form, tambahkan sebagai baris baru
            addComputerSkillField(sectionPrefix, computerSkillCount, { skill_name: predefinedSkill.name, proficiency: '' });
            computerSkillCount++;
        }
    });

    // Event listener untuk tombol "Tambah Keterampilan Lain"
    if (addOtherComputerSkillButton) {
        addOtherComputerSkillButton.addEventListener('click', function() {
            let allCurrentItemsValid = true;
            const lastGroup = allComputerSkillsContainer.lastElementChild;
            if (lastGroup && lastGroup.classList.contains('computer-skill-item')) {
                const requiredInputsInLastGroup = lastGroup.querySelectorAll('input[required], select[required]');
                requiredInputsInLastGroup.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        const errorMsg = input.parentElement.querySelector('.error-message');
                        if (errorMsg) {
                            errorMsg.textContent = 'Field ini wajib diisi.';
                            errorMsg.style.display = 'block';
                        }
                        allCurrentItemsValid = false;
                    }
                });
            }

            if (allCurrentItemsValid) {
                addComputerSkillField(sectionPrefix, computerSkillCount); // Menambah skill kosong baru
                computerSkillCount++;
            } else {
                const firstInvalidField = allComputerSkillsContainer.querySelector('.is-invalid');
                if (firstInvalidField) {
                    firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                alert('Harap isi semua field yang wajib diisi pada keterampilan terakhir sebelum menambah baru.');
            }
        });
    }

    // Event listener for "Hapus" button on dynamic other skills fields
    if (allComputerSkillsContainer) {
        allComputerSkillsContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-computer-skill') || e.target.closest('.remove-computer-skill')) {
                const removeButton = e.target.closest('.remove-computer-skill');
                const elementToRemove = document.getElementById(removeButton.dataset.targetId);
                
                if (elementToRemove) {
                    // Pastikan tidak menghapus skill predefined yang required,
                    // hanya menghapus skill "other" yang ditambahkan secara dinamis.
                    // Atau, jika skill predefined dihapus, reset nilainya.
                    const skillNameInput = elementToRemove.querySelector('input[name$="[skill_name]"]');
                    const isPredefined = predefinedSkillsList.some(ps => ps.name === skillNameInput.value);

                    if (isPredefined) {
                        // Jika ini skill predefined, reset nilai select-nya dan sembunyikan tombol hapus
                        const proficiencySelect = elementToRemove.querySelector('select[name$="[proficiency]"]');
                        if(proficiencySelect) {
                            proficiencySelect.value = ''; // Reset to default "Pilih Tingkat"
                            proficiencySelect.classList.remove('is-invalid');
                            const errorMsg = proficiencySelect.parentElement.querySelector('.error-message');
                            if(errorMsg) errorMsg.style.display = 'none';
                        }
                        skillNameInput.classList.remove('is-invalid');
                        skillNameInput.value = predefinedSkillKeys[skillNameInput.name.match(/computer_skills\[(\w+)\]\[skill_name\]/)[1]] || ''; // Set kembali nama skill aslinya
                        // Sembunyikan tombol hapus untuk skill predefined yang di-reset,
                        // atau biarkan terlihat jika tujuannya adalah mereset proficiency.
                        removeButton.style.display = 'none'; // Sembunyikan tombol Hapus
                    } else {
                        // Ini skill dinamis yang ditambahkan, hapus elementnya
                        elementToRemove.remove();
                    }
                    // Re-index inputs after removal/reset (hanya jika ada perubahan jumlah elemen atau indeks)
                    reindexComputerSkills(sectionPrefix, allComputerSkillsContainer);
                }
            }
        });
    }

    // Fungsi re-indexing khusus untuk Computer Skills
    // Ini penting agar indeks array di FormData selalu berurutan
    function reindexComputerSkills(prefix, container) {
        const skillItems = container.querySelectorAll('.computer-skill-item');
        skillItems.forEach((item, index) => {
            item.id = `${prefix}skill-${index}`; // Update div item ID

            // Update names of input/select elements within this item
            item.querySelectorAll('[name^="computer_skills["]').forEach(input => {
                const oldName = input.name;
                // Regex untuk menangkap nama skill dan nama fieldnya (e.g., 'ms_word', 'skill_name')
                // Ini akan cocok dengan `computer_skills[KEY_OR_IDX][FIELD_NAME]`
                const match = oldName.match(/computer_skills\[(.*?)\]\[(.*)\]/);
                if (match && match[1] && match[2]) {
                    const fieldName = match[2];
                    input.name = `computer_skills[${index}][${fieldName}]`;
                    input.id = `${prefix}skill_${fieldName}_${index}`;
                    const label = item.querySelector(`label[for="${oldName}"]`);
                    if (label) label.setAttribute('for', input.id);
                }
            });

            // Update data-target-id for remove button
            const removeButton = item.querySelector('.remove-computer-skill');
            if (removeButton) {
                removeButton.dataset.targetId = `${prefix}skill-${index}`;
            }
        });
        computerSkillCount = skillItems.length; // Update total count
    }


    // --- Validation Logic for Saving Sections ---
    document.querySelectorAll('.save-section-btn').forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();

            const sectionId = this.dataset.section;
            const prefix = this.dataset.prefix;
            const formElement = document.getElementById(`${prefix}formComputerSkills`); // Pastikan ID form ini benar
            const sectionCollapseId = `#${prefix}collapseComputerSkills`;
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

            // --- Validation for Computer Skills --- (UPDATED)
            if (sectionId === 'computer_skills') {
                const skillItems = allComputerSkillsContainer.querySelectorAll('.computer-skill-item');
                if (skillItems.length === 0 && (Object.keys(predefinedSkillsList).length > 0)) { // Jika tidak ada item sama sekali dan ada predefined skills
                    isValid = false;
                    alert('Mohon lengkapi setidaknya satu Keterampilan Komputer yang wajib.');
                } else {
                    skillItems.forEach((item, idx) => {
                        const skillNameField = item.querySelector(`[name="computer_skills[${idx}][skill_name]"]`); // Sesuai dengan penamaan baru
                        const proficiencyField = item.querySelector(`[name="computer_skills[${idx}][proficiency]"]`); // Sesuai dengan penamaan baru

                        const fieldsToCheck = [
                            { field: skillNameField, msg: 'Nama keterampilan harus diisi' },
                            { field: proficiencyField, msg: 'Tingkat penguasaan harus dipilih' }
                        ];

                        fieldsToCheck.forEach(f => {
                            // Validasi hanya jika field required dan terlihat, atau jika ada nilai yang diinput
                            const isRequired = f.field.hasAttribute('required');
                            const hasValue = f.field.value.trim() !== '';
                            
                            // Jika required dan kosong ATAU tidak required tapi salah satu diisi dan yang lain kosong
                            // Ini logic agak kompleks, mari sederhanakan: validasi jika required DAN kosong
                            // atau jika field proficiency adalah bagian dari predefined skill dan kosong
                            if (isRequired && !hasValue) { // Basic validation
                                f.field.classList.add('is-invalid');
                                const errorMsg = f.field.parentElement.querySelector('.error-message');
                                if (errorMsg) {
                                    errorMsg.textContent = f.msg;
                                    errorMsg.style.display = 'block';
                                }
                                isValid = false;
                            } else { // Jika ada nilai, hilangkan error
                                f.field.classList.remove('is-invalid');
                                const errorMsg = f.field.parentElement.querySelector('.error-message');
                                if(errorMsg) errorMsg.style.display = 'none';
                            }
                        });
                    });
                }
            }
            // --- Akhir Validasi untuk Keterampilan Komputer ---

            // --- Bagian PENTING: Pengiriman AJAX yang Diperbarui ---
            if (isValid) {
                const formData = new FormData(formElement); // AMBIL FORMDATA DARI FORM SPESIFIK INI

                // Tambahkan token dan method spoofing
                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                formData.append('_method', 'POST'); // Sesuai dengan route saveSectionData

                try {
                    const url = `{{ url('/dashboard/save-section') }}/${sectionId}`;
                    const response = await fetch(url, {
                        method: 'POST',
                        body: formData,
                    });

                    const result = await response.json();

                    if (response.ok) {
                        alert(result.message || 'Data berhasil disimpan!');
                        location.reload(); // Reload halaman untuk melihat perubahan
                    } else {
                        let errorMessages = 'Terjadi kesalahan saat menyimpan data:\n';
                        sectionElement.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                        sectionElement.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');

                        if (result.errors) {
                            for (const field in result.errors) {
                                let queryName = field.replace(/\.(\d+)\./g, '[$1][').replace(/\.(\w+)$/, '[$1]');
                                // Tambahan untuk kasus computer_skills.skill_name (tanpa index numerik)
                                queryName = queryName.replace(/\[(\w+)\]\.(\w+)$/, '[$1][$2]');
                                
                                let fieldElement = sectionElement.querySelector(`[name="${queryName}"]`);

                                if (!fieldElement && field.includes('.')) {
                                    const parts = field.split('.');
                                    if (parts.length > 2) {
                                        const baseName = parts[0];
                                        const itemIndex = parts[1];
                                        const subField = parts[2];
                                        fieldElement = sectionElement.querySelector(`[name="${baseName}[${itemIndex}][${subField}]"]`);
                                    }
                                }
                                if (!fieldElement && (field === 'gender' || field === 'marital_status')) {
                                    fieldElement = sectionElement.querySelector(`[name="${field}"]`);
                                }


                                if (fieldElement) {
                                    fieldElement.classList.add('is-invalid');
                                    let errorMessageDiv = fieldElement.parentElement.querySelector('.error-message');
                                    if (errorMessageDiv) {
                                        errorMessageDiv.textContent = result.errors[field][0];
                                        errorMessageDiv.style.display = 'block';
                                    }
                                }
                                errorMessages += `- ${result.errors[field][0]}\n`;
                            }
                        } else {
                            errorMessages += result.message || 'Respons tidak diketahui.';
                        }
                        alert(errorMessages);
                        const firstInvalidField = sectionElement.querySelector('.is-invalid');
                        if (firstInvalidField) {
                            firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }
                } catch (error) {
                    console.error('Error submitting form:', error);
                    alert('Terjadi kesalahan jaringan atau server.');
                }
            } else { // Validasi client-side gagal
                const firstInvalidField = sectionElement.querySelector('.is-invalid');
                if (firstInvalidField) {
                    firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                alert('Harap lengkapi field yang wajib diisi di bagian ini.');
            }
        });
    });
});
</script>