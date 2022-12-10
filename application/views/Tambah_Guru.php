<form action="<?= base_url("Guru/tambah_aksi"); ?>" method="POST">
    <div class="form-group">
        <laber for="Nama"> Nama Guru </label>
        <input type="text" name="nama_guru" class="form-control" >
        <?= form_error('nama_guru', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
        <laber for="Nama"> Alamat </label>
        <textarea class="form-control" name="alamat" cols="30" rows="5" ></textarea>
        <?= form_error('alamat', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
        <laber for="Nama"> No Telepon </label>
        <input type="number" name="no_telepon" class="form-control" >
        <?= form_error('no_telepon', '<div class="text-small text-danger">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"> Simpan</i></button>
        <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-save"> Reset</i></button>
</form>