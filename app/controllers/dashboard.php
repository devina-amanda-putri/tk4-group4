<?php

class DasborController extends Controller
{
    public function index()
    {

        // hitung total harga beli
        $totalHargaBeli = 0;
        $pembelian_model = $this->loadModel('PembelianModel');
        $pembelian = $pembelian_model->getAllPembelian();
        foreach ($pembelian as $pembelian_item) {
            $totalHargaBeli += $pembelian_item->HargaBeli * $pembelian_item->JumlahPembelian;
        }

        // hitung total harga jual
        $totalHargaJual = 0;
        $penjualan_model = $this->loadModel('PenjualanModel');
        $penjualan = $penjualan_model->getAllPenjualan();
        foreach ($penjualan as $penjualan_item) {
            $totalHargaJual += $penjualan_item->HargaJual * $penjualan_item->JumlahPenjualan;
        }

        // hitung laba rugi
        $labaRugi = $totalHargaJual - $totalHargaBeli;

        // kirim data ke view
        $data['total_harga_beli'] = $totalHargaBeli;
        $data['total_harga_jual'] = $totalHargaJual;
        $data['laba_rugi'] = $labaRugi;

        $menu = 'dashboard';
        require 'app/views/layouts/header.php';
        if($_SESSION['hak_akses'] == 'Admin'){
            require 'app/views/dashboard/index.php';
            require 'app/views/layouts/navbar.php';
        }else if($_SESSION['hak_akses'] == 'Supplier'){
            require 'app/views/dashboard/index.php';
            require 'app/views/layouts/navbar_supplier.php';
        }else{
            require 'app/views/dashboard/pelanggan.php';   
            require 'app/views/layouts/navbar_pelanggan.php';
        }
        require 'app/views/layouts/footer.php';
    }
}
