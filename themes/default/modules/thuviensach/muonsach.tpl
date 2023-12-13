<!-- BEGIN: main -->
<div class="alert alert-warning d-none" id="list_error"></div>
<form id="form_sach">
	<div class="card">
		<div class="card-body">
			<h5 class="car-title">Thông tin thư viện</h5>
			<div class="table-responsive">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover full">
						<colgroup>
							<col style="width:200px" />
							<col />
						</colgroup>
						<tbody>
							
							<tr>
								<td>
									<strong class="text-center" style="vertical-align: middle;">
										Mã thư viện
									</strong>
								</td>
								<td>
									{INFO_THUVIEN.ma_thuvien}
								</td>
							</tr>
							<tr>
								<td>
									<strong class="text-center" style="vertical-align: middle;">
										Tên thư viện
									</strong>
								</td>
								<td>
									{INFO_THUVIEN.name_thuvien}
								</td>
							</tr>
							<tr>
								<td>
									<strong class="text-center" style="vertical-align: middle;">
										Tỉnh thành
									</strong>
								</td>
								<td>
									{INFO_THUVIEN.ten_tinhthanh}
								</td>
							</tr>
							<tr>
								<td>
									<strong class="text-center" style="vertical-align: middle;">
										Quận huyện
									</strong>
								</td>
								<td>
									{INFO_THUVIEN.ten_quanhuyen}
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<h5 class="car-title">Danh sách sách muốn mượn</h5>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover full">
					<thead>
						<tr>
							<th class="text-center" style="vertical-align: middle;">
								Hình ảnh
							</th>
							<th class="text-center" style="vertical-align: middle;">
								Mã sách
							</th>
							<th class="text-center" style="vertical-align: middle;">
								Tên sách
							</th>
							<th class="text-center" style="vertical-align: middle;">
								Nhà xuất bản
							</th>
							<th class="text-center" style="vertical-align: middle;">
								Tác giả
							</th>
						</tr>
					</thead>
					<tbody>
						<!-- BEGIN: sach -->
						<tr>
							<td class="text-center" style="vertical-align: middle;">
								<img src="{INFO.image}" style="height: 50px;width: 100%;object-fit: cover" class="img-responsive" />
							</td>
							<td class="text-center" style="vertical-align: middle;">
								{INFO.ma_sach}
							</td>
							<td class="text-center" style="vertical-align: middle;">
								{INFO.name_sach}
							</td>
							<td class="text-center" style="vertical-align: middle;">
								{INFO.nhaxuatban_name}
							</td>
							<td class="text-center" style="vertical-align: middle;">
								{INFO.tacgia_name}
							</td>
						</tr>
						<!-- END: sach -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<h5 class="car-title">Thông tin người mượn</h5>
			<div class="table-responsive">
				<table class="table table-bordered table-hover full">
					<colgroup>
						<col style="width:200px" />
						<col />
					</colgroup>
					<tbody>
						<tr>
							<td>
								<strong class="text-center" style="vertical-align: middle;">
									Họ và tên
								</strong>
								<span class="red">(*)</span>
							</td>
							<td>
								<input class="form-control" type="text" name="name" value="{INFO_USER.name_user}" required="" oninvalid="setCustomValidity('Vui lòng nhập họ và tên')" oninput="setCustomValidity('')" placeholder="Nhập họ và tên" />
							</td>
						</tr>
						<tr>
							<td>
								<strong class="text-center" style="vertical-align: middle;">
									Số điện thoại
								</strong>
								<span class="red">(*)</span>
							</td>
							<td>
								<input class="form-control" type="text" value="{INFO_USER.phone}" onkeyup="check_phone_js(this)" name="phone" required="" oninvalid="setCustomValidity('Vui lòng nhập số điện thoại')" oninput="setCustomValidity('')"  placeholder="Nhập số điện thoại" />
							</td>
						</tr>
						<tr>
							<td>
								<strong class="text-center" style="vertical-align: middle;">
									Email
								</strong>
								<span class="red">(*)</span>
							</td>
							<td>
								<input class="form-control" type="email" name="email" value="{INFO_USER.email}" required="" oninvalid="setCustomValidity('Vui lòng nhập email')" oninput="setCustomValidity('')" placeholder="Nhập email" />
							</td>
						</tr>
						<tr>
							<td>
								<strong class="text-center" style="vertical-align: middle;">
									CMND
								</strong>
								<span class="red">(*)</span>
							</td>
							<td>
								<input class="form-control" type="text" name="cmnd" value="" required="" oninvalid="setCustomValidity('Vui lòng nhập CMND')" oninput="setCustomValidity('')" placeholder="Nhập CMND" />
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="text-center">
		<button type="button" class="btn btn-primary" onclick="save_muon_sach({INFO_THUVIEN.id},{INFO_USER.userid})">
			Xác nhận mượn sách
		</button>
	</div>
</form>
<!-- END: main -->
