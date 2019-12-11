
  <?php
  include('db.php');
  $s = "select * from tb_content where id = {$_POST['link_id']} ";
  //echo $s;
  $q = mysqli_query($link,$s);
  $rs = mysqli_fetch_array($q);
  ?>

<header class="w3-row w3-orange w3-animate-top " style="max-width:100%;margin-bottom:5px;" >
<div class=" w3-container  w3-deep-orange w3-cell " >
<p>
</div>
<div class=" w3-container w3-orange w3-cell w3-padding-16"><h3 class="" >
  <i class='<?php echo  $icon; ?>'></i>&nbsp;<b>เนื้อหา เรื่อง <u><?php  echo $rs['topic']; ?></u>
</h3>
</div>

</header>
<div class="w3-container " style="width:90%;padding-left: 80px; ">

  <?php  echo $rs['content']; ?>
</div>
<script>
$(document).ready(function() {
  $("strong").addClass('font-weight-bold');

  $(window).scroll(function (event) {
  //  document.getElementById("scroll_num").style.display = "block";
      var scroll = $(window).scrollTop();
      // Do something

      var elmnt = document.getElementById("content");
        var y = elmnt.scrollHeight;
        var x = elmnt.scrollWidth;
          $('#scroll_num').html(scroll);

          if(scroll >= (y/2) && scroll <= (y-1000))
          {
            document.getElementById("scroll_mid").style.display = "block";
          }else if(scroll > (y-1000)){
            document.getElementById("scroll_mid").style.display = "none";
            document.getElementById("scroll_final").style.display = "block";
          }else{
            document.getElementById("scroll_mid").style.display = "none";
            document.getElementById("scroll_final").style.display = "none";
          }

  });
});
</script>
