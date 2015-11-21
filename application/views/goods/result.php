<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>商品ID</th>
                    <th>商品名称</th>
                    <th>商品类型</th>
                    <th>商品计划购入价格</th>
                    <th>商品计划出售价格</th>
                    <th>备注</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
               <?php foreach($datas as $data): ?>
                <tr>
                    <td><?= $data->id?></td>
                    <td><?= $data->name?></td>
                    <td><?= $data->type?></td>
                    <td><?= $data->coast_price?></td>
                    <td><?= $data->sale_price?></td>
                    <td><?= $data->remarks?></td>
                    <td><a name="edit" class = "btn ajax_get" data-url = "/goods/edit?id=<?= $data->id;?>">编辑</a><a name="remove" class = "btn ajax_get" data-url = "/goods/remove?id=<?= $data->id;?>"> 删除</a></td>
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