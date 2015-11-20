<div class="row">
<form class="form-horizontal">
<div class="alert alert-info">
<label class="col-sm-2 input-medium">供应商ID</label>
<input type="text" class="form-control form-control-static input-medium" id="supplier_id" value="<?= isset($supplier_id) ? $supplier_id : ''; ?>">
</div>
<div class="alert alert-info">
<label class="col-sm-2 input-medium">仓库ID</label>
<input type="text" class="form-control form-control-static input-medium" id="warehouse_id" value="<?= isset($warehouse_id) ? $warehouse_id : ''; ?>">
</div>
<div class="col-md-offset-5">
<a href="javascript:;" id="<?= empty($id) ? 'add' : 'update' ?>" name = "save" class="btn btn-lg green">保存</a>&emsp;
<a href="javascript:;" name="return" class="btn btn-lg green">返回</a>
</div>
</form>
</div>
<script>
$("a[name='save']").unbind().on("click",function() {
	var url = "purchase_in/" + $(this).attr("id");
	$.ajax({
            type : "POST",
            cache : false,
            url : url,
            dataType : "html",
			data:{
				<?= isset($id)?"id:{$id},":"";?>
				name:$('#name').val(),
				mobile:$('#mobile').val(),
				role_id:$('#role_id').val(),
				password:$('#password').val()
			},
            success : function(res) {
                alert("操作成功！");
				create_ajax("purchase_in/index","",$("#content"));
            },
            error : function(xhr, ajaxOptions, thrownError) {
                alert("操作失败！");
            }
        });
});
$("a[name='return']").unbind().on("click",function() {
	create_ajax("purchase_in/index","",$("#content"));
});
</script>