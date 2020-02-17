<h2>Cập nhật danh mục</h2>
<form method="post" action="./book.php?page=edit">
    <input type="hidden" name="id" value="<?php echo $book->id; ?>"/>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $book->name; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <input type="text" name="description" value="<?php echo $book->description; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Danh mục</label>
        <select name="category_id" class="form-control">
            <?php foreach ($categories as $type): ?>
                <option value="<?php echo $type->id; ?>"><?php echo $type->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form>