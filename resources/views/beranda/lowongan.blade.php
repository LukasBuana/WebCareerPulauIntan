<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Pekerjaan - Indofood</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header with search and decorative elements */
        .header {
            background: linear-gradient(135deg, #4a90e2 0%, #2c5aa0 100%);
            padding: 40px 0;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -20%;
            width: 200px;
            height: 200px;
            background: #ffb84d;
            border-radius: 50%;
            opacity: 0.3;
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: #2c5aa0;
            border-radius: 50%;
            opacity: 0.2;
        }

        .search-section {
            position: relative;
            z-index: 2;
        }

        .search-container {
            display: flex;
            gap: 15px;
            align-items: center;
            background: white;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .search-input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 16px;
            padding: 10px;
            background: transparent;
        }

        .search-input::placeholder {
            color: #999;
        }

        .search-icon {
            color: #999;
            font-size: 20px;
        }

        .divider {
            width: 1px;
            height: 30px;
            background: #e0e0e0;
        }

        .filter-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            border: none;
            color: #666;
            font-size: 16px;
            cursor: pointer;
            padding: 8px;
            position: relative; /* For the filter dropdown */
        }

        .search-btn {
            background: #4a90e2;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-btn:hover {
            background: #2c5aa0;
        }

        /* Filter Dropdown */
        .filter-dropdown {
            position: absolute;
            top: 100%; /* Position below the button */
            left: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 15px;
            z-index: 10;
            min-width: 200px;
            display: none; /* Hidden by default */
            margin-top: 10px;
        }

        .filter-dropdown.show {
            display: block;
        }

        .filter-dropdown label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
            color: #333;
        }

        .filter-dropdown select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 15px;
            background-color: #fff;
            appearance: none; /* Remove default arrow */
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007bff%22%20d%3D%22M287%2069.9a14.7%2014.7%200%200%200-21-21L146.2%20188.8%2026.4%2048.9a14.7%2014.7%200%200%200-21%2021L135.7%20219.7c5.7%205.7%2014.8%205.7%2020.5%200z%22%2F%3E%3C%2Fsvg%3E');
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 12px;
        }

        /* Categories Section */
        .categories-section {
            padding: 40px 0;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
        }

        .view-all {
            color: #4a90e2;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 60px;
        }

        .category-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s, border 0.3s; /* Added border to transition */
            cursor: pointer;
            border: 1px solid #f0f0f0;
        }

        .category-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
        }

        /* New: Active category highlight */
        .category-card.active-category {
            border: 2px solid #4a90e2; /* Highlight active category */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .category-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 8px;
        }

        .category-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #f0f4f8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #4a90e2;
        }

        .category-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #4a90e2;
        }

        .category-count {
            color: #666;
            font-size: 0.9rem;
        }

        /* Latest Jobs Section */
        .latest-jobs {
            text-align: center;
            padding: 60px 0;
        }

        .latest-jobs h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .accent-bar {
            width: 80px;
            height: 4px;
            background: #ffb84d;
            margin: 0 auto 40px;
            border-radius: 2px;
        }

        .job-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-top: 40px;
        }

        .job-tag {
            background: #ffb84d;
            color: #333;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }

        .job-tag:hover {
            background: #ff9f1a;
        }

        /* Job Listing Styles */
        .job-listings {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .job-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #f0f0f0;
            text-align: left;
        }

        .job-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
        }

        .job-card h3 {
            font-size: 1.2rem;
            color: #4a90e2;
            margin-bottom: 10px;
        }

        .job-card p {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 5px;
        }

        .job-card .location, .job-card .type {
            font-size: 0.85rem;
            color: #888;
        }
        
        .job-card .tags {
            margin-top: 10px;
        }

        .job-card .tags span {
            display: inline-block;
            background: #e6f2ff;
            color: #4a90e2;
            padding: 4px 8px;
            border-radius: 5px;
            font-size: 0.8rem;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        @media (max-width: 768px) {
            .search-container {
                flex-direction: column;
                gap: 10px;
            }

            .search-input {
                width: 100%;
            }

            .categories-grid {
                grid-template-columns: 1fr;
            }

            .latest-jobs h2 {
                font-size: 2rem;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .filter-dropdown {
                position: static; /* Stack on mobile */
                width: 100%;
                margin-top: 0;
                box-shadow: none;
                border-top: 1px solid #eee;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="search-section">
                <div class="search-container">
                    <span class="search-icon">🔍</span>
                    <input type="text" class="search-input" id="searchInput" placeholder="Cari kata kunci">
                    <div class="divider"></div>
                    <button class="filter-btn" id="filterBtn">
                        <span>☰</span>
                        <span>Pilih Filter</span>
                        <span>▼</span>
                        <div class="filter-dropdown" id="filterDropdown">
                            <label for="categoryFilter">Kategori:</label>
                            <select id="categoryFilter">
                                <option value="">Semua Kategori</option>
                                <option value="Sales">Sales</option>
                                <option value="Manufacturing">Manufacturing</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Finance">Finance</option>
                                <option value="IT & Technology">IT & Technology</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Logistics">Logistics</option>
                            </select>

                            <label for="locationFilter">Lokasi:</label>
                            <select id="locationFilter">
                                <option value="">Semua Lokasi</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Surabaya">Surabaya</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Medan">Medan</option>
                                <option value="Semarang">Semarang</option>
                            </select>
                        </div>
                    </button>
                    <button class="search-btn" id="applyFiltersBtn">Cari Pekerjaan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="categories-section">
            <div class="section-header">
                <h2 class="section-title">Kategori pekerjaan berdasarkan fungsi</h2>
                <a href="#" class="view-all">Lainnya ></a>
            </div>

            <div class="categories-grid" id="categoriesGrid">
                </div>
        </div>

         <div class="latest-jobs">
            <h2>Lowongan Terbaru</h2>
            <div class="accent-bar"></div>

            <div class="job-tags" id="jobTags">
                {{-- Tags/Skills dari database, render di sisi server --}}
                @foreach($allUniqueTags as $tag)
                    <div class="job-tag" data-tag="{{ $tag }}">{{ $tag }}</div>
                @endforeach
            </div>

            <div class="job-listings" id="jobListings">
                {{-- Loop untuk menampilkan setiap lowongan dari database --}}
                @forelse($jobs as $job)
                    <div class="job-card">
                        <h3>{{ $job->title }}</h3>
                        <p><strong>Perusahaan:</strong> {{ $job->poster->name ?? 'N/A' }}</p> {{-- Asumsi 'poster' adalah user yang memposting --}}
                        <p><strong>Kategori:</strong> {{ $job->category->name ?? 'N/A' }}</p>
                        <p class="location"><strong>Lokasi:</strong> {{ $job->location->name ?? 'N/A' }}</p>
                        <p class="type"><strong>Tipe:</strong> {{ $job->type->name ?? 'N/A' }}</p>
                        <div class="tags">
                            @foreach($job->skills as $skill)
                                <span>{{ $skill->name }}</span>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p style="text-align: center; color: #777; padding: 20px;">Tidak ada lowongan yang ditemukan.</p>
                @endforelse
            </div>
        </div>
    </div>

    <script>
       const allJobsFromBackend = @json($jobs);
        const categoriesFromBackend = @json($categories);
        const locationsFromBackend = @json($locations);
        const jobTypesFromBackend = @json($jobTypes);
        const allUniqueTagsFromBackend = @json($allUniqueTags);

        // Contoh bagaimana Anda bisa mengadaptasi renderJobTags dan renderCategoryCards
        // jika ingin tetap menggunakan JavaScript untuk rendering awal atau manipulasi DOM
       function renderCategoryCardsDynamic() {
    const categoriesGrid = document.getElementById('categoriesGrid');
    categoriesGrid.innerHTML = '';

    // Re-calculate counts if needed, or get counts from backend if passed
    const categoryCounts = {};
    allJobsFromBackend.forEach(job => {
        // Pastikan job.category dan job.category.name ada
        const categoryName = job.category ? job.category.name : 'Uncategorized';
        categoryCounts[categoryName] = (categoryCounts[categoryName] || 0) + 1;
    });

    categoriesFromBackend.forEach(cat => {
        const count = categoryCounts[cat.name] || 0;
        
        // --- PERUBAHAN DI SINI: Mengambil ikon langsung dari data kategori ---
        const icon = cat.icon || '❓'; // Mengambil nilai dari cat.icon. Gunakan '❓' sebagai default jika null
        

        const card = `
            <div class="category-card" data-category="${cat.name}">
                <div class="category-header">
                    <div class="category-icon">${icon}</div>
                    <div>
                        <div class="category-title">${cat.name} (${count})</div>
                        <div class="category-count">${count} Posisi</div>
                    </div>
                </div>
            </div>
        `;
        categoriesGrid.insertAdjacentHTML('beforeend', card);
    });
    categoriesGrid.querySelectorAll('.category-card').forEach(card => {
        card.addEventListener('click', () => {
            document.getElementById('categoryFilter').value = card.dataset.category;
            applyFilters(); // Call your filter function
        });
    });
}

       function renderJobTagsDynamic() {
            const jobTagsContainer = document.getElementById('jobTags');
            jobTagsContainer.innerHTML = ''; // Clear existing tags

            allUniqueTagsFromBackend.forEach(tag => {
                const tagElement = `<div class="job-tag" data-tag="${tag}">${tag}</div>`;
                jobTagsContainer.insertAdjacentHTML('beforeend', tagElement);
            });
            jobTagsContainer.querySelectorAll('.job-tag').forEach(tagElement => {
                tagElement.addEventListener('click', () => filterByTag(tagElement.dataset.tag));
            });
        }


        // Ini adalah fungsi utama untuk menerapkan filter.
        // Anda perlu menyesuaikannya untuk mengirim permintaan AJAX ke backend
        // atau untuk memfilter 'allJobsFromBackend' di frontend jika datanya tidak terlalu besar.
        function applyFilters() {
            const searchKeyword = document.getElementById('searchInput').value.toLowerCase();
            const selectedCategory = document.getElementById('categoryFilter').value;
            const selectedLocation = document.getElementById('locationFilter').value;
            // const selectedJobType = document.getElementById('jobTypeFilter').value; // Jika Anda menambahkan filter ini

            let filteredJobs = allJobsFromBackend;

            if (searchKeyword) {
                filteredJobs = filteredJobs.filter(job =>
                    job.title.toLowerCase().includes(searchKeyword) ||
                    (job.description && job.description.toLowerCase().includes(searchKeyword)) ||
                    (job.responsibilities && job.responsibilities.toLowerCase().includes(searchKeyword)) ||
                    (job.qualifications && job.qualifications.toLowerCase().includes(searchKeyword)) ||
                    (job.skills && job.skills.some(skill => skill.name.toLowerCase().includes(searchKeyword))) // Filter berdasarkan skill name
                );
            }

            if (selectedCategory) {
                filteredJobs = filteredJobs.filter(job => job.category && job.category.name === selectedCategory);
            }

            if (selectedLocation) {
                filteredJobs = filteredJobs.filter(job => job.location && job.location.name === selectedLocation);
            }
            
            // if (selectedJobType) { // Jika Anda menambahkan filter ini
            //     filteredJobs = filteredJobs.filter(job => job.type && job.type.name === selectedJobType);
            // }

            renderJobListings(filteredJobs); // Render hasil filter
        }

        function filterByTag(tag) {
            const filteredJobs = allJobsFromBackend.filter(job =>
                job.skills && job.skills.some(skill => skill.name === tag)
            );
            renderJobListings(filteredJobs);
            // Opsional: reset filter dropdown lainnya atau update UI
            document.getElementById('searchInput').value = '';
            document.getElementById('categoryFilter').value = '';
            document.getElementById('locationFilter').value = '';
        }

        function selectCategory(categoryName) {
            document.getElementById('categoryFilter').value = categoryName;
            applyFilters();
        }


        // Event Listeners
        document.getElementById('filterBtn').addEventListener('click', function() {
            const dropdown = document.getElementById('filterDropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        });

        document.getElementById('applyFiltersBtn').addEventListener('click', applyFilters);
        document.getElementById('searchInput').addEventListener('keyup', (e) => {
            if (e.key === 'Enter') {
                applyFilters();
            }
        });


        // Initial render on page load
        document.addEventListener('DOMContentLoaded', () => {
            renderCategoryCardsDynamic(); // Panggil fungsi untuk merender kartu kategori secara dinamis
            renderJobTagsDynamic(); // Panggil fungsi untuk merender tag secara dinamis
            renderJobListings(allJobsFromBackend); // Render semua lowongan di awal
        });
    </script>
</body>
</html>