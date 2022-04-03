<?php

	$server = "localhost";
	$user ="root";	
	$pass = ""	;									
	$database = "pramudya";
	$koneksi= mysqli_connect($server,$user,$pass,$database) or die(mysqli_error($koneksi));


		//jika tombol submit diklik
if (isset($_POST['submit']))
{
    if($_GET['hal']=='edit')
    {
        $edit = mysqli_query($koneksi , "UPDATE tbl_042 SET 
                                         idmenu= '$_POST[ID]',
                                         nama_menu= '$_POST[NAMA]',
                                         harga= '$_POST[HARGA]',
                                         status_menu= '$_POST[STATUSMENU]'
                                         WHERE No = '$_GET[id]'
                                                ");
    if($edit)//jika sukses
    {
        echo "<script>
            alert('edit data sukses');
            document.location='data mahasiswa.php';
            </script>";
    }
    //jika gagal
    else{
        echo "<script>
            alert('edit data gagal');
            document.location='data mahasiswa.php';
            </script>";
    }   
    }else
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
            document.location='data mahasiswa.php';
            </script>";
    }
    else{
        echo "<script>
            alert('simpan data gagal');
            document.location='data mahasiswa.php';
            </script>";
    }
    }
	
}
if (isset($_GET['hal']))
{
    if($_GET['hal']=='edit')
    {
    //pengujian data yang akan diedit
    $tampil=mysqli_query($koneksi," SELECT *FROM tbl_042 WHERE No = '$_GET[id]'");
    $data=mysqli_fetch_array($tampil);
    if($data){
        $vID = $data['idmenu'];
        $vNAMA = $data['nama_menu'];
        $vHARGA = $data['harga'];
        $vSTATUSMENU = $data['status_menu'];
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
	<h1 class="text-center">HALAMAN TAMBAHKAN MENU</h1>
	<!-- awal card-->
    
	<div class="card margin-left">
		<div class="card-header bg-primary text-white">
		 Tambah Menu
		</div>
		<div class="card-body">
			<form method="post" action="">
			<div class="form-group mb-3">
				<label>ID MENU</label>
				<input type="text" name="ID" value="<?=@$vID?>" class="form-control" placeholder="ID MENU" required>
			</div>
			<div class="form-group mb-3">
				<label>NAMA MENU</label>
				<input type="text" name="NAMA" value="<?=@$vNAMA?>" class="form-control" placeholder="NAMA MENU" required>
			</div>
			<div class="form-group mb-3">
				<label>HARGA</label>
				<textarea name ="HARGA" class="form-control" placeholder="HARGA MENU" required><?=@$vHARGA?></textarea>
			</div>
			<div class="form-group mb-3" ></div>
			<label>STATUS MENU</label>
            <input type="text" name="STATUSMENU" value="<?=@$vSTATUSMENU?>" class="form-control" placeholder="STATUS MENU" required>
            <br>
			<button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
			
           
			</div>
			</form>
		</div>													
		
	  </div>
      </div>
	  <!--akhir card-->
	  
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>