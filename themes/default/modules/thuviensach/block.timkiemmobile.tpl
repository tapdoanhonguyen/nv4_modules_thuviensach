<!-- BEGIN: main -->
<div class="input-group">
	<input type="text" class="form-control" aria-label="Tìm kiếm sách" placeholder="Nhập tên sách" id="keyword_search_mobile" value="{keyword}" ><button class="btn" type="button"  onclick="tim_kiem_sach()"><i class="flaticon-loupe"></i></button>
</div>
<script type="text/javascript">
	function tim_kiem_sach(){
		var keyword = $('#keyword_search_mobile').val();
		window.location.href = nv_base_siteurl + 'index.php?' + nv_name_variable + '={BLOCK.module}&' + nv_fc_variable + '=search&keyword=' + keyword;
	}
	$( "#keyword_search_mobile" ).keypress(function( event ) {
		if ( event.which == 13 ) {
			tim_kiem_sach();
		}
		
	});
</script>
<!-- END: main -->