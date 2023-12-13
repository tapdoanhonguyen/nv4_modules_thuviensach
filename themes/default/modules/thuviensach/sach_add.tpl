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
        <form class="form-horizontal" action="{NV_BASE_SITEURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{ROW.id}" />
            <div class="form-group">
                <label class="col-sm-5 col-md-4 "><strong>{LANG.nhaxuatban_id}</strong> <span class="red">(*)</span></label>
                <div class="col-sm-19 col-md-20">
                    <select class="form-control nhaxuatban_id" name="nhaxuatban_id" oninvalid="setCustomValidity('Vui lòng chọn nhà xuất bản')" oninput="setCustomValidity('')" required="required">
                        <option value="{ROW.nhaxuatban_id}">{ROW.nhaxuatban_name}</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 "><strong>{LANG.tacgia_id}</strong> <span class="red">(*)</span></label>
                <div class="col-sm-19 col-md-20">
                    <select class="form-control tacgia_id" name="tacgia_id" oninvalid="setCustomValidity('Vui lòng chọn tác giả')" oninput="setCustomValidity('')" required="required">
                        <option value="{ROW.tacgia_id}">{ROW.tacgia_name}</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 "><strong>{LANG.danhmuc_id}</strong> <span class="red">(*)</span></label>
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
                <label class="col-sm-5 col-md-4 "><strong>{LANG.name_sach}</strong> <span class="red">(*)</span></label>
                <div class="col-sm-19 col-md-20">
                    <input class="form-control" type="text" name="name_sach" value="{ROW.name_sach}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 "><strong>{LANG.image}</strong></label>
                <div class="col-sm-19 col-md-20">
                    <div class="input-group">
                        <input class="form-control required" type="text" name="image" value="{ROW.image}" id="id_image" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" readonly="" />
                        <div class="input-group-btn">
                            <button class="btn btn-primary selectfile" onclick="$('#upload_fileupload_image').click();" type="button">
                                <em class="fa fa-folder-open-o fa-fix">&nbsp;</em> 
                                Chọn
                            </button>
                            <input type="file" accept=".png, .jpg" name="upload_fileupload_image" id="upload_fileupload_image" style="display: none">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 "><strong>{LANG.price}</strong> <span class="red">(*)</span></label>
                <div class="col-sm-19 col-md-20">
                    <input class="form-control" type="text" name="price" value="{ROW.price}" required="required" onkeyup="this.value=FormatNumber(this.value)" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 col-md-4 "><strong>{LANG.description}</strong></label>
                <div class="col-sm-19 col-md-20">
                    {ROW.description}        
                </div>
            </div>
            <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
        </form>
    </div>
</div>

<script type="text/javascript">

    $('#danhmuc_id').select2({
        placeholder:"Vui lòng chọn danh mục"
    })
    $('.nhaxuatban_id').select2({
        placeholder: "Vui lòng chọn nhà xuất bản",
        ajax: {
            url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
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
            url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
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
    $('#upload_fileupload_image').change(function () {
        var name_file = $(this).val().slice(12)
        if(name_file!=''){
            $('#id_image').val('/{currentpath}/'+name_file);
            document.getElementById("id_image").setCustomValidity("");
        }else{
            $('#id_image').val($(this).val());
        }

    }); 
</script>


<!-- END: main -->