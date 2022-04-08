<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockModel extends CI_Model {
	

	public function estDispo($idProduit,$Quantite){
		$sql = "select * from stock where idProduit=%s and actuel>=%s and dateM=(select max(dateM) from stock where idProduit=%s)";	
		$sql = sprintf($sql,$idProduit,$Quantite,$idProduit);
		//echo $sql;
		//var_dump($sql);
		$query = $this->db->query($sql);
		$res= $query->result_array();
		return $res;
	}

	public function mihena($idProduit,$Quantite){
		$sql = "select * from stock where idProduit=%s and dateM=(select max(dateM) from stock where idProduit=%s))";	
		$sql = sprintf($sql,$idProduit,$Quantite,$idProduit);
		//echo $sql;
		//var_dump($sql);
		$query = $this->db->query($sql);
		$res= $query->result_array();

		$actuel = $res[0]['actuel'];
		$actu = $actuel - $Quantite;

		$sql1 = "insert into stock values (null,%s,now(),0,%s,0,0,%s,'description mivoka'";	
		$sql1 = sprintf($sql1,$idProduit,$Quantite,$actu);
		//echo $sql1;
		//var_dump($sql);
		$query1 = $this->db->query($sql1);
	}
	

	public function entre($date1,$date2){
		$sql = "select sum(entre) as entre,idProduit,actuel from stock where dateM between '%s' and '%s' group by idProduit,dateM";	
		$sql = sprintf($sql,$date1,$date2);
		//echo $sql;
		//var_dump($sql);
		$query = $this->db->query($sql);
		$res= $query->result_array();
		return $res;
	}

	public function sortie($date1,$date2){
		$sql = "select sum(sortie) as sortie,idProduit,actuel from stock where dateM between '%s' and '%s' group by idProduit,dateM";	
		$sql = sprintf($sql,$date1,$date2);
		//echo $sql;
		//var_dump($sql);
		$query = $this->db->query($sql);
		$res= $query->result_array();
		return $res;
	}
}