<?= $this->extend('admin/templates/sidebar'); ?>
<?= $this->section('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Daftar Postingan Artikel</h3>
    </div>
    <div class="card-body">
        <a href="/create" class="btn btn-primary">Buat Artikel Baru</a>
        <div class="table-responsive mt-2">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Konten Artikel</th>
                        <th>Status Publikasi</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Konten Artikel</th>
                        <th>Status Publikasi</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($artikel as $a) : ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $a->judul ?></td>
                            <td><?php echo word_limiter($a->body, 15) ?></td>
                            <td><span class="badge rounded-pill bg-warning"><?php echo $a->status ?></span></td>
                            <td><?= date('d/M/Y', strtotime($a->created_at)) ?></td>
                            <td>
                                <a href="" class="btn btn-outline-warning">Edit</a>
                                <a href="" class="btn btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>