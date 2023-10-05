<link rel="stylesheet" href='assets/css/flavor-styles.css'>

<section class="background-flavor">
  <a href="collections/all" >
    <img src='assets/img/check1.png' class="check-flavor">
  </a>
  <div class="flavor-mood"><h2 class="flavor-mood2">WHAT KIND OF FLAVOR SUITS YOUR MOOD?</h2></div>
  <div class="img-flavor"><img src="assets/img/four.png"></div>
</section>

<script>
  const checkFlavor = document.querySelector('.check-flavor');
const backgroundFlavor = document.querySelector('.background-flavor');
const imgFlavor = document.querySelector('.img-flavor img');
const flavorMood = document.querySelector('.flavor-mood2');

// Store the original image source
const originalImgSrc = imgFlavor.src;
let originalCheckFlavor = checkFlavor.src; // Declare as a variable instead of constant

// Add a hover event listener to the check-flavor div
checkFlavor.addEventListener('mouseover', () => {
  backgroundFlavor.style.backgroundColor = 'white'; // Change background color to white on hover
  imgFlavor.src = 'assets/img/four2.png';
  checkFlavor.src = 'assets/img/check2.png';// Replace 'new-image-url.jpg' with the URL of your new image
  flavorMood.style.color = 'black';
});

// Add a mouseout event listener to reset the background color when the mouse leaves
checkFlavor.addEventListener('mouseout', () => {
  backgroundFlavor.style.backgroundColor = 'black'; // Reset background color
  imgFlavor.src = originalImgSrc;
  checkFlavor.src = originalCheckFlavor; // Restore the original source
  flavorMood.style.color = 'white';
});
</script>