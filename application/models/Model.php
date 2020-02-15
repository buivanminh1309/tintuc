<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insertDanhmuc($tendanhmuc)
	{
		$dl = array(
			'tendanhmuc' => $tendanhmuc
		);
		return $this->db->insert('danhmuctin', $dl);
	}

	public function getDataById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dl = $this->db->get('danhmuctin');
		$dl =  $dl->result_array();
		return $dl;
	}

	public function updateById($id,$tendanhmuc)
	{
		$dlupdate = array(
			'id' => $id,
			'tendanhmuc' => $tendanhmuc
			 );
		$this->db->where('id', $id);
		return $this->db->update('danhmuctin', $dlupdate);
	}

	public function removeData($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('danhmuctin');
	}

	public function loadDanhsach()
	{
		$this->db->select('*');
		$dl = $this->db->get('danhmuctin');
		$dl = $dl->result_array();
		return $dl;
	}

	public function loadDanhSachTin()
	{
		$this->db->select('*');
		$dl = $this->db->get('tintuc');
		$dl = $dl->result_array();
		return $dl ; 
		
	}

	public function insertTin($tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan)
	{

		$dulieu = array(
			'tieude' => $tieude, 
			'iddanhmuc' => $iddanhmuc, 
			'anhtin' => $anhtin, 
			'noidungtin' => $noidungtin,
			 'trichdan' => $trichdan
			);
		$this->db->insert('tintuc', $dulieu);
		 
		return $this->db->insert_id();
	}

	public function updateTinById($Id,$tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan)
	{
		$dulieusua = array(
			'id' =>  $Id, 
			'tieude' =>  $tieude, 
			'iddanhmuc' =>  $iddanhmuc, 
			'anhtin' =>  $anhtin, 
			'trichdan' =>  $trichdan, 
			'noidungtin' =>  $noidungtin
			);
		$this->db->where('id', $Id);
		return $this->db->update('tintuc', $dulieusua);

	}

	public function getTinById($id)
	{
		 $this->db->select('*');
 		$this->db->from('danhmuctin');
		 
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');

	 	$this->db->where('tintuc.id', $id); 
		 $ketqua = $this->db->get();
		 $ketqua = $ketqua->result_array();
		 return $ketqua; 
	}
	public function getTendanhmucByIdTin($id)
	{
		$this->db->select('*');
		$this->db->from('danhmuctin');		 
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.id', $id);
		$ketqua = $this->db->get();
		$ketqua = $ketqua->result_array();
		$ten = $ketqua[0]['tendanhmuc'] ; 
		return $ten ; 
	}

	public function deleteTinById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tintuc');
	}

	public function loadDanhSachTin2($sotintrong1trang)
	{		   
		$this->db->select('*');	
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left'); 
		$ketqua = $this->db->get('danhmuctin',$sotintrong1trang,0);
		$ketqua = $ketqua->result_array();
		return $ketqua; 				 
	}

	public function soTrang($sotintrong1trang) 
	{		 
		$this->db->select('*');
		$ketqua2 = $this->db->get('tintuc');
		$ketqua2 = $ketqua2->result_array();
		$soluongtin = count($ketqua2);
		$sotrang = ceil($soluongtin/$sotintrong1trang) ; 
		return $sotrang ; 
	}

	public function loadTinTheoTrang($trangthumay,$sotintrong1trang)
	{
		$this->db->select('*');	
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left'); 
		$vitri = ($trangthumay-1)*$sotintrong1trang;
		$ketqua = $this->db->get('danhmuctin',$sotintrong1trang,$vitri);
		$ketqua = $ketqua->result_array();
		return $ketqua; 
	}

	public function loadTinTheoDanhMuc($sotintrong1trang,$idDanhMuc)	{		   
		$this->db->select('*');	
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left'); 
		$this->db->where('tintuc.iddanhmuc', $idDanhMuc);
		$ketqua = $this->db->get('danhmuctin',$sotintrong1trang,0);
		$ketqua = $ketqua->result_array();
		return $ketqua; 				 
	}

	public function loadTinLienQuan($sotintrong1trang,$idDanhMuc,$idTin)	{		   
		$this->db->select('*');	
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left'); 
		$this->db->where('tintuc.iddanhmuc', $idDanhMuc);
		$this->db->where('tintuc.id !=', $idTin);

		
		$ketqua = $this->db->get('danhmuctin',$sotintrong1trang,0);
		$ketqua = $ketqua->result_array();
		return $ketqua; 				 
	}



	public function getIddanhmucByIdTin($id)
	{
		$this->db->select('*');
		$this->db->from('danhmuctin');		 
		$this->db->join('tintuc', 'tintuc.iddanhmuc = danhmuctin.id', 'left');
		$this->db->where('tintuc.id', $id);
		$ketqua = $this->db->get();
		$ketqua = $ketqua->result_array();
		$iddanhmuc = $ketqua[0]['iddanhmuc'] ; 
		return $iddanhmuc ; 
	}

	public function checkAccount($email, $password)
	{
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$dl = $this->db->get('account');
		$dl =  $dl->result_array();
		return $dl;	
	}
}

/* End of file Model.php */
/* Location: ./application/models/Model.php */