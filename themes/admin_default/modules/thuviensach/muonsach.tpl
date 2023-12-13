<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title" style="float:left"><i class="fa fa-list"></i> 
            {LANG.muonsach}
        </h3> 
        <div class="pull-right">
            <button title="Ẩn /Hiện tìm kiếm" id="vidoco_sea_id" data-toggle="tooltip" data-placement="top" class="btn btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button> 
        </div>
        <div style="clear:both"></div>
    </div>
    <div class="well" id="vidoco_sea">
        <form action="{NV_BASE_ADMINURL}index.php" id="formsearch" method="get">
            <input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}" />
            <input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
            <input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />
            <div class="row">
                <div class="col-xs-24 col-sm-12  col-md-12  col-lg-8">
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

                <div class="col-xs-24 col-sm-12  col-md-12  col-lg-8">
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

                <div class="col-xs-24 col-sm-12  col-md-12  col-lg-8">
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
                <div class="col-xs-24 col-sm-12  col-md-12  col-lg-12">
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
                <div class="col-xs-24 col-sm-12  col-md-12  col-lg-12">
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
            </div>
            <div class="row">
                <div class="col-xs-24 col-sm-12  col-md-12  col-lg-12">
                    <div class="form-group">
                        <input class="form-control" autocomplete="off" type="text" value="{Q}" name="q" maxlength="255"
                        placeholder="{LANG.ma_muonsach}, {LANG.name_muon}, {LANG.phone}, {LANG.email}" />
                    </div>
                </div>
                <div class="col-sm-24  col-md-24  col-lg-4">
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
					<th class="w100 text-center" style="vertical-align: middle;">
                        {LANG.number}
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        {LANG.ma_muonsach}
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Tài khoản mượn
                    </th>
                    <th class="text-center w150" style="vertical-align: middle;">
                        {LANG.thuvien_id}
                    </th>
                    <th class="text-center w150" style="vertical-align: middle;">
                        {LANG.name_muon}
                    </th>
                    <th class="text-center w150" style="vertical-align: middle;">
                        {LANG.phone}
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        {LANG.cmnd}
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        {LANG.time_add}
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Thời gian duyệt / không duyệt             
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Người duyệt / không duyệt               
                    </th>
                    <th class="w100 text-center" style="vertical-align: middle;">
                        {LANG.active}
                    </th>
                    <th class="w150">&nbsp;</th>
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
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.number} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.ma_muonsach} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.userid} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.thuvien_id} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.name} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.phone} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.cmnd} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.time_add} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.time_edit} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.user_edit} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                        <!-- BEGIN: duyet -->
                        <p>
                            <button type="button" class="btn btn-primary" onclick="change_sach_duyet_khong_duyet({VIEW.id},1)">
                                Đồng ý cho mượn
                            </button>
                        </p>
                        <p>
                            <button type="button" class="btn btn-primary" onclick="change_sach_duyet_khong_duyet({VIEW.id},3)">
                                Không Đồng ý cho mượn
                            </button>
                        </p>
                        <!-- END: duyet -->
                        <!-- BEGIN: no_duyet -->
                        <p>
                            <strong>
                                {VIEW.status_name}
                            </strong>
                        </p>
                        <!-- BEGIN: tra_sach -->
                        <p>
                            <button type="button" class="btn btn-primary" onclick="tra_sach({VIEW.id})">
                                Xác nhận trả sách
                            </button>
                        </p>
                        <!-- END: tra_sach -->
                        <!-- END: no_duyet -->
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                        <p>
                            <button type="button" class="btn btn-primary" onclick="show_muonsach({VIEW.id})">
                                Xem
                            </button>
                        </p>
                    </td>
                </tr>
                <!-- END: loop -->
            </tbody>
        </table>
    </div>
</form>
<div id="modal_show_muonsach" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 100%;max-width: 900px">
        <div class="modal-content">
            <div class="modal-body" id="body_modal"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function change_sach_duyet_khong_duyet(muonsach_id,status){
        var data='mod=change_sach_duyet_khong_duyet&muonsach_id='+muonsach_id+'&status='+status
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax',data, function(res) {
            var res=JSON.parse(res)
            if(res.status=='OK'){
                alert(res.mess)
                location.reload()
            }
        })
    }
    function tra_sach(muonsach_id){
        var check=confirm('Bạn có chắc là người này đã trả sách không?')
        if(check){
            var data='mod=tra_sach&muonsach_id='+muonsach_id
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax',data, function(res) {
                var res=JSON.parse(res)
                if(res.status=='OK'){
                    alert(res.mess)
                    location.reload()
                }
            })
        }
    }
    function show_muonsach(muonsach_id){
        var data='mod=show_muonsach&muonsach_id='+muonsach_id
        $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax',data, function(res) {
            var res=JSON.parse(res)
            if(res.status=='OK'){
                $('#body_modal').html(res.html)
                $('#modal_show_muonsach').modal('show')
            }
        })
    }
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
</script>
<!-- END: main -->