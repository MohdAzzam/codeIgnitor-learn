<?= $this->include('templates/header') ?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
                <div class="container">
                    <h3>Signup</h3>
                    <hr>
                    <form action="/users/create" method="post" id="signupForm">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                   value="<?= set_value('firstname') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                   value="<?= set_value('lastname') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                   name="email"
                                   value="<?= set_value('email') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                                   value="">
                        </div>
                        <?php if (isset($validation)): ?>
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div id="error" class="alert alert-danger" role="alert"></div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                            <div class="col-12 col-sm-8 text-right">
                                <a href="/login">Have account login now !!</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>/assets/js/validation.js"></script>

<?= $this->include('templates/footer') ?>