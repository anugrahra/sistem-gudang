<!DOCTYPE html>
	<html>
		<head>
			<?php require_once "../aset/view/headcontent.php"; ?>
		</head>

		<body>
			<?php    
			ob_start();
			session_start();
			if(!isset($_SESSION['username'])) header('location:../index.php');

			require_once "../aset/view/header.php";
			require_once "../fungsi/db.php";
			require_once "../fungsi/fungsi.php";

			//SETTING FUNGSI
			$nourut = 1;
			$user = tampilkan_user();

			//SUBMIT DATA KE FUNGSI TAMBAH_USER
			if(isset($_POST['submit'])){
				$username   = $_POST['username'];
        $password   = $_POST['password'];
        $repassword = $_POST['repassword'];
        $level      = $_POST['level'];

				//MENGIRIM DATA SUPPLIER KE DATABASE
				if(!empty($username) && !empty($password)  && !empty($repassword) && !empty($level)){
          if($password == $repassword){
            if(tambah_user($username, $password, $level)){
              header('location: list_user.php');
            }else{
              echo "<script>alert('Ada masalah ketika menambah data user!');</script>";
            } 
          }else{
          	echo "<script>alert('Password tidak cocok!');</script>";
          }
				}else{
					echo "<script>alert('Data tidak boleh kosong!');</script>";
				}
			}

			?>

			<main>

				<div class="row">
					<div class="col s12">
						<h4><center><b>LIST USER</b></center></h4>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<button class="btn waves-effect waves-light" onClick="tampilkan_form()">Tambah User
							<i class="material-icons left">arrow_forward</i>
						</button>
					</div>
				</div>

				<form action="" method="post" class="tampilkanForm z-depth-1" style="display: none;">
					<div class="row">
						<div class="col s12">  
							<div class="input-field col s6">
								<label for="username">Username</label>
								<input name="username" type="text" class="validate">
							</div>
						</div>
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="password">Password</label>
                <input name="password" type="password" class="validate">
              </div>
            </div>
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="repassword">Ulangi Password</label>
                <input name="repassword" type="password" class="validate">
              </div>
            </div>
            <div class="col s12">  
              <div class="input-field col s6">
                <select name="level" type="text" class="validate selek">
                  <option value="" disabled selected>Pilih level user</option>
                  <option value="1">1 | Super Admin</option>
                  <option value="2">2 | Regular Admin</option>
                </select>
                <label for="level">Level</label>
              </div>
            </div>
					</div>
					<div class="row">
						<div class="col s12">
							<button class="btn waves-effect waves-light" type="submit" name="submit">Simpan
								<i class="material-icons left">check</i>
							</button>
							<button class="btn red lighten-1 waves-effect waves-light" type="reset">Batal
								<i class="material-icons left">clear</i>
							</button>
						</div>
					</div>
					<br>
				</form>

				<div class="row">
					<div class="col s12">
						<table class="striped responsive-table">
							<thead>
								<tr>
									<th>No</th>
									<th>User</th>
	            		<th>Level</th>
	            		<th></th>
	            		<th></th>
								</tr>
							</thead>
							<tbody>
								<?php while($row = mysqli_fetch_assoc($user)):
									if($row['level'] == 1){
										$level = 'Super Admin';
									}else{
										$level = 'Regular Admin';
									}
									$sembunyi = '';
									// if($_SESSION['level'] > 1){
									// 	$sembunyi = 'style="display: none;"';
									// }else{
									// 	$sembunyi = '';
									// }
								?>
								<tr>
									<td><?=$nourut++;?></td>
									<td><?=$row['username'];?></td>
                 	<td><?=$level;?></td>
                 	<td><a href="edit_list_user.php?id=<?=$row['id'];?>"<?=$sembunyi;?>>Edit</a></td>
                 	<td><a href="hapus_user.php?id=<?=$row['id'];?>" class="red-text" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" <?=$sembunyi;?>>Hapus</a></td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>

			</main>

			<?php
			require_once "../aset/view/footer.php";
			require_once "../aset/view/footcontent.php";
			?>
		</body>
	</html>