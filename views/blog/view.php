<?php include ROOT.'/views/layouts/header.php'; ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?= $article[0]['title'] ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 blog__date">
                <p><?= $article[0]['date'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 view-product">
                <img src="<?= $article[0]['image'] ?>" alt="photo">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <p><?= $article[0]['content'] ?></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <a href="/blog"><i class="fa fa-arrow-left"></i> go back</a>
            </div>
        </div>
        <br>
    </div>
</main>
<?php include ROOT.'/views/layouts/footer.php'; ?>