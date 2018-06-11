<?php require_once ROOT.'/views/layouts/header_admin.php'; ?>
	<main class="main-admin">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<a href="/admin" class="admin-breadcrumbs admin-breadcrumbs_colored">Admin Panel</a>
					&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
					<a href="/admin/order" class="admin-breadcrumbs admin-breadcrumbs_colored">Order</a>
					&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
					<a href="/admin/order/view" class="admin-breadcrumbs">Order view</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2">
					<div class="admin-list-title-order">Order #<?=$id?> information</div>
				</div>
			</div>
			<table cellpadding="5px">
				<tr>
					<td>Order's ID</td>
					<td><?=$order['id']?></td>
				</tr>
				<tr>
					<td>Customer's name</td>
					<td><?=$order['user_name']?></td>
				</tr>
				<tr>
					<td>Customer's phone</td>
					<td><?=$order['user_phone']?></td>

				</tr>
				<tr>
					<td>Customer's comment</td>
					<td><?=$order['user_comment']?></td>
				</tr>
				<tr>
					<td>Customer's ID</td>
					<td><?php if (isset($order['user_id'])) echo $order['user_id']?></td>
				</tr>
				<tr>
					<th>Order's status</th>
					<th><?=Order::getStatusText($order['status'])?></th>
				</tr>
				<tr>
					<th>Order's time</th>
					<th><?=$order['date']?></th>
				</tr>
			</table>
			<div class="admin-list-title-order">Ordered products</div>
			<table class="basket-table" cellpadding="5px">
				<tr>
					<th>Product's ID</th>
					<th>Code</th>
					<th>Name</th>
					<th>Price</th>
					<th>Amount</th>
				</tr>
				<?php foreach ($products as $product): ?>
					<tr>
						<td><?=htmlspecialchars($product['id'])?></td>
						<td><?=htmlspecialchars($product['code'])?></td>
						<td><?=htmlspecialchars($product['name'])?></td>
						<td><?=htmlspecialchars($product['price'])?></td>
						<td><?=htmlspecialchars($productsAmount[$product['id']])?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</main>
<?php require_once ROOT.'/views/layouts/footer_admin.php'; ?>

