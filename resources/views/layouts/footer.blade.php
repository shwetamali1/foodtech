<footer class="footer-box">
    <div class="container">
      <div class="row">

      <div class="col-md-2">
        <div class="menu-footer">
          <h4>Help</h4>
          <ul>
            <li><a href="/contact-us">Contact Us</a></li>
            <li><a href="/contact-us">Help Centre</a></li>
            </ul>
      </div>
      </div>

   <div class="col-md-2">
        <div class="menu-footer">
          <h4>Company</h4>
          <ul>
              <li><a href="/about-us">About Us</a></li>
             <li><a href="/terms-and-conditions">Terms of Service</a></li>
             <li><a href="/refund-policy">Refund Policy</a></li>
             <li><a href="/privacy-policy">Privacy Policy</a></li>
             
            </ul>
      </div>
      </div>

       <div class="col-md-3">
        <div class="menu-footer">
          <h4>Contact</h4>
          <ul>
            <li><a href="tel:+917020048677">+91 7020048677</a></li>
            <li><a href="mailto:hello@foodtechmate.com">hello@foodtechmate.com</a></li>
            <li>Office No 302, Sant Niwas, New DP Rd, Pimple Nilakh, Pune, Maharashtra 411027</li>
            </ul>
      </div>
      </div>


       <div class="col-md-5">
        <div class="newsletter-footer">
        <h4>Receive updates from our weekly
newsletter.</h4>
<p>Be the first to get notified about new foodtech features & updates.</p>
<form class="footer-email" action="emailSubscribe" method="POST">
     @csrf
 <input class="form-control" name="email" type="text" placeholder="Enter your email">
 <button type="submit">Notify Me</button>
  </form>
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ $errors->first('email') }}
    </div>
@endif
        </div>
      </div>


      </div>
    </div>
</footer>







</main>




 <!-- Swiper JS -->
  <script src="{{ URL::asset('assets/front/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/front/js/bootstrap.bundle.min.js') }}"></script>


     <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".serviesslide", {
      slidesPerView: 1,
      spaceBetween: 10,
       navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
         clickable: true,
      },
      // pagination: {
      //   el: ".swiper-pagination",
      //   clickable: true,
      // },
      breakpoints: {
        "@0.00": {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        "@0.75": {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        "@1.00": {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        "@1.50": {
          slidesPerView: 4,
          spaceBetween:20,
        },
      },
    });
  </script>


<script>
    var swiper = new Swiper(".testimonialsslide", {
      slidesPerView: 1,
      spaceBetween: 10,
       //centeredSlides: true,
     
      //  navigation: {
      //   nextEl: ".swiper-button-next",
      //   prevEl: ".swiper-button-prev",
      //    clickable: true,
      // },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
       autoplay: {
        delay:3500,
        disableOnInteraction: false
      },
      
      breakpoints: {
        "@0.00": {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        "@0.75": {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        "@1.00": {
          slidesPerView:2,
          spaceBetween: 20,
        },
        "@1.50": {
          slidesPerView:2,
          spaceBetween:20,
        },
      },
    });
  </script>
  <script>
    window.addEventListener("load", function () {
        let preloader = document.getElementById("preloader");
        preloader.style.display = "none";
    });
</script>
<script>
    // Auto hide alerts after 3 seconds
    setTimeout(function() {
        let alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            alert.classList.remove('show'); // hide with fade
        });
    }, 3000); // 3 seconds
</script>


