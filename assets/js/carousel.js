let idInput;
document.addEventListener('DOMContentLoaded', function () {
    const circular_slider = document.querySelector('.wrapper');
    const slides = document.querySelectorAll('.slides');
    const images = document.querySelectorAll('.slides img');
    const circle = document.querySelector('.circle');
    const form = document.getElementById("quick-add-template--20635886092591__product-grid8841119891759");
    const button = document.querySelector(".add-to-cart");

    // Get the input element by its name
    idInput = form.querySelector('input[name="id"]');


    const circleColor = ['#36AA52', '#FFE3AC', '#FFAAD2', '#FFE3AC', '#FFAAD2', '#85574E'];
    const variants = ["47000953913630", "47000954962206", "47000953192734", "47000954962206", "47000953192734", "47000956535070"]; /* Pandan FreshMilk Strawberry Fresh Milk Strawberry Chocolate */
    const buttonColor = ["#C9DD41", "#B99D6F", "#F04163", "#B99D6F",  "#F04163", "#54BBE8" ];

    let currentIndex = 0;
    let currentRotation = 24;
  
    document.getElementById('leftButton').addEventListener('click', function () {
      rotateSlider('left');
    });
  
    document.getElementById('rightButton').addEventListener('click', function () {
      rotateSlider('right');
    });
  
    function rotateSlider(direction) {
      const rotationIncrement = 360 / slides.length;
    
      if (direction === 'left') {
        currentRotation += rotationIncrement;
        currentIndex = (currentIndex - 1 + circleColor.length) % circleColor.length;
      } else {
        currentRotation -= rotationIncrement;
        currentIndex = (currentIndex + 1) % circleColor.length;
      }
    
      circular_slider.style.transform = `rotate(${currentRotation}deg)`;
      circle.style.backgroundColor = circleColor[currentIndex];
      idInput.value = variants[currentIndex];
    
      // Remove the previous button color class
      button.classList.remove('button-transition');
    
      // Wait for the next frame to apply the new class and trigger the transition
      requestAnimationFrame(() => {
        button.style.backgroundColor = buttonColor[currentIndex];
    
        // Add the class back to apply the transition
        button.classList.add('button-transition');
      });
    
      images.forEach((img, j) => {
        img.style.setProperty('--img-no', 2);
      });
    }
    
  });
  