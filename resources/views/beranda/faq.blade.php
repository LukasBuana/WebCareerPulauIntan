<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Pertanyaan yang Sering Diajukan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .idfd-faq-section {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #1a202c;
            background: #DA251C;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 60px 20px;
            position: relative;
            overflow-x: hidden;
        }

        .idfd-faq-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcz48cGF0dGVybiBpZD0iZ3JpZCIgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIj48cGF0aCBkPSJNIDQwIDAgTCAwIDAgMCA0MCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMDUpIiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=') repeat;
            opacity: 0.4;
        }

        .idfd-faq-section .idfd-header {
            position: relative;
            z-index: 2;
            text-align: center;
            margin-bottom: 50px;
        }

        .idfd-faq-section .idfd-header h1 {
            color: #ffffff;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 12px;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
            letter-spacing: -0.02em;
        }

        .idfd-faq-section .idfd-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            font-weight: 300;
            max-width: 600px;
            margin: 0 auto;
        }

        .idfd-faq-section .idfd-faq-container {
            max-width: 900px;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .idfd-faq-section .idfd-faq-item {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            margin-bottom: 16px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .idfd-faq-section .idfd-faq-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .idfd-faq-section .idfd-faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 28px 32px;
            background: transparent;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: 500;
            color: #2d3748;
            transition: all 0.3s ease;
            position: relative;
        }

        .idfd-faq-section .idfd-faq-question:hover {
            color: #DA251C;
        }

        .idfd-faq-section .idfd-faq-question.active {
            color: #DA251C;
            background: linear-gradient(135deg, rgba(218, 37, 28, 0.05) 0%, rgba(185, 28, 28, 0.05) 100%);
        }

        .idfd-faq-section .idfd-faq-question::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, #DA251C 0%, #B91C1C 100%);
            transform: scaleY(0);
            transition: transform 0.3s ease;
            border-radius: 0 2px 2px 0;
        }

        .idfd-faq-section .idfd-faq-question.active::before {
            transform: scaleY(1);
        }

        .idfd-faq-section .idfd-faq-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #DA251C;
            color: white;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(218, 37, 28, 0.3);
        }

        .idfd-faq-section .idfd-faq-question.active .idfd-faq-icon {
            transform: rotate(180deg);
            box-shadow: 0 6px 20px rgba(218, 37, 28, 0.4);
        }

        .idfd-faq-section .idfd-faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
        }

        .idfd-faq-section .idfd-faq-answer.active {
            max-height: 300px;
            opacity: 1;
        }

        .idfd-faq-section .idfd-faq-answer-content {
            padding: 0 32px 32px 32px;
            color: #4a5568;
            line-height: 1.8;
            font-size: 1rem;
            font-weight: 400;
            border-top: 1px solid rgba(218, 37, 28, 0.1);
            margin-top: -1px;
            background: linear-gradient(135deg, rgba(218, 37, 28, 0.02) 0%, rgba(185, 28, 28, 0.02) 100%);
        }

        .idfd-faq-section .idfd-faq-answer-content em {
            font-style: italic;
            color: #DA251C;
            font-weight: 500;
        }

        /* Floating elements decoration */
        .idfd-faq-section::after {
            content: '';
            position: absolute;
            top: 20%;
            right: -100px;
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            border-radius: 50%;
            filter: blur(40px);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .idfd-faq-section {
                padding: 40px 16px;
            }

            .idfd-faq-section .idfd-header h1 {
                font-size: 2.2rem;
            }

            .idfd-faq-section .idfd-header p {
                font-size: 1.1rem;
            }

            .idfd-faq-section .idfd-faq-question {
                padding: 24px;
                font-size: 1rem;
            }

            .idfd-faq-section .idfd-faq-answer-content {
                padding: 0 24px 24px 24px;
                font-size: 0.95rem;
            }

            .idfd-faq-section .idfd-faq-icon {
                width: 28px;
                height: 28px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .idfd-faq-section .idfd-header h1 {
                font-size: 1.8rem;
            }

            .idfd-faq-section .idfd-faq-question {
                padding: 20px;
                font-size: 0.95rem;
            }

            .idfd-faq-section .idfd-faq-answer-content {
                padding: 0 20px 20px 20px;
            }
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Loading animation */
        .idfd-faq-section .idfd-faq-item {
            animation: slideUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .idfd-faq-section .idfd-faq-item:nth-child(1) { animation-delay: 0.1s; }
        .idfd-faq-section .idfd-faq-item:nth-child(2) { animation-delay: 0.2s; }
        .idfd-faq-section .idfd-faq-item:nth-child(3) { animation-delay: 0.3s; }
        .idfd-faq-section .idfd-faq-item:nth-child(4) { animation-delay: 0.4s; }
        .idfd-faq-section .idfd-faq-item:nth-child(5) { animation-delay: 0.5s; }
        .idfd-faq-section .idfd-faq-item:nth-child(6) { animation-delay: 0.6s; }
        .idfd-faq-section .idfd-faq-item:nth-child(7) { animation-delay: 0.7s; }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="idfd-faq-section">
        <div class="idfd-header">
            <h1>Pertanyaan yang Sering Diajukan</h1>
            <p>Temukan jawaban untuk pertanyaan umum seputar proses rekrutmen di Indofood Group</p>
        </div>

        <div class="idfd-faq-container">
            <div class="idfd-faq-item">
                <button class="idfd-faq-question" onclick="toggleFaq(this)">
                    <span>Apa persyaratan dan tahapan yang harus dilakukan jika ingin melamar posisi di Indofood group?</span>
                    <span class="idfd-faq-icon">▼</span>
                </button>
                <div class="idfd-faq-answer">
                    <div class="idfd-faq-answer-content">
                        Periksa persyaratan dari jabatan yang dituju dan pastikan Anda memenuhi kualifikasi. Selanjutnya Anda dapat membuat akun dengan meng-klik tombol 'Daftar'. Setelah masuk, Anda diminta mengisi data pribadi, mengunggah foto dan CV terbaru, dan menekan tombol 'Simpan' untuk menyimpan data. Setelah itu, Anda dapat memilih posisi yang akan dilamar dengan menekan tombol 'Lamar Pekerjaan ini'.
                    </div>
                </div>
            </div>

            <div class="idfd-faq-item">
                <button class="idfd-faq-question" onclick="toggleFaq(this)">
                    <span>Apa yang harus dilakukan jika lupa password?</span>
                    <span class="idfd-faq-icon">▼</span>
                </button>
                <div class="idfd-faq-answer">
                    <div class="idfd-faq-answer-content">
                        Anda bisa melakukan <em>reset</em> kata sandi melalui menu lupa kata sandi dan membuat kata sandi baru.
                    </div>
                </div>
            </div>

            <div class="idfd-faq-item">
                <button class="idfd-faq-question" onclick="toggleFaq(this)">
                    <span>Dokumen apa saja yang harus dipersiapkan sebelum membuat akun?</span>
                    <span class="idfd-faq-icon">▼</span>
                </button>
                <div class="idfd-faq-answer">
                    <div class="idfd-faq-answer-content">
                        Pastikan Anda telah menyiapkan dokumen-dokumen berikut: CV terbaru dalam format PDF, foto profil yang professional, dan dokumen pendukung lainnya sesuai dengan persyaratan posisi yang akan dilamar.
                    </div>
                </div>
            </div>

            <div class="idfd-faq-item">
                <button class="idfd-faq-question" onclick="toggleFaq(this)">
                    <span>Mengapa saya gagal menyimpan data?</span>
                    <span class="idfd-faq-icon">▼</span>
                </button>
                <div class="idfd-faq-answer">
                    <div class="idfd-faq-answer-content">
                        Pastikan koneksi internet Anda stabil dan semua field yang wajib diisi sudah terisi dengan benar. Jika masalah berlanjut, coba refresh halaman atau hubungi tim support kami.
                    </div>
                </div>
            </div>

            <div class="idfd-faq-item">
                <button class="idfd-faq-question" onclick="toggleFaq(this)">
                    <span>Apakah saya bisa melamar lebih dari satu posisi?</span>
                    <span class="idfd-faq-icon">▼</span>
                </button>
                <div class="idfd-faq-answer">
                    <div class="idfd-faq-answer-content">
                        Ya, Anda dapat melamar untuk beberapa posisi sekaligus asalkan memenuhi kualifikasi yang dipersyaratkan. Namun, pastikan untuk menyesuaikan CV dan surat lamaran sesuai dengan posisi yang dilamar.
                    </div>
                </div>
            </div>
            
            <div class="idfd-faq-item">
                <button class="idfd-faq-question" onclick="toggleFaq(this)">
                    <span>Setelah selesai melamar posisi yang dituju, apakah tahapan selanjutnya?</span>
                    <span class="idfd-faq-icon">▼</span>
                </button>
                <div class="idfd-faq-answer">
                    <div class="idfd-faq-answer-content">
                        Setelah melamar, Anda dapat memantau status aplikasi Anda melalui halaman riwayat lamaran. Tim rekrutmen kami akan meninjau lamaran Anda dan akan menghubungi Anda jika Anda lolos ke tahap selanjutnya.
                    </div>
                </div>
            </div>

            <div class="idfd-faq-item">
                <button class="idfd-faq-question" onclick="toggleFaq(this)">
                    <span>Apa saja tahapan proses seleksi yang harus diikuti?</span>
                    <span class="idfd-faq-icon">▼</span>
                </button>
                <div class="idfd-faq-answer">
                    <div class="idfd-faq-answer-content">
                        Proses seleksi umumnya meliputi seleksi administrasi, tes psikologi, wawancara HR, wawancara user, dan medical check-up. Tahapan ini dapat bervariasi tergantung pada posisi yang dilamar.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleFaq(element) {
            const answer = element.nextElementSibling;
            const icon = element.querySelector('.idfd-faq-icon');
            
            // Get all FAQ questions within the specific section
            const allQuestions = document.querySelectorAll('.idfd-faq-section .idfd-faq-question');
            const allAnswers = document.querySelectorAll('.idfd-faq-section .idfd-faq-answer');
            
            // Close all other FAQ items within the specific section
            allQuestions.forEach(question => {
                if (question !== element) {
                    question.classList.remove('active');
                }
            });
            
            allAnswers.forEach(ans => {
                if (ans !== answer) {
                    ans.classList.remove('active');
                }
            });
            
            // Toggle current FAQ item
            element.classList.toggle('active');
            answer.classList.toggle('active');
        }

        // Add smooth entrance animation on page load
        document.addEventListener('DOMContentLoaded', function() {
            const faqItems = document.querySelectorAll('.idfd-faq-item');
            faqItems.forEach((item, index) => {
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>