<div class="container text-center">
    <?php if(isset($_GET['del'])): ?>
        <div class="alert alert-success">
            The action  was Completed successfully !!!
        </div>
    <?php endif ?>
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
            <?php $sum = null; ?>
            <?php foreach($carts as $cart): ?>
            <tr>
                <form method="post" action="">
                    <td style="text-align:center; display:inline;">
                        <button type="button" value="<?= $cart->getId() ?>" class="btn btn-danger remove"><i class="fa fa-trash"></i></button>
                        <button type="submit" name="upd" value="<?= $cart->getId() ?>" class="btn btn-primary update"><i class="fa fa-plus"></i></button>
                    </td>
                    <td><img src="<?= $cart->getProduct_image() ?>" width="100" height="50"></td>
                    <td><?= $cart->getProduct_title() ?></td>
                    <td><input type="text" class="form-control qty" name='qty' value="<?= $cart->getQty() ?>"></td>
                    <td><input type="text" class="form-control price" name='price' value="<?= $cart->getPrice() ?>" readonly></td>
                    <td><input type="text" class="form-control total" value="<?= $cart->getTotal_amt() ?>" disabled></td>
                </form>
            </tr>
            <?php 
            $sum += $cart->getTotal_amt();
            ?>
            <?php endforeach ?>
        </tbody>
    </table>
    <p><br></p>
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
        $(".remove").click(function(event){
            alert("Voulez-vous vraiment effectuer cette opération ?")
            var del = $(this).val()
            $.ajax({
                url     :"",
                method  : "POST",
                data    : {delete:del},
                success : function(data){
                    window.location.href = "?p=card&del=1"
                }
            })
        })
    })
    
</script>
