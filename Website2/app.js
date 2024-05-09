document.addEventListener('DOMContentLoaded', function() {
    const menu = document.querySelector('#mobile-menu');
    const menuLinks = document.querySelector('.navbar__menu');

    menu.addEventListener('click', function() {
        menu.classList.toggle('is-active');
        menuLinks.classList.toggle('active');
    });
});
document.getElementById('dynamic-input').addEventListener('input', function () {
    this.style.width = ((this.value.length + 1) * 8) + 'px';
  });