<div class="container">
    <?php if(isset($msg)): ?>
        <div class="alert alert-success">
            <?= $msg ?>
        </div>
    <?php endif ?>
    <?php if(isset($product[0])): ?>
    <div class="col text-center">
        <img src="<?= $product[0]->getProduct_img() ?>" height="200" width="300"alt="<?= $product[0]->getProduct_name() ?>">
    </div>
    <form action="" method="post"  enctype="multipart/form-data">
    <input type="hidden" name="pid" value="<?= $product[0]->getPid() ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Date</label>
                <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label>Product Name</label>
                <input type="text" class="form-control" name="product_name" id="product_name" value="<?= $product[0]->getProduct_name() ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="select_cat" name="select_cat" required>
                <option value="<?= $product[0]->getCid() ?>" selected><?= $catname ?></option>
                <?php foreach($categories as $categorie): ?>
                <option value='<?= $categorie->getCid() ?>'><?= $categorie->getCategory_name() ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label>Brand</label>
            <select class="form-control" id="select_brand" name="select_brand" required>
                <option value="<?= $product[0]->getBid() ?>"><?= $brandname ?></option>
            <?php foreach($brands as $brand): ?>
                <option value='<?= $brand->getBid() ?>'><?= $brand->getBrand_name() ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="text" class="form-control" name="product_price" id="product_price" value="<?= $product[0]->getProduct_price() ?>" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" name="product_qty" id="product_qty" value="<?= $product[0]->getProduct_stock() ?>">
        </div>
            <div class="form-group">
                <label>Key words</label>
                <input type="text" class="form-control" name="product_key" id="product_key" value="<?= $product[0]->getProduct_key() ?>">
            </div>
           <div class="form-group">
                <label for="upload">Choisissez une image</label>
                <input type="file" name="upload" class="form-control" required>
            </div>
            <button type="submit" value="1" name="update" class="btn btn-success">Edit Product</button>
    </form>
    <?php else: ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Date</label>
                <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label>Product Name</label>
                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" required>
            </div>
            </div>
            <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="select_cat" name="select_cat" required>
                <?php foreach($categories as $categorie): ?>
                <option value='<?= $categorie->getCid() ?>'><?= $categorie->getCategory_name() ?></option>
                <?php endforeach ?>
            </select>
            </div>
            <div class="form-group">
            <label>Brand</label>
            <select class="form-control" id="select_brand" name="select_brand" required>
            <?php foreach($brands as $brand): ?>
                <option value='<?= $brand->getBid() ?>'><?= $brand->getBrand_name() ?></option>
                <?php endforeach ?>
            </select>
            </div>
            <div class="form-group">
            <label>Product Price</label>
            <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Enter Price of Product" required>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="text" class="form-control" name="product_qty" id="product_qty" placeholder="Enter Quantity">
            </div>
            <div class="form-group">
                <label>Key words</label>
                <input type="text" class="form-control" name="product_key" id="product_key" placeholder="Enter Product Key Words">
            </div>
            <div class="form-group">
                <label for="upload">Choisissez une image</label>
                <input type="file" name="upload" class="form-control">
            </div>
            <button type="submit" name="add" value="1"class="btn btn-success">Add Product</button>
    </form>
    <?php endif ?>
</div>