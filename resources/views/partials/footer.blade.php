    <!-- Contact Section -->
<section class="contact-section bg-black py-5 rounded-bottom-3 mt-1">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h6 class="section-heading text-center">GET IN TOUCH</h6>
    <h2 class="section-title text-white text-center">
        Want To <span class="text-danger">Enrich</span> Yourself, Always Connect with Us
    </h2>
            
    <footer class="footer mt-3 bg-black">
        <div class="container">
            <div class="row">
                <!-- Contact Info + Map -->
                <div class="col-md-6 mt-5">
                    <h5 class="mb-4 text-white">Contact Info</h5>
                    <p class="d-flex gap-2 contact-text">
                        <i class="fa-solid fa-phone-volume mt-1 text-white"></i>+32 (0) 333 444 555
                    </p>
                    <p class="d-flex gap-2 contact-text">
                        <i class="fa-solid fa-location-dot mt-1 text-white"></i>5B Street, City 50987 New Town US
                    </p>
                    <p class="d-flex gap-2 contact-text">
                        <i class="fa-solid fa-envelope-circle-check mt-1 text-white"></i>htmlstream@support.com
                    </p>

                    <!-- Google Map -->
                    <div class="map-container mt-5" style="height: 250px; border-radius: 10px; overflow: hidden;">
                 <iframe 
                     src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28394.45468226777!2d87.2629803!3d26.4550496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef744a2a8d1a11%3A0x6d3b00358c89ebd1!2sBiratnagar%2C%20Nepal!5e0!3m2!1sen!2snp!4v1692626789999!5m2!1sen!2snp" 
                     width="80%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                 </iframe>
               </div>
            </div>


                <!-- Backend Contact Form -->
                <div class="col-md-6 p-5 border border-secondary">
                    <h3 class="mb-5 text-white">Contact Us</h3>
                    <form class="contact-form" action="{{ route('contact_us.store') }}" method="POST" style="max-width: 500px;">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Your name" required />
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Your email" required />
                        </div>
                        <div class="mb-3">
                            <input type="text" name="subject" class="form-control" placeholder="Subject" />
                        </div>
                        <div class="mb-3">
                            <textarea name="message" class="form-control" rows="5" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger ">Send Message</button>
                    </form>
                </div>
            </div>
        </div>


         <div class="scrolling-wrapper border-bottom">
            <div class="scrolling-content d-flex gap-5">
                <div class="footer-items d-flex gap-5">
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
                </div>

                <div class="footer-items d-flex gap-5">
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
        <h1 class="mid-footer-title text-center">LET'S WORK </h1>
                </div>
            </div>
    </div>
    
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <p class="mb-0 fw-bold text-white">© 2023 <span class="text-danger">NINA</span>, ALL RIGHTS RESERVED.</p>
            </div>
            <div class="col-md-4 text-center">
                <a href="#" class="footer-link text-white fw-bold">BACK TO HOME</a>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="#" class="social-icon text-white fw-bold">FACEBOOK</a>
                <a href="#" class="social-icon text-white fw-bold ms-3">DRIBBLE</a>
                <a href="#" class="social-icon text-white fw-bold ms-3">BEHANCE</a>
            </div>
        </div>
    </div>

    </footer>
</section>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
