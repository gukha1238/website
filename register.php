<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-4 mx-auto">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="text-center">Create New Account</h2>

                    <?php $session = session(); ?>
                    <?php if(!is_null($session->getFlashdata('success_message'))): ?>
                        <div class="alert alert-success">
                            <?= $session->getFlashdata('success_message'); ?>
                        </div>
                    <?php endif; ?>

                    <?php $validation = \Config\Services::validation(); ?>
                    <form action="<?= base_url('register') ?>" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?= old("username") ?>" placeholder="Enter your username">
                            <div class="text-danger">
                                <?= $validation->getError("username") ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email ID</label>
                            <input type="email" class="form-control" name="email" value="<?= old("email") ?>" placeholder="Enter your email">
                            <div class="text-danger">
                                <?= $validation->getError("email") ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password">
                            <div class="text-danger">
                                <?= $validation->getError("password") ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" placeholder="Confirm your password">
                            <div class="text-danger">
                                <?= $validation->getError("cpassword") ?>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" name="register" class="btn btn-primary">Register</button>
                        </div>
                    </form>

                    <div class="text-center">
                        <a href="<?= base_url() ?>/login">Already have an account? Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

