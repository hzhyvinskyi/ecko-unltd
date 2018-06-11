<?php include ROOT.'/views/layouts/header.php'; ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Personal page</h3>
                <ul class="profile-list">
                    <li>Name: <?=$user['name']?></li>
                    <li><a href="/cabinet/edit">Edit your data</a></li>
                    <li><a href="/cabinet/history">Shopping list</a></li>
                </ul>
            </div>
        </div>
    </div>
</main>
<?php include ROOT.'/views/layouts/footer.php'; ?>