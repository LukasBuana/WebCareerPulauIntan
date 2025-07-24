<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Carousel with Testimonials</title>
    <style>
        /* Global reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Testimonial Container - Main wrapper for the carousel */
        .ts-carousel-container {
            position: relative;
            width: 100%;
            max-width: 900px; /* Adjust as needed */
            max-height: 1200px;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 40px auto; /* Added margin for better centering */
        }

        /* Navigation Arrows */
        .ts-nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 30; /* Higher z-index to be clearly above cards */
            background: #b3aeaeff;
            border: none;
            border-radius: 50%;
            padding: 0.75rem;
            cursor: pointer;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1; /* Fully opaque for arrows as seen in image */
        }

        .ts-nav-arrow:hover {
            background: #DA251C;
            transform: translateY(-50%) scale(1.1);
        }

        .ts-nav-arrow-left {
            left: 20px; /* Position closer to the edge */
        }

        .ts-nav-arrow-right {
            right: 20px; /* Position closer to the edge */
        }

        .ts-nav-arrow svg {
            width: 1.5rem;
            height: 1.5rem;
            color: #e7e6e6ff;
        }

        /* Main Carousel Area - This will be the viewport for the cards */
        .ts-carousel-main {
            width: 100%;
            overflow: hidden; /* Hide horizontal scrollbar */
            position: relative;
            z-index: 10;
        }

        .ts-cards-wrapper {
            display: flex;
            scroll-behavior: smooth;
            align-items: center;
            justify-content: center; /* Center cards initially for layout */
            position: relative; /* For absolute positioning of cards */
            height: 500px; /* Fixed height to accommodate active card and side effects */
            padding: 0 100px; /* Padding for arrows not to overlap cards visually */
            box-sizing: content-box; /* Important for padding calculations */
            perspective: 1500px; /* Perspektif untuk efek 3D flip */
            transform-style: preserve-3d; /* Pastikan anak-anak juga dalam ruang 3D */
        }

        /* Individual Carousel Card */
        .ts-carousel-card {
            flex-shrink: 0;
            width: 300px; /* Base width for inactive cards */
            height: 800px; /* Base height for inactive cards */
            border-radius: 1rem; /* More rounded corners */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); /* Stronger shadow */
            transition: all 1.5s cubic-bezier(0.68, -0.55, 0.265, 1.55); /* More playful transition */
            cursor: pointer;
            position: absolute; /* Position cards absolutely within the wrapper */
            top: 50%;
            left: 50%; /* Initial position, will be overridden by JS */
            transform-origin: center center; /* Ensure transformations happen from the center */
            display: flex;
            flex-direction: column;
            justify-content: flex-end; /* Align title to bottom */
            background-color: transparent; /* Fallback */
            will-change: transform, opacity, z-index, width, height; /* Performance hint */
            overflow: hidden; /* Penting untuk clipping konten saat flip */
        }

        .ts-carousel-card.active {
            width: 300px; /* Larger width for active card */
            height: 800px; /* Larger height for active card */
            z-index: 20; /* Ensure active card is on top */
            box-shadow: 0 25px 50px rgba(255, 0, 0, 0.3); /* Even stronger shadow for active */
            transform: translate(-50%, -50%) scale(1); /* Ensure no additional scale */
            opacity: 1; /* Fully opaque */
        }

        /* --- Flip Card Styles --- */
        .ts-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 1.5s; /* Transisi untuk flip */
            transform-style: preserve-3d; /* Penting untuk flip 3D */
            border-radius: 1rem; /* Sesuaikan radius border kartu */
            /* Hapus overflow: hidden dari sini, pindah ke .ts-carousel-card */
        }

        .ts-carousel-card.flipped .ts-card-inner {
            transform: rotateY(180deg); /* Ini yang membalik inner card */
        }

        .ts-card-front, .ts-card-back {
            position: absolute; /* Tetap absolute untuk tumpukan */
            width: 100%;
            height: 100%;
            backface-visibility: hidden; /* Sembunyikan sisi belakang elemen saat menghadap jauh */
            border-radius: 1rem; /* Sesuaikan radius border kartu */
            display: flex; /* Menggunakan flexbox untuk tata letak konten */
            flex-direction: column;
            align-items: center;
            padding: 1rem;
            /* Hapus overflow: hidden dari sini */
        }

        .ts-card-front {
            background-color: white; /* Fallback */
            z-index: 2;
            transform: rotateY(0deg); /* Sisi depan menghadap ke depan */
            justify-content: flex-end; /* Sejajarkan judul ke bawah untuk depan */
        }

        .ts-card-back {
            background-color: #DA251C; /* Latar belakang terang untuk testimonial */
            color: white; /* Warna teks gelap agar kontras */
            transform: rotateY(180deg); /* Sisi belakang mulai dengan terbalik */
            justify-content: center; /* Pusatkan teks testimonial secara vertikal */
            text-align: center; /* Pastikan teks di tengah */
            font-size: 1.1rem; /* Ukuran font yang jelas */
            line-height: 1.6; /* Jarak baris untuk keterbacaan */
            padding: 2rem; /* Padding di sekitar teks */
            box-shadow: inset 0 0 15px rgba(0,0,0,0.1); /* Bayangan dalam halus */
            overflow-y: auto; /* Aktifkan scroll untuk testimonial panjang */
        }

        .ts-card-back p {
            /* Pastikan paragraf testimonial mengisi ruang dengan baik */
            margin: 0;
            padding: 0;
            width: 100%; /* Pastikan mengisi lebar yang tersedia */
            /* overflow-y: auto; dihapus dari sini karena sudah di .ts-card-back */
        }

        /* Image within card */
        .ts-card-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Cover the card area */
            border-radius: 1rem; /* Match card border-radius */
        }

        /* Title within card */
        .ts-card-title {
            position: relative;
            z-index: 2; /* Ensure title is above the image */
            font-size: 1.6rem; /* Larger font size for titles */
            font-weight: bold;
            color: #fff; /* White text for contrast on image */
            text-align: center;
            padding: 1.5rem 1rem; /* More padding */
            background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0)); /* Stronger gradient overlay */
            text-shadow: 0 2px 6px rgba(0,0,0,0.7); /* Stronger text shadow for readability */
            pointer-events: none; /* Allow clicks to pass through to the card */
        }

        /* Responsive adjustments (tetap sama) */
        @media (max-width: 1024px) {
            .ts-carousel-card { width: 250px; height: 350px; }
            .ts-carousel-card.active { width: 350px; height: 450px; }
            .ts-card-title { font-size: 1.4rem; padding: 1.2rem 0.8rem; }
            .ts-cards-wrapper { height: 450px; }
        }

        @media (max-width: 768px) {
            .ts-carousel-main { padding: 0; }
            .ts-cards-wrapper { height: 400px; padding: 0 50px; }
            .ts-carousel-card { width: 200px; height: 300px; }
            .ts-carousel-card.active { width: 300px; height: 400px; }
            .ts-card-title { font-size: 1.2rem; padding: 1rem 0.6rem; }
            .ts-nav-arrow { padding: 0.6rem; }
            .ts-nav-arrow svg { width: 1.25rem; height: 1.25rem; }
            .ts-nav-arrow-left { left: 10px; }
            .ts-nav-arrow-right { right: 10px; }
        }

        @media (max-width: 480px) {
            .ts-cards-wrapper { height: 350px; padding: 0 30px; }
            .ts-carousel-card { width: 150px; height: 220px; }
            .ts-carousel-card.active { width: 240px; height: 320px; }
            .ts-card-title { font-size: 1rem; padding: 0.8rem 0.4rem; }
            .ts-nav-arrow { padding: 0.4rem; top: 45%; }
            .ts-nav-arrow svg { width: 1rem; height: 1rem; }
            .ts-nav-arrow-left { left: 5px; }
            .ts-nav-arrow-right { right: 5px; }
        }
    </style>
</head>
<body>
    <div class="ts-carousel-container">
        <button class="ts-nav-arrow ts-nav-arrow-left" id="prevSlideBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"/>
            </svg>
        </button>

        <button class="ts-nav-arrow ts-nav-arrow-right" id="nextSlideBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"/>
            </svg>
        </button>

        <div class="ts-carousel-main">
            <div id="ts-cards-wrapper" class="ts-cards-wrapper">
                </div>
        </div>
    </div>

    <script>
        // Start of IIFE to encapsulate variables
        (function() {
            const carouselItems = [
                {
                    id: 1,
                    title: "PT. PULAUINTAN",
                    image: "images/BundaMulia.jpg",
                    testimonial: "We are appreciate PT. Pulauintan Bajaperkasa Konstruksi, for their cooperation during construction with a solid team, a good and professional commitment. We are very satisfied with their works. Thank You"
                },
                {
                    id: 2,
                    title: "PT. PULAUINTAN",
                    image: "images/BundaMulia.jpg",
                    testimonial: "We are pleased to commend PT. Pulauintan Bajaperkasa Konstruksi for demonstrating competency, commitment, cooperation, teamwork and professionalism in completing this challenging and complex project satisfactorily. Thank You"
                },
                {
                    id: 3,
                    title: "PT. PULAUINTAN",
                    image: "images/BundaMulia.jpg",
                    testimonial: "PT. Pulauintan Bajaperkasa Konstruksi has been our main contractor in the construction and renovation of our campuses. We have been extremely happy with the professionalism shown by the team from PT. Pulauintan Bajaperkasa Konstruksi"
                },
                {
                    id: 4,
                    title: "PT. PULAUINTAN",
                    image: "images/BundaMulia.jpg",
                    testimonial: "In recognition of accomplishments for exceeding the company expectation, we presents this award to PT. Pulauintan Bajaperkasa Konstruksi as Main Contractor who had satisfactorily built Our Tangerang Factory & Office Building. Thank you for your maximum effort and participation"
                },
                
            ];

            let currentIndex = 0;
            let autoSlideInterval;
            const cardsWrapper = document.getElementById('ts-cards-wrapper');
            const prevButton = document.getElementById('prevSlideBtn');
            const nextButton = document.getElementById('nextSlideBtn');

            function init() {
                generateCards();
                currentIndex = 3;
                updateCarouselDisplay();
                startAutoSlide();
            }

            function generateCards() {
                cardsWrapper.innerHTML = '';
                carouselItems.forEach((item, index) => {
                    const card = document.createElement('div');
                    card.className = 'ts-carousel-card';
                    card.dataset.index = index;

                    const cardInner = document.createElement('div');
                    cardInner.className = 'ts-card-inner';

                    const cardFront = document.createElement('div');
                    cardFront.className = 'ts-card-front';

                    const img = document.createElement('img');
                    img.className = 'ts-card-image';
                    img.src = item.image;
                    img.alt = item.title;
                    cardFront.appendChild(img);

                    const title = document.createElement('div');
                    title.className = 'ts-card-title';
                    title.innerHTML = item.title.replace(/\n/g, '<br>');
                    cardFront.appendChild(title);

                    const cardBack = document.createElement('div');
                    cardBack.className = 'ts-card-back';
                    const testimonialText = document.createElement('p');
                    testimonialText.textContent = item.testimonial;
                    cardBack.appendChild(testimonialText);

                    cardInner.appendChild(cardFront);
                    cardInner.appendChild(cardBack);
                    card.appendChild(cardInner);

                    card.addEventListener('click', () => {
                        if (index === currentIndex) {
                            card.classList.toggle('flipped');
                            resetAutoSlide();
                        } else {
                            goToSlide(index);
                        }
                    });

                    cardsWrapper.appendChild(card);
                });
            }

            function updateCarouselDisplay() {
                const cards = Array.from(cardsWrapper.children);
                const activeCardWidth = 400;
                const inactiveCardWidth = 300;
                const activeCardHeight = 500;
                const inactiveCardHeight = 400;
                const cardGap = 40;

                const wrapperWidth = cardsWrapper.offsetWidth;
                const centerOffset = (wrapperWidth / 2);

                cards.forEach((card, index) => {
                    const offsetFromCenter = index - currentIndex;
                    const absOffset = Math.abs(offsetFromCenter);

                    let targetLeft = 0;
                    let zIndex = 10 - absOffset;
                    let scale = 1;
                    let filter = 'none';

                    if (index === currentIndex) {
                        card.classList.add('active');
                        targetLeft = centerOffset;
                        zIndex = 20;
                        card.classList.remove('flipped');
                    } else {
                        card.classList.remove('active');
                        card.classList.remove('flipped');
                        scale = 0.85;
                        filter = 'brightness(0.7) grayscale(0.7)';

                        if (offsetFromCenter < 0) {
                            targetLeft = centerOffset - (activeCardWidth / 2) - ((absOffset -1) * (inactiveCardWidth * scale + cardGap)) - (inactiveCardWidth * scale / 2) - (cardGap / 2);
                        } else {
                            targetLeft = centerOffset + (activeCardWidth / 2) + ((absOffset - 1) * (inactiveCardWidth * scale + cardGap)) + (inactiveCardWidth * scale / 2) + (cardGap / 2);
                        }
                    }

                    card.style.width = index === currentIndex ? `${activeCardWidth}px` : `${inactiveCardWidth}px`;
                    card.style.height = index === currentIndex ? `${activeCardHeight}px` : `${inactiveCardHeight}px`;

                    card.style.left = `${targetLeft}px`;
                    card.style.transform = `translate(-50%, -50%) scale(${scale})`;
                    card.style.zIndex = zIndex;
                    card.style.filter = filter;
                });
            }

            function goToSlide(index) {
                if (index < 0 || index >= carouselItems.length) return;
                currentIndex = index;
                updateCarouselDisplay();
                resetAutoSlide();
            }

            function moveCarousel(direction) {
                let newIndex = currentIndex + direction;
                if (newIndex < 0) {
                    newIndex = carouselItems.length - 1;
                } else if (newIndex >= carouselItems.length) {
                    newIndex = 0;
                }
                goToSlide(newIndex);
            }

            function startAutoSlide() {
                autoSlideInterval = setInterval(() => moveCarousel(1), 3000);
            }

            function resetAutoSlide() {
                clearInterval(autoSlideInterval);
                startAutoSlide();
            }

            // Event listeners for navigation buttons
            prevButton.addEventListener('click', () => moveCarousel(-1));
            nextButton.addEventListener('click', () => moveCarousel(1));

            // Pause auto slide on hover
            document.querySelector('.ts-carousel-container').addEventListener('mouseenter', () => {
                clearInterval(autoSlideInterval);
            });

            document.querySelector('.ts-carousel-container').addEventListener('mouseleave', () => {
                startAutoSlide();
            });

            // Initialize on page load
            document.addEventListener('DOMContentLoaded', init);

            // Optional: Re-calculate positions on window resize
            window.addEventListener('resize', () => {
                updateCarouselDisplay();
            });
        })(); // End of IIFE
    </script>
</body>
</html>