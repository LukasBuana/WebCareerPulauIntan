<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Pertanyaan yang Sering Diajukan</title>
    <style>
        .faq * {
            margin: 3px;
            padding: 1px;
            box-sizing: border-box;
            margin-left: 100px;
            margin-right: 100px;
            align-items: center;
        }

        .faq body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            margin-left: 100px;
            margin-right: 100px;
            align-items: center;
        }

        .faq .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
            margin-left: 100px;
            margin-right: 100px;
            align-items: center;
        }

        .faq .faq-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
             margin-left: 100px;
            margin-right: 100px;
            align-items: center;
        }

        .faq .faq-item {
            border-bottom: 1px solid #e9ecef;
        }

        .faq .faq-item:last-child {
            border-bottom: none;
        }

        .faq .faq-question {
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
             margin-left: 100px;
            margin-right: 100px;
            align-items: center;
        }

        .faq .faq-question:hover {
            background-color: #f8f9fa;
        }

        .faq .faq-question.active {
            background-color: #f0f4f8;
        }

        .faq .faq-icon {
            font-size: 1.2rem;
            font-weight: bold;
            color: #666;
            transition: transform 0.3s ease;
        }

        .faq .faq-question.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background-color: #f8f9fa;
        }

        .faq .faq-answer.active {
            max-height: 200px; /* You might need to adjust this value based on your content */
        }

        .faq .faq-answer-content {
            padding: 20px 25px;
            color: #555;
            line-height: 1.8;
        }

        .faq .faq-answer-content em {
            font-style: italic;
            color: #666;
        }

        @media (max-width: 768px) {
            .faq .container {
                padding: 20px 15px;
            }

            .faq .header h1 {
                font-size: 2rem;
            }

            .faq .faq-question {
                padding: 15px 20px;
                font-size: 1rem;
            }

            .faq .faq-answer-content {
                padding: 15px 20px;
            }
        }
    </style>
</head>
<body>

        <div class="faq faq-container">
            <div class="faq-item">
                <button class="faq-question" onclick="toggleFaq(this)">
                    <span>Apa persyaratan dan tahapan yang harus dilakukan jika ingin melamar posisi di Indofood group?</span>
                    <span class="faq-icon">▼</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Periksa persyaratan dari jabatan yang dituju dan pastikan Anda memenuhi kualifikasi. Selanjutnya Anda dapat membuat akun dengan meng-klik tombol 'Daftar'. Setelah masuk, Anda diminta mengisi data pribadi, mengunggah foto dan CV terbaru, dan menekan tombol 'Simpan' untuk menyimpan data. Setelah itu, Anda dapat memilih posisi yang akan dilamar dengan menekan tombol 'Lamar Pekerjaan ini'.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" onclick="toggleFaq(this)">
                    <span>Apa yang harus dilakukan jika lupa password?</span>
                    <span class="faq-icon">▼</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Anda bisa melakukan <em>reset</em> kata sandi melalui menu lupa kata sandi dan membuat kata sandi baru.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" onclick="toggleFaq(this)">
                    <span>Dokumen apa saja yang harus dipersiapkan sebelum membuat akun?</span>
                    <span class="faq-icon">▼</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Pastikan Anda telah menyiapkan dokumen-dokumen berikut: CV terbaru dalam format PDF, foto profil yang professional, dan dokumen pendukung lainnya sesuai dengan persyaratan posisi yang akan dilamar.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" onclick="toggleFaq(this)">
                    <span>Mengapa saya gagal menyimpan data?</span>
                    <span class="faq-icon">▼</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Pastikan koneksi internet Anda stabil dan semua field yang wajib diisi sudah terisi dengan benar. Jika masalah berlanjut, coba refresh halaman atau hubungi tim support kami.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" onclick="toggleFaq(this)">
                    <span>Apakah saya bisa melamar lebih dari satu posisi?</span>
                    <span class="faq-icon">▼</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Ya, Anda dapat melamar untuk beberapa posisi sekaligus asalkan memenuhi kualifikasi yang dipersyaratkan. Namun, pastikan untuk menyesuaikan CV dan surat lamaran sesuai dengan posisi yang dilamar.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleFaq(element) {
            const answer = element.nextElementSibling;
            const icon = element.querySelector('.faq-icon');
            const allQuestions = document.querySelectorAll('.faq-question');
            const allAnswers = document.querySelectorAll('.faq-answer');
            
            // Close all other FAQ items
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