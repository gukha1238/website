<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-4 mx-auto">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="text-center">Login to Account</h2>

                    <?php $session = session(); ?>
                    <?php if(!is_null($session->getFlashdata('failed_message'))): ?>
                        <div class="alert alert-danger">
                            <?= $session->getFlashdata('failed_message'); ?>
                        </div>
                    <?php endif; ?>

                    <?php $validation = \Config\Services::validation(); ?>
                    <form action="<?= base_url('login') ?>" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email ID</label>
                            <input type="text" class="form-control" name="email" value="<?= old("email") ?>" placeholder="Enter your email">
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

                        <div class="d-grid mb-3">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                    <div class="text-center">
                        <a href="<?= base_url() ?>/register">Don't have an account? Register here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

