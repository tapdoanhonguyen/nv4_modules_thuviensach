<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<!-- BEGIN: view -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title" style="float:left"><i class="fa fa-list"></i> 
         Yêu cầu đổi sách
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
                    <select id="status_search" name="status_search" class="form-control input-sm">
                        <!-- BEGIN: status_filt -->
                        <option value="{status_filt.id}" {status_filt.selected}>
                            {status_filt.text}
                        </option>
                        <!-- END: status_filt -->
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12  col-md-6  col-lg-6">
                <div class="form-group">
                    <input class="form-control" autocomplete="off" type="text" value="{Q}" name="q" maxlength="255"
                    placeholder="{LANG.ma_muonsach}, {LANG.name_muon}, {LANG.phone}, {LANG.email}" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12  col-md-2  col-lg-2">
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="{LANG.search_submit}" />
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<form action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="w100">{LANG.number}</th>
                    <th>
                        Sách
                    </th>
                    <th>
                        Sách đổi
                    </th>
                    <th>Thông tin người đổi</th>

                    <th>Thời gian yêu cầu</th>
                    <th>Tình trạng sách</th>
                    <th class="w100 text-center">{LANG.active}</th>
                </tr>
            </thead>
            <!-- BEGIN: generate_page -->
            <tfoot>
                <tr>
                    <td class="text-center" colspan="11">{NV_GENERATE_PAGE}</td>
                </tr>
            </tfoot>
            <!-- END: generate_page -->
            <tbody>
                <!-- BEGIN: loop -->
                <tr>
                    <td> {VIEW.number} </td>
                    <td class="text-center"> 
                        <a href="{VIEW.info_sach.link}">
                            <img src="{VIEW.info_sach.image}" alt="{VIEW.info_sach.name_sach}" title="{VIEW.info_sach.name_sach}" height="150">
                        </a>
                        <div>
                            {VIEW.info_sach.name_sach} 
                        </div>
                    </td>
                    <td> 
                        <!-- BEGIN: sach_doi -->
                        <div style="padding: 3px;border-radius: 3px;background-color: #F6EDED;margin-bottom: 3px;">
                            {SACH_DOI.stt}. {SACH_DOI.ten_sach} 
                        </div>
                        <!-- END: sach_doi -->
                    </td>
                    <td> 
                        <div>
                            {VIEW.ho_va_ten} 
                        </div>
                        <div>
                            SDT: <a href="tel:{VIEW.sdt}">{VIEW.sdt}</a>
                        </div>
                        <div>
                            Email: {VIEW.email} 
                        </div>
                        
                        <div>
                           CMND: {VIEW.cmnd} 
                       </div>
                   </td>

                   <td> {VIEW.time_add} </td>
                   <td> {VIEW.tinh_trang} </td>
                   <td class="text-center">
                    <!-- BEGIN: chua_dong_y -->
                    <button type="button" onclick="dong_y(1,{VIEW.id})" class="btn btn-primary">
                       Đồng ý đổi sách
                   </button>
                   <button type="button" onclick="dong_y(2,{VIEW.id})" class="btn btn-primary">
                    Không đồng ý
                </button>
                <!-- END: chua_dong_y -->
                <!-- BEGIN: dong_y -->
                <div>
                   Đã đổi sách
               </div>
               <!-- END: dong_y -->
               <!-- BEGIN: khong_dong_y -->
               <div>
                   Yêu cầu đổi sách này đã bị hủy
               </div>
               <!-- END: khong_dong_y -->
           </td>

       </tr>
       <!-- END: loop -->
   </tbody>
</table>
</div>
</form>
<!-- END: view -->
<script type="text/javascript">
    function dong_y(status,id) {
        $.ajax({
            type : 'POST',
            url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&mod=dong_y&status=' + status + '&id=' + id,
            contentType: false,
            processData: false,
            success : function(res){
                res2=JSON.parse(res);
                if(res2.status=="OK"){
                 alert(res2.text);
                 location.reload();

             }else{
                alert('Có lỗi xảy ra, vui lòng kiểm tra lại')

            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
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
</script>
<!-- END: main -->