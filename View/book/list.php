<h2>Danh sách sách</h2>
<div style="padding-top: 20px">
    <a href="./book.php?page=add">
        <button type="button" class="btn btn-info"> Thêm mới</button>
    </a>
    <div style="float: right">
        <form class="form-inline" method="get">
            <input hidden name="page" value="search"/>
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" name="nameSearch" class="form-control" placeholder="Nhập tên">
            </div>
            <button class="btn btn-primary mb-2" type="submit" value="search">Tìm kiếm
            </button>
        </form>
    </div>
</div>

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
        <td> <a href="./book.php?page=delete&id=<?php echo $book->id; ?>" class="btn btn-danger">Delete</a></td>
        <td> <a href="./book.php?page=edit&id=<?php echo $book->id; ?>" class="btn btn-sm">Update</a></td>
        <?php endforeach; ?>
    </tbody>
</table>