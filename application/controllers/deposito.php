<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deposito extends CI_Controller {

	public function index()
	{
		$this->load->view('view_header');
		$this->load->view('view_deposito');
	}
}
?>