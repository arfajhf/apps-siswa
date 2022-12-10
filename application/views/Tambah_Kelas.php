<form action="<?= base_url("Kelas/tambah_aksi"); ?>" method="POST">
    <div class="form-group">
        <laber for="Nama"> Kode Kelas </label>
        <input type="text" name="kode_kelas" class="form-control" >
        <?= form_error('kode_kelas', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
        <laber for="Nama"> Kelas </label>
        <input type="text" name="kelas" class="form-control" >
        <?= form_error('kelas', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
        <laber for="Nama"> Jurusan </label>
        <input type="text" class="form-control" name="jurusan" >
        <?= form_error('jurusan', '<div class="text-small text-danger">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"> Simpan</i></button>
        <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-save"> Reset</i></button>
</form>