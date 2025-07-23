<style>
    /* Section Header */
    .testimonial-header-container { /* New container for the "What They Said" text */
        text-align: center;
        margin-bottom: 2rem; /* Adjusted margin for the new header */
    }

    .testimonial-header-container h1 { /* Style for "What They Said" */
        font-size: 2.5rem; /* text-5xl, assuming from image */
        font-weight: 700; /* font-bold */
        color: #0000FF; /* Changed to blue based on the image */
        margin-bottom: 1rem; /* mb-4 */
    }

    .testimonial-section-title {
        text-align: center;
        margin-bottom: 3rem; /* mb-12 */
    }

    .testimonial-section-title h2 {
        font-size: 2.25rem; /* text-4xl */
        font-weight: 700; /* font-bold */
        color: #374151; /* text-gray-800 */
        margin-bottom: 1rem; /* mb-4 */
    }

    .testimonial-section-title p {
        color: #4b5563; /* text-gray-600 */
        max-width: 42rem; /* max-w-2xl */
        margin-left: auto;
        margin-right: auto;
    }

    /* Testimonial Slider Container */
    .testimonial-slider-outer-wrapper { /* Renamed for clarity - this holds the React component */
        position: relative;
        max-width: 72rem; /* max-w-6xl */
        margin-left: auto;
        margin-right: auto;
        padding-left: 1rem; /* px-4 */
        padding-right: 1rem; /* px-4 */
    }

    .testimonial-slider-inner {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Navigation Buttons */
    .slider-button {
        position: absolute;
        padding: 0.75rem; /* p-3 */
        background-color: #ffffff; /* bg-white */
        border-radius: 9999px; /* rounded-full */
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow-lg */
        transition-property: all;
        transition-duration: 300ms;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); /* transition-all duration-300 */
        cursor: pointer;
        z-index: 10;
        border: none;
    }

    .slider-button:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); /* hover:shadow-xl */
        transform: scale(1.1); /* hover:scale-110 */
    }

    .slider-button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .slider-button.left {
        left: 1rem; /* left-4 */
    }

    .slider-button.right {
        right: 1rem; /* right-4 */
    }

    .slider-button svg {
        width: 1.5rem; /* w-6 */
        height: 1.5rem; /* h-6 */
        color: #ef4444; /* text-red-500 */
    }

    /* Testimonial Cards Wrapper */
    .testimonial-cards-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2rem; /* space-x-8 */
        overflow: hidden;
    }

    /* Individual Testimonial Card */
    .testimonial-card {
        position: relative;
        transition-property: all;
        transition-duration: 500ms;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); /* transition-all duration-500 ease-in-out */
        cursor: pointer;
        width: 20rem; /* w-80 */
        background-color: #ef4444; /* bg-red-500 */
        border-radius: 1rem; /* rounded-2xl */
        padding: 2rem; /* p-8 */
        color: #ffffff; /* text-white */
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); /* shadow-2xl */
        transform: rotate(1deg); /* Default rotation for non-active cards */
    }

    .testimonial-card.active {
        transform: scale(1) rotate(0deg); /* scale-100 opacity-100 z-20 */
        opacity: 1;
        z-index: 20;
    }

    .testimonial-card:not(.active) {
        transform: scale(0.75) rotate(1deg); /* scale-75 opacity-40 z-10 */
        opacity: 0.4;
        z-index: 10;
    }

    .testimonial-card .quote-icon {
        position: absolute;
        width: 2rem; /* w-8 */
        height: 2rem; /* h-8 */
        color: #fca5a5; /* text-red-300 */
    }

    .testimonial-card .quote-icon.left-top {
        top: 1.5rem; /* top-6 */
        left: 1.5rem; /* left-6 */
    }

    .testimonial-card .quote-icon.right-top {
        top: 1.5rem; /* top-6 */
        right: 1.5rem; /* right-6 */
        transform: rotate(180deg);
    }

    .testimonial-card .profile-image-container {
        display: flex;
        justify-content: center;
        margin-bottom: 1.5rem; /* mb-6 */
        margin-top: 1rem; /* mt-4 */
    }

    .testimonial-card .profile-image-wrapper {
        width: 6rem; /* w-24 */
        height: 6rem; /* h-24 */
        border-radius: 9999px; /* rounded-full */
        background-color: #ffffff; /* bg-white */
        padding: 0.25rem; /* p-1 */
    }

    .testimonial-card .profile-image {
        width: 100%;
        height: 100%;
        border-radius: 9999px; /* rounded-full */
        object-fit: cover;
    }

    .testimonial-card .testimonial-text {
        color: #ffffff; /* text-white */
        text-align: center;
        margin-bottom: 1.5rem; /* mb-6 */
        line-height: 1.625; /* leading-relaxed */
        font-size: 0.875rem; /* text-sm */
    }

    .testimonial-card .testimonial-name {
        color: #ffffff; /* text-white */
        font-weight: 700; /* font-bold */
        font-size: 1.25rem; /* text-xl */
        text-align: center;
    }

    /* Decorative Elements */
    .testimonial-card .decoration-bottom-left,
    .testimonial-card .decoration-bottom-right {
        position: absolute;
        bottom: 1rem; /* bottom-4 */
    }

    .testimonial-card .decoration-bottom-left {
        left: 1rem; /* left-4 */
    }

    .testimonial-card .decoration-bottom-right {
        right: 1rem; /* right-4 */
    }

    .testimonial-card .decoration-dots {
        display: flex;
        gap: 0.25rem; /* space-x-1 */
    }

    .testimonial-card .decoration-dot {
        width: 0.5rem; /* w-2 */
        height: 0.5rem; /* h-2 */
        background-color: #fca5a5; /* bg-red-300 */
        border-radius: 9999px; /* rounded-full */
    }

    .testimonial-card .decoration-top-center {
        position: absolute;
        top: 1rem; /* top-4 */
        left: 50%;
        transform: translateX(-50%);
    }

    .testimonial-card .decoration-top-center div {
        width: 3rem; /* w-12 */
        height: 0.25rem; /* h-1 */
        background-color: #000000; /* bg-black */
        border-radius: 9999px; /* rounded-full */
    }

    /* Dots Indicator */
    .dots-indicator {
        display: flex;
        justify-content: center;
        margin-top: 2rem; /* mt-8 */
        gap: 0.5rem; /* space-x-2 */
    }

    .dot-button {
        width: 0.75rem; /* w-3 */
        height: 0.75rem; /* h-3 */
        border-radius: 9999px; /* rounded-full */
        transition-property: all;
        transition-duration: 300ms;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); /* transition-all duration-300 */
        border: none;
        cursor: pointer;
    }

    .dot-button.active {
        background-color: #ef4444; /* bg-red-500 */
        transform: scale(1.25); /* scale-125 */
    }

    .dot-button:not(.active) {
        background-color: #d1d5db; /* bg-gray-300 */
    }

    .dot-button:not(.active):hover {
        background-color: #9ca3af; /* hover:bg-gray-400 */
    }

    /* Overall Section Styling */
    .testimonial-section {
        width: 100%;
        background-color: #f9fafb; /* bg-gray-50 */
        padding-top: 4rem; /* py-16 */
        padding-bottom: 4rem; /* py-16 */
    }

    .bottom-spacing {
        margin-top: 4rem; /* mt-16 */
    }
</style>

<div class="testimonial-section">
    {{-- Top Section Header "What They Said" --}}
    <div class="testimonial-header-container">
        <h1>What They Said</h1>
    </div>

    {{-- Section Header "Tentang" --}}
    <div class="testimonial-section-title">
        <h2>Tentang</h2>
        <p>
            Dengarkan apa yang dikatakan siswa kami tentang pengalaman belajar mereka
        </p>
    </div>

    {{-- Testimonial Slider --}}
    <div class="testimonial-slider-outer-wrapper"> {{-- This now acts as the container for the React app --}}
        <div class="testimonial-slider-inner">
            {{-- Previous Button --}}
            <button
                onclick="prevSlide()"
                class="slider-button left"
                id="prevButton"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
            </button>

            {{-- The React Root for rendering cards and dots --}}
            <div id="react-slider-root"></div> {{-- Renamed ID for clarity --}}

            {{-- Next Button --}}
            <button
                onclick="nextSlide()"
                class="slider-button right"
                id="nextButton"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
            </button>
        </div>

        {{-- Dots Indicator (managed by React) --}}
        <div id="dotsIndicatorManagedByReact" class="dots-indicator">
            {{-- Dots will be rendered here by React --}}
        </div>
    </div>

    {{-- Bottom spacing --}}
    <div class="bottom-spacing"></div>
</div>

<script type="module">
    import React, { useState, useEffect, useCallback } from 'https://esm.sh/react@18.2.0';
    import ReactDOM from 'https://esm.sh/react-dom@18.2.0/client';

    const TestimonialSliderContent = () => {
        const [currentIndex, setCurrentIndex] = useState(1);
        const [isTransitioning, setIsTransitioning] = useState(false);

        const testimonials = [
            {
                id: 1,
                name: "Varsha Adhikari",
                text: "I am satisfied with the training given by XYZ Pvt. Ltd on Web Designing. During training, the faculty was able to clear my doubts regarding design process.",
                image: "https://images.unsplash.com/photo-1494790108755-2616b332c3a4?w=150&h=150&fit=crop&crop=face"
            },
            {
                id: 2,
                name: "Rahul Sharma",
                text: "Excellent training program! The instructors were knowledgeable and patient. I gained practical skills that I'm already using in my current job.",
                image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face"
            },
            {
                id: 3,
                name: "Priya Patel",
                text: "The course content was comprehensive and well-structured. The hands-on approach helped me understand complex concepts easily.",
                image: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face"
            },
            {
                id: 4,
                name: "Amit Kumar",
                text: "Outstanding learning experience! The faculty provided excellent guidance and the practical projects were very helpful for skill development.",
                image: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face"
            },
            {
                id: 5,
                name: "Sneha Gupta",
                text: "Highly recommend this training program. The teaching methodology is excellent and the support provided by instructors is remarkable.",
                image: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&h=150&fit=crop&crop=face"
            }
        ];

        // Using useCallback to memoize functions used in useEffect dependencies
        const nextSlide = useCallback(() => {
            if (!isTransitioning) {
                setIsTransitioning(true);
                setCurrentIndex((prev) => (prev + 1) % testimonials.length);
                setTimeout(() => setIsTransitioning(false), 500);
            }
        }, [isTransitioning, testimonials.length]);

        const prevSlide = useCallback(() => {
            if (!isTransitioning) {
                setIsTransitioning(true);
                setCurrentIndex((prev) => (prev - 1 + testimonials.length) % testimonials.length);
                setTimeout(() => setIsTransitioning(false), 500);
            }
        }, [isTransitioning, testimonials.length]);

        const goToSlide = useCallback((index) => {
            if (!isTransitioning && index !== currentIndex) {
                setIsTransitioning(true);
                setCurrentIndex(index);
                setTimeout(() => setIsTransitioning(false), 500);
            }
        }, [isTransitioning, currentIndex]);

        // Auto-slide functionality
        useEffect(() => {
            const interval = setInterval(() => {
                nextSlide();
            }, 4000);

            return () => clearInterval(interval);
        }, [nextSlide]);

        // Expose functions to global scope for HTML buttons
        useEffect(() => {
            window.nextSlide = nextSlide;
            window.prevSlide = prevSlide;
            return () => {
                delete window.nextSlide;
                delete window.prevSlide;
            };
        }, [nextSlide, prevSlide]);

        return (
            <>
                <div id="testimonialCardsContainer" class="testimonial-cards-wrapper">
                    {testimonials.map((testimonial, index) => {
                        const isActive = index === currentIndex;
                        // Determine visibility for cards - active, previous, and next
                        // This logic is for showing 3 cards at a time centered
                        const isVisible = (index === currentIndex) ||
                                          (index === (currentIndex - 1 + testimonials.length) % testimonials.length) ||
                                          (index === (currentIndex + 1) % testimonials.length);

                        if (!isVisible) return null;

                        return (
                            <div
                                key={testimonial.id}
                                className={`testimonial-card ${isActive ? 'active' : ''}`}
                                onClick={() => goToSlide(index)}
                            >
                                {{-- Quote Icon --}}
                                <div class="quote-icon left-top">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-quote"><path d="M3 21c3 0 7-10 7-15V3H3l4 7H3c0 5 1.5 9 4 11Z"/><path d="M14 21c3 0 7-10 7-15V3h-4l4 7h-3c0 5 1.5 9 4 11Z"/></svg>
                                </div>
                                
                                {{-- Quote Icon - Right --}}
                                <div class="quote-icon right-top">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-quote"><path d="M3 21c3 0 7-10 7-15V3H3l4 7H3c0 5 1.5 9 4 11Z"/><path d="M14 21c3 0 7-10 7-15V3h-4l4 7h-3c0 5 1.5 9 4 11Z"/></svg>
                                </div>

                                {{-- Profile Image --}}
                                <div class="profile-image-container">
                                    <div class="profile-image-wrapper">
                                        <img
                                            src={testimonial.image}
                                            alt={testimonial.name}
                                            class="profile-image"
                                        />
                                    </div>
                                </div>

                                {{-- Testimonial Text --}}
                                <p class="testimonial-text">
                                    {testimonial.text}
                                </p>

                                {{-- Name --}}
                                <h3 class="testimonial-name">
                                    {testimonial.name}
                                </h3>

                                {{-- Decorative Elements --}}
                                <div class="decoration-bottom-left">
                                    <div class="decoration-dots">
                                        <div class="decoration-dot"></div>
                                        <div class="decoration-dot"></div>
                                    </div>
                                </div>

                                <div class="decoration-bottom-right">
                                    <div class="decoration-dots">
                                        <div class="decoration-dot"></div>
                                        <div class="decoration-dot"></div>
                                    </div>
                                </div>

                                {{-- Top decoration --}}
                                <div class="decoration-top-center">
                                    <div></div>
                                </div>
                            </div>
                        );
                    })}
                </div>

                {{-- Dots Indicator --}}
                <div id="dotsIndicator" class="dots-indicator">
                    {testimonials.map((_, index) => (
                        <button
                            key={index}
                            onClick={() => goToSlide(index)}
                            className={`dot-button ${index === currentIndex ? 'active' : ''}`}
                        />
                    ))}
                </div>
            </>
        );
    };

    // Render the React component into the designated root element
    const root = ReactDOM.createRoot(document.getElementById('react-slider-root'));
    root.render(<TestimonialSliderContent />);
</script>