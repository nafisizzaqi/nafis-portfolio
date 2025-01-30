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

const openModalBtns = document.querySelectorAll('.openModal');
const closeModalBtns = document.querySelectorAll('.closeModal');

openModalBtns.forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
        }
    });
});

// Menangani event klik pada tombol tutup modal
closeModalBtns.forEach(button => {
    button.addEventListener('click', () => {
        const modal = button.closest('.fixed');
        modal.classList.add('hidden');
    });
});

// Menutup modal jika klik di luar area modal
window.addEventListener('click', (event) => {
    const openModals = document.querySelectorAll('.fixed:not(.hidden)');
    openModals.forEach(modal => {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
});


