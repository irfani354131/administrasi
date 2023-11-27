<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Journal_entry extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("accounting/Journal_entry_model");
        $this->load->model("accounting/Journal_entry_detail_model");
        //check permission to access this module
    }

    /* load clients list view */

    function index() {
    	$this->template->rander('journal_entry/index');
    }



    
    function modal_form() {
        //get custom fields

        // $view_data['model_info'] = $this->General_accounts_model->get_one($this->input->post('id'));
        // $view_data['taxes_dropdown'] = array("" => "-") + $this->Taxes_model->get_dropdown_list(array("title"));
        
        $view_data['coa_dropdown'] = $this->Master_Coa_model->get_dropdown_list(array("jns_trans"));

        $this->load->view('journal_entry/modal_form',$view_data);
    }

    function modal_form_edit() {

        validate_submitted_data(array(
            "id" => "numeric"
        ));


        $id = $this->input->post('id');
        $options = array(
            "id" => $id,
        );
        $view_data['coa_dropdown'] = $this->Master_Coa_model->get_dropdown_list(array("jns_trans"));


        $view_data['model_info'] = $this->Journal_entry_model->get_details($options)->row();
         // $view_data['clients_dropdown'] = array("" => "-") + $this->Master_Customers_model->get_dropdown_list(array("name"));

        

        $this->load->view('journal_entry/modal_form_edit', $view_data);
    }

    function jurnal_input($id){

        if(empty($id)){
            echo show_404();
        }

        $view_data['coa_dropdown'] = $this->Master_Coa_Type_model->getCoaDrop();
        $view_data['coa'] = $this->Master_Coa_Type_model->getCOA();
        $view_data['detail'] = $this->Journal_entry_model->getDetailTransaksi($id);

        $view_data['row'] = $this->Journal_entry_model->get_details(array("id"=>$id))->row();


        $this->template->rander("journal_entry/jurnal_input",$view_data);

    }

    function jurnal_input_save(){
        $id = $this->input->post('id');
        if($this->input->post('coa'))
        {
            $v1=$this->input->post('coa');
            while(list($key,$value)=each($v1))
                {
                    $ca=$this->input->post("coa[$key]");
                    $desc =$this->input->post("desc[$key]");
                    $debet      =$this->input->post("debet[$key]")*1;
                    $kredit     =$this->input->post("credit[$key]")*1;
                    $journal_code = $this->input->post('journal_code');
                    $data2=array('journal_code'=>$journal_code,
                                 'fid_coa'=>$ca,
                                 'date' => $this->input->post('date'),
                                 'description' => $desc,
                                 'fid_header' => $id,
                                 'debet'=>$debet,
                                 'credit'=>$kredit,
                                 'username' => 'admin',
                                 'created_at' => get_current_utc_time()
                             );
                 $this->Journal_entry_detail_model->save($data2);           
                }
        }

        redirect(base_url("accounting/journal_entry/jurnal_input/").$id);


    }

    /* insert or update a client */

    function add() {
        validate_submitted_data(array(
            "code_voucher" => "required",
        ));
        $data = array(
            "code" => $this->input->post('code_voucher'),
            "date" => $this->input->post('date'),
            "description" => $this->input->post('description'),
           
            "status" => "1"
        );

        

        $save_id = $this->Journal_entry_model->save($data);
        if ($save_id) {
            
            echo json_encode(array("success" => true, "data" => $save_id, 'id' => $save_id ,'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    function save() {
        $data_id = $this->input->post('id');


        validate_submitted_data(array(
            "code_voucher" => "required"
        ));

        
        $data = array(
            "code" => $this->input->post('code_voucher'),
            "date" => $this->input->post('date'),
            "description" => $this->input->post('description')
        );


        $save_id = $this->Journal_entry_model->save($data, $data_id);
        if ($save_id) {

            echo json_encode(array("success" => true, "data" => $this->_row_data($save_id), 'id' => $save_id,'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }


    /* delete or undo a client */

    function delete() {

        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        if ($this->input->post('undo')) {
            if ($this->Journal_entry_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Journal_entry_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    /* list of clients, prepared for datatable  */

    function list_data() {

        $list_data = $this->Journal_entry_model->get_details()->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    /* return a row of client list  table */

    private function _row_data($id) {
        $options = array(
            "id" => $id
        );
        $data = $this->Journal_entry_model->get_details($options)->row();
        return $this->_make_row($data);
    }

    /* prepare a row of client list table */

    private function _make_row($data) {
        // $options = array(
        //     "id" => $data->id
        // );
        // $query = $this->Master_Customers_model->get_details($options)->row();
        // $value = $this->Master_Coa_Type_model->get_details(array("account_number"=> $data->account_number))->row();
        $row_data = array(

            anchor("accounting/journal_entry/jurnal_input/".$data->id,$data->code),
            format_to_date($data->date,false),
            $data->description


        );

        
        	$row_data[] = anchor(get_uri("accounting/journal_entry/view/").$data->id, "<i class='fa fa-eye'></i>", array("class" => "view", "title" => lang('view'), "data-post-id" => $data->id)).modal_anchor(get_uri("accounting/journal_entry/modal_form_edit"), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_client'), "data-post-id" => $data->id))
                . js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_client'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("accounting/journal_entry/delete"), "data-action" => "delete"));
        
        return $row_data;
    }

}