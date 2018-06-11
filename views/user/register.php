<?php include ROOT.'/views/layouts/header.php'; ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if (isset($result)): ?>
                    <div class="reg-ok">Registration was successful!<br>Now you can sing in</div>
                <?php else: ?>
                    <div class="signup-form">
                        <h2>Registration form</h2>
                        <form action="" method="POST">
                            <?php if (isset($errors['name'])) echo '<span class="form-error-red">'.$errors['name'].'</span>';?>
                            <input type="text" name="name" placeholder="name" value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']); ?>">
                            <?php if (isset($errors['email'])) echo '<span class="form-error-red">'.$errors['email'].'</span>';?>
                            <input type="email" name="email" placeholder="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                            <?php if (isset($errors['password'])) echo '<span class="form-error-red">'.$errors['password'].'</span>';?>
                            <input type="password" name="password" placeholder="password" value="<?php if (isset($_POST['password'])) echo htmlspecialchars($_POST['password']); ?>">
                            <input type="submit" class="btn btn-default" name="submit" value="Sign up">
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php include ROOT.'/views/layouts/footer.php'; ?>