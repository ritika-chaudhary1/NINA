    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.custom-navbar');
        const heroSection = document.querySelector('.hero-section');

        // Get height of hero section
        const heroHeight = heroSection.offsetHeight;

        if (window.scrollY > heroHeight) {
            navbar.classList.add('fixed');
        } else {
            navbar.classList.remove('fixed');
        }
    });

