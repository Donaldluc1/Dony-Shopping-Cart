
<div class="container">
    <h1>Se connecter</h1>
    <?php if(isset($fail)): ?>
        <div class="alert alert-danger">
            <?= $fail ?>
        </div>
    <?php  endif ?>

    <form action="" method="post">
    <?= $formName ?>
    <?= $formPass ?>
    <button type="submit" name="login" value="1" class="btn btn-primary">Se connecter</button>
    </form>
</div>
<br>
<br>