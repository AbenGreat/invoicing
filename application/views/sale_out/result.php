<div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>商品ID</th>
                                            <th>商品名称</th>
                                            <th>商品价格</th>
                                            <th>商品规格</th>
											<th>单位</th>
                                            <th>生产地</th>
											 <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($datas as $data): ?>
                                        <tr>
                                            <td><?= $data->ware_id?></td>
                                            <td><?= $data->name?></td>
                                            <td><?= $data->price?></td>
                                            <td><?= $data->specification?></td>
											<td><?= $data->unit?></td>
                                            <td><?= $data->product_place?></td>
											<td><a id="edit" data-id="<?= $data->ware_id?>">编辑</a><a id="delete" data-id="<?= $data->ware_id?>"> 删除</a></td>
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