<h1>Bạn chắc chắn muốn xóa sách này?</h1>
<h3><?php echo $book->name; ?></h3>
<form action="./book.php?page=delete" method="post">
    <input type="hidden" name="id" value="<?php echo $book->id; ?>"/>
    <div class="form-group">
        <input type="submit" value="Xóa" class="btn btn-danger"/>
        <a class="btn btn-default" href="./book.php">Hủy</a>
    </div>
</form>