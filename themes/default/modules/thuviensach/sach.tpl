<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title" style="float:left">
            <i class="fa fa-list"></i> 
            Thư viện sách: {info_thu_vien.name_thuvien}
        </h3> 
        <div class="pull-right">
            <button title="Ẩn /Hiện tìm kiếm" id="vidoco_sea_id" data-toggle="tooltip" data-placement="top" class="btn btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button> 
        </div>
        <div style="clear:both"></div>
    </div>
    <div class="well" id="vidoco_sea">
        <form action="{NV_BASE_SITEURL}index.php" id="formsearch" method="get">
            <input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}" />
            <input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
            <input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <select class="form-control link_flast" id="sea_flast" name="sea_flast">
                                <option value="0">
                                    -- Chọn thời gian --
                                </option>
                                <option value="1" {SELECT1}>Ngày hôm nay</option>
                                <option value="2" {SELECT2}>Ngày hôm qua</option>
                                <option value="3" {SELECT3}>Tuần này</option>
                                <option value="4" {SELECT4}>Tuần trước</option>
                                <option value="5" {SELECT5}>Tháng này</option>
                                <option value="6" {SELECT6}>Tháng trước</option>
                                <option value="7" {SELECT7}>Năm này</option>
                                <option value="8" {SELECT8}>Năm trước</option>
                                <option value="9" {SELECT9}>Toàn thời gian
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <input id="ngaytu" type="text" maxlength="255" class="form-control disabled" value="{ngay_tu}"
                            name="ngay_tu" autocomplete="off" placeholder="{LANG.ngay_tu}">
                        </div>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <input id="ngayden" autocomplete="off" type="text" maxlength="255" class="form-control disabled" value="{ngay_den}"
                            name="ngay_den" placeholder="{LANG.ngay_den}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <select id="nhaxuatban_id" name="nhaxuatban_id" class="form-control input-sm">
                            <option value="{nhaxuatban_id}">
                                {nhaxuatban_name}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <select id="tacgia_id" name="tacgia_id" class="form-control input-sm">
                            <option value="{tacgia_id}">
                                {tacgia_name}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <select id="danhmuc_id" name="danhmuc_id" class="form-control input-sm">
                            <!-- BEGIN: cat_listsub -->
                            <option value="{cat_listsub.value}" {cat_listsub.selected}>{cat_listsub.title}</option>
                            <!-- END: cat_listsub -->
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <input class="form-control" autocomplete="off" type="text" value="{Q}" name="q" maxlength="255"
                        placeholder="{LANG.ma_sach}, {LANG.name_sach}" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="{LANG.search_submit}" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<h2 class="title_sach">
    Danh sách sách tại thư viện {info_thu_vien.name_thuvien}
</h2>
<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="w100 text-center" style="vertical-align: middle;">
                        {LANG.number}
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        {LANG.ma_sach}
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        {LANG.name_sach}
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Hình ảnh
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        {LANG.nhaxuatban_id}
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        {LANG.tacgia_id}
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        {LANG.danhmuc_id}
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        {LANG.price}
                    </th>
                    <th class="text-center" style="vertical-align: middle;width: 100px">
                        Số lượng
                    </th>
                    <th class="text-center" style="vertical-align: middle;width: 200px">
                        Ghi chú
                    </th>
                </tr>
            </thead>
            <!-- BEGIN: generate_page -->
            <tfoot>
                <tr>
                    <td class="text-center" colspan="10">{NV_GENERATE_PAGE}</td>
                </tr>
            </tfoot>
            <!-- END: generate_page -->
            <tbody>
                <!-- BEGIN: loop -->
                <tr>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.number} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.ma_sach} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                        {VIEW.name_sach} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        <img src="{VIEW.image}" style="width: 50px;height: 50px" />
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.nhaxuatban_id} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.tacgia_id} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.danhmuc_id} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.price} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        <input type="text" onkeyup="change_number_sach(this.value=FormatNumber(this.value),{VIEW.id},{thuvien_id})" class="form-control" value="{VIEW.soluong}" />
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        <textarea class="form-control" rows="5" onkeyup="change_note_sach({VIEW.id},{thuvien_id},this)">{VIEW.note}</textarea>
                    </td>
                </tr>
                <!-- END: loop -->
            </tbody>
        </table>
    </div>
</form>

<script type="text/javascript">
    $('select[name=sea_flast]').change(function() {
        var time_from = "";
        var time_to = "";
        var time = $('select[name=sea_flast]').val();
        if (time == 1) {
            time_from = "{HOMNAY}"
            time_to = "{HOMNAY}"
        } else if (time == 2) {
            time_from = "{HOMQUA}"
            time_to = "{HOMQUA}"
        } else if (time == 3) {
            time_from = "{TUANNAY.from}"
            time_to = "{TUANNAY.to}"
        } else if (time == 4) {
            time_from = "{TUANTRUOC.from}"
            time_to = "{TUANTRUOC.to}"
        } else if (time == 5) {
            time_from = "{THANGNAY.from}"
            time_to = "{THANGNAY.to}"
        } else if (time == 6) {
            time_from = "{THANGTRUOC.from}"
            time_to = "{THANGTRUOC.to}"
        } else if (time == 7) {
            time_from = "{NAMNAY.from}"
            time_to = "{NAMNAY.to}"
        } else if (time == 8) {
            time_from = "{NAMTRUOC.from}"
            time_to = "{NAMTRUOC.to}"
        } else if (time == 9) {
            time_from = "Không chọn"
            time_to = "Không chọn"
        } else if (time == 0) {
            time_from = ""
            time_to = ""
        }
        $('#ngaytu').val(time_from);
        $('#ngayden').val(time_to); 
    })
    $("#vidoco_sea_id").click(function() {
        $("#vidoco_sea").toggle();
    });
    $("#ngaytu,#ngayden").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changedepartment: true,
        firstDay: 1,
        showOtherMonths: true,
    });
    $('#nhaxuatban_id').select2({
        placeholder: "Tất cả nhà xuất bản",
        ajax: {
            url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_nhaxuatban_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#tacgia_id').select2({
        placeholder: "Tất cả tác giả",
        ajax: {
            url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_tacgia_search',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term
                }
                return query;
            },
            method: 'post',
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
    $('#danhmuc_id').select2({})
</script>
<!-- END: main -->