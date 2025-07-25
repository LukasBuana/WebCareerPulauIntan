<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Pengalaman Kerja --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}WorkExperienceMainCollapse" aria-expanded="false"
                    style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-briefcase me-2"></i>Pengalaman Kerja<span class="required">*</span>
                    </h5>
                    <i class="fas fa-chevron-up collapse-icon"></i>
                </div>

                {{-- Main Card Body for Pengalaman Kerja --}}
                <div class="collapse" id="{{ $section_prefix ?? '' }}WorkExperienceMainCollapse">
                    <div class="card-body">
                        <div class="accordion" id="{{ $section_prefix ?? '' }}accordionWorkExperience">

                            {{-- Work Experience Entries --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingWorkExperience">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseWorkExperience"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseWorkExperience">
                                        Daftar Pengalaman Kerja (mulai dari pengalaman kerja yang terakhir)
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseWorkExperience"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingWorkExperience"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionWorkExperience">
                                    <div class="accordion-body">
                                        {{-- Checkbox for "No Work Experience" --}}
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="{{ $section_prefix ?? '' }}noWorkExperienceCheckbox"
                                                name="no_work_experience">
                                            <label class="form-check-label"
                                                for="{{ $section_prefix ?? '' }}noWorkExperienceCheckbox">
                                                Saya tidak memiliki Pengalaman Kerja
                                            </label>
                                        </div>

                                        {{-- This div contains the dynamic fields and the "Tambah Pengalaman Kerja"
                                        button. It will be hidden/shown. --}}
                                        <div id="{{ $section_prefix ?? '' }}workExperienceFieldsContainer">
                                            <form id="{{ $section_prefix ?? '' }}formWorkExperience" method="POST">
                                                <div id="{{ $section_prefix ?? '' }}work-experience-container">
                                                    {{-- Dynamic work experience fields will be added here by JS --}}
                                                </div>
                                                <button type="button" class="btn btn-info btn-sm mt-2"
                                                    id="{{ $section_prefix ?? '' }}add-work-experience">Tambah
                                                    Pengalaman Kerja</button>
                                            </form>
                                        </div> {{-- End of workExperienceFieldsContainer --}}

                                        {{-- Save button is now OUTSIDE workExperienceFieldsContainer but inside
                                        accordion-body --}}
                                        {{-- This ensures it's always visible when the accordion is open --}}
                                        <div class="col-md-12 text-end mt-4">
                                            <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                data-section="work_experience"
                                                data-prefix="{{ $section_prefix ?? '' }}">
                                                <i class="fas fa-save me-2"></i>Simpan Pengalaman Kerja
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- End of accordionWorkExperience --}}
                    </div> {{-- End of card-body --}}
                </div> {{-- End of main collapse for Pengalaman Kerja --}}
            </div> {{-- End of card --}}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- Logic for Main Card Header Toggle (Pengalaman Kerja) ---
        const mainCardHeaderWorkExperience = document.querySelector(
            '#{{ $section_prefix ?? '' }}WorkExperienceMainCollapse')
            .previousElementSibling; // Get the header
        const mainCollapseWorkExperience = document.getElementById(
            '{{ $section_prefix ?? '' }}WorkExperienceMainCollapse');
        const mainCollapseIconWorkExperience = mainCardHeaderWorkExperience.querySelector('.collapse-icon');

        if (mainCardHeaderWorkExperience && mainCollapseWorkExperience && mainCollapseIconWorkExperience) {
            mainCollapseWorkExperience.addEventListener('show.bs.collapse', function () {
                mainCardHeaderWorkExperience.classList.add('active');
                mainCollapseIconWorkExperience.classList.remove('fa-chevron-down');
                mainCollapseIconWorkExperience.classList.add('fa-chevron-up');
            });

            mainCollapseWorkExperience.addEventListener('hide.bs.collapse', function () {
                mainCardHeaderWorkExperience.classList.remove('active');
                mainCollapseIconWorkExperience.classList.remove('fa-chevron-up');
                mainCollapseIconWorkExperience.classList.add('fa-chevron-down');
            });

            // Initial state for main card header
            if (mainCollapseWorkExperience.classList.contains('show')) {
                mainCardHeaderWorkExperience.classList.add('active');
                mainCollapseIconWorkExperience.classList.remove('fa-chevron-down');
                mainCollapseIconWorkExperience.classList.add('fa-chevron-up');
            } else {
                mainCardHeaderWorkExperience.classList.remove('active');
                mainCollapseIconWorkExperience.classList.remove('fa-chevron-up');
                mainCollapseIconWorkExperience.classList.add('fa-chevron-down');
            }
        }

        // --- Dynamic Fields for Work Experience ---
        const existingWorkExperienceData = @json($applicant->workExperience ?? []);
        let workExperienceCount = existingWorkExperienceData.length;
        const workExperienceContainer = document.getElementById(
            '{{ $section_prefix ?? '' }}work-experience-container');
        const addWorkExperienceButton = document.getElementById(
            '{{ $section_prefix ?? '' }}add-work-experience');
        const sectionPrefix = '{{ $section_prefix ?? '' }}';
        const noWorkExperienceCheckbox = document.getElementById(
            '{{ $section_prefix ?? '' }}noWorkExperienceCheckbox');
        const workExperienceFieldsContainer = document.getElementById(
            '{{ $section_prefix ?? '' }}workExperienceFieldsContainer');


        function addWorkExperienceField(prefix, index, data = {}) {
            const id = data.id || '';
            const company_name = data.company_name || '';
            const period_start_date = data.period_start_date || '';
            const period_end_date = data.period_end_date || '';
            const company_address = data.company_address || '';
            const company_phone_number = data.company_phone_number || '';
            const first_role_title = data.first_role_title || '';
            const last_role_title = data.last_role_title || '';
            const direct_supervisor_name = data.direct_supervisor_name || '';
            const resignation_reason = data.resignation_reason || '';
            const last_salary = data.last_salary || '';


            const workExperienceHtml = `
                <div class="work-experience-item border p-3 mb-3 rounded" id="${prefix}work-experience-${index}">
                    <input type="hidden" name="work_experience[${index}][id]" value="${id}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}company_name_${index}" class="form-label">Nama Perusahaan <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}company_name_${index}" name="work_experience[${index}][company_name]" value="${company_name}" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}period_work_${index}" class="form-label">Periode Kerja <span class="required">*</span></label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="${prefix}period_start_date_${index}" name="work_experience[${index}][period_start_date]" value="${period_start_date}" placeholder="Contoh: 2000" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="${prefix}period_end_date_${index}" name="work_experience[${index}][period_end_date]" value="${period_end_date}" placeholder="Contoh: 2015" required>
                                </div>
                            </div>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}company_address_${index}" class="form-label">Alamat Perusahaan <span class="required">*</span></label>
                            <textarea class="form-control" id="${prefix}company_address_${index}" name="work_experience[${index}][company_address]" rows="2" required>${company_address}</textarea>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}company_phone_number_${index}" class="form-label">No Telepon Perusahaan</label>
                            <input type="text" class="form-control" id="${prefix}company_phone_number_${index}" name="work_experience[${index}][company_phone_number]" value="${company_phone_number}">
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}first_role_title_${index}" class="form-label">Jabatan Awal <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}first_role_title_${index}" name="work_experience[${index}][first_role_title]" value="${first_role_title}" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}last_role_title_${index}" class="form-label">Jabatan Terakhir <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}last_role_title_${index}" name="work_experience[${index}][last_role_title]" value="${last_role_title}" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}direct_supervisor_name_${index}" class="form-label">Nama Atasan Langsung</label>
                            <input type="text" class="form-control" id="${prefix}direct_supervisor_name_${index}" name="work_experience[${index}][direct_supervisor_name]" value="${direct_supervisor_name}">
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}resignation_reason_${index}" class="form-label">Alasan Berhenti</label>
                            <input type="text" class="form-control" id="${prefix}resignation_reason_${index}" name="work_experience[${index}][resignation_reason]" value="${resignation_reason}">
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}last_salary_${index}" class="form-label">Gaji Terakhir</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="${prefix}last_salary_${index}" name="work_experience[${index}][last_salary]" value="${last_salary}" min="0">
                            </div>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-work-experience mt-2" data-target-id="${prefix}work-experience-${index}">Hapus</button>
                </div>
            `;
            if (workExperienceContainer) {
                workExperienceContainer.insertAdjacentHTML('beforeend', workExperienceHtml);
            }
        }

        // Load existing work experience data
        if (existingWorkExperienceData && existingWorkExperienceData.length > 0) {
            existingWorkExperienceData.forEach((data, index) => {
                addWorkExperienceField(sectionPrefix, index, data);
            });
        }

        // Event listener for "Tambah Pengalaman Kerja" button
        if (addWorkExperienceButton) {
            addWorkExperienceButton.addEventListener('click', function () {
                addWorkExperienceField(sectionPrefix, workExperienceCount);
                workExperienceCount++;
            });
        }

        // Event listener for "Hapus" button on dynamic work experience fields
        if (workExperienceContainer) {
            workExperienceContainer.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-work-experience')) {
                    const targetId = e.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                    }
                }
            });
        }

        // Logic for "Saya tidak memiliki Pengalaman Kerja" checkbox
        if (noWorkExperienceCheckbox && workExperienceFieldsContainer) {
            noWorkExperienceCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    workExperienceFieldsContainer.style.display = 'none';
                    // Clear existing fields if any
                    while (workExperienceContainer.firstChild) {
                        workExperienceContainer.removeChild(workExperienceContainer.firstChild);
                    }
                    workExperienceCount = 0; // Reset count
                } else {
                    workExperienceFieldsContainer.style.display = 'block';
                    // If unchecked and no fields exist, add one default field
                    if (workExperienceCount === 0) {
                        addWorkExperienceField(sectionPrefix, workExperienceCount);
                        workExperienceCount++;
                    }
                }
            });

            // Initial check on page load based on existing data or a stored value
            if (existingWorkExperienceData.length === 0) {
                noWorkExperienceCheckbox.checked = true;
                workExperienceFieldsContainer.style.display = 'none';
            } else {
                noWorkExperienceCheckbox.checked = false;
                workExperienceFieldsContainer.style.display = 'block';
            }
        }
    });
</script>