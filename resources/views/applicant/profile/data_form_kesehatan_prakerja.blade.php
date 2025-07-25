<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Formulir Pernyataan Kesehatan --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}HealthDeclarationMainCollapse" aria-expanded="false"
                    style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-notes-medical me-2"></i>Formulir Pernyataan Kesehatan Pra-Kerja<span
                            class="required">*</span>
                    </h5>
                    <i class="fas fa-chevron-up collapse-icon"></i>
                </div>

                {{-- Main Card Body for Formulir Pernyataan Kesehatan --}}
                <div class="collapse" id="{{ $section_prefix ?? '' }}HealthDeclarationMainCollapse">
                    <div class="card-body">
                        <form id="{{ $section_prefix ?? '' }}formHealthDeclaration" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- Personal Health Information --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="{{ $section_prefix ?? '' }}name" class="form-label">Nama <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control" id="{{ $section_prefix ?? '' }}name"
                                        name="name" value="{{ $applicant->name ?? '' }}" required>
                                    <div class="error-message"></div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="{{ $section_prefix ?? '' }}weight_kg" class="form-label">Berat Badan
                                        (kg) <span class="required">*</span></label>
                                    <input type="number" step="0.1" class="form-control"
                                        id="{{ $section_prefix ?? '' }}weight_kg" name="weight_kg"
                                        value="{{ $applicant->healthData->weight_kg ?? '' }}" required>
                                    <div class="error-message"></div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="{{ $section_prefix ?? '' }}height_cm" class="form-label">Tinggi Badan
                                        (cm) <span class="required">*</span></label>
                                    <input type="number" step="0.1" class="form-control"
                                        id="{{ $section_prefix ?? '' }}height_cm" name="height_cm"
                                        value="{{ $applicant->healthData->height_cm ?? '' }}" required>
                                    <div class="error-message"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="{{ $section_prefix ?? '' }}id_card_number" class="form-label">No. KTP
                                        <span class="required">*</span></label>
                                    <input type="text" class="form-control"
                                        id="{{ $section_prefix ?? '' }}id_card_number" name="id_card_number"
                                        value="{{ $applicant->id_card_number ?? '' }}" required>
                                    <div class="error-message"></div>
                                </div>
                            </div>

                            <hr>

                            {{-- Health Questions --}}
                            @php
                                $healthQuestions = [
                                    'has_medical_condition' => 'Apakah Anda memiliki kondisi medis atau cacat yang dapat mempengaruhi kemampuan Anda dalam melakukan pekerjaan yang dilamar?',
                                    'resigned_due_to_health' => 'Apakah pernah Anda berhenti dari pekerjaan sebelumnya karena alasan kesehatan?',
                                    'failed_pre_employment_exam' => 'Apakah Anda pernah gagal dalam pemeriksaan kesehatan pra kerja / asuransi kesehatan, dll?',
                                    'undergoing_treatment_or_surgery' => 'Apakah Anda sedang menjalani pengobatan / akan menjalani operasi?',
                                    'under_medical_supervision' => 'Apakah Anda berada dibawah pengawasan medis?',
                                    'on_regular_medication' => 'Apakah Anda mengkonsumsi obat tertentu secara rutin?',
                                    'has_allergies' => 'Apakah Anda mempunyai alergi?',
                                    'absent_due_to_health_12_months' => 'Dalam jangka waktu 12 bulan terakhir, apakah Anda pernah absen kerja dengan alasan kesehatan atau luka selama 2 minggu atau lebih?',
                                    'had_accident' => 'Apakah Anda pernah mendapat kecelakaan?',
                                ];
                            @endphp

                            @foreach ($healthQuestions as $field => $question)
                                <div class="mb-3">
                                    <label class="form-label">{{ $question }} <span
                                            class="required">*</span></label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="{{ $field }}" id="{{ $section_prefix ?? '' }}{{ $field }}_yes"
                                                value="1"
                                                {{ (isset($applicant->healthData->$field) && $applicant->healthData->$field == 1) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="{{ $section_prefix ?? '' }}{{ $field }}_yes">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                name="{{ $field }}" id="{{ $section_prefix ?? '' }}{{ $field }}_no"
                                                value="0"
                                                {{ (isset($applicant->healthData->$field) && $applicant->healthData->$field == 0) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="{{ $section_prefix ?? '' }}{{ $field }}_no">Tidak</label>
                                        </div>
                                    </div>
                                    <div class="error-message"></div>
                                    <div id="{{ $section_prefix ?? '' }}{{ $field }}_explanation_container"
                                        class="mt-2"
                                        style="display: {{ (isset($applicant->healthData->$field) && $applicant->healthData->$field == 1) ? 'block' : 'none' }};">
                                        <label for="{{ $section_prefix ?? '' }}{{ $field }}_explanation"
                                            class="form-label">Penjelasan:</label>
                                        <textarea class="form-control" id="{{ $section_prefix ?? '' }}{{ $field }}_explanation"
                                            name="{{ $field }}_explanation">{{ $applicant->healthData->{$field . '_explanation'} ?? '' }}</textarea>
                                        <div class="error-message"></div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- Pregnancy Question (Female Candidates Only) --}}
                            <div class="mb-3" id="{{ $section_prefix ?? '' }}is_pregnant_container">
                                <label class="form-label">Hanya untuk kandidat perempuan: Apakah Anda sedang mengandung
                                    saat ini? <span class="required">*</span></label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_pregnant"
                                            id="{{ $section_prefix ?? '' }}is_pregnant_yes" value="1"
                                            {{ (isset($applicant->healthData->is_pregnant) && $applicant->healthData->is_pregnant == 1) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="{{ $section_prefix ?? '' }}is_pregnant_yes">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_pregnant"
                                            id="{{ $section_prefix ?? '' }}is_pregnant_no" value="0"
                                            {{ (isset($applicant->healthData->is_pregnant) && $applicant->healthData->is_pregnant == 0) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="{{ $section_prefix ?? '' }}is_pregnant_no">Tidak</label>
                                    </div>
                                </div>
                                <div class="error-message"></div>
                                <div id="{{ $section_prefix ?? '' }}pregnancy_week_container" class="mt-2"
                                    style="display: {{ (isset($applicant->healthData->is_pregnant) && $applicant->healthData->is_pregnant == 1) ? 'block' : 'none' }};">
                                    <label for="{{ $section_prefix ?? '' }}pregnancy_week" class="form-label">Berapa
                                        lama Anda mengandung (dalam minggu):</label>
                                    <input type="number" class="form-control"
                                        id="{{ $section_prefix ?? '' }}pregnancy_week" name="pregnancy_week"
                                        value="{{ $applicant->healthData->pregnancy_week ?? '' }}">
                                    <div class="error-message"></div>
                                </div>
                            </div>

                            <hr>

                            {{-- Signature and Date --}}
                            <div class="row mt-4">
                                <div class="col-md-6 mb-3">
                                    <label for="{{ $section_prefix ?? '' }}signature_image" class="form-label">Tanda
                                        Tangan (unggah gambar) <span class="required">*</span></label>
                                    <input type="file" class="form-control"
                                        id="{{ $section_prefix ?? '' }}signature_image" name="signature_image"
                                        accept="image/*" required>
                                    <div class="error-message"></div>
                                    @if (isset($applicant->healthData->signature_path))
                                        <small class="form-text text-muted">File saat ini: <a
                                                href="{{ asset('storage/' . $applicant->healthData->signature_path) }}"
                                                target="_blank">Lihat Tanda Tangan</a></small>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="{{ $section_prefix ?? '' }}declaration_date" class="form-label">Tanggal
                                        <span class="required">*</span></label>
                                    <input type="date" class="form-control"
                                        id="{{ $section_prefix ?? '' }}declaration_date" name="declaration_date"
                                        value="{{ $applicant->declaration_date ?? '' }}" required>
                                    <div class="error-message"></div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                        data-section="health_declaration" data-prefix="{{ $section_prefix ?? '' }}">
                                        <i class="fas fa-save me-2"></i>Simpan Pernyataan Kesehatan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> {{-- End of card-body --}}
                </div> {{-- End of main collapse for Formulir Pernyataan Kesehatan --}}
            </div> {{-- End of card --}}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sectionPrefix = '{{ $section_prefix ?? '' }}';

        // --- Logic for Main Card Header Toggle (Formulir Pernyataan Kesehatan) ---
        const mainCardHeaderHealthDeclaration = document.querySelector(
            `#${sectionPrefix}HealthDeclarationMainCollapse`).previousElementSibling; // Get the header
        const mainCollapseHealthDeclaration = document.getElementById(
            `${sectionPrefix}HealthDeclarationMainCollapse`);
        const mainCollapseIconHealthDeclaration = mainCardHeaderHealthDeclaration.querySelector(
            '.collapse-icon');

        if (mainCardHeaderHealthDeclaration && mainCollapseHealthDeclaration && mainCollapseIconHealthDeclaration) {
            mainCollapseHealthDeclaration.addEventListener('show.bs.collapse', function() {
                mainCardHeaderHealthDeclaration.classList.add('active');
                mainCollapseIconHealthDeclaration.classList.remove('fa-chevron-down');
                mainCollapseIconHealthDeclaration.classList.add('fa-chevron-up');
            });

            mainCollapseHealthDeclaration.addEventListener('hide.bs.collapse', function() {
                mainCardHeaderHealthDeclaration.classList.remove('active');
                mainCollapseIconHealthDeclaration.classList.remove('fa-chevron-up');
                mainCollapseIconHealthDeclaration.classList.add('fa-chevron-down');
            });

            // Initial state for main card header
            if (mainCollapseHealthDeclaration.classList.contains('show')) {
                mainCardHeaderHealthDeclaration.classList.add('active');
                mainCollapseIconHealthDeclaration.classList.remove('fa-chevron-down');
                mainCollapseIconHealthDeclaration.classList.add('fa-chevron-up');
            } else {
                mainCardHeaderHealthDeclaration.classList.remove('active');
                mainCollapseIconHealthDeclaration.classList.remove('fa-chevron-up');
                mainCollapseIconHealthDeclaration.classList.add('fa-chevron-down');
            }
        }

        // --- Health Questions Logic (Show/Hide Explanation) ---
        const healthQuestions = [
            'has_medical_condition',
            'resigned_due_to_health',
            'failed_pre_employment_exam',
            'undergoing_treatment_or_surgery',
            'under_medical_supervision',
            'on_regular_medication',
            'has_allergies',
            'absent_due_to_health_12_months',
            'had_accident',
        ];

        healthQuestions.forEach(field => {
            const yesRadio = document.getElementById(`${sectionPrefix}${field}_yes`);
            const noRadio = document.getElementById(`${sectionPrefix}${field}_no`);
            const explanationContainer = document.getElementById(
                `${sectionPrefix}${field}_explanation_container`);
            const explanationField = document.getElementById(`${sectionPrefix}${field}_explanation`);

            if (yesRadio && noRadio && explanationContainer && explanationField) {
                const toggleExplanation = () => {
                    if (yesRadio.checked) {
                        explanationContainer.style.display = 'block';
                        explanationField.setAttribute('required', 'required');
                    } else {
                        explanationContainer.style.display = 'none';
                        explanationField.removeAttribute('required');
                        explanationField.value = ''; // Clear explanation if "No" is selected
                    }
                };

                yesRadio.addEventListener('change', toggleExplanation);
                noRadio.addEventListener('change', toggleExplanation);

                // Initial state
                toggleExplanation();
            }
        });

        // --- Pregnancy Question Logic (Show/Hide Pregnancy Week) ---
        const isPregnantYes = document.getElementById(`${sectionPrefix}is_pregnant_yes`);
        const isPregnantNo = document.getElementById(`${sectionPrefix}is_pregnant_no`);
        const pregnancyWeekContainer = document.getElementById(`${sectionPrefix}pregnancy_week_container`);
        const pregnancyWeekField = document.getElementById(`${sectionPrefix}pregnancy_week`);

        if (isPregnantYes && isPregnantNo && pregnancyWeekContainer && pregnancyWeekField) {
            const togglePregnancyWeek = () => {
                if (isPregnantYes.checked) {
                    pregnancyWeekContainer.style.display = 'block';
                    pregnancyWeekField.setAttribute('required', 'required');
                } else {
                    pregnancyWeekContainer.style.display = 'none';
                    pregnancyWeekField.removeAttribute('required');
                    pregnancyWeekField.value = ''; // Clear value if "No" is selected
                }
            };

            isPregnantYes.addEventListener('change', togglePregnancyWeek);
            isPregnantNo.addEventListener('change', togglePregnancyWeek);

            // Initial state
            togglePregnancyWeek();
        }
    });
</script>