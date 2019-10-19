
<div>
<div class="side-menu" id="side-menu">
    <h2>Categories</h2>
    <ul>
        <?php foreach($categories as $categorie): ?>
        <li><a href="?p=category&id=<?= $categorie->getCid() ?>"><?= $categorie->getCategory_name() ?></a></li> 
        <?php endforeach ?>
    </ul>
    <hr>
    <ul>
        <h2>Brands</h2>
        <?php foreach($brands as $brand): ?>
            <li><a href="?p=brand&id=<?= $brand->getBid() ?>"><?= $brand->getBrand_name() ?></a></li> 
        <?php endforeach ?>
    </ul>
</div>


<section class="single-product">
    <div class="container">
        <div class="row">
            <?php foreach($brandsId as $brandId): ?>           
            <div class='col-md-3'>
                <div class='product-top'>
                    <a href='?p=product&pid=<?= $brandId->getPid() ?>'><img src='<?= $brandId->getProduct_img() ?>' width='200' height='200' alt=''></a>
                    <div class='overlay-right'>
                        <button type='button' title='Quick Shop' class='btn btn-secondary'>
                            <i class='fa fa-eye'></i>
                        </button>
                        <button type='button' title='Add to Wishlist' class='btn btn-secondary'>
                            <i class='fa fa-heart-o'></i>
                        </button>
                        <a href="?p=brand&id=<?= $brandId->getBid() ?>&add=<?= $brandId->getPid() ?>" title='Add to Cart' class='btn btn-secondary'>
                            <i class='fa fa-shopping-cart'></i>
                        </a>
                    </div>
                </div>
                <div class='product-bottom text-center'>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star-half-o'></i>
                    <h3><?= $brandId->getProduct_name() ?></h3>
                    <h4></h4>
                    <h5><?= $brandId->getProduct_price() ?></h5>
                </div>
            </div>
            <?php endforeach ?>

            <div class="col text-center">
            <?php if(empty($brandsId)): ?>
                <h3>There is no product in this brand for the moment</h3>
            <?php endif ?>
            </div>
        </div>
    </div>
</section>
<?php
$id = htmlentities($_GET['id']);
$link = "?p=brand&id=$id"; ?>
    <div class="col text-center my-6">
        <?= $pagination->previousLink($link); ?>
        <?= $pagination->nextLink($link); ?>
    </div>
</div>