const sideNav = document.querySelectorAll('.sidenav');
M.Sidenav.init(sideNav);

const dropDownMaster = document.querySelectorAll('.dropDownMaster');
M.Dropdown.init(dropDownMaster);

const dropDownBarang = document.querySelectorAll('.dropDownBarang');
M.Dropdown.init(dropDownBarang);

const dropDownTransaksi = document.querySelectorAll('.dropDownTransaksi');
M.Dropdown.init(dropDownTransaksi);

const dropDownLaporan = document.querySelectorAll('.dropDownLaporan');
M.Dropdown.init(dropDownLaporan);

const dropDownMasterSide = document.querySelectorAll('.dropDownMasterSide');
M.Dropdown.init(dropDownMasterSide);

const dropDownBarangSide = document.querySelectorAll('.dropDownBarangSide');
M.Dropdown.init(dropDownBarangSide);

const dropDownTransaksiSide = document.querySelectorAll('.dropDownTransaksiSide');
M.Dropdown.init(dropDownTransaksiSide);

const dropDownLaporanSide = document.querySelectorAll('.dropDownLaporanSide');
M.Dropdown.init(dropDownLaporanSide);

const selek = document.querySelectorAll('.selek');
M.FormSelect.init(selek);

function tampilkan_form(){
  $('.tampilkanForm').toggle("slow");
}

function tampilkan_cari(){
  $('.tampilkanCari').toggle("slow");
}

function tampilkan_cariHome() {
  $('.tampilkanCariHome').toggle("slow");
}

function tampilkan_pemesanan() {
  $('.tampilkanPemesanan').toggle("slow");
}

function tampilkan_pilihLaporan() {
  $('.tampilkanPilihLaporan').toggle("slow");
}

function tampilkan_listPenerimaan(){
	$('.tampilkanListPenerimaan').toggle("slow");
}

function printContent(cetakLaporan){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(cetakLaporan).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}

document.querySelector("#tglSekarang").valueAsDate = new Date();