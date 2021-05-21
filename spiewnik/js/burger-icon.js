
const iconSlide = () => {
  const icon_burger = document.querySelector('.icon-b');
  const icon_nav = document.querySelector('.icon-nav')
  //Otwieranie
  icon_burger.addEventListener('click', () => {
    icon_nav.classList.toggle('icon-nav--close');

  });
};


iconSlide();
