<!-- Begin page content -->
<main role="main" class="container">
    <div class="clearfix mb-3 mt-3">
        <h1 class="float-left">Daftar Pengguna</h1>
        <a href="<?= URL . 'supplier/tambah' ?>" class="btn btn-success float-right ml-2">Tambah Pengguna</a>
    </div>

    <?php if (isset($status) && isset($action)) { ?>
        <?php if ($status == "success" && $action == "add") { ?>
            <div class="alert alert-success" role="alert">
                <strong>Selamat!</strong> Anda berhasil menambahkan Supplier.
            </div>
        <?php } else if ($status == "success" && $action == "delete") { ?>
            <div class="alert alert-success" role="alert">
                <strong>Selamat!</strong> Anda berhasil menghapus Supplier.
            </div>
        <?php } else if ($status == "success" && $action == "edit") { ?>
            <div class="alert alert-success" role="alert">
                <strong>Selamat!</strong> Anda berhasil mengedit Supplier.
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
                    <th>Nama Pengguna</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 0;
                ?>
                <?php foreach ($data_pengguna as $pengguna) { ?>
                    <?php $count++;  ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php if (isset($pengguna->NamaPengguna)) echo $pengguna->NamaPengguna; ?></td>
                        <td><?php if (isset($pengguna->Alamat)) echo $pengguna->Alamat; ?></td>
                        <td><?php if (isset($pengguna->NoHp)) echo $pengguna->NoHp; ?></td>
                        <td class="text-center">
                            <a href="<?php echo URL . 'supplier/detail/' . $pengguna->Idsupplier; ?>" class="btn btn-info">Detail</a>
                            <a href="<?php echo URL . 'supplier/edit/' . $pengguna->Idsupplier; ?>" class="btn btn-warning">Edit</a>
                            <form class="d-inline deleteData" action="<?php echo URL . 'supplier/proses_hapus'; ?>" method="POST">
                                <input type="hidden" name="Idsupplier" value="<?php if (isset($pengguna->Idsupplier)) echo $pengguna->Idsupplier; ?>">
                                <button type="submit" class="btn btn-danger" name="hapus_supplier">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>