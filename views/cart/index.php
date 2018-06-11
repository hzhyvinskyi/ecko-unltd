<?php include ROOT.'/views/layouts/header.php'; ?>
<main>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Catalog</h2>
					<div class="panel-group category-products">
						<?php foreach ($categories as $categoryItem): ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="/category/<?=$categoryItem['id']?>"
										   class="<?php if ($categoryId == $categoryItem['id']) echo 'active'; ?>">
											<?=$categoryItem['name']?>
										</a>
									</h4>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Shopping basket</h2>
					<?php if ($productsInCart): ?>
						<p>Chosen items</p>
						<table class="basket-table" cellpadding="5px">
							<tr>
								<th>Code</th>
								<th>Name</th>
								<th>Amount</th>
								<th>Price</th>
								<th>Delete</th>
							</tr>
							<?php foreach ($products as $product): ?>
								<tr>
									<td><?=$product['code']?></td>
									<td>
										<a href="/product/<?=$product['id']?>"><?=$product['name']?></a>
									</td>
									<td><?=$productsInCart[$product['id']]?></td>
									<td>&euro;<?=$product['price']?></td>
									<td>
										<a href="/cart/delete/<?=$product['id']?>"><i class="fa fa-times"></i></a>
									</td>
								</tr>
							<?php endforeach; ?>
							<tr>
								<th colspan="2">Overall: </th>
								<th><?=Cart::countItems()?></th>
								<th class="total-price" colspan="2">&euro;<?=$totalPrice?></th>
							</tr>
						</table>
						<a href="/cart/checkout" class="btn btn-default">
							<i class="fa fa-shopping-cart"></i> Order
						</a>&nbsp;&nbsp;
						<a href="/cart/clear" class="btn btn-default">Clear basket</a>
					<?php else: ?>
						<p>Basket is empty</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include ROOT.'/views/layouts/footer.php'; ?>