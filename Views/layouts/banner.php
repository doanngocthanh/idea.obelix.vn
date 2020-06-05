
<div class="w3-content" style="max-width:100%; ">
  <img class="mySlides" src="<?php echo $base_url?>assets/img/slider-3.jpg" style="width:100%">
  <img class="mySlides" src="<?php echo $base_url?>assets/img/rsz_slider-2.jpg" style="width:100%">
  <img class="mySlides" src="https://www.w3schools.com/w3css/img_chicago.jpg" style="width:100%">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

