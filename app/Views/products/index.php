<section class="header">
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

    <div class="slider">
        <div id="slider" class="carousel slide carousel-fade" data-ride="carousel"> 
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/bg-club.jpg" height="420" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="img/singapore.jpg" height="420" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="img/paris_featured.jpg" height="420" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="img/barcelona_featured.jpg" height="420" class="d-block w-100" alt="">
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
                <li data-target="#slider" data-slide-to="3"></li>
            </ol>
        </div>
    </div>
</section>