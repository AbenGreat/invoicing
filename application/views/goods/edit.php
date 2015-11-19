<div class="row">
<form class="form-horizontal">
<div class="alert alert-info">
<label class="col-sm-2 input-medium">商品名称</label>
<input type="text" class="form-control form-control-static input-medium" id="name" value="<?= isset($name) ? $name : ''; ?>">
</div>
<div class="alert alert-info">
<label class="col-sm-2 input-medium">商品类型</label>
<input type="text" class="form-control form-control-static input-medium" id="type" value="<?= isset($type) ? $type : ''; ?>">
</div>
<div class="alert alert-info">
<label class="col-sm-2 input-medium">商品计划购入价格</label>
<input type="text" class="form-control form-control-static input-medium" id="coast_price" value="<?= isset($coast_price) ? $coast_price : ''; ?>">
</div>
<div class="alert alert-info">
<label class="col-sm-2 input-medium">商品计划出售价格</label>
<input type="text" class="form-control form-control-static input-medium" id="sale_price" value="<?= isset($sale_price) ? $sale_price : ''; ?>">
</div>
<div class="alert alert-info">
<label class="col-sm-2 input-medium">备注</label>
<input type="text" class="form-control form-control-static input-medium" id="remarks" value="<?= isset($remarks) ? $remarks : ''; ?>">
</div>
<div class="col-md-offset-5">
<a href="javascript:;" id="<?= empty($id) ? 'add' : 'update' ?>" name = "save" class="btn btn-lg green">保存</a>&emsp;
<a href="javascript:;" name="return" class="btn btn-lg green">返回</a>
</div>
</form>
</div>
<script>
$("a[name='save']").unbind().on("click",function() {
	var url = "goods/" + $(this).attr("id");
	$.ajax({
            type : "POST",
            cache : false,
            url : url,
            dataType : "html",
			data:{
				<?= isset($id)?"id:{$id},":"";?>
				name:$('#name').val(),
				type:$('#type').val(),
				price:$('#price').val(),
				remarks:$('#remarks').val()
			},
            success : function(res) {
                alert("操作成功！");
				create_ajax("goods/index","",$("#content"));
            },
            error : function(xhr, ajaxOptions, thrownError) {
                alert("操作失败！");
            }
        });
});
$("a[name='return']").unbind().on("click",function() {
	create_ajax("goods/index","",$("#content"));
});
</script>