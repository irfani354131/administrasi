<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Neraca_model extends CI_Model {


	

	function get_data_akun_dapat() {
		$query = $this->db->query("SELECT * FROM `acc_coa_type` WHERE `deleted` = 0 AND account_type = 'Pendapatan' AND parent IS NOT NULL ORDER BY account_number ASC");
		if($query->num_rows() > 0) {
			$out = $query->result();
			return $out;
		} else {
			return array();
		}

	}
	function getCurrentAssets(){
		$query = $this->db->query("SELECT * FROM `acc_coa_type` WHERE `deleted` = 0 AND account_type in ('Aktiva Lancar Lainnya','Kas/Bank','Akun Piutang','Aktiva Tetap','Persediaan') AND parent IS NOT NULL ORDER BY account_number ASC");
		if($query->num_rows() > 0) {
			$out = $query->result();
			return $out;
		} else {
			return array();
		}
	}

	function getCurrentNonAssets(){
		$query = $this->db->query("SELECT * FROM `acc_coa_type` WHERE `deleted` = 0 AND account_type in('Akumulasi Penyusutan') AND parent IS NOT NULL ORDER BY account_number ASC");
		if($query->num_rows() > 0) {
			$out = $query->result();
			return $out;
		} else {
			return array();
		}
	}

	function getCurrentLiabilities(){
		$query = $this->db->query("SELECT * FROM `acc_coa_type` WHERE `deleted` = 0 AND account_type in('Kewajiban Lancar Lainnya','Akun Hutang','Kewajiban Jangka Panjang') AND parent IS NOT NULL ORDER BY account_number ASC");
		if($query->num_rows() > 0) {
			$out = $query->result();
			return $out;
		} else {
			return array();
		}
	}

	function getLongTermPayable(){
		$query = $this->db->query("SELECT * FROM `acc_coa_type` WHERE `deleted` = 0 AND account_type in('Hutang Jangka Panjang') AND parent IS NOT NULL ORDER BY account_number ASC");
		if($query->num_rows() > 0) {
			$out = $query->result();
			return $out;
		} else {
			return array();
		}
	}

	function getEquity(){
		$query = $this->db->query("SELECT * FROM `acc_coa_type` WHERE `deleted` = 0 AND account_type in('Ekuitas') AND parent IS NOT NULL ORDER BY account_number ASC");
		if($query->num_rows() > 0) {
			$out = $query->result();
			return $out;
		} else {
			return array();
		}
	}

	

	

	
}