<?php require_once ROOT.'/views/layouts/header_admin.php'; ?>
<main class="main-admin">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <a href="/admin" class="admin-breadcrumbs admin-breadcrumbs_colored">Admin Panel</a>
                &nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
                <a href="/admin/category" class="admin-breadcrumbs admin-breadcrumbs_colored">Category management</a>
                &nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
                <a href="/admin/category/create" class="admin-breadcrumbs">Add new category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <p class="admin-create-title">Add new category</p>
                <form action="" class="user_info" method="POST">
                    <p>
						<label>Name:
							<?php
								if (isset($errors['name']))
									echo '<span class="form-error-red">'.$errors['name'].'</span>';
							?>
							<br>
							<input type="text" name="name" value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']); ?>">
						</label>
					</p>
                    <p>
						<label>Sort order:
                            <?php
								if (isset($errors['sort_order']))
									echo '<span class="form-error-red">'.$errors['sort_order'].'</span>';
							?>
							<br>
							<input type="text" name="sort_order" value="<?php if (isset($_POST['sort_order'])) echo htmlspecialchars($_POST['sort_order']); ?>">
						</label>
					</p>
                    <p>
						Status:<br>
                        <select name="status">
                            <option value="0"
                                <?php
                                if (isset($_POST['status'])) {
                                    if ($_POST['status'] == 0) {
                                        echo 'selected';
                                    }
                                }
                                ?>
							>Hidden</option>
                            <option value="1"
                                <?php
                                if (isset($_POST['status'])) {
                                    if ($_POST['status'] == 1) {
                                        echo 'selected';
                                    }
                                } else {
                                	echo 'selected';
								}
                                ?>
							>Visible</option>
                        </select>
                    </p><br>
                    <p>
						<input type="submit" name="submit" class="admin-delete-submit" value="Save">
					</p>
                </form>
                <a href="/admin/category/" class="admin-back-button">Back</a>
            </div>
        </div>
    </div>
</main>
<?php require_once ROOT.'/views/layouts/footer_admin.php'; ?>
