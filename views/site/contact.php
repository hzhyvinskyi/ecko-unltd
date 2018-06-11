<?php include ROOT.'/views/layouts/header.php'; ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if ($result): ?>
                    <div class="reg-ok">Message sent<br>We will answer you as soon as possible</div>
                <?php else: ?>
                    <div class="signup-form">
                        <h2>Feedback form</h2>
                        <form action="" method="POST">
                            <?php if (isset($errors['email'])) echo '<span class="form-error-red">'.$errors['email'].'</span>';?>
                            <input type="email" name="email" placeholder="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                            <?php if (isset($errors['text'])) echo '<span class="form-error-red">'.$errors['text'].'</span>';?>
                            <input type="text" name="text" placeholder="text" value="<?php if (isset($_POST['text'])) echo htmlspecialchars($_POST['text']); ?>">
                            <input type="submit" class="btn btn-default" name="submit" value="Send">
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php include ROOT.'/views/layouts/footer.php'; ?>