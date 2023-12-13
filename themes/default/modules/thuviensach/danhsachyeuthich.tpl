<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<style type="text/css">
	.select2-selection__rendered {
		line-height: 41px !important;
	}
	.select2-container .select2-selection--single {
		height: 49px !important;
	}
	.select2-selection__arrow {
		height: 48px !important;
	}
</style>
<div class="row mb-3">
	<div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">
		<form method="get" action="{NV_BASE_SITEURL}index.php">
			<input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}" />
			<input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
			<input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />
			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
					<select class="form-control catid" name="catid">
						<option value="">Tất cả danh mục</option>
						<!-- BEGIN: item -->
						<option value="{item.key}" {item.selected}>
							{item.title}
						</option>
						<!-- END: item -->
					</select>
				</div>
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="margin-left: inherit;margin-right: inherit;">
					<input type="text" class="form-control" name="keyword" value="{Q}" placeholder="Tên sách muốn tìm" />
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<input type="submit" class="btn btn-primary" value="Tìm kiếm" />
				</div>
			</div>
		</form>
	</div>
</div>
<div class="row book-grid-row">
	<!-- BEGIN: loop -->
	<div class="col-book style-1">
		<div class="dz-shop-card style-1">
			<div class="dz-media"><img src="{VIEW.image}" alt="{VIEW.name_sach}"></div>
			<div class="bookmark-btn style-2">
				<input class="form-check-input" type="checkbox" id="flexCheckDefault{VIEW.id}" checked="" onclick="remove_yeuthich({VIEW.id})">
				<label class="form-check-label" for="flexCheckDefault{VIEW.id}">
					<i class="flaticon-heart"></i>
				</label>
			</div>
			<div class="dz-content">
				<h5 class="title">
					<a href="{VIEW.alias}">{VIEW.name_sach}</a>
				</h5>
				<ul class="dz-tags">
					<li>
						<a href="{VIEW.cat_link}">{VIEW.cat_title}</a>
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
					<div class="price"><span class="price-num">{VIEW.price} vnđ</span></div>
					<a class="btn btn-secondary box-btn btnhover btnhover2" href="{VIEW.alias}"><i class="flaticon-shopping-cart-1 m-r10"></i> Xem chi tiết</a>
				</div>
			</div>
		</div>
	</div>
	<!-- END: loop -->
	<!-- BEGIN: no_loop -->
	<div class="col style-1 text-center">
		<strong>Hiện không có sách nào theo dữ liệu bạn tìm</strong>
	</div>
	<!-- END: no_loop -->
</div>
<!-- BEGIN: generate_page -->
{NV_GENERATE_PAGE}
<!-- END: generate_page -->
<script type="text/javascript">
	$('.catid').select2({width:"100%",height:"100px"});
</script>
<!-- END: main -->