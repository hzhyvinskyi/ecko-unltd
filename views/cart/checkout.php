<?php include ROOT.'/views/layouts/header.php'; ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <?php if ($result): ?>
                        <div class="order-sent">
                            Your order has been sent<br>
                            We will contact with you as soon as possible
                        </div>
                    <?php else: ?>
                        <div class="signup-form">
                            <h2>Order form</h2>
                            <div class="overall-order-data">
                                Total items: <?=$totalAmount?>&nbsp;
                                Total price: &euro;<?=$totalPrice?>
                            </div>
                            <form action="" method="POST">
                                <?php if (isset($errors['name'])) echo '<span class="form-error-red">'.$errors['name'].'</span>'; ?>
                                <input type="text" name="name" placeholder="name" value="<?php if (isset($name)) echo htmlspecialchars($name); ?>">
                                <?php if (isset($errors['email'])) echo '<span class="form-error-red">'.$errors['email'].'</span>'; ?>
                                <input type="email" name="email" placeholder="email" value="<?php if (isset($email)) echo htmlspecialchars($email); ?>">
                                <?php if (isset($errors['phone'])) echo '<span class="form-error-red">'.$errors['phone'].'</span>'; ?>
                                <input type="tel" name="phone" placeholder="phone number" value="<?php if (isset($phone)) echo htmlspecialchars($phone); ?>">
                                <textarea name="comment" placeholder="type your comment here"><?php if (isset($comment)) echo htmlspecialchars($comment)?></textarea>
                                <input type="submit" name="submit" class="btn btn-default" value="Order">
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
<?php include ROOT.'/views/layouts/footer.php'; ?>