<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FSSAI License Service</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @extends('layouts.head-css')


</head>

<body>

    <main>

        <!-- header (UNCHANGED) -->
        @include('layouts.header-menu')
        <!-- HERO -->
        <div class="soaps_theme_wrapper">


            <!-- Hero Section -->
            <section class="soaps_hero">
                <h1>Industrial Food Safety Soap Services</h1>
                <p>Ensure total audit compliance and hygiene with Food Tech Mate's specialized food-grade handwashing
                    and sanitation soap solutions designed strictly for food manufacturing and processing environments.
                </p>
                <a href="#benefits" class="soaps_btn"><i class="fa-solid fa-gears"></i> Explore Our Solutions</a>
            </section>

            <!-- Detailed Info & Benefits Section -->
            <section class="soaps_section_wrapper" id="benefits">
                <h2 class="soaps_section_header">Core Benefits & Features</h2>
                <div class="soaps_grid">
                    <!-- Benefit Card 1 -->
                    <div class="soaps_card">
                        <i class="fa-solid fa-clipboard-check soaps_card_icon"></i>
                        <h3>Audit-Ready Formulations</h3>
                        <p>Designed specifically to meet stringent FSSAI licensing standards and Schedule IV audit
                            requirements. Ensure your factory floor always passes hygiene inspections seamlessly.</p>
                    </div>

                    <!-- Benefit Card 2 -->
                    <div class="soaps_card">
                        <i class="fa-solid fa-droplet-slash soaps_card_icon"></i>
                        <h3>Fragrance-Free & Non-Tainting</h3>
                        <p>Standard commercial soaps contain perfumes that can taint food products. Our specialized
                            soaps are 100% fragrance-free to protect the integrity of your technical formulations.</p>
                    </div>

                    <!-- Benefit Card 3 -->
                    <div class="soaps_card">
                        <i class="fa-solid fa-industry soaps_card_icon"></i>
                        <h3>Industrial Grade Degreasing</h3>
                        <p>From dairy plant maintenance to frozen food sector washdowns, our heavy-duty solutions
                            effectively cut through complex animal fats and vegetable oils.</p>
                    </div>
                </div>
            </section>

            <!-- FAQ Section -->
            <section class="soaps_section_wrapper soaps_bg_white" id="faq">
                <h2 class="soaps_section_header">Why is Food-Grade Soap Necessary?</h2>
                <div class="soaps_faq_container">

                    <!-- FAQ Item 1 -->
                    <div class="soaps_faq_item">
                        <button class="soaps_faq_question">
                            <span>What makes food safety soap different from regular soap?</span>
                            <i class="fa-solid fa-plus soaps_icon_toggle"></i>
                        </button>
                        <div class="soaps_faq_answer">
                            <p>Regular hand soaps are formulated for consumer use and often contain heavy fragrances,
                                dyes, and moisturizing residues. In a professional food manufacturing environment, these
                                chemicals can transfer to food products, causing flavor tainting or cross-contamination.
                                Food-grade soaps are strictly regulated to be unscented, highly antibacterial, and
                                completely washable without leaving any residue.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="soaps_faq_item">
                        <button class="soaps_faq_question">
                            <span>Why is it mandatory for factory compliance?</span>
                            <i class="fa-solid fa-plus soaps_icon_toggle"></i>
                        </button>
                        <div class="soaps_faq_answer">
                            <p>Using certified sanitation supplies is not optional; it is a regulatory requirement. The
                                benefits of integrating our services include:</p>
                            <ul>
                                <li><strong>Regulatory Clearance:</strong> Fulfills strict prerequisites for FSSAI and
                                    local health authority audits.</li>
                                <li><strong>Risk Mitigation:</strong> Drastically reduces the chance of foodborne
                                    illness outbreaks linked to poor employee hygiene.</li>
                                <li><strong>Brand Protection:</strong> Prevents costly product recalls by maintaining a
                                    sterile production line.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="soaps_faq_item">
                        <button class="soaps_faq_question">
                            <span>How does the restocking and support service work?</span>
                            <i class="fa-solid fa-plus soaps_icon_toggle"></i>
                        </button>
                        <div class="soaps_faq_answer">
                            <p>We provide turnkey inventory management. Based on your factory layout and employee
                                headcount, we calculate usage rates and automatically dispatch restocking supplies
                                before you run out. Our 24/7 customer care team is also available to troubleshoot
                                dispenser issues or adjust inventory scaling.</p>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Call to Action -->
            <section class="soaps_cta" id="contact">
                <h2>Ready to Upgrade Your Facility's Hygiene?</h2>
                <p>Partner with Food Tech Mate today. Contact our technical team to design a custom soap and sanitation
                    protocol tailored to your specific plant layout.</p>
                <a href="/contact-us"class="soaps_btn"><i class="fa-solid fa-paper-plane"></i>
                    Contact Support</a>
            </section>



    </main>
    @include('layouts.footer')
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const faqItems = document.querySelectorAll(".soaps_faq_item");

        faqItems.forEach((item) => {
            const question = item.querySelector(".soaps_faq_question");
            const answer = item.querySelector(".soaps_faq_answer");
            const icon = item.querySelector(".soaps_icon_toggle");

            // Start collapsed
            answer.style.overflow = "hidden";
            answer.style.maxHeight = "0px";
            answer.style.transition = "max-height 0.3s ease";

            question.addEventListener("click", function () {
                const isActive = item.classList.contains("active");

                // Close all items first
                faqItems.forEach((faq) => {
                    faq.classList.remove("active");
                    faq.querySelector(".soaps_faq_answer").style.maxHeight = "0px";
                    const i = faq.querySelector(".soaps_icon_toggle");
                    if (i) i.classList.replace("fa-minus", "fa-plus");
                });

                // Open the clicked one if it wasn't already open
                if (!isActive) {
                    item.classList.add("active");
                    answer.style.maxHeight = answer.scrollHeight + "px";
                    if (icon) icon.classList.replace("fa-plus", "fa-minus");
                }
            });
        });
    });
</script>
</body>

</html>
