<?php
	include "connection.php";

	if(isset($_POST['btnlogin'])) {
		$username = $_POST['username'];
		$password = $_POST['sandi'];

		//Cek db username dan password yang sama
		$query = mysqli_query($connect, "SELECT * FROM akun WHERE username = '$username' AND password = '$password'");
		$count = mysqli_num_rows($query);

		//Jika tidak dapat mengakses db
		if(!$query) {
			echo "OOPS! SOMETHING WRONG :(<br>".$enter."<br>".mysqli_error($connect);
		}
		
		//Jika ditemukan username yang sama
		if ($count != 0) {
			while ($row = mysqli_fetch_array($query)) {
				$id = $row['id_admin'];
				$u = $row['username'];
				$p = $row['password'];				

				header("location: admin/home.php");
				$_SESSION['username'] = $u;
				$_SESSION['id_user'] = $id;
				die;	
			}
		}
		else {
			echo "<h1 class='text-center'>Wrong username or password</h1>";
			echo "<h3><a href='index.php'>Back</a></h3>";
			die;
		}
	}
	//Menghentian koneksi ke db
	mysqli_close($connect);
?>