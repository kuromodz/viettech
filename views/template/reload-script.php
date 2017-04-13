<script type="text/javascript">
	$(function(){
		$('.priceDot').each(function(index,value){
			$(value).text($(value).text().toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
		})
	})
</script>