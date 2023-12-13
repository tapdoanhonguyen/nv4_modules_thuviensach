<!-- BEGIN: main -->
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
	<!-- BEGIN: generate_page -->
	{NV_GENERATE_PAGE}
	<!-- END: generate_page -->
</div>
<!-- BEGIN: cat -->
<div class="section-head text-center">
	<h2 class="title">{LOOP_CAT.name_cat}</h2>
</div>
<div class="row book-grid-row">
	<!-- BEGIN: sach -->
	<div class="col-book style-1">
		<div class="dz-shop-card style-1">
			<div class="dz-media">
				<img src="{VIEW.image}" alt="{VIEW.name_sach}">
			</div>
			<div class="bookmark-btn style-2">
				<input class="form-check-input" {VIEW.checked} type="checkbox" id="flexCheckDefault_{VIEW.id}">
				<label class="form-check-label" for="flexCheckDefault_{VIEW.id}" onclick="yeu_thich(this,{VIEW.id})">
					<i class="flaticon-heart"></i>
				</label>
			</div>
			<div class="dz-content">
				<h5 class="title">
					<a href="{VIEW.alias}">
						{VIEW.name_sach}
					</a>
				</h5>
				<ul class="dz-tags">
					<li>
						<a href="{VIEW.cat_link}">
							{VIEW.cat_title}
						</a>
					</li>
				</ul>
				<ul class="dz-rating">
					<li><i class="flaticon-star text-yellow"></i></li>
					<li><i class="flaticon-star text-yellow"></i></li>
					<li><i class="flaticon-star text-yellow"></i></li>
					<li><i class="flaticon-star text-yellow"></i></li>
					<li><i class="flaticon-star text-yellow"></i></li>
				</ul>
				<div class="book-footer">
					<div class="price">
						<span class="price-num">
							Số lần mượn: {VIEW.so_lan_muon}
						</span>
					</div>
					<a class="btn btn-secondary box-btn btnhover btnhover2" href="{VIEW.alias}">
						<i class="flaticon-shopping-cart-1 m-r10"></i> 
						Xem chi tiết
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- END: sach -->
</div>
<!-- END: cat -->
<!-- END: main -->