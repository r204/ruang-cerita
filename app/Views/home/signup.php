<?= $this->extend('home/template'); ?>

<?= $this->section('content'); ?>

<div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4 mx-4">
                    <div class="card-body p-4">
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h4>Periksa Entrian Form</h4>
                                </hr />
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <form action="/sign-up" method="POST">
                            <?= csrf_field(); ?>
                            <h1>Register</h1>
                            <p class="text-body-secondary">Create your account</p>
                            <div class="input-group mb-3"><span class="input-group-text col-4">
                                    Nama</span>
                                <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama..." value="<?= set_value('nama') ?>">
                            </div>
                            <div class="input-group mb-3"><span class="input-group-text col-4">
                                    Email</span>
                                <input class="form-control" type="email" id="email" name="email" placeholder="name@example.com" value="<?= set_value('email') ?>">
                            </div>
                            <div class="input-group mb-3"><span class="input-group-text col-4">
                                    Password</span>
                                <input class="form-control" type="password" id="floatingPassword" name="password" placeholder="Password...">
                            </div>

                            <button class="btn btn-block btn-success" type="submit">Create Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>