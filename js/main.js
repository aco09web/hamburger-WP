const content = document.querySelector(".p-menu");
const btn = document.querySelector(".p-header__button--menu");
const blackBg = document.querySelector('.p-nav__bg-color');
const closeBtn = document.querySelector('.p-nav__btn--close');


$(btn).click(function () {
  $(this).toggleClass('is-open');
    $(content).toggleClass('is-open');
    $(closeBtn).toggleClass('is-open');
    $(blackBg).toggleClass('is-open');
});

$(".p-menu a").click(function () {
    $(content).removeClass('is-open');
    $(closeBtn).removeClass('is-open');
    $(blackBg).removeClass('is-open');
});
$(blackBg).click(function () {
    $(content).removeClass('is-open');
    $(closeBtn).removeClass('is-open');
    $(blackBg).removeClass('is-open');
});

