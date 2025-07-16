<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tips Wawancara Kerja secara Online</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        .hero-section {
            background: linear-gradient(135deg, #662b2bff 10%, #ed7129ff 100%);
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 1200px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            padding: 0 40px;
        }

        .hero-illustration {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .office-scene {
            position: relative;
            width: 100%;
            max-width: 400px;
            height: 300px;
        }

        .desk {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 280px;
            height: 30px;
            background: #2c3e50;
            border-radius: 5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .person {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 120px;
        }

        .person-body {
            width: 80px;
            height: 80px;
            background: #f39c12;
            border-radius: 10px;
            position: relative;
        }

        .person-head {
            width: 40px;
            height: 40px;
            background: #fdbcb4;
            border-radius: 50%;
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
        }

        .person-hair {
            width: 35px;
            height: 20px;
            background: #2c3e50;
            border-radius: 20px 20px 0 0;
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
        }

        .person-face {
            position: absolute;
            top: 5px;
            left: 50%;
            transform: translateX(-50%);
        }

        .eye {
            width: 4px;
            height: 4px;
            background: #2c3e50;
            border-radius: 50%;
            display: inline-block;
            margin: 0 2px;
        }

        .smile {
            width: 15px;
            height: 8px;
            border: 2px solid #2c3e50;
            border-top: none;
            border-radius: 0 0 15px 15px;
            margin-top: 5px;
        }

        .laptop {
            width: 60px;
            height: 40px;
            background: #ecf0f1;
            border-radius: 5px;
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .laptop::before {
            content: '';
            position: absolute;
            top: -25px;
            left: 2px;
            width: 56px;
            height: 30px;
            background: #34495e;
            border-radius: 5px 5px 0 0;
        }

        .laptop-screen {
            position: absolute;
            top: -22px;
            left: 5px;
            width: 50px;
            height: 25px;
            background: #3498db;
            border-radius: 3px;
        }

        .lamp {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 15px;
            height: 80px;
        }

        .lamp-base {
            width: 20px;
            height: 5px;
            background: #2c3e50;
            border-radius: 10px;
            position: absolute;
            bottom: 0;
            left: -2.5px;
        }

        .lamp-arm {
            width: 3px;
            height: 50px;
            background: #2c3e50;
            position: absolute;
            bottom: 5px;
            left: 6px;
            transform: rotate(-10deg);
        }

        .lamp-head {
            width: 25px;
            height: 15px;
            background: #27ae60;
            border-radius: 0 0 10px 10px;
            position: absolute;
            top: 0;
            left: -6px;
        }

        .plant {
            position: absolute;
            bottom: 30px;
            right: 40px;
            width: 30px;
            height: 40px;
        }

        .pot {
            width: 30px;
            height: 15px;
            background: #8b4513;
            border-radius: 0 0 15px 15px;
            position: absolute;
            bottom: 0;
        }

        .leaf {
            width: 15px;
            height: 20px;
            background: #27ae60;
            border-radius: 50% 0;
            position: absolute;
            bottom: 10px;
        }

        .leaf:nth-child(1) {
            left: 5px;
            transform: rotate(-20deg);
        }

        .leaf:nth-child(2) {
            right: 5px;
            transform: rotate(20deg);
        }

        .interview-bubble {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 180px;
            height: 120px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            padding: 15px;
            animation: float 3s ease-in-out infinite;
        }

        .interview-bubble::before {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 30px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid white;
        }

        .bubble-header {
            background: #1abc9c;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 12px;
            text-align: center;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .interviewer-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .interviewer-avatar {
            width: 40px;
            height: 40px;
            background: #3498db;
            border-radius: 8px;
            position: relative;
        }

        .interviewer-info {
            flex: 1;
        }

        .interviewer-name {
            font-size: 10px;
            font-weight: 600;
            color: #2c3e50;
        }

        .rating-stars {
            display: flex;
            gap: 2px;
            margin-top: 3px;
        }

        .star {
            width: 8px;
            height: 8px;
            background: #f39c12;
            border-radius: 50%;
        }

        .status-indicator {
            width: 12px;
            height: 12px;
            background: #e74c3c;
            border-radius: 50%;
            position: absolute;
            top: 15px;
            right: 15px;
            animation: pulse 2s infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
        }

        .hero-text {
            color: white;
        }

        .hero-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .hero-date {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            opacity: 0.8;
        }

        .date-icon {
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content-section {
            max-width: 800px;
            margin: 60px auto;
            padding: 0 40px;
        }

        .article-content {
            background: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .article-text {
            font-size: 18px;
            line-height: 1.8;
            color: #444;
            margin-bottom: 30px;
        }

        .highlight {
            background: linear-gradient(120deg, #a8edea 0%, #fed6e3 100%);
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 600;
        }

        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .tip-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #E54155;
            transition: transform 0.3s ease;
            width: 130%;
        }

        .tip-card:hover {
            transform: translateY(-5px);
        }

        .tip-card:nth-child(2) {
            border-left-color: #e74c3c;
        }

        .tip-card:nth-child(3) {
            border-left-color: #f39c12;
        }

        .tip-card:nth-child(4) {
            border-left-color: #27ae60;
        }

        .tip-number {
            width: 40px;
            height: 40px;
            background: #3498db;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .tip-card:nth-child(2) .tip-number {
            background: #e74c3c;
        }

        .tip-card:nth-child(3) .tip-number {
            background: #f39c12;
        }

        .tip-card:nth-child(4) .tip-number {
            background: #27ae60;
        }

        .tip-title {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .tip-description {
            color: #666;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 40px;
                padding: 0 20px;
            }
            
            .hero-title {
                font-size: 32px;
            }
            
            .content-section {
                padding: 0 20px;
            }
            
            .article-content {
                padding: 30px;
            }
            
            .tips-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-illustration">
                <div class="office-scene">
                    <div class="desk"></div>
                    <div class="person">
                        <div class="person-body">
                            <div class="person-head">
                                <div class="person-hair"></div>
                                <div class="person-face">
                                    <div class="eye"></div>
                                    <div class="eye"></div>
                                    <div class="smile"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="laptop">
                        <div class="laptop-screen"></div>
                    </div>
                    <div class="lamp">
                        <div class="lamp-base"></div>
                        <div class="lamp-arm"></div>
                        <div class="lamp-head"></div>
                    </div>
                    <div class="plant">
                        <div class="pot"></div>
                        <div class="leaf"></div>
                        <div class="leaf"></div>
                    </div>
                    <div class="interview-bubble">
                        <div class="status-indicator"></div>
                        <div class="bubble-header">
                            🟢 ONLINE JOB INTERVIEW
                        </div>
                        <div class="interviewer-profile">
                            <div class="interviewer-avatar"></div>
                            <div class="interviewer-info">
                                <div class="interviewer-name">HR Manager</div>
                                <div class="rating-stars">
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="hero-text">
                <h1 class="hero-title">Tips Wawancara Kerja secara Online</h1>
                <p class="hero-subtitle">
                    Panduan lengkap untuk mempersiapkan dan menghadapi wawancara kerja online dengan percaya diri dan profesional.
                </p>
                <div class="hero-date">
                    <div class="date-icon">📅</div>
                    <span>24 Apr 2025</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content-section">
            
            <div class="tip-card">
                <h3 class="tip-title">Atur Lingkungan</h3>
                <p class="tip-description">
                    Pilih tempat yang tenang dengan pencahayaan yang baik. Pastikan background terlihat profesional dan tidak mengganggu fokus pewawancara.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    
                </p>
            </div>
            
            
        </div>
    </div>
</body>
</html>