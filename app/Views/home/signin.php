<?= $this->extend('home/template'); ?>

<?= $this->section('content'); ?>

<div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-group d-block d-md-flex row">
                    <div class="card col-md-7 p-4 mb-0">
                        <div class="card-body">
                            <h1>Login</h1>
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty(session()->getFlashdata('berhasil'))) : ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <?php echo session()->getFlashdata('berhasil'); ?>
                                </div>
                            <?php endif; ?>
                            <form action="/sign-in" method="POST">
                                <?= csrf_field(); ?>
                                <p class="text-body-secondary">Sign In to your account</p>
                                <div class="input-group mb-3"><span class="input-group-text col-3">
                                        Email</span>
                                    <input class="form-control" type="text" placeholder="Email" name="email">
                                </div>
                                <div class="input-group mb-4"><span class="input-group-text col-3">
                                        Password</span>
                                    <input class="form-control" type="password" placeholder="Password" name="password">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit" name="login">Login</button>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card col-md-5 text-white bg-primary py-5">
                        <div class="card-body text-center">
                            <div>
                                <h2>Sign up</h2>
                                <p>Don't have an account?</p>
                                <a href="/sign-up" class="btn btn-lg btn-outline-light mt-3">Register Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>