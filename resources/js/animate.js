document.addEventListener("DOMContentLoaded", function () {
    const preloader = document.getElementById("preloader");
    if (preloader) {
        preloader.classList.add("preload-none");

        setTimeout(() => {
            preloader.remove();
        }, 500);
    }

    const text = "We are a Digital Agency that loves creating Animation Videos";
    const targetElement = document.getElementById("animation-target");

    function typeText(index) {
        if (index < text.length) {
            targetElement.textContent += text.charAt(index);
            setTimeout(typeText, 75, index + 1);
        }
    }

    typeText(0);
});
