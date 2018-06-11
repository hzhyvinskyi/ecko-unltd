<?php include ROOT.'/views/layouts/header.php'; ?>
<main>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Catalog</h2>
					<div class="panel-group category-products" id="accordian"><!--category-products-->
						<?php foreach ($categories as $categoryItem): ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="/category/<?=$categoryItem['id']?>">
											<?=$categoryItem['name']?></a>
									</h4>
								</div>
							</div>
						<?php endforeach; ?>
					</div><!--/category-products-->
				</div>
			</div>
			<div class="col-sm-9 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="row">
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?=$product['image']?>">
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?=$product['name']?></h2>
								<p>Code: <?=$product['code']?></p>
								<span>
									<span>&euro;<?=$product['price']?></span>
									<label>Amount:</label>
									<input type="text" value="1">
									<a href="#" class="add-to-cart add-to-cart__view" data-id="<?=$product['id']?>">
										<i class="fa fa-shopping-cart"></i>
										Buy
									</a>
								</span>
								<p>
									<b>Availability: </b>
									<?php if ($product['availability']) { echo 'Yes'; } else { echo 'No'; } ?>
								</p>
								<p><b>Collection: </b><?=$product['brand']?></p>
							</div><!--/product-information-->
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<h5>Description</h5>
							<?=$product['description']?>
						</div>
					</div>
				</div><!--/product-details-->
			</div>
		</div>
	</div>
</main>
<?php include ROOT.'/views/layouts/footer.php'; ?>