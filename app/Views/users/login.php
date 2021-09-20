<?= $this->include('templates/header') ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
                <div class="container">
                    <h3>Login</h3>
                    <hr>
                    <?php if (session()->get('msg')): ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= session()->get('msg')?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->get('success')): ?>
                        <div class="alert alert-success" role="alert">
                           <?= session()->get('success')?>
                        </div>
                    <?php endif; ?>
                    <form action="/users/signin" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                   name="email"
                                   value="<?= set_value('email') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <?php if (isset($validation)): ?>
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors()?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-12 col-sm-8 text-right">
                                <a href="/signup">Don't have account register now !!</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?= $this->include('templates/footer') ?>