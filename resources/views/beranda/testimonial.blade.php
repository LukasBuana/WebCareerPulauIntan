<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Carousel</title>
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
            max-width: 1200px; /* Adjust as needed */
            display: flex;
            justify-content: center;
            align-items: center;
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
        }

        /* Individual Carousel Card */
        .ts-carousel-card {
            flex-shrink: 0;
            width: 300px; /* Base width for inactive cards */
            height: 400px; /* Base height for inactive cards */
            border-radius: 1rem; /* More rounded corners */
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); /* Stronger shadow */
            transition: all 1s cubic-bezier(0.68, -0.55, 0.265, 1.55); /* More playful transition */
            cursor: pointer;
            position: absolute; /* Position cards absolutely within the wrapper */
            top: 50%;
            left: 50%; /* Initial position, will be overridden by JS */
            transform: translate(-50%, -50%); /* Center the card */
            display: flex;
            flex-direction: column;
            justify-content: flex-end; /* Align title to bottom */
            background-color: white; /* Fallback */
            backface-visibility: hidden; /* Fix for flickering in some browsers */
            will-change: transform, opacity, z-index, width, height; /* Performance hint */
        }

        .ts-carousel-card.active {
            width: 400px; /* Larger width for active card */
            height: 500px; /* Larger height for active card */
            z-index: 20; /* Ensure active card is on top */
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3); /* Even stronger shadow for active */
            transform: translate(-50%, -50%) scale(1); /* Ensure no additional scale */
            opacity: 1; /* Fully opaque */
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

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .ts-carousel-card {
                width: 250px;
                height: 350px;
            }
            .ts-carousel-card.active {
                width: 350px;
                height: 450px;
            }
            .ts-card-title {
                font-size: 1.4rem;
                padding: 1.2rem 0.8rem;
            }
            .ts-cards-wrapper {
                height: 450px;
            }
        }

        @media (max-width: 768px) {
            .ts-carousel-main {
                padding: 0;
            }
            .ts-cards-wrapper {
                height: 400px;
                padding: 0 50px;
            }
            .ts-carousel-card {
                width: 200px;
                height: 300px;
            }
            .ts-carousel-card.active {
                width: 300px;
                height: 400px;
            }
            .ts-card-title {
                font-size: 1.2rem;
                padding: 1rem 0.6rem;
            }
            .ts-nav-arrow {
                padding: 0.6rem;
            }
            .ts-nav-arrow svg {
                width: 1.25rem;
                height: 1.25rem;
            }
            .ts-nav-arrow-left {
                left: 10px;
            }
            .ts-nav-arrow-right {
                right: 10px;
            }
        }

        @media (max-width: 480px) {
            .ts-cards-wrapper {
                height: 350px;
                padding: 0 30px;
            }
            .ts-carousel-card {
                width: 150px;
                height: 220px;
            }
            .ts-carousel-card.active {
                width: 240px;
                height: 320px;
            }
            .ts-card-title {
                font-size: 1rem;
                padding: 0.8rem 0.4rem;
            }
            .ts-nav-arrow {
                padding: 0.4rem;
                top: 45%;
            }
            .ts-nav-arrow svg {
                width: 1rem;
                height: 1rem;
            }
            .ts-nav-arrow-left {
                left: 5px;
            }
            .ts-nav-arrow-right {
                right: 5px;
            }
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
                    title: "Procurement",
                    image: "https://images.unsplash.com/photo-1596707328271-e94553229b11?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w1NzM4MTN8MHwxfHNlYXJjaHw1MHx8cHJvY3VyZW1lbnR8ZW58MHx8fHwxNzIxODg3NDg2fDA&ixlib=rb-4.0.3&q=80&w=1080"
                },
                {
                    id: 2,
                    title: "Others",
                    image: "https://images.unsplash.com/photo-1592576136746-884812ae9c69?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w1NzM4MTN8MHwxfHNlYXJjaHw1MHx8ZGl2ZXJzaXR5fGVufDB8fHx8MTcyMTg4NzU1MXww&ixlib=rb-4.0.3&q=80&w=1080"
                },
                {
                    id: 3,
                    title: "Super Indo Apprentice Program",
                    image: "http://googleusercontent.com/file_content/0" // Using your uploaded image URL directly
                },
                {
                    id: 4,
                    title: "Retail Management Trainee",
                    image: "https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w1NzM4MTN8MHwxfHNlYXJjaHw1MHx8bWFya2V0aW5nfGVufDB8fHx8MTcyMTg4NzU4NXww&ixlib=rb-4.0.3&q=80&w=1080"
                },
                {
                    id: 5,
                    title: "Store/Retail Operation",
                    image: "https://images.unsplash.com/photo-1556740738-b67a68582d96?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w1NzM4MTN8MHwxfHNlYXJjaHwxNXx8cmV0YWlsJTIwc3RvcmV8ZW58MHx8fHwxNzIxOTc1NzU2fDA&ixlib=rb-4.0.3&q=80&w=1080"
                },
                {
                    id: 6,
                    title: "Marketing",
                    image: "https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w1NzM4MTN8MHwxfHNlYXJjaHw1MHx8bWFya2V0aW5nfGVufDB8fHx8MTcyMTg4NzU4NXww&ixlib=rb-4.0.3&q=80&w=1080"
                }
            ];

            let currentIndex = 0;
            let autoSlideInterval;
            const cardsWrapper = document.getElementById('ts-cards-wrapper');
            const prevButton = document.getElementById('prevSlideBtn');
            const nextButton = document.getElementById('nextSlideBtn');

            function init() {
                generateCards();
                // Start with the 'Retail Management Trainee' card (index 3) as active,
                // to match the provided image.
                currentIndex = 3; // Adjusted to match the new image where "Retail Management Trainee" is central
                updateCarouselDisplay();
                startAutoSlide();
            }

            function generateCards() {
                cardsWrapper.innerHTML = '';
                carouselItems.forEach((item, index) => {
                    const card = document.createElement('div');
                    card.className = 'ts-carousel-card';
                    card.dataset.index = index;

                    const img = document.createElement('img');
                    img.className = 'ts-card-image';
                    img.src = item.image;
                    img.alt = item.title;
                    card.appendChild(img);

                    const title = document.createElement('div');
                    title.className = 'ts-card-title';
                    title.innerHTML = item.title.replace(/\n/g, '<br>');
                    card.appendChild(title);

                    // Add click listener to each card
                    card.onclick = () => goToSlide(index);
                    cardsWrapper.appendChild(card);
                });
            }

            function updateCarouselDisplay() {
                const cards = Array.from(cardsWrapper.children);
                const activeCardWidth = 400;
                const inactiveCardWidth = 300;
                const activeCardHeight = 500;
                const inactiveCardHeight = 400;
                const cardGap = 40; // Gap between cards for visual spacing

                const wrapperWidth = cardsWrapper.offsetWidth;
                const centerOffset = (wrapperWidth / 2); // Center point of the wrapper

                cards.forEach((card, index) => {
                    const offsetFromCenter = index - currentIndex;
                    const absOffset = Math.abs(offsetFromCenter);

                    let targetLeft = 0;
                    let zIndex = 10 - absOffset;
                    let scale = 1;
                    let rotateY = 0;
                    let filter = 'none';

                    if (index === currentIndex) {
                        card.classList.add('active');
                        targetLeft = centerOffset; // Active card is at the center
                        zIndex = 20;
                    } else {
                        card.classList.remove('active');
                        scale = 0.85; // Smaller for side cards
                        filter = 'brightness(0.7) grayscale(0.7)'; // Desaturated and darker

                        if (offsetFromCenter < 0) { // Left cards
                            // Start from the active card's left edge, then move left by (scaled inactive card width + gap) for each offset
                            targetLeft = centerOffset - (activeCardWidth / 2) - ((absOffset -1) * (inactiveCardWidth * scale + cardGap)) - (inactiveCardWidth * scale / 2) - (cardGap / 2); // Corrected calculation
                            rotateY = 5;
                        } else { // Right cards
                            // Start from the active card's right edge, then move right by (scaled inactive card width + gap) for each offset
                            targetLeft = centerOffset + (activeCardWidth / 2) + ((absOffset - 1) * (inactiveCardWidth * scale + cardGap)) + (inactiveCardWidth * scale / 2) + (cardGap / 2); // Corrected calculation
                            rotateY = -5;
                        }
                    }

                    card.style.width = index === currentIndex ? `${activeCardWidth}px` : `${inactiveCardWidth}px`;
                    card.style.height = index === currentIndex ? `${activeCardHeight}px` : `${inactiveCardHeight}px`;

                    // Apply the calculated 'left' property
                    card.style.left = `${targetLeft}px`;

                    // Apply transform to center the card on its `left` point, and apply scale/rotation
                    // The translate(-50%, -50%) makes the card's center align with its 'left', 'top' coordinates
                    card.style.transform = `translate(-50%, -50%) scale(${scale}) rotateY(${rotateY}deg)`;
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