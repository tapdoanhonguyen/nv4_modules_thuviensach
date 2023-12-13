<!-- BEGIN: main -->
<div>
    <form id="form_doi_sach">
        <input type="hidden" name="id_sach" value="{id_sach}">
        <input type="hidden" name="id_thu_vien" value="{id_thu_vien}">
        <p>
            <input type="" name="ho_va_ten" class="form-control" placeholder="Nhập họ và tên (*)">
        </p>
        <p>
            <input type="" name="sdt" class="form-control" placeholder="Nhập số điện thoại (*)">
        </p>
        <p>
            <input type="" name="email" class="form-control" placeholder="Nhập email (*)">
        </p>
        <p>
            <input type="" name="cmnd" class="form-control" placeholder="Nhập cmnd/cccd (*)">
        </p>
        <h2>
            Thông tin sách đổi
            <div class="red" style="font-size: 11px;margin-bottom: 10px;">
                Lưu ý: số lượng sách đổi tối thiểu là 2 cuốn
            </div>
        </h2>
        <div style="padding: 10px;border-radius: 5px;border: solid 1px #dcdcdc;margin-bottom: 10px;">
            <p>
                <input type="" name="ten_sach[]" class="form-control" placeholder="Nhập tên sách 1 (*)">
            </p>
            <p>
                <input type="" name="ten_sach[]" class="form-control" placeholder="Nhập tên sách 2 (*)">
            </p>
            <div id="box_them_sach" style="margin-bottom: 10px;">

            </div>
            <p>
             <textarea class="form-control" name="tinh_trang" rows="3" placeholder="Tình trạng sách"></textarea> 
         </p>
         <p>
            <button class="btn btn-primary" type="button" onclick="them_sach()">Thêm sách</button>
        </p>
    </div>
    <p>
        <button type="button" class="btn btn-primary" onclick="doi_sach()">Đăng ký đổi sách</button>
    </p>
</form>
</div>
<script type="text/javascript">
    function them_sach(){
        $('#box_them_sach').append('<p style="display: flex;"><input type="" name="ten_sach[]" class="form-control" placeholder="Nhập tên sách"><button type="button" class="btn btn-primary" onclick="xoa_ten_sach(this)">Xóa</button></p>');
    }
    function xoa_ten_sach(thiss) {
       $(thiss).parent().remove();
   }
   function doi_sach() {
    var form = new FormData($('#form_doi_sach')[0]);
    $.ajax({
        type : 'POST',
        url: nv_base_siteurl + 'index.php?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=detail&mod=send_doi_sach',
        data: form,
        contentType: false,
        processData: false,
        success : function(res){
            res2=JSON.parse(res);
            if(res2.status=="OK"){
                alert(res2.text);
                $('#modal_doi_sach').modal("hide");
            }else if(res2.status=="KO"){
                alert(res2.text);
            }else{
                alert('Có lỗi xảy ra, vui lòng kiểm tra lại')

            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}
</script>
<!-- END: main -->