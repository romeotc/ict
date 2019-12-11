<header class="w3-row w3-light-blue w3-animate-top w3-hide-small w3-center" style="max-width:100%;" >
<div class="w3-container w3-center w3-light-blue w3-cell" >
<h3 class="w3-center" style=" word-wrap: break-word;">ยินดีต้อนรับ <span class="w3-text-gray"><b><?php session_start();
echo $_SESSION['name']; ?></b></span>  </h3></div>
</header>



<br />

<div class="w3-content w3-display-container">
  <img class="mySlides" src="slide/1.png" style="width:100%">
  <img class="mySlides" src="slide/2.png" style="width:100%">


  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>
<br />


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
  setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>
