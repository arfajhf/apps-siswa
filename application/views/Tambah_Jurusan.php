<form action="<?= base_url("Jurusan/tambah_aksi"); ?>" method="POST">
    <div class="form-group">
        <laber for="Nama"> id jurusan </label>
        <input type="text" name="id_jurusan" class="form-control" >
        <?= form_error('id_jurusan', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
        <laber for="Nama"> Nama </label>
        <input type="text" name="nama" class="form-control">
        <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"> Simpan</i></button>
        <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-save"> Reset</i></button>
</form>