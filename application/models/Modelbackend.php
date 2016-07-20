<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelbackend extends CI_Model {
	/*Admin*/

	public function cekAdmin($email,$pass){
		
       $this->load->database();
		$q = "select * from admin where email = '$email' and password='$pass'";
	    return $this->db->query($q);
	}



	/*Berita*/

	public function addBerita($foto,$judul,$tanggal,$posted_by,$isi_berita){
		
       $this->load->database();
       $q = "insert into berita(foto,judul,tanggal,posted_by,isi_berita) 
		values('$foto','$judul','$tanggal','$posted_by','$isi_berita')";
		return $this->db->query($q);
	}

	public function getArtikelFull(){

       $this->load->database();
		$q = "select A.id_berita,A.foto ,A.judul,A.tanggal,A.posted_by, A.isi_berita from berita A
	    	where A.id_berita order by tanggal DESC";
	    return $this->db->query($q);
	}
	
	public function ubahBerita($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	/*Gallery*/
	public function addFoto($foto,$judul,$posted_by,$deskripsi){
		
       $this->load->database();
       $q = "insert into foto(foto,judul,posted_by,deskripsi) 
		values('$foto','$judul','$posted_by','$deskripsi')";
		return $this->db->query($q);
	}

	public function getFotoFull(){

       $this->load->database();
		$q = "select A.id_foto,A.foto as icon,A.judul,A.posted_by, A.deskripsi from foto A
	    	where A.id_foto order by id_foto DESC";
	    return $this->db->query($q);
	}
	
	public function ubahFoto($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	/*Video*/
	public function addVideo($judul,$url_video){
		
       $this->load->database();
       $q = "insert into video(judul,url_video) 
		values('$judul','$url_video')";
		return $this->db->query($q);
	}

	public function getVideoFull(){

       $this->load->database();
		$q = "select A.id_video,A.judul,A.url_video from video A
	    	where A.id_video order by id_video DESC";
	    return $this->db->query($q);
	}
	
	public function ubahVideo($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	/*Keuangan*/

	public function addKeuangan($Nama_keuangan,$file_keuangan){
		
       $this->load->database();
       $q = "insert into keuangan(Nama_keuangan,file_keuangan) 
		values('$Nama_keuangan','$file_keuangan')";
		return $this->db->query($q);
	}

	public function getKeuanganFull(){

       $this->load->database();
		$q = "select A.id_keuangan,A.Nama_keuangan,A.file_keuangan from keuangan A
	    	where A.id_keuangan order by id_keuangan DESC";
	    return $this->db->query($q);
	}
	
	public function ubahKeuangan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	/*Laporan Kegiatan*/

	public function addKegiatan($Nama_kegiatan,$file_kegiatan){
		
       $this->load->database();
       $q = "insert into kegiatan(Nama_kegiatan,file_kegiatan) 
		values('$Nama_kegiatan','$file_kegiatan')";
		return $this->db->query($q);
	}

	public function getKegiatanFull(){

       $this->load->database();
		$q = "select A.id_kegiatan,A.Nama_kegiatan,A.file_kegiatan from kegiatan A
	    	where A.id_kegiatan order by id_kegiatan DESC";
	    return $this->db->query($q);
	}
	
	public function ubahKegiatan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	/*Jadwal*/
	public function addJadwal($nama_kegiatan,$tanggal_kegiatan, $waktu){
		
       $this->load->database();
       $q = "insert into jadwal_kegiatan(nama_kegiatan,tanggal_kegiatan,waktu) 
		values('$nama_kegiatan','$tanggal_kegiatan','$waktu')";
		return $this->db->query($q);
	}

	public function getJadwalFull(){

       $this->load->database();
		$q = "select A.id_kegiatan, A.nama_kegiatan, A.tanggal_kegiatan, A.waktu from jadwal_kegiatan A
	    	where A.id_kegiatan order by id_kegiatan DESC";
	    return $this->db->query($q);
	}
	
	public function ubahJadwal($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	/*Kepengurusan*/
	public function addKepengurusan($foto,$nama, $deskripsi){
		
       $this->load->database();
       $q = "insert into kepengurusan(foto,nama,deskripsi) 
		values('$foto','$nama','$deskripsi')";
		return $this->db->query($q);
	}

	public function getKepengurusanFull(){

       $this->load->database();
		$q = "select A.id_pengurus, A.foto, A.nama, A.deskripsi from kepengurusan A
	    	where A.id_pengurus order by id_pengurus DESC";
	    return $this->db->query($q);
	}
	
	public function ubahKepengurusan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}


	/*Profil Masjid*/
	public function addMasjid($foto,$deskripsi){
		
       $this->load->database();
       $q = "insert into majelis(foto,deskripsi) 
		values('$foto','$deskripsi')";
		return $this->db->query($q);
	}

	public function getMasjidFull(){

       $this->load->database();
		$q = "select A.id_majelis, A.foto, A.deskripsi from majelis A
	    	where A.id_majelis order by id_majelis DESC";
	    return $this->db->query($q);
	}
	
	public function ubahMasjid($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	/*Contact Us*/
		public function addContact($lokasi,$telp){
		
       $this->load->database();
       $q = "insert into tb_contact(lokasi,telp) 
		values('$lokasi','$telp')";
		return $this->db->query($q);
	}

	public function getContactFull(){

       $this->load->database();
		$q = "select A.id_contact, A.lokasi, A.telp from tb_contact A
	    	where A.id_contact order by id_contact DESC";
	    return $this->db->query($q);
	}
	
	public function ubahContact($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);

	}
	/*Slide*/
	public function addSlide($foto,$posted_by){
		
       $this->load->database();
       $q = "insert into slide(foto,posted_by) 
		values('$foto','$posted_by')";
		return $this->db->query($q);
	}

	public function getSlideFull(){

       $this->load->database();
		$q = "select A.id_slide,A.foto,A.posted_by from slide A
	    	where A.id_slide order by id_slide DESC";
	    return $this->db->query($q);
	}
	
	public function ubahSlide($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
