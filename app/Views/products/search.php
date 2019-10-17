
<section class="on-sale">
    <div class="container">
        <div class="title-box">
            <h2>On Sale</h2>
        </div>
            <h1><?= $key ?></h1>
        <div class="row">
            <?php foreach($products as $product): ?>

            <div class="col-md-3">
                <div class="product-top">
                    <a href="?p=product&pid=<?= $product->getPid() ?>"><img src="<?= $product->getProduct_img() ?>" alt=""></a>
                    <div class="overlay-right">
                        <button type="button" title="Quick Shop" class="btn btn-secondary">
                            <i class="fa fa-eye"></i>
                        </button>
                        <button type="button" title="Add to Wishlist" class="btn btn-secondary">
                            <i class="fa fa-heart-o"></i>
                        </button>
                        <a href="?p=products&add=<?= $product->getPid() ?>" title="Add to Cart" class="btn btn-secondary">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="product-bottom text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <h3><?= $product->getProduct_name() ?></h3>
                    <h5><?= $product->getProduct_price() ?></h5>
                </div>
            </div>

            <?php endforeach ?>
        </div>
    </div>
</section>
<?php $link = "?search=" . $key; ?>
<div class="col text-center">
    <?= $pagination->previousLink($link); ?>
    <?= $pagination->nextLink($link); ?>
</div>


 

