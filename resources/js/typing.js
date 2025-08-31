document.addEventListener("DOMContentLoaded", () => {
    const first = "Shahbaz ";
    const last = "Ali";

    const firstTarget = document.getElementById("typed-first");
    const lastTarget = document.getElementById("typed-last");

    let i = 0;
    let j = 0;

    function typeFirst() {
        if (i < first.length) {
            firstTarget.innerHTML += first.charAt(i);
            i++;
            setTimeout(typeFirst, 150);
        } else {
            setTimeout(typeLast, 200); // small delay before last name
        }
    }

    function typeLast() {
        if (j < last.length) {
            lastTarget.innerHTML += last.charAt(j);
            j++;
            setTimeout(typeLast, 150);
        }
    }

    typeFirst();
});
