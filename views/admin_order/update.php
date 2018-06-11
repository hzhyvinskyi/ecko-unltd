<?php require_once ROOT.'/views/layouts/header_admin.php'; ?>
<main class="main-admin">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<a href="/admin" class="admin-breadcrumbs admin-breadcrumbs_colored">Admin Panel</a>
				&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
				<a href="/admin/order/" class="admin-breadcrumbs admin-breadcrumbs_colored">Order management</a>
				&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;
				<a href="/admin/order/update/" class="admin-breadcrumbs">Edit order</a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<p class="admin-create-title">Editing order #<?=$order['id']?></p>
				<form action="" class="user_info" method="POST">
					<p>
						<label>Customer's name:
							<?php
							if (isset($errors['name']))
								echo '<span class="form-error-red">'.$errors['name'].'</span>';
							?>
							<br>
							<input type="text" name="user_name" value="<?php if (isset($_POST['user_name'])) { echo htmlspecialchars($_POST['user_name']); } else { echo htmlspecialchars($order['user_name']); } ?>">
						</label>
					</p>
					<p>
						<label>Customer's phone:
							<?php
							if (isset($errors['sort_order']))
								echo '<span class="form-error-red">'.$errors['sort_order'].'</span>';
							?>
							<br>
							<input type="text" name="user_phone" value="<?php if (isset($_POST['user_phone'])) { echo htmlspecialchars($_POST['user_phone']); } else { echo htmlspecialchars($order['user_phone']); } ?>">
						</label>
					</p>
					<p>
						<label>Order's time:
							<?php
							if (isset($errors['date']))
								echo '<span class="form-error-red">'.$errors['date'].'</span>';
							?>
							<br>
							<input type="text" name="date" value="<?php if (isset($_POST['date'])) { echo htmlspecialchars($_POST['date']); } else { echo htmlspecialchars($order['date']); } ?>">
						</label>
					</p>
					<p>
						<label>Customer's comment:
						<textarea name="user_comment" rows="6"><?php if (isset($_POST['user_comment'])) { echo htmlspecialchars($_POST['user_comment']); } else { echo htmlspecialchars($order['user_comment']); }?></textarea>
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
								} elseif ($order['status'] == 0)
									echo 'selected';
								?>
							>Hidden</option>
							<option value="1"
								<?php
								if (isset($_POST['status'])) {
									if ($_POST['status'] == 1) {
										echo 'selected';
									}
								} elseif ($order['status'] == 1) {
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
				<a href="/admin/order/" class="admin-back-button">Back</a>
			</div>
		</div>
	</div>
</main>
<?php require_once ROOT.'/views/layouts/footer_admin.php'; ?>
