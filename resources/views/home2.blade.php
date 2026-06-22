<!doctype html>
<html lang="en">
  <head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>FoodTechMate – India's Leading FSSAI Food License &amp; Compliance Platform</title>
<meta name="description" content="Apply for FSSAI Basic Registration, State License &amp; Central License online. FoodTechMate helps 200+ food businesses with FSSAI licensing, label validation, food safety SOPs &amp; investor-ready business plans. Based in Pune, Maharashtra."/>
<meta name="keywords" content="FSSAI license, food license India, FSSAI registration online, food compliance platform, label validation, food safety SOP, food business plan, FoodTechMate, FSSAI Pune, FSSAI Maharashtra"/>
<meta name="author" content="FoodTechMate"/>
@php
    $versionedAsset = function ($path) {
        $fullPath = public_path($path);
        return asset($path) . (file_exists($fullPath) ? '?v=' . filemtime($fullPath) : '');
    };
@endphp
<link href="{{ $versionedAsset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ $versionedAsset('assets/front/css/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ $versionedAsset('assets/front/css/main-style.css') }}" rel="stylesheet">
<link href="{{ $versionedAsset('assets/front/css/home.css') }}" rel="stylesheet">
<link href="{{ $versionedAsset('assets/front/css/license.css') }}" rel="stylesheet">
<link href="{{ $versionedAsset('assets/front/css/label.css') }}" rel="stylesheet">
<link href="{{ $versionedAsset('assets/front/css/soap.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    
    <main>

 
<!-- header -->
@include('layouts.header-menu')
 <div class="home-root">
 <section class="custom-hero" aria-label="Hero section">
  <div class="custom-hero-inner">
    <div>
      <div class="custom-hero-badge"><span class="custom-dot" aria-hidden="true"></span>Trusted by 200+ Food Businesses Across India</div>
      <h1>India's <em>Trusted Food Compliance</em> Platform &#8212; <strong>Food Regulatory Made Simple</strong></h1>
      <p class="custom-hero-sub">A dedicated platform for Food compliance, regulatory documentation and food business plans</p>
      <div class="custom-hero-btns">
        <a href="/register-user" class="custom-btn-primary">Start Food Compliance Journey &#8594;</a>
        {{-- <a href="#license" class="custom-btn-gold">Find My License Type</a> --}}
      </div>
      <div class="custom-hero-stats">
        <div class="custom-stat-item"><div class="custom-num">200+</div><div class="custom-label">Trusted Food Businesses</div></div>
        <div class="custom-stat-item"><div class="custom-num">10+</div><div class="custom-label">Years Industry Experience</div></div>
        <div class="custom-stat-item"><div class="custom-num">Expert Team</div><div class="custom-label">Foodtechnologists and Regulatory Experts</div></div>
      </div>
    </div>
    <div class="custom-hero-visual" aria-hidden="true">
      <div class="custom-hcard"><div class="custom-hc-icon custom-hc-b"><i class="fa fa-file-text-o fa-lg"></i></div><h4>FSSAI License</h4><p>Basic, State &amp; Central</p></div>
      <div class="custom-hcard"><div class="custom-hc-icon custom-hc-g"><i class="fa fa-tag fa-lg"></i></div><h4>Label Validation</h4><p>FSSAI-compliant review</p></div>
      <div class="custom-hcard"><div class="custom-hc-icon custom-hc-b"><i class="fa fa-check-circle fa-lg"></i></div><h4>Food Safety SOPs</h4><p>Audit-ready documents</p></div>
      <div class="custom-hcard"><div class="custom-hc-icon custom-hc-g"><i class="fa fa-bar-chart fa-lg"></i></div><h4>Business Plans</h4><p>Investor-ready docs</p></div>
     
    </div>
  </div>
</section>

<section class="custom-problem-section">
  <div class="custom-sec-wrap">
    <div class="custom-sec-head">
      <span class="custom-eyebrow">Why Food Businesses Choose FoodTechMate</span>
      <h2>Skip the Confusion. Get Compliance Done Fast.</h2>
    </div>
    <div class="custom-problem-grid">
      <div class="custom-problem-card">
        <div class="custom-problem-icon"><i class="fa fa-clock-o fa-2x"></i></div>
        <h4>Tired of Delays?</h4>
        <p>FSSAI paperwork takes months. Our subscription keeps you on track with all follow-ups and gets you approved in weeks — not months.</p>
      </div>
      <div class="custom-problem-card">
        <div class="custom-problem-icon"><i class="fa fa-question-circle fa-2x"></i></div>
        <h4>Confused About Rules?</h4>
        <p>FSSAI regulations change. Subscribers get automatic regulatory updates so you stay compliant without guessing.</p>
      </div>
      <div class="custom-problem-card">
        <div class="custom-problem-icon"><i class="fa fa-shield fa-2x"></i></div>
        <h4>Avoid Costly Mistakes</h4>
        <p>One wrong label costs money and delays. Growth &amp; Enterprise plans include label validations before you print, launch, or expand.</p>
      </div>
      <div class="custom-problem-card">
        <div class="custom-problem-icon"><i class="fa fa-list-alt fa-2x"></i></div>
        <h4>No More Guesswork</h4>
        <p>Subscribers get personalized checklists and dedicated support. We tell you exactly what you need, nothing more, nothing less.</p>
      </div>
    </div>
  </div>
</section>
<!-- LICENSE FINDER -->
<section class="custom-docs label-validation" id="custom-docs">
  <div class="custom-sec-wrap">
    <div class="custom-sec-head">
      <span class="custom-eyebrow">Before You Print</span>
      <h2>Validate Your Labels</h2>
      <p class="custom-sec-sub">Stay Compliant with Professional Food Label validation</p>
    </div>
    <div class="custom-docs-inner">
      <ul class="custom-docs-list">
        <li><div class="custom-doc-num">1</div><div class="custom-doc-text"><strong>Health and nutrition claim verification</strong></div></li>
        <li><div class="custom-doc-num">2</div><div class="custom-doc-text"><strong>Nutrition facts panel and RDA calculation</strong></div></li>
        <li><div class="custom-doc-num">3</div><div class="custom-doc-text"><strong>Export Market Label Compliance</strong></div></li>
        <li><div class="custom-doc-num">4</div><div class="custom-doc-text"><strong>Ingredient &amp; Allergen Declaration validation</strong></div></li>
        <li><div class="custom-doc-num">5</div><div class="custom-doc-text"><strong>Pre-print compliance assessment</strong></div></li>
      </ul>
      <div class="custom-docs-cta-box label-validator">
        <h3>Not sure? Need an Expert Label review?</h3>
        <p>Submit your artwork and receive a detailed compliance assessment from our food regulatory experts.</p>
        <a href="/register-user" class="custom-dcta-btn">Start Label Validation &#8594;</a>
       
      </div>
    </div>
  </div>
</section>


<!-- SERVICES -->
<section class="custom-services" id="custom-services">
  <div class="custom-sec-wrap">
    <div class="custom-sec-head">
      <span class="custom-eyebrow">Our Services</span>
      <h2>Everything Your Food Business Needs</h2>
      <p class="custom-sec-sub">From FSSAI licensing to investor-ready business plans &#8212; we handle the compliance so you can focus on growing.</p>
    </div>
    <div class="custom-svc-grid">
      <article class="custom-svc-card">
        <div class="custom-svc-icon custom-si-1"><i class="fa fa-file-text-o fa-2x"></i></div>
        <span class="custom-svc-badge">Most Popular</span>
        <h3>FSSAI Licensing</h3>
        <p>End-to-end help with Basic Registration, State License, Central License, renewals and modifications. We file on your behalf &#8212; no paperwork headache.</p>
        <a href="/services/fssai-licensing" class="custom-svc-link">Learn more &#8594;</a>
      </article>
      <article class="custom-svc-card">
        <div class="custom-svc-icon custom-si-2"><i class="fa fa-tag fa-2x"></i></div>
        <span class="custom-svc-badge">Launch Essential</span>
        <h3>Label Validation</h3>
        <p>FSSAI-compliant label review: nutrition facts, allergen declarations, health claims, and font-size rules &#8212; before you print and avoid costly reprints.</p>
        <a href="/services/fssai-label-validation" class="custom-svc-link">Learn more &#8594;</a>
      </article>
      <article class="custom-svc-card">
        <div class="custom-svc-icon custom-si-3"><i class="fa fa-check-circle fa-2x"></i></div>
        <span class="custom-svc-badge">Audit Ready</span>
        <h3>Food Safety SOPs</h3>
        <p>Audit-ready Standard Operating Procedures for kitchens, manufacturing units, and catering businesses. FSSAI inspection-ready in days, not weeks.</p>
        <a href="/services/food-safety-soapes" class="custom-svc-link">Learn more &#8594;</a>
      </article>
      <article class="custom-svc-card">
        <div class="custom-svc-icon custom-si-4"><i class="fa fa-bar-chart fa-2x"></i></div>
        <span class="custom-svc-badge">Funding Ready</span>
        <h3>Business Plans</h3>
        <p>Investor-ready food business plans for bank loans, PM FME scheme, MSME registration, and angel investor pitches &#8212; tailored to your product and market.</p>
        <a href="/business-plans" class="custom-svc-link">Learn more &#8594;</a>
      </article>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="custom-steps" id="custom-steps">
  <div class="custom-sec-wrap">
    <div class="custom-sec-head">
      <span class="custom-eyebrow">How It Works</span>
      <h2>From Sign-Up to Approved in 4 Steps</h2>
      <p class="custom-sec-sub">A simple checklist-driven process &#8212; we handle the filing and follow-ups with FSSAI so you don't have to.</p>
    </div>
    <div class="custom-steps-grid">
      <div class="custom-step">
        <div class="custom-step-num">1</div>
        <div><h4>Register Your Business</h4><p>Share food category, turnover, state. Takes under 5 minutes.</p></div>
      </div>
      <div class="custom-step">
        <div class="custom-step-num">2</div>
        <div><h4>Choose Your Plan</h4><p>Pick Basic, State, or Central. Not sure? We recommend the right scope.</p></div>
      </div>
      <div class="custom-step">
        <div class="custom-step-num custom-gold">3</div>
        <div><h4>Submit Documents</h4><p>Our checklist guides you on exactly what to upload &#8212; no guesswork.</p></div>
      </div>
      <div class="custom-step">
        <div class="custom-step-num custom-gold">4</div>
        <div><h4>Track &amp; Get Approved</h4><p>We handle FSSAI follow-ups and update you until approval arrives.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section class="custom-pricing" id="custom-pricing">
  <div class="custom-sec-wrap">
    <div class="custom-sec-head">
      <span class="custom-eyebrow">Transparent Pricing</span>
      <h2>Simple Plans, No Hidden Charges</h2>
      <p class="custom-sec-sub">Government fees are charged at actuals by FSSAI &#8212; not included in platform fees and never marked up.</p>
    </div>
   <div class="custom-pricing-grid">

@foreach($plans as $plan)

    <?php
        $array = json_decode($plan->features, true);

        $fea = isset($array[0])
            ? str_replace(["\r\n", "\n", "\r"], "<li>", $array[0])
            : '';

        $features = array_filter(explode("<li>", $fea));
    ?>

    <div class="custom-price-card {{ $loop->index == 1 ? 'custom-featured' : '' }}">

        @if($loop->index == 1)
            <div class="custom-pop-badge"><i class="fa fa-star"></i> Most Popular</div>
        @endif

        <div class="custom-plan-name">
            {{ $plan->title }}
        </div>

       <div class="custom-plan-price">
    ₹{{ is_numeric($plan->price) ? number_format((float)$plan->price, 0) : $plan->price }}
    <sub>/yr</sub>
</div>

        <div class="custom-plan-period">
            {{ $plan->description }}
        </div>

        @if(!empty($plan->offer))
            <div class="custom-plan-note">
                <i class="fa fa-bolt"></i> Save {{ $plan->offer }}%
            </div>
        @endif

        <ul class="custom-plan-features">
            @foreach($features as $feature)
                @if(trim($feature))
                    <li>{{ trim($feature) }}</li>
                @endif
            @endforeach
        </ul>

        <a href="/register-user"
           class="custom-plan-cta {{ $loop->index == 1 ? 'custom-cta-gold' : 'custom-cta-outline' }}">
            Get Started
        </a>

    </div>

@endforeach

</div>
  </div>
</section>

<!-- DOCUMENTS -->
<section class="custom-docs" id="custom-docs">
  <div class="custom-sec-wrap">
    <div class="custom-sec-head">
      <span class="custom-eyebrow">Before You Apply</span>
      <h2>Documents You'll Need</h2>
      <p class="custom-sec-sub">Keep these ready to speed up your FSSAI application. We send a personalized checklist after you register.</p>
    </div>
    <div class="custom-docs-inner">
      <ul class="custom-docs-list">
        <li><div class="custom-doc-num">1</div><div class="custom-doc-text"><strong>Business Registration Certificate</strong><span>Shop Act / GST / Partnership Deed / Company Incorporation</span></div></li>
        <li><div class="custom-doc-num">2</div><div class="custom-doc-text"><strong>ID Proof of Owner / Directors</strong><span>Aadhaar Card, PAN Card, or Passport</span></div></li>
        <li><div class="custom-doc-num">3</div><div class="custom-doc-text"><strong>Business Premises Address Proof</strong><span>Electricity bill, rent agreement, or NOC from premises owner</span></div></li>
        <li><div class="custom-doc-num">4</div><div class="custom-doc-text"><strong>Passport-Size Photograph</strong><span>Of the proprietor or authorized signatory</span></div></li>
        <li><div class="custom-doc-num">5</div><div class="custom-doc-text"><strong>List of Food Products / Categories</strong><span>All items you manufacture, process, sell, or export</span></div></li>
        <li><div class="custom-doc-num">6</div><div class="custom-doc-text"><strong>Annual Turnover Declaration</strong><span>Self-declaration or CA certificate confirming your turnover slab</span></div></li>
      </ul>
      <div class="custom-docs-cta-box">
        <h3>Not sure which documents apply to your business?</h3>
        <p>Register free and our team will send you a personalized document checklist within 24 hours &#8212; specific to your business type and license level.</p>
        <a href="/register-user" class="custom-dcta-btn">Get My Personalized Checklist &#8594;</a>
        <div class="custom-contact-items">
          <a href="tel:+917020048677"><i class="fa fa-phone"></i> +91 70200 48677</a>
          <a href="mailto:hello@foodtechmate.com"><i class="fa fa-envelope"></i> hello@foodtechmate.com</a>
          <a href="https://maps.google.com/?q=Pimple+Nilakh+Pune"><i class="fa fa-map-marker"></i> Office 302, Sant Niwas, Pimple Nilakh, Pune 411027</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="custom-testimonials">
  <div class="custom-sec-wrap">
    <div class="custom-sec-head">
      <span class="custom-eyebrow">Client Stories</span>
      <h2>What Food Businesses Say</h2>
      <p class="custom-sec-sub">200+ businesses across Maharashtra and India trust FoodTechMate for their food compliance needs.</p>
    </div>
    <div class="custom-testi-grid">
      <article class="custom-testi-card">
        <div class="custom-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p class="custom-testi-text">"The team provided thorough guidance on FSSAI regulations for our food manufacturing and export business, and guided us for new product development too."</p>
        <div class="custom-testi-author"><div class="custom-avatar">SW</div><div class="custom-testi-author-info"><strong>Mr. Sushant Wagle</strong><span>Director, Auctorem Solutions Pvt Ltd</span></div></div>
      </article>
      <article class="custom-testi-card">
        <div class="custom-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p class="custom-testi-text">"They guided us from the initial business plan all the way to launching our frozen ready-to-eat products. Expertise in plant machinery setup was invaluable."</p>
        <div class="custom-testi-author"><div class="custom-avatar">MK</div><div class="custom-testi-author-info"><strong>Mr. Mahesh Kulkarni</strong><span>Director, Vallary Agro</span></div></div>
      </article>
      <article class="custom-testi-card">
        <div class="custom-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p class="custom-testi-text">"FoodTechMate helped us develop a new product from scratch &#8212; recipe, trials, and market readiness. The whole process was smooth and well-managed."</p>
        <div class="custom-testi-author"><div class="custom-avatar">AS</div><div class="custom-testi-author-info"><strong>Mr. Ayan Shah</strong><span>Director, GS Tea</span></div></div>
      </article>
      <article class="custom-testi-card">
        <div class="custom-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p class="custom-testi-text">"We launched successful pea-protein snacks and flour. They guided us on taste, health standards, and compliance. Customers absolutely love the products!"</p>
        <div class="custom-testi-author"><div class="custom-avatar">MJ</div><div class="custom-testi-author-info"><strong>Mrs. Mohini Jadhav</strong><span>Director, Hitay Industries</span></div></div>
      </article>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="custom-faq" id="custom-faq">
  <div class="custom-sec-wrap">
    <div class="custom-sec-head">
      <span class="custom-eyebrow">FAQ</span>
      <h2>Common Questions</h2>
      <p class="custom-sec-sub">Everything you need to know before applying for your food license.</p>
    </div>
    <div class="custom-faq-inner">
      <div class="custom-faq-item"><button class="custom-faq-q" onclick="toggleFaq(this)" aria-expanded="false">What is FoodTechMate?<span class="custom-faq-icon">+</span></button><div class="custom-faq-a"><p>FoodTechMate is India's subscription-first food compliance platform helping food businesses manage FSSAI licensing, label validation, food safety SOPs, and business planning &#8212; all in one place with expert support.</p></div></div>
      <div class="custom-faq-item"><button class="custom-faq-q" onclick="toggleFaq(this)" aria-expanded="false">Which FSSAI license do I need?<span class="custom-faq-icon">+</span></button><div class="custom-faq-a"><p>It depends on your annual turnover. Basic Registration for up to &#8377;12 Lakhs. State License for &#8377;12 Lakhs to &#8377;20 Crores. Central License for above &#8377;20 Crores or import/export. Contact us and we'll recommend the right license type for your business.</p></div></div>
      <div class="custom-faq-item"><button class="custom-faq-q" onclick="toggleFaq(this)" aria-expanded="false">How long does the FSSAI application take?<span class="custom-faq-icon">+</span></button><div class="custom-faq-a"><p>Basic Registration takes 7&#8211;15 working days. State License takes 30&#8211;60 days. Central License takes 30&#8211;45 days after complete document submission. FoodTechMate handles all FSSAI follow-ups throughout.</p></div></div>
      <div class="custom-faq-item"><button class="custom-faq-q" onclick="toggleFaq(this)" aria-expanded="false">Are government fees included in the plan price?<span class="custom-faq-icon">+</span></button><div class="custom-faq-a"><p>No &#8212; government fees are charged separately by FSSAI at actuals. Basic Registration govt. fee is approx. &#8377;100. State License is &#8377;2,000&#8211;&#8377;5,000. Central License is approx. &#8377;7,500/year. No markups from our side.</p></div></div>
      <div class="custom-faq-item"><button class="custom-faq-q" onclick="toggleFaq(this)" aria-expanded="false">Is my payment secure on FoodTechMate?<span class="custom-faq-icon">+</span></button><div class="custom-faq-a"><p>Yes. FoodTechMate uses encrypted PCI-DSS compliant payment gateways (Razorpay / PayU). Pay via UPI (GPay, PhonePe, Paytm), credit/debit cards, net banking, or mobile wallets.</p></div></div>
      <div class="custom-faq-item"><button class="custom-faq-q" onclick="toggleFaq(this)" aria-expanded="false">Do I need label validation before launching my product?<span class="custom-faq-icon">+</span></button><div class="custom-faq-a"><p>Yes &#8212; strongly recommended. FSSAI has strict rules on nutrition labeling, allergen declarations, health claim wording, and font sizes. Getting label validation done before printing saves costly reprints and regulatory penalties post-launch.</p></div></div>
      <div class="custom-faq-item"><button class="custom-faq-q" onclick="toggleFaq(this)" aria-expanded="false">Can FoodTechMate help with export compliance?<span class="custom-faq-icon">+</span></button><div class="custom-faq-a"><p>Yes. Export businesses need a Central License. Our team also guides on APEDA registration, EIC certification, and export-specific labeling requirements for your target markets. Contact us for a customized quote.</p></div></div>
    </div>
  </div>
</section>

<!-- CTA BANNER -->
<section class="custom-cta-banner">
  <div class="custom-cta-banner-inner">
    <h2>Start Your Food Business the Right Way</h2>
    <p>Register free today. We handle label compliance, FSSAI licensing, and full setup &#8212; end to end, with expert guidance at every step.</p>
    <div class="custom-cta-btns">
      <a href="/register-user" class="custom-btn-white">Register Free Now &#8594;</a>
      <a href="tel:+917020048677" class="custom-btn-gold-outline"><i class="fa fa-phone"></i> Call Us Today</a>
    </div>
  </div>
</section>
</div>
</main>
@include('layouts.footer')
<script>
document.addEventListener('click',function(e){
  var m=document.getElementById('mobileMenu');
  if(m&&m.classList.contains('open')&&!m.contains(e.target)&&!document.querySelector('.custom-hamburger').contains(e.target)){
    m.classList.remove('open');
    document.querySelector('.custom-hamburger').setAttribute('aria-expanded','false');
  }
});
var licData={
  basic:{title:'FSSAI Basic Registration — Right for You',desc:'Ideal for small food businesses, home bakers, dabba services, petty retailers, and any FBO with annual turnover up to ₹12 Lakhs.',fee:'₹1,000/yr (platform fee)',govt:'Approx. ₹100 (FSSAI govt. fee)',validity:'1 Year — renewable for 1, 2 or 5 years'},
  state:{title:'FSSAI State License — Right for You',desc:'Required for mid-size manufacturers, restaurants, cloud kitchens, caterers, and traders with turnover between ₹12 Lakhs and ₹20 Crores.',fee:'₹3,000/yr (platform fee)',govt:'₹2,000–₹5,000 (FSSAI govt. fee, varies by state)',validity:'1–5 Years — renewable annually'},
  central:{title:'FSSAI Central License — Right for You',desc:'Mandatory for large manufacturers, importers, exporters, and businesses with turnover above ₹20 Crores or operating across multiple states.',fee:'₹6,000/yr (platform fee)',govt:'Approx. ₹7,500/yr (FSSAI govt. fee)',validity:'1–5 Years — renewable annually'}
};
function selectTurnover(el,type){
  document.querySelectorAll('.custom-t-opt').forEach(function(e){e.classList.remove('active');});
  el.classList.add('active');
  var d=licData[type];
  document.getElementById('resultTitle').textContent=d.title;
  document.getElementById('resultDesc').textContent=d.desc;
  document.getElementById('resultMeta').innerHTML='<div class="custom-rm-item"><span>Platform Fee</span><strong>'+d.fee+'</strong></div><div class="custom-rm-item"><span>Govt. Fee (Extra)</span><strong>'+d.govt+'</strong></div><div class="custom-rm-item"><span>Validity</span><strong>'+d.validity+'</strong></div>';
  var box=document.getElementById('licenseResult');
  box.classList.add('show');
  setTimeout(function(){box.scrollIntoView({behavior:'smooth',block:'nearest'});},100);
}
document.querySelectorAll('.custom-t-opt').forEach(function(el){
  el.addEventListener('keydown',function(e){if(e.key==='Enter'||e.key===' '){e.preventDefault();el.click();}});
});
function toggleFaq(btn){
  var ans=btn.nextElementSibling;
  var isOpen=btn.classList.contains('open');
  document.querySelectorAll('.custom-faq-q').forEach(function(b){b.classList.remove('open');b.setAttribute('aria-expanded','false');b.nextElementSibling.style.maxHeight='0';});
  if(!isOpen){btn.classList.add('open');btn.setAttribute('aria-expanded','true');ans.style.maxHeight=ans.scrollHeight+'px';}
}
window.addEventListener('load',function(){
  var pre=document.getElementById('preloader');
  if(pre){pre.style.opacity='0';setTimeout(function(){pre.style.display='none';},300);}
});
</script>
  </body>
</html>
