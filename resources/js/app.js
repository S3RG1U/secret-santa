import './bootstrap';
import JSConfetti from 'js-confetti'

document.addEventListener("DOMContentLoaded", function() {
    const jsConfetti = new JSConfetti();

    if (window.location.pathname === '/congrats') {
        jsConfetti.addConfetti();
    }
});

