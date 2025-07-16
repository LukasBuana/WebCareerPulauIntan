<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perusahaan Total Food Solutions</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        .aboutnav {
            background: #DA251C;
            padding: 15px 0;
            position: relative;
            
        }

        .aboutnav-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 60px;
            

        }

        .aboutnav-item {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
            
        }

        .aboutnav-item.active {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .aboutnav-item.active::before {
            content: '';
            position: absolute;
            top: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 3px;
            background: #fbbf24;
            border-radius: 2px;
        }

        .aboutnav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        /* Section Styling - General */
        .section {
            background: #DA251C;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
            display: none; /* Hidden by default, managed by JS */
        }

        .section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="90" cy="20" r="1.5" fill="rgba(255,255,255,0.1)"/><circle cx="20" cy="80" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="90" r="1.5" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity: 0.3;
        }

        /* About Section Specifics */
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .text-content {
            color: white;
        }

        .company-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 30px;
        }

        .company-title .highlight {
            color: #fbbf24;
            font-style: italic;
        }

        .company-description {
            font-size: 1.2rem;
            line-height: 1.7;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .company-tagline {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 40px;
            opacity: 0.8;
        }

        .learn-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .learn-more-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(5px);
        }

        .learn-more-btn::after {
            content: '→';
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .learn-more-btn:hover::after {
            transform: translateX(5px);
        }

        .images-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            height: 500px;
        }

        .image-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .image-card:hover {
            transform: translateY(-10px);
        }

        .image-card.large {
            grid-row: span 2;
        }

        .image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Visi & Misi Section Specifics */
        .visi-misi-section .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 1000px;
        }

        .circular-diagram {
            position: relative;
            width: 800px;
            height: 800px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .center-circle {
            position: absolute;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .visi-content {
            text-align: center;
            color: white;
        }

        .visi-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .visi-content p {
            font-size: 1.2rem;
            line-height: 1.5;
            margin-bottom: 5px;
        }

        .visi-content em {
            font-style: italic;
            color: #fbbf24;
        }

        .outer-circle {
            position: absolute;
            width: 600px;
            height: 600px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            z-index: 1;
        }

        .misi-label {
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            text-align: center;
            z-index: 15;
        }

        .misi-label h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .mission-points {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .mission-point {
            position: absolute;
            color: white;
            font-size: 1rem;
            line-height: 1.4;
            max-width: 180px;
            text-align: center;
            z-index: 5;
        }

        .mission-point em {
            font-style: italic;
            color: #fbbf24;
        }

        .mission-1 {
            top: 100px;
            left: 50px;
        }

        .mission-2 {
            top: 100px;
            right: 50px;
        }

        .mission-3 {
            bottom: 100px;
            left: 50px;
        }

        .mission-4 {
            bottom: 100px;
            right: 50px;
        }

        .connecting-lines {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        .line {
            position: absolute;
            background: rgba(255, 255, 255, 0.4);
            height: 2px;
            transform-origin: center;
        }

        .line-1 {
            top: 180px;
            left: 180px;
            width: 140px;
            transform: rotate(-45deg);
        }

        .line-2 {
            top: 180px;
            right: 180px;
            width: 140px;
            transform: rotate(45deg);
        }

        .line-3 {
            bottom: 180px;
            left: 180px;
            width: 140px;
            transform: rotate(45deg);
        }

        .line-4 {
            bottom: 180px;
            right: 180px;
            width: 140px;
            transform: rotate(-45deg);
        }

        /* Nilai & Budaya Section Specifics */
        .nilai-budaya-section {
            /* Inherits general .section styles, no need to duplicate background, min-height, etc. */
            align-items: center;
            justify-content: center; /* Center content vertically and horizontally */
        }

        .nilai-budaya-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .text-content-nilai {
            color: white;
        }

        .section-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 40px;
        }

        .nilai-description {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .nilai-description strong {
            font-weight: 700;
            color: #fbbf24;
        }

        .nilai-diagram {
            position: relative;
            width: 500px;
            height: 500px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nilai-center {
            position: absolute;
            width: 180px;
            height: 180px;
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            border: 8px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .center-word {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            letter-spacing: 2px;
        }

        .nilai-circles {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .nilai-circle {
            position: absolute;
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1e40af;
            font-weight: 600;
            font-size: 1rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            z-index: 5;
        }

        .nilai-circle:hover {
            transform: scale(1.1);
            background: white;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .nilai-1 {
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .nilai-2 {
            top: 25%;
            right: 0;
            transform: translateY(-50%);
        }

        .nilai-3 {
            bottom: 25%;
            right: 0;
            transform: translateY(50%);
        }

        .nilai-4 {
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .nilai-5 {
            top: 25%;
            left: 0;
            transform: translateY(-50%);
        }

        .connecting-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .shape-1 {
            top: 80px;
            left: 170px;
            width: 160px;
            height: 20px;
            transform: rotate(-35deg);
        }

        .shape-2 {
            top: 120px;
            right: 80px;
            width: 140px;
            height: 20px;
            transform: rotate(35deg);
        }

        .shape-3 {
            bottom: 120px;
            right: 80px;
            width: 140px;
            height: 20px;
            transform: rotate(-35deg);
        }

        .shape-4 {
            bottom: 80px;
            left: 170px;
            width: 160px;
            height: 20px;
            transform: rotate(35deg);
        }

        .shape-5 {
            top: 120px;
            left: 80px;
            width: 140px;
            height: 20px;
            transform: rotate(-35deg);
        }


        /* Responsive */
        @media (max-width: 768px) {
            .aboutnav-container {
                flex-direction: column;
                gap: 20px;
            }

            .about-content {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .company-title {
                font-size: 2.5rem;
            }

            .images-grid {
                height: 400px;
            }

            .circular-diagram {
                width: 600px;
                height: 600px;
            }

            .center-circle {
                width: 250px;
                height: 250px;
            }

            .visi-content h2 {
                font-size: 2rem;
            }

            .visi-content p {
                font-size: 1rem;
            }

            .outer-circle {
                width: 450px;
                height: 450px;
            }

            .mission-point {
                font-size: 0.9rem;
                max-width: 140px;
            }

            .mission-1 {
                top: 80px;
                left: 30px;
            }

            .mission-2 {
                top: 80px;
                right: 30px;
            }

            .mission-3 {
                bottom: 80px;
                left: 30px;
            }

            .mission-4 {
                bottom: 80px;
                right: 30px;
            }

            .nilai-budaya-content {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .section-title {
                font-size: 2.5rem;
            }

            .nilai-diagram {
                width: 400px;
                height: 400px;
            }

            .nilai-center {
                width: 140px;
                height: 140px;
            }

            .center-word {
                font-size: 1.2rem;
            }

            .nilai-circle {
                width: 100px;
                height: 100px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .company-title {
                font-size: 2rem;
            }

            .company-description {
                font-size: 1rem;
            }

            .images-grid {
                grid-template-columns: 1fr;
                height: 300px;
            }

            .image-card.large {
                grid-row: span 1;
            }

            .circular-diagram {
                width: 400px;
                height: 400px;
            }

            .center-circle {
                width: 200px;
                height: 200px;
            }

            .visi-content h2 {
                font-size: 1.5rem;
            }

            .visi-content p {
                font-size: 0.9rem;
            }

            .outer-circle {
                width: 300px;
                height: 300px;
            }

            .mission-point {
                font-size: 0.8rem;
                max-width: 100px;
            }

            .misi-label h2 {
                font-size: 2rem;
            }

            .line {
                width: 80px;
            }

            .line-1 {
                top: 120px;
                left: 120px;
            }

            .line-2 {
                top: 120px;
                right: 120px;
            }

            .line-3 {
                bottom: 120px;
                left: 120px;
            }

            .line-4 {
                bottom: 120px;
                right: 120px;
            }

            .nilai-budaya-content {
                text-align: center;
            }

            .section-title {
                font-size: 2rem;
            }

            .nilai-description {
                font-size: 1rem;
            }

            .nilai-diagram {
                width: 300px;
                height: 300px;
            }

            .nilai-center {
                width: 120px;
                height: 120px;
            }

            .center-word {
                font-size: 1rem;
            }

            .nilai-circle {
                width: 80px;
                height: 80px;
                font-size: 0.8rem;
            }

            .shape {
                width: 80px;
                height: 15px;
            }
        }
    </style>
</head>
<body>
    <nav class="aboutnav">
        <div class="aboutcontainer">
            <div class="aboutnav-container">
                <a href="#" class="aboutnav-item active" data-target-section="about-section">Siapa Kami</a>
                <a href="#" class="aboutnav-item" data-target-section="visi-misi-section">Visi & Misi</a>
                <a href="#" class="aboutnav-item" data-target-section="nilai-budaya-section">Nilai Kami</a>
            </div>
        </div>
    </nav>

    <section class="section about-section" id="about-section">
        <div class="container">
            <div class="about-content">
                <div class="text-content">
                    <h1 class="company-title">
                        Perusahaan <span class="highlight">Total<br>Food Solutions</span>
                    </h1>
                    
                    <p class="company-description">
                        Kami adalah Perusahaan yang beroperasi di segala tahap 
                        pengolahan makanan, mulai dari produksi dan pemrosesan 
                        bahan mentah, hingga produk siap pakai di pasaran.
                    </p>
                    
                    <p class="company-tagline">
                        Kini, Indofood dikenal sebagai perusahaan terkemuka yang 
                        menjadi acuan di setiap lini bisnis di mana kami beroperasi.
                    </p>
                    
                    <a href="#" class="learn-more-btn">
                        Selengkapnya
                    </a>
                </div>
                
                <div class="images-grid">
                    <div class="image-card large">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Modern Office Building">
                    </div>
                    <div class="image-card">
                        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Business Team Meeting">
                    </div>
                    <div class="image-card">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Food Production">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section visi-misi-section" id="visi-misi-section">
        <div class="container">
            <div class="visi-misi-content">
                <div class="circular-diagram">
                    <div class="mission-points">
                        <div class="mission-point mission-1">
                            <p>Memberikan solusi atas kebutuhan pangan secara berkelanjutan</p>
                        </div>
                        <div class="mission-point mission-2">
                            <p>Senantiasa meningkatkan kompetensi karyawan, proses produksi dan teknologi kami</p>
                        </div>
                        <div class="mission-point mission-3">
                            <p>Memberikan kontribusi bagi kesejahteraan masyarakat dan lingkungan secara berkelanjutan</p>
                        </div>
                        <div class="mission-point mission-4">
                            <p>Meningkatkan <em>stakeholders' values</em> secara berkesinambungan</p>
                        </div>
                    </div>
                    
                    <div class="center-circle">
                        <div class="visi-content">
                            <h2>Visi</h2>
                            <p>Perusahaan</p>
                            <p><em>Total Food Solutions</em></p>
                        </div>
                    </div>
                    
                    <div class="misi-label">
                        <h2>Misi</h2>
                    </div>
                    
                    <div class="connecting-lines">
                        <div class="line line-1"></div>
                        <div class="line line-2"></div>
                        <div class="line line-3"></div>
                        <div class="line line-4"></div>
                    </div>
                    
                    <div class="outer-circle"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section nilai-budaya-section" id="nilai-budaya-section">
        <div class="container">
            <div class="nilai-budaya-content">
                <div class="text-content-nilai">
                    <h1 class="section-title">
                        Nilai & Budaya Perusahaan
                    </h1>
                    <p class="nilai-description">
                        Di **Perusahaan Total Food Solutions**, kami berkomitmen pada nilai-nilai inti yang membentuk budaya kerja kami. Nilai-nilai ini menjadi panduan dalam setiap keputusan dan tindakan, memastikan kami tetap berpegang pada integritas, inovasi, dan kepedulian terhadap pelanggan. Kami percaya bahwa dengan menjunjung tinggi nilai-nilai ini, kami dapat mencapai keunggulan berkelanjutan dan memberikan dampak positif.
                    </p>
                    <p class="nilai-description">
                        Budaya kami adalah fondasi bagi pertumbuhan dan keberhasilan kami. Kami mendorong lingkungan kolaboratif di mana setiap individu dapat berkembang, berkontribusi, dan meraih potensi penuh mereka.
                    </p>
                </div>
                
                <div class="nilai-diagram">
                    <div class="nilai-center">
                        <span class="center-word">INOVASI</span>
                    </div>
                    <div class="nilai-circles">
                        <div class="nilai-circle nilai-1">Integritas</div>
                        <div class="nilai-circle nilai-2">Pelayanan Prima</div>
                        <div class="nilai-circle nilai-3">Kolaborasi</div>
                        <div class="nilai-circle nilai-4">Keberlanjutan</div>
                        <div class="nilai-circle nilai-5">Tanggung Jawab</div>
                    </div>
                    <div class="connecting-shapes">
                        <div class="shape shape-1"></div>
                        <div class="shape shape-2"></div>
                        <div class="shape shape-3"></div>
                        <div class="shape shape-4"></div>
                        <div class="shape shape-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Navigation functionality
        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.aboutnav-item'); // Changed to .nav-item
            const sections = document.querySelectorAll('.section'); // Select all sections with the 'section' class
            
            navItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all nav items
                    navItems.forEach(nav => nav.classList.remove('active'));
                    
                    // Add active class to clicked item
                    this.classList.add('active');
                    
                    // Get the target section ID from data-target-section attribute
                    const targetSectionId = this.getAttribute('data-target-section');
                    
                    // Show/hide sections based on the targetSectionId
                    sections.forEach(section => {
                        if (section.id === targetSectionId) {
                            section.style.display = 'flex';
                        } else {
                            section.style.display = 'none';
                        }
                    });
                });
            });
            
            // Initially show the 'Siapa Kami' section
            document.getElementById('about-section').style.display = 'flex';
        });
    </script>
</body>
</html>