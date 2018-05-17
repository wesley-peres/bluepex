<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

	public function getAll($sort = 'id', $order = 'asc', $limit = null, $offset = null, $search = null)
    {        
        
        $this->db->order_by($sort, $order);
        
        if ($limit)
            $this->db->limit($limit, $offset);

        if ($search)
            $this->db->like($search);
        
        $query = $this->db->get('clientes');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function countAll()
    {
        return $this->db->count_all('clientes');
    }

    public function insert($data)
    {
        $this->db->insert('clientes', $data);
    }

    public function getById($id_cliente)
    {
        $query = $this->db->where('id', $id_cliente)->get('clientes');

        return $query->row();
    }

    public function update($id_cliente, $data)
    {
        $this->db->where('id', $id_cliente);
        $this->db->update('clientes', $data);
    }

    public function delete($id_cliente)
    {
        $this->db->where('id', $id_cliente);
		$this->db->delete('clientes');
    }

}