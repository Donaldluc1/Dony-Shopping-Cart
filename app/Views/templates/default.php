<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">


    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
<div class="top-nav-bar">
        <div class="search-box">
            <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
            <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
            <a href="/"> <img src="/img/client1.png" alt="" class="logo"></a>
            <input type="text" class="form-control" id="search">
            <span class="input-group-text" id="search_btn"><i class="fa fa-search"></i></span>    
        </div>
            
        <div class="menu-bar">
            <ul>
                <?php if(isset($_SESSION['auth'])): ?>
                    <li><a href="admin.php">Home</a></li>
                    <li><a href="?p=admin.categories.index">Categories</a></li>
                    <li><a href="admin.php?p=logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="?p=card"><i class="fa fa-shopping-basket"></i> Cart <span class="badge">
                    <?php if(isset($cardcount) && !empty($cardcount)): ?>
                        <?= $cardcount ?>
                    <?php else: ?>
                    0
                    <?php endif ?>
                    </span></a></li>
                    <li><a href="?p=products">Products</a></li>	    
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="index.php?p=login">Login</a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>

      <?= $content; ?>

      <!------------------------Footer--------------------->
<section class="footer">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-3">
                <h1>Useful Links</h1>
                <p>Privacy Policy</p>
                <p>Terms of Use</p>
                <p>Return Policy</p>
                <a href="index.php?p=login" >Admin</a>
            </div>
            <div class="col-md-3">
                <h1>company</h1>
                <p>About Us</p>
                <p>Contact Us</p>
                <p>Career</p>
                <p>Affiliate</p>
            </div>
            <div class="col-md-3">
                <h1>Follow Us On</h1>
                <p><i class="fa fa-facebook-official"></i> Facebook</p>
                <p><i class="fa fa-youtube-play"></i> Youtube</p>
                <p><i class="fa fa-linkedin"></i> Linkedin</p>
                <p><i class="fa fa-twitter"></i>Twitter</p>
            </div>
            <div class="col-md-3 footer-image">
                <h1>Download App</h1>
                <img src="img/iphone.jpg" alt="">
            </div>
        </div>
        <hr>
        <p class="copyright">Made With <i class="fa fa-heart-o"></i>  by Atangana Etoga</p>
    </div>
</section>


      <script>
          
        function openmenu(){
            document.getElementById("side-menu").style.display="block";
            document.getElementById("menu-btn").style.display="none";
            document.getElementById("close-btn").style.display="block";
        }
        function closemenu(){
            document.getElementById("side-menu").style.display="none";
            document.getElementById("menu-btn").style.display="block";
            document.getElementById("close-btn").style.display="none";
        }
    
      </script>

</body>
</html>