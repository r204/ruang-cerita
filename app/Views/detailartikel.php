<?= $this->extend('home/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="card">
        <div class="justify-content-center ms-2">

            <h1><?= $artikel->judul; ?></h1>
            <p class="text-muted">Dibuat Pada Tanggal : <?= date('d/M/Y', strtotime($artikel->created_at)) ?></p>
            <p class="text-muted">Ditulis Oleh : <strong><?= $artikel->author; ?></strong></p>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/artikel/<?= $artikel->img1; ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/artikel/<?= $artikel->img2; ?>" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <p><?= $artikel->body; ?></p>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>