<script>
	$(document).ready(function(){
		$.ajax({
			method: "POST",
			url: "src_qr_by_date2.php",
			data: { mode: "list" }
			})
			.done(function(data) {
			$('#table').html(data);
			});
		
		
		
	});
</script>
<div id="table"></div>
<input type="text"> 
