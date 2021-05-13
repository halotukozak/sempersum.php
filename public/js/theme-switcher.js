/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/theme-switcher.js ***!
  \****************************************/
(function () {
  document.getElementById('switchTheme').addEventListener('click', function () {
    var htmlClasses = document.querySelector('html').classList;

    if (localStorage.theme === 'dark') {
      htmlClasses.remove('dark');
      localStorage.removeItem('theme');
    } else {
      htmlClasses.add('dark');
      localStorage.theme = 'dark';
    }
  });

  if (localStorage.theme === 'dark' || !'theme' in localStorage && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    document.querySelector('html').classList.add('dark');
  } else if (localStorage.theme === 'dark') {
    document.querySelector('html').classList.add('dark');
  }
})();
/******/ })()
;