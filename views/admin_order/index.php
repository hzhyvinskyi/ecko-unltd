<?php require_once ROOT.'/views/layouts/header_admin.php'; ?>
	<main class="main-admin">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<a href="/admin" class="admin-breadcrumbs admin-breadcrumbs_colored">Admin Panel</a>
					&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
					<a href="/admin/order" class="admin-breadcrumbs">Order management</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2">
					<div class="admin-list-title-order">Order list</div>
				</div>
			</div>
			<table class="basket-table" cellpadding="5px">
				<tr>
					<th>Order ID</th>
					<th>Costumer's name</th>
					<th>Costumer's phone</th>
					<th>Order's time</th>
					<th>Status</th>
					<th></th>
				</tr>
				<?php foreach ($orderList as $order): ?>
					<tr>
						<td><?=htmlspecialchars($order['id'])?></td>
						<td><?=htmlspecialchars($order['user_name'])?></td>
						<td><?=htmlspecialchars($order['user_phone'])?></td>
						<td><?=htmlspecialchars($order['date'])?></td>
						<td><?=htmlspecialchars($order['status'])?></td>
						<td align="center">
							<a href="/admin/order/view/<?=$order['id']?>" class="admin-edit-link">
								<i class="fa fa-eye"></i>
							</a>
							<a href="/admin/order/update/<?=$order['id']?>" class="admin-edit-link">
								<i class="fa fa-edit"></i>
							</a>
							<a href="/admin/order/delete/<?=$order['id']?>"><i class="fa fa-times"></i></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</main>
<?php require_once ROOT.'/views/layouts/footer_admin.php'; ?>

