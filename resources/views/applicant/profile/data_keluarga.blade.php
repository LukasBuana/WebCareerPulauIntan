{{-- File: resources/views/applicant/profile/data_keluarga.blade.php --}}

{{-- Pastikan Anda memanggil file ini dari `index.blade.php` atau file master lainnya seperti ini:
@include('applicant.profile.data_keluarga', ['section_prefix' => 'keluarga_'])
--}}

<div class="container-fluid mt-4"> {{-- Added mt-4 for spacing from Data Pribadi --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Data Keluarga --}}
                <div class="card-header d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}DataKeluargaMainCollapse" {{-- Unique ID for main collapse --}}
                    aria-expanded="false" {{-- Start collapsed by default --}}
                    style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-users me-2"></i>Data Keluarga<span class="required">*</span>
                    </h5>
                    {{-- Icon will be handled by custom JS below for this main header --}}
                    <i class="fas fa-chevron-up collapse-icon"></i> {{-- Changed to down for initial collapsed state --}}
                </div>

                {{-- Main Card Body for Data Keluarga --}}
                <div class="collapse" id="{{ $section_prefix ?? '' }}DataKeluargaMainCollapse"> {{-- Unique ID for main collapse content --}}
                    <div class="card-body">
                        {{-- Accordion untuk sub-bagian Data Keluarga --}}
                        <div class="accordion" id="{{ $section_prefix ?? '' }}accordionDataKeluarga"> {{-- Prefixed parent for inner accordions --}}

                            {{-- Data Tanggungan --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingTanggungan">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseTanggungan"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseTanggungan">
                                        Data Tanggungan (Suami/Istri jika sudah menikah) / (Dependent Data)
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseTanggungan" class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingTanggungan"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionDataKeluarga"> {{-- Prefixed parent --}}
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formTanggungan" method="POST">
                                            <div id="{{ $section_prefix ?? '' }}dependents-container">
                                                {{-- Dynamic dependent fields will be added here by JS --}}
                                            </div>
                                            <button type="button" class="btn btn-info btn-sm mt-2" id="{{ $section_prefix ?? '' }}add-dependent">Tambah Tanggungan</button>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="tanggungan" data-prefix="{{ $section_prefix ?? '' }}">
                                                        <i class="fas fa-save me-2"></i>Simpan Data Tanggungan
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Emergency Contact --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingDarurat">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseDarurat"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseDarurat">
                                        Anggota keluarga yang dapat dihubungi dalam keadaan darurat (Emergency Information Data)
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseDarurat" class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingDarurat"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionDataKeluarga"> {{-- Prefixed parent --}}
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formEmergencyContact" method="POST">
                                            <div class="mb-3">
                                                <label for="{{ $section_prefix ?? '' }}emergency_contact_name" class="form-label">Nama <span class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    id="{{ $section_prefix ?? '' }}emergency_contact_name"
                                                    name="emergency_contact_name"
                                                    value="{{ old('emergency_contact_name', $applicant->emergency_contact_name ?? '') }}" required>
                                                <div class="error-message"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="{{ $section_prefix ?? '' }}emergency_contact_address" class="form-label">Alamat <span class="required">*</span></label>
                                                <textarea class="form-control"
                                                    id="{{ $section_prefix ?? '' }}emergency_contact_address"
                                                    name="emergency_contact_address" required>{{ old('emergency_contact_address', $applicant->emergency_contact_address ?? '') }}</textarea>
                                                <div class="error-message"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="{{ $section_prefix ?? '' }}emergency_contact_phone" class="form-label">Telp <span class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    id="{{ $section_prefix ?? '' }}emergency_contact_phone"
                                                    name="emergency_contact_phone"
                                                    value="{{ old('emergency_contact_phone', $applicant->emergency_contact_phone ?? '') }}" required>
                                                <div class="error-message"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="{{ $section_prefix ?? '' }}emergency_contact_relationship" class="form-label">Hubungan dengan Anda <span class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    id="{{ $section_prefix ?? '' }}emergency_contact_relationship"
                                                    name="emergency_contact_relationship"
                                                    value="{{ old('emergency_contact_relationship', $applicant->emergency_contact_relationship ?? '') }}" required>
                                                <div class="error-message"></div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="darurat" data-prefix="{{ $section_prefix ?? '' }}">
                                                        <i class="fas fa-save me-2"></i>Simpan Kontak Darurat
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Susunan Keluarga --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingSusunanKeluarga">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseSusunanKeluarga"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseSusunanKeluarga">
                                        Susunan keluarga, termasuk anda (please describe your family member include yourself)
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseSusunanKeluarga" class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingSusunanKeluarga"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionDataKeluarga"> {{-- Prefixed parent --}}
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formSusunanKeluarga" method="POST">
                                            <div id="{{ $section_prefix ?? '' }}family-members-container">
                                                {{-- Dynamic family member fields will be added here by JS --}}
                                            </div>
                                            <button type="button" class="btn btn-info btn-sm mt-2" id="{{ $section_prefix ?? '' }}add-family-member">Tambah Anggota Keluarga</button>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="susunanKeluarga" data-prefix="{{ $section_prefix ?? '' }}">
                                                        <i class="fas fa-save me-2"></i>Simpan Susunan Keluarga
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Kontak yang dapat dihubungi - MODIFIED --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingKontak">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseKontak"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseKontak">
                                        Sebutkan nama 2 anggota keluarga & 2 teman anda yang dapat kami hubungi (Contact Person)
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseKontak" class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingKontak"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionDataKeluarga"> {{-- Prefixed parent --}}
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formKontakPerson" method="POST">
                                            <div id="{{ $section_prefix ?? '' }}contact-persons-container">
                                                {{-- Dynamic contact person fields will be added here by JS --}}
                                            </div>
                                            <button type="button" class="btn btn-info btn-sm mt-2" id="{{ $section_prefix ?? '' }}add-contact-person">Tambah Kontak Person</button>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="kontak" data-prefix="{{ $section_prefix ?? '' }}">
                                                        <i class="fas fa-save me-2"></i>Simpan Kontak Person
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- End of accordionDataKeluarga --}}
                    </div> {{-- End of card-body --}}
                </div> {{-- End of main collapse for Data Keluarga --}}
            </div> {{-- End of card --}}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Logic for Main Card Header Toggle (Data Keluarga) ---
        const mainCardHeaderKeluarga = document.querySelector('#{{ $section_prefix ?? '' }}DataKeluargaMainCollapse').previousElementSibling; // Get the header
        const mainCollapseKeluarga = document.getElementById('{{ $section_prefix ?? '' }}DataKeluargaMainCollapse');
        const mainCollapseIconKeluarga = mainCardHeaderKeluarga.querySelector('.collapse-icon');

if (mainCardHeaderKeluarga && mainCollapseKeluarga && mainCollapseIconKeluarga) {
    mainCollapseKeluarga.addEventListener('show.bs.collapse', function () {
        mainCardHeaderKeluarga.classList.add('active');
        mainCollapseIconKeluarga.classList.remove('collapsed');
    });

    mainCollapseKeluarga.addEventListener('hide.bs.collapse', function () {
        mainCardHeaderKeluarga.classList.remove('active');
        mainCollapseIconKeluarga.classList.add('collapsed');
    });

    // Initial state for main card header
    if (mainCollapseKeluarga.classList.contains('show')) {
        mainCardHeaderKeluarga.classList.add('active');
        mainCollapseIconKeluarga.classList.remove('collapsed');
    } else {
        mainCardHeaderKeluarga.classList.remove('active');
        mainCollapseIconKeluarga.classList.add('collapsed');
    }
}

        // --- Dynamic Form Fields Logic (Tanggungan & Susunan Keluarga - already there) ---
        let dependentCount = 0;
        const dependentsContainer = document.getElementById('{{ $section_prefix ?? '' }}dependents-container');
        const addDependentButton = document.getElementById('{{ $section_prefix ?? '' }}add-dependent');

        if (addDependentButton) {
            addDependentButton.addEventListener('click', function() {
                addDependentField('{{ $section_prefix ?? '' }}', dependentCount);
                dependentCount++;
            });
        }

        function addDependentField(prefix, index) {
            const dependentHtml = `
                <div class="dependent-item border p-3 mb-3 rounded" id="${prefix}dependent-${index}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}dependent_name_${index}" class="form-label">Nama <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}dependent_name_${index}" name="dependents[${index}][name]" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}dependent_relationship_${index}" class="form-label">Hubungan <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}dependent_relationship_${index}" name="dependents[${index}][relationship]" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}dependent_birthdate_${index}" class="form-label">Tgl Lahir <span class="required">*</span></label>
                            <input type="date" class="form-control" id="${prefix}dependent_birthdate_${index}" name="dependents[${index}][birthdate]" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}dependent_gender_${index}" class="form-label">Jns Kelamin <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}dependent_gender_${index}" name="dependents[${index}][gender]" required>
                                <option value="">Pilih</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-dependent mt-2" data-target-id="${prefix}dependent-${index}">Hapus</button>
                </div>
            `;
            if (dependentsContainer) {
                dependentsContainer.insertAdjacentHTML('beforeend', dependentHtml);
            }
        }

        if (dependentsContainer) {
            dependentsContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-dependent')) {
                    const targetId = event.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                    }
                }
            });
        }

        let familyMemberCount = 0;
        const familyMembersContainer = document.getElementById('{{ $section_prefix ?? '' }}family-members-container');
        const addFamilyMemberButton = document.getElementById('{{ $section_prefix ?? '' }}add-family-member');

        if (addFamilyMemberButton) {
            addFamilyMemberButton.addEventListener('click', function() {
                addFamilyMemberField('{{ $section_prefix ?? '' }}', familyMemberCount);
                familyMemberCount++;
            });
        }

        function addFamilyMemberField(prefix, index) {
            const familyMemberHtml = `
                <div class="family-member-item border p-3 mb-3 rounded" id="${prefix}family-member-${index}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}family_member_name_${index}" class="form-label">Nama <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}family_member_name_${index}" name="family_members[${index}][name]" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}family_member_relationship_${index}" class="form-label">Hubungan <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}family_member_relationship_${index}" name="family_members[${index}][relationship]" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                    
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}family_member_birthdate_${index}" class="form-label">Tgl Lahir <span class="required">*</span></label>
                            <input type="date" class="form-control" id="${prefix}family_member_birthdate_${index}" name="family_members[${index}][birthdate]" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}family_member_birthplace_${index}" class="form-label">Tempat Lahir <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}family_member_birthplace_${index}" name="family_members[${index}][birthplace]" required>
                            <div class="error-message"></div>
                        </div>
                     
                        
                    </div>
                    <div class="row">
                       <div class="col-md-6 mb-3">
                            <label for="${prefix}family_member_education_${index}" class="form-label">Pendidikan Terakhir <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}family_member_education_${index}" name="family_members[${index}][education]" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}family_member_job_${index}" class="form-label">Pekerjaan <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}family_member_job_${index}" name="family_members[${index}][job]" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="mb-3">
                                                            <label for="jenisKelamin" class="form-label">
                                                                Jenis Kelamin <span class="required">*</span>
                                                            </label>
                                                            <select class="form-select"
                                                                id="jenisKelamin"
                                                                name="jenis_kelamin"
                                                                required>
                                                                <option value="">Pilih Jenis Kelamin</option>
                                                                <option value="L">Laki-laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                            <div class="error-message"></div>
                                                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-family-member mt-2" data-target-id="${prefix}family-member-${index}">Hapus</button>
                </div>
            `;
            if (familyMembersContainer) {
                familyMembersContainer.insertAdjacentHTML('beforeend', familyMemberHtml);
            }
        }

        if (familyMembersContainer) {
            familyMembersContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-family-member')) {
                    const targetId = event.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                    }
                }
            });
        }

        // --- Dynamic Contact Person Fields Logic (MODIFIED) ---
        let contactPersonCount = 0;
        const contactPersonsContainer = document.getElementById('{{ $section_prefix ?? '' }}contact-persons-container');
        const addContactPersonButton = document.getElementById('{{ $section_prefix ?? '' }}add-contact-person');

        if (addContactPersonButton) {
            addContactPersonButton.addEventListener('click', function() {
                addContactPersonField('{{ $section_prefix ?? '' }}', contactPersonCount);
                contactPersonCount++;
            });
        }

        function addContactPersonField(prefix, index) {
            const contactPersonHtml = `
                <div class="contact-person-item border p-3 mb-3 rounded" id="${prefix}contact-person-${index}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}contact_keterangan_${index}" class="form-label">Keterangan <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}contact_keterangan_${index}" name="contact_persons[${index}][keterangan]" required>
                                <option value="">Pilih</option>
                                <option value="Keluarga">Keluarga</option>
                                <option value="Teman">Teman</option>
                            </select>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}contact_name_${index}" class="form-label">Nama <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}contact_name_${index}" name="contact_persons[${index}][name]" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}contact_jenis_kelamin_${index}" class="form-label">Jenis Kelamin <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}contact_jenis_kelamin_${index}" name="contact_persons[${index}][jenis_kelamin]" required>
                                <option value="">Pilih</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}contact_alamat_${index}" class="form-label">Alamat <span class="required">*</span></label>
                            <textarea class="form-control" id="${prefix}contact_alamat_${index}" name="contact_persons[${index}][alamat]" rows="2" required></textarea>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}contact_no_telepon_${index}" class="form-label">No. Telepon <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}contact_no_telepon_${index}" name="contact_persons[${index}][no_telepon]" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}contact_hubungan_${index}" class="form-label">Hubungan <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}contact_hubungan_${index}" name="contact_persons[${index}][hubungan]" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}contact_pekerjaan_${index}" class="form-label">Pekerjaan <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}contact_pekerjaan_${index}" name="contact_persons[${index}][pekerjaan]" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-contact-person mt-2" data-target-id="${prefix}contact-person-${index}">Hapus</button>
                </div>
            `;
            if (contactPersonsContainer) {
                contactPersonsContainer.insertAdjacentHTML('beforeend', contactPersonHtml);
            }
        }

        if (contactPersonsContainer) {
            contactPersonsContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-contact-person')) {
                    const targetId = event.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                    }
                }
            });
        }


        // --- Validation Logic for Individual Sections ---
        document.querySelectorAll('.save-section-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const sectionId = this.dataset.section;
                const prefix = this.dataset.prefix;
                const sectionCollapseId = `#${prefix}collapse${sectionId.charAt(0).toUpperCase() + sectionId.slice(1)}`;
                const sectionElement = document.querySelector(sectionCollapseId);
                let isValid = true;

                if (!sectionElement) { // Safety check
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

                // Define required fields for static forms (e.g., Emergency Contact)
                const sectionRequiredFields = {
                    tanggungan: {}, // Handled by dynamic fields, validation below
                    darurat: {
                        'emergency_contact_name': 'Silakan masukkan nama kontak darurat',
                        'emergency_contact_address': 'Silakan masukkan alamat kontak darurat',
                        'emergency_contact_phone': 'Silakan masukkan telepon kontak darurat',
                        'emergency_contact_relationship': 'Silakan masukkan hubungan dengan kontak darurat'
                    },
                    susunanKeluarga: {}, // Handled by dynamic fields, validation below
                    kontak: {} // Handled by dynamic fields, validation below
                };

                const requiredFields = sectionRequiredFields[sectionId];

                // Validate static fields
                if (requiredFields) {
                    for (const fieldId in requiredFields) {
                        const field = sectionElement.querySelector(`#${prefix}${fieldId}`);
                        if (field && (field.type === 'select-one' || field.tagName === 'TEXTAREA' ? !field.value.trim() : !field.value.trim())) {
                            field.classList.add('is-invalid');
                            const errorMsg = field.parentElement.querySelector('.error-message');
                            if (errorMsg) {
                                errorMsg.textContent = requiredFields[fieldId];
                                errorMsg.style.display = 'block';
                            }
                            isValid = false;
                        }
                    }
                }

                // --- Dynamic Fields Validation ---

                // Validate Dependent Fields (Tanggungan)
                if (sectionId === 'tanggungan') {
                    const dependentItems = dependentsContainer.querySelectorAll('.dependent-item');
                    if (dependentItems.length === 0) {
                        isValid = false;
                        alert('Mohon tambahkan setidaknya satu Data Tanggungan.');
                    } else {
                        dependentItems.forEach((item, idx) => {
                            const nameField = item.querySelector(`#${prefix}dependent_name_${idx}`);
                            const relationshipField = item.querySelector(`#${prefix}dependent_relationship_${idx}`);
                            const birthdateField = item.querySelector(`#${prefix}dependent_birthdate_${idx}`);
                            const genderField = item.querySelector(`#${prefix}dependent_gender_${idx}`);

                            const fieldsToCheck = [
                                { field: nameField, msg: 'Nama tanggungan harus diisi' },
                                { field: relationshipField, msg: 'Hubungan harus diisi' },
                                { field: birthdateField, msg: 'Tanggal lahir harus diisi' },
                                { field: genderField, msg: 'Jenis kelamin harus dipilih' }
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

                // Validate Family Member Fields (Susunan Keluarga)
                if (sectionId === 'susunanKeluarga') {
                    const familyMemberItems = familyMembersContainer.querySelectorAll('.family-member-item');
                     if (familyMemberItems.length === 0) {
                        isValid = false;
                        alert('Mohon tambahkan setidaknya satu Anggota Keluarga.');
                    } else {
                        familyMemberItems.forEach((item, idx) => {
                            const nameField = item.querySelector(`#${prefix}family_member_name_${idx}`);
                            const relationshipField = item.querySelector(`#${prefix}family_member_relationship_${idx}`);
                            const birthdateField = item.querySelector(`#${prefix}family_member_birthdate_${idx}`);
                            const educationField = item.querySelector(`#${prefix}family_member_education_${idx}`);
                            const jobField = item.querySelector(`#${prefix}family_member_job_${idx}`);

                            const fieldsToCheck = [
                                { field: nameField, msg: 'Nama anggota keluarga harus diisi' },
                                { field: relationshipField, msg: 'Hubungan harus diisi' },
                                { field: birthdateField, msg: 'Tanggal lahir harus diisi' },
                                { field: educationField, msg: 'Pendidikan terakhir harus diisi' },
                                { field: jobField, msg: 'Pekerjaan harus diisi' }
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
                        });
                    }
                }

                // Validate Contact Person Fields (MODIFIED)
                if (sectionId === 'kontak') {
                    const contactPersonItems = contactPersonsContainer.querySelectorAll('.contact-person-item');
                    if (contactPersonItems.length === 0) { // Or set your specific minimum (e.g., < 4)
                        isValid = false;
                        alert('Mohon tambahkan setidaknya satu Kontak Person.');
                    } else {
                        let familyCount = 0;
                        let friendCount = 0;
                        contactPersonItems.forEach((item, idx) => {
                            const keteranganField = item.querySelector(`#${prefix}contact_keterangan_${idx}`);
                            const nameField = item.querySelector(`#${prefix}contact_name_${idx}`);
                            const jenisKelaminField = item.querySelector(`#${prefix}contact_jenis_kelamin_${idx}`);
                            const alamatField = item.querySelector(`#${prefix}contact_alamat_${idx}`);
                            const noTeleponField = item.querySelector(`#${prefix}contact_no_telepon_${idx}`);
                            const hubunganField = item.querySelector(`#${prefix}contact_hubungan_${idx}`);
                            const pekerjaanField = item.querySelector(`#${prefix}contact_pekerjaan_${idx}`);

                            const fieldsToCheck = [
                                { field: keteranganField, msg: 'Keterangan harus dipilih' },
                                { field: nameField, msg: 'Nama harus diisi' },
                                { field: jenisKelaminField, msg: 'Jenis kelamin harus dipilih' },
                                { field: alamatField, msg: 'Alamat harus diisi' },
                                { field: noTeleponField, msg: 'No. Telepon harus diisi' },
                                { field: hubunganField, msg: 'Hubungan harus diisi' },
                                { field: pekerjaanField, msg: 'Pekerjaan harus diisi' }
                            ];

                            fieldsToCheck.forEach(f => {
                                if (f.field && (f.field.tagName === 'SELECT' || f.field.tagName === 'TEXTAREA' ? !f.field.value : !f.field.value.trim())) {
                                    f.field.classList.add('is-invalid');
                                    const errorMsg = f.field.parentElement.querySelector('.error-message');
                                    if (errorMsg) {
                                        errorMsg.textContent = f.msg;
                                        errorMsg.style.display = 'block';
                                    }
                                    isValid = false;
                                }
                            });

                            // Count family/friend types
                            if (keteranganField && keteranganField.value === 'Keluarga') {
                                familyCount++;
                            } else if (keteranganField && keteranganField.value === 'Teman') {
                                friendCount++;
                            }

                            // Phone number validation for contact persons
                            const phoneRegex = /^[0-9]{10,15}$/;
                            if (noTeleponField && noTeleponField.value && !phoneRegex.test(noTeleponField.value.replace(/\D/g, ''))) {
                                noTeleponField.classList.add('is-invalid');
                                const errorMsg = noTeleponField.parentElement.querySelector('.error-message');
                                if (errorMsg) {
                                    errorMsg.textContent = `Format No. Telepon tidak valid (10-15 digit).`;
                                    errorMsg.style.display = 'block';
                                }
                                isValid = false;
                            }
                        });

                        // Specific validation for 2 family members and 2 friends
                        // This logic assumes you need AT LEAST 2 family and AT LEAST 2 friends
                        // You can adjust these counts as per your exact requirements.
                        // If it's "2 total family and 2 total friends, not necessarily 4 inputs total,
                        // but from all saved contacts", then this needs backend validation.
                        // For front-end, we validate based on currently added fields.
                        if (familyCount < 2) {
                            isValid = false;
                            alert('Anda harus menambahkan setidaknya 2 Kontak Person dengan keterangan "Keluarga".');
                        }
                        if (friendCount < 2) {
                            isValid = false;
                            alert('Anda harus menambahkan setidaknya 2 Kontak Person dengan keterangan "Teman".');
                        }
                    }
                }

                // Common phone number validation for emergency contact (already present)
                if (sectionId === 'darurat') {
                    const phoneField = sectionElement.querySelector(`#${prefix}emergency_contact_phone`);
                    const phoneRegex = /^[0-9]{10,15}$/;
                    if (phoneField && phoneField.value && !phoneRegex.test(phoneField.value.replace(/\D/g, ''))) {
                        phoneField.classList.add('is-invalid');
                        const errorMsg = phoneField.parentElement.querySelector('.error-message');
                        if (errorMsg) {
                            errorMsg.textContent = `Format telepon tidak valid (10-15 digit).`;
                            errorMsg.style.display = 'block';
                        }
                        isValid = false;
                    }
                }


                if (isValid) {
                    alert(`Data di bagian "${this.textContent.replace('Simpan ', '').trim()}" berhasil disimpan!`);
                    // In a real application, you would send specific data for this section
                    // using forms like `formEmergencyContact`, `formTanggungan`, etc.
                } else {
                    const firstInvalidField = sectionElement.querySelector('.is-invalid');
                    if (firstInvalidField) {
                        firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });
        });
    });
</script>