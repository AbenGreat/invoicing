<div class="row">
	<div class="col-md-12">
		<div class="fa-item">
		    <input type="text" name="id" value="" placeholder="用户ID" class="input-medium form-control search-query form-control-static ">
			<input type="text" name="name" value="" placeholder="用户名称" class="input-medium form-control search-query form-control-static ">
			<input type="text" name="role_id" value="" placeholder="角色ID" class="input-medium form-control search-query form-control-static ">
			<input type="button" value="搜索" class="btn green-meadow input-medium" id="search" />
			<input type="button" value="创建用户" class="btn red-intense input-medium" id="create" />
		</div>
	</div>
</div>
<script>
$("#search").unbind().on("click",function() {
    create_ajax("user/page",{
	    conditions:{
			id:$("input[name='id']").val(),
			name:$("input[name='name']").val(),
			role_id:$("input[name='role_id']").val()
		}
		});
	});
$("#create").unbind().on("click",function() {
    create_ajax("user/edit",{},$("#content"));
	});
</script>