<?php 

session_start();

include('model/m_tintuc.php');

/**
 * summary
 */
class C_tintuc
{
    /**
     * summary
     */
    public function index()
    {
        $m_tintuc = new M_tintuc();
        $slide = $m_tintuc->getSlide();
        $menu =  $m_tintuc->getMenu();
        return array('slide'=>$slide,'menu'=>$menu);
    }
    function loaitin()
    {
    	$id_loai = $_GET['id_loai'];
    	$m_tintuc = new M_tintuc();
    	$danhmuctin = $m_tintuc->getTintucByIdLoai($id_loai);
        $menu = $m_tintuc->getMenu();
        $title=$m_tintuc->getTitlebyId($id_loai);
    	return array('danhmuctin'=>$danhmuctin,'menu'=>$menu,'title'=>$title);
    }

    function chitietTin()
    {
        $id_tin = $_GET['id_tin'];
        $m_tintuc = new M_tintuc();
        $chitietTin= $m_tintuc->getChitietTin($id_tin);
        $comment=$m_tintuc->getComment($id_tin);
        $tinlq=$m_tintuc->getTinlq($id_tin);
        return array('chitietTin'=>$chitietTin,'comment'=>$comment,'tinlq'=>$tinlq);
    }

    function dangkiTK($name,$email,$password)
    {
        $m_tintuc = new M_tintuc();
        $id_user= $m_tintuc->dangki($name,$email,$password);
        if($id_user > 0){
            $_SESSION['success']="Thanh cong";
            header('location:index.php');
            if(isset($_SESSION['error'])){
                unset($_SESSION['error']);
            }
        }
        else{
            $_SESSION['error']="That Bai";
            header('location:dangky.php');
        }
    }

    function dangnhapTK($email,$password)
    {
        $m_tintuc = new M_tintuc();
        $user=$m_tintuc->dangnhap($email,$password);
        if($user){
            $_SESSION['user_name']=$user->name;
            $_SESSION['id_user']=$user->id;
            header('location:index.php');
            if(isset($_SESSION['user_error'])){
                unset($_SESSION['user_error']);
            }
            if(isset($_SESSION['khong_bl'])){
                unset($_SESSION['khong_bl']);
            }
        }
        else{
             $_SESSION['user_error']="That bai";
            header('location:dangnhap.php');
        }
    }

    function dangxuat()
    {
        session_destroy();
        header('location:index.php');
    }

    function thembinhluan($id_user,$id_tin,$noidung)
    {
        $m_tintuc = new M_tintuc();
        $binhluan=$m_tintuc->themBL($id_user,$id_tin,$noidung);
        header('location:'.$_SERVER['HTTP_REFERER']);
    }

    
}

?>