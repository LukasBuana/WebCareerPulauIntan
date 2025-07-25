<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Prestasi Kerja --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}AchievementMainCollapse" aria-expanded="false"
                    style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-trophy me-2"></i>Prestasi Kerja<span class="required">*</span>
                    </h5>
                    <i class="fas fa-chevron-up collapse-icon"></i>
                </div>

                {{-- Main Card Body for Prestasi Kerja --}}
                <div class="collapse" id="{{ $section_prefix ?? '' }}AchievementMainCollapse">
                    <div class="card-body">
                        <div class="accordion" id="{{ $section_prefix ?? '' }}accordionAchievement">

                            {{-- Achievement Entries --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header"
                                    id="{{ $section_prefix ?? '' }}headingAchievement">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseAchievement"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseAchievement">
                                        Daftar Prestasi Kerja
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseAchievement"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingAchievement"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionAchievement">
                                    <div class="accordion-body">
                                        {{-- Checkbox for "No Achievement" --}}
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                id="{{ $section_prefix ?? '' }}noAchievementCheckbox"
                                                name="no_achievement">
                                            <label class="form-check-label"
                                                for="{{ $section_prefix ?? '' }}noAchievementCheckbox">
                                                Saya tidak memiliki Prestasi Kerja
                                            </label>
                                        </div>

                                        {{-- This div contains the dynamic fields and the "Tambah Prestasi" button. It will be hidden/shown. --}}
                                        <div id="{{ $section_prefix ?? '' }}achievementFieldsContainer">
                                            <form id="{{ $section_prefix ?? '' }}formAchievement" method="POST">
                                                <div id="{{ $section_prefix ?? '' }}achievement-container">
                                                    {{-- Dynamic achievement fields will be added here by JS --}}
                                                </div>
                                                <button type="button" class="btn btn-info btn-sm mt-2"
                                                    id="{{ $section_prefix ?? '' }}add-achievement">Tambah
                                                    Prestasi</button>
                                            </form>
                                        </div> {{-- End of achievementFieldsContainer --}}

                                        {{-- Save button is now OUTSIDE achievementFieldsContainer but inside accordion-body --}}
                                        {{-- This ensures it's always visible when the accordion is open --}}
                                        <div class="col-md-12 text-end mt-4">
                                            <button type="submit"
                                                class="btn btn-primary px-4 save-section-btn"
                                                data-section="achievements"
                                                data-prefix="{{ $section_prefix ?? '' }}">
                                                <i class="fas fa-save me-2"></i>Simpan Prestasi Kerja
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- End of accordionAchievement --}}
                    </div> {{-- End of card-body --}}
                </div> {{-- End of main collapse for Prestasi Kerja --}}
            </div> {{-- End of card --}}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Logic for Main Card Header Toggle (Prestasi Kerja) ---
        const mainCardHeaderAchievement = document.querySelector(
                '#{{ $section_prefix ?? '' }}AchievementMainCollapse')
            .previousElementSibling; // Get the header
        const mainCollapseAchievement = document.getElementById(
            '{{ $section_prefix ?? '' }}AchievementMainCollapse');
        const mainCollapseIconAchievement = mainCardHeaderAchievement.querySelector('.collapse-icon');

        if (mainCardHeaderAchievement && mainCollapseAchievement && mainCollapseIconAchievement) {
            mainCollapseAchievement.addEventListener('show.bs.collapse', function() {
                mainCardHeaderAchievement.classList.add('active');
                mainCollapseIconAchievement.classList.remove('fa-chevron-down');
                mainCollapseIconAchievement.classList.add('fa-chevron-up');
            });

            mainCollapseAchievement.addEventListener('hide.bs.collapse', function() {
                mainCardHeaderAchievement.classList.remove('active');
                mainCollapseIconAchievement.classList.remove('fa-chevron-up');
                mainCollapseIconAchievement.classList.add('fa-chevron-down');
            });

            // Initial state for main card header
            if (mainCollapseAchievement.classList.contains('show')) {
                mainCardHeaderAchievement.classList.add('active');
                mainCollapseIconAchievement.classList.remove('fa-chevron-down');
                mainCollapseIconAchievement.classList.add('fa-chevron-up');
            } else {
                mainCardHeaderAchievement.classList.remove('active');
                mainCollapseIconAchievement.classList.remove('fa-chevron-up');
                mainCollapseIconAchievement.classList.add('fa-chevron-down');
            }
        }

        // --- Dynamic Fields for Prestasi Kerja ---
        const existingAchievementData = @json($applicant->achievements ?? []); // Sesuaikan dengan nama relasi di model Applicant
        let achievementCount = existingAchievementData.length;
        const achievementContainer = document.getElementById(
            '{{ $section_prefix ?? '' }}achievement-container');
        const addAchievementButton = document.getElementById(
            '{{ $section_prefix ?? '' }}add-achievement');
        const sectionPrefix = '{{ $section_prefix ?? '' }}';
        const noAchievementCheckbox = document.getElementById(
            '{{ $section_prefix ?? '' }}noAchievementCheckbox');
        const achievementFieldsContainer = document.getElementById(
            '{{ $section_prefix ?? '' }}achievementFieldsContainer'); // This now wraps only the dynamic fields and add button


        function addAchievementField(prefix, index, data = {}) {
            const id = data.id || '';
            const achievement_description = data.achievement_description || '';
            const year = data.year || '';

            const achievementHtml = `
                <div class="achievement-item border p-3 mb-3 rounded" id="${prefix}achievement-${index}">
                    <input type="hidden" name="achievements[${index}][id]" value="${id}">
                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="${prefix}achievement_description_${index}" class="form-label">Deskripsi Prestasi <span class="required">*</span></label>
                            <textarea class="form-control" id="${prefix}achievement_description_${index}" name="achievements[${index}][achievement_description]" rows="2" placeholder="Contoh: Membangun proyek baru, merintis usaha, dsb" required>${achievement_description}</textarea>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="${prefix}year_${index}" class="form-label">Tahun <span class="required">*</span></label>
                            <input type="number" class="form-control" id="${prefix}year_${index}" name="achievements[${index}][year]" value="${year}" placeholder="YYYY" min="1900" max="2100" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-achievement mt-2" data-target-id="${prefix}achievement-${index}">Hapus</button>
                </div>
            `;
            if (achievementContainer) {
                achievementContainer.insertAdjacentHTML('beforeend', achievementHtml);
            }
        }

        // Event listener for "Tambah Prestasi" button
        if (addAchievementButton) {
            addAchievementButton.addEventListener('click', function() {
                addAchievementField(sectionPrefix, achievementCount);
                achievementCount++;
                // Uncheck "no achievement" if a new field is added manually
                noAchievementCheckbox.checked = false;
                achievementFieldsContainer.style.display = 'block'; // Ensure the fields container is visible
            });
        }

        // Event listener for "Hapus" button on dynamic achievement fields
        if (achievementContainer) {
            achievementContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-achievement')) {
                    const targetId = e.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                        // Decrement count after removal
                        achievementCount--;
                        // If all fields are removed, check "no achievement" and hide the fields container
                        if (achievementCount === 0) {
                            noAchievementCheckbox.checked = true;
                            achievementFieldsContainer.style.display = 'none'; // Hide the fields container
                        }
                    }
                }
            });
        }

        // Logic for "Saya tidak memiliki Prestasi Kerja" checkbox
        if (noAchievementCheckbox && achievementFieldsContainer) {
            noAchievementCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    achievementFieldsContainer.style.display = 'none'; // Hide the fields container
                    // Clear existing fields if any when checkbox is checked
                    while (achievementContainer.firstChild) {
                        achievementContainer.removeChild(achievementContainer.firstChild);
                    }
                    achievementCount = 0; // Reset count
                } else {
                    achievementFieldsContainer.style.display = 'block'; // Show the fields container
                    // If unchecked and no fields exist, add one default field
                    if (achievementCount === 0) {
                        addAchievementField(sectionPrefix, achievementCount);
                        achievementCount++;
                    }
                }
            });

            // --- Initial state on page load ---
            // If there's existing data, load it and ensure checkbox is unchecked and fields are visible.
            if (existingAchievementData && existingAchievementData.length > 0) {
                existingAchievementData.forEach((data, index) => {
                    addAchievementField(sectionPrefix, index, data);
                });
                noAchievementCheckbox.checked = false;
                achievementFieldsContainer.style.display = 'block';
            } else {
                // If no existing data, ensure checkbox is checked and fields are hidden.
                noAchievementCheckbox.checked = true;
                achievementFieldsContainer.style.display = 'none';
            }
        }
    });
</script>