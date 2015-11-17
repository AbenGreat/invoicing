<div class="row">
<form class="form-horizontal">
<div class="alert alert-info">
<label class="col-sm-2 input-medium">仓库名称</label>
<input type="text" class="form-control form-control-static input-medium" id="name" value="<?= isset($name) ? $name : ''; ?>">
</div>
<div class="alert alert-info">
<label class="col-sm-2 input-medium">仓库地址</label>
<input type="text" class="form-control form-control-static input-medium" id="address" value="<?= isset($address) ? $address : ''; ?>">
</div>
<div class="col-md-offset-5">
<a href="javascript:;" id="<?= empty($id) ? 'add' : 'update' ?>" name = "save" class="btn btn-lg green">保存</a>&emsp;
<a href="javascript:;" name="return" class="btn btn-lg green">返回</a>
</div>
</form>
</div>
<script>
$("a[name='save']").unbind().on("click",function() {
	var url = "warehouse/" + $(this).attr("id");
	$.ajax({
            type : "POST",
            cache : false,
            url : url,
            dataType : "html",
			data:{
				<?= isset($id)?"id:{$id},":"";?>
				name:$('#name').val(),
				address:$('#address').val(),
			},
            success : function(res) {
                alert("操作成功！");
				create_ajax("warehouse/index","",$("#content"));
            },
            error : function(xhr, ajaxOptions, thrownError) {
                alert("操作失败！");
            }
        });
});
$("a[name='return']").unbind().on("click",function() {
	create_ajax("warehouse/index","",$("#content"));
});
</script>