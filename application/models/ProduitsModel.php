<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProduitsModel extends CI_Model
{
    public  function getProduit()
    {
        $query = $this->db->query('select * from produits ');
        return $query->result_array();
    }
    // public  function insert($data)
    // {
    //     $this->db->insert("Clients", $data);
    // }

}