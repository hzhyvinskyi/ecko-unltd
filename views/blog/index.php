<?php include ROOT.'/views/layouts/header.php'; ?>
<main>
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<h2 class="blog__main-title">Latest articles</h2>
				<?php foreach ($articleList as $article): ?>
					<div class="blog__article">
						<a href="/blog/article/<?=$article['id']?>">
							<h3 class="blog__title"><?=$article['title']?></h3>
						</a>
						<div class="blog__date"><?=$article['date']?></div>
						<img class="blog__image" src="<?=$article['image']?>">
						<p class="blog__short-content">
							<?=$article['short_content']?>
						</p>
						<a href="/blog/article/<?=$article['id']?>">Read more</a>
					</div>
					<hr>
					<br>
				<?php endforeach; ?>
			</div>
			<div class="col-lg-3">
				<aside class="blog__sidebar">
					<div>
						<h3>News</h3>
						<ul>
							<li><a href="#">News item example #1</a></li>
							<li><a href="#">News item example #2</a></li>
							<li><a href="#">News item example #3</a></li>
							<li><a href="#">News item example #4</a></li>
							<li><a href="#">News item example #5</a></li>
							<li><a href="#">News item example #6</a></li>
							<li><a href="#">News item example #7</a></li>
						</ul>
					</div>
					<br>
					<div>
						<h3>Articles</h3>
						<ul>
							<li><a href="#">Article example #1</a></li>
							<li><a href="#">Article example #2</a></li>
							<li><a href="#">Article example #3</a></li>
							<li><a href="#">Article example #4</a></li>
							<li><a href="#">Article example #5</a></li>
							<li><a href="#">Article example #6</a></li>
							<li><a href="#">Article example #7</a></li>
						</ul>
					</div>
					<br>
					<div>
						<h3>Related links</h3>
						<ul>
							<li><a href="#">Link example #1</a></li>
							<li><a href="#">Link example #2</a></li>
							<li><a href="#">Link example #3</a></li>
							<li><a href="#">Link example #4</a></li>
							<li><a href="#">Link example #5</a></li>
							<li><a href="#">Link example #6</a></li>
							<li><a href="#">Link example #7</a></li>
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</div>
</main>
<?php include ROOT.'/views/layouts/footer.php'; ?>