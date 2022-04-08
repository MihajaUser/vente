<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerDoseResponse extends CI_Controller
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

    
    public function listDoseResponse()
    {
        $this->load->helper('url');
        $this->load->model('DoseResponseMod');
        $data['doseResponse']=$this->DoseResponseMod->getDoseResponse();
        $data['recuReste']=$this->DoseResponseMod->getRecuReste();
        $data['page']='doseResponse.php';
        $this->load->view('template',$data);
    }

    public function listDoseResponseHistoriques()
    {
        $this->load->helper('url');
        $this->load->model('DoseResponseMod');
        $data['doseResponse']=$this->DoseResponseMod->getDoseResponseHistoriques($this->input->post('dose_rquestsId'));
        $data['page']='historiques.php';
        $this->load->view('template',$data);
    }
}