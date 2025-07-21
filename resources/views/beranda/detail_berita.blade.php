<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Scalability Solution: Understanding Layer One vs. Layer Two Blockchains</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: #f0f2f5;
            color: #333;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            padding: 20px;
            margin-top: 67px;



        }

        .detailnews {
            /* Main container class */
            display: flex;
            width: 100%;
            max-width: 1200px;
            /* Increased max width slightly to match image better */
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-top-right-radius: 9px;
            border-bottom-right-radius: 9px;

        }

        .detailnews-main-content {
            /* Specific to main content */
            flex: 2;
            padding: 40px;
            border-right: 1px solid transparent;
            /* margin-top: 50px; */
        }

        .detailnews-header {
            /* Specific to news category header */
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .detailnews-hero-section {
            /* Specific to hero section */
            margin-bottom: 40px;
        }

        .detailnews-hero-content {
            /* Specific to hero content */
            display: flex;
            gap: 30px;
            align-items: flex-start;
        }

        .detailnews-hero-illustration img {
            /* Specific to hero image */
            max-width: 450px;
            height: auto;
            display: block;
            border-radius: 5px;
        }

        .detailnews-hero-text {
            /* Specific to hero text block */
            flex: 1;
            color: #333;
        }

        .detailnews-hero-title {
            /* Specific to hero title */
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.2;
            color: #333;
        }

        .detailnews-hero-subtitle {
            /* Specific to hero subtitle */
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 15px;
            line-height: 1.6;
            color: #555;
        }

        .detailnews-author-date {
            /* Specific to author and date */
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 14px;
            opacity: 0.8;
            color: #777;
        }

        .detailnews-content-section {
            /* Specific to content section */
            max-width: 100%;
            margin: 0;
            padding: 0;
        }

        .detailnews-article-content {
            /* Specific to article content */
            background: white;
            padding: 0;
            border-radius: 0;
            box-shadow: none;
            margin-bottom: 40px;
        }

        /* Removed .section-title as it was commented out in previous request */

        .detailnews-article-text {
            /* Specific to article text */
            font-size: 16px;
            line-height: 1.8;
            color: #444;
            margin-bottom: 20px;


        }

        .detailnews-article-text p {
            /* Specific to paragraphs within article text */
            margin-bottom: 20px;
            white-space: pre-line;
        }

        /* More News Section */
        .detailnews-more-news-section {
            /* Specific to more news section */
            flex: 1;
            padding: 40px;
            background-color: transparent;
            /* margin-top: 50px; */
            border-left: 2px solid #DA251C;
            border-radius: 9px;
            border-right: 2px solid #DA251C;
            color: transparent;



        }

        .detailnews-more-news-title {
            /* Specific to more news title */
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 25px;
            color: #333;
        }

        .detailnews-news-list {
            /* Specific to news list */
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .detailnews-news-item {
            /* Specific to individual news item */
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .detailnews-news-item img {
            /* Specific to news item image */
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 15px;
        }

        .detailnews-news-item-content {
            /* Specific to news item text content */
            flex: 1;
        }

        .detailnews-news-item-title {
            /* Specific to news item title */
            font-size: 16px;
            font-weight: 600;
            line-height: 1.3;
            margin-bottom: 5px;
            color: #333;
            cursor: pointer;
        }

        .detailnews-news-item-title:hover {
            /* Specific to news item title hover */
            color: #E54155;
        }

        .detailnews-news-item-author {
            /* Specific to news item author */
            font-size: 13px;
            color: #777;
        }

        .detailberita-accent-bar1 {
            display: flex;
            color: #E54155;
            /* This applies to text content if any */
            background-color: #E54155;
            /* Use this to make the bar itself orange */
            width: 280px;
            /* Example width */
            height: 2px;
            /* Example height */
            border-radius: 50px;
            margin: 0 auto;
            margin-bottom: 20px;


        }

        /* Media Queries */
        @media (max-width: 1024px) {
            .detailnews {
                flex-direction: column;
            }

            .detailnews-main-content {
                border-right: none;
                border-bottom: 1px solid #eee;
            }

            .detailnews-more-news-section {
                padding-top: 20px;
            }

            .detailnews-hero-content {
                flex-direction: column;
                gap: 20px;
            }

            .detailnews-hero-illustration img {
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .detailnews-main-content,
            .detailnews-more-news-section {
                padding: 20px;
            }

            .detailnews-hero-title {
                font-size: 28px;
            }

            .detailnews-hero-subtitle {
                font-size: 15px;
            }

            .detailnews-news-item img {
                width: 60px;
                height: 45px;
            }

            .detailnews-news-item-title {
                font-size: 14px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="detailnews"> {{-- Changed from .container to .detailnews --}}
        @include('beranda.header_user')
        <div class="detailnews-main-content"> {{-- Changed from .main-content --}}
            <div class="detailnews-header">News</div> {{-- Changed from .news-header --}}
            <div class="detailnews-hero-section"> {{-- Changed from .hero-section --}}
                <div class="detailnews-hero-content"> {{-- Changed from .hero-content --}}
                    <div class="detailnews-hero-illustration"> {{-- Changed from .hero-illustration --}}
                        @if($news->image)
                            <img src="{{ $news->image }}" alt="{{ $news->title }}">
                        @else
                            {{-- Placeholder if no image --}}
                            <img src="https://via.placeholder.com/450x300?text=News+Image" alt="Placeholder News Image">
                        @endif
                    </div>

                    <div class="detailnews-hero-text"> {{-- Changed from .hero-text --}}
                        <h1 class="detailnews-hero-title">{{ $news->title }}</h1> {{-- Changed from .hero-title --}}
                        <p class="detailnews-hero-subtitle">{{ $news->subtitle }}</p> {{-- Changed from .hero-subtitle
                        --}}
                        <div class="detailnews-author-date"> {{-- Changed from .author-date --}}
                            <span>By Alex House</span>
                            <span>|</span>
                            <span>{{ \Carbon\Carbon::parse($news->created_at)->format('F d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="detailnews-content-section"> {{-- Changed from .content-section --}}
                <div class="detailnews-article-content"> {{-- Changed from .article-content --}}
                    {{-- The image does not have a "Deskripsi Berita" title in the main content --}}
                    {{-- <h2 class="section-title">Deskripsi Berita</h2> --}}
                    <div class="detailnews-article-text"> {{-- Changed from .article-text --}}
                        <p>{{ $news->description }}</p>
                        {{-- If you have a full content field, you can use it here --}}
                        {{-- <p>{{ $news->full_content }}</p> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="detailnews-more-news-section"> {{-- Changed from .more-news-section --}}
            <h2 class="detailnews-more-news-title">More News</h2> {{-- Changed from .more-news-title --}}
            <ul class="detailnews-news-list"> {{-- Changed from .news-list --}}
                <li class="detailnews-news-item"> {{-- Changed from .news-item --}}
                    <img src="https://via.placeholder.com/80x60?text=News1" alt="News Image 1">
                    <div class="detailnews-news-item-content"> {{-- Changed from .news-item-content --}}
                        <div class="detailnews-news-item-title">U.S. downs suspected Chinese spy balloon</div> {{--
                        Changed from .news-item-title --}}
                        <div class="detailnews-news-item-author">By Craig Balon</div> {{-- Changed from
                        .news-item-author --}}
                    </div>



                </li>
                <div class="detailberita-accent-bar1"></div>


                <li class="detailnews-news-item"> {{-- Changed from .news-item --}}
                    <img src="https://via.placeholder.com/80x60?text=News1" alt="News Image 1">
                    <div class="detailnews-news-item-content"> {{-- Changed from .news-item-content --}}
                        <div class="detailnews-news-item-title">U.S. downs suspected Chinese spy balloon</div> {{--
                        Changed from .news-item-title --}}
                        <div class="detailnews-news-item-author">By Craig Balon</div> {{-- Changed from
                        .news-item-author --}}
                    </div>

                </li>
                <div class="detailberita-accent-bar1"></div>


                <li class="detailnews-news-item"> {{-- Changed from .news-item --}}
                    <img src="https://via.placeholder.com/80x60?text=News1" alt="News Image 1">
                    <div class="detailnews-news-item-content"> {{-- Changed from .news-item-content --}}
                        <div class="detailnews-news-item-title">U.S. downs suspected Chinese spy balloon</div> {{--
                        Changed from .news-item-title --}}
                        <div class="detailnews-news-item-author">By Craig Balon</div> {{-- Changed from
                        .news-item-author --}}
                    </div>



                </li>
                <div class="detailberita-accent-bar1"></div>


                <li class="detailnews-news-item"> {{-- Changed from .news-item --}}
                    <img src="https://via.placeholder.com/80x60?text=News1" alt="News Image 1">
                    <div class="detailnews-news-item-content"> {{-- Changed from .news-item-content --}}
                        <div class="detailnews-news-item-title">U.S. downs suspected Chinese spy balloon</div> {{--
                        Changed from .news-item-title --}}
                        <div class="detailnews-news-item-author">By Craig Balon</div> {{-- Changed from
                        .news-item-author --}}
                    </div>

                </li>


            </ul>
        </div>
    </div>
</body>

</html>