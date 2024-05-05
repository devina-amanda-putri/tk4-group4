<!-- Begin page content -->
<main role="main" class="container">
    <div class="clearfix mb-3 mt-3">
        <h1 class="float-left">Tambah Supplier</h1>
    </div>
    <hr />
    <form class="form-horizontal" action="<?php echo URL . 'supplier/proses_tambah'; ?>" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="NamaSupplier" class="control-label">Nama Supplier</label>
                        <input type="text" class="form-control" id="NamaSupplier" name="NamaSupplier" placeholder="Masukan nama Supplier" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Alamat" class="control-label">Alamat</label>
                    <textarea class="form-control" id="Alamat" name="Alamat" placeholder="Masukan Alamat" required></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="NoTelp" class="control-label">No Telp</label>
                    <input type="number" class="form-control" id="NoTelp" name="NoTelp" placeholder="Masukan No Telp" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary float-right" name="tambah_supplier">Simpan</button>
                <a href="<?= URL . 'suplier' ?>" class="btn btn-secondary float-right mr-2">Kembali</a>
            </div>
        </div>
    </form>
</main>