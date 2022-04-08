<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DevisController extends CI_Controller
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

    
    public function listDevis()
    {
        $this->load->helper('url');
        $this->load->model('DevisModel');
        $this->load->model('ClientsModel');
        $data['clients']=$this->ClientsModel->getClients();
		$data['devis']=$this->DevisModel->getDevis();
        $this->load->view('devis',$data);
    }

    public function ficheDevis($idPreavis)
    {
        $this->load->helper('url');
        $this->load->model('DevisModel');
		$data['details']=$this->DevisModel->getFicheDevis($idPreavis);
        $data['idPreavis']=$idPreavis;
        $this->load->view('ficheDevis',$data);
    }

    public function insertDevis()
    {
        $this->load->helper('url');
        $this->load->model('DevisModel');
        $this->load->model('ClientsModel');
        $insert['id'] ="null";
        $insert['idClient'] = $this->input->get('idClient');
        $insert['date'] = $this->input->get('date');
        $insert['status'] = false;
        $this->DevisModel->insert( $insert);
        $data['clients']=$this->ClientsModel->getClients();
		$data['devis']=$this->DevisModel->getDevis();
        $this->load->view('devis',$data);
    }

    public function insertDevisDetails($idPreavis)
    {
        $this->load->helper('url');
        $this->load->model('DevisModel');
        $insert['idDevis'] = $idPreavis;
        $insert['produit'] = $this->input->get('produit');
        $insert['quantite'] = $this->input->get('quantite');
        $this->DevisModel->insertDetails( $insert);
        $data['details']=$this->DevisModel->getFicheDevis($idPreavis);
        $data['idPreavis']=$idPreavis;
        $this->load->view('ficheDevis',$data);
    }
    
}