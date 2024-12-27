import './bootstrap';
import 'flowbite';

// Alpine.js initialization (optional)
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Custom JavaScript functions
document.addEventListener('DOMContentLoaded', () => {
    // Any global JavaScript logic
});

import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init();
