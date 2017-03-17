<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	// automatically loaded if no method is specified
	public function index()
	{
		// see if 'counter' exists in the session
		if($this->session->userdata('counter'))
		{
			// if user has already visisted the website before
			$counter = $this->session->userdata('counter');
			$this->session->set_userdata('counter', $counter+1);
		}
		else 
		{
			// user has not visisted the site before (first time)
			$this->session->set_userdata('counter', 1);
		}
		// load view file named index.php
		// second argument has to be an associative array so the view file knows what variable it needs to create
		$this->load->view('index', array("counter" => $this->session->userdata('counter')));

		// echo $this->session->userdata('counter');
	}

	public function hello()
	{
		echo "came here";
	}
	
	public function reset()
	{
		$this->session->set_userdata('counter', 0);
		redirect('/');
	}
}









