<?php include ROOT.'/views/layouts/header.php'; ?>
<main>
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<h2 class="blog__main-title">Latest articles</h2>
				<?php foreach ($articleList as $article): ?>
					<div class="blog__article">
						<h3 class="blog__title"><?=$article['title']?></h3>
						<div class="blog__date"><?=$article['date']?></div>
						<img class="blog__image" src="<?=$article['image']?>">
						<p class="blog__short-content">
							<?=$article['short_content']?>
						</p>
						<a href="/blog/article/<?=$article['id']?>">Read more</a>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="col-lg-3">
				<aside>
					<div>
						<h3>Njagk wajng wangh</h3>
						<ul>
							<li><a href="">gawhgawh</a></li>
							<li><a href="">hwahh</a></li>
							<li><a href="">rnwean</a></li>
							<li><a href="">neanea</a></li>
							<li><a href="">naenean</a></li>
						</ul>
					</div>
					<div>
						<h3>Xjagk wajng wangh</h3>
						<ul>
							<li><a href="">naernera</a></li>
							<li><a href="">nearn</a></li>
							<li><a href="">neanea</a></li>
							<li><a href="">nean</a></li>
							<li><a href="">nanan</a></li>
						</ul>
					</div>
					<div>
						<h3>Yjagk wajng wangh</h3>
						<ul>
							<li><a href="">narn</a></li>
							<li><a href="">aernan</a></li>
							<li><a href="">narn</a></li>
							<li><a href="">aernan</a></li>
							<li><a href="">naenr</a></li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div>
</main>
<?php include ROOT.'/views/layouts/footer.php'; ?>