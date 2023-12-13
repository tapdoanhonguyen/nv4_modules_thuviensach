<!-- BEGIN: main -->
<div class="col-xs-24 col-sm-24 col-md-24 col-lg-24">
    <h2>
        Tổng số lượng sách: {tong}
    </h2>
</div>


<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-left" style="vertical-align: middle;">
                    Tên danh mục        
                </th>
                <th class=" text-left" style="vertical-align: middle;">
                    Số lượng sách
                </th>

            </tr>
        </thead>
        <tbody>
            <!-- BEGIN: loop -->
            <tr>
                <td class="text-left" style="vertical-align: middle;"> 
                    {DATA.name_cat} 
                </td>
                <td class="text-left" style="vertical-align: middle;"> 
                    {DATA.so_luong} 
                </td>
            </tr>
            <!-- END: loop -->
        </tbody>
    </table>
</div>
<!-- END: main -->