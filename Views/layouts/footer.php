


<footer class="footer">
      <div class="container">
	  <div class="row-fluid">
		  
  <div class="span4">
	  <p><img src="<?php echo $base_url?>assets/img/logo-idea-final.svg" alt="<?php echo $base_url?>assets/img/logo-idea-final.svg" max-height="200px" style="width:200px;    filter: brightness( 200% ) contrast( 200% ) saturate( 0% ) blur( 0px ) hue-rotate( 0deg );"></p>
	  <p style="color:white; font-size:72px"><i class="icon-facebook"></i> <i class="icon-twitter"></i> <i class="icon-instagram"></i></p>

</div>
  <div class="span4">	
	    <p style="margin-top: 15px; color: white; font-size: 22px;">Công ty TNHH TM In Ấn - Quảng Cáo Ý Tưởng</p>
	  	<p style="margin-top: 10px; color: white; font-size: 16px;">MST: 6001569449</p>
	  	<p style="margin-top: 20px; color: white; font-size: 22px;">Giờ làm việc</p>
		<p style="margin-top: 10px; color: white; font-size: 16px;">Sáng từ: 7h30 - 11h30<br>
		<p style="margin-top: 10px; color: white; font-size: 16px;">Chiều từ: 13h30 - 17h30 (Chỉ nghỉ ngày CN)</p></div>
  <div class="span4">	<p style="margin-top: 15px;"><i class="icon-map-marker" style="font-size: 18px; color: white">  30 Bùi Thị Xuân, Tự An, Thành phố Buôn Ma Thuột, Đắk Lắk</i></p>
		<p style="margin-top: 15px;"><i class="icon-phone" style="font-size: 18px; color: white"> <a href="tel:0964554499"> 0964 55 44 99 (Ms Hiếu) </a></i></p>
		<p style="margin-top: 15px;"><i class="icon-phone" style="font-size: 18px; color: white"><a href="tel:0985656123"> 098 5656 123 (Mr Nam) </a>  </i></p>
		<p style="margin-top: 15px;"><i class="icon-envelope" style="font-size: 18px; color: white">  <a href="mailto:inanytuongbmt@gmail.com">inanytuongbmt@gmail.com</a> </i></p></div>  
</div>
</div>
<div class="container-fluid">
		 <div class="span6" style="text-align: center; font-size: 16px; padding: 20px 0px 20px 0px;"><p style="color: white">Copyright © 2019  Idea Advertising.Print</p></div>
		 <div class="span6" style="text-align: center; font-size: 16px; padding: 20px 0px 20px 0px;"><p style="color: white">
<a href="https://obelix.vn/"> Develope By ObelixMedia</a></p></div>
		 
      </div>
    </footer> 
 
	 
   
  <!-- Placed at the end of the document so the pages load faster -->
  <script type="text/javascript"></script>
    <script src="<?php echo $base_url?>assets/js/jquery.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-button.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-typeahead.js"></script>
    <script src="<?php echo $base_url?>assets/js/bootstrap-affix.js"></script>

    <script src="<?php echo $base_url?>assets/js/holder/holder.js"></script>
    <script src="<?php echo $base_url?>assets/js/google-code-prettify/prettify.js"></script>

    <script src="<?php echo $base_url?>assets/js/application.js"></script>
    <script src="<?php echo $base_url?>assets/js/slick.min.js"></script>

<script>
$(document).ready(function(){
    $('.customer-box').slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]
    });
});

</script>

<script>
// Script to open and close sidebar
index=1;
function nav(){
  index+=1;
  if(index % 2==0){
    document.getElementById("mySidebar").style.display = "block";
  }else{
    document.getElementById("mySidebar").style.display = "none";
  }
 console.log(index);
 }


</script>
