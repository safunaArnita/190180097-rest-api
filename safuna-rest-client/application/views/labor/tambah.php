<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Labor
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="status_ruangan">Status_Ruangan</label>
                            <input type="text" name="status_ruangan" class="form-control" id="status_ruangan">
                            <small class="form-text text-danger"><?= form_error('status_ruangan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="penanggung_jawab">Penanggung_Jawab</label>
                            <input type="text" name="penanggung_jawab" class="form-control" id="penanggung_jawab">
                            <small class="form-text text-danger"><?= form_error('penanggung_jawab'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama_ruangan">Nama_Ruangan</label>
                            <select class="form-control" id="nama_ruangan" name="nama_ruangan">
                                <option value="Lab Informatika">Lab Informatika</option>
                                <option value="Lab Sistem Informasi">Lab Sistem Informasi</option>
                                <option value="Lab Bahasa">Lab Bahasa</option>
                                <option value="Lab Biologi">Lab Biologi</option>
                                <option value="Lab Pintar">Lab Pintar</option>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>