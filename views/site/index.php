<?php include ROOT.'/views/layouts/header.php'; ?>
<main>
	<div class="container">
		<div class="row">
			<div class="col-lg">
				<div class="wrapper">
					<div class="counter col-fourth">
						<i class="fa fa-th-large"></i>
						<div class="count">30000</div>
						<p class="count-text">Good units</p>
					</div>
					<div class="counter col-fourth">
						<i class="fa fa-shield"></i>
						<div class="count">42718</div>
						<p class="count-text">Safety deliveries annualy</p>
					</div>
					<div class="counter col-fourth">
						<i class="fa fa-globe"></i>
						<div class="count">89</div>
						<p class="count-text">
							Countries worldwide
						</p>
					</div>
					<div class="counter col-fourth col-fourth__end">
						<i class="fa fa-smile-o"></i>
						<div class="count">1681629</div>
						<p class="count-text">Happy customers</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Catalog</h2>
					<div class="panel-group category-products">
						<?php foreach ($categories as $categoryItem): ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="/category/<?=$categoryItem['id']?>">
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
					<h2 class="title text-center">Recently added</h2>
					<?php foreach ($latestProducts as $product): ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?=$product['image']?>" alt="shoes">
										<h2>&euro;<?=$product['price']?></h2>
										<p>
											<a href="/product/<?=$product['id']?>">
												<?=$product['name']?>
											</a>
										</p>
										<a href="#" data-id="<?=$product['id']?>" class="btn btn-default add-to-cart">
											<i class="fa fa-shopping-cart"></i>Buy
										</a>
									</div>
									<?php if ($product['is_new']): ?>
										<img src="/template/img/home/new.png" class="new" alt="new">
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div><!--features_items-->
				<div class="recommended_items"><!--recommended_items-->
					<h2 class="title text-center">Recommended items</h2>
					<div class="cycle-slideshow"
						 data-cycle-fx=carousel
						 data-cycle-timeout=5000
						 data-cycle-carousel-visible=3
						 data-cycle-carousel-fluid=true
						 data-cycle-slides="div.product"
						 data-cycle-next="#next"
						 data-cycle-prev="#prev"
					>
						<?php foreach ($recommended as $item): ?>
							<div class="product">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?=$item['image']?>" alt="">
											<h2>&euro;<?=$item['price']?></h2>
											<a href="/product/<?=$item['id']?>"><?=$item['name']?></a>
											<br><br>
											<a href="#" class="btn btn-default add-to-cart" data-id="<?=$item['id']?>">
												<i class="fa fa-shopping-cart"></i>Buy
											</a>
										</div>
										<?php if ($item['is_new']): ?>
											<img src="/template/img/home/new.png" class="new" alt="new">
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a class="right recommended-item-control" id="next" href="#recommended-item-carousel" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div><!--/recommended_items-->
			</div>
		</div>
	</div>
</main>
<?php include ROOT.'/views/layouts/footer.php'; ?>