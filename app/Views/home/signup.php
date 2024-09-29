<?= $this->extend('home/template'); ?>

<?= $this->section('content'); ?>

<div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4 mx-4">
                    <div class="card-body p-4">
                        <h1>Register</h1>
                        <p class="text-body-secondary">Create your account</p>
                        <div class="input-group mb-3"><span class="input-group-text col-4">
                                Username</span>
                            <input class="form-control" type="text" placeholder="Username">
                        </div>
                        <div class="input-group mb-3"><span class="input-group-text col-4">
                                Email</span>
                            <input class="form-control" type="text" placeholder="Email">
                        </div>
                        <div class="input-group mb-3"><span class="input-group-text col-4">
                                Password</span>
                            <input class="form-control" type="password" placeholder="Password">
                        </div>
                        <div class="input-group mb-4"><span class="input-group-text col-4">
                                Confirm Password</span>
                            <input class="form-control" type="password" placeholder="Repeat password">
                        </div>
                        <button class="btn btn-block btn-success" type="button">Create Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>