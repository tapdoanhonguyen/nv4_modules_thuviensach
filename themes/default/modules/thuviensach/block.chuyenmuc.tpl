<!-- BEGIN: main -->
<style type="text/css">
	.box_sach img{
		width: 100%;
	}
	.dz-content{
		margin-top: 5px;
		min-height: 70px;
	}
	.box_cat{
		margin-top: 20px;
	}
	.box_chuyen_muc{
		width: 100%;
		text-align: left;
		margin-bottom: 10px;
		border-bottom: 1px #dcdcdc solid;
	}
	.box_chuyen_muc h2{
		display: inline-block;
	}
	.box_chuyen_muc a{
		display: inline-block;
	}
</style>
<div class="section-head text-center">
	<!-- BEGIN: cat -->
	<!-- BEGIN: loop -->
	<div class="row box_cat">
		<div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">
			<div class="box_chuyen_muc">
				<h2 class="text-left">
					<a href="{CAT.link}">
						{CAT.name_cat}
					</a>
				</h2>
				<a style="float: right;" href="{CAT.link}">Xem tất cả ({CAT.tong_sach})</a>
			</div>
		</div>
		<div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">

			
			<!-- BEGIN: sach -->
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="box_sach">
					<div class="dz-media">
						<a href="{SACH.link}" title="{SACH.name_sach}">
							<img src="{SACH.image}" alt="{SACH.name_sach}">
						</a>
					</div>
					<div class="dz-content">
						<h3 class="title_sach">
							<a href="{SACH.link}" title="{SACH.name_sach}">
								{SACH.name_sach}
							</a>
						</h3>
						

					</div>
				</div>
			</div>
			<!-- END: sach -->
		</div>
	</div>
	<!-- END: loop -->
	<!-- END: cat -->
</div>
<!-- END: main -->