<?php require_once ROOT.'/views/layouts/header_admin.php'; ?>
<main class="main-admin">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <a href="/admin" class="admin-breadcrumbs admin-breadcrumbs_colored">Admin Panel</a>
                &nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
                <a href="/admin/product" class="admin-breadcrumbs admin-breadcrumbs_colored">Goods management</a>
                &nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
                <a href="/admin/product/delete<?=$id?>" class="admin-breadcrumbs">Delete item</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <p class="admin-delete-question">Do you really want to delete item #<?=$id?>?</p>
                <form action="" method="POST">
                    <input type="submit" name="submit" class="admin-delete-submit" value="Yes">
                </form>
                <a href="/admin/product/" class="admin-back-button">Back</a>
            </div>
        </div>
    </div>
</main>
<?php require_once ROOT.'/views/layouts/footer_admin.php'; ?>
