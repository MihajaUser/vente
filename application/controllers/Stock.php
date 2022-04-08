<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('StockModel');
        // $this->load->helper('assets');
    }
  public function index(){
    $this->load->view('stock');
  }
  
  public function estdispo($idProduit,$Quantite){
    $stock=$this->StockModel->estdispo($idProduit,$Quantite);
    if(count($stock)>0){
      // var_dump($stock);
      return $this->output->set_content_type('application/json') ->set_status_header(200)->set_output(json_encode($stock));
    }else{
      return $this->output->set_content_type('application/json') ->set_status_header(200)->set_output(json_encode(false));
    }
  }

  public function mihena($idProduit,$Quantite){
    $stock=$this->StockModel->mihena($idProduit,$Quantite);
  } 

  public function mouvement(){
    $date1 = $this->input->get('date1');
    $date2 = $this->input->get('date2');
    $stock=$this->StockModel->entre($date1,$date2);
    $sortie= $this->StockModel->sortie($date1,$date2);
    $data['entre']=$stock;
    $data['sortie']=$sortie;
    $this->load->view('stock',$data);
  } 
} 