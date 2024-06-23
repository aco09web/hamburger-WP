const content = document.querySelector(".p-menu");
const btn = document.querySelector(".p-header__button--menu");
const blackBg = document.querySelector('.p-nav__bg-color');
const closeBtn = document.querySelector('.p-nav__btn--close');


jQuery(btn).click(function () {
  jQuery(this).toggleClass('is-open');
    jQuery(content).toggleClass('is-open');
    jQuery(closeBtn).toggleClass('is-open');
    jQuery(blackBg).toggleClass('is-open');
});

jQuery(closeBtn).click(function () {
    jQuery(content).removeClass('is-open');
    jQuery(closeBtn).removeClass('is-open');
    jQuery(blackBg).removeClass('is-open');
});
jQuery(blackBg).click(function () {
    jQuery(content).removeClass('is-open');
    jQuery(closeBtn).removeClass('is-open');
    jQuery(blackBg).removeClass('is-open');
});

