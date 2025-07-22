<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Tulisan atau Karya Ilmiah --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}PublicationMainCollapse"
                    aria-expanded="false" style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-book-open me-2"></i>Tulisan atau Karya Ilmiah<span class="required">*</span>
                    </h5>
                    <i class="fas fa-chevron-up collapse-icon"></i>
                </div>

                {{-- Main Card Body for Tulisan atau Karya Ilmiah --}}
                <div class="collapse" id="{{ $section_prefix ?? '' }}PublicationMainCollapse">
                    <div class="card-body">
                        <div class="accordion" id="{{ $section_prefix ?? '' }}accordionPublication">

                            {{-- Publications/Scientific Works --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $section_prefix ?? '' }}headingPublication">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#{{ $section_prefix ?? '' }}collapsePublication"
                                        aria-expanded="false"
                                        aria-controls="{{ $section_prefix ?? '' }}collapsePublication">
                                        Daftar Karya Tulis/Ilmiah
                                    </button>
                                </h2>
                                <div id="{{ $section_prefix ?? '' }}collapsePublication"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="{{ $section_prefix ?? '' }}headingPublication"
                                    data-bs-parent="#{{ $section_prefix ?? '' }}accordionPublication">
                                    <div class="accordion-body">
                                        <form id="{{ $section_prefix ?? '' }}formPublication" method="POST">
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="{{ $section_prefix ?? '' }}no_publication_checkbox">
                                                <label class="form-check-label" for="{{ $section_prefix ?? '' }}no_publication_checkbox">Saya tidak memiliki Karya Tulis/Karya Ilmiah</label>
                                            </div>

                                            <div id="{{ $section_prefix ?? '' }}publication-container">
                                                {{-- Dynamic publication fields will be added here by JS --}}
                                            </div>
                                            <button type="button" class="btn btn-info btn-sm mt-2"
                                                id="{{ $section_prefix ?? '' }}add-publication">Tambah Karya</button>

                                            <div class="row mt-4">
                                                <div class="col-md-12 text-end">
                                                    <button type="submit" class="btn btn-primary px-4 save-section-btn"
                                                        data-section="publication"
                                                        data-prefix="{{ $section_prefix ?? '' }}">
                                                        <i class="fas fa-save me-2"></i>Simpan Karya Ilmiah
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- End of accordionPublication --}}
                    </div> {{-- End of card-body --}}
                </div> {{-- End of main collapse for Tulisan atau Karya Ilmiah --}}
            </div> {{-- End of card --}}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Assume $section_prefix is passed from a server-side template (like Blade in Laravel).
        // If not using a server-side template, you might define it as a fixed string, e.g., const sectionPrefix = 'app_';
        const sectionPrefix = '{{ $section_prefix ?? '' }}';

        // --- Logic for Main Card Header Toggle (Tulisan atau Karya Ilmiah) ---
        const mainCardHeaderPublication = document.querySelector(
                `#${sectionPrefix}PublicationMainCollapse`)
            .previousElementSibling; // Get the header
        const mainCollapsePublication = document.getElementById(
            `${sectionPrefix}PublicationMainCollapse`);
        const mainCollapseIconPublication = mainCardHeaderPublication.querySelector('.collapse-icon');

        if (mainCardHeaderPublication && mainCollapsePublication && mainCollapseIconPublication) {
            mainCollapsePublication.addEventListener('show.bs.collapse', function() {
                mainCardHeaderPublication.classList.add('active');
                mainCollapseIconPublication.classList.remove('fa-chevron-down');
                mainCollapseIconPublication.classList.add('fa-chevron-up');
            });

            mainCollapsePublication.addEventListener('hide.bs.collapse', function() {
                mainCardHeaderPublication.classList.remove('active');
                mainCollapseIconPublication.classList.remove('fa-chevron-up');
                mainCollapseIconPublication.classList.add('fa-chevron-down');
            });

            // Initial state for main card header
            if (mainCollapsePublication.classList.contains('show')) {
                mainCardHeaderPublication.classList.add('active');
                mainCollapseIconPublication.classList.remove('fa-chevron-down');
                mainCollapseIconPublication.classList.add('fa-chevron-up');
            } else {
                mainCardHeaderPublication.classList.remove('active');
                mainCollapseIconPublication.classList.remove('fa-chevron-up');
                mainCollapseIconPublication.classList.add('fa-chevron-down');
            }
        }

        // --- Dynamic Fields for Publications/Scientific Works ---
        // Assuming $applicant->publications holds existing data. If not, this will be an empty array.
        const existingPublicationData = @json($applicant->publications ?? []);
        let publicationCount = existingPublicationData.length;
        const publicationContainer = document.getElementById(
            `${sectionPrefix}publication-container`);
        const addPublicationButton = document.getElementById(`${sectionPrefix}add-publication`);
        const noPublicationCheckbox = document.getElementById(`${sectionPrefix}no_publication_checkbox`);

        // Helper function to add a new publication field
        function addPublicationField(prefix, index, data = {}) {
            const publication_title = data.publication_title || '';
            const publication_type = data.publication_type || '';

            const publicationHtml = `
                <div class="publication-item border p-3 mb-3 rounded" id="${prefix}publication-${index}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}publication_title_${index}" class="form-label">Publication Title <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}publication_title_${index}" name="publications[${index}][publication_title]" value="${publication_title}" required>
                            <div class="error-message"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}publication_type_${index}" class="form-label">Publication Type <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}publication_type_${index}" name="publications[${index}][publication_type]" value="${publication_type}" required>
                            <div class="error-message"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-publication mt-2" data-target-id="${prefix}publication-${index}">Hapus</button>
                </div>
            `;
            if (publicationContainer) {
                publicationContainer.insertAdjacentHTML('beforeend', publicationHtml);
                // After adding, immediately apply the required state based on the checkbox
                togglePublicationFieldsRequired();
            }
        }

        // Function to toggle required attribute and clear/restore values for publications
        function togglePublicationFieldsRequired() {
            // Select all input fields that are part of the dynamic publications list
            const publicationFields = publicationContainer.querySelectorAll('input[name^="publications"]');
            const isChecked = noPublicationCheckbox.checked;

            publicationFields.forEach(field => {
                if (isChecked) {
                    field.removeAttribute('required');
                    field.dataset.originalRequired = 'true'; // Store original required state for potential restoration
                    field.classList.remove('is-invalid'); // Remove validation styling
                    const errorMessageElement = field.parentElement.querySelector('.error-message');
                    if (errorMessageElement) {
                         errorMessageElement.style.display = 'none'; // Hide error messages
                    }
                } else {
                    // Only set required if it was originally required (or if no original state was stored, assume required)
                    if (field.dataset.originalRequired === 'true' || field.hasAttribute('required')) {
                        field.setAttribute('required', 'required');
                    }
                    // No need to delete data-originalRequired here, it's a marker.
                }
            });

            // Toggle "Tambah Karya" button and visibility of dynamic fields container
            if (isChecked) {
                addPublicationButton.style.display = 'none';
                publicationContainer.style.display = 'none';
                // Clear all input values in the container when checkbox is checked
                publicationContainer.querySelectorAll('input[name^="publications"]').forEach(input => input.value = '');
            } else {
                addPublicationButton.style.display = 'inline-block';
                publicationContainer.style.display = 'block';
                // If there are no fields and checkbox is unchecked, add one empty field by default
                if (publicationContainer.children.length === 0) {
                    addPublicationField(sectionPrefix, 0);
                    publicationCount = 1;
                }
            }
        }

        // --- Initialization on page load ---
        if (existingPublicationData && existingPublicationData.length > 0) {
            // If existing data is found, render it and ensure checkbox is unchecked
            existingPublicationData.forEach((data, index) => {
                addPublicationField(sectionPrefix, index, data);
            });
            noPublicationCheckbox.checked = false;
        } else {
            // If no existing data, add one empty field by default (if you want one initially)
            addPublicationField(sectionPrefix, 0);
            publicationCount = 1;
            noPublicationCheckbox.checked = false; // Ensure checkbox is unchecked by default if fields are shown
        }
        // Apply initial state for field requirements and visibility
        togglePublicationFieldsRequired();

        // --- Event Listeners ---
        // Listener for the "Saya tidak memiliki Karya Tulis/Karya Ilmiah" checkbox
        if (noPublicationCheckbox) {
            noPublicationCheckbox.addEventListener('change', togglePublicationFieldsRequired);
        }

        // Listener for the "Tambah Karya" button
        if (addPublicationButton) {
            addPublicationButton.addEventListener('click', function() {
                addPublicationField(sectionPrefix, publicationCount);
                publicationCount++;
            });
        }

        // Listener for "Hapus" buttons on dynamic publication fields (event delegation)
        if (publicationContainer) {
            publicationContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-publication')) {
                    const targetId = e.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                        // If all items are removed after deletion and the checkbox is NOT checked,
                        // add one empty field back to ensure there's always at least one editable field.
                        if (publicationContainer.children.length === 0 && !noPublicationCheckbox.checked) {
                            addPublicationField(sectionPrefix, 0);
                            publicationCount = 1; // Reset count for new additions
                        }
                    }
                }
            });
        }


        // --- Validation and Submission Logic for this specific section ---
        // This 'save-section-btn' targets the publication form
        const saveButton = document.querySelector(`[data-section="publication"][data-prefix="${sectionPrefix}"]`);

        if (saveButton) {
            saveButton.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default form submission

                const formElement = document.getElementById(`${sectionPrefix}formPublication`);
                const sectionElement = document.querySelector(`#${sectionPrefix}collapsePublication`);
                let isValid = true; // Assume valid initially

                // Reset error messages and invalid class for this section's fields
                sectionElement.querySelectorAll('.error-message').forEach(msg => {
                    msg.style.display = 'none';
                });
                sectionElement.querySelectorAll('.form-control, .form-select').forEach(input => {
                    input.classList.remove('is-invalid');
                });

                const noPublicationCheckboxForSection = document.getElementById(`${sectionPrefix}no_publication_checkbox`);

                if (noPublicationCheckboxForSection && noPublicationCheckboxForSection.checked) {
                    // If the checkbox is checked, no fields are required, so the section is valid.
                    isValid = true;
                } else {
                    // If the checkbox is NOT checked, then publication fields ARE required.
                    const publicationItems = sectionElement.querySelectorAll('.publication-item');
                    if (publicationItems.length === 0) {
                        isValid = false; // No items, and checkbox not checked
                        alert('Mohon tambahkan setidaknya satu Karya Tulis/Karya Ilmiah atau centang "Saya tidak memiliki Karya Tulis/Karya Ilmiah".');
                    } else {
                        // Validate each dynamically added publication item
                        publicationItems.forEach((item, idx) => {
                            const titleField = item.querySelector(`[name="publications[${idx}][publication_title]"]`);
                            const typeField = item.querySelector(`[name="publications[${idx}][publication_type]"]`);

                            const fieldsToCheck = [
                                { field: titleField, msg: 'Publication Title harus diisi' },
                                { field: typeField, msg: 'Publication Type harus diisi' }
                            ];

                            fieldsToCheck.forEach(f => {
                                if (f.field && !f.field.value.trim()) {
                                    f.field.classList.add('is-invalid');
                                    const errorMsg = f.field.parentElement.querySelector('.error-message');
                                    if (errorMsg) {
                                        errorMsg.textContent = f.msg;
                                        errorMsg.style.display = 'block';
                                    }
                                    isValid = false; // Mark overall validation as failed
                                }
                            });
                        });
                    }
                }

                // If validation passes, prepare and send data via AJAX
                if (isValid) {
                    const formData = new FormData(formElement);
                    const allFormData = {};

                    // Manually collect data from all form fields
                    formData.forEach((value, key) => {
                        const match = key.match(/(\w+)\[(\d+)\]\[(\w+)\]/); // For array inputs like publications[0][title]
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
                            allFormData[key] = value; // For single fields (like the checkbox value if you want to send it)
                        }
                    });

                    // Crucially, if the "no publication" checkbox is checked,
                    // ensure the 'publications' array is explicitly empty in the data sent.
                    if (noPublicationCheckboxForSection && noPublicationCheckboxForSection.checked) {
                        allFormData['publications'] = [];
                    }

                    // Send data using Fetch API
                    fetch(formElement.action, { // formElement.action should be set to your backend endpoint
                        method: 'POST', // Or PATCH/PUT for updates
                        headers: {
                            'Content-Type': 'application/json',
                            // IMPORTANT: Include CSRF token for security in web applications (e.g., Laravel)
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(allFormData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.redirect) {
                            // If backend sends a redirect URL
                            window.location.href = data.redirect;
                        } else {
                            // Otherwise, show an alert message from the backend
                            alert(data.message);
                            // You might want to refresh part of the page or update UI here
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
                    });
                }
            });
        }
    });
</script>