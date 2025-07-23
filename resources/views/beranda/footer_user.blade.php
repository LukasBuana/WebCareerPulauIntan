<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Footer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif; /* Changed to Arial or similar for a cleaner look like the image */
            background: #f5f5f5;
            padding-top: 100vh; /* Keep for demo purposes to push footer to bottom */
        }

        /* Footer Container */
        .site-footer {
            background: #520a0aff; /* Dark grey from the image */
            color: #ffffff;
            padding: 70px 0 30px; /* Adjusted padding */
            font-size: 15px; /* Base font size for better consistency */
        }

        /* Inner Container */
        .site-footer-content {
            max-width: 1200px; /* Adjusted max-width to closer match image's content width */
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-main {
            display: grid;
            grid-template-columns: 1fr 2fr; /* Left (logo/description) and Right (links) */
            gap: 60px; /* Adjusted gap */
            margin-bottom: 50px; /* Adjusted margin */
            padding-bottom: 40px; /* Padding for the top section before the line */
            border-bottom: 1px solid rgba(255, 255, 255, 0.1); /* Separator line */
        }

        @media (max-width: 992px) { /* Adjust for tablet/smaller desktop */
            .footer-main {
                grid-template-columns: 1fr; /* Stack columns on smaller screens */
                gap: 40px;
                padding-bottom: 30px;
            }
        }

        /* Left Section - Logo and Description */
        .footer-company-info {
            /* No specific styles needed here, direct children handle it */
        }

        .site-logo {
            display: flex;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 25px; /* Spacing below logo */
        }

        .site-logo::before {
            content: '';
            width: 20px; /* Example square, adjust as needed */
            height: 20px;
            background-color: #f7a047; /* Example color, match image if specific */
            margin-right: 10px;
        }

        .footer-description {
            color: #b0b0b0; /* Lighter grey for description */
            line-height: 1.8;
            margin-bottom: 30px;
            font-size: 14px;
            max-width: 350px; /* Constrain width for description */
        }

        .get-started-button {
            display: inline-block;
            background-color: #4CAF50; /* Green color, adjust to match image if different */
            color: #ffffff;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .get-started-button:hover {
            background-color: #45a049; /* Slightly darker green on hover */
        }

        /* Right Section - Links Grid */
        .footer-links-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Four columns as in the image */
            gap: 30px; /* Gap between link columns */
        }

        @media (max-width: 768px) {
            .footer-links-grid {
                grid-template-columns: repeat(2, 1fr); /* Two columns on tablets */
            }
        }

        @media (max-width: 480px) {
            .footer-links-grid {
                grid-template-columns: 1fr; /* Single column on mobile */
            }
        }

        .footer-heading {
            font-size: 18px; /* Slightly larger heading */
            font-weight: bold;
            margin-bottom: 25px; /* Spacing below heading */
            color: #ffffff;
        }

        .footer-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-list-item {
            margin-bottom: 12px;
        }

        .footer-list-link {
            color: #b0b0b0; /* Lighter grey for links */
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 14px;
        }

        .footer-list-link:hover {
            color: #ffffff; /* White on hover */
        }

        /* Social Media Links */
        .social-links {
            display: flex;
            gap: 15px; /* Smaller gap for social icons */
            margin-top: 30px; /* Spacing above social icons */
        }

        .social-link {
            width: 40px; /* Smaller square for icons */
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #333333; /* Darker background for social icons */
            border-radius: 5px; /* Slightly less rounded */
            color: #ffffff;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .social-link:hover {
            background-color: #555555; /* Lighter grey on hover */
            transform: translateY(-2px);
        }

        .social-icon {
            width: 20px; /* Icon size */
            height: 20px;
            fill: currentColor;
        }

        /* Bottom Section */
        .footer-bottom {
            padding-top: 30px; /* Adjusted padding */
            display: flex;
            flex-direction: row; /* Default to row */
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        @media (max-width: 768px) {
            .footer-bottom {
                flex-direction: column; /* Stack on smaller screens */
                text-align: center;
            }
        }

        .footer-copyright {
            color: #888888;
            font-size: 14px;
        }

        .footer-links-bottom {
            display: flex;
            gap: 25px; /* Smaller gap for bottom links */
            flex-wrap: wrap;
            justify-content: center;
        }

        .footer-links-bottom a {
            color: #b0b0b0; /* Lighter grey for bottom links */
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .footer-links-bottom a:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <footer class="site-footer">
        <div class="site-footer-content">
            <div class="footer-main">
                <div class="footer-company-info">
                    <div class="site-logo" src="/images/Pulauintanaward3.jpg"
                                                    alt="Award3">
                    
                        
                     
                    </div>
                    <p class="footer-description">High level experience in web design and development knowledge, producing quality work.</p>
                    <a href="#" class="get-started-button">Get started</a>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <svg class="social-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33V22H12c5.523 0 10-4.477 10-10z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <svg class="social-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <svg class="social-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.002 3.797.048.843.04 1.163.1 1.405.148.242.048.399.076.671.117.42.067.985.167 1.267.246.6.182 1.23.493 1.808 1.069.577.577.888 1.208 1.069 1.808.079.282.179.847.246 1.267.04.272.068.429.117.671.047.242.107.562.148 1.406.046 1.013.048 1.376.048 3.797s-.002 2.784-.048 3.797c-.04.843-.1 1.163-.148 1.405-.048.242-.076.399-.117.671-.067.42-.167.847-.246 1.267-.182.6-.493 1.23-1.069 1.808-.577.577-1.208.888-1.808 1.069-.282.079-.847.179-1.267.246-.04-.272-.068-.429-.117-.671-.047-.242-.107-.562-.148-1.406-.046-1.013-.048-1.376-.048-3.797s.009-2.384.048-3.23c.036-.78.09-1.203.138-1.45.048-.246.067-.328.106-.539.058-.328.146-.692.247-1.012.175-.557.45-1.05.892-1.492.44-.44.717-.935.892-1.492.101-.32.189-.684.247-1.012.039-.211.058-.293.106-.539.048-.247.099-.67.138-1.45.039-.846.048-1.098.048-3.23zM12 15.397c-1.875 0-3.397-1.522-3.397-3.397S10.125 8.603 12 8.603s3.397 1.522 3.397 3.397-1.522 3.397-3.397 3.397zm0-2.15c.665 0 1.203-.538 1.203-1.203s-.538-1.203-1.203-1.203-1.203.538-1.203 1.203.538 1.203 1.203 1.203z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Telegram">
                            <svg class="social-icon" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm4.908 7.37c-.12-.04-.25-.06-.37-.06a.8.8 0 00-.77.5L9.6 15.17c-.18.27-.32.4-.53.4-.21 0-.35-.13-.53-.4l-.8-.8c-.18-.18-.4-.25-.6-.25-.2 0-.42.07-.6.25l-.27.28c-.18.18-.28.4-.28.6 0 .2.1.42.28.6l2.3 2.3c.18.18.4.28.6.28.2 0 .42-.1.6-.28l6.3-4.2c.18-.12.28-.27.28-.42a.8.8 0 00-.5-.73z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="footer-links-grid">
                    <div class="footer-link-column">
                        <h4 class="footer-heading">Product</h4>
                        <ul class="footer-list">
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Landing Page</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Popup Builder</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Web-design</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Content</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Integrations</a></li>
                        </ul>
                    </div>

                    <div class="footer-link-column">
                        <h4 class="footer-heading">Use Cases</h4>
                        <ul class="footer-list">
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Web-designers</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Marketers</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Small Business</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Website Builder</a></li>
                        </ul>
                    </div>

                    <div class="footer-link-column">
                        <h4 class="footer-heading">Resources</h4>
                        <ul class="footer-list">
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Academy</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Blog</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Themes</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Hosting</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Developers</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Support</a></li>
                        </ul>
                    </div>

                    <div class="footer-link-column">
                        <h4 class="footer-heading">Company</h4>
                        <ul class="footer-list">
                            <li class="footer-list-item"><a href="#" class="footer-list-link">About Us</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Careers</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">FAQs</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Teams</a></li>
                            <li class="footer-list-item"><a href="#" class="footer-list-link">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-copyright">
                    <p>&copy; 2021 All Rights Reserved</p>
                </div>
                <div class="footer-links-bottom">
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