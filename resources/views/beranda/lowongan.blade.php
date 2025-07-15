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
            padding: 30px 0;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .carousel-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            margin-bottom: 60px;
        }
        .carousel {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            overflow: hidden;
            width: 800px;
            position: relative;
        }

        .lowongansection-title {
            font-size: medium;
            font-weight: 800;
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
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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
            gap: 10px;
            margin-bottom: -10px;
            margin-top: -10px;
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
            font-size: 1.0rem;
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
            padding: 10px 0;
        }
      

        .latest-jobs h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .accent-bar {
            width: 80px;
            height: 4px;
            background: #ffb84d;
            margin: 0 auto 40px;
            border-radius: 2px;
        }
        .accent-bar1 {
            width: 80px;
            height: 4px;
            background: #ffb84d;
            margin: 0 auto 40px;
            border-radius: 2px;
            margin-top: 50px;
            margin-left: 187px;
        }

          .accent-bar2 {
            width: 80px;
            height: 4px;
            background: transparent;
            margin: 0 auto 40px;
            border-radius: 2px;
            margin-top: 50px;
            margin-left: 187px;
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

        .job-tag.active-tag {
            background: #2c5aa0; /* Highlight active tag */
            color: white;
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
            border-radius: 16px;
            padding: 30px;
            min-width: 300px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .job-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #3498db, #2980b9);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .job-card.active::before {
            opacity: 1;
        }

        .job-card.active {
            transform: scale(1.1);
            box-shadow: 0 10px 40px rgba(52, 152, 219, 0.3);
            z-index: 2;
        }

        .job-card.inactive {
            transform: scale(0.9);
            opacity: 0.7;
        }

        .job-card-content {
            position: relative;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .job-card.active .job-card-content {
            color: white;
        }
        .job-card.active .job-title {
            color: white;
        }
        .job-card.active .job-details {
            color: rgba(255, 255, 255, 0.9);
        }


        @media (max-width: 768px) {
            .search-container {
                flex-direction: column;
                gap: 10px;
            }
             .carousel {
                width: 100%;
                max-width: 350px;
            }

            .job-card {
                min-width: 280px;
                padding: 25px;
            }

            .carousel-container {
                gap: 15px;
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
    <div class="accent-bar2"></div>
    <div class="accent-bar1"></div>
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
                <h2 class="lowongansection-title">Kategori Pekerjaan Berdasarkan Fungsi</h2>
                <a href="#" class="view-all">Lainnya ></a>
            </div>

            <div class="categories-grid" id="categoriesGrid">
                </div>
        </div>

        <div class="latest-jobs">
            <h2>Lowongan Terbaru</h2>
            <div class="accent-bar"></div>
            <div class="carousel-container">
            <button class="nav-button" id="prevBtn">‹</button>
            
            <div class="carousel" id="carousel">
                <div class="job-card inactive" data-index="0">
                    <div class="job-card-content">
                        <div class="job-category">Production</div>
                        <h3 class="job-title">Production Section Supervisor</h3>
                        <div class="job-details">
                            <div class="job-detail">
                                <svg class="job-detail-icon" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4z"/>
                                </svg>
                                <span>ICBP - Noodle</span>
                            </div>
                            <div class="job-detail">
                                <svg class="job-detail-icon" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                                <span>Bekasi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job-card active" data-index="1">
                    <div class="job-card-content">
                        <div class="job-category">Production</div>
                        <h3 class="job-title">Operator</h3>
                        <div class="job-details">
                            <div class="job-detail">
                                <svg class="job-detail-icon" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4z"/>
                                </svg>
                                <span>ICBP - Noodle</span>
                            </div>
                            <div class="job-detail">
                                <svg class="job-detail-icon" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                                <span>Bekasi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job-card inactive" data-index="2">
                    <div class="job-card-content">
                        <div class="job-category">Accounting</div>
                        <h3 class="job-title">Accounting Staff</h3>
                        <div class="job-details">
                            <div class="job-detail">
                                <svg class="job-detail-icon" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4z"/>
                                </svg>
                                <span>ICBP - NICI</span>
                            </div>
                            <div class="job-detail">
                                <svg class="job-detail-icon" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                                <span>Karawang</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job-card inactive" data-index="3">
                    <div class="job-card-content">
                        <div class="job-category">Marketing</div>
                        <h3 class="job-title">Marketing Manager</h3>
                        <div class="job-details">
                            <div class="job-detail">
                                <svg class="job-detail-icon" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4z"/>
                                </svg>
                                <span>ICBP - Dairy</span>
                            </div>
                            <div class="job-detail">
                                <svg class="job-detail-icon" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                                <span>Jakarta</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job-card inactive" data-index="4">
                    <div class="job-card-content">
                        <div class="job-category">IT</div>
                        <h3 class="job-title">Software Developer</h3>
                        <div class="job-details">
                            <div class="job-detail">
                                <svg class="job-detail-icon" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4z"/>
                                </svg>
                                <span>ICBP - Corporate</span>
                            </div>
                            <div class="job-detail">
                                <svg class="job-detail-icon" viewBox="0 0 16 16" fill="currentColor">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                                <span>Jakarta</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <button class="nav-button" id="nextBtn">›</button>
        </div>
   

    <script>
        // Sample Job Data (this would typically come from an API)
        const allJobs = [
            {
                id: 1,
                title: "Sales Executive",
                company: "PT. Indofood Sukses Makmur Tbk.",
                location: "Jakarta",
                category: "Sales",
                type: "Full-time",
                tags: ["Sales", "Marketing", "FMCG"]
            },
            {
                id: 2,
                title: "Production Supervisor",
                company: "PT. Indofood CBP Sukses Makmur Tbk.",
                location: "Surabaya",
                category: "Manufacturing",
                type: "Full-time",
                tags: ["Production", "Manufacturing", "Supply Chain"]
            },
            {
                id: 3,
                title: "HR Staff",
                company: "PT. Indofood Group",
                location: "Bandung",
                category: "Human Resources",
                type: "Full-time",
                tags: ["HR", "Recruitment", "Admin"]
            },
            {
                id: 4,
                title: "Mechanical Engineer",
                company: "PT. Indofood Fortuna Inti",
                location: "Jakarta",
                category: "Engineering",
                type: "Full-time",
                tags: ["Engineering", "Maintenance", "Machinery"]
            },
            {
                id: 5,
                title: "Finance Analyst",
                company: "PT. Indofood Sukses Makmur Tbk.",
                location: "Medan",
                category: "Finance",
                type: "Full-time",
                tags: ["Finance", "Accounting", "Analysis"]
            },
            {
                id: 6,
                title: "IT Support Specialist",
                company: "PT. Indofood Group",
                location: "Jakarta",
                category: "IT & Technology",
                type: "Full-time",
                tags: ["IT", "Support", "Network"]
            },
            {
                id: 7,
                title: "Digital Marketing Specialist",
                company: "PT. Indofood CBP Sukses Makmur Tbk.",
                location: "Bandung",
                category: "Marketing",
                type: "Full-time",
                tags: ["Marketing", "Digital", "Social Media"]
            },
            {
                id: 8,
                title: "Logistics Coordinator",
                company: "PT. Indofood Sukses Makmur Tbk.",
                location: "Surabaya",
                category: "Logistics",
                type: "Full-time",
                tags: ["Logistics", "Supply Chain", "Warehouse"]
            },
            {
                id: 9,
                title: "Senior Sales Manager",
                company: "PT. Indofood Sukses Makmur Tbk.",
                location: "Jakarta",
                category: "Sales",
                type: "Full-time",
                tags: ["Sales", "Management", "Leadership"]
            },
            {
                id: 10,
                title: "Quality Control Staff",
                company: "PT. Indofood CBP Sukses Makmur Tbk.",
                location: "Semarang",
                category: "Manufacturing",
                type: "Full-time",
                tags: ["Quality Control", "Manufacturing"]
            }
        ];

        // Functions to render elements
        function renderCategoryCards() {
            const categoriesGrid = document.getElementById('categoriesGrid');
            categoriesGrid.innerHTML = ''; // Clear existing cards

            const categoryCounts = {};
            allJobs.forEach(job => {
                categoryCounts[job.category] = (categoryCounts[job.category] || 0) + 1;
            });

            const categories = [
                { name: "Sales", icon: "📊" },
                { name: "Manufacturing", icon: "🏭" },
                { name: "Human Resources", icon: "👥" },
                { name: "Engineering", icon: "⚙️" },
                { name: "Finance", icon: "💰" },
                { name: "IT & Technology", icon: "💻" },
                { name: "Marketing", icon: "📢" },
                { name: "Logistics", icon: "🚚" }
            ];

            categories.forEach(cat => {
                const count = categoryCounts[cat.name] || 0;
                const card = `
                    <div class="category-card" data-category="${cat.name}">
                        <div class="category-header">
                            <div class="category-icon">${cat.icon}</div>
                            <div>
                                <div class="category-title">${cat.name} (${count})</div>
                                <div class="category-count">${count} Posisi</div>
                            </div>
                        </div>
                    </div>
                `;
                categoriesGrid.insertAdjacentHTML('beforeend', card);
            });
            // Add event listeners to newly created cards
            categoriesGrid.querySelectorAll('.category-card').forEach(card => {
                card.addEventListener('click', () => selectCategory(card.dataset.category));
            });
        }

        function renderJobTags() {
            const jobTagsContainer = document.getElementById('jobTags');
            jobTagsContainer.innerHTML = ''; // Clear existing tags

            const uniqueTags = new Set();
            allJobs.forEach(job => {
                job.tags.forEach(tag => uniqueTags.add(tag));
            });

            // Sort tags alphabetically
            const sortedTags = Array.from(uniqueTags).sort();

            sortedTags.forEach(tag => {
                const tagElement = `<div class="job-tag" data-tag="${tag}">${tag}</div>`;
                jobTagsContainer.insertAdjacentHTML('beforeend', tagElement);
            });
            // Add event listeners to newly created tags
            jobTagsContainer.querySelectorAll('.job-tag').forEach(tagElement => {
                tagElement.addEventListener('click', () => filterByTag(tagElement.dataset.tag));
            });
        }

        function renderJobListings(jobsToDisplay) {
            const jobListingsContainer = document.getElementById('jobListings');
            jobListingsContainer.innerHTML = ''; // Clear existing listings

            if (jobsToDisplay.length === 0) {
                jobListingsContainer.innerHTML = '<p style="text-align: center; color: #777; padding: 20px;">Tidak ada lowongan yang ditemukan untuk filter yang dipilih.</p>';
                return;
            }

            jobsToDisplay.forEach(job => {
                const tagsHtml = job.tags.map(tag => `<span>${tag}</span>`).join('');
                const jobCard = `
                    <div class="job-card">
                        <h3>${job.title}</h3>
                        <p><strong>Perusahaan:</strong> ${job.company}</p>
                        <p><strong>Kategori:</strong> ${job.category}</p>
                        <p class="location"><strong>Lokasi:</strong> ${job.location}</p>
                        <p class="type"><strong>Tipe:</strong> ${job.type}</p>
                        <div class="tags">${tagsHtml}</div>
                    </div>
                `;
                jobListingsContainer.insertAdjacentHTML('beforeend', jobCard);
            });
        }

        // Filtering Logic
        let currentFilters = {
            keyword: '',
            category: '',
            location: '',
            tag: ''
        };

        function applyFilters() {
            let filteredJobs = allJobs;

            // Filter by keyword
            if (currentFilters.keyword) {
                const keywordLower = currentFilters.keyword.toLowerCase();
                filteredJobs = filteredJobs.filter(job =>
                    job.title.toLowerCase().includes(keywordLower) ||
                    job.company.toLowerCase().includes(keywordLower) ||
                    job.category.toLowerCase().includes(keywordLower) ||
                    job.location.toLowerCase().includes(keywordLower) ||
                    job.tags.some(tag => tag.toLowerCase().includes(keywordLower))
                );
            }

            // Filter by category
            if (currentFilters.category) {
                filteredJobs = filteredJobs.filter(job => job.category === currentFilters.category);
            }

            // Filter by location
            if (currentFilters.location) {
                filteredJobs = filteredJobs.filter(job => job.location === currentFilters.location);
            }

            // Filter by tag
            if (currentFilters.tag) {
                filteredJobs = filteredJobs.filter(job => job.tags.includes(currentFilters.tag));
            }
            
            console.log('Applying Filters:', currentFilters); // Debugging: Check filter state
            renderJobListings(filteredJobs);
            updateCategoryCardHighlight(); // Always update highlights after applying filters
            updateJobTagHighlight();
            syncDropdownsWithFilters(); // Ensure dropdowns and search input reflect currentFilters state
        }

        // --- UI Elements ---
        const filterBtn = document.getElementById('filterBtn');
        const filterDropdown = document.getElementById('filterDropdown');
        const applyFiltersBtn = document.getElementById('applyFiltersBtn');
        const searchInput = document.getElementById('searchInput');
        const categoryFilterSelect = document.getElementById('categoryFilter');
        const locationFilterSelect = document.getElementById('locationFilter');

        // --- Event Listeners ---
        filterBtn.addEventListener('click', function(event) {
            filterDropdown.classList.toggle('show');
            event.stopPropagation(); // Prevent click from closing immediately
        });

        // Add this new event listener to the filterDropdown
        // Ini adalah perbaikan utama: Menghentikan event click agar tidak menyebar ke dokumen saat diklik di dalam dropdown.
        filterDropdown.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent clicks inside the dropdown from propagating to document
        });

        applyFiltersBtn.addEventListener('click', function() {
            // Update currentFilters from search input and dropdowns
            currentFilters.keyword = searchInput.value.trim();
            currentFilters.category = categoryFilterSelect.value;
            currentFilters.location = locationFilterSelect.value;
            currentFilters.tag = ''; // Clear tag filter when applying main filters from search bar
            
            applyFilters();
            filterDropdown.classList.remove('show'); // Hide dropdown after applying
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                currentFilters.keyword = searchInput.value.trim();
                currentFilters.tag = ''; // Clear tag if searching by keyword
                applyFilters();
            }
        });

        categoryFilterSelect.addEventListener('change', function() {
            currentFilters.category = this.value;
            currentFilters.tag = ''; // Clear tag if category selected from dropdown (common UX)
            applyFilters();
        });

        locationFilterSelect.addEventListener('change', function() {
            currentFilters.location = this.value;
            currentFilters.tag = ''; // Clear tag if location selected from dropdown (common UX)
            applyFilters();
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', function(event) {
            if (!filterDropdown.contains(event.target) && !filterBtn.contains(event.target)) {
                filterDropdown.classList.remove('show');
            }
        });

        // --- Filter Selection Functions ---
        function selectCategory(category) {
            // Toggle behavior: If the same category is clicked again, unselect it
            if (currentFilters.category === category) {
                currentFilters.category = '';
            } else {
                currentFilters.category = category;
            }
            
            // Clear tag filter if a category card is clicked
            currentFilters.tag = ''; 

            applyFilters();
            console.log('Category selected via card click:', currentFilters); // Debugging
        }

        function filterByTag(tag) {
            // Toggle behavior: If the same tag is clicked again, unselect it
            if (currentFilters.tag === tag) {
                currentFilters.tag = '';
            } else {
                currentFilters.tag = tag;
            }
            
            applyFilters();
            console.log('Tag selected:', currentFilters); // Debugging
        }

        // --- UI Synchronization Functions ---
        function updateCategoryCardHighlight() {
            const cards = document.querySelectorAll('.category-card');
            cards.forEach(card => {
                card.classList.remove('active-category');
                if (currentFilters.category && card.dataset.category === currentFilters.category) {
                    card.classList.add('active-category');
                }
            });
        }

        function updateJobTagHighlight() {
            const tags = document.querySelectorAll('.job-tag');
            tags.forEach(tagElement => {
                tagElement.classList.remove('active-tag');
                if (currentFilters.tag && tagElement.dataset.tag === currentFilters.tag) {
                    tagElement.classList.add('active-tag');
                }
            });
        }

        // This function ensures the dropdowns and search input visually match the currentFilters state
        function syncDropdownsWithFilters() {
            categoryFilterSelect.value = currentFilters.category;
            locationFilterSelect.value = currentFilters.location;
            searchInput.value = currentFilters.keyword; 
        }

        // --- Initial Rendering ---
        document.addEventListener('DOMContentLoaded', () => {
            renderCategoryCards();
            renderJobTags();
            applyFilters(); // Display all jobs initially based on empty filters
        });
    </script>
</body>
</html>