<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Footer</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* Footer Container - Custom properties for consistency */
        .myproject-footer__container {
            /* Colors */
            --footer-bg-color: #1a202c;
            /* Dark charcoal */
            --footer-text-primary: #f8f8f8;
            /* Near-white */
            --footer-text-secondary: #a0aec0;
            /* Soft grey */
            --footer-text-tertiary: #718096;
            /* Muted grey for copyright */
            --footer-button-bg: #4299e1;
            /* Vibrant blue */
            --footer-button-hover-bg: #3182ce;
            /* Darker blue on hover */
            --footer-social-bg: #2d3748;
            /* Slightly lighter dark */
            --footer-social-hover-bg: #4a5568;
            /* Even lighter dark on hover */
            --footer-border-color: rgba(255, 255, 255, 0.1);
            /* Subtle border */
            --footer-logo-accent-color: #ecc94b;
            /* Gold accent */

            /* Font Sizes */
            --footer-font-size-base: 16px;
            --footer-font-size-sm: 14px;
            --footer-font-size-md: 20px;
            --footer-font-size-lg: 32px;
            /* Larger logo */

            background: var(--footer-bg-color);
            color: var(--footer-text-primary);
            padding: 90px 0 50px;
            /* More vertical padding */
            font-size: var(--footer-font-size-base);
            line-height: 1.7;
        }

        /* Inner Container */
        .myproject-footer__content {
            max-width: 1280px;
            /* Wider content area */
            margin: 0 auto;
            padding: 0 30px;
            /* More horizontal padding */
        }

        .myproject-footer__main-section {
            display: grid;
            grid-template-columns: 1.5fr 2.5fr;
            /* Adjusted ratio for more space on the right */
            gap: 80px;
            /* Increased gap */
            margin-bottom: 70px;
            /* More separation */
            padding-bottom: 60px;
            border-bottom: 1px solid var(--footer-border-color);
        }

        @media (max-width: 992px) {
            .myproject-footer__main-section {
                grid-template-columns: 1fr;
                gap: 50px;
                padding-bottom: 40px;
            }
        }

        /* Left Section - Company Info */
        .myproject-footer__company-info {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Distribute space */
        }

        .myproject-footer__logo {
            display: flex;
            align-items: center;
            font-size: var(--footer-font-size-lg);
            font-weight: 700;
            color: var(--footer-text-primary);
            margin-bottom: 25px;
            /* Adjusted margin */
            letter-spacing: -0.8px;
            /* Tighter letter spacing for impact */
        }

        .myproject-footer__logo::before {
            content: '';
            width: 25px;
            /* Larger accent square */
            height: 25px;
            background-color: var(--footer-logo-accent-color);
            margin-right: 15px;
            border-radius: 4px;
            /* Slightly more rounded */
            transform: rotate(45deg);
            /* Angled accent */
            flex-shrink: 0;
            /* Prevent shrinking on small screens */
        }

        .myproject-footer__description {
            color: var(--footer-text-secondary);
            line-height: 1.8;
            margin-bottom: 40px;
            /* More space before button */
            font-size: var(--footer-font-size-base);
            max-width: 400px;
        }

        .myproject-footer__button {
            display: inline-flex;
            /* Use flex for centering if needed */
            align-items: center;
            justify-content: center;
            background-color: gray;
            color: var(--footer-text-primary);
            padding: 15px 35px;
            border-radius: 8px;
            /* More rounded */
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            /* Subtle shadow */
        }

        .myproject-footer__button:hover {
            background-color: #DA251C;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            /* Enhanced shadow on hover */
        }

        /* Right Section - Links Grid */
        .myproject-footer__links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            /* Adjusted min-width */
            gap: 40px 30px;
            margin-top: 50px;
        }

        @media (max-width: 768px) {
            .myproject-footer__links-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .myproject-footer__links-grid {
                grid-template-columns: 1fr;
            }
        }

        .myproject-footer__heading {
            font-size: var(--footer-font-size-md);
            font-weight: 600;
            margin-bottom: 25px;
            color: var(--footer-text-primary);
            position: relative;
        }

        .myproject-footer__heading::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            /* Underline effect */
            width: 40px;
            height: 3px;
            background-color: var(--footer-logo-accent-color);
            border-radius: 2px;
        }

        .myproject-footer__list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .myproject-footer__list-item {
            margin-bottom: 12px;
        }

        .myproject-footer__list-link {
            color: var(--footer-text-secondary);
            text-decoration: none;
            transition: color 0.3s ease, transform 0.2s ease;
            font-size: var(--footer-font-size-sm);
            display: inline-block;
        }

        .myproject-footer__list-link:hover {
            color: var(--footer-text-primary);
            transform: translateX(8px);
            /* More pronounced slide */
        }

        /* Social Media Links */
        .myproject-footer__social-links {
            display: flex;
            gap: 15px;
            margin-top: auto;
            /* Push social links to bottom of company info */
            padding-top: 20px;
            /* Give some space */
        }

        .myproject-footer__social-link {
            width: 48px;
            /* Larger circular icons */
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--footer-social-bg);
            border-radius: 50%;
            color: var(--footer-text-primary);
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.25);
        }

        .myproject-footer__social-link:hover {
            background-color: var(--footer-social-hover-bg);
            transform: translateY(-4px) scale(1.08);
            /* More dynamic lift and scale */
            box-shadow: 0 7px 20px rgba(0, 0, 0, 0.4);
        }

        .myproject-footer__social-icon {
            width: 24px;
            height: 24px;
            fill: currentColor;
        }

        /* Bottom Section */
        .myproject-footer__bottom-section {
            padding-top: 40px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            /* Increased gap */
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .myproject-footer__bottom-section {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }
        }

        .myproject-footer__copyright {
            color: var(--footer-text-tertiary);
            font-size: var(--footer-font-size-sm);
            white-space: nowrap;
        }

        .myproject-footer__bottom-links {
            display: flex;
            gap: 25px;
            /* More space between bottom links */
            flex-wrap: wrap;
            justify-content: center;
        }

        .myproject-footer__bottom-links a {
            color: var(--footer-text-secondary);
            text-decoration: none;
            font-size: var(--footer-font-size-sm);
            transition: color 0.3s ease;
            position: relative;
        }

        .myproject-footer__bottom-links a:hover {
            color: var(--footer-text-primary);
        }

        .myproject-footer__bottom-links a:not(:last-child)::after {
            content: '|';
            position: absolute;
            right: -15px;
            /* Position for the separator */
            color: var(--footer-text-tertiary);
        }

        @media (max-width: 768px) {
            .myproject-footer__bottom-links a:not(:last-child)::after {
                content: none;
                /* Hide separator on mobile */
            }
        }
    </style>
</head>

<body>
    <footer class="myproject-footer__container">
        <div class="myproject-footer__content">
            <div class="myproject-footer__main-section">
                <div class="myproject-footer__company-info">
                    <div>
                        <div class="app-footer__logo">
                            <img src="/images/pulauintanbajaperkasalogo.png" alt="Site Logo"
                                style="height: 150px; width: auto; margin-left: -20px">
                        </div>
                        <p class="myproject-footer__description">In order to serve our customers even better, we bring
                            excellent combination of team work, knowledge, skill,
                            along with the commitment to customers satisfaction.
                            we are always passionate to increase customers
                            satisfaction and contribute to the society by providing
                            our core values that beyond all expectations.
                        </p>
                        <a href="/jobs" class="myproject-footer__button">Lihat Lowongan</a>
                    </div>
                    <div class="myproject-footer__social-links">
                        <a href="https://www.instagram.com/pulauintanofficial/?hl=en"
                            class="myproject-footer__social-link" aria-label="Instagram">
                            <img src="/images/icon/social.png" alt="Instagram" class="myproject-footer__social-icon">
                        </a>

                        <a href="https://id.linkedin.com/company/pt-pulauintan-bajaperkasa-konstruksi"
                            class="myproject-footer__social-link" aria-label="LinkedIn">
                            <img src="/images/icon/linkedin.png" alt="LinkedIn" class="myproject-footer__social-icon">
                        </a>



                    </div>
                </div>

                <div class="myproject-footer__links-grid">
                    <div class="myproject-footer__link-column">
                        <h4 class="myproject-footer__heading">Product</h4>
                        <ul class="myproject-footer__list">
                            <li class="myproject-footer__list-item"><a href="#"
                                    class="myproject-footer__list-link">Beranda</a></li>
                            <li class="myproject-footer__list-item"><a href="#berita"
                                    class="myproject-footer__list-link">Berita</a></li>
                            <li class="myproject-footer__list-item"><a href="#bursa-kerja"
                                    class="myproject-footer__list-link">Bursa Kerja</a></li>

                        </ul>
                    </div>

                    <div class="myproject-footer__link-column">
                        <h4 class="myproject-footer__heading">Project</h4>
                        <ul class="myproject-footer__list">
                            <li class="myproject-footer__list-item"><a
                                    href="https://pulauintan.com/property-category/apartments/"
                                    class="myproject-footer__list-link">Apartments</a></li>
                            <li class="myproject-footer__list-item"><a
                                    href="https://pulauintan.com/property-category/hotels/"
                                    class="myproject-footer__list-link">Hotels</a></li>
                            <li class="myproject-footer__list-item"><a
                                    href="https://pulauintan.com/property-category/offices/"
                                    class="myproject-footer__list-link">Offices</a></li>
                            <li class="myproject-footer__list-item"><a
                                    href="https://pulauintan.com/property-category/others/"
                                    class="myproject-footer__list-link">Others</a></li>
                        </ul>
                    </div>


                    <div class="myproject-footer__link-column">
                        <h4 class="myproject-footer__heading">Company</h4>
                        <ul class="myproject-footer__list">
                            <li class="myproject-footer__list-item"><a href="#tentang"
                                    class="myproject-footer__list-link">About Us</a></li>
                            <li class="myproject-footer__list-item"><a href="#lowongan"
                                    class="myproject-footer__list-link">Careers</a></li>
                            <li class="myproject-footer__list-item"><a href="#faq"
                                    class="myproject-footer__list-link">FAQs</a></li>
                            <li class="myproject-footer__list-item"><a href="https://pulauintan.com/contact-us/"
                                    class="myproject-footer__list-link">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="myproject-footer__bottom-section">
                <div class="myproject-footer__copyright">
                    <p>&copy; 2021 All Rights Reserved</p>
                </div>
                <div class="myproject-footer__bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Sales and Refunds</a>
                    <a href="#">Legal</a>
                    <a href="#">Site Map</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>