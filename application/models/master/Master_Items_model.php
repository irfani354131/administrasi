<?php

class Master_Items_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'master_items';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        // $items_table = "master_items";
        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where .= " AND id=$id";
        }

        $sql = "SELECT *,
        (select account_name from acc_coa_type where id=master_items.sales_journal) as sales_journal_name,
        (select account_name from acc_coa_type where id=master_items.sales_journal_lawan) as sales_journal_lawan_name,
        (select account_name from acc_coa_type where id=master_items.hpp_journal) as hpp_journal_name,
        (select account_name from acc_coa_type where id=master_items.lawan_hpp) as hpp_journal_lawan
        FROM $this->table

        WHERE deleted=0 $where ";
        return $this->db->query($sql);
    }


}
