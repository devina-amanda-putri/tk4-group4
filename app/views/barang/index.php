<!-- Begin page content -->
<main role="main" class="container">
    <div class="clearfix mb-3 mt-3">
        <h1 class="float-left">Daftar Barang</h1>
        <a href="<?= URL . 'barang/tambah' ?>" class="btn btn-success float-right ml-2">Tambah Barang</a>
    </div>

    <?php if (isset($status) && isset($action)) { ?>
        <?php if ($status == "success" && $action == "add") { ?>
            <div class="alert alert-success" role="alert">
                <strong>Selamat!</strong> Anda berhasil menambahkan barang.
            </div>
        <?php } else if ($status == "success" && $action == "delete") { ?>
            <div class="alert alert-success" role="alert">
                <strong>Selamat!</strong> Anda berhasil menghapus barang.
            </div>
        <?php } else if ($status == "success" && $action == "edit") { ?>
            <div class="alert alert-success" role="alert">
                <strong>Selamat!</strong> Anda berhasil mengedit barang.
            </div>
        <?php } else { ?>
            <div class="alert alert-danger" role="alert">
                <strong>Maaf!</strong> Proses gagal.
            </div>
        <?php } ?>
    <?php } ?>

    <div class="table-responsive">
        <table id="tabel_data" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Nama Barang</th>
                    <th>Keterangan</th>
                    <th>Satuan</th>
                    <th>Harga Satuan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 0;
                ?>
                <?php foreach ($data_barang as $barang) { ?>
                    <?php $count++;  ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php if (isset($barang->IdSupplier)) echo $barang->NamaSupplier; ?></td>
                        <td><?php if (isset($barang->NamaBarang)) echo $barang->NamaBarang; ?></td>
                        <td><?php if (isset($barang->Keterangan)) echo $barang->Keterangan; ?></td>
                        <td><?php if (isset($barang->Satuan)) echo $barang->Satuan; ?></td>
                        <td><?php if (isset($barang->HargaSatuan)) echo "Rp. " . number_format($barang->HargaSatuan, 0, ',', '.'); ?></td>
                        <td class="text-center">
                            <a href="<?php echo URL . 'barang/detail/' . $barang->IdBarang; ?>" class="btn btn-info">Detail</a>
                            <a href="<?php echo URL . 'barang/edit/' . $barang->IdBarang; ?>" class="btn btn-warning">Edit</a>
                            <form class="d-inline deleteData" action="<?php echo URL . 'barang/proses_hapus'; ?>" method="POST">
                                <input type="hidden" name="IdBarang" value="<?php if (isset($barang->IdBarang)) echo $barang->IdBarang; ?>">
                                <button type="submit" class="btn btn-danger" name="hapus_barang">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>