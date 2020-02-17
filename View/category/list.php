<h2>Danh sách danh mục</h2>
<a href="./index.php?page=add">Thêm mới</a>
<table class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên Danh mục</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $key => $category): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $category->name ?></td>
        <td> <a href="./index.php?page=delete&id=<?php echo $category->id; ?>" class="btn btn-warning btn-sm">Delete</a></td>
        <td> <a href="./index.php?page=edit&id=<?php echo $category->id; ?>" class="btn btn-sm">Update</a></td>
        <?php endforeach; ?>
    </tbody>
</table>