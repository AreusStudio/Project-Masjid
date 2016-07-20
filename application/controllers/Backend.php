<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	function __construct(){
   		parent::__construct();
   		$this->load->model('Modelbackend');
	}
	public function index()
	{
		//if(!$this->session->userdata('isLoginAdmin')) { 
     	//	redirect('backend/loginpage', 'refresh'); 
     	//}
  		//else { 
			$this->load->view('dashboard');
		//}
	}
	public function home()
	{
		//if(!$this->session->userdata('isLoginAdmin')) { 
     	//	redirect('backend/loginpage', 'refresh'); 
     	//}
  		//else { 
			$this->load->view('dashboard');
		//}
	}

	public function loginprocess()
	{
        		$email = $this->input->post("email");
        		$pass = $this->input->post("password");
        		$hasil['cek'] = $this->Modelbackend->cekAdmin($email,$pass);
				foreach($hasil['cek']->result() as $a){
					if($a->email==$email AND $a->password==$pass AND $a->isAktif=="1"){
						$newdataadmin = array( 
						   'nama'  => $a->nama, 
						   'username'     => $a->username,
						   'email'     => $a->email,
						   'id'     	=> $a->id_admin, 
						   'isLoginAdmin' => TRUE
						);  
						$this->session->set_userdata($newdataadmin);
						redirect('dashboard', 'refresh');
					}
					else{
						//$data['konfirmasi'] = array('konfirmasi' => 3);
						//$this->load->view('backend/login');
						redirect('login', 'refresh');
						//$this->template->load('backend/templateadmin','backend/backend/login',$data);
					}
				}
	}

	public function login()
	{
		$this->load->helper('url');
		$this->load->view('dashboardheader');
		$this->load->view('login');
		$this->load->view('dashboardfooter');
	}


	public function dashboard()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');


			//$this->load->view('backend/lihatartikel');
			$data = array('berita' => $this->Modelbackend->getArtikelFull());
		
			//$data['konfirmasi'] = array('konfirmasi' => 1);

			$data['konfirmasi'] = array('konfirmasi' => 1);
			$this->load->view('daftarberita', $data);
		//$this->load->view('frontend/index',$data);
		$this->load->view('dashboardfooter');
		}
	}
	public function tambahberita()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->helper('url');
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');
		$data['konfirmasi'] = array('konfirmasi' => 1);
		$this->load->view('tambahberita', $data);
		$this->load->view('dashboardfooter');
		}
	}
	public function daftarfoto()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');


			//$this->load->view('backend/lihatartikel');
			$data = array('foto' => $this->Modelbackend->getFotoFull());
		
			//$data['konfirmasi'] = array('konfirmasi' => 1);

			$data['konfirmasi'] = array('konfirmasi' => 1);
			$this->load->view('daftarfoto', $data);
		//$this->load->view('frontend/index',$data);
		$this->load->view('dashboardfooter');
		}
	}

	public function tambahfoto()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->helper('url');
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');
		$data['konfirmasi'] = array('konfirmasi' => 1);
		$this->load->view('tambahfoto', $data);
		$this->load->view('dashboardfooter');
	}
}

	public function daftarvideo()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');


			//$this->load->view('backend/lihatartikel');
			$data = array('video' => $this->Modelbackend->getVideoFull());
		
			//$data['konfirmasi'] = array('konfirmasi' => 1);

			$data['konfirmasi'] = array('konfirmasi' => 1);
			$this->load->view('daftarvideo', $data);
		//$this->load->view('frontend/index',$data);
		$this->load->view('dashboardfooter');
	}
}
	public function tambahvideo()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->helper('url');
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');
		$data['konfirmasi'] = array('konfirmasi' => 1);
		$this->load->view('tambahvideo', $data);
		$this->load->view('dashboardfooter');
	}
}

	public function addartikelprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
						
		    $this->load->helper('url');
		    $this->load->view('dashboardheader');
		    $this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'judul', 'required');
			$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
			$this->form_validation->set_rules('posted_by', 'posted_by', 'required');
			$this->form_validation->set_rules('isi_berita', 'Isi Artikel', 'required');
			//$this->form_validation->set_rules('header', 'Photo', 'required');

			$this->form_validation->set_message('required','{field} Belum Diisi');
			$this->form_validation->set_message('is_unique','Username {field} Sudah Digunakan');		
			$this->form_validation->set_message('integer','{field} Harus Berupa Angka');
			if ($this->form_validation->run() == FALSE) { 
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('tambahberita',$data);
			}
			else{

				$photoartikel_1 = '';
        		$judul = $this->input->post("judul");
        		$tanggal = $this->input->post("tanggal");
        		$posted_by = $this->input->post("posted_by");
        		$isi_berita = $this->input->post("isi_berita");
				$config['upload_path']   = './upload/datanews/'; 
				$config['allowed_types'] = 'jpg|png|gif'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);
				if ( $this->upload->do_upload('photo')) {
					unset($config);
					$q = $this->Modelbackend->addBerita($photoartikel_1,$judul,$tanggal,$posted_by,$isi_berita);
					if($q!=0)
					{
							$data['konfirmasi'] = array('konfirmasi' => 2);
							$this->load->view('tambahberita',$data);
					}
				}	
				else{
					$status = false;
				}
			}
		//}
		$this->load->view('dashboardfooter');
	}
}

	public function ubahartikelprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
			
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'judul', 'required');
			$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
			$this->form_validation->set_rules('posted_by', 'posted_by', 'required');
			$this->form_validation->set_rules('isi_berita', 'isi_berita', 'required');


			$this->form_validation->set_message('required','{field} Belum Diisi');	

			if ($this->form_validation->run() == FALSE) { 
				$data = array(
	        	'berita' => $this->Modelbackend->getArtikelFull()
				);
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('dashboard',$data);
			}
			else{
  				$id_berita = $this->input->post("id_berita");
	        	$photoartikel = $this->input->post("photo");
				$judul = $this->input->post("judul");
	        	$tanggal = $this->input->post("tanggal");
	        	$posted_by = $this->input->post("posted_by");
	        	$isi_berita = $this->input->post("isi_berita");

	        	/*if($photoartikel == null)
	        	{

				$data = array(
				'judul' => $judul,
				'artikel' => $artikel,
				'isAktif' => $isAktif
				);

				$where = array(
				'id_artikel' => $id_artikel
				);
					$this->modelbackend->ubahBerita1($where,$data,'artikel');
					redirect('backend/lihatartikel');
	        	}
	        	else 
	        	{*/
	        	$photoartikel_1 = '';
        		$config['upload_path']   = './upload/datanews/'; 
				$config['allowed_types'] = 'jpg|png|gif'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);

				$data = array(
				'foto' => $photoartikel_1,
				'judul' => $judul,
				'tanggal' => $tanggal,
				'posted_by' => $posted_by,
				'isi_berita' => $isi_berita
				);
				$data1 = array(
				'judul' => $judul,
				'tanggal' => $tanggal,
				'posted_by' => $posted_by,
				'isi_berita' => $isi_berita

				);

				$where = array(
				'id_berita' => $id_berita
				);
				if ( $this->upload->do_upload('photo')) {
					unlink(base_url().'./upload/datanews/'.$photoartikel);
					unset($config);
					$this->Modelbackend->ubahBerita($where,$data,'berita');
					redirect('dashboard');
				}	
				else{
					$this->Modelbackend->ubahBerita($where,$data1,'berita');
					redirect('dashboard');
				}
			}
			//}

  			

			
		
	 
		$this->load->view('dashboardfooter');
	}
		
	}
	/*Jadwal*/

	public function tambahjadwal()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->helper('url');
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');
		$data['konfirmasi'] = array('konfirmasi' => 1);
		$this->load->view('tambahjadwal', $data);
		$this->load->view('dashboardfooter');
	}
	}
	public function daftarjadwal()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');


			//$this->load->view('backend/lihatartikel');
			$data = array('jadwal_kegiatan' => $this->Modelbackend->getJadwalFull());
		
			//$data['konfirmasi'] = array('konfirmasi' => 1);

			$data['konfirmasi'] = array('konfirmasi' => 1);
			$this->load->view('daftarjadwal', $data);
		//$this->load->view('frontend/index',$data);
		$this->load->view('dashboardfooter');
	}
	}

	public function addjadwalprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
							
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan', 'required');
			$this->form_validation->set_rules('tanggal_kegiatan', 'tanggal_kegiatan', 'required');
			$this->form_validation->set_rules('waktu', 'waktu', 'required');
			//$this->form_validation->set_rules('header', 'Photo', 'required');

			$this->form_validation->set_message('required','{field} Belum Diisi');
			$this->form_validation->set_message('is_unique','Username {field} Sudah Digunakan');		
			$this->form_validation->set_message('integer','{field} Harus Berupa Angka');
			if ($this->form_validation->run() == FALSE) { 
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('tambahjadwal',$data);
			}
			else{

				$photoartikel_1 = '';
        		$nama_kegiatan = $this->input->post("nama_kegiatan");
        		$tanggal_kegiatan = $this->input->post("tanggal_kegiatan");
        		$waktu = $this->input->post("waktu");
			
					$q = $this->Modelbackend->addJadwal($nama_kegiatan,$tanggal_kegiatan,$waktu);
					if($q!=0)
					{
							$data['konfirmasi'] = array('konfirmasi' => 2);
							$this->load->view('tambahjadwal',$data);
					}
					
				else{
					$status = false;
				}
			}
		//}
		$this->load->view('dashboardfooter');
	}
}

	public function ubahjadwalprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
			
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan', 'required');
			$this->form_validation->set_rules('tanggal_kegiatan', 'tanggal_kegiatan', 'required');
			$this->form_validation->set_rules('waktu', 'waktu', 'required');


			$this->form_validation->set_message('required','{field} Belum Diisi');	

			if ($this->form_validation->run() == FALSE) { 
				$data = array(
	        	'jadwal_kegiatan' => $this->Modelbackend->getJadwalFull()
				);
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('daftarjadwal',$data);
			}
			else{
  				$id_kegiatan = $this->input->post("id_kegiatan");
  				$nama_kegiatan = $this->input->post("nama_kegiatan");
  				$tanggal_kegiatan = $this->input->post("tanggal_kegiatan");
	        	$waktu = $this->input->post("waktu");

	        	/*if($photoartikel == null)
	        	{

				$data = array(
				'judul' => $judul,
				'artikel' => $artikel,
				'isAktif' => $isAktif
				);

				$where = array(
				'id_artikel' => $id_artikel
				);
					$this->modelbackend->ubahBerita1($where,$data,'artikel');
					redirect('backend/lihatartikel');
	        	}
	        	else 
	        	{*/
	        	

				$data = array(
				'nama_kegiatan' => $nama_kegiatan,
				'tanggal_kegiatan' => $tanggal_kegiatan,
				'waktu' => $waktu
				);

				$where = array(
				'id_kegiatan' => $id_kegiatan
				);
				
			
					$this->Modelbackend->ubahJadwal($where,$data,'jadwal_kegiatan');
					redirect('daftarjadwal');
				
			}
			//}
	 
		$this->load->view('dashboardfooter');
		
	}
}

/*Slide*/

	public function tambahslide()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->helper('url');
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');
		$data['konfirmasi'] = array('konfirmasi' => 1);
		$this->load->view('tambahslide', $data);
		$this->load->view('dashboardfooter');
	}
}
	public function daftarslide()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');


			//$this->load->view('backend/lihatartikel');
			$data = array('slide' => $this->Modelbackend->getSlideFull());
		
			//$data['konfirmasi'] = array('konfirmasi' => 1);

			$data['konfirmasi'] = array('konfirmasi' => 1);
			$this->load->view('daftarslide', $data);
		//$this->load->view('frontend/index',$data);
		$this->load->view('dashboardfooter');
	}
}

	public function addslideprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
							
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('posted_by', 'posted_by', 'required');
			//$this->form_validation->set_rules('header', 'Photo', 'required');

			$this->form_validation->set_message('required','{field} Belum Diisi');
			$this->form_validation->set_message('is_unique','Username {field} Sudah Digunakan');		
			$this->form_validation->set_message('integer','{field} Harus Berupa Angka');
			if ($this->form_validation->run() == FALSE) { 
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('tambahslide',$data);
			}
			else{

				$photoartikel_1 = '';
        		$posted_by = $this->input->post("posted_by");
				$config['upload_path']   = './upload/dataslide/'; 
				$config['allowed_types'] = 'jpg|png|gif|pdf'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);
				if ( $this->upload->do_upload('photo')) {
					unset($config);
					$q = $this->Modelbackend->addSlide($photoartikel_1,$posted_by);
					if($q!=0)
					{
							$data['konfirmasi'] = array('konfirmasi' => 2);
							$this->load->view('tambahslide',$data);
					}
				}	
				else{
					$status = false;
				}
			}
		//}
		$this->load->view('dashboardfooter');
	}
}

	public function ubahslideprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
			
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('posted_by', 'posted_by', 'required');


			$this->form_validation->set_message('required','{field} Belum Diisi');	

			if ($this->form_validation->run() == FALSE) { 
				$data = array(
	        	'slide' => $this->Modelbackend->getSlideFull()
				);
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('daftarslide',$data);
			}
			else{
  				$id_slide = $this->input->post("id_slide");
	        	$photoartikel = $this->input->post("photo");
  				$posted_by = $this->input->post("posted_by");

	        	/*if($photoartikel == null)
	        	{

				$data = array(
				'judul' => $judul,
				'artikel' => $artikel,
				'isAktif' => $isAktif
				);

				$where = array(
				'id_artikel' => $id_artikel
				);
					$this->modelbackend->ubahBerita1($where,$data,'artikel');
					redirect('backend/lihatartikel');
	        	}
	        	else 
	        	{*/
	        	$photoartikel_1 = '';
        		$config['upload_path']   = './upload/dataslide/'; 
				$config['allowed_types'] = 'jpg|png|gif|pdf'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);

				$data = array(
				'foto' => $photoartikel_1,
				'posted_by' => $posted_by
				);
				$data1 = array(
				'posted_by' => $posted_by
				);

				$where = array(
				'id_slide' => $id_slide
				);
				if ( $this->upload->do_upload('photo')) {
					unlink(base_url().'./upload/dataslide/'.$photoartikel);
					unset($config);
					$this->Modelbackend->ubahSlide($where,$data,'slide');
					redirect('daftarslide');
				}	
				else{
					$this->Modelbackend->ubahSlide($where,$data1,'slide');
					redirect('daftarslide');
				}
			}
			//}
	 
		$this->load->view('dashboardfooter');
		
	}
}


	/*Keuangan*/

	public function tambahkeuangan()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->helper('url');
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');
		$data['konfirmasi'] = array('konfirmasi' => 1);
		$this->load->view('tambahkeuangan', $data);
		$this->load->view('dashboardfooter');
	}
}
	public function daftarkeuangan()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');


			//$this->load->view('backend/lihatartikel');
			$data = array('keuangan' => $this->Modelbackend->getKeuanganFull());
		
			//$data['konfirmasi'] = array('konfirmasi' => 1);

			$data['konfirmasi'] = array('konfirmasi' => 1);
			$this->load->view('daftarkeuangan', $data);
		//$this->load->view('frontend/index',$data);
		$this->load->view('dashboardfooter');
	}
}

	public function addkeuanganprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
							
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('Nama_keuangan', 'Nama_keuangan', 'required');
			//$this->form_validation->set_rules('header', 'Photo', 'required');

			$this->form_validation->set_message('required','{field} Belum Diisi');
			$this->form_validation->set_message('is_unique','Username {field} Sudah Digunakan');		
			$this->form_validation->set_message('integer','{field} Harus Berupa Angka');
			if ($this->form_validation->run() == FALSE) { 
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('tambahkeuangan',$data);
			}
			else{

				$photoartikel_1 = '';
        		$Nama_keuangan = $this->input->post("Nama_keuangan");
				$config['upload_path']   = './upload/datakeuangan/'; 
				$config['allowed_types'] = 'jpg|png|gif|pdf'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);
				if ( $this->upload->do_upload('photo')) {
					unset($config);
					$q = $this->Modelbackend->addKeuangan($Nama_keuangan,$photoartikel_1);
					if($q!=0)
					{
							$data['konfirmasi'] = array('konfirmasi' => 2);
							$this->load->view('tambahkeuangan',$data);
					}
				}	
				else{
					$status = false;
				}
			}
		//}
		$this->load->view('dashboardfooter');
	}
}

	public function ubahkeuanganprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
			
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('Nama_keuangan', 'Nama_keuangan', 'required');


			$this->form_validation->set_message('required','{field} Belum Diisi');	

			if ($this->form_validation->run() == FALSE) { 
				$data = array(
	        	'keuangan' => $this->Modelbackend->getKeuanganFull()
				);
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('daftarkeuangan',$data);
			}
			else{
  				$id_keuangan = $this->input->post("id_keuangan");
  				$Nama_keuangan = $this->input->post("Nama_keuangan");
	        	$photoartikel = $this->input->post("photo");

	        	/*if($photoartikel == null)
	        	{

				$data = array(
				'judul' => $judul,
				'artikel' => $artikel,
				'isAktif' => $isAktif
				);

				$where = array(
				'id_artikel' => $id_artikel
				);
					$this->modelbackend->ubahBerita1($where,$data,'artikel');
					redirect('backend/lihatartikel');
	        	}
	        	else 
	        	{*/
	        	$photoartikel_1 = '';
        		$config['upload_path']   = './upload/datakeuangan/'; 
				$config['allowed_types'] = 'jpg|png|gif|pdf'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);

				$data = array(
				'Nama_keuangan' => $Nama_keuangan,
				'file_keuangan' => $photoartikel_1
				);
				$data1 = array(
				'Nama_keuangan' => $Nama_keuangan
				);

				$where = array(
				'id_keuangan' => $id_keuangan
				);
				if ( $this->upload->do_upload('photo')) {
					unlink(base_url().'./upload/datakeuangan/'.$photoartikel);
					unset($config);
					$this->Modelbackend->ubahKeuangan($where,$data,'keuangan');
					redirect('daftarkeuangan');
				}	
				else{
					$this->Modelbackend->ubahKeuangan($where,$data1,'keuangan');
					redirect('daftarkeuangan');
				}
			}
			//}
	 
		$this->load->view('dashboardfooter');
		
	}
}


	/*Kegiatan*/

	public function tambahkegiatan()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->helper('url');
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');
		$data['konfirmasi'] = array('konfirmasi' => 1);
		$this->load->view('tambahkegiatan', $data);
		$this->load->view('dashboardfooter');
	}
}
	public function daftarkegiatan()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');


			//$this->load->view('backend/lihatartikel');
			$data = array('kegiatan' => $this->Modelbackend->getKegiatanFull());
		
			//$data['konfirmasi'] = array('konfirmasi' => 1);

			$data['konfirmasi'] = array('konfirmasi' => 1);
			$this->load->view('daftarkegiatan', $data);
		//$this->load->view('frontend/index',$data);
		$this->load->view('dashboardfooter');

	}
}

	public function addkegiatanprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
							
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('Nama_kegiatan', 'Nama_kegiatan', 'required');
			//$this->form_validation->set_rules('header', 'Photo', 'required');

			$this->form_validation->set_message('required','{field} Belum Diisi');
			$this->form_validation->set_message('is_unique','Username {field} Sudah Digunakan');		
			$this->form_validation->set_message('integer','{field} Harus Berupa Angka');
			if ($this->form_validation->run() == FALSE) { 
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('tambahkegiatan',$data);
			}
			else{

				$photoartikel_1 = '';
        		$Nama_kegiatan = $this->input->post("Nama_kegiatan");
				$config['upload_path']   = './upload/datakegiatan/'; 
				$config['allowed_types'] = 'jpg|png|gif|pdf'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);
				if ( $this->upload->do_upload('photo')) {
					unset($config);
					$q = $this->Modelbackend->addKegiatan($Nama_kegiatan,$photoartikel_1);
					if($q!=0)
					{
							$data['konfirmasi'] = array('konfirmasi' => 2);
							$this->load->view('tambahkegiatan',$data);
					}
				}	
				else{
					$status = false;
				}
			}
		//}
		$this->load->view('dashboardfooter');
	}
}

	public function ubahkegiatanprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('Nama_kegiatan', 'Nama_kegiatan', 'required');


			$this->form_validation->set_message('required','{field} Belum Diisi');	

			if ($this->form_validation->run() == FALSE) { 
				$data = array(
	        	'kegiatan' => $this->Modelbackend->getKegiatanFull()
				);
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('daftarkegiatan',$data);
			}
			else{
  				$id_kegiatan = $this->input->post("id_kegiatan");
  				$Nama_kegiatan = $this->input->post("Nama_kegiatan");
	        	$photoartikel = $this->input->post("photo");

	        	/*if($photoartikel == null)
	        	{

				$data = array(
				'judul' => $judul,
				'artikel' => $artikel,
				'isAktif' => $isAktif
				);

				$where = array(
				'id_artikel' => $id_artikel
				);
					$this->modelbackend->ubahBerita1($where,$data,'artikel');
					redirect('backend/lihatartikel');
	        	}
	        	else 
	        	{*/
	        	$photoartikel_1 = '';
        		$config['upload_path']   = './upload/datakegiatan/'; 
				$config['allowed_types'] = 'jpg|png|gif|pdf'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);

				$data = array(
				'Nama_kegiatan' => $Nama_kegiatan,
				'file_kegiatan' => $photoartikel_1
				);
				$data1 = array(
				'Nama_kegiatan' => $Nama_kegiatan
				);

				$where = array(
				'id_kegiatan' => $id_kegiatan
				);
				if ( $this->upload->do_upload('photo')) {
					unlink(base_url().'./upload/datakegiatan/'.$photoartikel);
					unset($config);
					$this->Modelbackend->ubahKegiatan($where,$data,'kegiatan');
					redirect('daftarkegiatan');
				}	
				else{
					$this->Modelbackend->ubahKegiatan($where,$data1,'kegiatan');
					redirect('daftarkegiatan');
				}
			}
			//}
	 
		$this->load->view('dashboardfooter');
		
	}
}
	/*Contact us*/

	public function tambahcontact()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->helper('url');
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');
		$data['konfirmasi'] = array('konfirmasi' => 1);
		$this->load->view('tambahcontact', $data);
		$this->load->view('dashboardfooter');
	}
}
	public function daftarcontact()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');


			//$this->load->view('backend/lihatartikel');
			$data = array('tb_contact' => $this->Modelbackend->getContactFull());
		
			//$data['konfirmasi'] = array('konfirmasi' => 1);

			$data['konfirmasi'] = array('konfirmasi' => 1);
			$this->load->view('daftarcontact', $data);
		//$this->load->view('frontend/index',$data);
		$this->load->view('dashboardfooter');
	}
}

	public function addcontactprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
							
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('lokasi', 'lokasi', 'required');
			$this->form_validation->set_rules('telp', 'telp', 'required');
			//$this->form_validation->set_rules('header', 'Photo', 'required');

			$this->form_validation->set_message('required','{field} Belum Diisi');
			$this->form_validation->set_message('is_unique','Username {field} Sudah Digunakan');		
			$this->form_validation->set_message('integer','{field} Harus Berupa Angka');
			if ($this->form_validation->run() == FALSE) { 
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('tambahcontact',$data);
			}
			else{

        		$lokasi = $this->input->post("lokasi");
        		$telp = $this->input->post("telp");		
				$q = $this->Modelbackend->addContact($lokasi,$telp);
					if($q!=0)
					{
							$data['konfirmasi'] = array('konfirmasi' => 2);
							$this->load->view('tambahcontact',$data);
					}
				
				else
				{
					$status = false;
				}
			}
		//}
		$this->load->view('dashboardfooter');
	}
}

	public function ubahcontactprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
			
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('lokasi', 'lokasi', 'required');
			$this->form_validation->set_rules('telp', 'telp', 'required');


			$this->form_validation->set_message('required','{field} Belum Diisi');	

			if ($this->form_validation->run() == FALSE) { 
				$data = array(
	        	'tb_contact' => $this->Modelbackend->getContactFull()
				);
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('daftarcontact',$data);
			}
			else{
  				$id_contact = $this->input->post("id_contact");
	        	$lokasi = $this->input->post("lokasi");
	        	$telp = $this->input->post("telp");

	        	/*if($photoartikel == null)
	        	{

				$data = array(
				'judul' => $judul,
				'artikel' => $artikel,
				'isAktif' => $isAktif
				);

				$where = array(
				'id_artikel' => $id_artikel
				);
					$this->modelbackend->ubahBerita1($where,$data,'artikel');
					redirect('backend/lihatartikel');
	        	}
	        	else 
	        	{*/
	        	

				$data = array(
				'lokasi' => $lokasi,
				'telp' => $telp
				);
			

				$where = array(
				'id_contact' => $id_contact
				);
				
					$this->Modelbackend->ubahContact($where,$data,'tb_contact');
					redirect('daftarcontact');
				
			}
			//}
	 
		$this->load->view('dashboardfooter');
		
	}
}

	/*Profil Masjid*/
	public function tambahmasjid()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->helper('url');
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');
		$data['konfirmasi'] = array('konfirmasi' => 1);
		$this->load->view('tambahmasjid', $data);
		$this->load->view('dashboardfooter');
	}
}
	public function daftarmasjid()
	{
			if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');


			//$this->load->view('backend/lihatartikel');
			$data = array('majelis' => $this->Modelbackend->getMasjidFull());
		
			//$data['konfirmasi'] = array('konfirmasi' => 1);

			$data['konfirmasi'] = array('konfirmasi' => 1);
			$this->load->view('daftarmasjid', $data);
		//$this->load->view('frontend/index',$data);
		$this->load->view('dashboardfooter');
	}
}

	public function addmasjidprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
							
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
			//$this->form_validation->set_rules('header', 'Photo', 'required');

			$this->form_validation->set_message('required','{field} Belum Diisi');
			$this->form_validation->set_message('is_unique','Username {field} Sudah Digunakan');		
			$this->form_validation->set_message('integer','{field} Harus Berupa Angka');
			if ($this->form_validation->run() == FALSE) { 
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('tambahmasjid',$data);
			}
			else{

				$photoartikel_1 = '';
        		$deskripsi = $this->input->post("deskripsi");
				$config['upload_path']   = './upload/datamasjid/'; 
				$config['allowed_types'] = 'jpg|png|gif'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);
				if ( $this->upload->do_upload('photo')) {
					unset($config);
					$q = $this->Modelbackend->addMasjid($photoartikel_1,$deskripsi);
					if($q!=0)
					{
							$data['konfirmasi'] = array('konfirmasi' => 2);
							$this->load->view('tambahmasjid',$data);
					}
				}	
				else{
					$status = false;
				}
			}
		//}
		$this->load->view('dashboardfooter');
	}
}

	public function ubahmasjidprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
			
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');


			$this->form_validation->set_message('required','{field} Belum Diisi');	

			if ($this->form_validation->run() == FALSE) { 
				$data = array(
	        	'majelis' => $this->Modelbackend->getMajelisFull()
				);
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('daftarmasjid',$data);
			}
			else{
  				$id_majelis = $this->input->post("id_majelis");
	        	$photoartikel = $this->input->post("photo");
	        	$deskripsi = $this->input->post("deskripsi");

	        	/*if($photoartikel == null)
	        	{

				$data = array(
				'judul' => $judul,
				'artikel' => $artikel,
				'isAktif' => $isAktif
				);

				$where = array(
				'id_artikel' => $id_artikel
				);
					$this->modelbackend->ubahBerita1($where,$data,'artikel');
					redirect('backend/lihatartikel');
	        	}
	        	else 
	        	{*/
	        	$photoartikel_1 = '';
        		$config['upload_path']   = './upload/datamasjid/'; 
				$config['allowed_types'] = 'jpg|png|gif'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);

				$data = array(
				'foto' => $photoartikel_1,
				'deskripsi' => $deskripsi
				);
				$data1 = array(
				'deskripsi' => $deskripsi
				);

				$where = array(
				'id_majelis' => $id_majelis
				);
				if ( $this->upload->do_upload('photo')) {
					unlink(base_url().'./upload/datamasjid/'.$photoartikel);
					unset($config);
					$this->Modelbackend->ubahMasjid($where,$data,'majelis');
					redirect('daftarmasjid');
				}	
				else{
					$this->Modelbackend->ubahMasjid($where,$data1,'majelis');
					redirect('daftarmasjid');
				}
			}
			//}
	 
		$this->load->view('dashboardfooter');
		
	}
}

	/*Kepengurusan*/
	public function tambahpengurus()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->helper('url');
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');
		$data['konfirmasi'] = array('konfirmasi' => 1);
		$this->load->view('tambahpengurus', $data);
		$this->load->view('dashboardfooter');
	}
}
	public function daftarpengurus()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
		$this->load->view('dashboardheader');
		$this->load->view('dashboardnav');


			//$this->load->view('backend/lihatartikel');
			$data = array('kepengurusan' => $this->Modelbackend->getKepengurusanFull());
		
			//$data['konfirmasi'] = array('konfirmasi' => 1);

			$data['konfirmasi'] = array('konfirmasi' => 1);
			$this->load->view('daftarpengurus', $data);
		//$this->load->view('frontend/index',$data);
		$this->load->view('dashboardfooter');
	}
}

	public function addkepengurusanprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
							
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama', 'nama', 'required');
			$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
			//$this->form_validation->set_rules('header', 'Photo', 'required');

			$this->form_validation->set_message('required','{field} Belum Diisi');
			$this->form_validation->set_message('is_unique','Username {field} Sudah Digunakan');		
			$this->form_validation->set_message('integer','{field} Harus Berupa Angka');
			if ($this->form_validation->run() == FALSE) { 
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('tambahpengurus',$data);
			}
			else{

				$photoartikel_1 = '';
        		$nama = $this->input->post("nama");
        		$deskripsi = $this->input->post("deskripsi");
				$config['upload_path']   = './upload/datakepengurusan/'; 
				$config['allowed_types'] = 'jpg|png|gif'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);
				if ( $this->upload->do_upload('photo')) {
					unset($config);
					$q = $this->Modelbackend->addKepengurusan($photoartikel_1,$nama,$deskripsi);
					if($q!=0)
					{
							$data['konfirmasi'] = array('konfirmasi' => 2);
							$this->load->view('tambahpengurus',$data);
					}
				}	
				else{
					$status = false;
				}
			}
		//}
		$this->load->view('dashboardfooter');
	}
}

	public function ubahkepengurusanprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
			
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama', 'nama', 'required');
			$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');


			$this->form_validation->set_message('required','{field} Belum Diisi');	

			if ($this->form_validation->run() == FALSE) { 
				$data = array(
	        	'kepengurusan' => $this->Modelbackend->getKepengurusanFull()
				);
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('daftarpengurus',$data);
			}
			else{
  				$id_pengurus = $this->input->post("id_pengurus");
	        	$photoartikel = $this->input->post("photo");
				$nama = $this->input->post("nama");
	        	$deskripsi = $this->input->post("deskripsi");

	        	/*if($photoartikel == null)
	        	{

				$data = array(
				'judul' => $judul,
				'artikel' => $artikel,
				'isAktif' => $isAktif
				);

				$where = array(
				'id_artikel' => $id_artikel
				);
					$this->modelbackend->ubahBerita1($where,$data,'artikel');
					redirect('backend/lihatartikel');
	        	}
	        	else 
	        	{*/
	        	$photoartikel_1 = '';
        		$config['upload_path']   = './upload/datakepengurusan/'; 
				$config['allowed_types'] = 'jpg|png|gif'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);

				$data = array(
				'foto' => $photoartikel_1,
				'nama' => $nama,
				'deskripsi' => $deskripsi
				);
				$data1 = array(
				'nama' => $nama,
				'deskripsi' => $deskripsi
				);

				$where = array(
				'id_pengurus' => $id_pengurus
				);
				if ( $this->upload->do_upload('photo')) {
					unlink(base_url().'./upload/datakepengurusan/'.$photoartikel);
					unset($config);
					$this->Modelbackend->ubahKepengurusan($where,$data,'kepengurusan');
					redirect('daftarpengurus');
				}	
				else{
					$this->Modelbackend->ubahKepengurusan($where,$data1,'kepengurusan');
					redirect('daftarpengurus');
				}
			}
			//}
	 
		$this->load->view('dashboardfooter');
		
	}
}

	/*Foto*/

	public function addfotoprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
							
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'judul', 'required');
			$this->form_validation->set_rules('posted_by', 'posted_by', 'required');
			$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
			//$this->form_validation->set_rules('header', 'Photo', 'required');

			$this->form_validation->set_message('required','{field} Belum Diisi');
			$this->form_validation->set_message('is_unique','Username {field} Sudah Digunakan');		
			$this->form_validation->set_message('integer','{field} Harus Berupa Angka');
			if ($this->form_validation->run() == FALSE) { 
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('tambahfoto',$data);
			}
			else{

				$photoartikel_1 = '';
        		$judul = $this->input->post("judul");
        		$posted_by = $this->input->post("posted_by");
        		$deskripsi = $this->input->post("deskripsi");
				$config['upload_path']   = './upload/datafoto/'; 
				$config['allowed_types'] = 'jpg|png|gif'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);
				if ( $this->upload->do_upload('photo')) {
					unset($config);
					$q = $this->Modelbackend->addFoto($photoartikel_1,$judul,$posted_by,$deskripsi);
					if($q!=0)
					{
							$data['konfirmasi'] = array('konfirmasi' => 2);
							$this->load->view('tambahfoto',$data);
					}
				}	
				else{
					$status = false;
				}
			}
		//}
		$this->load->view('dashboardfooter');
	}
}

	public function ubahfotoprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {	
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'judul', 'required');
			$this->form_validation->set_rules('posted_by', 'posted_by', 'required');
			$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');


			$this->form_validation->set_message('required','{field} Belum Diisi');	

			if ($this->form_validation->run() == FALSE) { 
				$data = array(
	        	'foto' => $this->Modelbackend->getFotoFull()
				);
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('daftarfoto',$data);
			}
			else{
  				$id_foto = $this->input->post("id_foto");
	        	$photoartikel = $this->input->post("photo");
				$judul = $this->input->post("judul");
	        	$posted_by = $this->input->post("posted_by");
	        	$deskripsi = $this->input->post("deskripsi");

	        	/*if($photoartikel == null)
	        	{

				$data = array(
				'judul' => $judul,
				'artikel' => $artikel,
				'isAktif' => $isAktif
				);

				$where = array(
				'id_artikel' => $id_artikel
				);
					$this->modelbackend->ubahBerita1($where,$data,'artikel');
					redirect('backend/lihatartikel');
	        	}
	        	else 
	        	{*/
	        	$photoartikel_1 = '';
        		$config['upload_path']   = './upload/datafoto/'; 
				$config['allowed_types'] = 'jpg|png|gif'; 
				$config['overwrite']      = TRUE; 
				$config['max_size']      = 1000;
				$path = $_FILES['photo']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION); //ambil extension
				$photoartikel = time();
				$photoartikel_1 = $photoartikel.".".$ext;
				$config['file_name'] = $photoartikel;
				$this->upload->initialize($config);

				$data = array(
				'foto' => $photoartikel_1,
				'judul' => $judul,
				'posted_by' => $posted_by,
				'deskripsi' => $deskripsi
				);
				$data1 = array(
				'judul' => $judul,
				'posted_by' => $posted_by,
				'deskripsi' => $deskripsi
				);

				$where = array(
				'id_foto' => $id_foto
				);
				if ( $this->upload->do_upload('photo')) {
					unlink(base_url().'./upload/datafoto/'.$photoartikel);
					unset($config);
					$this->Modelbackend->ubahFoto($where,$data,'foto');
					redirect('daftarfoto');
				}	
				else{
					$this->Modelbackend->ubahFoto($where,$data1,'foto');
					redirect('daftarfoto');
				}
			}
			//}
	 
		$this->load->view('dashboardfooter');
		
	}
}

	/*Video*/

	public function addvideoprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
							
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'judul', 'required');
			$this->form_validation->set_rules('url_video', 'url_video', 'required');
			//$this->form_validation->set_rules('header', 'Photo', 'required');

			$this->form_validation->set_message('required','{field} Belum Diisi');
			$this->form_validation->set_message('is_unique','Username {field} Sudah Digunakan');		
			$this->form_validation->set_message('integer','{field} Harus Berupa Angka');
			if ($this->form_validation->run() == FALSE) { 
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('tambahvideo',$data);
			}
			else{

				$photoartikel_1 = '';
        		$judul = $this->input->post("judul");
        		$url_video = $this->input->post("url_video");
				$q = $this->Modelbackend->addVideo($judul,$url_video);
				if($q!=0)
					{
							$data['konfirmasi'] = array('konfirmasi' => 2);
							$this->load->view('tambahvideo',$data);
					}
				
				
			}
		//}
		$this->load->view('dashboardfooter');
	}
}

	public function ubahvideoprocess()
	{
		if(!$this->session->userdata('isLoginAdmin')) { 
     		redirect('login', 'refresh'); 
     	}
  		else {
			
			$this->load->helper('url');
			$this->load->view('dashboardheader');
			$this->load->view('dashboardnav');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'judul', 'required');
			$this->form_validation->set_rules('url_video', 'url_video', 'required');


			$this->form_validation->set_message('required','{field} Belum Diisi');	

			if ($this->form_validation->run() == FALSE) { 
				$data = array(
	        	'video' => $this->Modelbackend->getVideoFull()
				);
				$data['konfirmasi'] = array('konfirmasi' => 1);
				$this->load->view('daftarvideo',$data);
			}
			else{
  				$id_video = $this->input->post("id_video");
				$judul = $this->input->post("judul");
	        	$url_video = $this->input->post("url_video");;

	        	/*if($photoartikel == null)
	        	{

				$data = array(
				'judul' => $judul,
				'artikel' => $artikel,
				'isAktif' => $isAktif
				);

				$where = array(
				'id_artikel' => $id_artikel
				);
					$this->modelbackend->ubahBerita1($where,$data,'artikel');
					redirect('backend/lihatartikel');
	        	}
	        	else 
	        	{*/
	      

				$data = array(
				'judul' => $judul,
				'url_video' => $url_video
				);

				$where = array(
				'id_video' => $id_video
				);
				
					$this->Modelbackend->ubahVideo($where,$data,'video');
					redirect('daftarvideo');
				
			}
			//}

  			

			
		
	 
		$this->load->view('dashboardfooter');
		
	}
}

	public function logout()
	{
		$newdata = array( 
						   'nama'  => "", 
						   'username'     => "", 
						   'email'     => "", 
						   'id'     => "", 
						   'isLoginAdmin' => FALSE
						);
		unset($_SESSION['nama']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		unset($_SESSION['id']);
		unset($_SESSION['isLoginAdmin']);
		$this->session->unset_userdata('$newdataadmin');
     		redirect('login', 'refresh'); 
	}

	
}
