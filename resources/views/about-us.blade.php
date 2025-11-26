<!doctype html>
<html lang="en">
@extends('layouts.head-css')
<body>
<main>
    <!-- header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="/home"><img src="{{ URL::asset('assets/img/small-logo3.png') }}" alt="Logo"></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-center" id="navbarsExample07">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/subscriptions">Subscriptions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/reports">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact-us">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <a href="/login/admin" class="loginbox">Log In</a>
            </div>
        </nav>
    </header>
    <!-- end header -->

    <div class="pt-5"></div>

    <!-- About Us Section -->
    <section class="plan-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="mb-4 text-center">
                        <h2 class="section-title fw-bold mb-3">About Us – Empowering India’s Food Entrepreneurs</h2>
                    </div>

                    <article class="term-block mb-5">

                        <h3 class="subtitle fs-4 mb-2">Who We Are</h3>
                        <p>FoodTech Mate is India’s first dedicated online platform designed exclusively for food business owners, startups, and manufacturers.</p>
                        <p>We specialize in FSSAI Licensing, Label Validation, Food Business Plan preparation, Food Regulatory Consulting, and Shelf Life & Standardization Advisory — all under one digital ecosystem.</p>
                        <p>Our goal is simple — to help food entrepreneurs launch, grow, and manage their business with complete regulatory confidence and technical excellence.</p>

                        <h3 class="subtitle fs-4 mb-2 mt-4">What We Do</h3>
                        <p>At FoodTech Mate, we combine regulatory knowledge with food technology expertise to provide end-to-end consulting support for your business.</p>
                        <p>From setting up your FSSAI license to creating a bank-ready food business plan, every service is handled by qualified food technologists, industry consultants, and documentation experts.</p>
                        <p>Our web-based platform allows you to manage everything 100% online — saving time, cost, and paperwork while ensuring full regulatory compliance.</p>

                        <h3 class="subtitle fs-4 mb-2 mt-4">Our Key Services</h3>

                        <p><strong> FSSAI License & Modification</strong><br>
                        Apply for new licenses, renew existing ones, or modify your details with ease. Our experts ensure your documentation and compliance stay up to date.</p>

                        <p><strong> Food Label Validation</strong><br>
                        Before launching your product, we verify your label for FSSAI compliance — checking nutrition facts, ingredient declarations, claims, and allergen information.</p>

                        <p><strong>📊 Food Business Plan for Bank Loan & Subsidy</strong><br>
                        We prepare detailed, professional, and bank-acceptable business plans — written by food technologists with product-level insights, ingredient analysis, and market research.</p>

                        <p><strong>⚖️ Food Regulatory Consulting</strong><br>
                        From product approvals to compliance documentation, we offer complete consulting support for both domestic and export food businesses.</p>

                        <p><strong>🧪 Food Standardization & Shelf Life Advisory</strong><br>
                        We help food brands determine product standards, formulation parameters, and shelf life through technical evaluation, lab coordination, and stability assessment.</p>

                        <h3 class="subtitle fs-4 mb-2 mt-4">Our Mission</h3>
                        <p>To make food compliance and regulatory processes simpler, faster, and more accessible for every entrepreneur — enabling them to focus on innovation while we handle the paperwork, processes, and compliance.</p>
                        <p>We believe that every food product deserves to reach the market safely, legally, and confidently — with the right support behind it.</p>

                        <h3 class="subtitle fs-4 mb-2 mt-4">Our Vision</h3>
                        <p>To become India’s most trusted online platform for food regulatory consulting and business growth services, connecting technology, compliance, and entrepreneurship on one platform.</p>

                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="starting-section headingh2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h2>Starting a business and confused where to begin?</h2>
                    <p>We take care of Accounting, Business, Compliance, and handle end-to-end solutions.</p>
                    <a href="#">Get Started</a>
                </div>
                <div class="col-md-3">
                    <img src="{{ URL::asset('assets/front/images/gril.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    @extends('layouts.footer')
</body>
</html>
