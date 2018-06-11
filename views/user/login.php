<?php include ROOT.'/views/layouts/header.php'; ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <div class="signup-form">
                    <h2>Authorization</h2>
                    <?php if (isset($errors['wrong'])) echo '<div class="form-wrong">'.$errors['wrong'].'</div>'; ?>
                    <form action="" method="POST">
                        <?php if (isset($errors['email'])) echo '<span class="form-error-red">'.$errors['email'].'</span>'; ?>
                        <input type="email" name="email" placeholder="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                        <?php if (isset($errors['password'])) echo '<span class="form-error-red">'.$errors['password'].'</span>'; ?>
                        <input type="password" name="password" placeholder="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
                        <input type="submit" name="submit" class="btn btn-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include ROOT.'/views/layouts/footer.php'; ?>