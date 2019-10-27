$("#ins_form1").on("click",function(){
    $("#act_form").val("ins_new")
    $("#ids_upd").val("")
    $("#prd_nm_ins").val("")
    $("#prd_prc_ins").val("")
    $("#body_form_prd").css('display','block')
    $("#del_areas").css('display','none')
    $("#mod_ins_form1").modal('show')
})

$("#sbmt_ins_prd").on('click',function(){
    $("#form_prd_ins").trigger("submit")
})

$("#prod_tables").on('click','.upd_btn',function(){
    var curr_row = $(this).closest('tr')
    var col1 = curr_row.find("th:eq(0) .cls_ids").val()
    var col2 = curr_row.find("td:eq(0)").text()
    var col3 = curr_row.find("td:eq(1)").text()
    $("#act_form").val("upd_dat")
    $("#ids_upd").val(col1)
    $("#prd_nm_ins").val(col2)
    $("#prd_prc_ins").val(col3)
    $("#body_form_prd").css('display','block')
    $("#del_areas").css('display','none')
    $("#mod_ins_form1").modal('show')
})

$("#prod_tables").on('click','.del_btn',function(){
    var curr_row = $(this).closest('tr')
    var col1 = curr_row.find("th:eq(0) .cls_ids").val()
    var col2 = curr_row.find("td:eq(0)").text()
    $("#act_form").val("del_dat")
    $("#ids_upd").val(col1)
    $("#prd_nm_ins").val("")
    $("#prd_prc_ins").val("")
    $("#body_form_prd").css('display','none')
    $("#del_areas").css('display','block')
    $("#del_areas span").html('<b>"'+col2+'"</b>')
    $("#mod_ins_form1").modal('show')
})

//customer script
$("#sbmt_cust").on('click',function(){
    $("#form_cust").trigger("submit")
})

$("#ins_form2").on("click",function(){
    $("#act_form2").val("ins_cust")
    $("#id_cust").val("")
    $("#cust_nms").val("")
    $("#cust_addr").val("")
    $("#body_form_cust").css('display','block')
    $("#del_areas_cust").css('display','none')
    $("#mod_cust").modal('show')
})

$("#cust_table").on('click','.upd_btn',function(){
    var curr_row = $(this).closest('tr')
    var col1 = curr_row.find("th:eq(0) .cls_ids").val()
    var col2 = curr_row.find("td:eq(0)").text()
    var col3 = curr_row.find("td:eq(1)").text()
    $("#act_form2").val("upd_cust")
    $("#id_cust").val(col1)
    $("#cust_nms").val(col2)
    $("#cust_addr").val(col3)
    $("#body_form_cust").css('display','block')
    $("#del_areas_cust").css('display','none')
    $("#mod_cust").modal('show')
})

$("#cust_table").on('click','.del_btn',function(){
    var curr_row = $(this).closest('tr')
    var col1 = curr_row.find("th:eq(0) .cls_ids").val()
    var col2 = curr_row.find("td:eq(0)").text()
    $("#act_form2").val("del_cust")
    $("#id_cust").val(col1)
    $("#cust_nms").val("")
    $("#cust_addr").val("")
    $("#body_form_cust").css('display','none')
    $("#del_areas_cust").css('display','block')
    $("#del_areas_cust span").html('<b>"'+col2+'"</b>')
    $("#mod_cust").modal('show')
})

$("#ins_order").on('click',function(){
    $("#sale_ord_mod").modal('show')
})

$("#sbmt_ins_sale").on('click',function(){
    $("#prd_hid").val($("#prd_name_sale").val())
    $("#sale_form").trigger('submit')
})

$(".selectpicker").selectpicker()