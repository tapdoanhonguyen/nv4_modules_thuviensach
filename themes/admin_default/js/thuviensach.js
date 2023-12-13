/**
* @Project NUKEVIET 4.x
* @author Thạch Cảnh Bình <bnhthach@gmail.com>
* @Copyright (C) 2022 VINADES.,JSC. All rights reserved
* @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
* @Createdate Thu, 27 Oct 2022 01:18:43 GMT
*/

function search_number_sach(sach_id){
    var thuvien_id=$('#thuvien_id').val()
    var data='mod=show_number&sach_id='+sach_id+'&thuvien_id='+thuvien_id
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax',data, function(res) {
        var res=JSON.parse(res)
        if(res.status=='OK'){
            $('#body_number_sach').html(res.html)
        }
    });
}
function show_number(sach_id){
    var data='mod=show_number&sach_id='+sach_id
    $.post(script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=ajax',data, function(res) {
        var res=JSON.parse(res)
        if(res.status=='OK'){
            $('#body_number_sach').html(res.html)
            $('#modal_number_sach').modal('show')
        }
    });
}
function format_number(amount) {
    var delimiter = ",";
    var i = parseInt(amount);
    if (isNaN(i)) {
        return '';
    }
    var minus = '';
    if (i < 0) {
        minus = '-';
    }
    i = Math.abs(i);
    var n = new String(i);
    var a = [];
    while (n.length > 3) {
        var nn = n.substr(n.length - 3);
        a.unshift(nn);
        n = n.substr(0, n.length - 3);
    }
    if (n.length > 0) {
        a.unshift(n);
    }
    amount = a.join(delimiter);
    amount = minus + amount;
    return amount;
}

function FormatNumber(str) {
    str = str.toString();
    var strTemp = GetNumber(str);
    if (strTemp.length <= 3)
        return strTemp;
    strResult = "";
    for (var i = 0; i < strTemp.length; i++)
        strTemp = strTemp.replace(",", "");
    var m = strTemp.lastIndexOf(".");
    if (m == -1) {
        for (var i = strTemp.length; i >= 0; i--) {
            if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
                strResult = "," + strResult;
            strResult = strTemp.substring(i, i + 1) + strResult;
        }
    } else {
        var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
        var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."), strTemp.length);
        var tam = 0;
        for (var i = strphannguyen.length; i >= 0; i--) {
            if (strResult.length > 0 && tam == 4) {
                strResult = "," + strResult;
                tam = 1;
            }
            strResult = strphannguyen.substring(i, i + 1) + strResult;
            tam = tam + 1;
        }
        strResult = strResult + strphanthapphan;
    }
    return strResult;
}

function GetNumber(str) {
    var count = 0;
    for (var i = 0; i < str.length; i++) {
        var temp = str.substring(i, i + 1);
        if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
            return str.substring(0, i);
        }
        if (temp == " ")
            return str.substring(0, i);
        if (temp == ".") {
            if (count > 0)
                return str.substring(0, ipubl_date);
            count++;
        }
    }
    return str;
}

function IsNumberInt(str) {
    for (var i = 0; i < str.length; i++) {
        var temp = str.substring(i, i + 1);
        if (!(temp == "." || (temp >= 0 && temp <= 9))) {
            return str.substring(0, i);
        }
        if (temp == ",") {
            return str.substring(0, i);
        }
    }
    return str;
}