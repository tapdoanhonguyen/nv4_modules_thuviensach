<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title" style="float:left"><i class="fa fa-list"></i> 
            {LANG.sachrequest}
        </h3> 
        <div class="pull-right">
            <button title="Ẩn /Hiện tìm kiếm" id="vidoco_sea_id" data-toggle="tooltip" data-placement="top" class="btn btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button> 
        </div>
        <div style="clear:both"></div>
    </div>
    <div class="well" id="vidoco_sea">
        <form action="{NV_BASE_ADMINURL}index.php" id="formsearch" method="get" >
            <input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}" />
            <input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
            <input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />
            <div class="row">
                <div class="col-xs-24 col-sm-12  col-md-8  col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                Tìm kiếm nhanh
                            </span>
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

                <div class="col-xs-24 col-sm-12  col-md-8  col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                hoặc {LANG.ngay_tu}
                            </span>
                            <input id="ngaytu" type="text" maxlength="255" class="form-control disabled" value="{ngay_tu}"
                            name="ngay_tu" autocomplete="off" placeholder="{LANG.ngay_tu}">
                        </div>
                    </div>

                </div>

                <div class="col-xs-24 col-sm-12  col-md-8  col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                {LANG.ngay_den}
                            </span>
                            <input id="ngayden" autocomplete="off" type="text" maxlength="255" class="form-control disabled" value="{ngay_den}"
                            name="ngay_den" placeholder="{LANG.ngay_den}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-24 col-sm-12  col-md-8  col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                Nhà xuất bản
                            </span>
                            <select id="nhaxuatban_id" name="nhaxuatban_id" class="form-control input-sm">
                                <option value="{nhaxuatban_id}">
                                    {nhaxuatban_name}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-24 col-sm-12  col-md-8  col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                Tác giả
                            </span>
                            <select id="tacgia_id" name="tacgia_id" class="form-control input-sm">
                                <option value="{tacgia_id}">
                                    {tacgia_name}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-24 col-sm-12  col-md-8  col-lg-8">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                Danh mục
                            </span>
                            <select id="danhmuc_id" name="danhmuc_id" class="form-control input-sm">
                                <!-- BEGIN: cat_listsub -->
                                <option value="{cat_listsub.value}" {cat_listsub.selected}>{cat_listsub.title}</option>
                                <!-- END: cat_listsub -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-24 col-sm-12  col-md-7  col-lg-7">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                Trạng thái
                            </span>
                            <select id="status_search" name="status_search" class="form-control input-sm">
                                <!-- BEGIN: status_filt -->
                                <option value="{status_filt.id}" {status_filt.selected}>
                                    {status_filt.text}
                                </option>
                                <!-- END: status_filt -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-24 col-sm-12  col-md-7  col-lg-7">
                    <div class="form-group">
                        <div class="input-group" style="width:100%">
                            <span class="input-group-addon w100">
                                Thư viện
                            </span>
                            <select id="thuvien_id" name="thuvien_id" class="form-control input-sm">
                                <option value="{thuvien_id}">
                                    {thuvien_id_name}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-24 col-sm-12 col-md-7 col-lg-7">
                    <div class="form-group">
                        <input class="form-control" autocomplete="off" type="text" value="{Q}" name="q" maxlength="255"
                        placeholder="{LANG.name_sach}" />
                    </div>
                </div>
                <div class="col-sm-24 col-sm-24 col-md-2 col-lg-2">
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="{LANG.search_submit}" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<form action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="w100 text-center" style="vertical-align: middle;">{LANG.number}</th>
                    <th class="text-center" style="vertical-align: middle;">
                        Thư viện
                    </th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.name_sach}</th>
                    <th class="text-center" style="vertical-align: middle;">Hình ảnh</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.nhaxuatban_id}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.tacgia_id}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.danhmuc_id}</th>
                    <th class="text-center" style="vertical-align: middle;">{LANG.price}</th>
                    <th class="text-center" style="vertical-align: middle;">
                        {LANG.time_add}
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Thời gian duyệt
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Người duyệt
                    </th>
                    <th class="w100">&nbsp;</th>
                </tr>
            </thead>
            <!-- BEGIN: generate_page -->
            <tfoot>
                <tr>
                    <td class="text-center" colspan="12">{NV_GENERATE_PAGE}</td>
                </tr>
            </tfoot>
            <!-- END: generate_page -->
            <tbody>
                <!-- BEGIN: loop -->
                <tr>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.number} </td>
                    <td class="text-center" style="vertical-align: middle;">
                        {VIEW.thuvien_id}
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.name_sach} </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        <img src="{VIEW.image}" style="width: 50px;height: 50px" />
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.nhaxuatban_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.tacgia_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.danhmuc_id} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.price} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.time_add} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.time_edit} </td>
                    <td class="text-center" style="vertical-align: middle;"> {VIEW.user_edit} </td>
                    <td class="text-center" style="vertical-align: middle;">
                        <!-- BEGIN: duyet -->
                        <p>
                            <button type="button" class="btn btn-primary" onclick="duyet_sach({VIEW.id})">
                                Duyệt và thêm sách
                            </button>
                        </p>
                        <p>
                            <em class="fa fa-trash-o fa-lg">&nbsp;</em> 
                            <a href="{VIEW.link_delete}" onclick="return confirm(nv_is_del_confirm[0]);">{LANG.delete}</a>
                        </p>
                        <!-- END: duyet -->
                        <!-- BEGIN: no_duyet -->
                        <strong>Đã duyệt</strong>
                        <!-- END: no_duyet -->
                    </td>
                </tr>
                <!-- END: loop -->
            </tbody>
        </table>
    </div>
</form>

<script type="text/javascript">
    function duyet_sach(id){
        var check=confirm('Bạn có chắc là sẽ duyệt và thêm sách này vào không?');
        if(check){
            var data='mod=duyet_sach&id='+id
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax',data, function(res) {
                var res=JSON.parse(res)
                if(res.status=='OK'){
                    alert(res.mess)
                    location.reload()
                }else{
                    alert(res.mess)
                }
            });
        }
    }
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
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
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
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
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
    $('#thuvien_id').select2({
        placeholder: "Tất cả thư viện",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_thuvien_search',
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