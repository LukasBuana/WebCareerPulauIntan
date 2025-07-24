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
            display: none;
            /* Hidden by default, managed by JS */
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

        /* Enhanced Visi & Misi Section Specifics */
        .visi-misi-section .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 1000px;
            perspective: 1000px;
        }

        .circular-diagram {
            position: relative;
            width: 800px;
            height: 800px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeInScale 1.2s ease-out forwards;
            opacity: 0;
            transform: scale(0.8);
        }

        @keyframes fadeInScale {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .center-circle {
            position: absolute;
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #1e3a8a 100%);
            border: 5px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.4),
                inset 0 0 30px rgba(255, 255, 255, 0.1);
            transition: all 0.4s ease;
            animation: centerPulse 4s ease-in-out infinite, centerFloat 6s ease-in-out infinite;
            backdrop-filter: blur(10px);
        }

        @keyframes centerPulse {
            0%, 100% {
                box-shadow: 
                    0 30px 60px rgba(0, 0, 0, 0.4),
                    inset 0 0 30px rgba(255, 255, 255, 0.1),
                    0 0 0 0 rgba(59, 130, 246, 0.4);
            }
            50% {
                box-shadow: 
                    0 35px 70px rgba(0, 0, 0, 0.5),
                    inset 0 0 40px rgba(255, 255, 255, 0.15),
                    0 0 0 20px rgba(59, 130, 246, 0.1);
            }
        }

        @keyframes centerFloat {
            0%, 100% {
                transform: translateY(0px) rotateZ(0deg);
            }
            25% {
                transform: translateY(-8px) rotateZ(1deg);
            }
            50% {
                transform: translateY(-12px) rotateZ(0deg);
            }
            75% {
                transform: translateY(-5px) rotateZ(-1deg);
            }
        }

        .center-circle:hover {
            transform: scale(1.05) translateY(-5px);
            box-shadow: 
                0 40px 80px rgba(0, 0, 0, 0.5),
                inset 0 0 40px rgba(255, 255, 255, 0.2);
        }

        .visi-content {
            text-align: center;
            color: white;
            padding: 30px;
        }

        .visi-content h2 {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 25px;
            background: linear-gradient(135deg, #ffffff 0%, #fbbf24 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;
        }

        .visi-content p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 5px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            font-weight: 400;
        }

        .visi-content em {
            font-style: italic;
            color: #fbbf24;
            font-weight: 600;
        }

        .outer-circle {
            position: absolute;
            width: 600px;
            height: 600px;
            border: 3px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            z-index: 1;
            animation: outerRotate 20s linear infinite;
        }

        .outer-circle::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 2px solid rgba(251, 191, 36, 0.3);
            border-radius: 50%;
            animation: outerRotate 25s linear infinite reverse;
        }

        @keyframes outerRotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .misi-label {
            position: absolute;
            top: -80px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            text-align: center;
            z-index: 15;
            animation: fadeInDown 1s ease-out 0.5s forwards;
            opacity: 0;
            transform: translateX(-50%) translateY(-20px);
        }

        @keyframes fadeInDown {
            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
        }

        .misi-label h2 {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #ffffff 0%, #fbbf24 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;
        }

        .mission-points {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .mission-point {
            position: absolute;
            color: white;
            font-size: 1.1rem;
            line-height: 1.5;
            max-width: 200px;
            text-align: center;
            z-index: 5;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            opacity: 0;
            transform: translateY(30px);
        }

        .mission-point:hover {
            transform: translateY(-10px) scale(1.05);
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: rgba(251, 191, 36, 0.5);
        }

        .mission-point::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(251, 191, 36, 0.4);
            animation: iconPulse 2s ease-in-out infinite;
        }

        @keyframes iconPulse {
            0%, 100% {
                transform: translateX(-50%) scale(1);
                box-shadow: 0 4px 15px rgba(251, 191, 36, 0.4);
            }
            50% {
                transform: translateX(-50%) scale(1.2);
                box-shadow: 0 6px 20px rgba(251, 191, 36, 0.6);
            }
        }

        .mission-point p {
            font-weight: 500;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            margin-top: 15px;
        }

        .mission-point em {
            font-style: italic;
            color: #fbbf24;
            font-weight: 600;
        }

        /* Staggered animation for mission points */
        .mission-1 {
            top: 80px;
            left: 30px;
            animation: missionFadeIn 0.8s ease-out 1s forwards;
        }

        .mission-2 {
            top: 80px;
            right: 30px;
            animation: missionFadeIn 0.8s ease-out 1.2s forwards;
        }

        .mission-3 {
            bottom: 80px;
            left: 30px;
            animation: missionFadeIn 0.8s ease-out 1.4s forwards;
        }

        .mission-4 {
            bottom: 80px;
            right: 30px;
            animation: missionFadeIn 0.8s ease-out 1.6s forwards;
        }

        @keyframes missionFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .connecting-lines {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        .line {
            position: absolute;
            background: linear-gradient(90deg, 
                rgba(251, 191, 36, 0.6) 0%, 
                rgba(255, 255, 255, 0.4) 50%, 
                rgba(251, 191, 36, 0.6) 100%);
            height: 3px;
            transform-origin: center;
            border-radius: 2px;
            box-shadow: 0 2px 10px rgba(251, 191, 36, 0.3);
            opacity: 0;
            animation: lineGrow 0.8s ease-out forwards;
        }

        @keyframes lineGrow {
            from {
                opacity: 0;
                transform: scaleX(0);
            }
            to {
                opacity: 1;
                transform: scaleX(1);
            }
        }

        .line-1 {
            top: 170px;
            left: 170px;
            width: 160px;
            transform: rotate(-45deg);
            animation-delay: 1.8s;
        }

        .line-2 {
            top: 170px;
            right: 170px;
            width: 160px;
            transform: rotate(45deg);
            animation-delay: 2s;
        }

        .line-3 {
            bottom: 170px;
            left: 170px;
            width: 160px;
            transform: rotate(45deg);
            animation-delay: 2.2s;
        }

        .line-4 {
            bottom: 170px;
            right: 170px;
            width: 160px;
            transform: rotate(-45deg);
            animation-delay: 2.4s;
        }

        /* Decorative elements */
        .visi-misi-section::before {
            content: '';
            position: absolute;
            top: 10%;
            left: 10%;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(251, 191, 36, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: decorFloat 8s ease-in-out infinite;
        }

        .visi-misi-section::after {
            content: '';
            position: absolute;
            bottom: 10%;
            right: 10%;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: decorFloat 10s ease-in-out infinite reverse;
        }

        @keyframes decorFloat {
            0%, 100% {
                transform: translateY(0px) scale(1);
                opacity: 0.3;
            }
            50% {
                transform: translateY(-20px) scale(1.1);
                opacity: 0.6;
            }
        }

        /* Enhanced Project Section Styles */
        .nilai-budaya-section {
            align-items: center;
            justify-content: center;
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

        .ourprojectsection-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 15px;
            margin-top: -40px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            display: block;
            color: #fbbf24;
        }

        .nilai-description {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 40px;
            opacity: 0.9;
            margin-top: 40px;
        }

        .nilai-description strong {
            font-weight: 700;
            color: #fbbf24;
        }

        /* Enhanced Project Images Grid with Animations */
        .nilai-budaya-section .images-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            height: 500px;
            perspective: 1000px;
        }

        .nilai-budaya-section .image-card {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            transform-style: preserve-3d;
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        /* Staggered animation delays */
        .nilai-budaya-section .image-card:nth-child(1) {
            animation-delay: 0.2s;
        }

        .nilai-budaya-section .image-card:nth-child(2) {
            animation-delay: 0.4s;
        }

        .nilai-budaya-section .image-card:nth-child(3) {
            animation-delay: 0.6s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .nilai-budaya-section .image-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                45deg,
                rgba(255, 255, 255, 0.1) 0%,
                transparent 50%,
                rgba(255, 255, 255, 0.1) 100%
            );
            z-index: 2;
            opacity: 0;
            transition: all 0.3s ease;
            transform: translateX(-100%);
        }

        .nilai-budaya-section .image-card:hover::before {
            opacity: 1;
            transform: translateX(100%);
        }

        .nilai-budaya-section .image-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                135deg,
                rgba(218, 37, 28, 0.8) 0%,
                rgba(30, 64, 175, 0.6) 100%
            );
            z-index: 3;
            opacity: 0;
            transition: all 0.4s ease;
            backdrop-filter: blur(2px);
        }

        .nilai-budaya-section .image-card:hover::after {
            opacity: 1;
        }

        .nilai-budaya-section .image-card:hover {
            transform: translateY(-15px) rotateX(5deg) rotateY(5deg) scale(1.03);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        }

        .nilai-budaya-section .image-card.large:hover {
            transform: translateY(-15px) rotateX(3deg) rotateY(-3deg) scale(1.02);
        }

        .nilai-budaya-section .image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.4s ease;
            position: relative;
            z-index: 1;
        }

        .nilai-budaya-section .image-card:hover img {
            transform: scale(1.08);
            filter: brightness(1.1) contrast(1.1);
        }

        /* Project Info Overlay */
        .project-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 25px;
            background: linear-gradient(
                to top,
                rgba(0, 0, 0, 0.8) 0%,
                rgba(0, 0, 0, 0.4) 50%,
                transparent 100%
            );
            color: white;
            z-index: 4;
            transform: translateY(100%);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .nilai-budaya-section .image-card:hover .project-info {
            transform: translateY(0);
        }

        .project-info h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #fbbf24;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .project-info p {
            font-size: 0.95rem;
            line-height: 1.4;
            opacity: 0.9;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        /* Floating animation for large image */
        .nilai-budaya-section .image-card.large {
            animation: fadeInUp 0.8s ease-out 0.2s forwards, float 6s ease-in-out 1.5s infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotateY(0deg);
            }
            25% {
                transform: translateY(-5px) rotateY(1deg);
            }
            50% {
                transform: translateY(-8px) rotateY(0deg);
            }
            75% {
                transform: translateY(-3px) rotateY(-1deg);
            }
        }

        /* Pulse effect for smaller images */
        .nilai-budaya-section .image-card:not(.large) {
            animation: fadeInUp 0.8s ease-out forwards, pulse 4s ease-in-out 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            }
            50% {
                box-shadow: 0 20px 45px rgba(218, 37, 28, 0.2);
            }
        }

        /* Responsive adjustments */
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
                width: 280px;
                height: 280px;
            }

            .visi-content h2 {
                font-size: 2.2rem;
            }

            .visi-content p {
                font-size: 1rem;
            }

            .outer-circle {
                width: 450px;
                height: 450px;
            }

            .mission-point {
                font-size: 0.95rem;
                max-width: 160px;
                padding: 15px;
            }

            .mission-1 {
                top: 60px;
                left: 20px;
            }

            .mission-2 {
                top: 60px;
                right: 20px;
            }

            .mission-3 {
                bottom: 60px;
                left: 20px;
            }

            .mission-4 {
                bottom: 60px;
                right: 20px;
            }

            .misi-label {
                top: -60px;
            }

            .misi-label h2 {
                font-size: 2.2rem;
            }

            .line {
                width: 120px;
            }

            .line-1 {
                top: 140px;
                left: 140px;
            }

            .line-2 {
                top: 140px;
                right: 140px;
            }

            .line-3 {
                bottom: 140px;
                left: 140px;
            }

            .line-4 {
                bottom: 140px;
                right: 140px;
            }

            .nilai-budaya-content {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .ourprojectsection-title {
                font-size: 2.5rem;
            }

            .nilai-budaya-section .image-card:hover {
                transform: translateY(-10px) scale(1.02);
            }

            .project-info h3 {
                font-size: 1.1rem;
            }

            .project-info p {
                font-size: 0.85rem;
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
                width: 350px;
                height: 350px;
            }

            .center-circle {
                width: 180px;
                height: 180px;
            }

            .visi-content h2 {
                font-size: 1.4rem;
            }

            .visi-content p {
                font-size: 0.8rem;
                line-height: 1.4;
            }

            .visi-content {
                padding: 15px;
            }

            .outer-circle {
                width: 270px;
                height: 270px;
            }

            .mission-point {
                font-size: 0.75rem;
                max-width: 100px;
                padding: 10px;
            }

            .mission-point::before {
                width: 12px;
                height: 12px;
                top: -6px;
            }

            .mission-1 {
                top: 30px;
                left: 10px;
            }

            .mission-2 {
                top: 30px;
                right: 10px;
            }

            .mission-3 {
                bottom: 30px;
                left: 10px;
            }

            .mission-4 {
                bottom: 30px;
                right: 10px;
            }

            .misi-label {
                top: -40px;
            }

            .misi-label h2 {
                font-size: 1.6rem;
            }

            .line {
                width: 60px;
                height: 2px;
            }

            .line-1 {
                top: 80px;
                left: 80px;
            }

            .line-2 {
                top: 80px;
                right: 80px;
            }

            .line-3 {
                bottom: 80px;
                left: 80px;
            }

            .line-4 {
                bottom: 80px;
                right: 80px;
            }

            .nilai-budaya-content {
                text-align: center;
            }

            .ourprojectsection-title {
                font-size: 2rem;
            }

            .nilai-description {
                font-size: 1rem;
            }

            .nilai-budaya-section .images-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .nilai-budaya-section .image-card:hover {
                transform: translateY(-8px) scale(1.01);
            }

            .project-info {
                padding: 15px;
            }

            .project-info h3 {
                font-size: 1rem;
            }

            .project-info p {
                font-size: 0.8rem;
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
                <a href="#" class="aboutnav-item" data-target-section="nilai-budaya-section">Project Kami</a>
            </div>
        </div>
    </nav>

    <section class="section about-section" id="about-section">
        <div class="container">
            <div class="about-content">
                <div class="text-content">
                    <h1 class="company-title">
                        PT. PULAUINTAN <span class="highlight">BAJAPERKASA</span>
                    </h1>

                    <p class="company-description">
                        ESTABLISHED ON 30TH JULY 1990,
                        PT PULAUINTAN BAJAPERKASA
                        KONSTRUKSI HAS EVOLVED TO BE A
                        RESPECTABLE BUILDING CONTRACTOR
                        IN INDONESIA
                    </p>

                    <p class="company-tagline">
                        Lebih dari sekadar membangun, PT Pulauintan Bajaperkasa Konstruksi kini dikenal sebagai pionir
                        yang menetapkan arah baru dalam dunia konstruksi Indonesia.
                    </p>

                    <a href="#" class="learn-more-btn">
                        Selengkapnya
                    </a>
                </div>

                <div class="images-grid">
                    <div class="image-card large">
                        <img src="/images/Pulauintanaward3.jpg" alt="Award3">
                    </div>
                    <div class="image-card">
                        <img src="/images/Pulauintanaward.jpg" alt="Award">
                    </div>
                    <div class="image-card">
                        <img src="/images/Pulauintanaward2.jpg" alt="Award2">
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
                            <p>High quality services</p>
                        </div>
                        <div class="mission-point mission-2">
                            <p>Timely services</p>
                        </div>
                        <div class="mission-point mission-3">
                            <p>Competitive pricing
                            </p>
                        </div>
                        <div class="mission-point mission-4">
                            <p>Total customer satisfaction assurance</p>
                        </div>
                    </div>

                    <div class="center-circle">
                        <div class="visi-content">
                            <h2>Visi</h2>
                            <p>To become the leading and reliable general contractor with the support of our people,
                                experiences and core values; integrity, teamwork, and customer service oriented
                                mind-set.</p>
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
            <div class="text-content-nilai">

                <div class="images-grid">
                    <div class="image-card large">
                        <img src="/images/Tzuchicenter.jpg" alt="Tzuchicenter">
                        <div class="project-info">
                            <h3>Tzu Chi Center</h3>
                            <p>Modern religious and community center showcasing our expertise in specialized construction</p>
                        </div>
                    </div>
                    <div class="image-card">
                        <img src="/images/Tamananggrek.jpg" alt="Tamananggrek">
                        <div class="project-info">
                            <h3>Taman Anggrek</h3>
                            <p>Premium commercial development demonstrating our capability in large-scale projects</p>
                        </div>
                    </div>
                    <div class="image-card">
                        <img src="/images/BundaMulia.jpg" alt="BundaMulia">
                        <div class="project-info">
                            <h3>Bunda Mulia</h3>
                            <p>Educational facility project highlighting our commitment to social infrastructure</p>
                        </div>
                    </div>
                </div>
                <p class="nilai-description">
                    We offer a diverse portfolio that includes:

                    Commercial developments such as offices, hotels, shopping malls, and apartments

                    Industrial facilities including factories and warehouses

                    Social infrastructure such as educational and religious buildings.
                    In order to serve our customers even better, we bring
                    excellent combination of team work, knowledge, skill,
                    along with the commitment to customers satisfaction.
                    We are always passionate to increase customers
                    satisfaction and contribute to the society by providing
                    our core values that beyond all expectations.
                </p>

            </div>
            


        </div>
    </section>

    <script>
        // Navigation functionality
        document.addEventListener('DOMContentLoaded', function () {
            const navItems = document.querySelectorAll('.aboutnav-item');
            const sections = document.querySelectorAll('.section');

            navItems.forEach(item => {
                item.addEventListener('click', function (e) {
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
                            
                            // Trigger animations when sections are shown
                            if (targetSectionId === 'nilai-budaya-section') {
                                setTimeout(() => {
                                    const imageCards = section.querySelectorAll('.image-card');
                                    imageCards.forEach((card, index) => {
                                        card.style.animationDelay = `${0.2 + index * 0.2}s`;
                                        card.style.animation = 'none';
                                        card.offsetHeight; // Trigger reflow
                                        card.style.animation = 'fadeInUp 0.8s ease-out forwards';
                                    });
                                }, 100);
                            } else if (targetSectionId === 'visi-misi-section') {
                                setTimeout(() => {
                                    // Reset and trigger visi-misi animations
                                    const diagram = section.querySelector('.circular-diagram');
                                    const misionPoints = section.querySelectorAll('.mission-point');
                                    const lines = section.querySelectorAll('.line');
                                    const misiLabel = section.querySelector('.misi-label');
                                    
                                    // Reset animations
                                    diagram.style.animation = 'none';
                                    misiLabel.style.animation = 'none';
                                    misionPoints.forEach(point => point.style.animation = 'none');
                                    lines.forEach(line => line.style.animation = 'none');
                                    
                                    // Trigger reflow
                                    diagram.offsetHeight;
                                    
                                    // Restart animations
                                    diagram.style.animation = 'fadeInScale 1.2s ease-out forwards';
                                    misiLabel.style.animation = 'fadeInDown 1s ease-out 0.5s forwards';
                                    
                                    misionPoints.forEach((point, index) => {
                                        point.style.animation = `missionFadeIn 0.8s ease-out ${1 + index * 0.2}s forwards`;
                                    });
                                    
                                    lines.forEach((line, index) => {
                                        line.style.animation = `lineGrow 0.8s ease-out ${1.8 + index * 0.2}s forwards`;
                                    });
                                }, 100);
                            }
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