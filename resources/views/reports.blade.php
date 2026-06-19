<!doctype html>
<html lang="en">

<head>
    @extends('layouts.head-css')

    <title>Food Business Plans | Ready-to-Use Reports for Food Entrepreneurs</title>

    <meta name="description"
          content="Explore ready-to-use food business plans and detailed reports for FSSAI licensing, compliance, and food startups. Choose plans that fit your business goals.">

    <meta name="keywords"
          content="food business plans, FSSAI reports, food startup plans, compliance reports, food business documents">

    <style>
        .reports-page {
            background: #f5f7fb;
            color: #172033;
        }

        .reports-hero {
            position: relative;
            min-height: 68vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            background:
                linear-gradient(135deg, rgba(7, 16, 39, 0.92), rgba(11, 42, 74, 0.86)),
                url("{{ URL::asset('assets/front/images/reports.webp') }}") center/cover no-repeat;
            color: #fff;
            padding: 96px 0 120px;
        }

        .reports-hero::after {
            content: "";
            position: absolute;
            inset: auto 0 0;
            height: 110px;
            background: linear-gradient(180deg, rgba(245, 247, 251, 0), #f5f7fb);
        }

        .reports-hero-content {
            position: relative;
            z-index: 1;
            max-width: 860px;
            margin: 0 auto;
            text-align: center;
        }

        .reports-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            margin-bottom: 18px;
            border: 1px solid rgba(255, 255, 255, 0.24);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.1);
            color: #ffd21b;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .reports-hero h1 {
            margin: 0;
            font-size: clamp(38px, 6vw, 72px);
            line-height: 1.05;
            font-weight: 800;
        }

        .reports-hero p {
            max-width: 720px;
            margin: 20px auto 0;
            color: rgba(255, 255, 255, 0.86);
            font-size: 18px;
            line-height: 1.7;
        }

        .reports-search-panel {
            position: relative;
            z-index: 2;
            max-width: 980px;
            margin: -74px auto 58px;
            padding: 22px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 22px 55px rgba(15, 23, 42, 0.14);
        }

        .reports-search-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr auto auto;
            gap: 14px;
            align-items: center;
        }

        .reports-field,
        .reports-search {
            min-height: 54px;
            border: 1px solid #d9e1ec;
            border-radius: 8px;
            background: #f8fafc;
        }

        .reports-field {
            padding: 0 16px;
            color: #172033;
            font-weight: 600;
        }

        .reports-search {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 16px;
        }

        .reports-search span {
            color: #64748b;
        }

        .reports-search input {
            width: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            color: #172033;
            font-weight: 600;
        }

        .reports-search-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 54px;
            padding: 0 28px;
            border: 0;
            border-radius: 8px;
            background: #ffd21b;
            color: #101828;
            font-weight: 800;
            box-shadow: 0 10px 22px rgba(255, 210, 27, 0.28);
        }

        .reports-reset-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 54px;
            padding: 0 22px;
            border: 1px solid #d9e1ec;
            border-radius: 8px;
            background: #fff;
            color: #172033;
            font-weight: 800;
            text-decoration: none;
        }

        .reports-reset-btn:hover {
            background: #f1f5f9;
            color: #0b132b;
        }

        .reports-list {
            padding: 0 0 80px;
        }

        .reports-section-head {
            max-width: 760px;
            margin: 0 auto 42px;
            text-align: center;
        }

        .reports-section-head h2 {
            position: relative;
            display: inline-block;
            margin: 0 0 24px;
            color: #071127;
            font-size: clamp(32px, 4vw, 48px);
            line-height: 1.14;
            font-weight: 800;
            letter-spacing: 0;
        }

        .reports-section-head h2::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -13px;
            width: 86px;
            height: 4px;
            border-radius: 999px;
            background: linear-gradient(90deg, #ffd21b, #0b132b);
            transform: translateX(-50%);
        }

        .reports-section-head p {
            margin: 0;
            max-width: 680px;
            margin-left: auto;
            margin-right: auto;
            color: #526178;
            font-size: 18px;
            line-height: 1.8;
            font-weight: 500;
        }

        .reports-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .report-card {
            display: flex;
            flex-direction: column;
            min-height: 100%;
            overflow: hidden;
            border: 1px solid rgba(148, 163, 184, 0.28);
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 14px 34px rgba(15, 23, 42, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .report-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 48px rgba(15, 23, 42, 0.14);
        }

        .report-media {
            position: relative;
            aspect-ratio: 16 / 10;
            background: linear-gradient(135deg, #0b132b, #1c2541);
            overflow: hidden;
        }

        .report-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .report-media-placeholder {
            height: 100%;
            display: grid;
            place-items: center;
            color: #ffd21b;
            font-size: 52px;
        }

        .report-price {
            position: absolute;
            right: 14px;
            bottom: 14px;
            padding: 8px 13px;
            border-radius: 8px;
            background: #ffd21b;
            color: #111827;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.22);
        }

        .report-card-body {
            display: flex;
            flex: 1;
            flex-direction: column;
            padding: 24px;
        }

        .report-card h3 {
            margin: 0 0 12px;
            color: #111827;
            font-size: 22px;
            line-height: 1.3;
            font-weight: 800;
        }

        .report-card p {
            margin: 0 0 22px;
            color: #64748b;
            line-height: 1.7;
        }

        .report-card a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: fit-content;
            margin-top: auto;
            padding: 11px 18px;
            border-radius: 8px;
            background: #0b132b;
            color: #fff;
            font-weight: 800;
            text-decoration: none;
        }

        .report-card a:hover {
            background: #ffd21b;
            color: #111827;
        }

        .reports-empty {
            padding: 46px 24px;
            border-radius: 8px;
            background: #fff;
            text-align: center;
            color: #64748b;
            box-shadow: 0 14px 34px rgba(15, 23, 42, 0.08);
        }

        .reports-pagination {
            margin-top: 36px;
            display: flex;
            justify-content: center;
        }

        .reports-pagination .pagination {
            gap: 8px;
            flex-wrap: wrap;
            justify-content: center;
            margin: 0;
        }

        .reports-pagination .page-link {
            min-width: 42px;
            min-height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #d9e1ec;
            border-radius: 8px;
            color: #172033;
            font-weight: 800;
            box-shadow: none;
        }

        .reports-pagination .page-item.active .page-link {
            border-color: #0b132b;
            background: #0b132b;
            color: #fff;
        }

        .reports-pagination .page-item.disabled .page-link {
            color: #94a3b8;
            background: #f8fafc;
        }

        @media (max-width: 991px) {
            .reports-search-grid,
            .reports-grid {
                grid-template-columns: 1fr;
            }

            .reports-search-panel {
                margin-top: -58px;
            }
        }

        @media (max-width: 575px) {
            .reports-hero {
                min-height: auto;
                padding: 74px 0 104px;
            }

            .reports-search-panel {
                margin-left: 12px;
                margin-right: 12px;
                padding: 16px;
            }

            .report-card-body {
                padding: 20px;
            }

            .reports-section-head h2 {
                font-size: 30px;
            }

            .reports-section-head p {
                font-size: 16px;
                line-height: 1.65;
            }
        }
    </style>

</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <main>

@include('layouts.header-menu')

<div class="reports-page">
    <section class="reports-hero">
        <div class="container">
            <div class="reports-hero-content">
                <div class="reports-eyebrow">
                    <i class="fa fa-file-text-o"></i>
                    Ready-to-use resources
                </div>
                <h1>Food Business Plans</h1>
                <p>Explore practical food business reports built for licensing, compliance, operations, and startup planning.</p>
            </div>
        </div>
    </section>

    <div class="container">
        <form action="/business-plans" method="GET" class="reports-search-panel">
            <div class="reports-search-grid">
                <select class="form-select reports-field" name="category" aria-label="Select report category">
                    <option selected value="">All Services</option>
                    <?php foreach($categories as $category){ ?>
                    <option {{ request('category') == $category->id ? 'selected' : '' }} value="<?php echo $category->id ?>"><?php echo $category->category ?></option>
                    <?php } ?>
                </select>

                <div class="reports-search">
                    <span class="fa fa-search"></span>
                    <input placeholder="Search reports, plans, or services" name="search" value="{{ request('search') }}">
                </div>

                <button type="submit" class="reports-search-btn">Search</button>
                <a href="/business-plans" class="reports-reset-btn">Reset</a>
            </div>
        </form>
    </div>

    <section class="reports-list">
        <div class="container">
            <div class="reports-section-head">
                <h2>Choose the right report for your next step</h2>
                <p>Compare business-ready documents and open the full details before choosing the plan that fits your food venture.</p>
            </div>

            @if(count($reports))
                <div class="reports-grid">
                    @foreach($reports as $report)
                        @php
                            $filenames = !empty($report->uploaded_video) ? json_decode($report->uploaded_video, true) : [];
                            $reportImage = is_array($filenames) && count($filenames) ? $filenames[0] : null;
                            $price = trim(str_replace('RS', '', $report->price));
                        @endphp

                        <article class="report-card">
                            <div class="report-media">
                                @if($reportImage)
                                    <img src="{{ asset('images/'.$reportImage) }}" alt="{{ $report->reports_title }}">
                                @else
                                    <img src="{{ asset('assets/front/images/reports.webp') }}" alt="{{ $report->reports_title }}">
                                @endif

                                <div class="report-price">{{ $price }} RS</div>
                            </div>

                            <div class="report-card-body">
                                <h3>{{ $report->reports_title }}</h3>
                                <p>{{ Str::limit(strip_tags($report->description), 150, '...') }}</p>
                                <a href="{{ route('reportsDetails', $report->slug) }}">
                                    View More Details
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="reports-pagination">
                    {{ $reports->links() }}
                </div>
            @else
                <div class="reports-empty">
                    <h3>No reports found</h3>
                    <p>Try changing the selected service or search keyword.</p>
                </div>
            @endif
        </div>
    </section>
</div>





<!--<section>-->
<!--    <div class="container">-->
<!--      <div class="row">-->
<!--<nav aria-label="Page navigation example">-->
<!--  <ul class="pagination">-->
<!--    <li class="page-item"><a class="page-link" href="#">Previous</a></li>-->
<!--    <li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--    <li class="page-item active"><a class="page-link" href="#">2</a></li>-->
<!--    <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--    <li class="page-item"><a class="page-link" href="#">Next</a></li>-->
<!--  </ul>-->
<!--</nav>-->
<!--</div></div>-->
<!--</section>-->

@extends('layouts.footer')

  </body>
</html>
