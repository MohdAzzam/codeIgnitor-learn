<?= $this->include('templates/header') ?>
<?php if (!empty($articles) && is_array($articles)) : ?>
    <div class="container">
        <div class="row">
            <?php foreach ($articles as $item): ?>
                <div class="col-4">

                    <div class="card border-primary mb-3 mt-4" style="max-width: 18rem;">
                        <div class="card-header"><?= esc($item['title']) ?></div>
                        <div class="card-body text-primary">
                            <h5 class="card-title"><?= esc($item['title']) ?></h5>
                            <p class="card-text"><?= esc($item['body']) ?></p>
                        </div>
                        <div class="col-6 d-flex mt-4 mb-4 ">
                        <a href="articles/updateArticleById/?id=<?=$item['id']?>" class="btn btn-primary">Update</a>
                        <a href="articles/deleteArticle/?id=<?=$item['id']?>" class="btn btn-danger flex-end">Delete</a>
                        </div>
                    </div>

                </div>

            <?php endforeach; ?>
        </div>
    </div>

<?php else : ?>
    <div class="container mt-4">
        <h3>No Articles</h3>
        <p>Unable to find any articles for you. add one now <a href="/create-articles">Add</a></p>

    </div>

<?php endif ?>

<?= $this->include('templates/footer') ?>