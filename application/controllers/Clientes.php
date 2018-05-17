<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        
        $clientes_model = $this->load->model('clientes_model');
    }

	public function index()
	{
		
		$search = array();

		if(!empty($this->input->post('pesquisa')) && !empty($this->input->post('filtro'))) {
			$search = [
				$this->input->post('filtro') => $this->input->post('pesquisa')
			];	
		}

		$config = array(
			"base_url" => base_url('clientes/page'),
			"per_page" => 10,
			"num_links" => 3,
			"uri_segment" => 3,
			"total_rows" => $this->clientes_model->countAll(),
			"full_tag_open" => "<ul class='pagination'>",
			"full_tag_close" => "</ul>",
			"first_link" => FALSE,
			"last_link" => FALSE,
			"first_tag_open" => "<li>",
			"first_tag_close" => "</li>",
			"prev_link" => "Anterior",
			"prev_tag_open" => "<li class='page-item prev'>",
			"prev_tag_close" => "</li>",
			"next_link" => "Próxima",
			"next_tag_open" => "<li class='page-item next'>",
			"next_tag_close" => "</li>",
			"last_tag_open" => "<li class='page-item'>",
			"last_tag_close" => "</li>",
			"cur_tag_open" => "<li class='page-item active'><a class='page-link' href='#'>",
			"cur_tag_close" => "</a></li>",
			"num_tag_open" => "<li class='page-item'>",
			"num_tag_close" => "</li>"
		);
		
		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['clientes'] = $this->clientes_model->getAll('nome', 'asc', $config['per_page'], $offset, $search);

		$data['msg'] = $this->session->flashdata('msg');

		$this->load->view('clientes/list', $data);
	}

	public function cadastrar()
	{
		
		$data['op'] = 'add';

		$data['page'] = $this->load->view('clientes/form', $data, TRUE);

		$this->load->view('layout', $data);
	}

	public function inserir()
	{
		$data['nome'] 	  = $this->input->post('nome');
        $data['endereco'] = $this->input->post('endereco');
        $data['telefone'] = $this->input->post('telefone');
        $data['email'] 	  = $this->input->post('email');

		$this->clientes_model->insert($data);

		$this->session->set_flashdata('msg', 'Cadastro realizado com sucesso!');

		redirect('/clientes/');
	}

	public function visualizar($id_cliente)
	{
		$data['cliente'] = $this->clientes_model->getById($id_cliente);
		$data['op'] = 'view';
		
		$data['page'] = $this->load->view('clientes/form', $data, TRUE);

		$this->load->view('layout', $data);
	}

	public function alterar($id_cliente)
	{
		$data['cliente'] = $this->clientes_model->getById($id_cliente);
		$data['op'] = 'edit';

		$data['page'] = $this->load->view('clientes/form', $data, TRUE);

		$this->load->view('layout', $data);
	}

	public function atualizar($id_cliente)
	{
		$data['nome'] 	  = $this->input->post('nome');
        $data['endereco'] = $this->input->post('endereco');
        $data['telefone'] = $this->input->post('telefone');
        $data['email'] 	  = $this->input->post('email');

		$this->clientes_model->update($id_cliente, $data);

		$this->session->set_flashdata('msg', 'Cadastro alterado com sucesso!');

		redirect('/clientes/');
	}

	public function excluir($id_cliente)
	{
		$this->clientes_model->delete($id_cliente);

		$this->session->set_flashdata('msg', 'Cadastro excluído com sucesso!');

		redirect('/clientes/');
	}
}
