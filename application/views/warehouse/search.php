<div class="row">
	<div class="col-md-12">
		<div class="fa-item">
		    <input type="text" name="id" value="" placeholder="仓库ID" class="input-medium form-control search-query form-control-static ">
			<input type="text" name="name" value="" placeholder="仓库名称" class="input-medium form-control search-query form-control-static ">
			<input type="text" name="address" value="" placeholder="仓库地址" class="input-medium form-control search-query form-control-static ">
			<input type="button" value="搜索" class="btn green-meadow input-medium" id="search" />
			<input type="button" value="创建仓库" class="btn red-intense input-medium" id="create" />
		</div>
	</div>
</div>
<script>
$("#search").unbind().on("click",function() {
    create_ajax("warehouse/page",{
	    conditions:{
			id:$("input[name='id']").val(),
			name:$("input[name='name']").val(),
			address:$("input[name='address']").val()
		}
		});
	});
$("#create").unbind().on("click",function() {
    create_ajax("warehouse/edit",{},$("#content"));
	});
</script>