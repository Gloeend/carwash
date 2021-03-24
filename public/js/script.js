/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
jQuery(document).ready(function () {
  $('#header-about-video').siblings('.btn-play').hide();
  $('#header-about-video').siblings('.btn-pause').hide();
  $('#footer-about-video').siblings('.btn-play').hide();
  $('#footer-about-video').siblings('.btn-pause').hide();
});
$('.video-container').hover(function () {
  if ($(this).children('video').data('index')) {
    $(this).children('.btn-pause').show();
  } else {
    $(this).children('.btn-play').show();
  }
}, function () {
  $(this).children('button').hide();
});
$('.btn-play').click(function () {
  $(this).siblings('.about-video-header')[0].play();
  $(this).siblings('.about-video-header').data('index', 1);
  $(this).hide();
  $(this).siblings('.btn-pause').show();
});
$('.btn-pause').click(function () {
  $(this).siblings('.about-video-header')[0].pause();
  $(this).siblings('.about-video-header').data('index', 0);
  $(this).hide();
  $(this).siblings('.btn-play').show();
});
/******/ })()
;