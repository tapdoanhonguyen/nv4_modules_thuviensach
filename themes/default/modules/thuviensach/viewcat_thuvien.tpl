<!-- BEGIN: main -->
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover full">
		<colgroup>
		<col style="width:120px" />
		<col />
	</colgroup>
	<tbody>
		<tr>
			<td colspan="2" style="background: #000;color: #fff;text-transform: uppercase;">
				<strong style="color:#fff">
					Thông tin thư viện
				</strong>
			</td>
		</tr>
		<tr>
			<td class="text-center" style="vertical-align: middle;">
				<strong>Mã thư viện</strong>
			</td>
			<td style="vertical-align: middle;">
				{info_thuvien.ma_thuvien}
			</td>
		</tr>
		<tr>
			<td class="text-center" style="vertical-align: middle;">
				<strong>Tên thư viện</strong>
			</td>
			<td style="vertical-align: middle;">
				{info_thuvien.name_thuvien}
			</td>
		</tr>
		<tr>
			<td class="text-center" style="vertical-align: middle;">
				<strong>Tỉnh thành</strong>
			</td>
			<td style="vertical-align: middle;">
				{info_thuvien.ten_tinhthanh}
			</td>
		</tr>
		<tr>
			<td class="text-center" style="vertical-align: middle;">
				<strong>Quận huyện</strong>
			</td>
			<td style="vertical-align: middle;">
				{info_thuvien.ten_quanhuyen}
			</td>
		</tr>
		<tr>
			<td colspan="2" style="background: #000;color: #fff;text-transform: uppercase;">
				<a href="{LOOP_CAT.alias}">
					<strong style="color:#fff">
						Danh sách sách của thư viện này
					</strong>
				</a>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<!-- BEGIN: loop -->
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="ipost clearfix">
						<div class="entry-image">
							<a href="{VIEW.alias}">
								<img class="image_fade lazyloaded" src="{VIEW.image}" alt="{VIEW.name_sach}" style="height: 200px;object-fit: cover;">
							</a>
						</div>
						<div class="entry-title">
							<h3>
								<a href="{VIEW.alias}">{VIEW.name_sach}</a>
							</h3>
						</div>
					</div>
				</div>
				<!-- END: loop -->
				<!-- BEGIN: generate_page -->
				{NV_GENERATE_PAGE}
				<!-- END: generate_page -->
			</td>
		</tr>
	</tbody>
</table>
</div>
<!-- END: main -->
