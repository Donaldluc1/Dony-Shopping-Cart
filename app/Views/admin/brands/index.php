<div class="container text-center">
    <?php if(isset($deleted)): ?>
        <div class="alert alert-success">
            <?= $deleted?>
        </div>
    <?php endif ?>
    <?php if(isset($msg)): ?>
        <div class="alert alert-success">
            <?= $msg ?>
        </div>
    <?php endif ?>
    <a href="?p=admin.brands.create"  class="btn btn-primary">Create</i></a>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
    <table class="table-responsive col-md-8">
        <?php $sum = 1; ?>
        <thead>
            <th>#</th>
            <th>Action</th>
            <th>Brand</th>
            <th>status</th>
        </thead>
        <tbody>
            <?php foreach($brands as $brand): ?>
            <tr>
                <form method="post" action="">
                    <td><?= $sum++ ?></td>
                    <td style="text-align:center;">
                        <button type="button" value="<?= $brand->getBid() ?>" style="margin-bottom:5px;" class="btn btn-danger supbrand">Delete</button>
                        <a href="?p=admin.brands.update&updbrand=<?= $brand->getBid() ?>" class="btn btn-primary updatecat">update</i></a>
                    </td>
                    <td><?= $brand->getBrand_name() ?></td>
                    <td><?= $brand->getStatus() ?></td>
                </form>
            </tr>
            <?php 
            ?>
            <?php endforeach ?>
        </tbody>
    </table>
    <p><br></p>
    <?php $link = "?p=admin.brands.index"; ?>
    <div class="col text-center">
        <?= $pagination->previousLink($link); ?>
        <?= $pagination->nextLink($link); ?>
    </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div><h3>Total</h3></div>
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
        $(".supbrand").click(function(event){
         if(confirm("Voulez-vous vraiment effectuer cette opération ?")){
            var dele = $(this).val()
            $.ajax({
                url     :"",
                method  : "POST",
                data    : {suppbrand:dele},
                success : function(data){
                    window.location.href = "?p=admin.brands.index"
                }
            })
        }
        })
    })
    
</script>
