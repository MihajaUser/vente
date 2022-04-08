<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProformatModel extends CI_Model
{
    public  function getProformat()
    {
        $query = $this->db->query('select * from viewProformat');
        return $query->result_array();
    }

    public  function getIdProduit($nom)
    {
        $query = $this->db->query('select * from produit where nom='.$nom);
        return $query->result_array();
    }

    

    public  function getFicheProformat($idProformat)
    {   $where ="";
        if ($idProformat!="") {
            $where=" where proformatsId =".$idProformat;
        }
        $query = $this->db->query('select * from viewFicheProformat'.$where);
        return $query->result_array();
    }
    public  function insertProformats($data)
    {
        $this->db->insert("proformats", $data);
    }

    public  function insertDetails($data)
    {
        $this->db->insert("detailProformats", $data);
    }

}