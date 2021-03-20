<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BasicModel extends CI_Model
{
    public function getAll($table)
    {
        return $this->db->get($table)->result();
    }

    public function getById($table, $id)
    {
        return $this->db->get_where($table, array("id" => $id))->row();
    }

    public function getWhere($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function create($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function updateById($table, $id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
        return $this->db->get_where($table, ["id" => $id])->row();
    }

    public function deleteById($table, $id)
    {
        return $this->db->delete($table, array('id' => $id));
    }

    public function checkById($table, $id)
    {
        $query = $this->db->get_where($table, ['id' => $id])->row();
        if(!$query) {
            $data['message'] = "ID: $id tidak ditemukan";
            $this->load->view("errors/custom/resource_not_found", $data);
            die();
        }else{
            return $query;
        }
    }
}