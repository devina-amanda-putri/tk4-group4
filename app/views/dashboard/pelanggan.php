<!-- Begin page content -->
<main role="main" class="container">
    <div class="mt-5">
        <h2>Dashboard</h2>
    </div>
    <div class="row mt-5">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-white bg-danger">
                    <h5 class="card-title">Total Transaksi Pembelian:</h5>
                    <h2 class="card-text">Rp. <?php echo number_format($data['total_harga_beli'], 0, ',', '.'); ?></h2>
                </div>
            </div>
        </div>
    </div>

</main>