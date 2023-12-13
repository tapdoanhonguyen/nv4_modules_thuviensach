<!-- BEGIN: main -->
<script src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/swiper-bundle.min.js"></script>
<div class="section-head text-center">
	<div class="circle style-1"></div>
	<h2 class="title">{BLOCK_TITLE}</h2>
	<p>{BLOCK_ICON}</p>
</div>
<div class="swiper swiper-container swiper-three swiper-pointer-events books-wrapper-2">
	<div class="swiper-wrapper">
		<!-- BEGIN: sach -->
		<div class="swiper-slide">
			<div class="books-card style-2">
				<div class="dz-media"><img src="{SACH.image}" alt="{SACH.name_sach}"></div>
				<div class="dz-content">
					<h6 class="sub-title">NEW</h6>
					<h2 class="title">{SACH.name_sach}</h2>
					<ul class="dz-tags">
						<li>{SACH.cat_name}</li>
					</ul>
					<p class="text">{SACH.description}</p>
					<div class="price">
						<span style="margin-right: 5px;">
							Giá bìa:
						</span>
						<span class="price-num">{SACH.price} đ</span>
					</div>
					<div class="bookcard-footer"><a class="btn btn-primary btnhover m-t15 m-r10" href="{SACH.link}">Đổi sách ngay</a><a class="btn btn-outline-secondary btnhover m-t15" href="{SACH.link}">Chi tiết</a></div>
				</div>
			</div>
		</div>
		<!-- END: sach -->
	</div>
	<div class="pagination-align style-2">
		<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
		<div class="swiper-pagination-three"></div>
		<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
	</div>
</div>
<script>
	var swiper = 
	new Swiper('.books-wrapper-2',{
		centeredSlides: !0,
		slidesPerView: "auto",
		spaceBetween: 90,
		loop: !0,
		speed: 1e3,
		pagination: {
			el: ".swiper-pagination-three",
			clickable: !0
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		onSwiper: function(e) {
			setTimeout((function() {
				e.params.navigation.prevEl = t.current, e.params.navigation.nextEl = n.current, e.navigation.destroy(), e.navigation.init(), e.navigation.update()
			}))
		},
		modules: [],
		breakpoints: {
			320: {
				slidesPerView: 1
			},
			1200: {
				slidesPerView: 1
			},
			1680: {
				slidesPerView: 1
			}
		},
	}
	);
</script>
<!-- END: main -->