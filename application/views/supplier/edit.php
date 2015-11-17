<div class="row">
<form class="form-horizontal">
<div class="alert alert-info">
<label class="col-sm-2 input-medium">供应商名称</label>
<input type="text" class="form-control form-control-static input-medium" id="name" value="<?= isset($name) ? $name : ''; ?>">
</div>
<div class="alert alert-info">
<label class="col-sm-2 input-medium">供应商住址</label>
<input type="text" class="form-control form-control-static input-medium" id="address" value="<?= isset($address) ? $address : ''; ?>">
</div>
<div class="alert alert-info">
<label class="col-sm-2 input-medium">供应商电话</label>
<input type="text" class="form-control form-control-static input-medium" id="fixed_line" value="<?= isset($fixed_line) ? $fixed_line : ''; ?>">
</div>
<div class="alert alert-info">
<label class="col-sm-2 input-medium">联系人</label>
<input type="text" class="form-control form-control-static input-medium" id="linkman" value="<?= isset($linkman) ? $linkman : ''; ?>">
</div>
<div class="alert alert-info">
<label class="col-sm-2 input-medium">联系人号码</label>
<input type="text" class="form-control form-control-static input-medium" id="linkman_mobile" value="<?= isset($linkman_mobile) ? $linkman_mobile : ''; ?>">
</div>
<div class="col-md-offset-5">
<a href="javascript:;" id="<?= empty($id) ? 'add' : 'update' ?>" name = "save" class="btn btn-lg green">保存</a>&emsp;
<a href="javascript:;" name="return" class="btn btn-lg green">返回</a>
</div>
</form>
</div>
<script>
$("a[name='save']").unbind().on("click",function() {
	var url = "supplier/" + $(this).attr("id");
	$.ajax({
            type : "POST",
            cache : false,
            url : url,
            dataType : "html",
			data:{
				<?= isset($id)?"id:{$id},":"";?>
				name:$('#name').val(),
				address:$('#address').val(),
				fixed_line:$('#fixed_line').val(),
				linkman:$('#linkman').val(),
				linkman_mobile:$('#linkman_mobile').val()
			},
            success : function(res) {
                alert("操作成功！");
				create_ajax("supplier/index","",$("#content"));
            },
            error : function(xhr, ajaxOptions, thrownError) {
                alert("操作失败！");
            }
        });
});
$("a[name='return']").unbind().on("click",function() {
	create_ajax("supplier/index","",$("#content"));
});
</script>