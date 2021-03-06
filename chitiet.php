<?php 
session_start();
include 'controller/c_tintuc.php';
$c_tintuc = new C_tintuc();
$tin = $c_tintuc->chitietTin();
$chitietTin = $tin['chitietTin'];
//print_r($chitietTin);
$comment=$tin['comment'];
//print_r($comment);
$tinlq=$tin['tinlq'];
//print_r($tinlq);
if(isset($_POST['binhluan']) ){
    if(isset($_SESSION['id_user'])){
        $id_user=$_SESSION['id_user'];
        $id_tin=$_POST['id_tin'];
        $noidung=$_POST['noidung'];
        $bl= $c_tintuc->thembinhluan($id_user,$id_tin,$noidung);
    }
    else {
        $_SESSION['khong_bl']="Dang nhap de binh luan";
    }
    
}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Team 16</title>

    <!-- Bootstrap Core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/css/shop-homepage.css" rel="stylesheet">
    <link href="public/css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.public/js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost:8080/tintuc"> Tin Tức</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default">Submit</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                    <?php 
                    if(isset($_SESSION['user_name'])){
                        ?>
                        <li>
                            <a>
                                <span class ="glyphicon glyphicon-user"></span>      <?= $_SESSION['user_name'] ?>
                            </a>
                        </li>
                        <?php

                    }
                    else{
                        ?>
                        <li>
                            <a href="dangki.php">Đăng ký</a>
                        </li>
                        <li>
                            <a href="dangnhap.php">Đăng nhập</a>
                        </li>
                        <?php
                    }
                    ?>
                        
                    <li>
                        <a href="dangxuat.php">Đăng xuất</a>
                    </li>
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?= $chitietTin->TieuDe ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Team 16</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="public/image/tintuc/<?= $chitietTin->Hinh ?>" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on 2019</p>
                <hr>

                <!-- Post Content -->
                <p class="lead"><?= $chitietTin->TomTat ?></p>
                <p ><?= $chitietTin->NoiDung ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form"  method="POST" action="#" >
                        <input type="hidden" name="id_tin" value="<?= $chitietTin->id ?>" >
                        <div class="form-group">

                            <textarea class="form-control" rows="3" name="noidung"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="binhluan" >Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php

                foreach ($comment as $cmt) {
                    ?>
                    <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <small><?= $cmt->updated_at ?></small>
                        </h4>
                        <?= $cmt->NoiDung ?>
                    </div>
                </div>
                    <?php
                }

                  ?>
                
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">

                        <!-- item -->

                        <?php 
                            foreach ($tinlq as $lq) {
                                ?>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-5">
                                        <a href="chitiet.php?id_tin=<?= $lq->id ?>">
                                            <img class="img-responsive" src="public/image/tintuc/<?= $lq->Hinh ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-7">
                                        <a href="chitiet.php?id_tin=<?= $lq->id ?>"><b><?= $lq->TieuDe ?></b></a>
                                    </div>
                                    <div class="break"></div>
                                </div>
                                <?php
                            }

                         ?>
                        
                        <!-- end item -->

                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

    <!-- Footer -->
    <hr>
    <footer>
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; Your Website 2019</p>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/my.js"></script>

</body>

</html>
