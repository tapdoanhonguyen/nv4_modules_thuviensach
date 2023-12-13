<!-- BEGIN: main -->
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover full">
		<thead>
			<tr>
				<th class="text-center" style="vertical-align: middle;">
					<input class="form-control check_full" {checked} type="checkbox" onclick="check_full(this)" />
				</th>
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
				<th class="text-center" style="vertical-align: middle;"></th>
			</tr>
		</thead>
		<!-- BEGIN: muon_sach -->
		<tfoot>
			<tr>
				<td colspan="7" class="text-center" style="vertical-align: middle;">
					<button type="button" class="btn btn-primary" onclick="change_form_data()">
						Chuyển sang bước điền thông tin cá nhân và mượn sách
					</button>
				</td>
			</tr>
		</tfoot>
		<!-- END: muon_sach -->
		<tbody>
			<!-- BEGIN: no_search -->
			<tr>
				<td colspan="7" class="text-center" style="vertical-align: middle;">
					<strong>
						Hiện không có sách nào trong giỏ hàng
					</strong>
				</td>
			</tr>
			<!-- END: no_search -->
			<!-- BEGIN: search -->
			<tr>
				<td class="text-center" style="vertical-align: middle;">
					<input class="form-control check_product" {INFO.checked} type="checkbox" onclick="check_product(this,{INFO.id},{number_sach})" />
				</td>
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
				<td class="text-center" style="vertical-align: middle;">
					<button type="button" class="btn btn-danger" onclick="delete_cart({INFO.id})">
						Xóa
					</button>
				</td>
			</tr>
			<!-- END: search -->
		</tbody>
	</table>
</div>
<!-- END: main -->
