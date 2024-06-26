<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="<?php echo URL; ?>">Toko Makmur</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if (isset($menu) && $menu == 'dashboard') echo 'active'; ?>">
                    <a class="nav-link" href="<?php echo URL; ?>">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php if (isset($menu) && $menu == 'barang') echo 'active'; ?>">
                    <a class="nav-link" href="<?php echo URL; ?>barang/index">Barang</a>
                </li>
                <li class="nav-item <?php if (isset($menu) && $menu == 'supplier') echo 'active'; ?>">
                    <a class="nav-link" href="<?php echo URL; ?>supplier/index">Supplier</a>
                </li>
                <li class="nav-item <?php if (isset($menu) && $menu == 'pelanggan') echo 'active'; ?>">
                    <a class="nav-link" href="<?php echo URL; ?>pelanggan/index">Pelanggan</a>
                </li>
                <li class="nav-item <?php if (isset($menu) && $menu == 'pengguna') echo 'active'; ?>">
                    <a class="nav-link" href="<?php echo URL; ?>pengguna/index">Pengguna</a>
                </li>
            </ul>
            <!-- Add logout link -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>