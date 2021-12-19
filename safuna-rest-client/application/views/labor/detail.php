<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Labor
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $labor['nama_ruangan']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $labor['status_ruangan']; ?></h6>
                    <p class="card-text"><?= $labor['penanggung_jawab']; ?></p>
                    <a href="<?= base_url(); ?>labor" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>