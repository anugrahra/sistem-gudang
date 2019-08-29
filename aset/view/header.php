<header>
<!-- Navbar -->
<div class="navbar-fixed row">
  <nav class="blue">
    <div class="col s11">
    <div class="nav-wrapper">
      <a href="home.php" class="brand-logo"><b>E</b><span class="lang">LANG</span></a>
      <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="home.php"><i class="material-icons left">home</i>Beranda</a></li>
        <li>
          <a class="dropDownMaster" href="#!" data-target="master-content"><i class="material-icons left">person</i><?=$_SESSION['username'];?><i class="material-icons right">arrow_drop_down</i></a>
        </li>
        <li>
          <a class="" href="list_barang.php"><i class="material-icons left">build</i>Barang</a>
        </li>
        <li>
          <a class="dropDownTransaksi" href="#!" data-target="transaksi-content"><i class="material-icons left">swap_horiz</i>Transaksi<i class="material-icons right">arrow_drop_down</i></a>
        </li>
        <li>
          <a class="dropDownLaporan" href="#!" data-target="laporan-content"><i class="material-icons left">report</i>Laporan<i class="material-icons right">arrow_drop_down</i></a>
        </li>
        <li><a href="logout.php"><i class="material-icons left">power_settings_new</i>Keluar</a></li>
      </ul>
    </div>
    </div>
  </nav>
</div>

<!-- Sidenav -->
<ul class="sidenav" id="mobile-nav">
  <li><a href="home.php">Beranda</a></li>
  <li>
    <a class="dropDownMasterSide" href="#!" data-target="master-content-side">Master<i class="material-icons right">arrow_drop_down</i></a>
  </li>
  <li>
    <a class="" href="list_barang.php">Barang</a>
  </li>
  <li>
    <a class="dropDownTransaksiSide" href="#!" data-target="transaksi-content-side">Transaksi<i class="material-icons right">arrow_drop_down</i></a>
  </li>
  <li>
    <a class="dropDownLaporanSide" href="#!" data-target="laporan-content-side">Laporan<i class="material-icons right">arrow_drop_down</i></a>
  </li>
  <li><a href="logout.php">Log Out</a></li>
</ul>

<!-- Dropdown Content Main -->
<ul id="master-content" class="dropdown-content">
  <li><a href="profil_user.php">Profil</a></li>
  <li class="divider"></li>
  <li><a href="list_user.php">Daftar Pengguna</a></li>
  <li><a href="list_unit.php">Daftar Unit</a></li>
  <li><a href="list_supplier.php">Daftar Pemasok</a></li>
</ul>

<ul id="transaksi-content" class="dropdown-content">
  <li><a href="transaksi_penerimaan.php">Penerimaan</a></li>
  <li><a href="transaksi_pengeluaran.php">Pengeluaran</a></li>
  <li class="divider"></li>
  <li><a href="pemesanan.php">Pemesanan</a></li>
  <li class="divider"></li>
  <li><a href="kehilangan.php">Kehilangan</a></li>
</ul>

<ul id="laporan-content" class="dropdown-content">
  <li><a href="stock_opname.php">Stock Opname</a></li>
  <li class="divider"></li>
  <li><a href="laporan_penerimaan.php">Laporan Penerimaan</a></li>
  <li><a href="laporan_pengeluaran.php">Laporan Pengeluaran</a></li>
  <li class="divider"></li>
  <li><a href="laporan_pemesanan.php">Laporan Pemesanan</a></li>
</ul>

<!-- Dropdown Content Side -->
<ul id="master-content-side" class="dropdown-content">
  <li><a href="profil_user.php">Profil</a></li>
  <li class="divider"></li>
  <li><a href="list_user.php">Daftar User</a></li>
  <li><a href="list_unit.php">Daftar Unit</a></li>
  <li><a href="list_supplier.php">Daftar Pemasok</a></li>
</ul>

<ul id="transaksi-content-side" class="dropdown-content">
  <li><a href="transaksi_penerimaan.php">Penerimaan</a></li>
  <li><a href="transaksi_pengeluaran.php">Pengeluaran</a></li>
  <li class="divider"></li>
  <li><a href="pemesanan.php">Pemesanan</a></li>
  <li class="divider"></li>
  <li><a href="kehilangan.php">Kehilangan</a></li>
</ul>

<ul id="laporan-content-side" class="dropdown-content">
  <li><a href="stock_opname.php">Stock Opname</a></li>
  <li class="divider"></li>
  <li><a href="laporan_penerimaan.php">Laporan Penerimaan</a></li>
  <li><a href="laporan_pengeluaran.php">Laporan Pengeluaran</a></li>
  <li class="divider"></li>
  <li><a href="laporan_pemesanan.php">Laporan Pemesanan</a></li>
</ul>

</header>