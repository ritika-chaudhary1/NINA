<!-- Contact Section -->
    <section class="contact-section bg-black py-5 rounded-bottom-3 mt-1">
        {{-- <div class="container bg-black py-5"> --}}

            @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

            <h6 class="section-heading text-center">GET IN TOUCH</h6>
            <h2 class="section-title text-white text-center">Want To <span class="text-danger">Enrich</span> Yourself, Always Connect with Us</h2>
            
            <div class="row p-3">
                <div class="col-lg-6">
                    <form class="contact-form" action="{{ route('contact_us.store') }}" method="POST">
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
                    <button type="submit" class="btn btn-danger">Send Message</button>
                </form>

                </div>
                
                <div class="col-lg-6">
                    <div class="form-image">
                        <img src="{{ asset('images/form.jpg') }}" alt="form-image" />
                    </div>
                </div>
            </div>
        {{-- </div> --}}

        <!-- Footer Section -->
        <div class="container-fluid rounded-top-3">
        <div class="container text-center py-2">
             <p class="fs-4 pt-1 text-white fw-bold">nina99@domainname.com / 14 tottenham road, london, england / +1(0) 987654</p>
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
    </section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
