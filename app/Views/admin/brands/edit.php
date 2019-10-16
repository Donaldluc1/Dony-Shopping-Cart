<div class="container">
    <?php if(isset($msg)): ?>
        <div class="alert alert-success">
            <?= $msg ?>
        </div>
    <?php endif ?>
    <?php if(isset($brand)): ?>
    <form action="" method="post">
    <input type="hidden" name="bid" value="<?= $brand->getBid() ?>">
        <div class="form-row">
           <div class="form-group col">
                <label>Brand Name</label>
                <input type="text" class="form-control" name="brand_name" id="brand_name" value="<?= $brand->getBrand_name() ?>" required>
            </div>
        </div>
            <button type="submit" value="1" name="editBrand" class="btn btn-success">Edit Brand</button>
    </form>
    <?php else: ?>
    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col">
                <label>Brand Name</label>
                <input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Enter Brand Name" required>
            </div>
        </div>
            <button type="submit" name="addBrand" value="1"class="btn btn-success">Add Brand</button>
    </form>
    <?php endif ?>

</div>
