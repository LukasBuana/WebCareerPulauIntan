<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Pengalaman Kursus dan Training --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}TrainingCourseMainCollapse"
                    aria-expanded="false" style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-chalkboard-teacher me-2"></i>Pengalaman Kursus dan Training<span class="required">*</span>
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
                                                id="{{ $section_prefix ?? '' }}add-training-course">Tambah Kursus/Training</button>
                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="training_course"
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
        const mainCardHeaderTrainingCourse = document.querySelector(`#${sectionPrefix}TrainingCourseMainCollapse`).previousElementSibling;
        const mainCollapseTrainingCourse = document.getElementById(`${sectionPrefix}TrainingCourseMainCollapse`);
        const mainCollapseIconTrainingCourse = mainCardHeaderTrainingCourse.querySelector('.collapse-icon');
        setupMainCollapseIcon(mainCardHeaderTrainingCourse, mainCollapseTrainingCourse, mainCollapseIconTrainingCourse);

        // --- Dynamic Fields for Training and Course History ---
        // Assuming $applicant->trainingCourses holds existing data. If not, it will be an empty array.
        const existingTrainingCourseData = @json($applicant->trainingCourses ?? []);
        let trainingCourseCount = 0;
        const trainingCourseContainer = document.getElementById(`${sectionPrefix}training-course-container`);
        const addTrainingCourseButton = document.getElementById(`${sectionPrefix}add-training-course`);

        function addTrainingCourseField(prefix, index, data = {}) {
            const training_name = data.training_name || '';
            const year = data.year || '';
            const organizer = data.organizer || '';
            const ranking = data.ranking || '';

            const trainingCourseHtml = `
                <div class="training-course-item border p-3 mb-3 rounded" id="${prefix}training-course-${index}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}training_name_${index}" class="form-label">Nama Training <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}training_name_${index}" name="training_courses[${index}][training_name]" value="${training_name}" required>
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
                            <label for="${prefix}organizer_${index}" class="form-label">Penyelenggara <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}organizer_${index}" name="training_courses[${index}][organizer]" value="${organizer}" required>
                            <div class="error-message text-danger small mt-1"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}ranking_${index}" class="form-label">Peringkat <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}ranking_${index}" name="training_courses[${index}][ranking]" value="${ranking}" placeholder="Contoh: Terbaik / A / Lulus" required>
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
        document.querySelectorAll('.save-section-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const sectionId = this.dataset.section;
                const prefix = this.dataset.prefix;
                let formElement;

                // Only handle 'training_course' section as per requirement
                if (sectionId === 'training_course') {
                    formElement = document.getElementById(`${prefix}formTrainingCourse`);
                } else {
                    console.error(`Attempted to save an unhandled section: ${sectionId}`);
                    return;
                }

                if (!formElement) {
                    console.error(`Form element not found for section: ${sectionId}`);
                    return;
                }

                let isValid = true;
                const itemsContainer = formElement.querySelector(`#${prefix}${sectionId.replace('_', '-')}-container`);
                if (!itemsContainer) {
                    console.error(`Items container not found for section: ${sectionId}`);
                    return;
                }

                // Reset error messages and invalid class for the specific section
                itemsContainer.querySelectorAll('.error-message').forEach(msg => {
                    msg.style.display = 'none';
                    msg.textContent = ''; // Clear previous messages
                });
                itemsContainer.querySelectorAll('.form-control, .form-select').forEach(input => {
                    input.classList.remove('is-invalid');
                });

                const currentSectionItems = itemsContainer.querySelectorAll('.training-course-item');
                const minItemsMessage = 'Mohon tambahkan setidaknya satu Pengalaman Kursus/Training.';

                if (currentSectionItems.length === 0) {
                    isValid = false;
                    alert(minItemsMessage);
                } else {
                    currentSectionItems.forEach((item, idx) => {
                        const fieldsToCheck = [
                            { field: item.querySelector(`[name="training_courses[${idx}][training_name]"]`), msg: 'Nama Training harus diisi.' },
                            { field: item.querySelector(`[name="training_courses[${idx}][year]"]`), msg: 'Tahun harus diisi dan 4 digit.' },
                            { field: item.querySelector(`[name="training_courses[${idx}][organizer]"]`), msg: 'Penyelenggara harus diisi.' },
                            { field: item.querySelector(`[name="training_courses[${idx}][ranking]"]`), msg: 'Peringkat harus diisi.' }
                        ];

                        fieldsToCheck.forEach(f => {
                            if (f.field) {
                                let hasError = false;
                                if (f.field.type === 'select-one' ? !f.field.value : !f.field.value.trim()) {
                                    hasError = true;
                                } else if (f.field.type === 'number' && (isNaN(parseInt(f.field.value)) || f.field.value.length !== 4)) {
                                    hasError = true;
                                }

                                if (hasError) {
                                    f.field.classList.add('is-invalid');
                                    const errorMsgElement = f.field.parentElement.querySelector('.error-message');
                                    if (errorMsgElement) {
                                        errorMsgElement.textContent = f.msg;
                                        errorMsgElement.style.display = 'block';
                                    }
                                    isValid = false;
                                }
                            }
                        });
                    });
                }

                if (isValid) {
                    const formData = new FormData(formElement);
                    const allFormData = {};
                    formData.forEach((value, key) => {
                        // This regex handles array inputs like training_courses[0][training_name]
                        const match = key.match(/(\w+)\[(\d+)\]\[(\w+)\]/);
                        if (match) {
                            const parentKey = match[1]; // e.g., 'training_courses'
                            const index = match[2]; // e.g., '0'
                            const fieldKey = match[3]; // e.g., 'training_name'

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

                    // Example AJAX call (replace with your actual endpoint and method)
                    // You'll need to configure the form's action attribute to your API endpoint
                    fetch(formElement.action, {
                        method: 'POST', // Or PATCH/PUT for updates
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Add CSRF token for Laravel
                        },
                        body: JSON.stringify(allFormData)
                    })
                    .then(response => {
                        if (!response.ok) {
                            // If response is not OK (e.g., 4xx or 5xx), parse JSON and throw error
                            return response.json().then(err => { throw err; });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.redirect) {
                            window.location.href = data.redirect;
                        } else {
                            alert(data.message || 'Data berhasil disimpan!');
                            // You might want to refresh the section or update UI here
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Display error messages from the backend if available
                        if (error.errors) {
                            let errorMessages = 'Terjadi kesalahan validasi:\n';
                            for (const field in error.errors) {
                                error.errors[field].forEach(msg => {
                                    errorMessages += `- ${msg}\n`;
                                });
                            }
                            alert(errorMessages);
                        } else {
                            alert('Terjadi kesalahan saat menyimpan data.');
                        }
                    });
                }
            });
        });
    });
</script>

