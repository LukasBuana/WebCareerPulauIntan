<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Pengalaman Kursus dan Training --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}TrainingCourseMainCollapse" aria-expanded="false"
                    style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-chalkboard-teacher me-2"></i>Pengalaman Kursus dan Training<span
                            class="required">*</span>
                    </h5>
                    {{-- Initial state: down for collapsed. Will be updated by JS --}}
                    <i class="fas fa-chevron-down collapse-icon"></i>
                </div>

                {{-- Main Card Body for Pengalaman Kursus dan Training --}}
                <div class="collapse" id="{{ $section_prefix ?? '' }}TrainingCourseMainCollapse">
                    <div class="card-body">
                        <div class="accordion" id="{{ $section_prefix ?? '' }}accordionTrainingCourse">

                            {{-- Training and Course Experience --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingTrainingCourse">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapseTrainingCourse"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapseTrainingCourse">
                                        Daftar Kursus/Training
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapseTrainingCourse"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingTrainingCourse"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionTrainingCourse">
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formTrainingCourse" method="POST">
                                            <div id="{{ $section_prefix ?? '' }}training-course-container">
                                                {{-- Dynamic training/course fields will be added here by JS --}}
                                            </div>
                                            <button type="button" class="btn btn-info btn-sm mt-2"
                                                id="{{ $section_prefix ?? '' }}add-training-course">Tambah
                                                Kursus/Training</button>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="training_courses"
                                                        data-prefix="{{ $section_prefix ?? '' }}">
                                                        <i class="fas fa-save me-2"></i>Simpan Kursus dan Training
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- End of accordionTrainingCourse --}}
                    </div> {{-- End of card-body --}}
                </div> {{-- End of main collapse for Pengalaman Kursus dan Training --}}
            </div> {{-- End of card --}}
        </div>
    </div>
</div>


<script>
        console.log('--- data_kursus.blade.php SCRIPT LOADING ---'); // New log

    document.addEventListener('DOMContentLoaded', function() {
        const sectionPrefix = '{{ $section_prefix ?? '' }}';
        // Helper function to handle main card header collapse icons
        function setupMainCollapseIcon(headerElement, collapseElement, iconElement) {
            if (headerElement && collapseElement && iconElement) {
                collapseElement.addEventListener('show.bs.collapse', function() {
                    headerElement.classList.add('active');
                    iconElement.classList.remove('fa-chevron-down');
                    iconElement.classList.add('fa-chevron-up');
                });

                collapseElement.addEventListener('hide.bs.collapse', function() {
                    headerElement.classList.remove('active');
                    iconElement.classList.remove('fa-chevron-up');
                    iconElement.classList.add('fa-chevron-down');
                });

                // Initial state
                if (collapseElement.classList.contains('show')) {
                    headerElement.classList.add('active');
                    iconElement.classList.remove('fa-chevron-down');
                    iconElement.classList.add('fa-chevron-up');
                } else {
                    headerElement.classList.remove('active');
                    iconElement.classList.remove('fa-chevron-up');
                    iconElement.classList.add('fa-chevron-down');
                }
            }
        }

        // Setup for Pengalaman Kursus dan Training main collapse
        const mainCardHeaderTrainingCourse = document.querySelector(
            `#${sectionPrefix}TrainingCourseMainCollapse`).previousElementSibling;
        const mainCollapseTrainingCourse = document.getElementById(
        `${sectionPrefix}TrainingCourseMainCollapse`);
        const mainCollapseIconTrainingCourse = mainCardHeaderTrainingCourse.querySelector('.collapse-icon');
        setupMainCollapseIcon(mainCardHeaderTrainingCourse, mainCollapseTrainingCourse,
            mainCollapseIconTrainingCourse);

        // --- Dynamic Fields for Training and Course History ---
        // Assuming $applicant->trainingCourses holds existing data. If not, it will be an empty array.
        const existingTrainingCourseData = @json($applicant->trainingCourses ?? []);
        let trainingCourseCount = 0;
        const trainingCourseContainer = document.getElementById(`${sectionPrefix}training-course-container`);
        const addTrainingCourseButton = document.getElementById(`${sectionPrefix}add-training-course`);

        function addTrainingCourseField(prefix, index, data = {}) {
            const id = data.id || '';
            const training_course_name = data.training_course_name || '';
            const year = data.year || '';
            const held_by = data.held_by || '';
            const grade = data.grade || '';

            const trainingCourseHtml = `
                <div class="training-course-item border p-3 mb-3 rounded" id="${prefix}training-course-${index}">
                                    <input type="hidden" name="training_courses[${index}][id]" value="${id}"> 

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}training_course_name_${index}" class="form-label">Nama Training <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}training_course_name_${index}" name="training_courses[${index}][training_course_name]" value="${training_course_name}" required>
                            <div class="error-message text-danger small mt-1"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}year_${index}" class="form-label">Tahun <span class="required">*</span></label>
                            <input type="number" class="form-control" id="${prefix}year_${index}" name="training_courses[${index}][year]" placeholder="YYYY" min="1900" max="2100" value="${year}" required>
                            <div class="error-message text-danger small mt-1"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}held_by_${index}" class="form-label">Penyelenggara <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}held_by_${index}" name="training_courses[${index}][held_by]" value="${held_by}" required>
                            <div class="error-message text-danger small mt-1"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}grade_${index}" class="form-label">Peringkat <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}grade_${index}" name="training_courses[${index}][grade]" value="${grade}" placeholder="Contoh: Terbaik / A / Lulus" required>
                            <div class="error-message text-danger small mt-1"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-training-course mt-2" data-target-id="${prefix}training-course-${index}">Hapus</button>
                </div>
            `;
            if (trainingCourseContainer) {
                trainingCourseContainer.insertAdjacentHTML('beforeend', trainingCourseHtml);
            }
        }

        // Load existing training and course data when the page loads
        if (existingTrainingCourseData && existingTrainingCourseData.length > 0) {
            existingTrainingCourseData.forEach((data, index) => {
                addTrainingCourseField(sectionPrefix, index, data);
            });
            trainingCourseCount = existingTrainingCourseData.length;
        }

        // Event listener for "Tambah Kursus/Training" button
        if (addTrainingCourseButton) {
            addTrainingCourseButton.addEventListener('click', function() {
                addTrainingCourseField(sectionPrefix, trainingCourseCount);
                trainingCourseCount++;
            });
        }

        // Event listener for "Hapus" button on dynamic training/course fields
        if (trainingCourseContainer) {
            trainingCourseContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-training-course')) {
                    const targetId = e.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                    }
                }
            });
        }

        // --- Validation Logic for Saving Sections ---
       
    });
</script>
