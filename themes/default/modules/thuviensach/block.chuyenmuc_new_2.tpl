<!-- BEGIN: main -->
<script src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/swiper-bundle.min.js"></script>
<div class="section-head book-align">
	<h2 class="title mb-0">{BLOCK_TITLE}</h2>
	<div class="pagination-align style-1">
		<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
		<div class="swiper-pagination-two"></div>
		<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
	</div>
</div>
<div class="swiper swiper-container swiper-four swiper-pointer-events swiper-watch-progress books-wrapper-3">
	<div class="swiper-wrapper">
		<!-- BEGIN: sach -->
		<div class="swiper-slide">
			<div class="books-card style-3 wow fadeInUp" data-wow-delay="0.1s">
				<div class="dz-media"><img src="{SACH.image}" alt="{SACH.name_sach}"></div>
				<div class="dz-content">
					<h5 class="title"><a href="{SACH.link}">{SACH.name_sach}</a></h5>
					<ul class="dz-tags">
						<li><a href="{SACH.cat_link}">{SACH.cat_name}</a></li>
					</ul>
					<div class="book-footer">
						<div class="rate"><i class="flaticon-star"></i> {SACH.thong_tin_danh_gia.danh_gia_trung_binh}</div>
						<div class="price"><span class="price-num">Đã mượn: {SACH.so_lan_muon} lần</span></div>
					</div>
				</div>
			</div>
		</div>
		<!-- END: sach -->
	</div>
</div>
<script>
	var swiper = 
	new Swiper('.books-wrapper-3',{
		speed: 1500,
		parallax: !0,
		slidesPerView: 5,
		spaceBetween: 30,
		loop: !0,
		pagination: {
			el: ".swiper-pagination-two",
			clickable: !0
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		autoplay: {
			delay: 3e3
		},
		onSwiper: function(e) {
			setTimeout((function() {
				e.params.navigation.prevEl = t.current, e.params.navigation.nextEl = n.current, e.navigation.destroy(), e.navigation.init(), e.navigation.update()
			}))
		},
		modules: [],
		breakpoints: {
			1200: {
				slidesPerView: 5
			},
			1191: {
				slidesPerView: 4
			},
			767: {
				slidesPerView: 3
			},
			591: {
				slidesPerView: 2,
				centeredSlides: !0
			},
			320: {
				slidesPerView: 2,
				spaceBetween: 15,
				centeredSlides: !0
			}
		},
	}
	);
</script>
<!-- END: main -->