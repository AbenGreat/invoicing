<div class="row">
	<div class="col-md-12">
		<div class="fa-item">
		    <input type="text" name="id" value="" placeholder="商品ID" class="input-medium form-control search-query form-control-static ">
			<input type="text" name="name" value="" placeholder="商品名称" class="input-medium form-control search-query form-control-static ">
			<input type="text" name="type" value="" placeholder="商品类型" class="input-medium form-control search-query form-control-static ">
			<input type="button" value="搜索" class="btn green-meadow input-medium" id="search" />
			<input type="button" value="创建商品" class="btn red-intense input-medium" id="create" />
		</div>
	</div>
</div>
<script>
$("#search").unbind().on("click",function() {
    create_ajax("goods/page",{
	    conditions:{
			id:$("input[name='id']").val(),
			name:$("input[name='name']").val(),
			type:$("input[name='type']").val()
		}
		});
	});
$("#create").unbind().on("click",function() {
    create_ajax("goods/edit",{},$("#content"));
	});
</script>