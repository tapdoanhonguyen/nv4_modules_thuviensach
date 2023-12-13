<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<!-- BEGIN: error -->
<div class="alert alert-warning">{ERROR}</div>
<!-- END: error -->
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post">
            <input type="hidden" name="id" value="{ROW.id}" />
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.nhaxuatban_id}</strong> <span class="red">(*)</span></label>
                <div class="col-sm-19 col-md-20">
                    <select class="form-control nhaxuatban_id" name="nhaxuatban_id" oninvalid="setCustomValidity('Vui lòng chọn nhà xuất bản')" oninput="setCustomValidity('')" required="required">
                        <option value="{ROW.nhaxuatban_id}">{ROW.nhaxuatban_name}</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.tacgia_id}</strong> <span class="red">(*)</span></label>
                <div class="col-sm-19 col-md-20">
                    <select class="form-control tacgia_id" name="tacgia_id" oninvalid="setCustomValidity('Vui lòng chọn tác giả')" oninput="setCustomValidity('')" required="required">
                        <option value="{ROW.tacgia_id}">{ROW.tacgia_name}</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.danhmuc_id}</strong> <span class="red">(*)</span></label>
                <div class="col-sm-19 col-md-20">
                    <select class="form-control" name="danhmuc_id" id="danhmuc_id">
                        <option value=""></option>
                        <!-- BEGIN: cat_listsub -->
                        <option value="{cat_listsub.value}" {cat_listsub.selected}>{cat_listsub.title}</option>
                        <!-- END: cat_listsub -->
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.name_sach}</strong> <span class="red">(*)</span></label>
                <div class="col-sm-19 col-md-20">
                    <input class="form-control" type="text" name="name_sach" value="{ROW.name_sach}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" placeholder="Nhập tên sách" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>Năm xuất bản</strong> </label>
                <div class="col-sm-19 col-md-20">
                    <input class="form-control" type="text" name="nam_xuat_ban" value="{ROW.nam_xuat_ban}" placeholder="Nhập năm xuất bản" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>Mô tả ngắn gọn</strong> </label>
                <div class="col-sm-19 col-md-20">
                    <textarea name="mo_ta_ngan_gon" placeholder="Nhập mô tả ngắn gọn" class="form-control" rows="3">{ROW.mo_ta_ngan_gon}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.alias}</strong> <span class="red">(*)</span></label>
                <div class="col-sm-19 col-md-18">
                    <input class="form-control" type="text" name="alias" value="{ROW.alias}" id="id_alias" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
                </div>
                <div class="col-sm-4 col-md-2">
                    <i class="fa fa-refresh fa-lg icon-pointer" onclick="nv_get_alias('id_alias');">&nbsp;</i>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.image}</strong></label>
                <div class="col-sm-19 col-md-20">
                    <div class="input-group">
                        <input class="form-control" type="text" name="image" value="{ROW.image}" id="id_image" />
                        <span class="input-group-btn">
                            <button class="btn btn-default selectfile" type="button" >
                                <em class="fa fa-folder-open-o fa-fix">&nbsp;</em>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>File pdf</strong></label>
                <div class="col-sm-19 col-md-20">
                    <div class="input-group">
                        <input class="form-control" type="text" name="pdf" value="{ROW.pdf}" id="id_pdf" />
                        <span class="input-group-btn">
                            <button class="btn btn-default selectfilepdf" type="button" >
                                <em class="fa fa-folder-open-o fa-fix">&nbsp;</em>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.price}</strong></label>
                <div class="col-sm-19 col-md-20">
                    <input class="form-control" type="text" name="price" value="{ROW.price}" onkeyup="this.value=FormatNumber(this.value)" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 control-label"><strong>{LANG.description}</strong></label>
                <div class="col-sm-19 col-md-20">
                    {ROW.description}        
                </div>
            </div>
            <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function nv_get_alias(id) {
        var title = strip_tags($("[name='name_sach']").val());
        if (title != '') {
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&nocache=' + new Date().getTime(), 'get_alias_title=' + encodeURIComponent(title), function(res) {
                $("#"+id).val(strip_tags(res));
            });
        }
        return false;
    }
    $(".selectfile").click(function() {
        var area = "id_image";
        var path = "{NV_UPLOADS_DIR}/{MODULE_UPLOAD}";
        var currentpath = "{NV_UPLOADS_DIR}/{MODULE_UPLOAD}/sach/";
        var type = "image";
        nv_open_browse(script_name + "?" + nv_name_variable + "=upload&popup=1&area=" + area + "&path=" + path + "&type=" + type + "&currentpath=" + currentpath, "NVImg", 850, 420, "resizable=no,scrollbars=no,toolbar=no,location=no,status=no");
        return false;
    });
    $(".selectfilepdf").click(function() {
        var area = "id_pdf";
        var path = "{NV_UPLOADS_DIR}/{MODULE_UPLOAD}";
        var currentpath = "{NV_UPLOADS_DIR}/{MODULE_UPLOAD}/";
        var type = "file";
        nv_open_browse(script_name + "?" + nv_name_variable + "=upload&popup=1&area=" + area + "&path=" + path + "&type=" + type + "&currentpath=" + currentpath, "NVImg", 850, 420, "resizable=no,scrollbars=no,toolbar=no,location=no,status=no");
        return false;
    });
    <!-- BEGIN: auto_get_alias -->
    $("[name='name_sach']").change(function() {
        nv_get_alias('id_alias');
    });
    <!-- END: auto_get_alias -->
    $('#danhmuc_id').select2({
        placeholder:"Vui lòng chọn danh mục"
    })
    $('.nhaxuatban_id').select2({
        placeholder: "Vui lòng chọn nhà xuất bản",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_nhaxuatban',
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
    $('.tacgia_id').select2({
        placeholder: "Vui lòng chọn tác giả",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_tacgia',
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

</script>


<!-- END: main -->