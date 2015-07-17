<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Controller {

	public $limit = 6;

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function index_html()
	{
		$leads['limit'] = $this->limit;
		$leads['leads'] = $this->lead->get_all_leads('limit '. $this->limit);
		$leads['all'] = $this->lead->get_all_leads();
		$this->load->view('partials/lead_table', $leads);
	}

	public function ultimate_pages()
	{
		$post = $this->input->post();
		var_dump($post);

		$this->session->set_flashdata('page', $post['page']);

		redirect('/mains/ultimate_leads');
		die();
	}

	public function ultimate_leads()
	{
		$post = $this->input->post();

		if(!isset($post['name']) || $post['name'] == null)
		{
			$post['name'] = '%';
		}	
		if(!isset($post['from']) || $post['from'] == null)
		{
			$post['from'] = '1999-01-01';
		}	
		if(!isset($post['date']) || $post['date'] == null)
		{
			$post['date'] = '2060-01-01';
		}	
		if($this->session->flashdata('page'))
		{
			$post['page'] = 'LIMIT '. ($this->session->flashdata('page')-1)*$this->limit .', '. $this->limit;
		}
		else
		{
			$post['page'] = "LIMIT ". $this->limit;
		}

		$leads['limit'] = $this->limit;
		$leads['leads'] = $this->lead->ultimate_leads($post['name'], $post['from'], $post['date'], $post['page']);
		$leads['all'] = $this->lead->ultimate_leads($post['name'], $post['from'], $post['date']);

		$this->load->view('partials/lead_table', $leads);
	}
}

//end of main controller