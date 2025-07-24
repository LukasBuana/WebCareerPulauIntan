<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .idxcontainer {
            max-width: 1200px;
            margin: 40px;
            padding: 30px;
            border-radius: 80px;
            margin-left: 280px;
            margin-top: 60px;
        }

        .section-card {
            background-color: transparent;
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            cursor: pointer;
            background-color: #fcfcfc;
            transition: background-color 0.2s ease;
            border-bottom: 1px solid #eee;
        }

        .section-header:hover {
            background-color: #f5f5f5;
        }

        .section-header h2 {
            margin: 0;
            font-size: 18px;
            font-weight: normal;
        }

        .section-header i {
            font-size: 18px;
            color: #555;
            transition: transform 0.3s ease;
        }

        .section-header.expanded i {
            transform: rotate(180deg);
        }

        .section-content {
            padding: 20px;
            display: none;
            line-height: 1.6;
            color: #666;
            background-color: #fff;
        }

        .section-card.expanded .section-content {
            display: block;
        }

        .required-star {
            color: #dc3545;
            margin-left: 5px;
        }

        .submit-button-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .submit-button {
            background-color: #d0d0d0;
            color: black;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #DA251C;
            color: #ffff;
        }
        p {
            margin-left: 13px;
            font-size: 30px;
        }
#loadingOverlay {
            /* Pastikan display awalnya none, ini yang paling krusial */
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            justify-content: center; /* Untuk centering spinner */
            align-items: center;     /* Untuk centering spinner */
        }
    </style>
</head>
<body>
     <div id="loadingOverlay">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @include('beranda.header_user')
    @include('applicant.sidebar_user')

    <div class="idxcontainer">
        <p>Profil Saya</p>
        {{-- Pastikan kedua file ini memiliki struktur .section-card yang benar --}}
        @include('applicant.profile.data_diri')
        @include('applicant.profile.data_keluarga')
        @include('applicant.profile.data_pendidikan')
        @include('applicant.profile.data_organisasi')
        @include('applicant.profile.data_kursus')
        @include('applicant.profile.data_bahasa_asing')
        @include('applicant.profile.data_keterampilan_komputer')
        @include('applicant.profile.data_karya_ilmiah')

        <div class="submit-button-wrapper">
            <button type="button" class="submit-button">Print</button>
        </div>

        
    </div>

    <script>
        console.log('--- GLOBAL SCRIPT LOADING ---');
        window.loadingOverlay = document.getElementById('loadingOverlay');

        window.showLoading = function() {
            if (window.loadingOverlay) {
                window.loadingOverlay.style.display = 'flex';
                console.log('LOADING: showLoading() called, overlay display set to flex.');
            } else {
                console.error('LOADING ERROR: loadingOverlay element not found!');
            }
        };

        window.hideLoading = function() {
            if (window.loadingOverlay) {
                window.loadingOverlay.style.display = 'none';
                console.log('LOADING: hideLoading() called, overlay display set to none.');
            } else {
                console.error('LOADING ERROR: hideLoading() called but loadingOverlay element not found!');
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            console.log('GLOBAL SCRIPT: DOMContentLoaded fired.');
            window.hideLoading();

            // --- Fungsi untuk menangani pembukaan accordion internal ---
            function openInnerAccordionIfAvailable(mainCollapseElement, innerAccordionTargetId = null) {
                let innerCollapseElement = null;

                if (innerAccordionTargetId) {
                    innerCollapseElement = mainCollapseElement.querySelector(innerAccordionTargetId);
                } else {
                    innerCollapseElement = mainCollapseElement.querySelector('.accordion-collapse.collapse');
                }

                if (innerCollapseElement) {
                    const bsInnerCollapse = bootstrap.Collapse.getInstance(innerCollapseElement) || new bootstrap.Collapse(innerCollapseElement, { toggle: false });
                    if (!innerCollapseElement.classList.contains('show')) {
                        bsInnerCollapse.show();
                        console.log(`GLOBAL SCRIPT: Inner accordion opened: #${innerCollapseElement.id}`);
                    } else {
                        console.log(`GLOBAL SCRIPT: Inner accordion #${innerCollapseElement.id} already open.`);
                    }
                    // Scroll ke inner accordion jika dibuka oleh hash
                    innerCollapseElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                } else {
                    console.warn(`GLOBAL SCRIPT: No inner accordion element found for target: ${innerAccordionTargetId || 'auto-detect'}`);
                }
            }


            // --- FUNGSI UNTUK MEREKAM DAN MEMULIHKAN STATUS ACCORDION ---
            const mainAccordionHeaders = document.querySelectorAll('.card-header[data-bs-toggle="collapse"]');

            mainAccordionHeaders.forEach(header => {
                const mainTargetId = header.dataset.bsTarget; // e.g., "#myPrefixTrainingCourseMainCollapse"
                const mainCollapseElement = document.querySelector(mainTargetId);

                if (mainCollapseElement) {
                    // Saat accordion utama dibuka secara manual, tambahkan hash ke URL
                    // HANYA jika ini adalah pembukaan manual pertama kali untuk main accordion (bukan dari hash reload)
                    mainCollapseElement.addEventListener('shown.bs.collapse', function() {
                        const currentHash = window.location.hash;
                        // Cek apakah hash saat ini sudah merupakan bagian dari hash yang kita targetkan
                        if (!currentHash.startsWith(mainTargetId)) { // Jika hash saat ini BUKAN main collapse ini
                            history.replaceState(null, null, mainTargetId); // Hanya update ke hash main collapse
                            console.log(`GLOBAL SCRIPT: Main accordion opened manually: ${mainTargetId}. URL updated.`);
                            // Jangan otomatis buka inner di sini, biarkan user yang pilih
                        }
                    });

                    // Tambahkan event listener untuk inner accordion buttons untuk mengupdate hash
                    const innerAccordionButtons = mainCollapseElement.querySelectorAll('.accordion-button[data-bs-toggle="collapse"]');
                    innerAccordionButtons.forEach(innerButton => {
                        const innerTargetId = innerButton.dataset.bsTarget; // e.g., "#myPrefixcollapseTrainingCourse"
                        const innerCollapseElement = mainCollapseElement.querySelector(innerTargetId);

                        if (innerCollapseElement) {
                            innerCollapseElement.addEventListener('shown.bs.collapse', function() {
                                const mainHash = mainTargetId;
                                const combinedHash = `${mainHash}_${innerTargetId.substring(1)}`; // Combine: #mainID_innerID_without_hash
                                history.replaceState(null, null, combinedHash);
                                console.log(`GLOBAL SCRIPT: Inner accordion opened: ${innerTargetId}. Combined URL updated.`);
                            });
                            innerCollapseElement.addEventListener('hidden.bs.collapse', function() {
                                const currentHash = window.location.hash;
                                const combinedInnerHash = `${mainTargetId}_${innerTargetId.substring(1)}`;
                                if (currentHash === combinedInnerHash) {
                                    history.replaceState(null, null, mainTargetId); // Revert to only main hash
                                    console.log(`GLOBAL SCRIPT: Inner accordion closed: ${innerTargetId}. Reverted to main hash.`);
                                }
                            });
                        }
                    });

                    mainCollapseElement.addEventListener('hidden.bs.collapse', function() {
                        const currentHash = window.location.hash;
                        if (currentHash.startsWith(mainTargetId)) {
                            history.replaceState(null, null, window.location.pathname + window.location.search);
                            console.log(`GLOBAL SCRIPT: Main accordion or its inner closed: ${mainTargetId}. Hash removed from URL.`);
                        }
                    });
                }
            });

            // Setelah halaman dimuat, periksa hash di URL untuk membuka accordion yang sesuai
            const initialHash = window.location.hash;
            if (initialHash) {
                console.log(`GLOBAL SCRIPT: Found hash in URL on load: ${initialHash}`);

                const hashParts = initialHash.split('_');
                const mainCollapseHash = hashParts[0];
                const innerCollapseHashName = hashParts.length > 1 ? hashParts[1] : null;

                const mainTargetCollapseElement = document.querySelector(mainCollapseHash);

                if (mainTargetCollapseElement) {
                    console.log(`GLOBAL SCRIPT: Main target collapse element found for hash: ${mainCollapseHash}`);
                    setTimeout(() => {
                        const bsMainCollapse = bootstrap.Collapse.getInstance(mainTargetCollapseElement) || new bootstrap.Collapse(mainTargetCollapseElement, { toggle: false });
                        if (!mainTargetCollapseElement.classList.contains('show')) {
                            bsMainCollapse.show();
                            console.log(`GLOBAL SCRIPT: Explicitly showing main accordion: ${mainCollapseHash}`);
                        } else {
                            console.log(`GLOBAL SCRIPT: Main accordion ${mainCollapseHash} already open.`);
                        }
                        // Scroll to the main section first, or to the inner if it opens
                        // mainTargetCollapseElement.scrollIntoView({ behavior: 'smooth', block: 'start' });

                        // Now, if an inner hash exists, open the inner accordion
                        if (innerCollapseHashName) {
                            const fullInnerHash = `#${innerCollapseHashName}`; // Add '#' back for selector
                            console.log(`GLOBAL SCRIPT: Attempting to open specific inner accordion: ${fullInnerHash}`);
                            openInnerAccordionIfAvailable(mainTargetCollapseElement, fullInnerHash);
                        } else {
                            // Jika hanya main hash yang ada, dan tidak ada inner hash,
                            // mungkin scroll ke main collapse saja.
                            mainTargetCollapseElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }

                    }, 300); // Delay
                } else {
                    console.warn(`GLOBAL SCRIPT: No main collapse element found for initial hash: ${initialHash}`);
                }
            } else {
                console.log('GLOBAL SCRIPT: No hash found in URL on load.');
            }
        });
        console.log('--- GLOBAL SCRIPT FINISHED ---');
    </script>

</body>
</html>      