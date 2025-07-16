<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Pertanyaan yang Sering Diajukan</title>
    <style>
        /* Base styles for the section, using a unique ID or a highly specific class */
        .idfd-faq-section {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            box-sizing: border-box;
        }

        .idfd-faq-section .idfd-header h1 {
            text-align: center;
            color: #333;
            margin-bottom: 40px;
            font-size: 2.5rem;
        }

        .idfd-faq-section .idfd-faq-container {
            max-width: 800px;
            width: 100%;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .idfd-faq-section .idfd-faq-item {
            border-bottom: 1px solid #e9ecef;
        }

        .idfd-faq-section .idfd-faq-item:last-child {
            border-bottom: none;
        }

        .idfd-faq-section .idfd-faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 25px;
            background: white;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: 500;
            color: #2c5aa0;
            transition: background-color 0.3s ease;
        }

        .idfd-faq-section .idfd-faq-question:hover {
            background-color: #f8f9fa;
        }

        .idfd-faq-section .idfd-faq-question.active {
            background-color: #f0f4f8;
        }

        .idfd-faq-section .idfd-faq-icon {
            font-size: 1.2rem;
            font-weight: bold;
            color: #666;
            transition: transform 0.3s ease;
        }

        .idfd-faq-section .idfd-faq-question.active .idfd-faq-icon {
            transform: rotate(180deg);
        }

        .idfd-faq-section .idfd-faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            background-color: #f8f9fa;
        }

        .idfd-faq-section .idfd-faq-answer.active {
            max-height: 200px; /* Adjust as needed */
            transition: max-height 0.3s ease-in;
        }

        .idfd-faq-section .idfd-faq-answer-content {
            padding: 20px 25px;
            color: #555;
            line-height: 1.8;
        }

        .idfd-faq-section .idfd-faq-answer-content em {
            font-style: italic;
            color: #666;
        }

        @media (max-width: 768px) {
            .idfd-faq-section {
                padding: 20px 15px;
            }

            .idfd-faq-section .idfd-header h1 {
                font-size: 2rem;
            }

            .idfd-faq-section .idfd-faq-question {
                padding: 15px 20px;
                font-size: 1rem;
            }

            .idfd-faq-section .idfd-faq-answer-content {
                padding: 15px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="idfd-faq-section">
        <div class="idfd-header">
            <h1>Pertanyaan yang Sering Diajukan</h1>
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
    </script>
</body>
</html>