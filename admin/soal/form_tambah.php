<?php
include ('../../inc/config.php');
require_once ('./function.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
		<style type="text/css">
			body {
				padding-top: 60px;
				padding-bottom: 40px;
				background: url('../../assets/img/grey.png') repeat;
			}
			.atas {
				padding-top: 9px;
			}
			label.error {
				color: red;
			}
		</style>
                <link href="../../assets/css/bootstrap.css" rel="stylesheet">
                <link href="../../assets/css/bootstrap-responsive.css" rel="stylesheet">
                <link href="../../resources/css/validationEngine.jquery.css" rel="stylesheet" type="text/css">
                <script type="text/javascript" src="../../assets/js/jquery-1.8.3.min.js"></script>
                <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../resources/js/jquery.validationEngine-en.js"></script>
                <script type="text/javascript" src="../../resources/js/jquery.validationEngine.js"></script>
		<!-- <link href="../assets/img/favicon.png" rel="shortcut icon" /> -->

		
    <script type="text/javascript">
        jQuery(document).ready(function () {
// binds form submission and fields to the validation engine
            jQuery("#formtambah").validationEngine();
        });
    </script>		
		
    
  </head>

  <body>
      <div class="well" style="width: 1200px; margin:10px auto;"> 
      <div class="container">
           
          <form action="insert.php" method="post" id="formtambah" name="formtambah">
          <a href="index.php?halaman=1" <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></a>
              <legend>Input Data Soal</legend>
            <div class="control-group">
            <label class="control-label" for="nama_hukuman">Kategori :</label>
            <div class="controls"><select name='id_kategori'id='id_kategori'>
					<?php		
                        combo_kategori($data -> id_kategori);?>
					?>
				</select>
				
			</div>
            </div>
            <div class="control-group">
            <label class="control-label" for="nama_hukuman">Pertanyaan :</label>
            <div class="controls">
                <input type="text" style="width:300px;" name="pertanyaan" class="span2 validate[required] text-input">
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="nama_hukuman">Jawaban A :</label>
            <div class="controls">
                <input type="text" style="width:300px;" name="pilihan_a" class="span2 validate[required] text-input">
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="nama_hukuman">Jawaban B :</label>
            <div class="controls">
                <input type="text" style="width:300px;" name="pilihan_b" class="span2 validate[required] text-input">
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="nama_hukuman">Jawaban C :</label>
            <div class="controls">
                <input type="text" style="width:300px;" name="pilihan_c" class="span2 validate[required] text-input">
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="nama_hukuman">Jawaban D:</label>
            <div class="controls">
            <input  type="text" style="width:300px;" name="pilihan_d" class="span2 validate[required] text-input">
            </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="nama_hukuman">Jawaban :</label>
            <div class="controls">
                <input type="text" style="width:300px;" name="jawaban" class="span2 validate[required] text-input">
            </div>
            </div>
	<?php
		if (isset($_GET['konfirmasi'])) {
			echo "<div id='form_alert' style='color:#DD1144' class='alert alert-success'>";
			echo "<a class='close' data-dismiss='alert' href='#'>x</a>Data berhasil disimpan!";
			echo "</div>";
		}
		?>

		<div class="control-group">
			<button type="submit" class="btn btn-primary">
				<i class="icon icon-plus"></i> Simpan Data
			</button>
			<button type="reset" class="btn btn-warning">
				<i class="icon icon-refresh"></i> Batal
			</button>
		</div>
            
	</form>
</div>
</div>
  </body>
</html>
