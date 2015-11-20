<div class="row">
	<div class="col-md-12">
		<div class="fa-item">
		    <input type="text" name="id" value="" placeholder="采购入库订单ID" class="input-medium form-control search-query form-control-static ">
			<input type="text" name="supplier_id" value="" placeholder="供应商ID" class="input-medium form-control search-query form-control-static ">
			<input type="text" name="warehouse_id" value="" placeholder="仓库ID" class="input-medium form-control search-query form-control-static ">
			<input type="text" name="user_id" value="" placeholder="操作人ID" class="input-medium form-control search-query form-control-static ">
			<input type="button" value="搜索" class="btn green-meadow input-medium" id="search" />
			<input type="button" value="创建用户" class="btn red-intense input-medium" id="create" />
		</div>
	</div>
</div>
<script>
$("#search").unbind().on("click",function() {
    create_ajax("purchase_in/page",{
	    conditions:{
			id:$("input[name='id']").val(),
			supplier_id:$("input[name='supplier_id']").val(),
			warehouse_id:$("input[name='warehouse_id']").val(),
			user_id:$("input[name='user_id']").val()
		}
		});
	});
$("#create").unbind().on("click",function() {
    create_ajax("user/edit",{},$("#content"));
	});
</script>