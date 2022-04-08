<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class DoseResponseMod extends CI_Model 
{
    public  function getDoseResponse()
    {
        $query = $this->db->query('select * from viewReponseVaccin Group by dose_rquestsId');
        return $query->result_array();
    }

    

    public  function getDoseResponseHistoriques($dose_rquestsId)
    {
        $query = $this->db->query('select * from viewReponseVaccin where dose_rquestsId='.$dose_rquestsId);
        return $query->result_array();
    }

    public  function getRecuReste()
    {
        $query = $this->db->query('select sum(dose_responsesQuantity) AS recu , (dose_rquestsQuantity-sum(dose_responsesQuantity)) AS reste from viewReponseVaccin Group by dose_rquestsId');
        return $query->result_array();
    }

   /* public  function getFicheDevis($idPreavis)
    {   $where ="";
        if ($idPreavis!="") {
            $where=" where devisId =".$idPreavis;
        }
        $query = $this->db->query('select * from viewFicheDevis'.$where);
        return $query->result_array();
    }
    public  function insert($data)
    {
        $this->db->insert("devis", $data);
    }

    public  function insertDetails($data)
    {
        $this->db->insert("detailDevis", $data);
    }
*/
}