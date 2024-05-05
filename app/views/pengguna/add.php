<!-- Begin page content -->
<main role="main" class="container">
    <div class="clearfix mb-3 mt-3">
        <h1 class="float-left">Tambah Barang</h1>
    </div>
    <hr />
    <form class="form-horizontal" action="<?php echo URL . 'barang/proses_tambah'; ?>" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="IdSupplier" class="control-label">Nama Supplier</label>
                    <select class="form-control" id="IdSupplier" name="IdSupplier" required>
                        <option value="" selected>-- Pilih supplier --</option>
                        <?php foreach ($data_supplier as $supplier) { ?>
                            <option value="<?php if (isset($supplier->IdSupplier)) echo $supplier->IdSupplier; ?>"><?php if (isset($supplier->NamaSupplier)) echo $supplier->NamaSupplier; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="NamaBarang" class="control-label">Nama Barang</label>
                        <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" placeholder="Masukan nama barang" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Keterangan" class="control-label">Keterangan</label>
                    <textarea class="form-control" id="Keterangan" name="Keterangan" placeholder="Masukan keterangan" required></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Satuan" class="control-label">Satuan</label>
                    <input class="form-control" id="Satuan" name="Satuan" placeholder="Masukan satuan" value="<?php if (isset($data_barang->Satuan)) echo $data_barang->Satuan; ?>" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="HargaSatuan" class="control-label">Harga Satuan</label>
                    <input type="number" class="form-control" id="HargaSatuan" name="HargaSatuan" placeholder="Masukan harga satuan" value="<?php if (isset($data_barang->HargaSatuan)) echo $data_barang->HargaSatuan; ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Stok" class="control-label">Stok</label>
                    <input type="number" class="form-control" id="Stok" name="Stok" placeholder="Masukan stok" value="<?php if (isset($data_barang->Stok)) echo $data_barang->Stok; ?>" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="JumlahMinimalBarang" class="control-label">Jumlah Minimal Barang</label>
                    <input type="number" class="form-control" id="JumlahMinimalBarang" name="JumlahMinimalBarang" placeholder="Masukan jumlah minimal barang" value="<?php if (isset($data_barang->JumlahMinimalBarang)) echo $data_barang->JumlahMinimalBarang; ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="JumlahMaksimalBarang" class="control-label">Jumlah Maksimal Barang</label>
                    <input type="number" class="form-control" id="JumlahMaksimalBarang" name="JumlahMaksimalBarang" placeholder="Masukan jumlah maksimal barang" value="<?php if (isset($data_barang->JumlahMaksimalBarang)) echo $data_barang->JumlahMaksimalBarang; ?>" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-12">
                <button type="submit" class="btn btn-primary float-right" name="tambah_barang">Simpan</button>
                <a href="<?= URL . 'barang' ?>" class="btn btn-secondary float-right mr-2">Kembali</a>
            </div>
        </div>
    </form>
</main>