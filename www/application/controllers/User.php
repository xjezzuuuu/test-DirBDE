<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	private $_name;
	private $_email;

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set('America/Santiago');
		$this->load->model('User_model', 'users');
	}

	public function index()
	{
		$data['allUsers'] = $this->users->readAll();

		$this->load->view('base/header');
		$this->load->view('base/navbar');
		$this->load->view('site/index', $data);
		$this->load->view('base/footer');
	}

	public function create()
	{
		$this->load->view('base/header');
		$this->load->view('base/navbar');
		$this->load->view('site/create');
		$this->load->view('base/footer');
	}

	public function store()
	{
		$this->setGeneralRules();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('base/header');
			$this->load->view('base/navbar');
			$this->load->view('site/create');
			$this->load->view('base/footer');
		} else {
			$this->getPostName();
			$this->getPostEmail();

			$this->users->setName($this->_name);
			$this->users->setEmail($this->_email);
			$this->users->setCreatedAt(date("Y-m-d H:i:s"));

			if ($this->users->insert()) {
				redirect(base_url(), 'refresh');
			}
		}
	}

	private function setGeneralRules()
	{
		$this->form_validation->set_rules('name', 'name', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[usuarios.email]',  array('is_unique' => 'El %s ya se encuentra registrado!'));
	}

	private function getPostName()
	{
		$this->_name = $this->input->post('name', true);
	}

	private function getPostEmail()
	{
		$this->_email = $this->input->post('email', true);
	}
}
