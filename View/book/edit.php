<h2 xmlns="http://www.w3.org/1999/html">Cập nhật sách</h2>
<form method="post" action="./book.php?page=edit">
    <input type="hidden" name="id" value="<?php echo $book->id; ?>"/>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $book->name; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea type="text" name="description" value="<?php echo $book->description; ?>" class="form-control"/></textarea>
    </div>
    <div class="form-group">
        <label>Danh mục</label>
        <select name="category_id" class="form-control">
            <?php foreach ($categories as $type): ?>
                <option <?php
                if ($type->id == $book->category_id){
                    echo "selected";
                }
                ?> value="<?php echo $type->id; ?>"><?php echo $type->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" value="Cập nhật" class="btn btn-primary"/>
        <a href="./book.php" class="btn btn-default">Hủy</a>
    </div>
</form>