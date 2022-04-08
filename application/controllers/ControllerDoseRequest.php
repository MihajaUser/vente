<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerDoseRequest extends CI_Controller
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

    
    public function listDoseRequest()
    {
        $this->load->helper('url');
        $this->load->model('DoseRequestMod');
        $data['doseRequest']=$this->DoseRequestMod->getDoseRequest();
        $data['page']='listDoseRequest.php';
        $this->load->view('template',$data);
    }

    public function pageInsertDoseRequest()
    {
        $this->load->helper('url');
        $this->load->model('DoseRequestMod');
        $this->load->model('PersonsMod');
        $data['doseRequest']=$this->DoseRequestMod->getDoseRequest();
        $data['vaccines']=$this->PersonsMod->getVaccine();
        $data['page']='insertDoseRequest.php';//$this->load->model('PersonsMod');'vaccines' => $this->PersonsMod->getVaccine(),
        $this->load->view('template',$data);
    }

    public function insertDoseRequest(){
        $this->load->helper('url');
        $this->load->model('DoseRequestMod');
        $this->load->model('PersonsMod');
        $insert = array (
          'id' => '',
          'date' => $this->input->post('date'),
          'user_id'=>$this->input->post('user_id'),
          'vaccine_id'=>$this->input->post('vaccine_id'),
          'quantity'=>$this->input->post('quantity')
      );
        $this->DoseRequestMod->insertDoseRequeat($insert);
        $data['doseRequest']=$this->DoseRequestMod->getDoseRequest();
        $data['vaccines']=$this->PersonsMod->getVaccine();
        $data['page']='insertDoseRequest.php';
        $this->load->view('template',$data);
    
      }
}