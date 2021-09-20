<?= $this->include('templates/header') ?>
<?php if (session()->get('added')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('added') ?>
    </div>
<?php endif; ?>
<?php if (!empty($articles) && is_array($articles)) : ?>
    <?php foreach ($articles as $item): ?>
        <div class="container">
            <div class="card border-primary mb-3 mt-4" style="max-width: 18rem;">
                <div class="card-header"><?= esc($item['title']) ?></div>
                <div class="card-body text-primary">
                    <h5 class="card-title"><?= esc($item['title']) ?></h5>
                    <p class="card-text"><?= esc($item['body']) ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="container">
        <?= $pager->links() ?>
    </div>

<?php else : ?>

    <h3>No Articles</h3>

    <p>Unable to find any articles for you.</p>

<?php endif ?>

<?= $this->include('templates/footer') ?>