<!doctype html>
<html lang="en">
  @extends('layouts.head-css')
  <style>
    #preloader {
        position: fixed;
        left: 0; top: 0;
        width: 100%; height: 100%;
        z-index: 9999;
        background: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .loader {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #022B50;
        border-radius: 50%;
        width: 60px; height: 60px;
        animation: spin 1s linear infinite;
    }
    @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

    /* ── Hero ─────────────────────────────────────────── */
    .contact-hero {
        min-height: 340px;
        background: linear-gradient(135deg, #022B50 0%, #0a4a8a 55%, #1a6dc8 100%);
        display: flex;
        align-items: center;
        text-align: center;
        position: relative;
        overflow: hidden;
        padding-top: 80px;
    }
    .contact-hero::before {
        content: '';
        position: absolute;
        top: -80px; right: -80px;
        width: 360px; height: 360px;
        background: rgba(255,210,27,0.07);
        border-radius: 50%;
        animation: float 7s ease-in-out infinite;
    }
    .contact-hero::after {
        content: '';
        position: absolute;
        bottom: -60px; left: -60px;
        width: 260px; height: 260px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
    }
    @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-20px)} }

    .hero-badge {
        display: inline-block;
        background: rgba(255,210,27,0.18);
        border: 1px solid rgba(255,210,27,0.4);
        color: #FFD21B;
        padding: 6px 22px;
        border-radius: 50px;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        margin-bottom: 18px;
        position: relative;
        z-index: 1;
    }
    .contact-hero h1 {
        color: #fff;
        font-weight: 800;
        font-size: 2.8rem;
        line-height: 1.2;
        position: relative;
        z-index: 1;
        margin-bottom: 14px;
    }
    .contact-hero h1 span { color: #FFD21B; }
    .contact-hero p {
        color: rgba(255,255,255,0.78);
        font-size: 1.05rem;
        max-width: 480px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    /* ── Main Section ─────────────────────────────────── */
    .contact-section { padding: 80px 0 60px; background: #FAFAFA; }

    /* ── Left Panel ────────────────────────────────────── */
    .contact-panel-left {
        background: linear-gradient(160deg, #022B50 0%, #0c3d78 100%);
        border-radius: 22px;
        padding: 40px 36px;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    .contact-panel-left::after {
        content: '';
        position: absolute;
        bottom: -50px; right: -50px;
        width: 200px; height: 200px;
        background: rgba(255,210,27,0.09);
        border-radius: 50%;
    }
    .contact-panel-left::before {
        content: '';
        position: absolute;
        top: -30px; left: -30px;
        width: 120px; height: 120px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
    }
    .contact-panel-left h3 {
        color: #fff;
        font-weight: 700;
        font-size: 1.45rem;
        margin-bottom: 8px;
        position: relative;
        z-index: 1;
    }
    .contact-panel-left > p {
        color: rgba(255,255,255,0.65);
        font-size: 0.9rem;
        margin-bottom: 34px;
        position: relative;
        z-index: 1;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        margin-bottom: 26px;
        text-decoration: none;
        position: relative;
        z-index: 1;
    }
    .contact-item:last-child { margin-bottom: 0; }
    .contact-item:hover { text-decoration: none; }
    .contact-item-icon {
        width: 44px; height: 44px;
        background: rgba(255,210,27,0.13);
        border: 1px solid rgba(255,210,27,0.28);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: background 0.3s;
    }
    .contact-item:hover .contact-item-icon { background: rgba(255,210,27,0.22); }
    .contact-item-icon i { color: #FFD21B; font-size: 15px; }
    .contact-item-text span {
        display: block;
        font-size: 0.7rem;
        color: rgba(255,255,255,0.45);
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 3px;
    }
    .contact-item-text p {
        color: #fff;
        font-size: 0.9rem;
        font-weight: 500;
        margin: 0;
        line-height: 1.5;
    }

    /* ── Form Panel ─────────────────────────────────────── */
    .contact-form-panel {
        background: #fff;
        border-radius: 22px;
        padding: 42px 40px;
        box-shadow: 0 8px 48px rgba(2,43,80,0.09);
        height: 100%;
    }
    .contact-form-panel h4 {
        font-size: 1.35rem;
        font-weight: 700;
        color: #022B50;
        margin-bottom: 5px;
    }
    .contact-form-panel > p {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 30px;
    }
    .form-label {
        font-weight: 600;
        font-size: 0.83rem;
        color: #022B50;
        margin-bottom: 6px;
        letter-spacing: 0.2px;
    }
    .form-control {
        border: 1.5px solid #e4eaf0;
        border-radius: 11px;
        padding: 12px 15px;
        font-size: 0.9rem;
        font-family: "Quicksand", sans-serif;
        transition: all 0.3s ease;
        background: #F8FAFC;
        color: #101010;
    }
    .form-control:focus {
        border-color: #022B50;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(2,43,80,0.07);
    }
    .form-control::placeholder { color: #b0bec5; font-size: 0.865rem; }
    textarea.form-control { resize: vertical; min-height: 120px; }

    .btn-send-contact {
        background: linear-gradient(135deg, #022B50, #0a4a8a);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 13px 34px;
        font-weight: 700;
        font-size: 0.95rem;
        font-family: "Quicksand", sans-serif;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 9px;
        letter-spacing: 0.2px;
    }
    .btn-send-contact:hover {
        background: linear-gradient(135deg, #011f3d, #022B50);
        color: #FFD21B;
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(2,43,80,0.28);
    }

    /* ── Map Section ────────────────────────────────────── */
    .map-section { padding: 0 0 70px; background: #FAFAFA; }
    .map-wrapper {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 40px rgba(2,43,80,0.11);
    }

    /* ── Responsive ──────────────────────────────────────── */
    @media (max-width: 991px) {
        .contact-panel-left { margin-bottom: 0; min-height: auto; }
    }
    @media (max-width: 767px) {
        .contact-hero h1 { font-size: 2rem; }
        .contact-form-panel { padding: 28px 22px; }
        .contact-panel-left { padding: 30px 24px; }
        .contact-section { padding: 50px 0 40px; }
    }
  </style>
<body>
    <div id="preloader"><div class="loader"></div></div>
    <main>

@include('layouts.header-menu')

{{-- ── Hero ─────────────────────────────────────── --}}
<section class="contact-hero">
    <div class="container">
        <div class="col-lg-7 mx-auto">
            <div class="hero-badge">GET IN TOUCH</div>
            <h1>We'd Love to <span>Hear From You</span></h1>
            <p>Have questions about food safety compliance? Our experts are ready to help you navigate every step of the process.</p>
        </div>
    </div>
</section>

{{-- ── Contact Section ──────────────────────────── --}}
<section class="contact-section">
    <div class="container">

        @if (session('success'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show mb-4 rounded-3" role="alert">
                <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4 align-items-stretch">

            {{-- Left: Contact Info ─────────── --}}
            <div class="col-lg-5 d-flex">
                <div class="contact-panel-left w-100">
                    <h3>Contact Information</h3>
                    <p>Reach out through any channel — we're here to support you.</p>

                    <a href="tel:+917020048677" class="contact-item">
                        <div class="contact-item-icon"><i class="fa fa-phone"></i></div>
                        <div class="contact-item-text">
                            <span>Phone</span>
                            <p>+91 7020048677</p>
                        </div>
                    </a>

                    <a href="mailto:foodtechmate@gmail.com" class="contact-item">
                        <div class="contact-item-icon"><i class="fa fa-envelope"></i></div>
                        <div class="contact-item-text">
                            <span>Email</span>
                            <p>foodtechmate@gmail.com</p>
                        </div>
                    </a>

                    <a href="#map" class="contact-item">
                        <div class="contact-item-icon"><i class="fa fa-map-marker"></i></div>
                        <div class="contact-item-text">
                            <span>Office Address</span>
                            <p>7, Star Properties, Office No 302 Sant Niwas, New DP Rd, Vishal Nagar, Pimple Nilakh, Maharashtra 411027</p>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Right: Contact Form ─────────── --}}
            <div class="col-lg-7 d-flex">
                <div class="contact-form-panel w-100">
                    <h4>Send us a Message</h4>
                    <p>Fill out the form and we'll respond within 24 hours.</p>

                    <form action="contact-us" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
                                <span class="text-danger" style="font-size:0.8rem;">{{ $errors->first('first_name') }}</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
                                <span class="text-danger" style="font-size:0.8rem;">{{ $errors->first('last_name') }}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                                <span class="text-danger" style="font-size:0.8rem;">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                                <span class="text-danger" style="font-size:0.8rem;">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tell us how we can help you..."></textarea>
                            <span class="text-danger" style="font-size:0.8rem;">{{ $errors->first('message') }}</span>
                        </div>

                        <button type="submit" class="btn-send-contact">
                            <i class="fa fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ── Map Section ──────────────────────────────── --}}
<section class="map-section" id="map">
    <div class="container">
        <div class="map-wrapper">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.062408624982!2d73.780936!3d18.5860554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c72b546f6e9d%3A0xd785c12dbfcfd2dd!2sProwess%20Buzz%20India%20-%20Food%20Consultant!5e0!3m2!1sen!2sin!4v20251230"
                width="100%"
                height="420"
                style="border:0; display:block;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

@extends('layouts.footer')

  </body>
</html>
