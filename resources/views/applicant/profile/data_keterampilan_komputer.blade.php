<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Keterampilan Komputer --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}ComputerSkillsMainCollapse" aria-expanded="false"
                    style="cursor: pointer;">
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
                                            <div id="{{ $section_prefix ?? '' }}all-computer-skills-container">
                                                {{-- ALL computer skills (predefined and dynamic) will be generated here by JS --}}
                                                {{-- They will all follow the name="computer_skills[index][skill_name/proficiency]" format --}}
                                            </div>

                                            <button type="button" class="btn btn-info btn-sm mt-2"
                                                id="{{ $section_prefix ?? '' }}add-other-computer-skill">Tambah
                                                Keterampilan Lain</button>

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
            name: 'MS. Word',
            key: 'ms_word'
        }, {
            name: 'MS. Excel',
            key: 'ms_excel'
        }, {
            name: 'MS. PowerPoint',
            key: 'ms_powerpoint'
        }, {
            name: 'AutoCAD',
            key: 'autocad'
        }, {
            name: 'ZWCAD',
            key: 'zwcad'
        }, {
            name: 'Photoshop/CorelDRAW',
            key: 'photoshop_coreldraw'
        }];


        //existingComputerSkillsFromDB: Asumsi ini adalah array of objects {skill_name: ..., proficiency: ...} dari database
        const existingComputerSkillsFromDB = @json($applicant->computerSkills ?? []);
        let computerSkillCount = 0; // Counter global untuk semua skill (predefined + lainnya)

        const allComputerSkillsContainer = document.getElementById(
            '{{ $section_prefix ?? '' }}all-computer-skills-container');
        const addOtherComputerSkillButton = document.getElementById(
            '{{ $section_prefix ?? '' }}add-other-computer-skill');
        const sectionPrefix = '{{ $section_prefix ?? '' }}';


        //                        false jika skill ini adalah skill predefined.
        function addComputerSkillField(prefix, index, data = {}, isDynamic = false) {
            const id = data.id || ''; // Ambil ID jika ada
            const skill_name = data.skill_name || '';
            const proficiency = data.proficiency || '';

            // Nama skill input akan readonly jika isDynamic adalah false (ini adalah skill predefined)
            const readonlyAttr = isDynamic ? '' : 'readonly';

            // Tentukan HTML untuk tombol. Jika isDynamic false, tidak ada tombol "Hapus".
            const removeButtonHtml = isDynamic ?
                `<button type="button" class="btn btn-danger btn-sm remove-computer-skill w-100" data-target-id="${prefix}skill-${index}" data-is-dynamic="true">Hapus</button>` :
                ''; // Kosong jika skill predefined (tidak ada tombol hapus untuknya)

            const skillHtml = `
        <div class="computer-skill-item row align-items-end mb-3 border p-3 rounded bg-light" id="${prefix}skill-${index}">
            <input type="hidden" name="computer_skills[${index}][id]" value="${id}"> 
            <div class="col-md-5 mb-3">
                <label for="${prefix}skill_name_${index}" class="form-label">Nama Keterampilan <span class="required">*</span></label>
                <input type="text" class="form-control" id="${prefix}skill_name_${index}" name="computer_skills[${index}][skill_name]" value="${skill_name}" ${readonlyAttr} required>
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
                ${removeButtonHtml}
            </div>
        </div>
    `;
            if (allComputerSkillsContainer) {
                allComputerSkillsContainer.insertAdjacentHTML('beforeend', skillHtml);
            }
        }

        // --- Memuat data yang sudah ada (TERMASUK predefined dan "Other" skills) ---
        // --- Memuat data yang sudah ada (TERMASUK predefined dan "Other" skills) ---
        const existingSkillsMap = new Map(); // Map: skill_name -> {id: ..., proficiency: ...}
        if (existingComputerSkillsFromDB && existingComputerSkillsFromDB.length > 0) {
            existingComputerSkillsFromDB.forEach(skill => {
                existingSkillsMap.set(skill.skill_name, {
                    id: skill.id,
                    proficiency: skill.proficiency
                });
            });
        }

        // Map untuk mencari predefined skill key berdasarkan namanya
        const predefinedSkillNameMap = {};
        predefinedSkillsList.forEach(ps => {
            predefinedSkillNameMap[ps.name] = ps.key;
        });

        // Pertama, tambahkan semua predefined skills ke dalam kontainer
        // Kita akan mengisi nilainya dari DB jika ada, atau kosong jika belum.
        predefinedSkillsList.forEach(predefinedSkill => {
            const existingData = existingSkillsMap.get(predefinedSkill.name);
            const proficiency = existingData ? existingData.proficiency : '';
            const id = existingData ? existingData.id : '';

            // isDynamic = false untuk skill predefined, jadi tidak ada tombol hapus
            addComputerSkillField(sectionPrefix, computerSkillCount, {
                id: id,
                skill_name: predefinedSkill.name,
                proficiency: proficiency
            }, false);
            computerSkillCount++;
        });

        // Kemudian, tambahkan skill dari DB yang BUKAN predefined (yaitu "other" skills)
        existingComputerSkillsFromDB.forEach(skill => {
            // Jika skill_name TIDAK ADA di predefinedSkillsList, itu adalah skill dinamis
            if (!predefinedSkillNameMap.hasOwnProperty(skill.skill_name)) {
                addComputerSkillField(sectionPrefix, computerSkillCount, skill,
                true); // isDynamic = true
                computerSkillCount++;
            }
        });


        // Event listener untuk tombol "Tambah Keterampilan Lain"
        if (addOtherComputerSkillButton) {
            addOtherComputerSkillButton.addEventListener('click', function() {
                let allCurrentItemsValid = true;
                const lastGroup = allComputerSkillsContainer.lastElementChild;
                // Validasi hanya jika ada group terakhir yang merupakan dynamic item (bukan predefined yang sudah di-load)
                if (lastGroup && lastGroup.classList.contains('computer-skill-item')) {
                    const isLastGroupDynamic = lastGroup.querySelector(
                        '.remove-computer-skill[data-is-dynamic="true"]');
                    if (isLastGroupDynamic || !lastGroup.querySelector(
                            'input[readonly]'
                            )) { // Hanya validasi jika group ini dynamic atau bukan skill fixed
                        const requiredInputsInLastGroup = lastGroup.querySelectorAll(
                            'input[required], select[required]');
                        requiredInputsInLastGroup.forEach(input => {
                            if (!input.value.trim()) {
                                input.classList.add('is-invalid');
                                const errorMsg = input.parentElement.querySelector(
                                    '.error-message');
                                if (errorMsg) {
                                    errorMsg.textContent = 'Field ini wajib diisi.';
                                    errorMsg.style.display = 'block';
                                }
                                allCurrentItemsValid = false;
                            }
                        });
                    }
                }

                if (allCurrentItemsValid) {
                    addComputerSkillField(sectionPrefix, computerSkillCount, {},
                        true); // Tambah skill kosong baru, isDynamic = true
                    computerSkillCount++;
                } else {
                    const firstInvalidField = allComputerSkillsContainer.querySelector('.is-invalid');
                    if (firstInvalidField) {
                        firstInvalidField.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                    alert(
                        'Harap isi semua field yang wajib diisi pada keterampilan terakhir sebelum menambah baru.'
                        );
                }
            });
        }

        // Event listener for "Hapus" button on all computer skills fields (only works for dynamic ones now)
        // Event listener for "Hapus" button on all computer skills fields
        if (allComputerSkillsContainer) {
            allComputerSkillsContainer.addEventListener('click', function(e) {
                const removeButton = e.target.closest(
                '.remove-computer-skill'); // Hanya target tombol dengan kelas ini
                if (!removeButton) return; // Jika yang diklik bukan tombol hapus

                const elementToRemove = document.getElementById(removeButton.dataset.targetId);
                if (!elementToRemove) return;

                const isDynamicSkill = removeButton.dataset.isDynamic ===
                'true'; // Cek apakah itu skill dinamis

                if (isDynamicSkill) { // HANYA HAPUS JIKA isDynamic = true
                    if (confirm('Apakah Anda yakin ingin menghapus keterampilan ini?')) {
                        elementToRemove.remove();
                        reindexComputerSkills(sectionPrefix, allComputerSkillsContainer);
                    }
                }
                // Tidak ada `else if (removeButton.dataset.isPredefined === 'true')` lagi
                // karena tombol reset untuk predefined skills tidak ada lagi, dan mereka tidak dihapus.
            });
        }
        // Fungsi re-indexing khusus untuk Computer Skills
        function reindexComputerSkills(prefix, container) {
            const skillItems = container.querySelectorAll('.computer-skill-item');
            computerSkillCount = 0; // Reset counter

            skillItems.forEach((item, index) => {
                item.id = `${prefix}skill-${index}`;

                item.querySelectorAll(
                    'input[name^="computer_skills["], select[name^="computer_skills["]').forEach(
                    input => {
                        const oldName = input.name;
                        const match = oldName.match(
                        /computer_skills\[(.*?)\]\[(.*)\]/); // Tangkap KEY dan FIELD_NAME
                        if (match && match[1] && match[2]) {
                            const fieldName = match[2];
                            input.name =
                            `computer_skills[${index}][${fieldName}]`; // Format KEY sebagai index numerik
                            input.id = `${prefix}skill_${fieldName}_${index}`;
                            const label = item.querySelector(`label[for="${oldName}"]`);
                            if (label) label.setAttribute('for', input.id);
                        }
                    });

                // Tombol hapus hanya akan ada jika isDynamic="true"
                const removeButton = item.querySelector(
                '.remove-computer-skill'); // Hanya seleksi tombol hapus (dinamis)
                if (removeButton) { // Tombol ini hanya akan ada untuk skill dinamis
                    removeButton.dataset.targetId = `${prefix}skill-${index}`;
                    // Visibilitas tombol hapus untuk skill dinamis akan selalu 'block'
                    removeButton.style.display = 'block';
                }
                computerSkillCount++; // Increment counter for each processed item
            });
        }


        // --- Validation Logic for Saving Sections ---
        document.querySelectorAll('.save-section-btn').forEach(button => {
            button.addEventListener('click', async function(e) {
                e.preventDefault();

                const sectionId = this.dataset.section;
                const prefix = this.dataset.dataset
                    .prefix; // Perbaiki ini, harusnya this.dataset.prefix
                const formElement = document.getElementById(`${prefix}formComputerSkills`);
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
                sectionElement.querySelectorAll('.form-control, .form-select, textarea')
                    .forEach(input => {
                        input.classList.remove('is-invalid');
                    });

                // --- Validation for Computer Skills --- (UPDATED)
                if (sectionId === 'computer_skills') {
                    const skillItems = allComputerSkillsContainer.querySelectorAll(
                        '.computer-skill-item');

                    let anySkillFilled = false;
                    skillItems.forEach(item => {
                        const skillNameField = item.querySelector(
                            'input[name$="[skill_name]"]');
                        const proficiencyField = item.querySelector(
                            'select[name$="[proficiency]"]');

                        // Cek apakah skill ini predefined (berdasarkan atribut readonly pada input nama skill)
                        const isPredefinedItem = skillNameField.hasAttribute(
                            'readonly');

                        if (isPredefinedItem && proficiencyField.value.trim() !==
                            '') {
                            anySkillFilled = true;
                        } else if (!isPredefinedItem && (skillNameField.value
                            .trim() !== '' || proficiencyField.value.trim() !== ''
                                )) {
                            anySkillFilled = true;
                        }
                    });

                    if (!anySkillFilled) {
                        isValid = false;
                        alert('Mohon isi setidaknya satu Keterampilan Komputer.');
                    } else {
                        skillItems.forEach((item, idx) => {
                            const skillNameField = item.querySelector(
                                `[name="computer_skills[${idx}][skill_name]"]`);
                            const proficiencyField = item.querySelector(
                                `[name="computer_skills[${idx}][proficiency]"]`);

                            const isPredefinedItem = skillNameField.hasAttribute(
                                'readonly'); // Cek dari atribut readonly

                            if (isPredefinedItem) { // Untuk skill predefined (nama readonly)
                                if (!proficiencyField.value.trim()) {
                                    proficiencyField.classList.add('is-invalid');
                                    const errorMsg = proficiencyField.parentElement
                                        .querySelector('.error-message');
                                    if (errorMsg) {
                                        errorMsg.textContent =
                                            'Tingkat penguasaan harus dipilih.';
                                        errorMsg.style.display = 'block';
                                    }
                                    isValid = false;
                                } else {
                                    proficiencyField.classList.remove('is-invalid');
                                    const errorMsg = proficiencyField.parentElement
                                        .querySelector('.error-message');
                                    if (errorMsg) errorMsg.style.display = 'none';
                                }
                            } else { // Untuk skill dinamis (nama bisa diisi)
                                if (skillNameField.value.trim() !== '' ||
                                    proficiencyField.value.trim() !== '') {
                                    if (!skillNameField.value.trim()) {
                                        skillNameField.classList.add('is-invalid');
                                        const errorMsg = skillNameField
                                            .parentElement.querySelector(
                                                '.error-message');
                                        if (errorMsg) {
                                            errorMsg.textContent =
                                                'Nama keterampilan harus diisi.';
                                            errorMsg.style.display = 'block';
                                        }
                                        isValid = false;
                                    }
                                    if (!proficiencyField.value.trim()) {
                                        proficiencyField.classList.add(
                                        'is-invalid');
                                        const errorMsg = proficiencyField
                                            .parentElement.querySelector(
                                                '.error-message');
                                        if (errorMsg) {
                                            errorMsg.textContent =
                                                'Tingkat penguasaan harus dipilih.';
                                            errorMsg.style.display = 'block';
                                        }
                                        isValid = false;
                                    }
                                    if (skillNameField.value.trim() !== '' &&
                                        proficiencyField.value.trim() !== '') {
                                        skillNameField.classList.remove(
                                            'is-invalid');
                                        let errorMsgName = skillNameField
                                            .parentElement.querySelector(
                                                '.error-message');
                                        if (errorMsgName) errorMsgName.style
                                            .display = 'none';
                                        proficiencyField.classList.remove(
                                            'is-invalid');
                                        let errorMsgProficiency = proficiencyField
                                            .parentElement.querySelector(
                                                '.error-message');
                                        if (errorMsgProficiency) errorMsgProficiency
                                            .style.display = 'none';
                                    }
                                } else {
                                    skillNameField.classList.remove('is-invalid');
                                    let errorMsgName = skillNameField.parentElement
                                        .querySelector('.error-message');
                                    if (errorMsgName) errorMsgName.style.display =
                                        'none';

                                    proficiencyField.classList.remove('is-invalid');
                                    let errorMsgProficiency = proficiencyField
                                        .parentElement.querySelector(
                                            '.error-message');
                                    if (errorMsgProficiency) errorMsgProficiency
                                        .style.display = 'none';
                                }
                            }
                        });
                    }
                }
                // --- Akhir Validasi untuk Keterampilan Komputer ---

                // --- Bagian PENTING: Pengiriman AJAX yang Diperbarui ---
                if (isValid) {
                    const formData = new FormData(formElement);

                    formData.append('_token', document.querySelector(
                        'meta[name="csrf-token"]').getAttribute('content'));
                    formData.append('_method', 'POST');

                    try {
                        const url = `{{ url('/dashboard/save-section') }}/${sectionId}`;
                        const response = await fetch(url, {
                            method: 'POST',
                            body: formData,
                        });

                        const result = await response.json();

                        if (response.ok) {
                            alert(result.message || 'Data berhasil disimpan!');
                            location.reload();
                        } else {
                            let errorMessages = 'Terjadi kesalahan saat menyimpan data:\n';
                            sectionElement.querySelectorAll('.is-invalid').forEach(el => el
                                .classList.remove('is-invalid'));
                            sectionElement.querySelectorAll('.error-message').forEach(el =>
                                el.style.display = 'none');

                            if (result.errors) {
                                for (const field in result.errors) {
                                    let queryName = field.replace(/\.(\d+)\./g, '[$1][')
                                        .replace(/\.(\w+)$/, '[$1]');
                                    // Handle cases like computer_skills.ms_word.skill_name to computer_skills[ms_word][skill_name]
                                    queryName = queryName.replace(
                                        /computer_skills\.(\w+)\.(.*)/,
                                        'computer_skills[$1][$2]'); // Baru

                                    let fieldElement = sectionElement.querySelector(
                                        `[name="${queryName}"]`);

                                    if (!fieldElement && field.includes('.')) {
                                        const parts = field.split('.');
                                        if (parts.length > 2) {
                                            const baseName = parts[0];
                                            const itemIndex = parts[1];
                                            const subField = parts[2];
                                            fieldElement = sectionElement.querySelector(
                                                `[name="${baseName}[${itemIndex}][${subField}]"]`
                                            );
                                        }
                                    }
                                    if (!fieldElement && (field === 'gender' || field ===
                                            'marital_status')) {
                                        fieldElement = sectionElement.querySelector(
                                            `[name="${field}"]`);
                                    }


                                    if (fieldElement) {
                                        fieldElement.classList.add('is-invalid');
                                        let errorMessageDiv = fieldElement.parentElement
                                            .querySelector('.error-message');
                                        if (errorMessageDiv) {
                                            errorMessageDiv.textContent = result.errors[
                                                field][0];
                                            errorMessageDiv.style.display = 'block';
                                        }
                                    }
                                    errorMessages += `- ${result.errors[field][0]}\n`;
                                }
                            } else {
                                errorMessages += result.message ||
                                    'Respons tidak diketahui.';
                            }
                            alert(errorMessages);
                            const firstInvalidField = sectionElement.querySelector(
                                '.is-invalid');
                            if (firstInvalidField) {
                                firstInvalidField.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'center'
                                });
                            }
                        }
                    } catch (error) {
                        console.error('Error submitting form:', error);
                        alert('Terjadi kesalahan jaringan atau server.');
                    }
                } else { // Validasi client-side gagal
                    const firstInvalidField = sectionElement.querySelector('.is-invalid');
                    if (firstInvalidField) {
                        firstInvalidField.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                    alert('Harap lengkapi field yang wajib diisi di bagian ini.');
                }
            });
        });
    });
</script>
