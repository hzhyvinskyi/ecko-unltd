<?php require_once ROOT.'/views/layouts/header_admin.php'; ?>
<main class="main-admin">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <a href="/admin" class="admin-breadcrumbs admin-breadcrumbs_colored">Admin Panel</a>
                &nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
                <a href="/admin/product" class="admin-breadcrumbs">Goods management</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <a href="/admin/product/create" class="admin-add-product"><i class="fa fa-plus"></i> Add new product</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="admin-list-title">Product list</div>
            </div>
        </div>
        <table class="basket-table" cellpadding="5px">
            <tr>
                <th>Product ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th></th>
            </tr>
            <?php foreach ($productList as $product): ?>
                <tr>
                    <td><?=htmlspecialchars($product['id'])?></td>
                    <td><?=htmlspecialchars($product['code'])?></td>
                    <td><?=htmlspecialchars($product['name'])?></td>
                    <td>&euro;<?=htmlspecialchars($product['price'])?></td>
                    <td align="center">
                        <a href="/admin/product/update/<?=$product['id']?>" class="admin-edit-link">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="/admin/product/delete/<?=$product['id']?>"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>
<?php require_once ROOT.'/views/layouts/footer_admin.php'; ?>