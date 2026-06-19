<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FSSAI License Service</title>

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@extends('layouts.head-css')

</head>

<body>
<main>

<!-- header (UNCHANGED) -->
@include('layouts.header-menu')
<!-- HERO -->

<div class="custm">

    <!-- Hero Content Banner with Side Image View -->
    <section class="label-validate-hero-section">
        <div class="label-validate-container">
            <div class="label-validate-hero-grid">
                <div class="label-validate-hero-content">
                    <h1>FSSAI Food <span class="label-validate-yellow-text">Label Compliance</span></h1>
                    <p>Your food packaging label is the legal handshake between your brand, the consumer, and compliance regulators. Discover why checking your artwork is crucial before finalizing production.</p>
                </div>
                <div class="label-validate-hero-image-box">
                    <!-- Clean SVG Vector Design Representation for Modern Food Labels -->
                    <svg class="label-validate-hero-img" viewBox="0 0 500 350" width="100%" height="auto" xmlns="http://www.w3.org/2000/svg">
                        <rect width="500" height="350" fill="#1C2541" rx="12"/>
                        <rect x="25" y="25" width="450" height="300" fill="#ffffff" rx="8"/>
                        <!-- Top Header Tag -->
                        <rect x="50" y="50" width="120" height="25" fill="#FFC107" rx="4"/>
                        <rect x="330" y="50" width="120" height="40" fill="#0B132B" rx="4"/>
                        <circle cx="355" cy="70" r="10" fill="#28A745"/>
                        <rect x="373" y="65" width="60" height="10" fill="#ffffff" rx="2"/>
                        <!-- Text Elements Lines -->
                        <rect x="50" y="95" width="240" height="22" fill="#0B132B" rx="4"/>
                        <rect x="50" y="130" width="180" height="12" fill="#64748B" rx="2"/>
                        <!-- Nutrition Facts Box Layout representation -->
                        <rect x="50" y="160" width="400" height="135" fill="#F4F7F6" rx="6"/>
                        <rect x="70" y="175" width="150" height="14" fill="#0B132B" rx="2"/>
                        <line x1="70" y1="200" x2="430" y2="200" stroke="#CBD5E1" stroke-width="2"/>
                        <rect x="70" y="212" width="220" height="10" fill="#94A3B8" rx="2"/>
                        <rect x="380" y="212" width="50" height="10" fill="#94A3B8" rx="2"/>
                        <line x1="70" y1="235" x2="430" y2="235" stroke="#CBD5E1" stroke-width="1"/>
                        <rect x="70" y="247" width="180" height="10" fill="#94A3B8" rx="2"/>
                        <rect x="380" y="247" width="50" height="10" fill="#94A3B8" rx="2"/>
                        <line x1="70" y1="270" x2="430" y2="270" stroke="#CBD5E1" stroke-width="1"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Informational Grid Layout Section -->
    <section class="label-validate-info-zone label-validate-container">
        <div class="label-validate-grid-layout">
            
            <!-- Column 1: Why Label Validation Is Necessary -->
            <div class="label-validate-card">
                <div class="label-validate-section-title">
                    <i class="fa-solid fa-triangle-exclamation label-validate-icon-blue"></i>
                    <h2>Why Validation is Necessary</h2>
                </div>
                <p class="label-validate-subtitle">Avoid legal and financial setbacks by evaluating regulatory factors early.</p>
                
                <ul class="label-validate-info-list">
                    <li>
                        <div class="label-validate-icon-box"><i class="fa-solid fa-gavel"></i></div>
                        <div>
                            <strong>Prevent Legal Penalties & Product Recalls</strong>
                            <p>Non-compliant food product packaging labels face severe penalties, product holds at customs, or mandatory retail marketplace recalls under FSSAI laws.</p>
                        </div>
                    </li>
                    <li>
                        <div class="label-validate-icon-box"><i class="fa-solid fa-ban-smoking"></i></div>
                        <div>
                            <strong>Eliminate Misleading Health Claims</strong>
                            <p>Stating terms like "Natural", "Sugar-Free", or "Immunity Booster" without specific scientific baseline validation is illegal and heavily regulated.</p>
                        </div>
                    </li>
                    <li>
                        <div class="label-validate-icon-box"><i class="fa-solid fa-users-viewfinder"></i></div>
                        <div>
                            <strong>Build Consumer Loyalty & Trust</strong>
                            <p>Accurate allergen callouts and truthful nutrition transparency protect consumer well-being and elevate your business profile authority.</p>
                        </div>
                    </li>
                    <li>
                        <div class="label-validate-icon-box"><i class="fa-solid fa-money-bill-trend-up"></i></div>
                        <div>
                            <strong>Save Massive Print Re-run Costs</strong>
                            <p>Catching design font scale, ratio errors, or regulatory template issues prior to ordering physical cylinder print batches saves your startup thousands.</p>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Column 2: Which Things Are Included -->
            <div class="label-validate-card">
                <div class="label-validate-section-title">
                    <i class="fa-solid fa-circle-nodes label-validate-icon-yellow"></i>
                    <h2>What Things Are Included</h2>
                </div>
                <p class="label-validate-subtitle">Our technical evaluations audit every text field and graphic element on your packaging.</p>

                <ul class="label-validate-info-list">
                    <li>
                        <div class="label-validate-icon-box"><i class="fa-solid fa-table-cells"></i></div>
                        <div>
                            <strong>Nutrition Information Values Panel</strong>
                            <p>Detailed verification of standard data lines per 100g/ml, single-serving size stats, and mandatory calculation rules for daily energy percentages (%RDA).</p>
                        </div>
                    </li>
                    <li>
                        <div class="label-validate-icon-box"><i class="fa-solid fa-font"></i></div>
                        <div>
                            <strong>Font Scale, Logos & Principal Display Area</strong>
                            <p>Inspection of mandatory FSSAI display dimensions, distinct Veg/Non-Veg icon aspect ratios, and the exact minimum point text height ratios on your physical pack size.</p>
                        </div>
                    </li>
                    <li>
                        <div class="label-validate-icon-box"><i class="fa-solid fa-wheat-awn-circle-exclamation"></i></div>
                        <div>
                            <strong>Allergen Bold Warnings & Content Layout</strong>
                            <p>Ensuring compliance for mandatory allergen declarations (such as Gluten, Soy, Nuts) set aside explicitly in standardized bold typographical formats.</p>
                        </div>
                    </li>
                    <li>
                        <div class="label-validate-icon-box"><i class="fa-solid fa-address-card"></i></div>
                        <div>
                            <strong>Traceability Details & Importer Data</strong>
                            <p>Confirming specific structural placements of batch metrics, actual packaging timestamps, manufacturing locations, customer assistance details, and valid license configurations.</p>
                        </div>
                    </li>
                </ul>

                <div class="label-validate-cta-banner">
                    <i class="fa-solid fa-circle-check"></i>
                    <p>Every review generates an exhaustive modification checklist document curated by certified Indian food regulation analysts.</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Regulatory FAQ Section (Exact Matching foodtechmate.com Product Styling) -->
    <section class="label-validate-faq-section">
        <div class="label-validate-container label-validate-max-w-md">
            <div class="label-validate-text-center label-validate-faq-title-wrap">
                <h2 class="label-validate-faq-heading">Frequently Asked Questions</h2>
                <p>Have questions regarding food product packaging laws and validation scopes?</p>
                <div class="label-validate-faq-divider"></div>
            </div>

            <div class="label-validate-accordion">
                <!-- Accordion Element Block 1 -->
                <div class="label-validate-accordion-item">
                    <button class="label-validate-accordion-header">
                        <span>How does the Label Validation process work on FoodTech Mate?</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div class="label-validate-accordion-content">
                        <p>Once you purchase a subscription plan and submit your draft label layout, our compliance engineering team reviews your content against the newest FSSAI standards. We then supply a detailed adjustments guide mapping out precise changes required.</p>
                    </div>
                </div>

                <!-- Accordion Element Block 2 -->
                <div class="label-validate-accordion-item">
                    <button class="label-validate-accordion-header">
                        <span>What happens if my food packaging label layout does not match specifications?</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div class="label-validate-accordion-content">
                        <p>We point out exactly which dimensions, font scaling rules, or text segments fail compliance rules. You get distinct markup correction guidance sheets so your structural designers can fix the artwork perfectly before mass print runs begin.</p>
                    </div>
                </div>

                <!-- Accordion Element Block 3 -->
                <div class="label-validate-accordion-item">
                    <button class="label-validate-accordion-header">
                        <span>Are my proprietary formulas and ingredient weights kept safe?</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div class="label-validate-accordion-content">
                        <p>Yes ✅ — your corporate files and sensitive formulations are entirely protected. FoodTech Mate uses encrypted enterprise databases and strict confidentiality workflows to make certain your upcoming product launches remain secure.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
</main>
@extends('layouts.footer')
    <script>
        // FAQ Toggle Logic Accordion Array Map loop
        const accordionHeadersList = document.querySelectorAll('.label-validate-accordion-header');
        accordionHeadersList.forEach(headerItem => {
            headerItem.addEventListener('click', () => {
                const parentBlock = headerItem.parentElement;
                
                // Toggle active state on clicked panel
                parentBlock.classList.toggle('label-validate-active');
            });
        });
    </script>
</body>
</html>
