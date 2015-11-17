<div class="row">
	<div class="col-md-12">
		<div class="fa-item">
		    <input type="text" name="id" value="" placeholder="供应商ID" class="input-medium form-control search-query form-control-static ">
			<input type="text" name="name" value="" placeholder="供应商名称" class="input-medium form-control search-query form-control-static ">
			<input type="text" name="address" value="" placeholder="供应商地址" class="input-medium form-control search-query form-control-static ">
			<input type="text" name="linkman" value="" placeholder="供应商联系人" class="input-medium form-control search-query form-control-static ">
			<input type="button" value="搜索" class="btn green-meadow input-medium" id="search" />
			<input type="button" value="创建供应商" class="btn red-intense input-medium" id="create" />
		</div>
	</div>
</div>
<script>
$("#search").unbind().on("click",function() {
    create_ajax("supplier/page",{
	    conditions:{
			id:$("input[name='id']").val(),
			name:$("input[name='name']").val(),
			linkman:$("input[name='linkman']").val(),
			address:$("input[name='address']").val()
		}
		});
	});
$("#create").unbind().on("click",function() {
    create_ajax("supplier/edit",{},$("#content"));
	});
</script>