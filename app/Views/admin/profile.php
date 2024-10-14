<?= $this->extend('admin/templates/sidebar'); ?>
<?= $this->section('content'); ?>
<?php $session = session(); ?>
<?php if (session()->has('logged_in') == true) : ?>
    <div class="card mb-3 ms-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="img/undraw_profile.svg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $session->get('nama') ?></h5>
                    <p class="card-text">Email : <?php echo $session->get('email') ?></p>
                    <p class="card-text"></p>
                    <p class="card-text"><small class="text-muted">Created At : <?php echo date('d/M/Y', strtotime($session->get('created_at'))) ?></small></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= $this->endsection(); ?>