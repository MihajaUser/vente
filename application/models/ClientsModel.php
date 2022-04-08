<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ClientsModel extends CI_Model
{
    public  function getClients()
    {
        $query = $this->db->query('select * from Clients ');
        return $query->result_array();
    }
    public  function insert($data)
    {
        $this->db->insert("Clients", $data);
    }

}