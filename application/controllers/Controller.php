<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model');
	}

	public function index()
	{
		$kq = $this->model->loadDanhsach();
		$kq = array('dulieu' => $kq);
		$this->load->view('view', $kq);
	}

	public function danhmuctin()
	{
		$kq = $this->model->loadDanhsach();
		$kq = array('dulieu' => $kq);
		$this->load->view('view', $kq);
	}

	function themdanhmuc()
	{
		$tendanhmuc = $this->input->post('tendanhmuc');
		$this->load->model('Model');
		if($this->Model->insertDanhmuc($tendanhmuc)){
			echo 'thanhcong';
		}
		else{
			echo 'thatbai';
		}
	}

	public function addAjax()
	{
		// echo 'hello';
		$tendanhmuc = $this->input->post('tendanhmuc');
		$this->load->model('Model');
		$this->Model->insertDanhmuc($tendanhmuc);
		echo json_encode($this->db->insert_id());
	}

	public function suadanhmuc($idanhmuc)
	{
		 
		$dl  = $this->tin_model->getDataById($idanhmuc);
		$dl = array('mangdl' => $dl );
		$this->load->view('suatendanhmuc', $dl);
	}

	public function updatedanhmuc($id)
	{
		// $id = $this->input->post('id');
		$tendanhmuc = $this->input->post('tendanhmuc');
	 
		 
		 if($this->tin_model->updateById($id,$tendanhmuc))
		 {
		 	 
		 	 $this->load->view('thanhcong2');
		 }
		 else {
		 	$this->load->view('thatbai2');
		 }


	}

	public function xoadanhmuc($id)
	{
		$this->load->model('Model');
		$this->Model->removeData($id);
	}

	public function removeAjax($id)	
	{
		$this->load->model('Model');
		$this->Model->removeData($id);
	}

	public function quanlytin()
	{
		$dl1 = $this->model->loadDanhsach();
		$dl2 = $this->model->loadDanhSachTin();
		$dulieu = array(
			'dulieudanhmuc' => $dl1,
			'dulieutin' => $dl2
		);
		$this->load->view('tin_view',$dulieu);
	}

	public function themmoitin()
	{
		// xu ly anh tin 

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["anhtin"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["anhtin"]["tmp_name"]);
			if($check !== false) {
			       // echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
			       // echo "File is not an image.";
				$uploadOk = 0;
			}
		}
			// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
			// Check file size
		if ($_FILES["anhtin"]["size"] > 500000) {
			   // echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
			// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
			// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
				   // echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["anhtin"]["tmp_name"], $target_file)) {
				      //  echo "The file ". basename( $_FILES["anhtin"]["name"]). " has been uploaded.";
			} else {
				       // echo "Sorry, there was an error uploading your file.";
			}
		}
		$anhtin = base_url() .'/uploads/'. basename( $_FILES["anhtin"]["name"]) ; 
		$tieude = $this->input->post('tieude');
		$iddanhmuc = $this->input->post('iddanhmuc');
		$noidungtin = $this->input->post('noidungtin');
		$trichdan = $this->input->post('trichdan');


		if($this->model->insertTin($tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan))
		{
			$this->load->view('thanhcong2');
		}
		else 
		{
			$this->load->view('thatbai2');
		}
	}

	public function suatin($id)
	{
		$ketqua = $this->model->getTinById($id);
		$tendanhmuc = $this->model->getTendanhmucByIdTin($id);

		$dulieu = array(
			'dulieusua'=> $ketqua,
			'tendanhmuc'=>$tendanhmuc
		); 

		$this->load->view('Tin_sua', $dulieu, FALSE);
	}

	public function luutindasua()
	{
		// dua vao id de lay tin
		$anhtincu = $this->input->post('anhtincu');
		$anhtin = $_FILES['anhtin']['name'];
		// neu ko up anh moi 
		if(empty($anhtin)){
			$anhtin = $anhtincu ;
			//neu co up load anh  
		}
		else 
		{
			// xu ly anh tin 

			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["anhtin"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["anhtin"]["tmp_name"]);
			    if($check !== false) {
			       // echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			       // echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["anhtin"]["size"] > 500000) {
			   // echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			   // echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["anhtin"]["tmp_name"], $target_file)) {
			      //  echo "The file ". basename( $_FILES["anhtin"]["name"]). " has been uploaded.";
			    } else {
			       // echo "Sorry, there was an error uploading your file.";
			    }
			}
		 	$anhtin = base_url() .'/uploads/'. basename( $_FILES["anhtin"]["name"]) ; 
		}


		// goi model 
		$tieude = $this->input->post('tieude');
		$iddanhmuc = $this->input->post('iddanhmuc');
		$noidungtin = $this->input->post('noidungtin');
		$trichdan = $this->input->post('trichdan');
		$id = $this->input->post('id');
  

		if($this->model->updateTinById($id,$tieude,$iddanhmuc,$noidungtin,$anhtin,$trichdan))
		{
			$this->load->view('thanhcong2');
		}
		else 
		{
			$this->load->view('thatbai2');
		}

	}

	public function xoatin($id)
	{
		// goi model ra xu ly xoa tin 
		 
		if($this->model->deleteTinById($id))
		{
			$this->load->view('thanhcong2');
		}
		else 
		{
			$this->load->view('thatbai2');
		}

	}

	public function Logout()
	{
		$this->session->unset_userdata('email');
		$this->load->view('Login');
	}

}

/* End of file Controller.php */
/* Location: ./application/controllers/Controller.php */