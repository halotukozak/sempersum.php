/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/chord-hider.js ***!
  \*************************************/
(function () {
  var hideButton = document.getElementById("hide");

  if (hideButton) {
    hideButton.addEventListener("click", function (event) {
      spans = document.getElementsByClassName("chordLine");
      var i = 0;

      while (spans[i] != null) {
        spans[i].classList.toggle("spanHidden");
        i++;
      }
    });
  }
})();
/******/ })()
;