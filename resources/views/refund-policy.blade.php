<!doctype html>
<html lang="en">
    @extends('layouts.head-css')
<body>
<main>
    <!-- header -->
    @include('layouts.header-menu')

    <div class="pt-5"></div>

    <!-- Terms & Conditions Section -->
    <!-- Refund Policy Section -->
    <section class="plan-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <h2 class="section-title fw-bold mb-3">Refund Policy</h2>
                        <p class="text-muted text-center">Please read this Refund Policy carefully along with our Terms and Conditions.</p>
                    </div>

                    <article class="term-block mb-5">
                        <p class="paragraph">We thank you and appreciate your interest in our services at <strong>ProwessBuzz Services LLP</strong>. Please read this Refund Policy along with our Terms and Conditions carefully, as it outlines important guidelines about your rights and obligations with respect to any service or product purchased through our official website, <a href="https://www.foodtechmate.com" target="_blank" rel="noopener noreferrer">www.foodtechmate.com</a> (hereinafter referred to as "<strong>foodtechmate</strong>").</p>

                        <p class="paragraph">We strive to provide our services and products in line with the quality, specifications, and timelines mentioned. However, in the event we are unable to fulfill your request due to any unforeseen reason, a refund may be initiated under the following conditions:</p>

                        <h3 class="subtitle fs-4 mb-2">1. Conditions for Refund Eligibility</h3>
                        <p class="paragraph">A refund shall be considered <strong>only</strong> if there is a <strong>clear and visible deficiency</strong> in the service or product provided by <strong>foodtechmate</strong>.</p>
                        <p class="paragraph">If a customer requests a refund <strong>due to a change of mind</strong> after making the payment and there is no error or shortcoming in the service/product provided, no refund shall be granted.</p>
                        <p class="paragraph">If work has already been shared with the customer, <strong>refund requests will not be accepted</strong> for change of mind. However, we may offer an equivalent credit that can be applied toward another service offered by <strong>foodtechmate</strong>, either partially or fully.</p>
                        <p class="paragraph">If a refund request is made <strong>after 30 (thirty) days</strong> from the date of service/product delivery (as notified via email or any formal communication), such requests shall be deemed <strong>invalid and non-refundable</strong>.</p>

                        <h3 class="subtitle fs-4 mb-2">2. Refund Process</h3>
                        <p class="paragraph">Once a refund request is evaluated and <strong>approved by foodtechmate</strong>, you will receive an <strong>email notification</strong> confirming the same.</p>
                        <p class="paragraph">The refund process may take up to <strong>15 (fifteen) business days</strong> to reflect in your designated bank account.</p>
                        <p class="paragraph">We commit to handling all refunds with transparency and care, ensuring that any money eligible for return is processed at the earliest.</p>

                        <h3 class="subtitle fs-4 mb-2">3. Contact Information</h3>
                        <p class="paragraph">For any questions or requests related to our Refund Policy, you may contact us at:</p>
                        <p class="paragraph">
                            <strong>ProwessBuzz Services LLP</strong><br>
                            Email: <a href="mailto:info@foodtechmate.com">info@foodtechmate.com</a><br>
                            Website: <a href="https://www.foodtechmate.com" target="_blank">www.foodtechmate.com</a>
                        </p>
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
                    <p>We take care of Accounting, Business, Compliance, and Handle end-to-end soloutions</p>
                    <a href="#">Get Started</a>
                </div>
                <div class="col-md-3"><img src="{{ URL::asset('assets/front/images/gril.png') }}" class="img-fluid"></div>
            </div>
        </div>
    </section>

    @extends('layouts.footer')
</body>
</html>
