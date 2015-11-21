<div class="row">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>仓库ID</th>
                    <th>仓库名称</th>
                    <th>仓库地址</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
               <?php foreach($datas as $data): ?>
                <tr>
                    <td><?= $data->id?></td>
                    <td><?= $data->name?></td>
                    <td><?= $data->address?></td>
                    <td><a name="edit" class = "btn ajax_get" data-url = "/warehouse/edit?id=<?= $data->id;?>">编辑</a><a name="remove" class = "btn ajax_get" data-url = "/warehouse/remove?id=<?= $data->id;?>"> 删除</a></td>
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