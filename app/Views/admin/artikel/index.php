<?= $this->extend('admin/templates/sidebar'); ?>
<?= $this->section('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Daftar Postingan Artikel</h3>
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
                    <?php foreach ($artikel as $a => $value) : ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $value->judul ?></td>
                            <td><?php echo word_limiter($value->body, 15) ?></td>
                            <?php if ($value->status != 'Publik'): ?>
                                <td><span class="badge rounded-pill bg-warning"><?php echo $value->status ?></span></td>
                            <?php else: ?>
                                <td><span class="badge rounded-pill bg-success"><?php echo $value->status ?></span></td>
                            <?php endif; ?>
                            <td><?= date('d/M/Y', strtotime($value->created_at)) ?></td>
                            <td>
                                <a href="" class="btn btn-outline-warning">Edit</a>
                                <form action="admin.artikel/delete/<?= $value->id; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin mau menghapus artikel ini?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
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