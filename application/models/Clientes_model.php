<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

	public function get_all()
    {
        $query = $this->db->get('clientes', 10);

        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert('clientes', $data);
    }

    public function delete($id_cliente)
    {
        $this->db->where('id', $id_cliente);
		$this->db->delete('clientes');
    }

}