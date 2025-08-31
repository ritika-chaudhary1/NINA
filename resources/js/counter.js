// resources/js/counter.js
document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".counter");
    const speed = 200;

    const animateCounter = (counter) => {
        const target = +counter.getAttribute("data-target");
        const suffix = counter.getAttribute("data-suffix") || "";
        const updateCount = () => {
            const count = +counter.innerText.replace(/\D/g, '');
            const increment = Math.ceil(target / speed);

            if (count < target) {
                counter.innerText = count + increment + suffix;
                setTimeout(updateCount, 20);
            } else {
                if (suffix === "k") {
                    counter.innerText = (target / 1000) + "k";
                } else {
                    counter.innerText = target + suffix;
                }
            }
        };

        updateCount();
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    counters.forEach(counter => {
        observer.observe(counter);
    });
});
