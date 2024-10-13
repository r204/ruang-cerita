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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Buat Kategori baru
        </button>


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
                                <?= csrf_field(); ?>
                                <form action="admin.kategori/delete/<?= $a['id']; ?>" method="POST" class="d-inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin mau menghapus kategori <?php echo $a['category'] ?>');">
                                        <i class="fas fa-trash"></i> Hapus
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Kategori Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin.kategori') ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="category" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Kategori.." value="<?= set_value('category') ?>" autofocus>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>