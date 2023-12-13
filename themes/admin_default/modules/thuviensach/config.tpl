<!-- BEGIN: main -->

<style type="text/css">
	.full input{
		width: 100% !important;
	}
</style>
<form class="form-inline" action="{NV_BASE_ADMINURL}index.php" method="post">
	<input type="hidden" name ="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
	<input type="hidden" name ="{NV_OP_VARIABLE}" value="{OP}" />
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover full">
			<colgroup>
			<col style="width:380px" />
			<col />
		</colgroup>
		<tbody>
			<tr>
				<td colspan="2" style="background: #3ea00b;color: #fff;text-transform: uppercase;">
					<strong>
						Cấu hình chung
					</strong>
				</td>
			</tr>
			<tr>
				<td>
					<strong>
						Mã nhà xuất bản
					</strong>
				</td>
				<td>
					<input class="form-control" name="raw_nhaxuatban" value="{DATA.raw_nhaxuatban}" />
				</td>
			</tr>
			<tr>
				<td>
					<strong>
						Mã tác giả
					</strong>
				</td>
				<td>
					<input class="form-control" name="raw_tacgia" value="{DATA.raw_tacgia}" />
				</td>
			</tr>
			<tr>
				<td>
					<strong>
						Mã sách
					</strong>
				</td>
				<td>
					<input class="form-control" name="raw_sach" value="{DATA.raw_sach}" />
				</td>
			</tr>
			<tr>
				<td>
					<strong>
						Mã thư viện
					</strong>
				</td>
				<td>
					<input class="form-control" name="raw_thuvien" value="{DATA.raw_thuvien}" />
				</td>
			</tr>
			<tr>
				<td>
					<strong>
						Mã mượn sách
					</strong>
				</td>
				<td>
					<input class="form-control" name="raw_muonsach" value="{DATA.raw_muonsach}" />
				</td>
			</tr>
			
		</tbody>
	</table>
	<div style="text-align: center;">
		<input class="btn btn-primary" type="submit" value="{LANG.save}" name="Submit1" id="save_214" />
		<input type="hidden" value="1" name="saveconfig" />
	</div>
</div>
</form>
<!-- END: main -->