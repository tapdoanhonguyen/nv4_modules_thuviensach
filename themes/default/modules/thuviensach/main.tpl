<!-- BEGIN: main -->
<div class="d-flex justify-content-between align-items-center">
	<h4 class="title">Thư viện sách</h4>
</div>

<div class="row book-grid-row">
	<!-- BEGIN: loop -->
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<div class="box_sach">
			<div class="dz-media">
				<a href="{VIEW.alias}" title="{VIEW.name_sach}">
					<img src="{VIEW.image}" alt="{VIEW.name_sach}">
				</a>
			</div>
			<div class="dz-content">
				<h3 class="title_sach">
					<a href="{VIEW.alias}" title="{VIEW.name_sach}">
						{VIEW.name_sach}
					</a>
				</h3>


			</div>
		</div>
	</div>
	
	<!-- END: loop -->
</div>
<!-- BEGIN: generate_page -->
{NV_GENERATE_PAGE}
<!-- END: generate_page -->

<!-- END: main -->