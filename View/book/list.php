<h2>Danh sách danh mục</h2>
<a href="./book.php?page=add">Thêm mới</a>
<table class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên Sách</th>
        <th>Danh mục</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books as $key => $book): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $book->name ?></td>
        <td><?php echo $book->category_name ?></td>
        <td> <a href="./book.php?page=delete&id=<?php echo $book->id; ?>" class="btn btn-warning btn-sm">Delete</a></td>
        <td> <a href="./book.php?page=edit&id=<?php echo $book->id; ?>" class="btn btn-sm">Update</a></td>
        <?php endforeach; ?>
    </tbody>
</table>