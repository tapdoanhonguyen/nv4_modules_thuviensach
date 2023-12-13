<!-- BEGIN: main -->
<style type="text/css">
    .full input{
        width: 100% !important;
    }
</style>
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
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover full">
                    <colgroup>
                        <col style="width:150px" />
                        <col />
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="text-center" style="vertical-align: middle;">
                                <strong>{LANG.name_thuvien}</strong> 
                                <span class="red">(*)</span>
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                <input class="form-control" type="text" name="name_thuvien" value="{ROW.name_thuvien}" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="vertical-align: middle;">
                                <strong>{LANG.alias}</strong> 
                                <span class="red">(*)</span>
                            </td>
                            <td class="text-center" style="display: flex;vertical-align: middle;">
                                <input class="form-control" type="text" name="alias" value="{ROW.alias}" id="id_alias" required="required" oninvalid="setCustomValidity(nv_required)" oninput="setCustomValidity('')" />
                                <i class="fa fa-refresh fa-lg icon-pointer" onclick="nv_get_alias('id_alias');" style="margin-left: 7px;">&nbsp;</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="vertical-align: middle;">
                                <strong>Địa chỉ</strong> 
                                <span class="red">(*)</span>
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <select class="form-control provinceid" name="provinceid" onchange="change_province(this)" required=""  oninvalid="setCustomValidity('Vui lòng chọn tỉnh thành')" oninput="setCustomValidity('')">
                                        <option value="{ROW.provinceid}">
                                            {ROW.provinceid_name}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <select class="form-control districtid" name="districtid" required="" oninvalid="setCustomValidity('Vui lòng chọn quận huyện')" oninput="setCustomValidity('')">
                                        <option value="{ROW.districtid}">
                                            {ROW.districtid_name}
                                        </option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="vertical-align: middle;">
                                <strong>{LANG.userid_quanly}</strong> 
                                <span class="red">(*)</span>
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                <select class="form-control userid_quanly" name="userid_quanly" required="" oninvalid="setCustomValidity('Vui lòng chọn người quản lý')" oninput="setCustomValidity('')">
                                    <option value="{ROW.userid_quanly}">
                                        {ROW.userid_quanly_name}
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="vertical-align: middle;">
                                <strong>{LANG.description}</strong> 
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                             {ROW.description}  
                         </td>
                     </tr>
                     <tr>
                        <td class="text-center" style="vertical-align: middle;">
                            <strong>Địa chỉ</strong> 
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            <input class="form-control" placeholder="Nhập địa chỉ" name="dia_chi" value="{ROW.dia_chi}">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group" style="text-align: center"><input class="btn btn-primary" name="submit" type="submit" value="{LANG.save}" /></div>
    </form>
</div>
</div>

<script type="text/javascript">
    function nv_get_alias(id) {
        var title = strip_tags($("[name='name_thuvien']").val());
        if (title != '') {
            $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '={OP}&nocache=' + new Date().getTime(), 'get_alias_title=' + encodeURIComponent(title), function(res) {
                $("#"+id).val(strip_tags(res));
            });
        }
        return false;
    }
    <!-- BEGIN: auto_get_alias -->
    $("[name='name_thuvien']").change(function() {
        nv_get_alias('id_alias');
    });
    <!-- END: auto_get_alias -->
    $('.provinceid').select2({
        placeholder: "Vui lòng chọn tỉnh thành",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_province',
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
    $('.userid_quanly').select2({
        placeholder: "Vui lòng chọn nhân viên",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_user_thuvien',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term,
                    id:{ROW.id}
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
    <!-- BEGIN: no_district -->
    $('.districtid').select2({
        placeholder: "Vui lòng chọn tỉnh thành trước"
    })
    <!-- END: no_district -->
    <!-- BEGIN: district -->
    $('.districtid').select2({
        placeholder: "Vui lòng chọn quận huyện",
        ajax: {
            url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
            '=ajax&mod=get_district',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                var query = {
                    q: params.term,
                    provinceid:{ROW.provinceid}
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
    <!-- END: district -->
    function change_province(a){
        var provinceid=$(a).val()
        $('.districtid').empty()
        $('.districtid').select2({
            placeholder: "Vui lòng chọn quận huyện",
            ajax: {
                url: script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable +
                '=ajax&mod=get_district',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    var query = {
                        q: params.term,
                        provinceid:provinceid
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
    }
</script>
<!-- END: main -->