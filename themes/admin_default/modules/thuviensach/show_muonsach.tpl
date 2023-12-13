<!-- BEGIN: main -->
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover full">
		<colgroup>
		<col style="width:100px" />
		<col />
	</colgroup>
	<tbody>
		<tr>
			<td colspan="2" style="background: #3ea00b;color: #fff;text-transform: uppercase;">
				<strong>
					Thông tin mượn sách
				</strong>
			</td>
		</tr>
		<tr>
			<td class="text-center" style="vertical-align: middle;">
				<strong>
					{LANG.ma_muonsach}
				</strong>
			</td>
			<td>
				{info.ma_muonsach}
			</td>
		</tr>
		<tr>
			<td class="text-center" style="vertical-align: middle;">
				<strong>
					{LANG.thuvien_id}
				</strong>
			</td>
			<td>
				{info.thuvien_id}
			</td>
		</tr>
		<tr>
			<td class="text-center" style="vertical-align: middle;">
				<strong>
					{LANG.name_muon}
				</strong>
			</td>
			<td>
				{info.name}
			</td>
		</tr>
		<tr>
			<td class="text-center" style="vertical-align: middle;">
				<strong>
					{LANG.phone}
				</strong>
			</td>
			<td>
				{info.phone}
			</td>
		</tr>
		<tr>
			<td class="text-center" style="vertical-align: middle;">
				<strong>
					{LANG.email}
				</strong>
			</td>
			<td>
				{info.email}
			</td>
		</tr>
		<tr>
			<td colspan="2" style="background: #3ea00b;color: #fff;text-transform: uppercase;">
				<strong>
					Danh sách sách mượn
				</strong>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="w100 text-center" style="vertical-align: middle;">
									{LANG.stt}
								</th>
								<th class="text-center" style="vertical-align: middle;">
									{LANG.ma_sach}
								</th>
								<th class="text-center w150" style="vertical-align: middle;">
									Hình
								</th>
								<th class="text-center w150" style="vertical-align: middle;">
									{LANG.name_sach}
								</th>
								<th class="text-center w150" style="vertical-align: middle;">
									{LANG.nhaxuatban_id}
								</th>
								<th class="text-center w150" style="vertical-align: middle;">
									{LANG.tacgia_id}
								</th>
							</tr>
						</thead>
						<tbody>
							<!-- BEGIN: sach -->
							<tr>
								<td class="text-center" style="vertical-align: middle;">
									{LOOP.stt}
								</td>
								<td class="text-center" style="vertical-align: middle;">
									{LOOP.info_sach.ma_sach}
								</td>
								<td class="text-center" style="vertical-align: middle;">
									<img src="{LOOP.info_sach.image}" style="width: 80px;height: 80px">
								</td>
								<td class="text-center" style="vertical-align: middle;">
									{LOOP.info_sach.name_sach}
								</td>
								<td class="text-center" style="vertical-align: middle;">
									{LOOP.info_sach.nhaxuatban_name}
								</td>
								<td class="text-center" style="vertical-align: middle;">
									{LOOP.info_sach.tacgia_name}
								</td>
							</tr>
							<!-- END: sach -->
						</tbody>
					</table>
				</div>
			</td>
		</tr>
	</tbody>
</table>
</div>

<!-- END: main -->