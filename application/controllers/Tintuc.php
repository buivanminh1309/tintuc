<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tintuc extends CI_Controller {
	 
	private $soluongtin1trang; 
	 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model');
		$this->soluongtin1trang = 5 ; 
	}

	public function index()
	{
		$dl = $this->model->loadDanhSachTin2($this->soluongtin1trang); 
		$sotrang = $this->model->soTrang($this->soluongtin1trang); 
		$danhmuc = $this->model->loadDanhsach();

		$mangdl =  array(
			'dulieutin' => $dl,
			'sotrang' => $sotrang,
			'cacdanhmuc' => $danhmuc 	
			 );
		 $this->load->view('news_view',$mangdl);

	}
	public function page($trang)
	{
 
		// tính vị trí
		$dl = $this->model->loadTinTheoTrang($trang,$this->soluongtin1trang);
		$sotrang = $this->model->soTrang($this->soluongtin1trang); 
		$danhmuc = $this->model->loadDanhsach();
		$mangdl =  array(
			'dulieutin' => $dl,
			'sotrang' => $sotrang,
			'cacdanhmuc' => $danhmuc
			 );
		 $this->load->view('news_view',$mangdl);
 
	}

	

	public function chiTietTin($idTin)
	{
		$dl = $this->model->getTinById($idTin);
		$danhmuc = $this->model->loadDanhsach();
		// lay ve id cua danh muc
		$idDanhMuc = $this->model->getIdDanhMucByIdTin($idTin);
		 
		 // lay ve du lieu ma co id trùng vơi id của dòng trên 
		$tinlienquan = $this->model->loadTinLienQuan($this->soluongtin1trang,$idDanhMuc,$idTin);	

		$dl = array(
			'dulieutin' => $dl,
			'cacdanhmuc' => $danhmuc,
			'tinlienquan' => $tinlienquan
		 );
		$this->load->view('News_detail', $dl);
	}

	public function danhmuc($idDanhMuc)
	{
		$dl = $this->model->loadTinTheoDanhMuc($this->soluongtin1trang,$idDanhMuc); 		 
		$sotrang = $this->model->soTrang($this->soluongtin1trang); 
		$danhmuc = $this->model->loadDanhsach();

		$mangdl =  array(
			'dulieutin' => $dl,
			'sotrang' => $sotrang,
			'cacdanhmuc' => $danhmuc
			 );
		 $this->load->view('news_view',$mangdl);
	}

	public function Login()
	{
		$this->load->view('Login');
	}

	public function Check()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$acc = $this->model->checkAccount($email, $password);
		$acc = array('account' => $acc);
		if(empty($acc['account'])){
			$this->session->unset_userdata('email');
			redirect('http://localhost:8888/tintuc/tintuc','refresh');
		}
		else{
			$this->session->set_userdata('email', 'admin@gmail.com');
			$this->session->set_userdata('password', 'admin');
			$this->load->view('news_view');
		}
	}

	public function Logout()
	{
		$this->session->unset_userdata('email');
		$this->load->view('Login');
	}

}

/* End of file Tintuc.php */
/* Location: ./application/controllers/Tintuc.php */