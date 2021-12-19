<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Lab
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $labor['id']; ?>">
                        <div class="form-group">
                            <label for="status_ruangan">Status_Ruangan</label>
                            <input type="text" name="status_ruangan" class="form-control" id="status_ruangan" value="<?= $labor['status_ruangan']; ?>">
                            <small class="form-text text-danger"><?= form_error('status_ruangan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="penanggung_jawab">Penanggung_Jawab</label>
                            <input type="text" name="penanggung_jawab" class="form-control" id="penanggung_jawab" value="<?= $labor['penanggung_jawab']; ?>">
                            <small class="form-text text-danger"><?= form_error('penanggung_jawab'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama_ruangan">Nama_Ruangan</label>
                            <select class="form-control" id="nama_ruangan" name="nama_ruangan">
                                <?php foreach( $nama_ruangan as $nama_ruangan ) : ?>
                                    <?php if( $nama_ruangan == $labor['nama_ruangan'] ) : ?>
                                        <option value="<?= $nama_ruangan; ?>" selected><?= $nama_ruangan; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $nama_ruangan; ?>"><?= $nama_ruangan; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>