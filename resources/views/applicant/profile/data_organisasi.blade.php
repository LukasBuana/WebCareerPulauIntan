<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Riwayat Organisasi --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}RiwayatOrganisasiMainCollapse"
                    aria-expanded="false" style="cursor: pointer;">
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
                                            <div id="{{ $section_prefix ?? '' }}organization-history-container">
                                                {{-- Dynamic organization fields will be added here by JS --}}
                                            </div>
                                            <button type="button" class="btn btn-info btn-sm mt-2"
                                                id="{{ $section_prefix ?? '' }}add-organization">Tambah Organisasi</button>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="organization_history"
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
        const existingOrganizationData = @json($applicant->organizationHistory ?? []); // Assuming $applicant->organizationHistory holds existing data
        let organizationCount = existingOrganizationData.length;
        const organizationHistoryContainer = document.getElementById(
            '{{ $section_prefix ?? '' }}organization-history-container');
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
            const organization_name = data.organization_name || '';
            const position = data.position || '';
            const period_start_year = data.period_start_year || '';
            const period_end_year = data.period_end_year || '';
            // Calculate duration years if both start and end years are present
            const duration_years = (data.period_start_year && data.period_end_year && !isNaN(parseInt(data.period_start_year)) && !isNaN(parseInt(data.period_end_year)) && parseInt(data.period_end_year) >= parseInt(data.period_start_year)) ?
                                (parseInt(data.period_end_year) - parseInt(data.period_start_year)) : '';


            const organizationHtml = `
                <div class="organization-item border p-3 mb-3 rounded" id="${prefix}organization-${index}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}organization_name_${index}" class="form-label">Nama Organisasi <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}organization_name_${index}" name="organization_history[${index}][organization_name]" value="${organization_name}" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}position_${index}" class="form-label">Jabatan dalam Organisasi <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}position_${index}" name="organization_history[${index}][position]" value="${position}" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}period_start_year_org_${index}" class="form-label">Tahun Mulai <span class="required">*</span></label>
                            <input type="number" class="form-control" id="${prefix}period_start_year_org_${index}" name="organization_history[${index}][period_start_year]" placeholder="YYYY" min="1900" max="2100" value="${period_start_year}" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}period_end_year_org_${index}" class="form-label">Tahun Selesai <span class="required">*</span></label>
                            <input type="number" class="form-control" id="${prefix}period_end_year_org_${index}" name="organization_history[${index}][period_end_year]" placeholder="YYYY" min="1900" max="2100" value="${period_end_year}" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}duration_years_org_${index}" class="form-label">Lama Menjabat (Tahun)</label>
                            <input type="text" class="form-control" id="${prefix}duration_years_org_${index}" name="organization_history[${index}][duration_years]" value="${duration_years}" readonly>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-organization mt-2" data-target-id="${prefix}organization-${index}">Hapus</button>
                </div>
            `;
            if (organizationHistoryContainer) {
                organizationHistoryContainer.insertAdjacentHTML('beforeend', organizationHtml);
                const newItem = document.getElementById(`${prefix}organization-${index}`);
                const startYearInput = newItem.querySelector(`#${prefix}period_start_year_org_${index}`);
                const endYearInput = newItem.querySelector(`#${prefix}period_end_year_org_${index}`);

                if (startYearInput) {
                    startYearInput.addEventListener('input', () => calculateDuration(newItem, prefix, index));
                }
                if (endYearInput) {
                    endYearInput.addEventListener('input', () => calculateDuration(newItem, prefix, index));
                }
            }
        }

        // Load existing organization data
        if (existingOrganizationData && existingOrganizationData.length > 0) {
            existingOrganizationData.forEach((data, index) => {
                addOrganizationField(sectionPrefix, index, data);
            });
        }

        // Event listener for "Tambah Organisasi" button
        if (addOrganizationButton) {
            addOrganizationButton.addEventListener('click', function() {
                addOrganizationField(sectionPrefix, organizationCount);
                organizationCount++;
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
                        // Re-index fields if necessary, or handle it on the backend
                    }
                }
            });
        }

        // --- Validation Logic for Saving Sections (including the new organization_history) ---
        document.querySelectorAll('.save-section-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const sectionId = this.dataset.section;
                const prefix = this.dataset.prefix;
                const formElement = document.getElementById(`${prefix}form${sectionId.replace(/_([a-z])/g, (g) => g[1].toUpperCase())}`); // Converts organization_history to formOrganizationHistory
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

                // --- Validation for Education History (existing) ---
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

                // --- Validation for Organization History (new) ---
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
                            // Handle success
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menyimpan data.');
                        // Handle errors
                    });
                }
            });
        });
    });
</script>