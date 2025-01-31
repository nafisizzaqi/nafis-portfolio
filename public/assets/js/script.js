function toggleNavbar() {
    const navbar = document.getElementById('navbar-sticky');
    navbar.classList.toggle('hidden');
}

const dataElement = document.getElementById("typingData");

// Ambil atribut `data-strings` dan parsing ke array
const strings = JSON.parse(dataElement.getAttribute("data-strings"));


var typingEffect = new Typed("#typing", {
    strings: strings,
    loop: true,
    typeSpeed: 100,
    backSpeed: 80,
    startDelay: 1000,
    backDelay: 1500
});

document.getElementById('Hire-me').addEventListener('click', function() {
    document.getElementById('footer').scrollIntoView({
        behavior: 'smooth'
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const openModals = document.querySelectorAll(".openModal");
    const closeModals = document.querySelectorAll(".closeModal");
    
    openModals.forEach(openModal => {
        openModal.addEventListener("click", function () {
            const modalId = this.getAttribute("data-modal");
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove("hidden");
                setTimeout(() => {
                    modal.querySelector(".modalImage").classList.add("scale-100");
                }, 100); 
            }
        });
    });

    closeModals.forEach(closeModal => {
        closeModal.addEventListener("click", function () {
            const modal = this.closest(".fixed");
            if (modal) {
                modal.querySelector(".modalImage").classList.remove("scale-100");
                setTimeout(() => {
                    modal.classList.add("hidden");
                }, 300);
            }
        });
    });
});



