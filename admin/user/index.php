<?php
session_start();
require_once '../../inc/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Computer Based-Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../resources/css/validationEngine.jquery.css" rel="stylesheet" type="text/css">
    <link href="../../resources/css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../../resources/js/jquery.js"></script>
    <style type="text/css">
        body {
            background-image: url('../../resources/img/grey.png');
        }
    </style>
    <script type="text/javascript" src="../../assets/js/bootstrap-dropdown.js"></script>
	
  </head>

  <body>
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
            <div  class="nav-collapse collapse">
            <ul class="nav">
                <li><a href="../MenuUtama.php"><i class="icon-home icon-white"></i> Beranda</a></li>
			  <li class="dropdown">
			  	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book icon-white"></i> Data Master <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?halaman=1"=1">Data User</a></li>
                  <li><a href="#">Data Calon Mahasiswa</a></li>
                </ul>
			  </li>
			  <li class="dropdown">
			  	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-folder-open icon-white"></i> Setting<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="../grade/index.php?halaman=1">Setting Grade Lulus</a></li>
                  <li><a href="../kategori/index.php?halaman=1">Setting Kategori</a></li>
                  <li><a href="../soal/index.php?halaman=1">Setting Soal Text</a></li>
                  <li><a href="../soalgambar/index.php?halaman=1">Setting Soal Gambar</a></li>
                  <li><a href="../waktu/index.php?halaman=1">Setting Waktu</a></li>
                </ul>
              </li>
            </ul>
            <div class="btn-group pull-right">
                <button class="btn btn-primary"><i class="icon-user icon-white"></i><?php echo "".$_SESSION['username'].""; ?></button>
			  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
                                <li><a href="logout.php"><i class="icon-off"></i>Log Out</a></li>
			  </ul>
			</div>
          </div><!--/.nav-collapse -->
         
        </div>
             
         </div>
         <div class="well" style="width: 1200px; margin:10px auto;">
             <div class="navbar navbar-inverse">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="brand" href="#">Data </a>
		  <div class="nav-collapse">
			<ul class="nav">
                            <li><a href="form_tambah.php" class="small-box"><i class="icon-plus-sign icon-white"></i> Tambah Data User</a></li>
			</ul>
		  </div>
                  <form name="user_form_search" action="" method="post" class="form-search">
			<div class="navbar-form pull-right">	
                      <input type="text" class="span3" name="username" placeholder="Masukkan Username"/>
                                <a href='search.php' class="btn btn-primary" ><i class='icon-list'></i>All</a>
		</div>
                  </form>
			<!-- END OF FORM PENCARIAN -->
                  		</div>
	  </div><!-- /navbar-inner -->
             </div><!-- /navbar -->
          <!-- Table -->                  
<table class="table table-hover table-condensed">
	<thead>
    <tr>
        <th>No</th>
	<th>User Name</th>
	<th>Nama</th>
	<th>Telepon</th>
        <th>Alamat</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
	
	<?php
$batas=5;
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
$query="SELECT id_admin,username,nama,telepon,alamat,role FROM admin ORDER BY username LIMIT $posisi,$batas";
$query_page="SELECT username FROM admin";
if(isset($_POST['username'])){
$username=$_POST['username'];
$query="SELECT id_admin,username,nama,telepon,alamat,role FROM admin WHERE username LIKE '%$username%'";
	$query_page="SELECT username FROM admin WHERE username LIKE '%$username%'";
}
$result=mysql_query($query) or die(mysql_error());
$no=0;
//proses menampilkan data
while($rows=mysql_fetch_array($result)){
			?>
	<tr>
		<!-- <td><?php echo $no++; ?></td> -->
		<td><?php echo $no+$posisi; ?></td>
		<td><?php echo $rows['username']; ?></td>
                <td><?php echo $rows['nama']; ?></td>
                <td><?php echo $rows['telepon']; ?></td>
                <td><?php echo $rows['alamat']; ?></td>
                <td><?php echo $rows['role']; ?></td>
		<td align="center">
                    <a href="from_update.php?id_admin=<?php echo $rows['id_admin']; ?>" class="btn btn-warning">
				<i class="icon-pencil"></i>Update</a>
			<a href="delete.php?id_admin=<?php echo $rows['id_admin']; ?>" 
				onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger">
				<i class="icon-trash"></i>Hapus</a>
		</td>
	</tr>
	
	<?php
	}
	?>
	    </tbody>
</table>
<?php

$result_page = mysql_query($query_page);
$jmldata = mysql_num_rows($result_page);
$jmlhalaman = ceil($jmldata / $batas);
 
echo "<div class='pagination'><ul>"; 
for($i=1;$i<=$jmlhalaman;$i++) 
    echo "<li> <a href=$_SERVER[PHP_SELF]?halaman=$i>$i</a></li>"; 
?>
</ul>
</div>

<!-- MENAMPILKAN JUMLAH DATA -->
<div class="container">
	<div class="well">

	<?php
	echo "Jumlah Data : $jmldata";	
	?>
	</div>
</div>
<!-- END OF MENAMPILKAN JUMLAH DATA -->
         </div>
    </div>
  </body>
</html>
