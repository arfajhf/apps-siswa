<?php echo $this->session->flashdata('pesan'); ?>
<div class="card">
              <div class="card-header">
              <a href="<?php echo base_url('Matpel/tambah')?>" class="btn btn-primary"><i class="fa fa-plus">Tambah</i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">-
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id jurusan</th>
                    <th>nama</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <?php $no=1;
                  foreach($Jurusan as $jr):
                    ?>
                  <tbody>
                  <tr>
                    <td><?= $no++?></td>
                    <td><?= $jr->id_jurusan?>
                  </td>
                    <td> <?= $jr->nama?></td>
                    <td>
                    <button data-toggle="modal" data-target="#edit<?= $jr->id_jurusan?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                     <a href="<?= base_url('matpel/delete/' .$jr->id_jurusan) ?>" class="btn btn-danger btn-sm"  onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  </tbody>
                  <?php endforeach?>
                </table>
              </div>
              </div>
          
              <?php foreach($Jurusan as $jr){?>
<div class="modal fade" id="edit<?= $jr->id_jurusan?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form action="<?= base_url('jurusan/edit/'.$jr->id_jurusan); ?>" method="POST">
      <div class="form-group">
        <laber for="Nama"> id jurusan </label>
        <input type="text" name="id_jurusan" class="form-control" value="<?= $mtp->id_jurusan?>">
        <?= form_error('id_jurusan', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
        <laber for="Nama"> Nama </label>
        <input type="text" name="nama" class="form-control" value="<?= $jr->nama?>">
        <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"> Simpan</i></button>
        <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-save"> Reset</i></button>
      </div>
</form>
      </div>
      </div>
    </div>
  </div>
<?php }?>
           