<div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>客户ID</th>
                                            <th>客户名称</th>
											<th>客户地址</th>
                                            <th>客户电话</th>									
											<th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($datas as $data): ?>
                                        <tr>
                                            <td><?= $data->id?></td>
                                            <td><?= $data->name?></td>
                                            <td><?= $data->address?></td>
                                            <td><?= $data->mobile?></td>
											<td><a name="edit" class = "btn" data-id="<?= $data->id?>">编辑</a><a class = "btn" name="remove" data-id="<?= $data->id?>"> 删除</a></td>
                                        </tr>
										<?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
						<div class="row">
						<?php print_r($pages);?>
						</div>
						<script>
$("a[name='edit']").unbind().on("click",function() {
    create_ajax("customer/edit",{
	    id:$(this).attr("data-id")
		},$("#content"));
	});
$("a[name='remove']").unbind().on("click",function() {
    create_ajax("customer/remove",{
	    id:$(this).attr("data-id")
		},$("#content"));
	});
</script>