
<div class="container text-center">
    <?php if(isset($deleted)): ?>
        <div class="alert alert-success">
            <?= $deleted?>
        </div>
    <?php endif ?>
    <?php if(isset($sms)): ?>
        <div class="alert alert-success">
            <?= $sms ?>
        </div>
    <?php endif ?>
    <a href="?p=admin.products.create"  class="btn btn-primary">Create</i></a>
    <table class="table-responsive">
    <?php $sum = 1; ?>
        <thead>
            <th>#</th>
            <th>Action</th>
            <th>Image</th>
            <th>Product</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Key Words</th>
            <th>Date</th>
            <th>status</th>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
            <tr>
                <form method="post" action="">
                    <td><?= $sum++ ?></td>
                    <td style="text-align:center;">
                        <button type="button" value="<?= $product['pid'] ?>" style="margin-bottom:5px;" class="btn btn-danger sup">Delete</button>
                        <a href="?p=admin.products.create&cre=<?= $product['pid'] ?>" class="btn btn-primary update">update</i></a>
                    </td>
                    <td><img src="/img/<?= $product['product_img'] ?>" width="100" height="50"></td>
                    <td><?= $product['product_name'] ?></td>
                    <td><?= $product['category_name'] ?></td>
                    <td><?= $product['brand_name'] ?></td>
                    <td><?= $product['product_price'] ?></td>
                    <td><?= $product['product_stock'] ?></td>
                    <td><?= $product['product_key'] ?></td>
                    <td><?= $product['added_date'] ?></td>
                    <td><?= $product['p_status'] ?></td>
                </form>
            </tr>
            <?php 
            ?>
            <?php endforeach ?>
        </tbody>
    </table>
    <p><br></p>
    <?php $link = "?p=admin.products.index"; ?>
    <div class="col text-center">
        <?= $pagination->previousLink($link); ?>
        <?= $pagination->nextLink($link); ?>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div><h3>Grand Total</h3></div>
        </div>
        <div class="col-md-4">
            <div><?= $sum ?></h1></div>
        </div>
    </div>
</div>


<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.table-responsive').forEach(function(table){
        let labels = Array.from(table.querySelectorAll('th')).map(function(th){
            return th.innerText
        })
        table.querySelectorAll('td').forEach(function(td, i){
            td.setAttribute('data-label', labels[i % labels.length])
        })
    })
    //Pour chaque tableau table
     //Pour chaque th dans table
         //je collecte les labels
    //Pour chaque td dans td dans table
        //on recupere l'index du td
        //on va mettre le data-label qui correspond
})
</script>
<script>
      $(document).ready(function(){
        $(".sup").click(function(event){
            alert("Voulez-vous vraiment effectuer cette opération ?")
            var dele = $(this).val()
            alert(dele)
            $.ajax({
                url     :"",
                method  : "POST",
                data    : {supp:dele},
                success : function(data){
                    window.location.href = "?p=admin.products.index"
                }
            })
        })
    })
    
</script>
