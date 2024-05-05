<!-- Begin page content -->
<main role="main" class="container">
    <div class="clearfix mb-3 mt-3">
        <h1 class="float-left">Edit Pelanggan</h1>
    </div>
    <hr />
    <form class="form-horizontal" action="<?php echo URL . 'pelanggan/proses_edit'; ?>" method="POST">
        <input type="hidden" name="IdPelanggan" value="<?php if (isset($data_pelanggan->IdPelanggan)) echo $data_pelanggan->IdPelanggan; ?>" />
        <div class="form-group">
            <label for="NamaPelanggan" class="col-sm-2 control-label">Nama Pelanggan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan" placeholder="Masukan nama pelanggan" value="<?php if (isset($data_pelanggan->NamaPelanggan)) echo $data_pelanggan->NamaPelanggan; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="AlamatPelanggan" class="col-sm-2 control-label">Alamat Pelanggan</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="AlamatPelanggan" name="AlamatPelanggan" placeholder="Masukan alamat pelanggan" required><?php if (isset($data_pelanggan->AlamatPelanggan)) echo $data_pelanggan->AlamatPelanggan; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="NoTelp" class="col-sm-2 control-label">No Telepon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="NoTelp" name="NoTelp" placeholder="Masukan no telepon" value="<?php if (isset($data_pelanggan->NoTelp)) echo $data_pelanggan->NoTelp; ?>" pattern="[0-9]*" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary float-right" name="edit_pelanggan">Simpan</button>
                <a href="<?= URL . 'pelanggan' ?>" class="btn btn-secondary float-right mr-2">Kembali</a>
            </div>
        </div>
    </form>
</main>
