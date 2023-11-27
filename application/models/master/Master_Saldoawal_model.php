<?php

class Master_Saldoawal_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'master_saldo_awal';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        // $items_table = "master_items";
        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where .= " AND id=$id";
        }

        $sql = "SELECT *
        FROM $this->table
        WHERE deleted=0 $where";
        return $this->db->query($sql);
    }

    function getPeriode() {

        $list_data = $this->db->query("SELECT DISTINCT(periode) FROM $this->table WHERE deleted = 0")->result();
        $result = array();
        foreach ($list_data as $data) {
            // $text = "";
            $result = $data->periode;
        }
        return $result;
    }


   
    

    function getDebit($no,$p){
        $q = "SELECT SUM(debet) as debet FROM master_saldo_awal WHERE fid_coa='$no' AND periode='$p' AND deleted = 0";
        $data = $this->db->query($q);
        if($data->num_rows() > 0 ){
            foreach($data->result() as $t){
                $hasil = $t->debet;
            }
        }else{
            $hasil = 0;
        }
        return $hasil;
    }
    function getCredit($no,$p){
        $q = "SELECT sum(credit) as credit FROM master_saldo_awal WHERE fid_coa='$no' AND periode='$p' AND deleted = 0";
        $data = $this->db->query($q);
        if($data->num_rows() > 0 ){
            foreach($data->result() as $t){
                $hasil = $t->credit;
            }
        }else{
            $hasil = 0;
        }
        return $hasil;
    }

    function getModal($p){
        $q = "SELECT sum(credit) as credit FROM master_saldo_awal WHERE fid_coa='78' AND periode='$p' AND deleted = 0";
        $data = $this->db->query($q);
        if($data->num_rows() > 0 ){
            foreach($data->result() as $t){
                $hasil = $t->credit;
            }
        }else{
            $hasil = 0;
        }
        return $hasil;
    }
    
    function getDebitAll($p){
        $q = "SELECT SUM(debet) as debet FROM master_saldo_awal WHERE  periode='$p' AND deleted = 0";
        $data = $this->db->query($q);
        if($data->num_rows() > 0 ){
            foreach($data->result() as $t){
                $hasil = $t->debet;
            }
        }else{
            $hasil = 0;
        }
        return $hasil;
    }
    function getCreditAll($p){
        $q = "SELECT sum(credit) as credit FROM master_saldo_awal WHERE periode='$p' AND deleted = 0";
        $data = $this->db->query($q);
        if($data->num_rows() > 0 ){
            foreach($data->result() as $t){
                $hasil = $t->credit;
            }
        }else{
            $hasil = 0;
        }
        return $hasil;
    }

}
