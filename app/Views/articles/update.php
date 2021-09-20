<?= $this->include('templates/header') ?>


    <div class="container mt-4">
        <div class="row">
            <div class="col-6 centered">
                <form action="/articles/updateArticle" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" required type="input" name="title"
                               value="<?= $article['title'] ?>"/>
                    </div>
                    <div class="form-group">

                        <label for="body">Text</label>
                        <textarea
                                name="body"
                                class="form-control"
                                required><?= $article['body'] ?></textarea>
                    </div>
                    <input type="hidden" value="<?= $article['id']?>" name="id"/>

                    <?php if (isset($validation)): ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <input type="submit" class="btn btn-success mt-4" name="submit" value="Update"/>
                </form>
            </div>
        </div>

    </div>
<?= $this->include('templates/footer') ?>