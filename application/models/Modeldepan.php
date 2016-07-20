<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modeldepan extends CI_Model {

	public function GetContact(){
		
       $this->load->database();
		$datacontact = $this->db->query('select * from tb_contact order by id_contact desc LIMIT 0,1');
		return $datacontact->result_array();
	}

	public function GetSlide(){
		
       $this->load->database();
		$dataslide = $this->db->query('select * from slide order by id_slide desc LIMIT 0,2');
		return $dataslide->result_array();
	}
	public function GetSlide2(){
		
       $this->load->database();
		$dataslide2 = $this->db->query('select * from slide order by id_slide asc LIMIT 0,1');
		return $dataslide2->result_array();
	}

	public function GetLaporanKeuangan(){
		
       $this->load->database();
		$datakeuangan = $this->db->query('select * from keuangan');
		return $datakeuangan->result_array();
	}

	public function GetLaporanKegiatan(){
		
       $this->load->database();
		$datakegiatan = $this->db->query('select * from kegiatan');
		return $datakegiatan->result_array();
	}

	public function GetNewNews(){
       $this->load->database();
		$datanewnews = $this->db->query('select  * from berita order by id_berita desc LIMIT 0,3');
		return $datanewnews->result_array();
	}

	public function GetNewsDetail($id)
	{
       $this->load->database();
		if($id != null)
		{
			$datanews = $this->db->get_where('berita', array('id_berita' => $id));
			return $datanews->result_array();
		}
		else
		{
			$datanews = $this->db->query('SELECT * FROM berita order by id_berita desc');
			return $datanews->result_array();
			//$this->news();
		}
	}

	public function GetFoto2(){
       $this->load->database();
		$datafoto2 = $this->db->query('select * from foto order by id_foto desc LIMIT 0,3');
		return $datafoto2->result_array();
	}
	public function GetFoto(){
       $this->load->database();
		$datafoto = $this->db->query('select * from foto order by id_foto desc');
		return $datafoto->result_array();
	}

	public function GetFotoDetail($id)
	{
       $this->load->database();
		if($id != null)
		{
			$datafotodetail = $this->db->get_where('foto', array('id_foto' => $id));
			return $datafotodetail->result_array();
		}
		else
		{
			$datafotodetail = $this->db->query('SELECT * FROM foto order by id_foto desc');
			return $datafotodetail->result_array();
			//$this->news();
		}
	}

	public function GetProfileMasjid(){
		
       $this->load->database();
		$dataprofilemasjid = $this->db->query('select * from majelis order by id_majelis desc LIMIT 0,1');
		return $dataprofilemasjid->result_array();
	}

	public function GetProfileDKM(){
		
       $this->load->database();
		$dataprofiledkm = $this->db->query('select * from kepengurusan');
		return $dataprofiledkm->result_array();
	}

	public function GetVideo(){
		
       $this->load->database();
		$datavideo = $this->db->query('select * from video');
		return $datavideo->result_array();
	}

	public function GetVideo2(){
		
       $this->load->database();
		$datavideo2 = $this->db->query('select * from video order by id_video desc LIMIT 0,2');
		return $datavideo2->result_array();
	}

	public function GetJadwal(){
		
      /* $this->load->database();
		$datajadwal = $this->db->query('select A.id_kegiatan,A.kategori_jadwal, A.nama_kegiatan, A.tanggal_kegiatan, A.waktu from jadwal_kegiatan A group by A.kategori_jadwal order by id_kegiatan asc');
		return $datajadwal->result_array();*/	
		$datajadwal = $this->db->query('SELECT jadwal_kegiatan.id_kegiatan, jadwal_kegiatan.nama_kegiatan, jadwal_kegiatan.tanggal_kegiatan, jadwal_kegiatan.waktu 
		FROM jadwal_kegiatan
		order by jadwal_kegiatan.id_kegiatan asc');
		return $datajadwal->result_array();
	}

}
