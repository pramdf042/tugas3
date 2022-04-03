<?php

	$server = "localhost";
	$user ="root";	
	$pass = ""	;									
	$database = "pramudya";
	$koneksi= mysqli_connect($server,$user,$pass,$database) or die(mysqli_error($koneksi));


		//jika tombol submit diklik
if (isset($_POST['submit']))
{
	$submit = mysqli_query($koneksi , "INSERT INTO tbl_042 (idmenu,nama_menu,harga,status_menu)
	Values ('$_POST[ID]',
			'$_POST[NAMA]',
			'$_POST[HARGA]',
			'$_POST[STATUSMENU]')
		");
if($submit)
{
	echo "<script>
		alert('simpan data sukses');
		document.location='index.php';
		</script>";
}
else{
	echo "<script>
		alert('simpan data gagal');
		document.location='index.php';
		</script>";
}
}
	//pengujian edit
	if (isset($_GET['hal']))
	{
		if($_GET['hal']=='edit')
		{
		//pengujian data yang akan diedit
		$tampil=mysqli_query($koneksi," SELECT *FROM tbl_042 WHERE No = '$_GET[id]'");
		$data=mysqli_fetch_array($tampil);
		if($data){
			$vnim = $data['ID'];
			$vnim = $data['NAMA'];
			$vnim = $data['HARGA'];
			$vnim = $data['STATUSMENU'];
		}
		}else if ($_GET['hal']=='hapus'){
			$hapus= mysqli_query($koneksi, "DELETE from tbl_042 where No = '$_GET[id]'");
			if($hapus){
				echo "<script>
				alert('Hapus data sukses');
				document.location='data mahasiswa.php';
				</script>";
			}
		}
	}
	
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>crud</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<body>
	<div class="container">
	  <!--awal tabel-->
	  <div class="card">
		<div class="card-header bg-primary text-white">
		  DAFTAR MENU
		</div>
		<div class="card-body" >
		 <table class="table table-bordered table-striped">
			 <tr>
				 <th>No</th>
				 <th>ID MENU</th>
				 <th>NAMA MENU</th>
				 <th>HARGA</th>
				 <th>STATUS MENU</th>
				 <th>Opsi</th>
			 </tr>
			 <?php
			 $No = 1;
			 $tampil = mysqli_query($koneksi, "SELECT * from tbl_042 order by No desc");
			 while($data = mysqli_fetch_array($tampil)):
			 ?>
			 <tr>
				 <td><?=$No++;?></td>
				 <td><?=$data['idmenu']?></td>
				 <td><?=$data['nama_menu']?></td>
				 <td><?=$data['harga']?></td>
				 <td><?=$data['status_menu']?></td>
				 <td>
					 <a href="tambah data.php?hal=edit&id=<?=$data['No']?>" class="fa-solid fa-pen"></a>&nbsp;&nbsp;
					 <a href="data mahasiswa.php?hal=hapus&id=<?=$data['No']?>" class="fa-solid fa-trash-can"></a>
				 </td>
			 </tr>
			 <?php
			 endwhile;
			 ?>
			 </table>
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="fa-solid fa-user-plus fa-sm" href="tambah data.php">Tambah Menu</a>
			 			
		</div>
	  </div>
	  </div>
	  <!--akhir tabel-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>