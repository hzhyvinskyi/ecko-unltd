<?php require_once ROOT.'/views/layouts/header_admin.php'; ?>
<main class="main-admin">
	<div class="container">
		<div class="row">
			<div class="col-lg">
				<h2>Welcome to the Administration Panel</h2>
				<ul class="admin-list">
					<li class="admin-main-item"><a href="/admin/product">Goods management</a></li>
					<li class="admin-main-item"><a href="/admin/category">Category management</a></li>
					<li class="admin-main-item"><a href="/admin/order">Order management</a></li>
				</ul>
			</div>
		</div>
	</div>
</main>
<?php require_once ROOT.'/views/layouts/footer_admin.php'; ?>
