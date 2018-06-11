<?php require_once ROOT.'/views/layouts/header_admin.php'; ?>
<main class="main-admin">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <a href="/admin" class="admin-breadcrumbs admin-breadcrumbs_colored">Admin Panel</a>
                &nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
                <a href="/admin/category" class="admin-breadcrumbs">Category management</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <a href="/admin/category/create" class="admin-add-product"><i class="fa fa-plus"></i> Add new category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="admin-list-title">Category list</div>
            </div>
        </div>
        <table class="basket-table" cellpadding="5px">
            <tr>
                <th>Category ID</th>
                <th>Name</th>
                <th>Index number</th>
                <th>Status</th>
                <th></th>
            </tr>
            <?php foreach ($categoryList as $category): ?>
                <tr>
                    <td><?=htmlspecialchars($category['id'])?></td>
                    <td><?=htmlspecialchars($category['name'])?></td>
                    <td><?=htmlspecialchars($category['sort_order'])?></td>
                    <td><?=htmlspecialchars($category['status'])?></td>
                    <td align="center">
                        <a href="/admin/category/update/<?=$category['id']?>" class="admin-edit-link">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="/admin/category/delete/<?=$category['id']?>"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>
<?php require_once ROOT.'/views/layouts/footer_admin.php'; ?>