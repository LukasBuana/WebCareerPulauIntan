<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Pekerjaan - Pulau Intan Career</title>
    <style>
        /* CSS Global */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f8f9fa; }
        .jl-container { max-width: 1200px; margin: 0 auto; margin-top: 70px; padding: 20px; }

        /* --- Header Search Section --- */
        .jl-search-section { padding-top: 40px; margin-bottom: 20px; }
        .jl-search-container { display: flex; gap: 15px; align-items: center; background: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08); }
        .jl-search-input { flex: 1; border: none; outline: none; font-size: 16px; padding: 10px; background: transparent; }
        .jl-search-input::placeholder { color: #999; }
        .jl-search-icon { color: #999; font-size: 20px; }
        .jl-search-btn { background: #DA251C; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px; font-weight: 500; cursor: pointer; transition: background 0.3s; }
        .jl-search-btn:hover { background: #B11E18; }
        .jl-divider { width: 1px; height: 30px; background: #e0e0e0; }

        /* --- Main Content Grid (Sidebar + Listings) --- */
        .jl-main-grid { display: grid; grid-template-columns: 280px 1fr; gap: 30px; margin-top: 20px; }
        
        /* --- Filter Sidebar --- */
        .jl-filter-sidebar { background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08); padding: 20px; height: fit-content; position: sticky; top: 20px; }
        .jl-filter-group { margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px; }
        .jl-filter-group:last-of-type { border-bottom: none; padding-bottom: 0; margin-bottom: 0; }
        .jl-filter-group-header { display: flex; justify-content: space-between; align-items: center; cursor: pointer; padding: 10px 0; }
        .jl-filter-group-header strong { font-size: 16px; color: #333; }
        .jl-filter-group-header span { color: #999; font-size: 1.2em; }
        .jl-filter-options { display: none; padding-top: 10px; } /* Hidden by default */
        .jl-filter-options.show { display: block; } /* Shown when toggled */
        .jl-filter-options select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 10px; }
        .jl-filter-options .form-check { margin-bottom: 8px; }
        .jl-filter-options .form-check-input { margin-right: 8px; }
        .jl-filter-buttons { display: flex; justify-content: space-between; gap: 10px; margin-top: 20px; }
        .jl-filter-buttons .btn { flex: 1; padding: 8px 15px; border-radius: 5px; cursor: pointer; }
        .jl-filter-buttons .btn-clear { background: #6c757d; color: white; border: none; }
        .jl-filter-buttons .btn-clear:hover { background: #5a6268; }
        .jl-filter-buttons .btn-apply { background: #DA251C; color: white; border: none; }
        .jl-filter-buttons .btn-apply:hover { background: #B11E18; }
        
        /* --- Job Listings --- */
        .jl-job-listings { display: grid; gap: 20px; }
        .jl-job-card { background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08); padding: 20px; cursor: pointer; transition: transform 0.2s ease; border-left: 5px solid #DA251C; }
        .jl-job-card:hover { transform: translateY(-3px); box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); }
        .jl-job-card-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px; }
        .jl-job-category-tag { background: #E54155; color: white; padding: 5px 10px; border-radius: 5px; font-size: 0.8em; font-weight: bold; }
        .jl-job-deadline { font-size: 0.85em; color: #777; }
        .jl-job-title { font-size: 1.4em; font-weight: 600; color: #333; margin-bottom: 10px; }
        .jl-job-meta { display: flex; flex-wrap: wrap; gap: 10px; font-size: 0.9em; color: #555; margin-bottom: 15px; }
        .jl-job-meta-item { display: flex; align-items: center; gap: 5px; }
        .jl-job-tags { display: flex; flex-wrap: wrap; gap: 5px; margin-top: 10px; }
        .jl-job-tag { background: #e0e0e0; color: #666; padding: 4px 8px; border-radius: 3px; font-size: 0.8em; }

        /* --- Responsive Design --- */
        @media (max-width: 768px) {
            .jl-main-grid { grid-template-columns: 1fr; gap: 20px; }
            .jl-filter-sidebar { position: static; top: auto; } /* Remove sticky on mobile */
            .jl-search-container { flex-direction: column; align-items: stretch; }
        }
    </style>
</head>
<body>
    @include('beranda.header_user')

    <div class="jl-container">
        <div class="jl-search-section">
            <div class="jl-search-container">
                <span class="jl-search-icon">🔍</span>
                <input type="text" class="jl-search-input" id="jlSearchInput" placeholder="Cari kata kunci...">
                <div class="jl-divider"></div>
                <button class="jl-search-btn" id="jlApplyFiltersBtnTop">Cari Pekerjaan</button>
            </div>
        </div>

        <div class="jl-main-grid">
            <div class="jl-filter-sidebar">
                <div class="jl-filter-group">
                    <div class="jl-filter-group-header" data-toggle-filter="education">
                        <strong>Pendidikan</strong> <span>▼</span>
                    </div>
                    <div class="jl-filter-options" id="filter-education">
                        <select id="jlEducationFilterSelect">
                            <option value="">Pilih Pendidikan</option>
                            @foreach($educationLevels as $level)
                                <option value="{{ $level }}">{{ $level }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="jl-filter-group">
                    <div class="jl-filter-group-header" data-toggle-filter="experience">
                        <strong>Pengalaman</strong> <span>▼</span>
                    </div>
                    <div class="jl-filter-options" id="filter-experience">
                        <select id="jlExperienceFilterSelect">
                            <option value="">Pilih Pengalaman</option>
                            @foreach($experienceLevels as $level)
                                <option value="{{ $level }}">{{ $level }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="jl-filter-group">
                    <div class="jl-filter-group-header" data-toggle-filter="location">
                        <strong>Lokasi</strong> <span>▼</span>
                    </div>
                    <div class="jl-filter-options" id="filter-location">
                        <select id="jlLocationFilterSelect">
                            <option value="">Pilih Lokasi</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->name }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="jl-filter-group">
                    <div class="jl-filter-group-header" data-toggle-filter="function">
                        <strong>Fungsi</strong> <span>▼</span>
                    </div>
                    <div class="jl-filter-options" id="filter-function">
                        <select id="jlCategoryFilterSelect">
                            <option value="">Pilih Fungsi</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="jl-filter-buttons">
                    <button class="btn btn-clear" id="jlClearFiltersBtn">Hapus</button>
                </div>
            </div>

            <div class="jl-job-listings" id="jlJobListingsContainer">
                {{-- Jobs will be rendered here by JavaScript --}}
                <p style="text-align: center; color: #777; padding: 20px;">Memuat lowongan...</p>
            </div>
        </div>
    </div>

    <script>
        // --- DATA DARI BACKEND ---
        // allJobsFromBackend sekarang adalah HASIL FILTERING DARI BACKEND
        const allJobsFromBackend = @json($jobs);
        const categoriesFromBackend = @json($categories);
        const locationsFromBackend = @json($locations);
        const educationLevelsFromBackend = @json($educationLevels);
        const experienceLevelsFromBackend = @json($experienceLevels);
        const allUniqueTagsFromBackend = @json($allUniqueTags); 

        // --- FILTER STATE ---
        // Inisialisasi dari URL query parameters saat halaman dimuat
        const urlParams = new URLSearchParams(window.location.search);
        const currentFilters = { // Ini akan diinisialisasi ulang di DOMContentLoaded
            keyword: '', education: '', experience: '', location: '', category: '', tag: ''
        };

        // --- UI ELEMENTS (diinisialisasi di DOMContentLoaded) ---
        let jlSearchInput;
        let jlApplyFiltersBtnTop;
        let jlEducationFilterSelect;
        let jlExperienceFilterSelect;
        let jlLocationFilterSelect;
        let jlCategoryFilterSelect;
        let jlClearFiltersBtn;
        let jlApplyFiltersBtnBottom;
        let jlJobListingsContainer;

        // --- CORE FUNCTIONS ---

        // Fungsi untuk merender daftar lowongan pekerjaan ke dalam container
        function renderJobListings(jobsToDisplay) {

            if (!jlJobListingsContainer) return;
            jlJobListingsContainer.innerHTML = ''; 

            if (jobsToDisplay.length === 0) {
                jlJobListingsContainer.innerHTML = '<p style="text-align: center; color: #777; padding: 20px;">Tidak ada lowongan yang ditemukan untuk filter yang dipilih.</p>';
                return;
            }

            jobsToDisplay.forEach(job => {
                const companyName = "PT. PULAUINTAN BAJAPERKASA KONSTRUKSI"; // <<< BARIS INI

                const posterName = job.poster ? job.poster.name : 'N/A';
                const locationName = job.location ? job.location.name : 'N/A';
                const categoryName = job.category ? job.category.name : 'N/A';
                const educationLevel = job.education_level || 'Tidak disebutkan';
                const experienceLevel = job.experience_level || 'Tidak disebutkan';
                const jobType = job.type ? job.type.name : 'N/A';
                const deadline = job.application_deadline ? new Date(job.application_deadline).toLocaleDateString('id-ID', {day: 'numeric', month: 'short', year: 'numeric'}) : 'Tidak ada batas';

                const tagsHtml = job.skills && job.skills.length > 0
                    ? job.skills.map(skill => `<span class="jl-job-tag">${skill.name}</span>`).join('')
                    : '';

                const jobCard = `
                    <div class="jl-job-card" data-job-id="${job.id}">
                        <div class="jl-job-card-header">
                            <div class="jl-job-category-tag">${categoryName}</div>
                            <div class="jl-job-deadline">Berlaku hingga ${deadline}</div>
                        </div>
                        <h3 class="jl-job-title">${job.title}</h3>
                        <div class="jl-job-meta">
                            <div class="jl-job-meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                    <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                    <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1zm11 0H3v14h10V1z"/>
                                    <path d="M5 15h1v-1H5v1zm2 0h1v-1H7v1zm2 0h1v-1H9v1zm2 0h1v-1h-1v1z"/>
                                </svg>
                                <span>${companyName}</span>
                            </div>
                            <div class="jl-job-meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                                <span>${locationName}</span>
                            </div>
                            <div class="jl-job-meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3.5a.5.5 0 0 0 .422 0l7.5-3.5a.5.5 0 0 0-.025-.917l-7.5-3.5Z"/>
                                    <path d="M4.116 1.488A.5.5 0 0 0 4 1.5v3.5L1.5 5.293V3.5a.5.5 0 0 0-.5-.5H.5a.5.5 0 0 0-.5.5v5.014c0 .526.424.96.95.984l.5.025c.407.02.735.09.99.26.355.234.61.597.838 1.054.195.404.298.84.343 1.286.053.468.04.825-.013 1.155-.048.337-.15.655-.313.908-.16.244-.383.42-.646.542l-.003.002-.007.004-.009.006-.016.01L2 14.996V14.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.5L.3 15.673c.01.006.02.012.03.018l.012.008.015.009c.046.026.095.04.148.048.053.007.106.01.16.012l.2.007c.465.019.894.015 1.284-.007.247-.014.49-.04.722-.076.3-.048.58-.112.833-.198.32-.108.6-.254.818-.409.206-.15.385-.3.515-.42l.02-.016c.105-.083.216-.17.34-.247-.058.265-.112.535-.157.808-.046.27-.08-.5.016 1.155.034.225.07.447.11.67.04.223.07.444.11.666z"/>
                                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3.5a.5.5 0 0 0 .422 0l7.5-3.5a.5.5 0 0 0-.025-.917L8.211 2.047Z"/>
                                </svg>
                                <span>${educationLevel}</span>
                            </div>
                            <div class="jl-job-meta-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v9A1.5 1.5 0 0 0 1.5 15h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zM1 4h14v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V4z"/>
                                </svg>
                                <span>${experienceLevel} - ${jobType}</span>
                            </div>
                        </div>
                        <div class="jl-job-tags">
                            ${tagsHtml}
                        </div>
                    </div>
                `;
                jlJobListingsContainer.insertAdjacentHTML('beforeend', jobCard);
            });

            // Add click listeners to newly rendered job cards for detail navigation
            jlJobListingsContainer.querySelectorAll('.jl-job-card').forEach(card => {
                card.addEventListener('click', function() {
                    const jobId = this.dataset.jobId;
                    if (jobId) {
                        window.location.href = `/detail_lowongan/${jobId}`; // Assuming this route exists
                    } else {
                        console.warn('Job ID not found for the clicked job card.');
                    }
                });
            });

        }

        function applyFilters() {
            const searchKeyword = jlSearchInput.value.toLowerCase().trim();
            const selectedEducation = jlEducationFilterSelect.value;
            const selectedExperience = jlExperienceFilterSelect.value;
            const selectedLocation = jlLocationFilterSelect.value;
            const selectedCategory = jlCategoryFilterSelect.value;

            // Buat URLSearchParams baru
            const params = new URLSearchParams();
            if (searchKeyword) params.append('keyword', searchKeyword);
            if (selectedEducation) params.append('education', selectedEducation);
            if (selectedExperience) params.append('experience', selectedExperience);
            if (selectedLocation) params.append('location', selectedLocation);
            if (selectedCategory) params.append('category', selectedCategory);
            // if (currentFilters.tag) params.append('tag', currentFilters.tag); // Tambahkan tag jika aktif

            // Bangun URL baru untuk halaman ini
            const newUrl = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
            
            // Redirect ke URL baru. Ini akan memicu muat ulang halaman dengan filter baru.
            window.location.href = newUrl;
        }

       function clearFilters() {
            jlSearchInput.value = '';
            jlEducationFilterSelect.value = '';
            jlExperienceFilterSelect.value = '';
            jlLocationFilterSelect.value = '';
            jlCategoryFilterSelect.value = '';
            
            // Redirect ke URL tanpa parameter filter
            window.location.href = window.location.pathname;

            // Close filter dropdowns after clearing
            document.querySelectorAll('.jl-filter-options.show').forEach(openDropdown => {
                openDropdown.classList.remove('show');
                const headerSpan = openDropdown.previousElementSibling.querySelector('span:last-child');
                if (headerSpan) headerSpan.textContent = '▼';
            });
        };
        
        // --- EVENT LISTENERS & INITIAL LOAD ---
        document.addEventListener('DOMContentLoaded', () => {
            // Cache UI Elements
            jlSearchInput = document.getElementById('jlSearchInput');
            jlApplyFiltersBtnTop = document.getElementById('jlApplyFiltersBtnTop');
            jlEducationFilterSelect = document.getElementById('jlEducationFilterSelect');
            jlExperienceFilterSelect = document.getElementById('jlExperienceFilterSelect');
            jlLocationFilterSelect = document.getElementById('jlLocationFilterSelect');
            jlCategoryFilterSelect = document.getElementById('jlCategoryFilterSelect');
            jlClearFiltersBtn = document.getElementById('jlClearFiltersBtn');
            jlApplyFiltersBtnBottom = document.getElementById('jlApplyFiltersBtnBottom');
            jlJobListingsContainer = document.getElementById('jlJobListingsContainer');

            // --- Filter Dropdown Toggles ---
            document.querySelectorAll('.jl-filter-group-header').forEach(header => {
                header.addEventListener('click', function() {
                    const targetId = this.dataset.toggleFilter;
                    const targetOptions = document.getElementById('filter-' + targetId);
                    if (targetOptions) {
                        // Close other open dropdowns first
                        document.querySelectorAll('.jl-filter-options.show').forEach(openDropdown => {
                            if (openDropdown !== targetOptions) {
                                openDropdown.classList.remove('show');
                                openDropdown.previousElementSibling.querySelector('span:last-child').textContent = '▼';
                            }
                        });
                        // Toggle current dropdown
                        targetOptions.classList.toggle('show');
                        this.querySelector('span:last-child').textContent = targetOptions.classList.contains('show') ? '▲' : '▼';
                    }
                });
            });

            // --- Apply Filters Buttons ---
            if (jlApplyFiltersBtnTop) {
                jlApplyFiltersBtnTop.addEventListener('click', applyFilters);
            }
            if (jlApplyFiltersBtnBottom) {
                jlApplyFiltersBtnBottom.addEventListener('click', applyFilters);
            }

            // --- Clear Filters Button ---
            if (jlClearFiltersBtn) {
                jlClearFiltersBtn.addEventListener('click', clearFilters);
            }

            // --- Filter Dropdown Change Listeners (Apply filters on change) ---
            if (jlEducationFilterSelect) jlEducationFilterSelect.addEventListener('change', applyFilters);
            if (jlExperienceFilterSelect) jlExperienceFilterSelect.addEventListener('change', applyFilters);
            if (jlLocationFilterSelect) jlLocationFilterSelect.addEventListener('change', applyFilters);
            if (jlCategoryFilterSelect) jlCategoryFilterSelect.addEventListener('change', applyFilters);

            // Initial render
            // Read query parameters from URL and initialize currentFilters
            const urlParams = new URLSearchParams(window.location.search);
            currentFilters.keyword = urlParams.get('keyword') || '';
            currentFilters.education = urlParams.get('education') || '';
            currentFilters.experience = urlParams.get('experience') || '';
            currentFilters.location = urlParams.get('location') || '';
            currentFilters.category = urlParams.get('category') || '';
            currentFilters.tag = urlParams.get('tag') || '';

            renderJobListings(allJobsFromBackend); 
        });
    </script>
</body>