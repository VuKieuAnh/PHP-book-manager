<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Thêm mới sách</h1>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label>Tên sách</label>
                    <input type="text" class="form-control" name="name"  placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea type="text" class="form-control" name="description"  placeholder="Nhập mô tả" required></textarea>
                </div>
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="category_id" class="form-control">
                    <?php foreach ($categories as $type): ?>
                        <option value="<?php echo $type->id; ?>"><?php echo $type->name; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>
