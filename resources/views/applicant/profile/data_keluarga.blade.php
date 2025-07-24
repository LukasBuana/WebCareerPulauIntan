

<div class="container-fluid mt-4"> {{-- Added mt-4 for spacing from Data Pribadi --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Data Keluarga --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}DataKeluargaMainCollapse" {{-- Unique ID for main collapse --}}
                    aria-expanded="true" {{-- Start collapsed by default --}} style="cursor: pointer;">
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
                        <div class="accordion" id="{{ $section_prefix ?? '' }}accordionDataKeluarga">
                            {{-- Prefixed parent for inner accordions --}}

                            {{-- Data Tanggungan --}}
                            <div id="{{ $section_prefix ?? '' }}dependentSectionWrapper"
                                style="display: {{ ($applicantMaritalStatus ?? 'Belum menikah') === 'Belum menikah' ? 'none' : 'block' }};">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingTanggungan">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#{{ $section_prefix ?? '' }}collapseTanggungan"
                                            aria-expanded="false"
                                            aria-controls="{{ $section_prefix ?? '' }}collapseTanggungan"
                                            id="{{ $section_prefix ?? '' }}accordionBtnTanggungan">
                                            {{-- Tambahkan ID ini --}}
                                            Data Tanggungan (Suami/Istri & Anak-anak jika sudah menikah) / (Dependent
                                            Data)
                                        </button>
                                    </h2>
                                    <div id="{{ $section_prefix ?? '' }}collapseTanggungan"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="{{ $section_prefix ?? '' }}headingTanggungan"
                                        data-bs-parent="#{{ $section_prefix ?? '' }}accordionDataKeluarga">
                                        <div class="accordion-body">
                                            <form id="{{ $section_prefix ?? '' }}formTanggungan" method="POST">
                                                <div id="{{ $section_prefix ?? '' }}dependents-container">
                                                    {{-- Dynamic dependent fields will be added here by JS --}}
                                                </div>
                                                <button type="button" class="btn btn-info btn-sm mt-2"
                                                    id="{{ $section_prefix ?? '' }}add-dependent">Tambah
                                                    Tanggungan</button>
                                                <div class="row mt-4">
                                                    <div class="col-md-12 text-end">
                                                        <button type="submit"
                                                            class="btn btn-primary px-4 save-section-btn"
                                                            data-section="dependents"
                                                            data-prefix="{{ $section_prefix ?? '' }}">
                                                            <i class="fas fa-save me-2"></i>Simpan Data Tanggungan
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Emergency Contact --}}
                            <div class="accordion-item">
                                                <input type="hidden" name="emergency_contact[${index}][id]" value="${id}"> 

                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingDarurat">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseDarurat"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseDarurat">
                                        Anggota keluarga yang dapat dihubungi dalam keadaan darurat (Emergency
                                        Information Data)
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseDarurat"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingDarurat"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionDataKeluarga">
                                    {{-- Prefixed parent --}}
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formEmergencyContact" method="POST">
                                            <div class="mb-3">
                                                <label for="{{ $section_prefix ?? '' }}emergency_contact_name"
                                                    class="form-label">Nama <span class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    id="{{ $section_prefix ?? '' }}emergency_contact_name"
                                                    name="emergency_contact_name"
                                                    value="{{ old('emergency_contact_name', $applicant->emergency_contact_name ?? '') }}"
                                                    required>
                                                <div class="error-message"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="{{ $section_prefix ?? '' }}emergency_contact_address"
                                                    class="form-label">Alamat <span class="required">*</span></label>
                                                <textarea class="form-control" id="{{ $section_prefix ?? '' }}emergency_contact_address"
                                                    name="emergency_contact_address" required>{{ old('emergency_contact_address', $applicant->emergency_contact_address ?? '') }}</textarea>
                                                <div class="error-message"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="{{ $section_prefix ?? '' }}emergency_contact_phone"
                                                    class="form-label">Telp <span class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    id="{{ $section_prefix ?? '' }}emergency_contact_phone"
                                                    name="emergency_contact_phone"
                                                    value="{{ old('emergency_contact_phone', $applicant->emergency_contact_phone ?? '') }}"
                                                    required>
                                                <div class="error-message"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="{{ $section_prefix ?? '' }}emergency_contact_relationship"
                                                    class="form-label">Hubungan dengan Anda <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    id="{{ $section_prefix ?? '' }}emergency_contact_relationship"
                                                    name="emergency_contact_relationship"
                                                    value="{{ old('emergency_contact_relationship', $applicant->emergency_contact_relationship ?? '') }}"
                                                    required>
                                                <div class="error-message"></div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit"
                                                        class="btn btn-primary px-4 save-section-btn"
                                                        data-section="darurat"
                                                        data-prefix="{{ $section_prefix ?? '' }}">
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
                                        Susunan keluarga, termasuk anda (please describe your family member include
                                        yourself)
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseSusunanKeluarga"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingSusunanKeluarga"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionDataKeluarga">
                                    {{-- Prefixed parent --}}
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formSusunanKeluarga" method="POST">
                                            <div id="{{ $section_prefix ?? '' }}family-members-container">
                                                {{-- Dynamic family member fields will be added here by JS --}}
                                            </div>
                                            <button type="button" class="btn btn-info btn-sm mt-2"
                                                id="{{ $section_prefix ?? '' }}add-family-member">Tambah Anggota
                                                Keluarga</button>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit"
                                                        class="btn btn-primary px-4 save-section-btn"
                                                        data-section="family_members"
                                                        data-prefix="{{ $section_prefix ?? '' }}">
                                                        <i class="fas fa-save me-2"></i>Simpan Susunan Keluarga
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- NEW: Fixed Kontak Person Section --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingKontak">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseKontak"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseKontak">
                                        Sebutkan nama 2 anggota keluarga & 2 teman anda yang dapat kami hubungi (Contact
                                        Person)
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseKontak"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingKontak"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionDataKeluarga">
                                    {{-- Prefixed parent --}}
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formKontakPerson" method="POST">
                                            {{-- Fixed Contact Person 1 (Family) --}}
                                            <div class="contact-person-item border p-3 mb-3 rounded">
                                                <h6 class="sub-section-header">Kontak Person 1 (Keluarga)</h6>
                                                <input type="hidden" name="fixed_contact_persons[0][id]"
                                                    value="{{ $fixedContactPersonsData[0]['id'] ?? '' }}">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="{{ $section_prefix ?? '' }}contact_person_0_name"
                                                            class="form-label">Nama <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="{{ $section_prefix ?? '' }}contact_person_0_name"
                                                            name="fixed_contact_persons[0][name]"
                                                            value="{{ $fixedContactPersonsData[0]['name'] ?? '' }}"
                                                            required>
                                                        <div class="error-message"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            for="{{ $section_prefix ?? '' }}contact_person_0_gender"
                                                            class="form-label">Jenis Kelamin <span
                                                                class="required">*</span></label>
                                                        <select class="form-select"
                                                            id="{{ $section_prefix ?? '' }}contact_person_0_gender"
                                                            name="fixed_contact_persons[0][gender]" required>
                                                            <option value="">Pilih</option>
                                                            <option value="L"
                                                                {{ ($fixedContactPersonsData[0]['gender'] ?? '') === 'L' ? 'selected' : '' }}>
                                                                Laki-laki</option>
                                                            <option value="P"
                                                                {{ ($fixedContactPersonsData[0]['gender'] ?? '') === 'P' ? 'selected' : '' }}>
                                                                Perempuan</option>
                                                        </select>
                                                        <div class="error-message"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="{{ $section_prefix ?? '' }}contact_person_0_address"
                                                        class="form-label">Alamat <span
                                                            class="required">*</span></label>
                                                    <textarea class="form-control" id="{{ $section_prefix ?? '' }}contact_person_0_address"
                                                        name="fixed_contact_persons[0][address]" rows="2" required>{{ $fixedContactPersonsData[0]['address'] ?? '' }}</textarea>
                                                    <div class="error-message"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            for="{{ $section_prefix ?? '' }}contact_person_0_phone_no"
                                                            class="form-label">No. Telepon <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="{{ $section_prefix ?? '' }}contact_person_0_phone_no"
                                                            name="fixed_contact_persons[0][phone_no]"
                                                            value="{{ $fixedContactPersonsData[0]['phone_no'] ?? '' }}"
                                                            required>
                                                        <div class="error-message"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            for="{{ $section_prefix ?? '' }}contact_person_0_occupation"
                                                            class="form-label">Pekerjaan <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="{{ $section_prefix ?? '' }}contact_person_0_occupation"
                                                            name="fixed_contact_persons[0][occupation]"
                                                            value="{{ $fixedContactPersonsData[0]['occupation'] ?? '' }}"
                                                            required>
                                                        <div class="error-message"></div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="fixed_contact_persons[0][type]"
                                                    value="Keluarga">
                                            </div>

                                            {{-- Fixed Contact Person 2 (Family) --}}
                                            <div class="contact-person-item border p-3 mb-3 rounded">
                                                <h6 class="sub-section-header">Kontak Person 2 (Keluarga)</h6>
                                                <input type="hidden" name="fixed_contact_persons[1][id]"
                                                    value="{{ $fixedContactPersonsData[1]['id'] ?? '' }}">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="{{ $section_prefix ?? '' }}contact_person_1_name"
                                                            class="form-label">Nama <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="{{ $section_prefix ?? '' }}contact_person_1_name"
                                                            name="fixed_contact_persons[1][name]"
                                                            value="{{ $fixedContactPersonsData[1]['name'] ?? '' }}"
                                                            required>
                                                        <div class="error-message"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            for="{{ $section_prefix ?? '' }}contact_person_1_gender"
                                                            class="form-label">Jenis Kelamin <span
                                                                class="required">*</span></label>
                                                        <select class="form-select"
                                                            id="{{ $section_prefix ?? '' }}contact_person_1_gender"
                                                            name="fixed_contact_persons[1][gender]" required>
                                                            <option value="">Pilih</option>
                                                            <option value="L"
                                                                {{ ($fixedContactPersonsData[1]['gender'] ?? '') === 'L' ? 'selected' : '' }}>
                                                                Laki-laki</option>
                                                            <option value="P"
                                                                {{ ($fixedContactPersonsData[1]['gender'] ?? '') === 'P' ? 'selected' : '' }}>
                                                                Perempuan</option>
                                                        </select>
                                                        <div class="error-message"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="{{ $section_prefix ?? '' }}contact_person_1_address"
                                                        class="form-label">Alamat <span
                                                            class="required">*</span></label>
                                                    <textarea class="form-control" id="{{ $section_prefix ?? '' }}contact_person_1_address"
                                                        name="fixed_contact_persons[1][address]" rows="2" required>{{ $fixedContactPersonsData[1]['address'] ?? '' }}</textarea>
                                                    <div class="error-message"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            for="{{ $section_prefix ?? '' }}contact_person_1_phone_no"
                                                            class="form-label">No. Telepon <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="{{ $section_prefix ?? '' }}contact_person_1_phone_no"
                                                            name="fixed_contact_persons[1][phone_no]"
                                                            value="{{ $fixedContactPersonsData[1]['phone_no'] ?? '' }}"
                                                            required>
                                                        <div class="error-message"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            for="{{ $section_prefix ?? '' }}contact_person_1_occupation"
                                                            class="form-label">Pekerjaan <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="{{ $section_prefix ?? '' }}contact_person_1_occupation"
                                                            name="fixed_contact_persons[1][occupation]"
                                                            value="{{ $fixedContactPersonsData[1]['occupation'] ?? '' }}"
                                                            required>
                                                        <div class="error-message"></div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="fixed_contact_persons[1][type]"
                                                    value="Keluarga">
                                            </div>

                                            {{-- Fixed Contact Person 3 (Friend) --}}
                                            <div class="contact-person-item border p-3 mb-3 rounded">
                                                <h6 class="sub-section-header">Kontak Person 3 (Teman)</h6>
                                                <input type="hidden" name="fixed_contact_persons[2][id]"
                                                    value="{{ $fixedContactPersonsData[2]['id'] ?? '' }}">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="{{ $section_prefix ?? '' }}contact_person_2_name"
                                                            class="form-label">Nama <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="{{ $section_prefix ?? '' }}contact_person_2_name"
                                                            name="fixed_contact_persons[2][name]"
                                                            value="{{ $fixedContactPersonsData[2]['name'] ?? '' }}"
                                                            required>
                                                        <div class="error-message"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            for="{{ $section_prefix ?? '' }}contact_person_2_gender"
                                                            class="form-label">Jenis Kelamin <span
                                                                class="required">*</span></label>
                                                        <select class="form-select"
                                                            id="{{ $section_prefix ?? '' }}contact_person_2_gender"
                                                            name="fixed_contact_persons[2][gender]" required>
                                                            <option value="">Pilih</option>
                                                            <option value="L"
                                                                {{ ($fixedContactPersonsData[2]['gender'] ?? '') === 'L' ? 'selected' : '' }}>
                                                                Laki-laki</option>
                                                            <option value="P"
                                                                {{ ($fixedContactPersonsData[2]['gender'] ?? '') === 'P' ? 'selected' : '' }}>
                                                                Perempuan</option>
                                                        </select>
                                                        <div class="error-message"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="{{ $section_prefix ?? '' }}contact_person_2_address"
                                                        class="form-label">Alamat <span
                                                            class="required">*</span></label>
                                                    <textarea class="form-control" id="{{ $section_prefix ?? '' }}contact_person_2_address"
                                                        name="fixed_contact_persons[2][address]" rows="2" required>{{ $fixedContactPersonsData[2]['address'] ?? '' }}</textarea>
                                                    <div class="error-message"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            for="{{ $section_prefix ?? '' }}contact_person_2_phone_no"
                                                            class="form-label">No. Telepon <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="{{ $section_prefix ?? '' }}contact_person_2_phone_no"
                                                            name="fixed_contact_persons[2][phone_no]"
                                                            value="{{ $fixedContactPersonsData[2]['phone_no'] ?? '' }}"
                                                            required>
                                                        <div class="error-message"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            for="{{ $section_prefix ?? '' }}contact_person_2_occupation"
                                                            class="form-label">Pekerjaan <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="{{ $section_prefix ?? '' }}contact_person_2_occupation"
                                                            name="fixed_contact_persons[2][occupation]"
                                                            value="{{ $fixedContactPersonsData[2]['occupation'] ?? '' }}"
                                                            required>
                                                        <div class="error-message"></div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="fixed_contact_persons[2][type]"
                                                    value="Teman">
                                            </div>

                                            {{-- Fixed Contact Person 4 (Friend) --}}
                                            <div class="contact-person-item border p-3 mb-3 rounded">
                                                <h6 class="sub-section-header">Kontak Person 4 (Teman)</h6>
                                                <input type="hidden" name="fixed_contact_persons[3][id]"
                                                    value="{{ $fixedContactPersonsData[3]['id'] ?? '' }}">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="{{ $section_prefix ?? '' }}contact_person_3_name"
                                                            class="form-label">Nama <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="{{ $section_prefix ?? '' }}contact_person_3_name"
                                                            name="fixed_contact_persons[3][name]"
                                                            value="{{ $fixedContactPersonsData[3]['name'] ?? '' }}"
                                                            required>
                                                        <div class="error-message"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            for="{{ $section_prefix ?? '' }}contact_person_3_gender"
                                                            class="form-label">Jenis Kelamin <span
                                                                class="required">*</span></label>
                                                        <select class="form-select"
                                                            id="{{ $section_prefix ?? '' }}contact_person_3_gender"
                                                            name="fixed_contact_persons[3][gender]" required>
                                                            <option value="">Pilih</option>
                                                            <option value="L"
                                                                {{ ($fixedContactPersonsData[3]['gender'] ?? '') === 'L' ? 'selected' : '' }}>
                                                                Laki-laki</option>
                                                            <option value="P"
                                                                {{ ($fixedContactPersonsData[3]['gender'] ?? '') === 'P' ? 'selected' : '' }}>
                                                                Perempuan</option>
                                                        </select>
                                                        <div class="error-message"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="{{ $section_prefix ?? '' }}contact_person_3_address"
                                                        class="form-label">Alamat <span
                                                            class="required">*</span></label>
                                                    <textarea class="form-control" id="{{ $section_prefix ?? '' }}contact_person_3_address"
                                                        name="fixed_contact_persons[3][address]" rows="2" required>{{ $fixedContactPersonsData[3]['address'] ?? '' }}</textarea>
                                                    <div class="error-message"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            for="{{ $section_prefix ?? '' }}contact_person_3_phone_no"
                                                            class="form-label">No. Telepon <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="{{ $section_prefix ?? '' }}contact_person_3_phone_no"
                                                            name="fixed_contact_persons[3][phone_no]"
                                                            value="{{ $fixedContactPersonsData[3]['phone_no'] ?? '' }}"
                                                            required>
                                                        <div class="error-message"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label
                                                            for="{{ $section_prefix ?? '' }}contact_person_3_occupation"
                                                            class="form-label">Pekerjaan <span
                                                                class="required">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="{{ $section_prefix ?? '' }}contact_person_3_occupation"
                                                            name="fixed_contact_persons[3][occupation]"
                                                            value="{{ $fixedContactPersonsData[3]['occupation'] ?? '' }}"
                                                            required>
                                                        <div class="error-message"></div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="fixed_contact_persons[3][type]"
                                                    value="Teman">
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit"
                                                        class="btn btn-primary px-4 save-section-btn"
                                                        data-section="contact_persons"
                                                        data-prefix="{{ $section_prefix ?? '' }}">
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
    // Cara yang lebih tepat untuk mendapatkan elemen header utama:
    const mainCollapseKeluarga = document.getElementById('{{ $section_prefix ?? '' }}DataKeluargaMainCollapse');
    const mainCardHeaderKeluarga = document.querySelector(`[data-bs-target="#${mainCollapseKeluarga.id}"]`); // Dapatkan header yang menargetkan collapse ini
    const mainCollapseIconKeluarga = mainCardHeaderKeluarga ? mainCardHeaderKeluarga.querySelector('.collapse-icon') : null;

    if (mainCardHeaderKeluarga && mainCollapseKeluarga && mainCollapseIconKeluarga) {
        // Initial state
        if (mainCollapseKeluarga.classList.contains('show')) {
            mainCardHeaderKeluarga.classList.add('active');
            mainCollapseIconKeluarga.classList.remove('fa-chevron-up');
            mainCollapseIconKeluarga.classList.add('fa-chevron-down');
        } else {
            // Ini adalah kondisi default, pastikan kelas 'active' dihapus
            mainCardHeaderKeluarga.classList.remove('active');
            mainCollapseIconKeluarga.classList.remove('fa-chevron-down');
            mainCollapseIconKeluarga.classList.add('fa-chevron-up');
        }

        // Event listeners for Bootstrap collapse events
        mainCollapseKeluarga.addEventListener('show.bs.collapse', function () {
            mainCardHeaderKeluarga.classList.add('active');
            mainCollapseIconKeluarga.classList.remove('fa-chevron-up');
            mainCollapseIconKeluarga.classList.add('fa-chevron-down');
        });

        mainCollapseKeluarga.addEventListener('hide.bs.collapse', function () {
            mainCardHeaderKeluarga.classList.remove('active');
            mainCollapseIconKeluarga.classList.remove('fa-chevron-down');
            mainCollapseIconKeluarga.classList.add('fa-chevron-up');
        });
    }

    // ... (rest of your JavaScript code remains the same)

        // --- Dynamic Form Fields Logic (Tanggungan & Susunan Keluarga - already there) ---
        let dependentCount = 0;
        const dependentsContainer = document.getElementById('{{ $section_prefix ?? '' }}dependents-container');
        const addDependentButton = document.getElementById('{{ $section_prefix ?? '' }}add-dependent');
        const dependentSectionWrapper = document.getElementById('{{ $section_prefix ?? '' }}dependentSectionWrapper'); // Get the wrapper div

        // Function to add a dependent field
        function addDependentField(prefix, index, data = {}) {
                        const id = data.id || ''; // Ambil ID dari data yang ada, jika ada

            const name = data.name || '';
            const relationship = data.relationship || '';
            const place_of_birth = data.place_of_birth || '';
            const date_of_birth = data.date_of_birth || '';
            const education = data.education || '';
            const gender = data.gender || '';
            const occupation = data.occupation || '';

            // Relationship options for dependents (can be expanded if needed)
            const dependentRelationshipOptions = [
                { value: 'Suami/Istri', text: 'Suami / Istri' },
                { value: 'Anak1', text: 'Anak ke 1' },
                { value: 'Anak2', text: 'Anak ke 2' },
                { value: 'Anak3', text: 'Anak ke 3' },
                { value: 'Anak4', text: 'Anak ke 4' },
                { value: 'Lainnya', text: 'Lainnya' }
            ];

            let relationshipOptionsHtml = '<option value="">Pilih Hubungan</option>';
            dependentRelationshipOptions.forEach(option => {
                relationshipOptionsHtml += `<option value="${option.value}" ${relationship === option.value ? 'selected' : ''}>${option.text}</option>`;
            });

            const dependentHtml = `
                <div class="dependent-item border p-3 mb-3 rounded" id="${prefix}dependent-${index}">
                                    <input type="hidden" name="dependents[${index}][id]" value="${id}"> 

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}dependent_name_${index}" class="form-label">Nama <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}dependent_name_${index}" name="dependents[${index}][name]" value="${name}" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}dependent_relationship_${index}" class="form-label">Hubungan <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}dependent_relationship_${index}" name="dependents[${index}][relationship]" required>
                                ${relationshipOptionsHtml}
                            </select>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}dependent_place_of_birth_${index}" class="form-label">Tempat Lahir <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}dependent_place_of_birth_${index}" name="dependents[${index}][place_of_birth]" value="${place_of_birth}" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}dependent_date_of_birth_${index}" class="form-label">Tgl Lahir <span class="required">*</span></label>
                            <input type="date" class="form-control" id="${prefix}dependent_date_of_birth_${index}" name="dependents[${index}][date_of_birth]" value="${date_of_birth}" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}dependent_education_${index}" class="form-label">Pendidikan Terakhir<span class="required">*</span></label>
                           <input type="text" class="form-control" id="${prefix}dependent_education_${index}" name="dependents[${index}][education]" value="${education}" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}dependent_gender_${index}" class="form-label">Jns Kelamin <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}dependent_gender_${index}" name="dependents[${index}][gender]" required>
                                <option value="">Pilih</option>
                                <option value="L" ${gender === 'L' ? 'selected' : ''}>Laki-laki</option>
                                <option value="P" ${gender === 'P' ? 'selected' : ''}>Perempuan</option>
                            </select>
                            <div class="error-message"></div>
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="${prefix}dependent_occupation_${index}" class="form-label">Pekerjaan<span class="required">*</span></label>
                           <input type="text" class="form-control" id="${prefix}dependent_occupation_${index}" name="dependents[${index}][occupation]" value="${occupation}" required>
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

        // Add event listener for adding new dependents
        if (addDependentButton) {
            addDependentButton.addEventListener('click', function() {
                addDependentField('{{ $section_prefix ?? '' }}', dependentCount);
                dependentCount++;
            });
        }

        // Populate existing dependent data when the page loads
        const existingDependents = @json($dependentsData ?? []);
        if (existingDependents.length > 0) {
            existingDependents.forEach(function(dependent) {
                addDependentField('{{ $section_prefix ?? '' }}', dependentCount, dependent);
                dependentCount++;
            });
        }

        if (dependentsContainer) {
            dependentsContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-dependent')) {
                    const targetId = event.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                        // Re-index after removal
                        reindexDynamicInputs('{{ $section_prefix ?? '' }}dependents-container', 'dependents');
                    }
                }
            });
        }

        // Re-indexing function for dynamic inputs
        function reindexDynamicInputs(containerId, itemType) {
            const container = document.getElementById(containerId);
            if (!container) return; // Safety check

            Array.from(container.children).forEach((group, index) => {
                // Update names
                group.querySelectorAll('[name^="' + itemType + '["]').forEach(input => {
                    const currentName = input.getAttribute('name');
                    const updatedName = currentName.replace(/\[\d+\]/, '[' + index + ']');
                    input.setAttribute('name', updatedName);
                });
                // Update IDs and labels
                group.querySelectorAll('[id^="' + itemType + '_"]').forEach(input => {
                    const oldId = input.id;
                    const parts = oldId.split('_'); // e.g., ['keluarga_', 'dependent', 'name', '0']
                    parts[parts.length - 1] = index; // Update the index part
                    const newId = parts.join('_');
                    input.id = newId;

                    const label = document.querySelector(`label[for="${oldId}"]`);
                    if (label) {
                        label.setAttribute('for', newId);
                    }
                });
            });
        }


        let familyMemberCount = 0;
        const familyMembersContainer = document.getElementById('{{ $section_prefix ?? '' }}family-members-container');
        const addFamilyMemberButton = document.getElementById('{{ $section_prefix ?? '' }}add-family-member');

        // Function to add a family member field
        function addFamilyMemberField(prefix, index, data = {}) {
                        const id = data.id || ''; // Ambil ID dari data yang ada, jika ada

            const name = data.name || '';
            const relationship = data.relationship || '';
            const birthdate = data.date_of_birth || ''; // Assuming 'date_of_birth' in DB for family members
            const birthplace = data.place_of_birth || ''; // Assuming 'place_of_birth' in DB for family members
            const education = data.education || '';
            const job = data.occupation || ''; // Assuming 'occupation' in DB for family members
            const gender = data.gender || '';

            // Relationship options for family members (can be expanded if needed)
            const familyRelationshipOptions = [
                { value: 'Ayah', text: 'Ayah' },
                { value: 'Ibu', text: 'Ibu' },
                { value: 'Anak1', text: 'Anak ke 1' },
                { value: 'Anak2', text: 'Anak ke 2' },
                { value: 'Anak3', text: 'Anak ke 3' },
                { value: 'Anak4', text: 'Anak ke 4' },
                { value: 'Lainnya', text: 'Lainnya' }
            ];

            let familyRelationshipOptionsHtml = '<option value="">Pilih Hubungan</option>';
            familyRelationshipOptions.forEach(option => {
                familyRelationshipOptionsHtml += `<option value="${option.value}" ${relationship === option.value ? 'selected' : ''}>${option.text}</option>`;
            });

            const familyMemberHtml = `
                <div class="family-member-item border p-3 mb-3 rounded" id="${prefix}family-member-${index}">
                                    <input type="hidden" name="family_members[${index}][id]" value="${id}"> 

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}family_member_name_${index}" class="form-label">Nama <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}family_member_name_${index}" name="family_members[${index}][name]" value="${name}" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}family_member_relationship_${index}" class="form-label">Hubungan <span class="required">*</span></label>
                            <select class="form-select" id="${prefix}family_member_relationship_${index}" name="family_members[${index}][relationship]" required>
                                ${familyRelationshipOptionsHtml}
                            </select>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}family_member_birthdate_${index}" class="form-label">Tgl Lahir <span class="required">*</span></label>
                            <input type="date" class="form-control" id="${prefix}family_member_birthdate_${index}" name="family_members[${index}][date_of_birth]" value="${birthdate}" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}family_member_birthplace_${index}" class="form-label">Tempat Lahir <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}family_member_birthplace_${index}" name="family_members[${index}][place_of_birth]" value="${birthplace}" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-6 mb-3">
                            <label for="${prefix}family_member_education_${index}" class="form-label">Pendidikan Terakhir <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}family_member_education_${index}" name="family_members[${index}][education]" value="${education}" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}family_member_job_${index}" class="form-label">Pekerjaan <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}family_member_job_${index}" name="family_members[${index}][occupation]" value="${job}" required>
                            <div class="error-message"></div>
                        </div>
                         <div class="mb-3">
                                <label for="${prefix}family_member_gender_${index}" class="form-label">
                                    Jenis Kelamin <span class="required">*</span>
                                </label>
                                <select class="form-select"
                                    id="${prefix}family_member_gender_${index}"
                                    name="family_members[${index}][gender]"
                                    required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" ${gender === 'L' ? 'selected' : ''}>Laki-laki</option>
                                    <option value="P" ${gender === 'P' ? 'selected' : ''}>Perempuan</option>
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

        // Add event listener for adding new family members
        if (addFamilyMemberButton) {
            addFamilyMemberButton.addEventListener('click', function() {
                addFamilyMemberField('{{ $section_prefix ?? '' }}', familyMemberCount);
                familyMemberCount++;
            });
        }

        // Populate existing family member data when the page loads
        const existingFamilyMembers = @json($familyMembersData ?? []);
        if (existingFamilyMembers.length > 0) {
            existingFamilyMembers.forEach(function(member) {
                addFamilyMemberField('{{ $section_prefix ?? '' }}', familyMemberCount, member);
                familyMemberCount++;
            });
        }

        if (familyMembersContainer) {
            familyMembersContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-family-member')) {
                    const targetId = event.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                        // Re-index after removal
                        reindexDynamicInputs('{{ $section_prefix ?? '' }}family-members-container', 'family_members');
                    }
                }
            });
        }

        // Fungsi validateField (dari file data_pribadi.blade.php Anda) - PASTIKAN FUNGSI INI SUDAH DI DEFINISIKAN SECARA GLOBAL ATAU DI COPY KE SINI
        // Saya asumsikan Anda telah mendefinisikan ini di tempat yang dapat diakses oleh kedua skrip,
        // jika tidak, Anda perlu menyertakannya di sini juga.
        function validateField(inputElement) {
            let isValid = true;
            const errorMessageElement = inputElement.parentElement.querySelector('.error-message');

            if (inputElement.hasAttribute('required')) {
                if (inputElement.type === 'checkbox' || inputElement.type === 'radio') {
                    const radioGroupName = inputElement.name;
                    isValid = document.querySelector(`input[name="${radioGroupName}"]:checked`) !== null;
                } else if (inputElement.tagName === 'SELECT') {
                    isValid = inputElement.value.trim() !== '';
                } else {
                    isValid = inputElement.value.trim() !== '';
                }
            }

            if (!isValid) {
                inputElement.classList.add('is-invalid');
                if (errorMessageElement) {
                    errorMessageElement.textContent = inputElement.validationMessage || 'Field ini wajib diisi.';
                    errorMessageElement.style.display = 'block';
                }
            } else {
                inputElement.classList.remove('is-invalid');
                if (errorMessageElement) {
                    errorMessageElement.style.display = 'none';
                }
            }
            return isValid;
        }

  
        
        // --- Event Listener for Marital Status Change ---
        // ASUMSI: marital_status SELECT element ada di halaman data_pribadi.blade.php
        // Pastikan elemen #marital_status dapat diakses dari script ini.
        // Jika file data_keluarga.blade.php di-include di halaman yang sama dengan marital_status,
        // maka document.getElementById('marital_status') akan berfungsi.
        const maritalStatusSelectElement = document.getElementById('marital_status'); 
        if (maritalStatusSelectElement) {
            maritalStatusSelectElement.addEventListener('change', function() {
                const dependentSection = document.getElementById('{{ $section_prefix ?? '' }}dependentSectionWrapper');
                const dependentContainer = document.getElementById('{{ $section_prefix ?? '' }}dependents-container');
                const addDependentBtn = document.getElementById('{{ $section_prefix ?? '' }}add-dependent');
                
                if (this.value === 'Belum menikah') {
                    if (dependentSection) {
                        dependentSection.style.display = 'none';
                        // Opsional: bersihkan input dinamis yang sudah ada untuk tanggungan
                        if (dependentContainer) {
                            dependentContainer.innerHTML = ''; // Hapus semua form tanggungan
                            dependentCount = 0; // Reset counter
                        }
                        // Nonaktifkan tombol tambah tanggungan jika ada
                        if(addDependentBtn) {
                            addDependentBtn.disabled = true;
                        }
                    }
                } else {
                    if (dependentSection) {
                        dependentSection.style.display = 'block';
                         // Aktifkan kembali tombol tambah tanggungan
                        if(addDependentBtn) {
                            addDependentBtn.disabled = false;
                        }
                        // Jika tidak ada tanggungan yang ada, tambahkan satu form kosong secara default
                        if (dependentContainer && dependentContainer.children.length === 0) {
                            addDependentField('{{ $section_prefix ?? '' }}', 0);
                            dependentCount = 1; // Set counter ke 1
                        }
                    }
                }
            });
            // Picu event change saat halaman dimuat untuk mengatur status awal
            // berdasarkan nilai yang ada di database atau old()
            maritalStatusSelectElement.dispatchEvent(new Event('change'));
        }
    });
</script>