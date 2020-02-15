<?php 

include('database.php');

/**
 * summary
 */
class M_tintuc extends database
{
    /**
     * summary
     */
    public function getSlide()
    {
        $sql = "SELECT * FROM slide";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    function getMenu()
    {
    	$sql = "SELECT tl.*, group_concat(Distinct lt.id,':',lt.Ten) as Loaitin, tt.id as idTin, tt.Tieude as TieuDeTin , tt.Hinh as HinhTin ,tt.TomTat as TomTatTin FROM theloai as tl INNER JOIN loaitin as lt on lt.idTheLoai = tl.id inner join tintuc as tt
    	on tt.idLoaitin= lt.id GROUP BY tl.id";
    	$this->setQuery($sql);
    	return $this->loadAllRows();
    }

    function getTintucByIdLoai($id_loaitin,$vitri=-1,$limit=0)
    {
    	$sql ="SELECT * from tintuc where tintuc.idLoaiTin = $id_loaitin";
        if ($vitri > -1 && $limit > 1) {
            $sql.="limit $vitri,$limit";
        }
    	$this->setQuery($sql);
    	return $this->loadAllRows(array($id_loaitin));
    }

    function getTitlebyId($id_loaitin)
    {
    	$sql = "SELECT Ten from loaitin where id = $id_loaitin";
    	$this->setQuery($sql);
    	return $this->loadRow(array($id_loaitin));
    }
    function getChitietTin($id)
    {
        $sql="select * from tintuc where id=$id";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }

    function getComment($id_tin)
    {
        $sql = "select * from comment where idTinTuc = $id_tin";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_tin));

    }

    function getTinlq($id_tin)
    {
       $sql="select tt.* ,lt.Ten from tintuc tt inner join loaitin lt on tt.idLoaiTin=lt.id where tt.idLoaiTin=(select tintuc.idLoaiTin from tintuc where tintuc.id=$id_tin limit 1) and tt.id != $id_tin order by tt.SoLuotXem desc limit 5 " ;
       $this->setQuery($sql);
       return $this->loadAllRows(array($id_tin));
    }


    /**/

    function dangki($name,$email,$password)
    {
        $sql = "INSERT INTO users(name,email,password) VALUES(?,?,?)";
        $this->setQuery($sql);
        $result =$this->execute(array($name,$email,$password));
        if($result){
            return $this->getLastId();
        }
        else{
            return false;
        }
    }

    function dangnhap($email,$password)
    {
        $sql ="select * from users where email= '$email' and password ='$password' ";
        $this->setQuery($sql);
        return $this->loadRow(array($email,$password));
    }


    function themBL($id_user,$id_tin,$noidung)
    {
        $sql = "INSERT INTO comment(idUser,idTinTuc,NoiDung) VALUES(?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($id_user,$id_tin,$noidung));
        
    }
}

?>