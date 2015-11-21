<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>采购入库订单ID</th>
                    <th>供应商ID</th>
                    <th>仓库ID</th>
                    <th>操作人ID</th>
                    <th>订单状态</th>
                    <th>订单创建时间</th>
                    <th>订单完成时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datas as $data): ?>
                    <tr>
                        <td><?= $data->id?></td>
                        <td><?= $data->supplier_id?></td>
                        <td><?= $data->warehouse_id?></td>
                        <td><?= $data->user_id?></td>
                        <td><?= $data->status?></td>
                        <td><?= $data->created?></td>
                        <td><?= $data->finished?></td>
                        <td><a class = "btn ajax_get" name="details" data-url = "/purchase_in/details?<?= $data->id?>">详情</a><a name="edit" class = "btn ajax_get" data-url = "/purchase_in/edit?id=<?= $data->id;?>">编辑</a><a name="remove" class = "btn ajax_get" data-url = "/purchase_in/remove?id=<?= $data->id;?>"> 删除</a></td>
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
    bind_ajax();
</script>