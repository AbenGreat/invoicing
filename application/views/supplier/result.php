<div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>供应商ID</th>
                                            <th>供应商名称</th>
											<th>供应商地址</th>
                                            <th>供应商电话</th>
                                            <th>联系人</th>
                                            <th>联系人号码</th>											
											<th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($datas as $data): ?>
                                        <tr>
                                            <td><?= $data->id?></td>
                                            <td><?= $data->name?></td>
                                            <td><?= $data->address?></td>
                                            <td><?= $data->fixed_line?></td>
                                            <td><?= $data->linkman?></td>
                                            <td><?= $data->linkman_mobile?></td>
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
    create_ajax("supplier/edit",{
	    id:$(this).attr("data-id")
		},$("#content"));
	});
$("a[name='remove']").unbind().on("click",function() {
    create_ajax("supplier/remove",{
	    id:$(this).attr("data-id")
		},$("#content"));
	});
</script>