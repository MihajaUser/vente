<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerPersons extends CI_Controller
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

  public function pageNonVacciner()
  {
    $this->load->helper('url');
    $this->load->model('PersonsMod');
    $data = array(
      'vaccinePresence' => $this->PersonsMod->getVaccinePresence(),
      'vaccines' => $this->PersonsMod->getVaccine(),
      'page' => 'nonVaccine.php'
    );
    $this->load->view('template', $data);
  }

  public function seVacciner()
  {
    $this->load->helper('url');
    $this->load->model('PersonsMod');
    $insert = array(
      'id' => '',
      'person_Id' => $this->input->post('personsId'),
      'date' => $this->input->post('date'),
      'vaccine_id' => $this->input->post('vaccine_id')
    );

    $this->PersonsMod->insertVaccinationHistories($insert);
    $data = array(
      'vaccinePresence' => $this->PersonsMod->getVaccinePresence(),
      'vaccines' => $this->PersonsMod->getVaccine(),
      'page' => 'nonVaccine.php'
    );
    $this->load->view('template', $data);
  }

  public function pagePersonne()
    {
        $this->load->helper('url');
        $this->load->model('PersonsMod');
       $data= array(
         'vaccinePresence'=> $this->PersonsMod->getPersonne(),
         'vaccines'=>$this->PersonsMod->getVaccine(),
         'page'=>'persons.php'
       );
        $this->load->view('template',$data);
    }
}
