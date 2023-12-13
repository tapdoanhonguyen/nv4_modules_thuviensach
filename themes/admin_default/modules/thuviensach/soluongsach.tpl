<!-- BEGIN: main -->
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<link type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.js"></script>
<link href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css" type="text/css" rel="stylesheet" />
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title" style="float:left"><i class="fa fa-list"></i> 
            Số lượng sách {name_sach}
        </h3> 
        <div class="pull-right">
            <button title="Ẩn /Hiện tìm kiếm" id="vidoco_sea_id_modal" data-toggle="tooltip" data-placement="top" class="btn btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button> 
        </div>
        <div style="clear:both"></div>
    </div>
    <div class="well" id="vidoco_sea_modal">
        <form action="{NV_BASE_ADMINURL}index.php" id="formsearch" method="get">
            <input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}" />
            <input type="hidden" name="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
            <input type="hidden" name="{NV_OP_VARIABLE}" value="{OP}" />
            <div class="row">
                <div class="col-sm-24  col-md-24  col-lg-20">
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
                <div class="col-sm-24  col-md-24  col-lg-2">
                    <div class="form-group">
                        <button class="btn btn-primary" type="button" onclick="search_number_sach({sach_id})">
                            Tìm kiếm
                        </button>
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
                        Thư viện
                    </th>
                    <th class="text-center" style="vertical-align: middle;">
                        Số lượng
                    </th>
                </tr>
            </thead>
            <!-- BEGIN: generate_page -->
            <tfoot>
                <tr>
                    <td class="text-center" colspan="3">{NV_GENERATE_PAGE}</td>
                </tr>
            </tfoot>
            <!-- END: generate_page -->
            <tbody>
                <!-- BEGIN: loop -->
                <tr>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.stt} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.name_thuvien} 
                    </td>
                    <td class="text-center" style="vertical-align: middle;"> 
                        {VIEW.number} 
                    </td>
                </tr>
                <!-- END: loop -->
            </tbody>
        </table>
    </div>
</form>
<script type="text/javascript">
    $("#vidoco_sea_id_modal").click(function() {
        $("#vidoco_sea_modal").toggle();
    });
    $('#thuvien_id').select2({
        placeholder: "Tất cả thư viện",
        width:"100%",
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
</script>
<!-- END: main -->