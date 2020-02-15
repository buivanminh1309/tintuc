<!DOCTYPE html>
<html lang="en"><head>
	<title> Tin tuc </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">


	<script type="text/javascript" src="<?= base_url(); ?>vendor/bootstrap.js"></script>


	<script type="text/javascript" src="<?= base_url(); ?>1.js"></script>

	<link rel="stylesheet" href="<?= base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/font-awesome.css">
	<link rel="stylesheet" href="<?= base_url(); ?>news_view.css">
</head>
<body >
	<?php
	if(($this->session->has_userdata('email'))) {
			redirect('http://localhost:8888/tintuc/controller/danhmuctin','refresh');//chuyen huong
			?>
		<?php } ?>
	<div class="top">
		<nav class="navbar navbar-dark bg-faded navbar-fixed-top menutren">
			<div class="container">
				<a class="navbar-brand logo" href="<?php echo base_url() ?>tintuc" id="logo"><img src="http://superfastco.com/images/bg_news.png" width="10%" height="10%"></a>
				<button class="navbar-toggler hidden-sm-up float-xs-right" type="button" data-toggle="collapse" data-target="#menutren">
				</button>
				<div class="collapse navbar-toggleable-xs" id="menutren">

					<ul class="nav navbar-nav menutrenphai float-sm-right">
						<li class="nav-item active">
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									TRANG CHỦ
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="#gioithieu">Giới thiệu</a>
									<a class="dropdown-item" href="#huongdan">Hướng dẫn</a>
									<a class="dropdown-item" href="#lienhe">Liên hệ</a>
								</div>
							</div>
						</li>
						<li class="nav-item">

							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									HOẠT ĐỘNG
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="#">Thông báo</a>
									<a class="dropdown-item" href="#">Nhắn tin</a>
									<a class="dropdown-item" href="#">Đăng bài</a>
								</div>
							</div>

						</li>
						<li class="nav-item">

							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<a href="http://localhost:8888/tintuc/tintuc/" class="nguoidung">NGƯỜI DÙNG</a>
									
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="<?php base_url() ?>login">Đăng nhập</a>
									<a class="dropdown-item" href="<?php base_url() ?>logout">Đăng xuất</a>
									<a class="dropdown-item" href="#">Sửa trang cá nhân</a>
								</div>
							</div>

						</li>
					</ul>
				</div>
			</div>
		</nav>



		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				<li data-target="#carousel-example-generic" data-slide-to="3"></li>
				<li data-target="#carousel-example-generic" data-slide-to="4"></li>
			</ol>
			<div class="carousel-inner anhslide" role="listbox">
				<div class="carousel-item active">
					<img src="http://vn.joyometalparts.com/uploads/20179796/ImgScroll/ba201706061718170343681.jpg" class="anhchayslide img-fluid" alt="First slide">
				</div>
				<div class="carousel-item">
					<img src="http://vn.hxminerial.com/uploads/201816179/ImgScroll/ba201807301651058469116.jpg" class="anhchayslide img-fluid" alt="First slide">
				</div>
				<div class="carousel-item">
					<img src="http://superfastco.com/images/bg_news.png" class="anhchayslide img-fluid" alt="First slide">
				</div>
				<div class="carousel-item">
					<img src="http://m.vn.palmitoylethanolamide-gihichem.com/uploads/201816642/ImgScroll/ba201810251533142223635.jpg" class="anhchayslide img-fluid" alt="First slide">
				</div>
				<div class="carousel-item">
					<img src="http://m.vn.zw-trucktrailer.com/uploads/201815774/ImgScroll/ba201801251419393437602.jpg" class="anhchayslide img-fluid" alt="First slide">
				</div>
			</div>
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="icon-prev" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="icon-next" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<div class="container mid">
		<div class="tdtintuchome">
			<?php 
			// lay uri 
			$uri = $_SERVER['REQUEST_URI'];
			$uri = explode('/', $uri); 
			$tranghientai = end($uri);
			// $tranghientai = $tranghientai -1 ;
			?>
		</div>

		<div class="row">
			<div class="col-sm-9 bangtin">
				<p class="list-group-item active midkey tieude">Bảng tin</p>
				<?php foreach ($dulieutin as $motdl): ?>
					<div class="row mautin">
						<div class="col-sm-3 hinhanh">
							<a href="<?= base_url(); ?>tintuc/chiTietTin/<?= $motdl['id'] ?>"><img src="<?= $motdl['anhtin'] ?>" class="flush-img" alt="" width="200px" height="200px"></a>
						</div>
						<div class="col-sm-9 tin">
							<h5 class="card-title"><a href="<?= base_url(); ?>tintuc/chiTietTin/<?= $motdl['id'] ?>" class="tieudetin1 fontoswarld"><?= $motdl['tieude'] ?></a></h5>
							<p class="card-text"><?= $motdl['trichdan'] ?></p>
							<p class="card-text"><small class="text-muted">Updated at: <?= date('d/m/Y - G:i - A',$motdl['ngaytao']) ?> In <?= $motdl['tendanhmuc'] ?></small></p>
							<p class="card-text"><a href="<?= base_url(); ?>tintuc/chiTietTin/<?= $motdl['id'] ?>" class="rm fontroboto"><input class="btn btn-primary" type="button" value="Xem ngay!" ng-app="string"></a></p>
						</div>
					</div>
				<?php endforeach ?>	
				<nav class="phantrang mb-1  wow  fadeInUp">
					<ul class="pagination">
						<?php 
						for ($i=0; $i < $sotrang ; $i++) { 
							?>
							<?php 
							if(($i+1) ==$tranghientai)
							{
								?>
								<li class="float-xs-left chuyentrang"><a href="<?php echo base_url() ?>tintuc/page/<?= $i+1 ?>"><?= $i+1 ?></a></li>
							<?php } 
							else {
								?>
								<li class="float-xs-left chuyentrang"><a href="<?php echo base_url() ?>tintuc/page/<?= $i+1 ?>"><?= $i+1 ?></a></li>
							<?php } ?>

							<?php
						}
						?>
					<!-- <?php 
					if ($tranghientai  == 1) {

					}
					else 
					{
						?>
						<li class="pre">
							<a href="<?php echo base_url() ?>tintuc/page/<?= $tranghientai-1 ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo; Previous</span>
							</a>
						</li>
						<?php
					}
					?> -->
					<!-- <?php 
					if ($tranghientai==$sotrang) {
					}
					else{
						?>
						<li class="next">
							<a href="<?php echo base_url() ?>tintuc/page/<?= $tranghientai+1 ?>" aria-label="Previous">
								<span aria-hidden="true">Next &raquo; </span>
							</a>
						</li>
						<?php
					}
					?> -->
				</ul>
			</nav>
			</div>
			<div class="col-sm-3 tinlienquan">
				<ul class="list-group">
					<li class="list-group-item active midkey tieude">Loại tin</li>
					<?php foreach ($cacdanhmuc as $value): ?>
						<li class="con"><a  class="danhmuccon" href="<?= base_url(); ?>/tintuc/danhmuc/<?= $value['id'] ; ?>"> <?= $value['tendanhmuc'] ; ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>

	<footer>
        <div class="splitter"></div>
       <ul>
    <li>
        <div id="gioithieu" class="icon" data-icon="G"></div>
        <div class="text">
            <h4>Giới thiệu</h4>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique justo eu sollicitudin pretium. Nam scelerisque arcu at dui porttitor, non viverra sapien pretium. Nunc nec dignissim nunc. Sed eget est purus. Sed convallis, metus in dictum feugiat, odio orci rhoncus metus. <a href="#">Read more</a></div>
        </div>
    </li>
    <li>
        <div id="huongdan" class="icon" data-icon="H"></div>
        <div class="text">
            <h4>Hướng dẫn</h4>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique justo eu sollicitudin pretium. Nam scelerisque arcu at dui porttitor, non viverra sapien pretium. Nunc nec dignissim nunc. Sed eget est purus. Sed convallis, metus in dictum feugiat, odio orci rhoncus metus. <a href="#">Read more</a></div>
        </div>
    </li>
    <li>
        <div id="lienhe" class="icon" data-icon="L"></div>
        <div class="text">
            <h4>Liên hệ</h4>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique justo eu sollicitudin pretium. Nam scelerisque arcu at dui porttitor, non viverra sapien pretium. Nunc nec dignissim nunc. Sed eget est purus. Sed convallis, metus in dictum feugiat, odio orci rhoncus metus. <a href="#">Read more</a></div>
        </div>
    </li>
</ul>

       <div class="bar">
    <div class="bar-wrap">
        <ul class="links">
            <li ><a href="http://localhost:8888/tintuc/tintuc/">Trang chủ</a></li>
            <li ><a href="gioithieu">Giới thiệu</a></li>
            <li ><a href="huongdan">Hướng dẫn</a></li>
            <li ><a href="lienhe">Liên hệ</a></li>
            <li><a href="logo">Quay về đầu trang</a></li>
        </ul>

        <div class="social">
            <a href="http://facebook.com" class="fb" target="_blank">
                <span data-icon="f" class="icon"></span>
                <span class="info">
                    <span class="follow">Become a fan Facebook</span>
                    <span class="num">9,999,..9</span>
                </span>
            </a>

            <a href="http://bit.ly/adminBuivanMinh" class="tw" target="_blank">
                <span data-icon="T" class="icon"></span>
                <span class="info">
                    <span class="follow">Follow us Twitter</span>
                    <span class="num">9,999,..9</span>
                </span>
            </a>

            <a href="https://www.youtube.com" class="rss" target="_blank">
                <span data-icon="Y" class="icon"></span>
                <span class="info">
                    <span class="follow">Subscribe Youtube</span>
                    <span class="num">9,999,..9</span>
                </span>
            </a>
        </div>
        <div class="clear"></div>
        <div class="copyright">©  2019 All Rights Reserved</div>
    </div>
</div>
    </footer>

</body>
</html>