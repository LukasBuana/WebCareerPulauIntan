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
            --footer-bg-color: #1a202c; /* Dark charcoal */
            --footer-text-primary: #f8f8f8; /* Near-white */
            --footer-text-secondary: #a0aec0; /* Soft grey */
            --footer-text-tertiary: #718096; /* Muted grey for copyright */
            --footer-button-bg: #4299e1; /* Vibrant blue */
            --footer-button-hover-bg: #3182ce; /* Darker blue on hover */
            --footer-social-bg: #2d3748; /* Slightly lighter dark */
            --footer-social-hover-bg: #4a5568; /* Even lighter dark on hover */
            --footer-border-color: rgba(255, 255, 255, 0.1); /* Subtle border */
            --footer-logo-accent-color: #ecc94b; /* Gold accent */

            /* Font Sizes */
            --footer-font-size-base: 16px;
            --footer-font-size-sm: 14px;
            --footer-font-size-md: 20px;
            --footer-font-size-lg: 32px; /* Larger logo */

            background: var(--footer-bg-color);
            color: var(--footer-text-primary);
            padding: 90px 0 50px; /* More vertical padding */
            font-size: var(--footer-font-size-base);
            line-height: 1.7;
        }

        /* Inner Container */
        .myproject-footer__content {
            max-width: 1280px; /* Wider content area */
            margin: 0 auto;
            padding: 0 30px; /* More horizontal padding */
        }

        .myproject-footer__main-section {
            display: grid;
            grid-template-columns: 1.5fr 2.5fr; /* Adjusted ratio for more space on the right */
            gap: 80px; /* Increased gap */
            margin-bottom: 70px; /* More separation */
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
            justify-content: space-between; /* Distribute space */
        }

        .myproject-footer__logo {
            display: flex;
            align-items: center;
            font-size: var(--footer-font-size-lg);
            font-weight: 700;
            color: var(--footer-text-primary);
            margin-bottom: 25px; /* Adjusted margin */
            letter-spacing: -0.8px; /* Tighter letter spacing for impact */
        }

        .myproject-footer__logo::before {
            content: '';
            width: 25px; /* Larger accent square */
            height: 25px;
            background-color: var(--footer-logo-accent-color);
            margin-right: 15px;
            border-radius: 4px; /* Slightly more rounded */
            transform: rotate(45deg); /* Angled accent */
            flex-shrink: 0; /* Prevent shrinking on small screens */
        }

        .myproject-footer__description {
            color: var(--footer-text-secondary);
            line-height: 1.8;
            margin-bottom: 40px; /* More space before button */
            font-size: var(--footer-font-size-base);
            max-width: 400px;
        }

        .myproject-footer__button {
            display: inline-flex; /* Use flex for centering if needed */
            align-items: center;
            justify-content: center;
            background-color: gray;
            color: var(--footer-text-primary);
            padding: 15px 35px;
            border-radius: 8px; /* More rounded */
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Subtle shadow */
        }

        .myproject-footer__button:hover {
            background-color: #DA251C;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3); /* Enhanced shadow on hover */
        }

        /* Right Section - Links Grid */
        .myproject-footer__links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); /* Adjusted min-width */
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
            bottom: -8px; /* Underline effect */
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
            transform: translateX(8px); /* More pronounced slide */
        }

        /* Social Media Links */
        .myproject-footer__social-links {
            display: flex;
            gap: 15px;
            margin-top: auto; /* Push social links to bottom of company info */
            padding-top: 20px; /* Give some space */
        }

        .myproject-footer__social-link {
            width: 48px; /* Larger circular icons */
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
            transform: translateY(-4px) scale(1.08); /* More dynamic lift and scale */
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
            gap: 30px; /* Increased gap */
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
            gap: 25px; /* More space between bottom links */
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
            right: -15px; /* Position for the separator */
            color: var(--footer-text-tertiary);
        }

        @media (max-width: 768px) {
            .myproject-footer__bottom-links a:not(:last-child)::after {
                content: none; /* Hide separator on mobile */
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
                            <img src="/images/pulauintanbajaperkasalogo.png" alt="Site Logo" style="height: 150px; width: auto; margin-left: -20px">
                        </div>                        <p class="myproject-footer__description">In order to serve our customers even better, we bring
excellent combination of team work, knowledge, skill,
along with the commitment to customers satisfaction.
we are always passionate to increase customers
satisfaction and contribute to the society by providing
our core values that beyond all expectations.
</p>
                        <a href="/jobs" class="myproject-footer__button">Lihat Lowongan</a>
                    </div>
                    <div class="myproject-footer__social-links">
                        <a href="#" class="myproject-footer__social-link" aria-label="Facebook">
                            <svg class="myproject-footer__social-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33V22H12c5.523 0 10-4.477 10-10z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="myproject-footer__social-link" aria-label="Twitter">
                            <svg class="myproject-footer__social-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="myproject-footer__social-link" aria-label="Instagram">
                            <svg class="myproject-footer__social-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.002 3.797.048.843.04 1.163.1 1.405.148.242.048.399.076.671.117.42.067.985.167 1.267.246.6.182 1.23.493 1.808 1.069.577.577.888 1.208 1.069 1.808.079.282.179.847.246 1.267.04.272.068.429.117.671.047.242.107.562.148 1.406.046 1.013.048 1.376.048 3.797s-.002 2.784-.048 3.797c-.04.843-.1 1.163-.148 1.405-.048.242-.076.399-.117.671-.067.42-.167.847-.246 1.267-.182.6-.493 1.23-1.069 1.808-.577.577-1.208.888-1.808 1.069-.282.079-.847.179-1.267.246-.04-.272-.068-.429-.117-.671-.047-.242-.107-.562-.148-1.406-.046-1.013-.048-1.376-.048-3.797s.009-2.384.048-3.23c.036-.78.09-1.203.138-1.45.048-.246.067-.328.106-.539.058-.328.146-.692.247-1.012.175-.557.45-1.05.892-1.492.44-.44.717-.935.892-1.492.101-.32.189-.684.247-1.012.039-.211.058-.293.106-.539.048-.247.099-.67.138-1.45.039-.846.048-1.098.048-3.23zM12 15.397c-1.875 0-3.397-1.522-3.397-3.397S10.125 8.603 12 8.603s3.397 1.522 3.397 3.397-1.522 3.397-3.397 3.397zm0-2.15c.665 0 1.203-.538 1.203-1.203s-.538-1.203-1.203-1.203-1.203.538-1.203 1.203.538 1.203 1.203 1.203z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="myproject-footer__social-link" aria-label="Telegram">
                            <svg class="myproject-footer__social-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm4.908 7.37c-.12-.04-.25-.06-.37-.06a.8.8 0 00-.77.5L9.6 15.17c-.18.27-.32.4-.53.4-.21 0-.35-.13-.53-.4l-.8-.8c-.18-.18-.4-.25-.6-.25-.2 0-.42.07-.6.25l-.27.28c-.18.18-.28.4-.28.6 0 .2.1.42.28.6l2.3 2.3c.18.18.4.28.6.28.2 0 .42-.1.6-.28l6.3-4.2c.18-.12.28-.27.28-.42a.8.8 0 00-.5-.73z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="myproject-footer__links-grid">
                    <div class="myproject-footer__link-column">
                        <h4 class="myproject-footer__heading">Product</h4>
                        <ul class="myproject-footer__list">
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">Beranda</a></li>
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">Tentang</a></li>
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">Berita</a></li>
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">Bursa Kerja</a></li>
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">Tanya Jawab</a></li>
                        </ul>
                    </div>

                    <div class="myproject-footer__link-column">
                        <h4 class="myproject-footer__heading">Project</h4>
                        <ul class="myproject-footer__list">
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">Apartments</a></li>
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">Hotels</a></li>
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">Offices</a></li>
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">Others</a></li>
                        </ul>
                    </div>

                    
                    <div class="myproject-footer__link-column">
                        <h4 class="myproject-footer__heading">Company</h4>
                        <ul class="myproject-footer__list">
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">About Us</a></li>
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">Careers</a></li>
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">FAQs</a></li>
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">Teams</a></li>
                            <li class="myproject-footer__list-item"><a href="#" class="myproject-footer__list-link">Contact Us</a></li>
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