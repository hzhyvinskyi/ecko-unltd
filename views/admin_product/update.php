<?php require_once ROOT.'/views/layouts/header_admin.php'; ?>
<main class="main-admin">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <a href="/admin" class="admin-breadcrumbs admin-breadcrumbs_colored">Admin Panel</a>
                &nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
                <a href="/admin/product" class="admin-breadcrumbs admin-breadcrumbs_colored">Goods management</a>
                &nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
                <a href="/admin/product/create" class="admin-breadcrumbs">Edit item</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <p class="admin-create-title">Edit item</p>
                <form action="" class="user_info" method="POST" enctype="multipart/form-data">
                    <p>
                        <label>Name:
                            <?php if (isset($errors['name'])) echo '<span class="form-error-red">'.$errors['name'].'</span>'; ?>
                            <br>
                            <input type="text" name="name" value="<?php if (isset($_POST['name'])) { echo htmlspecialchars($_POST['name']); } else { echo htmlspecialchars($product['name']); }?>">
                        </label>
                    </p>
                    <p>
                        <label>Code:
                            <?php if (isset($errors['code'])) echo '<span class="form-error-red">'.$errors['code'].'</span>'; ?>
                            <br>
                            <input type="text" name="code" value="<?php if (isset($_POST['code'])) { echo htmlspecialchars($_POST['code']); } else { echo htmlspecialchars($product['code']); }?>">
                        </label>
                    </p>
                    <p>
                        <label>Price, &euro;:
                            <?php if (isset($errors['price'])) echo '<span class="form-error-red">'.$errors['price'].'</span>'; ?>
                            <br>
                            <input type="text" name="price" value="<?php if (isset($_POST['price'])) { echo htmlspecialchars($_POST['price']); } else { echo htmlspecialchars($product['price']); }?>">
                        </label>
                    </p>
                    <p>Category:<br>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?=htmlspecialchars($category['id'])?>"
                                        <?php
										if (isset($_POST['category_id']) && $_POST['category_id'] == $category['id'])
										{
											echo 'selected';
										} elseif ($product['category_id'] == $category['id']) {
                                        	echo 'selected';
                                        }
                                        ?>
                                        >
                                        <?=htmlspecialchars($category['name'])?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </p>
                    <p>
                        <label>Brand:<br>
                            <input type="text" name="brand" value="<?php if (isset($_POST['brand'])) { echo htmlspecialchars($_POST['brand']); } else { echo htmlspecialchars($product['brand']); }?>">
                        </label>
                    </p>
                    <p>
						<label>Image:<br>
							<img src="<?=htmlspecialchars(Product::getImage($product['id']))?>" alt="img">
							<input type="file" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
						</label>
					</p>
                    <p>
                        <label>Description:<br>
                            <textarea name="description" rows="6"><?php if (isset($_POST['description'])) { echo htmlspecialchars($_POST['description']); } else { echo htmlspecialchars($product['description']); }?></textarea>
                        </label>
                    </p>
                    <p>Availability: <br>
                        <select name="availability">
                            <option value="0"
								<?php
								if (isset($_POST['availability'])) {
                                    if($_POST['availability'] == 0) {
                                        echo 'selected';
                                    }
                                } elseif ($product['availability'] == 0) {
                                    echo 'selected';
								}
								?>
							>No</option>
                            <option value="1"
                                <?php
                                if (isset($_POST['availability'])) {
                                    if($_POST['availability'] == 1) {
                                        echo 'selected';
                                    }
                                } elseif ($product['availability'] == 1) {
                                    echo 'selected';
                                }
                                ?>
							>Yes</option>
                        </select>
                    </p>
                    <p>New product?<br>
                        <select name="is_new">
                            <option value="0"
                                <?php
                                if (isset($_POST['is_new'])) {
                                    if($_POST['is_new'] == 1) {
                                        echo 'selected';
                                    }
                                } elseif ($product['is_new'] == 1) {
                                    echo 'selected';
                                }
                                ?>
							>No</option>
                            <option value="1"
                                <?php
                                if (isset($_POST['is_new'])) {
                                    if($_POST['is_new'] == 1) {
                                        echo 'selected';
                                    }
                                } elseif ($product['is_new'] == 1) {
                                    echo 'selected';
                                }
                                ?>
							>Yes</option>
                        </select>
                    </p>
                    <p>Recommended product?<br>
                        <select name="is_recommended">
                            <option value="0"
                                <?php
                                if (isset($_POST['is_recommended'])) {
                                    if($_POST['is_recommended'] == 1) {
                                        echo 'selected';
                                    }
                                } elseif ($product['is_recommended'] == 1) {
                                    echo 'selected';
                                }
                                ?>
							>No</option>
                            <option value="1"
                                <?php
                                if (isset($_POST['is_recommended'])) {
                                    if($_POST['is_recommended'] == 1) {
                                        echo 'selected';
                                    }
                                } elseif ($product['is_recommended'] == 1) {
                                    echo 'selected';
                                }
                                ?>
							>Yes</option>
                        </select>
                    </p>
                    <p>Status:<br>
                        <select name="status">
                            <option value="0"
                                <?php
                                if (isset($_POST['status'])) {
                                    if($_POST['status'] == 0) {
                                        echo 'selected';
                                    }
                                } elseif ($product['status'] == 0) {
                                    echo 'selected';
                                }
                                ?>
							>Hidden</option>
                            <option value="1"
                                <?php
                                if (isset($_POST['status'])) {
                                    if($_POST['status'] == 1) {
                                        echo 'selected';
                                    }
                                } elseif ($product['status'] == 1) {
                                    echo 'selected';
                                }
                                ?>
							>Visible</option>
                        </select>
                    </p><br>
                    <p><input type="submit" name="submit" class="admin-delete-submit" value="Save"></p>
                </form>
                <a href="/admin/product/" class="admin-back-button">Back</a>
            </div>
        </div>
    </div>
</main>
<?php require_once ROOT.'/views/layouts/footer_admin.php'; ?>
