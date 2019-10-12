<div class="container text-center">
    <div id="cart_msg"></div>
    <table class="table-responsive">
        <thead>
            <th>Action</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Product Price</th>
            <th>Total IN CFA F</th>
        </thead>
        <tbody>
            <?php foreach($carts as $cart): ?>
            <tr>
                <td style="text-align:center;">
                    <a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a>
                     <a href="#" class="btn btn-primary update"><i class="fa fa-plus"></i></a>
                </td>
                <td><img src="<?= $cart->getProduct_image() ?>" width="100" height="50"></td>
                <td><?= $cart->getProduct_title() ?></td>
                <td><input type="text" class="form-control qty" pid='18' id='qty-18' value="<?= $cart->getQty() ?>"></td>
                <td><input type="text" class="form-control price" pid='18' id='price-18' value="<?= $cart->getPrice() ?>" disabled></td>
                <td><input type="text" class="form-control total" pid='18' id='total-18' value="<?= $cart->getPrice() ?>" disabled></td>
            </tr>
            <?php endforeach ?>
                        
        </tbody>
    </table>
    <p><br></p>
    <div class="row">
        <div class="col-md-8">
            <div><h3>Grand Total</h3></div>
        </div>
        <div class="col-md-4">
            <div><h1 id="cart_checkout">????</h1></div>
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
