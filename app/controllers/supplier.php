<?php

class Supplier extends Controller
{
    public function index()
    {
        $menu = 'supplier';

        $status = isset($_GET['status']) ? $_GET['status'] : null;
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        $nama_supplier = isset($_GET['nama_supplier']) ? $_GET['nama_supplier'] : null;

        $supplier_model = $this->loadModel('SupplierModel');
        $data_supplier = $supplier_model->getAllSupplier($nama_supplier);

        require 'app/views/layouts/header.php';
        require 'app/views/layouts/navbar.php';
        require 'app/views/supplier/index.php';
        require 'app/views/layouts/footer.php';
    }

    public function tambah()
    {
        require 'app/views/layouts/header.php';
        require 'app/views/layouts/navbar.php';
        require 'app/views/supplier/add.php';
        require 'app/views/layouts/footer.php';
    }

    public function proses_tambah()
    {
        try {
            if (isset($_POST["tambah_supplier"])) {
                $supplier_model = $this->loadModel('SupplierModel');
                $supplier_model->setNamaSupplier($_POST["NamaSupplier"]);
                $supplier_model->setAlamatSupplier($_POST["Alamat"]);
                $supplier_model->setNoTelp($_POST["NoTelp"]);
                $supplier_model->saveSupplier();
            }            
            header('location: ' . URL . 'supplier?status=success&action=add');
        } catch (Exception $e) {
            header('location: ' . URL . 'supplier?status=error&action=edit');
        }
    }

    public function proses_hapus()
    {
        try {
            if (isset($_POST["hapus_barang"])) {
                $barang_model = $this->loadModel('BarangModel');
                $barang_model->setIdBarang($_POST["IdBarang"]);
                $barang_model->deleteBarang();
            }

            header('location: ' . URL . 'barang?status=success&action=delete');
        } catch (Exception $e) {
            header('location: ' . URL . 'barang?status=error&action=edit');
        }
    }

    public function edit($id)
    {
        $supplier_model = $this->loadModel('SupplierModel');
        $data_supplier = $supplier_model->getAllSupplier();

        $barang_model = $this->loadModel('BarangModel');
        $barang_model->setIdBarang($id);
        $data_barang = $barang_model->getBarangById();

        require 'app/views/layouts/header.php';
        require 'app/views/layouts/navbar.php';
        require 'app/views/barang/edit.php';
        require 'app/views/layouts/footer.php';
    }

    public function proses_edit()
    {
        try {
            if (isset($_POST["edit_barang"])) {
                $barang_model = $this->loadModel('BarangModel');
                $barang_model->setIdBarang($_POST["IdBarang"]);
                $barang_model->setIdPengguna(null);
                $barang_model->setIdSupplier($_POST["IdSupplier"]);
                $barang_model->setNamaBarang($_POST["NamaBarang"]);
                $barang_model->setKeterangan($_POST["Keterangan"]);
                $barang_model->setSatuan($_POST["Satuan"]);
                $barang_model->setHargaSatuan($_POST["HargaSatuan"]);
                $barang_model->setStok($_POST["Stok"]);
                $barang_model->setJumlahMinimalBarang($_POST["JumlahMinimalBarang"]);
                $barang_model->setJumlahMaksimalBarang($_POST["JumlahMaksimalBarang"]);
                $barang_model->editBarang();
            }

            header('location: ' . URL . 'barang?status=success&action=edit');
        } catch (Exception $e) {
            header('location: ' . URL . 'barang?status=error&action=edit');
        }
    }

    public function detail($id)
    {
        $supplier_model = $this->loadModel('SupplierModel');
        $data_supplier = $supplier_model->getAllSupplier();

        $barang_model = $this->loadModel('BarangModel');
        $barang_model->setIdBarang($id);
        $data_barang = $barang_model->getBarangById();

        require 'app/views/layouts/header.php';
        require 'app/views/layouts/navbar.php';
        require 'app/views/barang/detail.php';
        require 'app/views/layouts/footer.php';
    }
}
