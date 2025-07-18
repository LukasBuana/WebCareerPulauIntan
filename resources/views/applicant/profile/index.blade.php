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
            background-color: #f0f2f5; /* Light grey background */
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
            overflow: hidden; /* Ensures content respects border-radius */
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            cursor: pointer;
            background-color: #fcfcfc;
            transition: background-color 0.2s ease;
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
            display: none; /* Hidden by default */
            line-height: 1.6;
            color: #666;
        }

        .section-card.expanded .section-content {
            display: block; /* Shown when expanded */
        }

        .required-star {
            color: #dc3545; /* Red color for asterisk */
            margin-left: 5px;
        }

        .submit-button-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .submit-button {
            background-color: #d0d0d0; /* Grey similar to the image */
            color: black; /* Darker grey text */
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
    </style>
</head>
<body>
    @include('beranda.header_user')
    @include('applicant.sidebar_user') 
<div>
    <div class="idxcontainer">
        <p>Profil Saya</p>
        @include('applicant.profile.data_diri') {{-- INCLUDE FILE DI SINI --}}
    
    <div class="submit-button-wrapper">
        <button type="button" class="submit-button">Print</button>
    </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sectionHeaders = document.querySelectorAll('.section-header');

            sectionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const parentCard = this.closest('.section-card');
                    parentCard.classList.toggle('expanded'); // Toggle 'expanded' class
                });
            });
        });
    </script>

</body>
</html>      