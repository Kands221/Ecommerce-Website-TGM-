document.addEventListener('DOMContentLoaded', () => {
    setTimeout(function () {
      // Hide the loader
      document.querySelector('.loader-wrapper').style.display = 'none';
    }, 3000); // Adjust the time as needed
    let bottle = [
      'assets/img/Hero Section_Pan.png',
      'assets/img/Hero_Section_FMilk.png',
      'assets/img/Hero_Section_Straw.png',
      'assets/img/Hero_Section_Choc.png'
    ];

    const bgColor = [
      'linear-gradient(179.44deg, #119B3A 0.49%, #96D890 60.2%, rgba(255, 255, 255, 0) 83.21%)',
      'linear-gradient(179.44deg, #FFDF9F 0.49%, #FFF5E1 62.3%, rgba(255, 255, 255, 0) 83.1%)',
      'linear-gradient(179deg, #FFA9D1 0.49%, #FFE5F1 62.3%, rgba(255, 255, 255, 0.00) 83.1%)',
      'linear-gradient(179deg, #7A4D46 0.49%, #C7967C 62.3%, rgba(255, 255, 255, 0.00) 83.1%)',
    ];

    const imgTransform = [
      "assets/img/Pandan.png",
      "assets/img/Fresh Milk.png",
      "assets/img/Strawberry.png",
      "assets/img/Chocolate.png"
    ];

    const clickClick = [
        "assets/img/clickclick_Pan.png",
        "assets/img/clickclick_Fresh.png",
        "assets/img/clickclick_Straw.png",
        "assets/img/clickclick_Choc.png"
    ];

    const shop_button = [
        "assets/img/shopPan.png",
        "assets/img/shopFresh.png",
        "assets/img/shopStraw.png",
        "assets/img/shopChoc.png"
    ];

    const color_text = ['#9DC53B', '#AD915F', '#EE3854', '#45B2E5'];

    const bottleElement = document.querySelector('.bottle');
    const backgroundElement = document.querySelector('.background');
    const imgTransformElement = document.querySelector('.imgTransform');
    const imgBox2 = document.querySelector('.imgBox2');
    const clickImg = document.querySelector('.click');
    const shop = document.querySelector('.shop');
    const text = document.querySelector('.text');

    let timer;
    let continueTimer = true;
    let currentIndex = 0;

    function imgAndBackgroundChanger() {
      if (!continueTimer) {
        return; // Stop the timer if continueTimer is false
      }

      currentIndex = (currentIndex + 1) % bottle.length;
      bottleElement.src = bottle[currentIndex];
      backgroundElement.style.background = bgColor[currentIndex];
      clickImg.src = clickClick[currentIndex];
      shop.src = shop_button[currentIndex];
      text.style.color = color_text[currentIndex];

      clickImg.classList.add('click-img-transition');
      bottleElement.classList.add('click-img-transition');

      // Apply the zoom-in-move animation class to the image elements
      imgTransformElement.classList.add('zoom-in-move');
      imgTransformElement.src = imgTransform[currentIndex];

      // Wait for the animation to finish and then reset
      setTimeout(() => {
        imgTransformElement.classList.remove('zoom-in-move');
        clickImg.classList.remove('click-img-transition');
        bottleElement.classList.remove('click-img-transition');
        // Set the image sources back to normal
        if (continueTimer) {
          timer = setTimeout(imgAndBackgroundChanger, 3000);
        }
      }, 500); // Adjust the delay to match the animation duration
    }

    imgBox2.addEventListener('click', () => {
      if (!continueTimer) {
        // Change the image immediately if the timer is not running
        currentIndex = (currentIndex + 1) % bottle.length;
        bottleElement.src = bottle[currentIndex];
        backgroundElement.style.background = bgColor[currentIndex];
        imgTransformElement.src = imgTransform[currentIndex];
        shop.src = shop_button[currentIndex];
        text.style.color = color_text[currentIndex];

        clickImg.src = clickClick[currentIndex];
        clickImg.classList.add('click-img-transition');
        bottleElement.classList.add('click-img-transition');

        imgTransformElement.classList.add('zoom-in-move');

        setTimeout(() => {
          imgTransformElement.classList.remove('zoom-in-move');
          clickImg.classList.remove('click-img-transition');
          bottleElement.classList.remove('click-img-transition');
        }, 500); // Adjust the delay to match the animation duration
      }

      continueTimer = !continueTimer; // Toggle the timer flag
    });

    // Start the initial timer
    timer = setTimeout(imgAndBackgroundChanger, 3000);

    const imgChanger = document.getElementById('imgChanger');
    imgChanger.addEventListener('click', imgAndBackgroundChanger);

    const button = document.getElementById('orderButton');

    // Add event listeners to change button color on hover
    button.addEventListener('mouseenter', () => {
      button.style.backgroundColor = getButtonColor();
      text.style.color = 'white'; // Set button color on hover
      shop.src = "assets/img/shopWhite.png";
    });

    button.addEventListener('mouseleave', () => {
      button.style.backgroundColor = 'white'; // Reset to default color on mouseleave
      text.style.color = color_text[currentIndex];
      shop.src = shop_button[currentIndex];
    });

    // Function to determine the button color based on the currently displayed image
    function getButtonColor() {
      if (currentIndex == 0) {
        return '#9DC53B'; // Color for the first image
      } else if (currentIndex == 1) {
        return '#AD915F'; // Color for the second image
      } else if (currentIndex == 2) {
        return '#EE3854'; // Color for the third image
      } else if (currentIndex == 3) {
        return '#45B2E5'; // Color for the fourth image
      }
    }

    const mobile_bottle = [
      '{{ "Mob_Hero_Section_Pan.png" | asset_url }}',
      '{{ "Mob_Hero_Section_FMilk.png" | asset_url }}',
      '{{ "Mob_Hero_Section_Straw.png" | asset_url }}',
      '{{ "Mob_Hero_Section_Choc.png" | asset_url }}',
    ];

    // Define a function to handle changes in the media query state
    function handleMediaQueryChange(mediaQuery) {
      if (mediaQuery.matches) {
        bottle = mobile_bottle;
      } else {
        console.log('Viewport is now wider than 768px');
      }
    }
    const mediaQuery = window.matchMedia('(max-width: 480px)');

    mediaQuery.addListener(handleMediaQueryChange);
    handleMediaQueryChange(mediaQuery);
  });