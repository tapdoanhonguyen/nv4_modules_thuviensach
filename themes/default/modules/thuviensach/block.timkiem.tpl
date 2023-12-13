<!-- BEGIN: main -->
<div class="header-item-search">
	<div class="input-group search-input">
		<div class="dropdown bootstrap-select default-select drop-head dropdown">
			<div class="i-false dropdown-toggle" id="danh-muc-sach-desktop" data-bs-toggle="dropdown" aria-expanded="false" tabindex="{catid}">{name_cat}<i class="ms-4 font-10 fa fa-chevron-down" ></i></div>
			<ul class="dropdown-menu" aria-labelledby="danh-muc-sach">
				<!-- BEGIN: cat -->
				<li>
					<a class="dropdown-item" onclick="chon_chuyen_muc_tim_kiem('{CAT.name_cat}',{CAT.id})">
						{CAT.name_cat}
					</a>
				</li>
				<!-- END: cat -->
			</ul>
		</div>
		<input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Nhập tên sách" id="keyword_search_desktop" value="{keyword}">
		<button class="btn" type="button" onclick="tim_kiem_sach_desktop()">
			<i class="flaticon-loupe"></i>
		</button>
	</div>
</div>
<script type="text/javascript">
	function chon_chuyen_muc_tim_kiem(name_cat,id) {
		$('#danh-muc-sach-desktop').html(name_cat);
		$('#danh-muc-sach-desktop').attr("tabindex",id);
	}
	function tim_kiem_sach_desktop(){
		var a = $('#danh-muc-sach-desktop').attr('tabindex');
		var keyword = $('#keyword_search_desktop').val();
		window.location.href = nv_base_siteurl + 'index.php?' + nv_name_variable + '={BLOCK.module}&' + nv_fc_variable + '=search&catid=' + a + '&keyword=' + keyword;
	}
	$( "#keyword_search_desktop" ).keypress(function( event ) {

		if ( event.which == 13 ) {

			tim_kiem_sach_desktop();
		}
		
	});
</script>
<!-- END: main -->