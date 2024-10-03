<?= $this->extend('admin/templates/sidebar'); ?>
<?= $this->section('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Daftar Kategori Artikel</h3>
        <?php if (!empty(session()->getFlashdata('berhasil'))) : ?>
            <div class="alert alert-success">
                <i class="fas fa-check"></i> <?php echo session()->getFlashdata('berhasil'); ?>
            </div>
        <?php endif ?>
        <?php if (!empty(session()->getFlashdata('sukses'))) : ?>
            <div class="alert alert-danger">
                <i class="fas fa-trash"></i> <?php echo session()->getFlashdata('sukses'); ?>
            </div>
        <?php endif ?>
        <?php if (!empty(session()->getFlashdata('updated'))) : ?>
            <div class="alert alert-success">
                <i class="fas fa-check"></i> <?php echo session()->getFlashdata('updated'); ?>
            </div>
        <?php endif ?>
    </div>
    <div class="card-body">
        <a href="/admin.artikel.create" class="btn btn-primary">Buat Artikel Baru</a>
        <div class="table-responsive mt-2">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kategori as $a) : ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $a['category'] ?></td>
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