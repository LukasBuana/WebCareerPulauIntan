<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Riwayat Organisasi --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}RiwayatOrganisasiMainCollapse" aria-expanded="false"
                    style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-sitemap me-2"></i>Riwayat Organisasi<span class="required">*</span>
                    </h5>
                    <i class="fas fa-chevron-up collapse-icon"></i>
                </div>

                {{-- Main Card Body for Riwayat Organisasi --}}
                <div class="collapse" id="{{ $section_prefix ?? '' }}RiwayatOrganisasiMainCollapse">
                    <div class="card-body">
                        <div class="accordion" id="{{ $section_prefix ?? '' }}accordionRiwayatOrganisasi">

                            {{-- Organizational Experience --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingOrganisasi">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseOrganisasi"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseOrganisasi">
                                        Pengalaman Organisasi
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseOrganisasi"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingOrganisasi"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionRiwayatOrganisasi">
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formRiwayatOrganisasi" method="POST">
                                            <div id="{{ $section_prefix ?? '' }}organization-experience-container">
                                            </div>
                                            <button type="button" class="btn btn-info btn-sm mt-2"
                                                id="{{ $section_prefix ?? '' }}add-organization">Tambah
                                                Organisasi</button>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="organizational_experience"
                                                        data-prefix="{{ $section_prefix ?? '' }}">
                                                        <i class="fas fa-save me-2"></i>Simpan Riwayat Organisasi
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- End of accordionRiwayatOrganisasi --}}
                    </div> {{-- End of card-body --}}
                </div> {{-- End of main collapse for Riwayat Organisasi --}}
            </div> {{-- End of card --}}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Logic for Main Card Header Toggle (Riwayat Organisasi) ---
        const mainCardHeaderOrganisasi = document.querySelector(
                '#{{ $section_prefix ?? '' }}RiwayatOrganisasiMainCollapse')
            .previousElementSibling; // Get the header
        const mainCollapseOrganisasi = document.getElementById(
            '{{ $section_prefix ?? '' }}RiwayatOrganisasiMainCollapse');
        const mainCollapseIconOrganisasi = mainCardHeaderOrganisasi.querySelector('.collapse-icon');

        if (mainCardHeaderOrganisasi && mainCollapseOrganisasi && mainCollapseIconOrganisasi) {
            mainCollapseOrganisasi.addEventListener('show.bs.collapse', function() {
                mainCardHeaderOrganisasi.classList.add('active');
                mainCollapseIconOrganisasi.classList.remove('fa-chevron-down');
                mainCollapseIconOrganisasi.classList.add('fa-chevron-up');
            });

            mainCollapseOrganisasi.addEventListener('hide.bs.collapse', function() {
                mainCardHeaderOrganisasi.classList.remove('active');
                mainCollapseIconOrganisasi.classList.remove('fa-chevron-up');
                mainCollapseIconOrganisasi.classList.add('fa-chevron-down');
            });

            // Initial state for main card header
            if (mainCollapseOrganisasi.classList.contains('show')) {
                mainCardHeaderOrganisasi.classList.add('active');
                mainCollapseIconOrganisasi.classList.remove('fa-chevron-down');
                mainCollapseIconOrganisasi.classList.add('fa-chevron-up');
            } else {
                mainCardHeaderOrganisasi.classList.remove('active');
                mainCollapseIconOrganisasi.classList.remove('fa-chevron-up');
                mainCollapseIconOrganisasi.classList.add('fa-chevron-down');
            }
        }

        // --- Dynamic Fields for Organizational History ---
        const existingOrganizationData =
        @json($applicant->organizationalExperience ?? []); // Assuming $applicant->organizationHistory holds existing data
        let organizationCount = existingOrganizationData.length;
        const organizationHistoryContainer = document.getElementById(
            '{{ $section_prefix ?? '' }}organization-experience-container');
        const addOrganizationButton = document.getElementById('{{ $section_prefix ?? '' }}add-organization');
        const sectionPrefix = '{{ $section_prefix ?? '' }}';

        function calculateDuration(itemElement, prefix, index) {
            const startYearField = itemElement.querySelector(`#${prefix}period_start_year_org_${index}`);
            const endYearField = itemElement.querySelector(`#${prefix}period_end_year_org_${index}`);
            const durationField = itemElement.querySelector(`#${prefix}duration_years_org_${index}`);

            if (startYearField && endYearField && durationField) {
                const startYear = parseInt(startYearField.value);
                const endYear = parseInt(endYearField.value);

                if (!isNaN(startYear) && !isNaN(endYear)) {
                    if (endYear >= startYear) {
                        durationField.value = endYear - startYear;
                    } else {
                        durationField.value = ''; // Clear if end year is before start year
                    }
                } else {
                    durationField.value = ''; // Clear if inputs are not valid numbers
                }
            }
        }


        function addOrganizationField(prefix, index, data = {}) {
            // Pastikan nama variabel sesuai dengan yang ada di database/backend
            const organization_name = data.organization_name || '';
            const title_in_organization = data.title_in_organization || ''; // Menggunakan title_in_organization
            const period = data.period || ''; // Menggunakan period

            const organizationHtml = `
                <div class="organization-item border p-3 mb-3 rounded" id="${prefix}organization-${index}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}organization_name_${index}" class="form-label">Nama Organisasi <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}organization_name_${index}" name="organizational_experience[${index}][organization_name]" value="${organization_name}" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}title_in_organization_${index}" class="form-label">Jabatan dalam Organisasi <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}title_in_organization_${index}" name="organizational_experience[${index}][title_in_organization]" value="${title_in_organization}" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="${prefix}period_${index}" class="form-label">Periode Menjabat <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}period_${index}" name="organizational_experience[${index}][period]" placeholder="Contoh: 2020-2022 atau 2020 - Sekarang" value="${period}" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-organization mt-2" data-target-id="${prefix}organization-${index}">Hapus</button>
                </div>
            `;
            if (organizationHistoryContainer) {
                organizationHistoryContainer.insertAdjacentHTML('beforeend', organizationHtml);
                // Tidak ada lagi logic calculateDuration karena 'period' adalah satu field
            }
        }

        // --- PENTING: Panggil fungsi ini untuk memuat data yang sudah ada ---
        if (existingOrganizationData && existingOrganizationData.length > 0) {
            existingOrganizationData.forEach((data, index) => {
                addOrganizationField(sectionPrefix, index, data);
            });
        } else {
            // Opsional: Jika tidak ada data, tambahkan satu field kosong secara default
            // Agar user langsung bisa mulai mengisi. Hapus baris ini jika tidak ingin default 1 field kosong.
            // addOrganizationField(sectionPrefix, organizationCount);
            // organizationCount++;
        }

        // Event listener for "Tambah Organisasi" button
        if (addOrganizationButton) {
            addOrganizationButton.addEventListener('click', function() {
                // Tambahkan validasi di sini sebelum menambahkan field baru
                // Pastikan semua field wajib di group terakhir sudah terisi
                let allCurrentItemsValid = true;
                const lastGroup = organizationHistoryContainer.lastElementChild;
                if (lastGroup && lastGroup.classList.contains(
                    'organization-item')) { // Pastikan ini grup organisasi
                    const requiredInputsInLastGroup = lastGroup.querySelectorAll(
                        'input[required], select[required], textarea[required]');
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

                if (allCurrentItemsValid) {
                    addOrganizationField(sectionPrefix, organizationCount);
                    organizationCount++;
                } else {
                    const firstInvalidField = organizationHistoryContainer.querySelector('.is-invalid');
                    if (firstInvalidField) {
                        firstInvalidField.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                    alert(
                        'Harap isi semua field yang wajib diisi pada item pengalaman organisasi terakhir sebelum menambah baru.');
                }
            });
        }

        // Event listener for "Hapus" button on dynamic organization fields
        if (organizationHistoryContainer) {
            organizationHistoryContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-organization')) {
                    const targetId = e.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                        // Re-index inputs jika diperlukan (penting jika Anda mengandalkan indeks berurutan di backend)
                        // Karena Anda menggunakan `idx` di name attribute, re-indexing manual akan diperlukan
                        // untuk memastikan array di Laravel berurutan tanpa gaps.
                        // Anda bisa memanggil fungsi reindexDynamicInputs di sini jika itu ada di common.js Anda.
                        const dynamicSectionsMapping = { // Ini harusnya di common.js, ini hanya untuk contoh
                            'appFormorganization-experience-container': {
                                type: 'organizational_experience',
                                fields: [{
                                        name: 'organization_name'
                                    },
                                    {
                                        name: 'title_in_organization'
                                    },
                                    {
                                        name: 'period'
                                    }
                                ]
                            }
                        };
                        const containerId = organizationHistoryContainer.id;
                        const itemType = dynamicSectionsMapping[containerId].type;
                        const fieldsDefinition = dynamicSectionsMapping[containerId].fields;
                        reindexDynamicInputs(containerId, itemType, fieldsDefinition);
                    }
                }
            });
        }

        // --- Validation Logic for Saving Sections (including the new organization_experience) ---
        document.querySelectorAll('.save-section-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const sectionId = this.dataset.section;
                const prefix = this.dataset.prefix;
                const formElement = document.getElementById(
                    `${prefix}form${sectionId.replace(/_([a-z])/g, (g) => g[1].toUpperCase())}`
                    ); // Converts organization_experience to formOrganizationHistory
                const sectionCollapseId =
                    `#${prefix}collapse${sectionId.charAt(0).toUpperCase() + sectionId.slice(1)}`;
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

                // --- Validation for Organization History (new) ---
                if (sectionId ===
                    'organizational_experience') { // Ubah 'organization_history' menjadi 'organizational_experience'
                    const organizationItems = sectionElement.querySelectorAll(
                        '.organization-item');
                    if (organizationItems.length === 0) {
                        isValid = false;
                        alert('Mohon tambahkan setidaknya satu Riwayat Organisasi.');
                    } else {
                        organizationItems.forEach((item, idx) => {
                            // Ubah nama atribut 'name' agar sesuai dengan backend
                            const organizationNameField = item.querySelector(
                                `[name="organizational_experience[${idx}][organization_name]"]` // Sesuai backend
                            );
                            const titleInOrganizationField = item.querySelector(
                                `[name="organizational_experience[${idx}][title_in_organization]"]` // Sesuai backend
                            );
                            const periodField = item.querySelector(
                                `[name="organizational_experience[${idx}][period]"]` // Sesuai backend (satu field 'period')
                            );

                            const fieldsToCheck = [{
                                    field: organizationNameField,
                                    msg: 'Nama organisasi harus diisi'
                                },
                                {
                                    field: titleInOrganizationField, // Gunakan nama field yang sudah diubah
                                    msg: 'Jabatan harus diisi'
                                },
                                {
                                    field: periodField, // Gunakan nama field yang sudah diubah
                                    msg: 'Periode harus diisi'
                                }
                            ];

                            fieldsToCheck.forEach(f => {
                                if (f.field && !f.field.value.trim()) {
                                    f.field.classList.add('is-invalid');
                                    const errorMsg = f.field.parentElement
                                        .querySelector('.error-message');
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

                // If validation passes, you'd typically submit the form via AJAX
                if (isValid) {
                    const form = document.getElementById(`${prefix}formRiwayatOrganisasi`);
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
                                'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                    'content') // Add CSRF token
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
