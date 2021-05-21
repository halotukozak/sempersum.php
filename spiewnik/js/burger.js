
const navSlide = () => {
  const toggler = document.querySelector('.toggler');
  const burger = document.querySelector('.burger');
  
  toggler.addEventListener('click', () => {

    burger.classList.toggle('toggle');
  });
};
navSlide();
