// Código JavaScript opcional para melhorar a compatibilidade com navegadores mais antigos
(function() {
    if (window.__disableSmoothScrollPolyfill) return;
    if ('scrollBehavior' in document.documentElement.style) return;
    var polyfill = document.createElement('script');
    polyfill.src = 'https://cdnjs.cloudflare.com/ajax/libs/iamdustan-smoothscroll/0.4.0/smoothscroll.min.js';
    document.head.appendChild(polyfill);
})();