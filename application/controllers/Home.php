<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
   		parent::__construct();
   		$this->load->model('modeldepan');
	}

	public function index()
	{
		$this->home();
	}

	public function test()
	{
		echo 'tyest';
	}

	public function home()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$dataslide = $this->modeldepan->GetSlide();
   		$dataslide2 = $this->modeldepan->GetSlide2();
   		$datanewnews = $this->modeldepan->GetNewNews();
   		$datafoto = $this->modeldepan->GetFoto();
   		$datafoto2 = $this->modeldepan->GetFoto2();
   		$datavideo2 = $this->modeldepan->GetVideo2();
		$this->load->view('home',array('dataslide'=>$dataslide,'dataslide2'=>$dataslide2, 'datanewnews'=>$datanewnews, 'datafoto'=>$datafoto,'datafoto2'=>$datafoto2, 'datavideo2'=>$datavideo2));
		$this->load->view('footer');
	}

	public function berita($detail = '')
	{
		$detailstr = str_replace("-"," ", $detail);
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$datanewnews = $this->modeldepan->GetNewNews();
   		$datanews = $this->modeldepan->GetNewsDetail($detailstr);
		$this->load->view('berita',array('datanewnews'=>$datanewnews,'datanews' => $datanews));
		$this->load->view('footer');
	}
	public function beritadetail($id, $detail)
	{
		$detailstr = str_replace("-"," ", $detail);
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$datanewnews= $this->modeldepan->GetNewNews();
   		if($detail != null)
   		{
   			$datanews = $this->modeldepan->GetNewsDetail($id);
			$this->load->view('beritadetail',array('datanewnews' => $datanewnews, 'datanews' => $datanews));
   		}
   		else
   		{
   			$kosong = 0;
   			$this->berita($kosong);
   		}

		$this->load->view('footer');
	}


	public function foto($detail = '')
	{
		$detailstr = str_replace("-"," ", $detail);
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$datafoto = $this->modeldepan->GetFoto();
   		$datafoto2 = $this->modeldepan->GetFoto2();
   		$datafotodetail = $this->modeldepan->GetFotoDetail($detailstr);
		$this->load->view('foto',array('datafoto'=>$datafoto,'datafoto2'=>$datafoto2,'datafotodetail' => $datafotodetail));
		$this->load->view('footer');
	}

	public function fotodetail($id, $detail)
	{
		$detailstr = str_replace("-"," ", $detail);
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$datafoto= $this->modeldepan->GetFoto();
   		$datafoto2= $this->modeldepan->GetFoto2();
   		if($detail != null)
   		{
   			$datafotodetail = $this->modeldepan->GetFotoDetail($id);
			$this->load->view('fotodetail',array('datafoto' => $datafoto,'datafoto2' => $datafoto2, 'datafotodetail' => $datafotodetail));
   		}
   		else
   		{
   			$kosong = 0;
   			$this->foto($kosong);
   		}

		$this->load->view('footer');
	}
	public function contact()
	{

		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$datacontact = $this->modeldepan->GetContact();
		$this->load->view('contact',array('datacontact' => $datacontact));
		$this->load->view('footer');
	}

	public function jadwal()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$datajadwal = $this->modeldepan->GetJadwal();
		$this->load->view('jadwal',array('datajadwal' => $datajadwal));
		$this->load->view('footer');
	}
	public function profilemasjid()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$dataprofilemasjid = $this->modeldepan->GetProfileMasjid();
		$this->load->view('profilemasjid',array('dataprofilemasjid' => $dataprofilemasjid));
		$this->load->view('footer');
	}
	public function profiledkm()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$dataprofiledkm = $this->modeldepan->GetProfileDKM();
		$this->load->view('profiledkm',array('dataprofiledkm' => $dataprofiledkm));
		$this->load->view('footer');
	}

	public function video()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$datavideo = $this->modeldepan->GetVideo();
		$this->load->view('video',array('datavideo' => $datavideo));
		$this->load->view('footer');
	}
	public function video2()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$datavideo2 = $this->modeldepan->GetVideo2();
		$this->load->view('video',array('datavideo2' => $datavideo2));
		$this->load->view('footer');
	}

	public function keuangan()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$datakeuangan = $this->modeldepan->GetLaporanKeuangan();
		$this->load->view('keuangan',array('datakeuangan' => $datakeuangan));
		$this->load->view('footer');
	}

	public function kegiatan()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('navbar');
   		$datakegiatan = $this->modeldepan->GetLaporanKegiatan();
		$this->load->view('kegiatan',array('datakegiatan' => $datakegiatan));
		$this->load->view('footer');
	}


}
