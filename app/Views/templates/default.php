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
                <li><a href="?p=card"><i class="fa fa-shopping-basket"></i> Cart <span class="badge">
                <?php if(isset($cardcount) && !empty($cardcount)): ?>
            <?= $cardcount ?>
        <?php else: ?>
        0
       <?php endif ?>
                </span></a></li>
                <li><a href="?p=products">Products</a></li>	    
                <li><a href="#">Sign Up</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </div>
    </div>

      <?= $content; ?>


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