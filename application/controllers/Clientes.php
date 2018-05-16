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
		
		$data['clientes'] = $this->clientes_model->get_all();

		$this->load->view('clientes/list', $data);
	}

	public function cadastrar()
	{
		$this->load->view('clientes/form');
	}

	public function inserir()
	{

		$data['nome'] = $_POST['nome'];
        $data['endereco'] = $_POST['endereco'];
        $data['telefone'] = $_POST['telefone'];

		$this->clientes_model->insert($data);

		redirect('/clientes/');
	}

	public function alterar($id_cliente)
	{
		$cliente = $this->clientes_model->get_by_id($id_cliente);
		
		$this->load->view('clientes/form', $cliente);
	}

	public function atualizar($id_cliente)
	{

	}

	public function excluir($id_cliente)
	{
		$this->clientes_model->delete($id_cliente);

		redirect('/clientes/');
	}
}
