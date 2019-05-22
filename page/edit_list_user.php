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

			$id = $_GET['id'];

      //MENAMPILKAN DATA AWAL
      if(isset($_GET['id'])){
        $user = akun_per_id($id);
        while ($row = mysqli_fetch_assoc($user)){
          $username_awal = $row['username'];
          $password_awal = $row['password'];
        }
      }

			//SUBMIT DATA KE FUNGSI EDIT_DATA_USER
			if(isset($_POST['submit'])){
				$username   = $_POST['username'];
        $password   = $_POST['password'];
        $repassword = $_POST['repassword'];

				//MENGIRIM DATA SUPPLIER KE DATABASE
				if(!empty($username) && !empty($password)  && !empty($repassword)){
          if($password == $repassword){
            if(edit_data_user($username, $password, $id)){
              header('location: list_user.php');
            }else{
              echo "<script>alert('Ada masalah ketika mengedit data user!');</script>";
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
						<h4><center><b>EDIT DATA USER</b></center></h4>
					</div>
				</div>

				<form action="" method="post" class="z-depth-1">
					<div class="row">
						<div class="col s12">  
							<div class="input-field col s6">
								<label for="username">Username</label>
								<input name="username" type="text" class="validate" value="<?=$username_awal;?>">
							</div>
						</div>
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="password">Password</label>
                <input name="password" type="password" class="validate" value="<?=$password_awal;?>">
              </div>
            </div>
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="repassword">Ulangi Password</label>
                <input name="repassword" type="password" class="validate" value="<?=$password_awal;?>">
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

			</main>

			<?php
			require_once "../aset/view/footer.php";
			require_once "../aset/view/footcontent.php";
			?>
		</body>
	</html>