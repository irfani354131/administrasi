<?php

class Ref_category_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'ref_items_category';
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

}
