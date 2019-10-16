<div class="container">
    <?php if(isset($msg)): ?>
        <div class="alert alert-success">
            <?= $msg ?>
        </div>
    <?php endif ?>
    <?php if(isset($category)): ?>
    <form action="" method="post"  enctype="multipart/form-data">
    <input type="hidden" name="cid" value="<?= $category->getCid() ?>">
        <div class="form-row">
           <div class="form-group col-md-6">
                <label>Category Name</label>
                <input type="text" class="form-control" name="category_name" id="category_name" value="<?= $category->getCategory_name() ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label>Parent Cat</label>
                <select name="parentCat" id="parentCat" class="form-control">
                    <option value="<?= $category->getParent_cat() ?>"></option>
                    <?php foreach($categories as $categori): ?>
                    <?php if($category->getParent_cat() === $categori->getCid()): ?>
                        <option value="<?= $categori->getCid() ?>" selected><?= $categori->getCategory_name() ?></option>
                    <?php else: ?>
                    <option value="<?= $categori->getCid() ?>"><?= $categori->getCategory_name() ?></option>
                    <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
            <button type="submit" value="1" name="editCat" class="btn btn-success">Edit Category</button>
    </form>
    <?php else: ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Category Name</label>
                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name" required>
            </div>
            <div class="form-group col-md-6">
                <label>Select Parent</label>
                <select  class="form-control" name="parentCat" id="parentCat" required>
                    <option value="0"></option>
                    <?php foreach($categories as $categori): ?>
                        <option value="<?= $categori->getCid() ?>"><?= $categori->getCategory_name() ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
            <button type="submit" name="addCat" value="1"class="btn btn-success">Add Category</button>
    </form>
    <?php endif ?>

</div>
