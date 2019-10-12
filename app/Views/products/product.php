        <!------------------------Single Product---------------------->
        <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div id="product-slider" class="carousel slide carousel-fade" data-ride="carousel"> 
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= $product->getProduct_img() ?>"; height="420" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= $product->getProduct_img() ?>" height="420" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= $product->getProduct_img() ?>" height="420" class="d-block w-100" alt="">
                                </div>
                                <a href="#product-slider" role="button" data-slide="prev" class="carousel-control-prev">
                                    <span class="carousel-control-prev-icon"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a href="#product-slider" role="button" data-slide="next" class="carousel-control-next">
                                    <span class="carousel-control-next-icon"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                </div>
                <div class="col-md-7">
                    <p class="new-arrival text-center">New</p>
                    <h2><?= $product->getProduct_name() ?></h2>
                    <p>Product Code: IRSC2019</p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <p class="price"><?= $product->getProduct_price() ?></p>
                    <p><b>Availability:</b> In Stock</p>
                    <p><b>Condition:</b> New</p>
                    <p><b>Brand:</b> XWZ Company</p>
                    <label>Stock:</label>
                    <input type="text" value="<?= $product->getProduct_stock() ?>" readonly>
                    <button class="btn btn-primary" type="button">Add to Cart</button>
                </div>
            </div>
        </div>
    </section>

    <!----------------------Product-Description--------------------------->
    <section class="product-description">
        <div class="container">
            <h5>Product Description</h5>
            <p>
                Subscribe to Atangana Etoga Youtube Channel to watch more videos and press the bell icon to get immidiate
                notifications Subscribe to Atangana Etoga Youtube Channel to watch more videos and press the bell icon to get immidiate
                notifications Subscribe to Atangana Etoga Youtube Channel to watch more videos and press the bell icon to get immidiate
                notifications
            </p>
            <p>
                Subscribe to Atangana Etoga Youtube Channel to watch more videos and press the bell icon to get immidiate
                notifications Subscribe to Atangana Etoga Youtube Channel to watch more videos and press the bell icon to get immidiate
                notifications Subscribe to Atangana Etoga Youtube Channel to watch more videos and press the bell icon to get immidiate
                notifications
            </p>
            <hr>
        </div>
