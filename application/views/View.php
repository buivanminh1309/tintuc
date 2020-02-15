<!DOCTYPE html>
<html lang="en"><head>
	<title> Trang chủ </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>danhmuc.css">
</head>
<body >
	
	<?php 
	include 'header_backend.php';
	?>
	<div class="container danhmuctin">
		<div class="row">
			<div class="col-sm-6 formthem">
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Ten danh muc</label>
					<input name="tendanhmuc" type="text" class="form-control" id="tendanhmuc" placeholder="Ten danh muc">
				</fieldset>
				<fieldset class="form-group">
					<input type="submit" class="form-control" id="themdanhmuc" >
				</fieldset>
			</div>

			<div class="col-sm-6 cacdanhmuc">
				<?php foreach ($dulieu as $motketqua): ?>
					<div class="card card-inverse card-primary mb-3 text-center">
						<div class="card-block">
							<div class="thaotac text-xs-right">
								<a   data-href="<?php echo base_url(); ?>/controller/suadanhmuc/<?= $motketqua['id'] ?>" class="nutedit btn btn-danger"> <i class="fa fa-pencil"></i></a>
								<a    data-href="<?= $motketqua['id'] ?>" class="nutxoa btn btn-warning"> <i class="fa fa-remove"></i></a>
							</div>
							<div class="jquery_button text-xs-right hidden-xs-up">
								<a href="" class="btn btn-success nutluu"> Lưu </a>
							</div>
							<h4 class="card-blockquote">
								<fieldset class="form-group jquery_tendanhmuc   hidden-xs-up">
									<input type="hidden" class="form-control id" value="<?= $motketqua['id']; ?>">
									<input type="text" class="form-control tendanhmucsua"  value="<?= $motketqua['tendanhmuc']; ?>">
								</fieldset>
								<div class="noidung_ten">
									<?= $motketqua['tendanhmuc']; ?>
								</div>
							</h4> 	
						</div>
					</div> <!-- het mot danh mục -->
				<?php endforeach ?>

			</div>

		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>

	<script >
		var duongdan = '<?php echo base_url(); ?>';
		$(function(){
			$('body').on('click', '.nutedit', function(event) {

				$(this).parent().addClass('hidden-xs-up');
				$(this).parent().next().next().find('.noidung_ten').addClass('hidden-xs-up');
				$(this).parent().next().removeClass('hidden-xs-up');

				$(this).parent().next().next().find('.jquery_tendanhmuc').removeClass('hidden-xs-up');

 			// sử dụng ajax để kết nối với controller cập nhật dữ liệu 
 			event.preventDefault();
 			/* Act on the event */
 		});

			
			
			$('#themdanhmuc').click(function(event){
				var tendanhmuc = $('#tendanhmuc').val();
				$.ajax({
					url: duongdan+'controller/addAjax',	
					type: 'POST',
					dataType: 'json',
					data: {tendanhmuc: $('#tendanhmuc').val()},
					// success: function(res){
						// console.log(res);
					// }
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function(res) {
					console.log(res);
					noidung = '<div class="card card-inverse card-primary mb-3 text-center">';
					noidung += '<div class="card-block">';
					noidung += '<div class="thaotac text-xs-right">';
					noidung += '<a data-href="'+res+'" class="nutsua btn btn-danger"><i class="fa fa-pencil"></i></a>';
					noidung += '<a data-href="'+res+'" class="nutxoa btn btn-warning"><i class="fa fa-remove"></i></a>';
					noidung += '</div>';
					noidung += '<h3 class="card-blockquote">';
					noidung += $('#tendanhmuc').val();
					noidung += '</h3>';
					noidung += '</div>';
					noidung += '</div>';
					$('.cacdanhmuc').append(noidung);
						$('#tendanhmuc').val('');//xóa cache
					});

			});

			$('body').on('click', '.nutxoa', function(event){ //luon nhan su thay doi
				// $('.nutxoa').click(function(event){
					idxoa = $(this).data('href');
					thangcanxoa = $(this).parent().parent().parent();
					$.ajax({
						url: duongdan+'controller/removeAjax/'+idxoa,
						type: 'POST',
						dataType: 'json'

					})
					.done(function() {
						console.log("success");
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
						thangcanxoa.remove();
					});
				});

			$('body').on('click', '.nutluu', function(event) {
 			 giatriten = $(this) // la .nutluu
 			 .parent()  //  doi tuong .jquery button
 			 .next()  // cardblock
 			 .children('.jquery_tendanhmuc') // doi tuong jquery_tendanhmuc
 			 .children('.tendanhmucsua').val();
 			 giatriid = $(this).parent().next().children('.jquery_tendanhmuc').children('.id').val();
 			// console.log(giatriten);		
 			// console.log(giatriid);		
 			
 			phantu1 = $(this).parent().addClass('hidden-xs-up');
 			phantu2 = $(this).parent().next().children('.jquery_tendanhmuc').addClass('hidden-xs-up');

 			noidung = $(this).parent().next().children('.jquery_tendanhmuc').children('.tendanhmucsua').val();

 			hienthi1 = $(this).parent().prev().removeClass('hidden-xs-up');
 			hienthi2 = $(this).parent()
 			.next()
 			.children('.noidung_ten')
 			 .html(noidung) // set noi dung
 			 .removeClass('hidden-xs-up');  // cho hien thi lai 
 			 idxoa = $(this).data('href');
 			 $.ajax({
 			 	url: duongdan+'controller/updatedanhmuc/'+idxoa,
 			 	type: 'POST',
 			 	dataType: 'json',
 			 	data: {
 			 		tendanhmuc: giatriten,
 			 		id: giatriid
 			 	},
 			 })
 			 .done(function() {
 			 	console.log("success");
 			 })
 			 .fail(function() {
 			 	console.log("error");
 			 })
 			 .always(function() {
 			 	console.log("complete");
 			 });
 			 

 			 event.preventDefault();
 			 /* Act on the event */
 			});

		})
	</script>

</body>
</html>