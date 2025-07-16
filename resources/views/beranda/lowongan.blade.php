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
            background-color: #f8f9fa; /* Light background for the whole page */
        }

        .jp-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* --- Header with search and decorative elements --- */
        .jp-search-section {
            position: relative;
            z-index: 2;
        }

        .jp-search-container {
            display: flex;
            gap: 15px;
            align-items: center;
            background: white;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            margin-top: 40px;
        }

        .jp-search-input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 16px;
            padding: 10px;
            background: transparent;
        }

        .jp-search-input::placeholder {
            color: #999;
        }

        .jp-search-icon {
            color: #999;
            font-size: 20px;
        }

        .jp-divider {
            width: 1px;
            height: 30px;
            background: #e0e0e0;
        }

        .jp-filter-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            border: none;
            color: #666;
            font-size: 16px;
            cursor: pointer;
            padding: 8px;
            position: relative;
        }

        .jp-search-btn {
            background: black;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }

        .jp-search-btn:hover {
            background: #E54155;
        }

        /* Filter Dropdown */
        .jp-filter-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 15px;
            z-index: 10;
            min-width: 200px;
            display: none;
            margin-top: 10px;
        }

        .jp-filter-dropdown.show {
            display: block;
        }

        .jp-filter-dropdown label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
            color: #333;
        }

        .jp-filter-dropdown select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 15px;
            background-color: #fff;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007bff%22%20d%3D%22M287%2069.9a14.7%2014.7%200%200%200-21-21L146.2%20188.8%2026.4%2048.9a14.7%2014.7%200%200%200-21%2021L135.7%20219.7c5.7%205.7%2014.8%205.7%2020.5%200z%22%2F%3E%3C%2Fsvg%3E');
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 12px;
        }

        /* --- Categories Section --- */
        .jp-categories-section {
            padding: 30px 0;
        }

        .jp-section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .jp-lowongansection-title {
            font-size: medium;
            font-weight: 800;
            color: #333;
        }

        .jp-view-all {
            color:black;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .jp-view-all:hover {
            text-decoration: underline;
        }

        .jp-categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(277px, 1fr));
            gap: 20px;
            margin-bottom: 60px;
        }

        .jp-category-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s, border 0.3s;
            cursor: pointer;
            border: 1px solid #f0f0f0;
        }

        .jp-category-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
        }

        .jp-category-card.jp-active-category {
            border: 2px solid #E54155;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .jp-category-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: -10px;
            margin-top: -10px;
        }

        .jp-category-icon {
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

        .jp-category-title {
            font-size: 1.0rem;
            font-weight: 600;
            color: #E54155;
        }

        .jp-category-count {
            color: #666;
            font-size: 0.9rem;
        }

        /* --- Latest Jobs Section (Carousel) --- */
        .jp-latest-jobs {
            text-align: center;
            padding: 10px 0;
            /* margin-bottom: 0px; */
        }

        .jp-latest-jobs .jp-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            /* margin-bottom: 60px; */
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

.jp-accent-bar1 {
    display: flex;
    color: #E54155; /* This applies to text content if any */
    background-color: #E54155; /* Use this to make the bar itself orange */
    width: 200px; /* Example width */
    height: 10px; /* Example height */
    margin-top: 20px;
    margin-left: 185px;
    border-radius: 50px;
}
 .jp-accent-bar2{
    display: flex;
    color: transparent; /* This applies to text content if any */
    background-color: transparent; /* Use this to make the bar itself orange */
    width: 200px; /* Example width */
    height: 10px; /* Example height */
    margin-top: 70px;
    margin-left: 185px;
    border-radius: 50px;

 }
  .jp-accent-bar3{
    display: flex;
    color: #E54155; /* This applies to text content if any */
    background-color: #E54155; /* Use this to make the bar itself orange */
    width: 200px; /* Example width */
    height: 10px; /* Example height */
    margin-top: 30px;
     margin-bottom: 30px;
    margin-left: 470px;
    border-radius: 50px;

 }

        /* --- Carousel Specific Styles (to match the image) --- */
        .jp-carousel-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px; /* Space between nav buttons and carousel */
            margin-bottom: 60px;
            
        }

        .jp-nav-button {
            width: 50px;
            height: 50px;
            background: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            font-size: 1.2rem;
            color: #E54155;
            flex-shrink: 0; /* Prevent buttons from shrinking */
        }

        .jp-nav-button:hover {
            background: #E54155;
            color: white;
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(52, 152, 219, 0.3);
        }

        .jp-nav-button:active {
            transform: scale(0.95);
        }

        .jp-carousel {
            display: flex;
            /* Adjusted to fit 3 cards with 20px gap between each for better visual */
            width: 960px;
            overflow: hidden; /* Hide cards outside the view */
            position: relative;
            justify-content: flex-start; /* Align cards to the start, allow scrolling */
            gap: 20px; /* Gap between job cards */
            padding: 20px; /* Add some padding to see the active card's scale without cutting off */
            box-sizing: content-box; /* To make padding work as intended with width */
            scroll-behavior: smooth; /* Smooth scrolling for the carousel */
            
        }

        .jp-job-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            min-width: 300px; /* Base width for a card */
            width: 300px; /* Fixed width for better layout control */
            flex-shrink: 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), opacity 0.3s ease; /* Ensure opacity transitions too */
            cursor: pointer;
            position: relative;
            overflow: hidden;
            display: flex; /* Flexbox for internal content layout */
            flex-direction: column;
            align-items: flex-start; /* Align content to the left */
            text-align: left; /* Text alignment within the card */
        }

        .jp-job-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            /* background: linear-gradient(135deg, #3498db, #2980b9); */
            background: #E54155;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .jp-job-card.jp-active::before {
            opacity: 1;
        }

        .jp-job-card.jp-active {
            transform: scale(1.1);
            box-shadow: 0 10px 40px rgba(52, 152, 219, 0.3);
            z-index: 2;
        }

        .jp-job-card.jp-inactive {
            transform: scale(0.9);
            opacity: 0.7;
        }

        .jp-job-card-content {
            position: relative;
            z-index: 2;
            transition: color 0.3s ease;
            width: 100%; /* Ensure content fills the card */
        }

        .jp-job-card.jp-active .jp-job-card-content,
        .jp-job-card.jp-active .jp-job-title,
        .jp-job-card.jp-active .jp-job-details {
            color: white;
        }

        .jp-job-category {
            background: #f39c12;
            color: white;
            padding: 5px 12px; /* Smaller padding to match image */
            border-radius: 20px;
            font-size: 0.75rem; /* Smaller font size */
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px; /* Space below category */
            text-transform: uppercase;
            letter-spacing: 0.5px;
            align-self: flex-start; /* Align to the left within the card */
        }

        .jp-job-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .jp-job-details {
            display: flex;
            flex-direction: column; /* Stack details vertically as in image */
            align-items: flex-start; /* Align details to the left */
            gap: 10px; /* Smaller gap between details */
            font-size: 0.9rem;
            color: #7f8c8d;
            margin-top: auto; /* Push details to the bottom */
        }

        .jp-job-detail {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .jp-job-detail-icon {
            width: 18px; /* Slightly larger icons */
            height: 18px;
            opacity: 0.7;
            color: inherit; /* Inherit color from parent for active state */
        }

        .jp-view-all-btn {
            background: transparent;
            border: 2px solid #E54155;
            color: #E54155;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .jp-view-all-btn:hover {
            background: #E54155;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        /* --- Media Queries --- */
        @media (max-width: 1024px) {
            .jp-carousel {
                width: 650px; /* Adjust for smaller screens, maybe 2 cards */
            }
        }

        @media (max-width: 768px) {
            .jp-search-container {
                flex-direction: column;
                gap: 10px;
            }
            .jp-carousel {
                width: 350px; /* Show only one card on mobile */
            }

            .jp-job-card {
                min-width: 280px;
                padding: 25px;
            }

            .jp-carousel-container {
                gap: 15px;
            }

            .jp-search-input {
                width: 100%;
            }

            .jp-categories-grid {
                grid-template-columns: 1fr;
            }

            .jp-latest-jobs h2 {
                font-size: 2rem;
            }

            .jp-section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .jp-filter-dropdown {
                position: static;
                width: 100%;
                margin-top: 0;
                box-shadow: none;
                border-top: 1px solid #eee;
            }
            .jp-nav-button {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
            .jp-latest-jobs .jp-title {
                font-size: 2rem;
                margin-bottom: 40px;
            }
        }

        /* Animation for smooth transitions */
        @keyframes jp-slideIn {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .jp-job-card {
            animation: jp-slideIn 0.5s ease;
        }
    </style>
</head>
<body>
    <div class="jp-accent-bar2"></div>
    <div class="jp-accent-bar1"></div>
    <div class="jp-container">
        <div class="jp-search-section">
            <div class="jp-search-container">
                <span class="jp-search-icon">🔍</span>
                <input type="text" class="jp-search-input" id="jpSearchInput" placeholder="Cari kata kunci">
                <div class="jp-divider"></div>
                <button class="jp-filter-btn" id="jpFilterBtn">
                    <span>☰</span>
                    <span>Pilih Filter</span>
                    <span>▼</span>
                    <div class="jp-filter-dropdown" id="jpFilterDropdown">
                        <label for="jpCategoryFilter">Kategori:</label>
                        <select id="jpCategoryFilter">
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

                        <label for="jpLocationFilter">Lokasi:</label>
                        <select id="jpLocationFilter">
                            <option value="">Semua Lokasi</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Medan">Medan</option>
                            <option value="Semarang">Semarang</option>
                        </select>
                    </div>
                </button>
                <button class="jp-search-btn" id="jpApplyFiltersBtn">Cari Pekerjaan</button>
            </div>
        </div>
    </div>

    <div class="jp-container">
        <div class="jp-categories-section">
            <div class="jp-section-header">
                <h2 class="jp-lowongansection-title">Kategori Pekerjaan Berdasarkan Fungsi</h2>
                <a href="#" class="jp-view-all">Lainnya ></a>
            </div>

            <div class="jp-categories-grid" id="jpCategoriesGrid">
                </div>
        </div>

        <div class="jp-latest-jobs">
            <h1 class="jp-title">Lowongan Terbaru</h1>
            <div class="jp-accent-bar3"></div>

            <div class="jp-carousel-container">
                <button class="jp-nav-button" id="jpPrevBtn">‹</button>
                <div class="jp-carousel" id="jpCarousel">
                </div>
                <button class="jp-nav-button" id="jpNextBtn">›</button>
            </div>
            <a href="#" class="jp-view-all-btn">Lihat Semua</a>
        </div>
    </div>

    <script>
        // --- DEFINISI VARIABEL JAVASCRIPT DARI BACKEND ---
        // Pastikan variabel ini ada dan terisi dari PHP
        const allJobsFromBackend = @json($jobs);
        const categoriesFromBackend = @json($categories);
        const locationsFromBackend = @json($locations);
        const jobTypesFromBackend = @json($jobTypes); // Assuming this is still used for type filtering
        const allUniqueTagsFromBackend = @json($allUniqueTags);

        // --- DEFINISI VARIABEL FILTER ---
        const currentFilters = {
            keyword: '',
            category: '',
            location: '',
            tag: ''
        };

        // --- UI Elements (cached after DOMContentLoaded) ---
        let jpFilterBtn;
        let jpFilterDropdown;
        let jpApplyFiltersBtn;
        let jpSearchInput;
        let jpCategoryFilterSelect;
        let jpLocationFilterSelect;
        let jpCategoriesGrid;
        let jpJobTagsContainer;
        let jpCarouselContainer;
        let jpCarousel;
        let jpPrevBtn;
        let jpNextBtn;

        // Carousel variables
        let currentIndex = 0; // Start at the first card for the carousel
        let totalCards = 0; // Will be set after rendering jobs

        // --- Core Functions ---

        function updateCarousel() {
            const cardsInCarousel = jpCarousel.querySelectorAll('.jp-job-card');
            cardsInCarousel.forEach((card, index) => {
                card.classList.remove('jp-active', 'jp-inactive');

                // Determine the visual position relative to the currentIndex
                // The active card will be the one at currentIndex
                // Inactive cards will be the ones directly visible on either side of the active card.
                const offset = index - currentIndex;

                if (offset === 0) {
                    card.classList.add('jp-active');
                } else if (Math.abs(offset) === 1) { // Cards immediately next to the active one
                    card.classList.add('jp-inactive');
                } else {
                    // For cards further away, you might want to hide them completely
                    // For this carousel, they'll simply be outside the 'overflow: hidden' area
                }
            });

            // Adjust the carousel's scroll position to center the active card
            if (cardsInCarousel[currentIndex]) {
                const cardWidth = cardsInCarousel[currentIndex].offsetWidth;
                const gap = 20; // Matches .jp-carousel gap
                // Calculate scroll position to center the current active card in the visible window
                const carouselVisibleWidth = jpCarousel.offsetWidth;
                const scrollPosition = (cardWidth + gap) * currentIndex - ((carouselVisibleWidth - cardWidth) / 2);

                jpCarousel.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
                });
            }
        }

        function goToNext() {
            if (totalCards > 0) {
                currentIndex = (currentIndex + 1) % totalCards;
                updateCarousel();
            }
        }

        function goToPrev() {
            if (totalCards > 0) {
                currentIndex = (currentIndex - 1 + totalCards) % totalCards;
                updateCarousel();
            }
        }

        function renderCategoryCardsDynamic() {
            if (!jpCategoriesGrid) {
                console.error('Element with ID "jpCategoriesGrid" not found!');
                return;
            }
            jpCategoriesGrid.innerHTML = '';

            const categoryCounts = {};
            allJobsFromBackend.forEach(job => {
                const categoryName = job.category ? job.category.name : 'Uncategorized';
                categoryCounts[categoryName] = (categoryCounts[categoryName] || 0) + 1;
            });

            categoriesFromBackend.forEach(cat => {
                const count = categoryCounts[cat.name] || 0;
                const icon = cat.icon || '❓'; // Assuming 'icon' field exists in your category data

                const card = `
                    <div class="jp-category-card" data-category="${cat.name}">
                        <div class="jp-category-header">
                            <div class="jp-category-icon">${icon}</div>
                            <div>
                                <div class="jp-category-title">${cat.name} </div>
                                <div class="jp-category-count">${count} Posisi</div>
                            </div>
                        </div>
                    </div>
                `;
                jpCategoriesGrid.insertAdjacentHTML('beforeend', card);
            });
            jpCategoriesGrid.querySelectorAll('.jp-category-card').forEach(card => {
                card.addEventListener('click', () => selectCategory(card.dataset.category));
            });
        }

        function renderJobTagsDynamic() {
            // This function is still present but the HTML element it targets (jpJobTagsContainer)
            // is not in the provided new HTML structure. If you re-add the job tags,
            // make sure to add a div with id="jpJobTags" in the HTML.
            if (!jpJobTagsContainer) {
                // console.warn('Element with ID "jpJobTags" not found. Skipping tag rendering.');
                return;
            }
            jpJobTagsContainer.innerHTML = '';

            allUniqueTagsFromBackend.forEach(tag => {
                const tagElement = `<div class="jp-job-tag" data-tag="${tag}">${tag}</div>`;
                jpJobTagsContainer.insertAdjacentHTML('beforeend', tagElement);
            });
            jpJobTagsContainer.querySelectorAll('.jp-job-tag').forEach(tagElement => {
                tagElement.addEventListener('click', () => filterByTag(tagElement.dataset.tag));
            });
        }

        function renderCarouselJobs(jobsToDisplay) {
            if (!jpCarousel) {
                console.error('Element with ID "jpCarousel" not found!');
                return;
            }
            jpCarousel.innerHTML = ''; // Clear existing cards

            // No longer limiting to 3. All filtered jobs will be added to the carousel.
            totalCards = jobsToDisplay.length;

            // Set initial currentIndex based on number of cards
            // If there are 2 or more cards, start with the second card active (index 1) to visually center.
            // Otherwise, start with the first card (index 0).
            if (totalCards >= 2) {
                currentIndex = 1;
            } else {
                currentIndex = 0;
            }

            if (jobsToDisplay.length === 0) {
                jpCarousel.innerHTML = '<p style="text-align: center; color: #777; padding: 20px; width: 100%;">Tidak ada lowongan yang ditemukan untuk filter yang dipilih.</p>';
                // Hide nav buttons if no jobs
                if (jpPrevBtn) jpPrevBtn.style.display = 'none';
                if (jpNextBtn) jpNextBtn.style.display = 'none';
                return;
            } else {
                if (jpPrevBtn) jpPrevBtn.style.display = 'flex';
                if (jpNextBtn) jpNextBtn.style.display = 'flex';
            }

            jobsToDisplay.forEach((job, index) => {
                const companyName = job.poster ? job.poster.name : 'N/A';
                const locationName = job.location ? job.location.name : 'N/A';
                const categoryName = job.category ? job.category.name : 'N/A';

                const jobCard = `
                    <div class="jp-job-card jp-inactive" data-index="${index}" data-job-id="${job.id}">
                        <div class="jp-job-card-content">
                            <div class="jp-job-category">${categoryName}</div>
                            <h3 class="jp-job-title">${job.title}</h3>
                            <div class="jp-job-details">
                                <div class="jp-job-detail">
                                    <svg class="jp-job-detail-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v9A1.5 1.5 0 0 0 1.5 15h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zM1 4h14v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V4z"/>
                                    </svg>
                                    <span>${companyName}</span>
                                </div>
                                <div class="jp-job-detail">
                                    <svg class="jp-job-detail-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                    </svg>
                                    <span>${locationName}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                jpCarousel.insertAdjacentHTML('beforeend', jobCard);
            });


            // Add click listener to newly rendered cards for direct navigation
            jpCarousel.querySelectorAll('.jp-job-card').forEach((card, index) => {
                card.addEventListener('click', () => {
                    // Update the active state for visual feedback
                    currentIndex = index;
                    updateCarousel();

                    // Get the job ID from the data attribute
                    const jobId = card.dataset.jobId;
                    if (jobId) {
                        // Redirect to the detail page
                        window.location.href = `/detail_lowongan/${jobId}`;
                    } else {
                        console.warn('Job ID not found for the clicked card.');
                    }
                });
            });

            updateCarousel(); // Ensure correct initial active state and positioning
        }


        function applyFilters() {
            const searchKeyword = jpSearchInput.value.toLowerCase().trim();
            const selectedCategory = jpCategoryFilterSelect.value;
            const selectedLocation = jpLocationFilterSelect.value;

            let filteredJobs = allJobsFromBackend;

            if (searchKeyword) {
                filteredJobs = filteredJobs.filter(job =>
                    job.title.toLowerCase().includes(searchKeyword) ||
                    (job.description && job.description.toLowerCase().includes(searchKeyword)) ||
                    (job.responsibilities && job.responsibilities.toLowerCase().includes(searchKeyword)) ||
                    (job.qualifications && job.qualifications.toLowerCase().includes(searchKeyword)) ||
                    (job.skills && job.skills.some(skill => skill.name.toLowerCase().includes(searchKeyword)))
                );
            }

            if (selectedCategory) {
                filteredJobs = filteredJobs.filter(job => job.category && job.category.name === selectedCategory);
            }

            if (selectedLocation) {
                filteredJobs = filteredJobs.filter(job => job.location && job.location.name === selectedLocation);
            }

            if (currentFilters.tag) {
                filteredJobs = filteredJobs.filter(job => job.skills && job.skills.some(skill => skill.name === currentFilters.tag));
            }

            console.log('Applying Filters:', currentFilters);
            renderCarouselJobs(filteredJobs); // Render jobs into the carousel
            updateCategoryCardHighlight();
            updateJobTagHighlight();
            syncDropdownsWithFilters();
        }

        function filterByTag(tag) {
            if (currentFilters.tag === tag) {
                currentFilters.tag = '';
            } else {
                currentFilters.tag = tag;
            }
            applyFilters();
            console.log('Tag selected:', currentFilters);
        }

        function selectCategory(category) {
            if (currentFilters.category === category) {
                currentFilters.category = '';
            } else {
                currentFilters.category = category;
            }
            currentFilters.tag = ''; // Clear tag filter when category changes
            applyFilters();
            console.log('Category selected via card click:', currentFilters);
        }

        function updateCategoryCardHighlight() {
            const cards = document.querySelectorAll('.jp-category-card');
            cards.forEach(card => {
                card.classList.remove('jp-active-category');
                if (currentFilters.category && card.dataset.category === currentFilters.category) {
                    card.classList.add('jp-active-category');
                }
            });
        }

        function updateJobTagHighlight() {
            const tags = document.querySelectorAll('.jp-job-tag');
            if (!tags) return;
            tags.forEach(tagElement => {
                tagElement.classList.remove('jp-active-tag');
                if (currentFilters.tag && tagElement.dataset.tag === currentFilters.tag) {
                    tagElement.classList.add('jp-active-tag');
                }
            });
        }

        function syncDropdownsWithFilters() {
            if (jpCategoryFilterSelect) jpCategoryFilterSelect.value = currentFilters.category;
            if (jpLocationFilterSelect) jpLocationFilterSelect.value = currentFilters.location;
            if (jpSearchInput) jpSearchInput.value = currentFilters.keyword;
        }

        // --- Event Listeners and Initial Load ---
        document.addEventListener('DOMContentLoaded', () => {
            // Cache UI elements
            jpFilterBtn = document.getElementById('jpFilterBtn');
            jpFilterDropdown = document.getElementById('jpFilterDropdown');
            jpApplyFiltersBtn = document.getElementById('jpApplyFiltersBtn');
            jpSearchInput = document.getElementById('jpSearchInput');
            jpCategoryFilterSelect = document.getElementById('jpCategoryFilter');
            jpLocationFilterSelect = document.getElementById('jpLocationFilter');
            jpCategoriesGrid = document.getElementById('jpCategoriesGrid');
            jpJobTagsContainer = document.getElementById('jpJobTags');
            jpCarouselContainer = document.querySelector('.jp-carousel-container');
            jpCarousel = document.getElementById('jpCarousel');
            jpPrevBtn = document.getElementById('jpPrevBtn');
            jpNextBtn = document.getElementById('jpNextBtn');


            // Filter dropdown toggle
            if (jpFilterBtn) {
                jpFilterBtn.addEventListener('click', function(event) {
                    jpFilterDropdown.classList.toggle('show');
                    event.stopPropagation();
                });
            }

            if (jpFilterDropdown) {
                jpFilterDropdown.addEventListener('click', function(event) {
                    event.stopPropagation();
                });
            }

            // Apply filters button
            if (jpApplyFiltersBtn) {
                jpApplyFiltersBtn.addEventListener('click', function() {
                    currentFilters.keyword = jpSearchInput.value.trim();
                    currentFilters.category = jpCategoryFilterSelect.value;
                    currentFilters.location = jpLocationFilterSelect.value;
                    currentFilters.tag = ''; // Reset tag filter on main search
                    applyFilters();
                });
            }

            // Search input keyup for Enter key
            if (jpSearchInput) {
                jpSearchInput.addEventListener('keyup', (e) => {
                    if (e.key === 'Enter') {
                        currentFilters.keyword = jpSearchInput.value.trim();
                        applyFilters();
                    }
                });
            }

            // Category filter dropdown change
            if (jpCategoryFilterSelect) {
                jpCategoryFilterSelect.addEventListener('change', function() {
                    currentFilters.category = this.value;
                    currentFilters.tag = '';
                    applyFilters();
                });
            }

            // Location filter dropdown change
            if (jpLocationFilterSelect) {
                jpLocationFilterSelect.addEventListener('change', function() {
                    currentFilters.location = this.value;
                    currentFilters.tag = '';
                    applyFilters();
                });
            }

            // Close filter dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (jpFilterDropdown && !jpFilterDropdown.contains(event.target) && !jpFilterBtn.contains(event.target)) {
                    jpFilterDropdown.classList.remove('show');
                }
            });

            // Carousel Navigation
            if (jpNextBtn) jpNextBtn.addEventListener('click', goToNext);
            if (jpPrevBtn) jpPrevBtn.addEventListener('click', goToPrev);

            // Auto-play functionality (optional)
            // setInterval(goToNext, 5000); // Uncomment to enable auto-play

            // Keyboard navigation for carousel
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    goToPrev();
                } else if (e.key === 'ArrowRight') {
                    goToNext();
                }
            });

            // Initial rendering
            renderCategoryCardsDynamic();
            renderJobTagsDynamic(); // This will still render the tags, but they'll filter the carousel now
            applyFilters(); // Initial display of all jobs in the carousel

            const jpAccentBar1 = document.querySelector('.jp-accent-bar1');
            const jpAccentBar2 = document.querySelector('.jp-accent-bar2');
           
        });
    </script>
</body>
</html>