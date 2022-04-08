<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerFormulaire extends CI_Controller
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
    
    public function pageLogin()
    {
        $this->load->helper('url');
        $this->load->view('login');
    }


    public function enregistrementVaccin()
    {
        $this->load->helper('url');
        $this->load->model('DoseResponseMod');
        $data['doseResponse']=$this->DoseResponseMod->getDoseResponse();
        $data['recuReste']=$this->DoseResponseMod->getRecuReste();
        $data['page']='enregistrement.php';
        $this->load->view('template',$data);
    }

    public function faireVaccin()
    {
        $this->load->helper('url');
        $this->load->model('DoseResponseMod');
        $data['doseResponse']=$this->DoseResponseMod->getDoseResponse();
        //$data['recuReste']=$this->DoseResponseMod->getRecuReste();
        $this->load->view('faireVaccin',$data);
    }

    public function insertPersons(){
      $this->load->helper('url');
      $this->load->model('PersonsMod');
      $insert = array (
        'id' => '',
        'firstname' => $this->input->post('nom'),
        'lastname'=>$this->input->post('prenom'),
        'date_of_birth'=>$this->input->post('naissance'),
        'fokontany_id'=>$this->input->post('fokontany_id'),
        'cin'=>$this->input->post('cin')
    );
    $this->PersonsMod->insertPersons($insert);
    $data['page']='enregistrement.php';
    $this->load->view('template',$data);
    }
    
    public function insertRappel(){

    }

}