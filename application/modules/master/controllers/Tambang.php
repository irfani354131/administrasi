<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tambang extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->access_only_admin();

         //$this->load->model('Master_Tambang_model');
    }

    public function index() {


        $this->template->rander("tambang/index");
    }
    function getId($id){

        if(!empty($id)){
            $options = array(
                "id" => $id,
            );
            $data = $this->Master_Tambang_model->get_details($options)->row();

            echo json_encode(array("success" => true,"data" => $data));
        }else{
            echo json_encode(array('success' => false,'message' => lang('error_occurred')));
        }
    }

    /* open new member modal */

    function modal_form() {
        $this->access_only_admin();

        validate_submitted_data(array(
            "id" => "numeric"
        ));


        $this->load->view('tambang/modal_form');
    }

    function modal_form_edit() {
        $this->access_only_admin();

        validate_submitted_data(array(
            "id" => "numeric"
        ));


        $id = $this->input->post('id');
        $options = array(
            "id" => $id,
        );

        $view_data['model_info'] = $this->Master_Tambang_model->get_details($options)->row();

        

        $this->load->view('tambang/modal_form_edit', $view_data);
    }

    /* save new member */

    function add_tambang() {
        $this->access_only_admin();

        //check duplicate email address, if found then show an error message
        

        validate_submitted_data(array(
            
            "name" => "required",
        ));

        $user_data = array(
            "code" => getCodeId('master_tambang',"TM"),
            "name" => $this->input->post('name'),

            "npwp" => $this->input->post('npwp'),
            "address" => $this->input->post('address'),
            "termin" => $this->input->post('termin'),
            "contact" => $this->input->post('contact'),
            "email" => $this->input->post('email'),
            "mobile_number" => $this->input->post('mobile_number'),
            // "credit_limit" => $this->input->post('credit_limit'),
            "memo" => $this->input->post('memo'),
            "created_at" => get_current_utc_time()
        );


        


        //add a new team member
        $tambang = $this->Master_Tambang_model->save($user_data);
        

        if ($tambang) {
            echo json_encode(array("success" => true, "data" => $this->_row_data($tambang), 'id' => $tambang, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    function save() {
        $id = $this->input->post('id');


        validate_submitted_data(array(
            "id" => "numeric",
            "code" => "required",
            "name" => "required"
        ));

        $data = array(
            
            "name" => $this->input->post('name'),
            
            "company_name" => $this->input->post('company_name'),
            "npwp" => $this->input->post('npwp'),
            "address" => $this->input->post('address'),
            "termin" => $this->input->post('termin'),
            "contact" => $this->input->post('contact'),
            "email" => $this->input->post('email'),
            "mobile_number" => $this->input->post('mobile_number'),

            "credit_limit" => $this->input->post('credit_limit'),
            "memo" => $this->input->post('memo')        
        );

        $save_id = $this->Master_Tambang_model->save($data, $id);
        if ($save_id) {

            echo json_encode(array("success" => true, "data" => $this->_row_data($save_id), 'id' => $save_id,'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    /* open invitation modal */

    

    //prepere the data for members list
    function list_data() {
        $list_data = $this->Master_Tambang_model->get_details(1)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row data for member list
    function _row_data($id) {
        $options = array(
            "id" => $id
        );

        $data = $this->Master_Tambang_model->get_details($options)->row();
        return $this->_make_row($data);
    }

    //prepare team member list row
    private function _make_row($data) {
 
        $row_data = array(
            $data->code,
            $data->name,
            $data->npwp,
            $data->address,
            $data->email,
            $data->mobile_number,
            // $data->credit_limit,
            $data->memo
        );

        
        $delete_link = "";
        if ($this->login_user->is_admin) {
            $delete_link = js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_tambang'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("master/tambang/delete"), "data-action" => "delete-confirmation"));
        }

        $row_data[] = modal_anchor(get_uri("master/tambang/modal_form_edit"), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_tambang'), "data-post-id" => $data->id)).$delete_link;

        return $row_data;
    }

    //delete a team member
    function delete() {
        $this->access_only_admin();

        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
      
        if ($id != $this->login_user->id && $this->Master_Tambang_model->delete($id)) {
            echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
        }
    }

    function view($client_id = 0, $tab="") {

        if ($client_id) {
            $options = array("id" => $client_id);
            $client_info = $this->Master_Tambang_model->get_details($options)->row();
            if ($client_info) {

               
                $view_data['model_info'] = $client_info;
                
                $this->load->view("tambang/view", $view_data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }



}

/* End of file team_member.php */
/* Location: ./application/controllers/team_member.php */