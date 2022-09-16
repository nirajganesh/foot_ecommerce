<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    function __construct()
    {
		parent:: __construct();
        $this->load->model('GetModel','fetch');
	}

    public function index()
	{	
		 $response=array();
		 $response['banner']=$this->fetch->getInfo('banner');
		 $response['category']=$this->fetch->getInfo('categories');
		 $response['product']=$this->fetch->getInfo('products');
		 $response['deal']=$this->fetch->getInfoByActive('best_deal');
		// $response['vid']=$this->fetch->getInfo('video');
		// $response['projects']=$this->fetch->getInfoByLim('portfolio', 3);
		// var_dump('<pre>',$response);exit;
		$this->load->view('header',$response);
		$this->load->view('index');
		$this->load->view('footer');
	}


	public function shop()
	{
		//$response=array();
		//$response['banner']=$this->fetch->getInfo('banner');
		//$response['category']=$this->fetch->getInfo('categories');
	   //	$response['product']=$this->fetch->getInfo('products');
	   //$response['deal']=$this->fetch->getInfoByActive('best_deal');
		$this->load->view('header');
		$this->load->view('shop');
		$this->load->view('footer');
	}

	public function blog()
	{
		
		// $response=array();
		// $response['banner']=$this->fetch->getInfo('banner');
		// $response['category']=$this->fetch->getInfo('categories');
		// $response['product']=$this->fetch->getInfo('products');
		// $response['deal']=$this->fetch->getInfoByActive('best_deal');
		$this->load->view('header');
		$this->load->view('blog');
		$this->load->view('footer');
	}
	public function contact()
	{
		$response=array();
		$response['banner']=$this->fetch->getInfo('banner');
		$response['category']=$this->fetch->getInfo('categories');
		$response['product']=$this->fetch->getInfo('products');
		$response['deal']=$this->fetch->getInfoByActive('best_deal');
		$this->load->view('header',$response);
		$this->load->view('contact');
		$this->load->view('footer');
	}
	public function authenticate()
	{
		$response=array();
		$response['banner']=$this->fetch->getInfo('banner');
		$response['category']=$this->fetch->getInfo('categories');
		$response['product']=$this->fetch->getInfo('products');
		$response['deal']=$this->fetch->getInfoByActive('best_deal');
		$this->load->view('header',$response);
		$this->load->view('login');
		$this->load->view('footer');
	}
}
?>