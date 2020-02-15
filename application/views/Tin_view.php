
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quan ly tin</title>
	<!-- <meta charset="utf-8"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>quanlytin.css">
	
</head>
<body>

<?php 
	include 'header_backend.php';
?>
<?php if(($this->session->has_userdata('email')) != "admin@gmail.com") {
			redirect('http://localhost:8888/tintuc/tintuc','refresh');//chuyen huong
			?>
		<?php } ?>
	<div class="container-fluid thanquanlytin">
		<div class="row">
			<div class="col-sm-6 themmoi">
				<div class="formthemmoi">
					<form action="<?= base_url(); ?>controller/themmoitin" method="POST" enctype="multipart/form-data">
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Tieu de tin</label>
							<input name="tieude" type="text" class="form-control" id="tieude" placeholder="Tieu de">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Danh muc tin</label>
							<select class="form-control" name="iddanhmuc">
								<?php foreach ($dulieudanhmuc as $value): ?>
									<option value="<?= $value['id'] ?>"><?= $value['tendanhmuc'] ?></option>
								<?php endforeach ?>
							</select>
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Trích dẫn</label>
							<input name="trichdan" type="text" class="form-control" placeholder="Ảnh tin ">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Ảnh tin</label>
							<input name="anhtin" type="file" class="form-control" placeholder="Ảnh tin ">
						</fieldset>

						<fieldset class="form-group">
							<label for="formGroupExampleInput">Noi dung tin</label>
							<textarea name="noidungtin" id="noidungtin" cols="30" rows="10" class="noidungtin"></textarea>
						</fieldset>
						<fieldset class="form-group">
							<input type="submit" class="form-control" id="formGroupExampleInput2" placeholder="Example input" value="Thêm tin">
						</fieldset>
					</form>
				</div>
			</div>
			<div class="col-sm-6 danhsach">
				<div class="row">
					
					<div class="card-group">

						<?php foreach ($dulieutin as $value): ?>
							
							
							<div class="col-sm-4">
								<div class="card">
									<?php 
									if(empty($value['anhtin'])){
										?>
										<img class="card-img-top img-fluid" src="http://placehold.it/700x300" alt="Card image cap">
									<?php }
									else { ?>

										<img class="card-img-top img-fluid" src="<?= $value['anhtin'] ?>" alt="Card image cap">

									<?php } ?>
									<div class="card-block">
										<h4 class="card-title"><?= $value['tieude'] ?></h4>
										<p class="card-text"><?= $value['trichdan'] ?></p>
										<!-- <p class="card-text"><?= $value['noidungtin'] ?></p> -->
										<p class="card-text"><small class="text-muted">Đăng vào: <?= date('G:i-d/m/Y',$value['ngaytao']) ?></small></p>

										<a 
										href="<?= base_url(); ?>/controller/suatin/<?= $value['id'] ?>"
										class="btn btn-outline-success sua">
										<i class="fa fa-pencil"></i>
									</a>
								</div>
							</div>
							
						</div>
					<?php endforeach ?>		
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
	<script src="<?= base_url() ?>/ckeditor/ckfinder/ckfinder.js"></script>
	<script >
		CKEDITOR.replace( 'noidungtin', {
			filebrowserBrowseUrl: '<?= base_url() ?>'+'/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl: '<?= base_url() ?>'+'/ckfinder/ckfinder.html?Type=Images',
			filebrowserUploadUrl: '<?= base_url() ?>'+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl: '<?= base_url() ?>'+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserWindowWidth : '1000',
			filebrowserWindowHeight : '700'
		});
	</script>
</body>
</html>