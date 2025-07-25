<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- Main Card Header for Tulisan atau Karya Ilmiah --}}
                <div class="card-header d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#{{ $section_prefix ?? '' }}PublicationMainCollapse"
                    aria-expanded="false" style="cursor: pointer;">
                    <h5 class="mb-0">
                        <i class="fas fa-book-open me-2"></i>Tulisan atau Karya Ilmiah<span class="required"id="{{ $section_prefix ?? '' }}publicationRequiredAsterisk">*</span>
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
                                                        data-section="publications"
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
        const sectionPrefix = '{{ $section_prefix ?? '' }}';
        const publicationContainer = document.getElementById(`${sectionPrefix}publication-container`);
        const addPublicationButton = document.getElementById(`${sectionPrefix}add-publication`);
        const noPublicationCheckbox = document.getElementById(`${sectionPrefix}no_publication_checkbox`);
        const asteriskElement = document.getElementById(`${sectionPrefix}publicationRequiredAsterisk`);

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

        function validateField(field) {
            const errorMessageElement = field.parentElement.querySelector('.error-message');
            if (!field.checkValidity()) {
                field.classList.add('is-invalid');
                if (errorMessageElement) {
                    errorMessageElement.textContent = field.validationMessage;
                    errorMessageElement.style.display = 'block';
                }
            } else {
                field.classList.remove('is-invalid');
                if (errorMessageElement) {
                    errorMessageElement.textContent = '';
                    errorMessageElement.style.display = 'none';
                }
            }
            checkAndTogglePublicationRequiredAsterisk(); // Re-check asterisk on field validation
        }

        function checkAndTogglePublicationRequiredAsterisk() {
            if (!asteriskElement) return;

            const isCheckboxChecked = noPublicationCheckbox.checked;
            let isPublicationSectionComplete = false;

            if (isCheckboxChecked) {
                isPublicationSectionComplete = true; // If checkbox is checked, section is considered complete
            } else {
                const publicationItems = publicationContainer.querySelectorAll('.publication-item');
                if (publicationItems.length > 0) {
                    let allItemsValid = true;
                    for (const item of publicationItems) {
                        const requiredInputsInItem = item.querySelectorAll('input[required], select[required], textarea[required]');
                        for (const input of requiredInputsInItem) {
                            if (!input.checkValidity()) {
                                allItemsValid = false;
                                break;
                            }
                        }
                        if (!allItemsValid) break;
                    }
                    isPublicationSectionComplete = allItemsValid;
                } else {
                    isPublicationSectionComplete = false; // No items, and checkbox not checked
                }
            }

            if (isPublicationSectionComplete) {
                asteriskElement.style.display = 'none';
            } else {
                asteriskElement.style.display = 'inline';
            }
        }

        let publicationCount = 0; // Initialize publicationCount

        // Helper function to add a new publication field
        function addPublicationField(prefix, index, data = {}) {
            const id = data.id || '';
            const publication_title = data.publication_title || '';
            const publication_type = data.publication_type || '';

            const publicationHtml = `
                <div class="publication-item border p-3 mb-3 rounded" id="${prefix}publication-${index}">
                    <input type="hidden" name="publications[${index}][id]" value="${id}"> 

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}publication_title_${index}" class="form-label">Publication Title <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}publication_title_${index}" name="publications[${index}][publication_title]" value="${publication_title}" required>
                            <div class="error-message text-danger small"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="${prefix}publication_type_${index}" class="form-label">Publication Type <span class="required">*</span></label>
                            <input type="text" class="form-control" id="${prefix}publication_type_${index}" name="publications[${index}][publication_type]" value="${publication_type}" required>
                            <div class="error-message text-danger small"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-publication mt-2" data-target-id="${prefix}publication-${index}">Hapus</button>
                </div>
            `;
            if (publicationContainer) {
                publicationContainer.insertAdjacentHTML('beforeend', publicationHtml);
                // Bind validation to newly added fields
                const newFields = document.querySelectorAll(`#${prefix}publication-${index} input, #${prefix}publication-${index} select, #${prefix}publication-${index} textarea`);
                newFields.forEach(field => {
                    field.addEventListener('input', () => validateField(field));
                    field.addEventListener('change', () => validateField(field));
                });
                checkAndTogglePublicationRequiredAsterisk();
            }
        }

        function togglePublicationFieldsRequired() {
            const isChecked = noPublicationCheckbox.checked;

            localStorage.setItem(`${sectionPrefix}noPublicationChecked`, isChecked);

            const publicationFields = publicationContainer.querySelectorAll('input[name^="publications"], select[name^="publications"], textarea[name^="publications"]');

            if (isChecked) {
                addPublicationButton.style.display = 'none';
                publicationContainer.style.display = 'none';

                publicationFields.forEach(field => {
                    if (field.hasAttribute('required')) {
                        field.dataset.originalRequired = 'true';
                        field.removeAttribute('required');
                    }
                    field.classList.remove('is-invalid');
                    const errorMessageElement = field.parentElement.querySelector('.error-message');
                    if (errorMessageElement) {
                        errorMessageElement.style.display = 'none';
                    }
                    if (field.type !== 'hidden') {
                        field.value = '';
                    }
                });
                // Clear existing dynamic fields
                while (publicationContainer.firstChild) {
                    publicationContainer.removeChild(publicationContainer.firstChild);
                }
                publicationCount = 0; // Reset count when clearing
            } else {
                addPublicationButton.style.display = 'inline-block';
                publicationContainer.style.display = 'block';

                if (publicationContainer.children.length === 0) {
                    addPublicationField(sectionPrefix, 0);
                    publicationCount = 1;
                } else {
                    publicationFields.forEach(field => {
                        if (field.dataset.originalRequired === 'true') {
                            field.setAttribute('required', 'required');
                            delete field.dataset.originalRequired;
                        }
                    });
                }
            }
            checkAndTogglePublicationRequiredAsterisk();
        }

        // --- Initialization on page load ---
        const existingPublicationData = @json($applicant->publications ?? []);

        if (existingPublicationData && existingPublicationData.length > 0) {
            // If existing data is found, render it and ensure checkbox is unchecked
            existingPublicationData.forEach((data, index) => {
                addPublicationField(sectionPrefix, index, data);
            });
            publicationCount = existingPublicationData.length;
            noPublicationCheckbox.checked = false;
        } else {
            // If no existing data, check the checkbox and hide the fields
            noPublicationCheckbox.checked = true;
            publicationCount = 0; // Ensure count is 0 if no publications
        }

        // Apply initial state for field requirements and visibility based on the checkbox's initial state
        togglePublicationFieldsRequired();

        // --- Event Listeners ---
        if (noPublicationCheckbox) {
            noPublicationCheckbox.addEventListener('change', togglePublicationFieldsRequired);
        }

        if (addPublicationButton) {
            addPublicationButton.addEventListener('click', function() {
                addPublicationField(sectionPrefix, publicationCount);
                publicationCount++;
            });
        }

        if (publicationContainer) {
            publicationContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-publication')) {
                    const targetId = e.target.dataset.targetId;
                    const elementToRemove = document.getElementById(targetId);
                    if (elementToRemove) {
                        elementToRemove.remove();
                        // Re-index remaining fields to maintain correct array indexing
                        Array.from(publicationContainer.children).forEach((item, idx) => {
                            item.id = `${sectionPrefix}publication-${idx}`;
                            item.querySelector('input[type="hidden"]').name = `publications[${idx}][id]`;
                            item.querySelector(`label[for^="${sectionPrefix}publication_title_"]`).setAttribute('for', `${sectionPrefix}publication_title_${idx}`);
                            item.querySelector(`input[name^="publications["][name$="[publication_title]"]`).name = `publications[${idx}][publication_title]`;
                            item.querySelector(`input[name^="publications["][name$="[publication_title]"]`).id = `${sectionPrefix}publication_title_${idx}`;
                            item.querySelector(`label[for^="${sectionPrefix}publication_type_"]`).setAttribute('for', `${sectionPrefix}publication_type_${idx}`);
                            item.querySelector(`input[name^="publications["][name$="[publication_type]"]`).name = `publications[${idx}][publication_type]`;
                            item.querySelector(`input[name^="publications["][name$="[publication_type]"]`).id = `${sectionPrefix}publication_type_${idx}`;
                            item.querySelector('.remove-publication').dataset.targetId = `${sectionPrefix}publication-${idx}`;
                        });
                        publicationCount = publicationContainer.children.length; // Update count after removal

                        if (publicationContainer.children.length === 0 && !noPublicationCheckbox.checked) {
                            addPublicationField(sectionPrefix, 0);
                            publicationCount = 1;
                        }
                        checkAndTogglePublicationRequiredAsterisk(); // Update asterisk after removal
                    }
                }
            });
        }


    });
</script>