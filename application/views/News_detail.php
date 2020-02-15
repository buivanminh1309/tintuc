<!DOCTYPE html>
<html lang="en"><head>
	<title> Tin tuc Chi tiet </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">


	<script type="text/javascript" src="<?= base_url(); ?>vendor/bootstrap.js"></script>


	<script type="text/javascript" src="<?= base_url(); ?>1.js"></script>

	<link rel="stylesheet" href="<?= base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/font-awesome.css">
	<link rel="stylesheet" href="<?= base_url(); ?>news_detail.css">
</head>
<body>	 
	<div class="top">
		<nav class="navbar navbar-dark bg-faded navbar-fixed-top menutren">
			<div class="container">
				<a class="navbar-brand logo" href="http://localhost:8888/tintuc/tintuc/" id="logo"><img src="http://superfastco.com/images/bg_news.png"width="10%" height="10%"></a>
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
									<a href="http://localhost:8888/tintuc/tintuc/" class="nguoidung" style="font-size: 15px; color: white;">NGƯỜI DÙNG</a>
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="<?php base_url() ?>tintuc/login">Đăng nhập</a>
									<a class="dropdown-item" href="<?php base_url() ?>tintuc/logout">Đăng xuất</a>
									<a class="dropdown-item" href="#">Sửa trang cá nhân</a>
								</div>
							</div>

						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="container show_tin">
		<div class="row">
		<div class="col-sm-9 tin_detail">
			<div class="row news_detail">
				<?php foreach ($dulieutin as $value): ?>
					<div class="card" style="width: 100%;">
						<h1 class="card-title"><?= $value['tieude'] ?></h1>
						<img class="card-img-top img-fluid" src="<?= $value['anhtin'] ?>" alt="ifoimg">
						<p class="card-text"><small><?= date('d/m/Y - G:i - A',$value['ngaytao']) ?> In <span class="vang"> <?= $value['tendanhmuc'] ?></span></small></p>
						<div class="card-body">
							<p class="card-text"><?= $value['noidungtin'] ?></p>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<div class="row tinlienquan">
				<h3>Tin liên quan</h3>
				<hr style="border: none;">
				<div class="row mt-3 tinlienquancon">
				
				<?php foreach ($tinlienquan as $value): ?>
					<div class="col-sm-4 tungtinlienquan mb-1 mr-1">
						<div class="card-deck-wrapper">
							<div class="card-deck">
								<div class="card">
									<a href="<?= base_url(); ?>/tintuc/chitiettin/<?= $value['id'] ?>"><img class="card-img-top img-fluid"  
										src="<?= $value['anhtin'] ?>" alt="Card image cap"></a>
										<div class="card-block">
											<h4 class="card-title"><?= $value['tieude'] ?></h4>
											<p class="card-text"><?= $value['trichdan'] ?></p>
											<p class="card-text"><small class="text-muted"><?= date('d/m/Y - G:i - A',$value['ngaytao']) ?> In <span class="vang"> <?= $value['tendanhmuc'] ?></span></small></p>
										</div>
								</div>
							</div>
						</div>
					</div> 
				<?php endforeach ?>
				</div>
			</div>
		</div>
		<div class="col-sm-3 danhmuctin">
			<ul class="list-group" style="border: 1px solid lightgray;">
				<li class="list-group-item active midkey tieude">Danh mục tin</li>
				<?php foreach ($cacdanhmuc as $value): ?>
					<li class="con"><a class="danhmuctincon" href="<?= base_url(); ?>/tintuc/danhmuc/<?= $value['id'] ; ?>"> <?= $value['tendanhmuc'] ; ?></a></li>
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
            <div>Chào mừng các bạn đến với website tin tức team 16.</div>
        </div>
    </li>
    <li>
        <div id="huongdan" class="icon" data-icon="H"></div>
        <div class="text">
            <h4>Hướng dẫn</h4>
            <div>Đang cập nhật...</div>
        </div>
    </li>
    <li>
        <div id="lienhe" class="icon" data-icon="L"></div>
        <div class="text">
            <h4>Liên hệ</h4>
            <div>
            	<p>websitetintuc@gmail.com</p>
            	<p>Địa chỉ: Nhà E3 Đại học công nghệ 144 Xuân Thủy</p>
            </div>
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
        <div class="copyright">				©  2019 All Rights Reserved</div>
    </div>
</div>
    </footer>

</body>
</html>