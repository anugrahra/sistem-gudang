<header>
<!-- Navbar -->
<div class="navbar-fixed row">
  <nav class="blue">
    <div class="col s11">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"><b>E</b><span class="lang">LANG</span></a>
      <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="home.php"><i class="material-icons left">home</i>Home</a></li>
        <li>
          <a class="dropDownMaster" href="#!" data-target="master-content"><i class="material-icons left">person</i><?=$_SESSION['username'];?><i class="material-icons right">arrow_drop_down</i></a>
        </li>
        <li>
          <a class="dropDownBarang" href="#!" data-target="barang-content"><i class="material-icons left">build</i>Barang<i class="material-icons right">arrow_drop_down</i></a>
        </li>
        <li>
          <a class="dropDownTransaksi" href="#!" data-target="transaksi-content"><i class="material-icons left">swap_horiz</i>Transaksi<i class="material-icons right">arrow_drop_down</i></a>
        </li>
        <li>
          <a class="dropDownLaporan" href="#!" data-target="laporan-content"><i class="material-icons left">report</i>Laporan<i class="material-icons right">arrow_drop_down</i></a>
        </li>
        <li><a href="logout.php"><i class="material-icons left">power_settings_new</i>Log Out</a></li>
      </ul>
    </div>
    </div>
  </nav>
</div>

<!-- Sidenav -->
<ul class="sidenav" id="mobile-nav">
  <li><a href="home.php">Home</a></li>
  <li>
    <a class="dropDownMasterSide" href="#!" data-target="master-content-side">Master<i class="material-icons right">arrow_drop_down</i></a>
  </li>
  <li>
    <a class="dropDownBarangSide" href="#!" data-target="barang-content-side">Barang<i class="material-icons right">arrow_drop_down</i></a>
  </li>
  <li>
    <a class="dropDownTransaksiSide" href="#!" data-target="transaksi-content-side">Transaksi<i class="material-icons right">arrow_drop_down</i></a>
  </li>
  <li>
    <a class="dropDownLaporanSide" href="#!" data-target="laporan-content-side">Laporan<i class="material-icons right">arrow_drop_down</i></a>
  </li>
  <li><a href="">Log Out</a></li>
</ul>

<!-- Dropdown Content Main -->
<ul id="master-content" class="dropdown-content">
  <li><a href="profil_user.php">Profil</a></li>
  <li class="divider"></li>
  <li><a href="list_user.php">List User</a></li>
  <li><a href="list_unit.php">List Unit</a></li>
  <li><a href="list_supplier.php">List Supplier</a></li>
</ul>

<ul id="barang-content" class="dropdown-content">
  <li><a href="list_barang.php">List Barang</a></li>
  <li><a href="list_jenis_barang.php">Jenis Barang</a></li>
</ul>

<ul id="transaksi-content" class="dropdown-content">
  <li><a href="transaksi_penerimaan.php">Penerimaan</a></li>
  <li><a href="transaksi_pengeluaran.php">Pengeluaran</a></li>
  <li class="divider"></li>
  <li><a href="kehilangan.php">Kehilangan</a></li>
</ul>

<ul id="laporan-content" class="dropdown-content">
  <li><a href="laporan_penerimaan.php">Laporan Penerimaan</a></li>
  <li><a href="laporan_pengeluaran.php">Laporan Pengeluaran</a></li>
  <li class="divider"></li>
  <li><a href="laporan_stok.php">Laporan Stok Barang</a></li>
</ul>

<!-- Dropdown Content Side -->
<ul id="master-content-side" class="dropdown-content">
  <li><a href="profil_user.php">Profil</a></li>
  <li class="divider"></li>
  <li><a href="list_user.php">List User</a></li>
  <li><a href="list_unit.php">List Unit</a></li>
  <li><a href="list_supplier.php">List Supplier</a></li>
</ul>

<ul id="barang-content-side" class="dropdown-content">
  <li><a href="list_barang.php">List Barang</a></li>
  <li><a href="list_jenis_barang.php">Jenis Barang</a></li>
</ul>

<ul id="transaksi-content-side" class="dropdown-content">
  <li><a href="transaksi_penerimaan.php">Penerimaan</a></li>
  <li><a href="transaksi_pengeluaran.php">Pengeluaran</a></li>
  <li class="divider"></li>
  <li><a href="kehilangan.php">Kehilangan</a></li>
</ul>

<ul id="laporan-content-side" class="dropdown-content">
  <li><a href="laporan_penerimaan.php">Laporan Penerimaan</a></li>
  <li><a href="laporan_pengeluaran.php">Laporan Pengeluaran</a></li>
  <li class="divider"></li>
  <li><a href="laporan_stok.php">Laporan Stok Barang</a></li>
</ul>

</header>