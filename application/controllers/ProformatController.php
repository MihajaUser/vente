<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProformatController extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    
    public function lisProformat()
    {
      $this->load->helper('url');
      $this->load->model('ProformatModel');
      $this->load->model('DevisModel');
      $data['devis']=$this->ProformatModel->getProformat();//proformat
      $data['devisVrai']=$this->DevisModel->getDevis();//devis
      $this->load->view('proformat',$data);
    }


    public function ficheProformat($idProformat)
    {
        $this->load->helper('url');
        $this->load->model('ProformatModel');
        $this->load->model('ProduitsModel');
        $this->load->model('DevisModel');
        $details= $this->DevisModel->getFicheDevis($idProformat);
        $final =[];
        for ($i=0; $i < count($details) ; $i++) { 
            $base_api = "http://localhost:443/Vente2/Stock/estdispo/".$details[$i]['devisId']."/".$details[$i]['detailDevisQuantite'];
            $api = curl_init($base_api);
            curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($api, CURLOPT_CUSTOMREQUEST, "GET");
            $response = curl_exec($api);
            $v = json_decode($response);
            if($v!=false){
                $insert['idProformat'] = $idProformat;
                $insert['idProduits'] = $v[0]->idproduit;
                $insert['quantite'] = $details[$i]['detailDevisQuantite'];
                $insert['prixUnitaire'] = $v[0]->prixAchat;
                $this->ProformatModel->insertDetails($insert);
            }
        }    
        $data['details']=$this->ProformatModel->getFicheProformat($idProformat);
        $data['idProformat']=$idProformat;
        $data['produits']=$this->ProduitsModel->getProduit();
        $this->load->view('ficheProformat',$data);
    }    
    public function insertProformat()
    {
        $this->load->helper('url');
        $this->load->model('ProformatModel');
        $this->load->model('DevisModel');
        $this->load->model('ClientsModel');
        $insert['id'] = null;
        $insert['idDevis'] = $this->input->get('idDevis');
        $insert['dateDeCreation'] = $this->input->get('dateDeCreation');
        $this->ProformatModel->insertProformats($insert);
        $data['clients']=$this->ClientsModel->getClients();
        $data['devis']=$this->ProformatModel->getProformat();//proformat
        $data['devisVrai']=$this->DevisModel->getDevis();//devis
        $this->load->view('proformat',$data);
    }

    public function insertProformatDetails($idProformat)
    {
        $this->load->helper('url');
        $this->load->model('ProduitsModel');
        $this->load->model('ProformatModel');
        $insert['idProformat'] = $idProformat;
        $insert['idProduits'] = $this->input->get('idProduits');
        $insert['quantite'] = $this->input->get('quantite');
        $insert['prixUnitaire'] = $this->input->get('prixUnitaire');
        $this->ProformatModel->insertDetails( $insert);
        $data['produits']=$this->ProduitsModel->getProduit();
        $data['details']=$this->ProformatModel->getFicheProformat($idProformat);
        $data['idProformat']=$idProformat;
        $this->load->view('ficheProformat',$data);
    }
    
}