<?php include ROOT.'/views/layouts/header.php'; ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if (isset($result)): ?>
                    <div>Your personal data have been updated</div>
                <?php else: ?>
                    <div class="signup-form">
                        <h2>Editing</h2>
                        <form action="" method="POST">
                            <?php if (isset($errors['name'])) echo '<span class="form-error-red">'.$errors['name'].'</span>'; ?>
                            <input type="text" name="name" placeholder="name" value="<?php echo htmlspecialchars($name); ?>">
                            <?php if (isset($errors['password'])) echo '<span class="form-error-red">'.$errors['password'].'</span>'; ?>
                            <input type="password" name="password" placeholder="password" value="<?php echo htmlspecialchars($password); ?>">
                            <input type="submit" name="submit" class="btn btn-default" value="Save">
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php include ROOT.'/views/layouts/footer.php'; ?>
