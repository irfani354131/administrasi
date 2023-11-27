<div id="page-content" class="clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>Master Tambang</h1>
            <div class="title-button-group">
                <div class="btn-group" role="group">
                </div>
                <?php
                if ($this->login_user->is_admin) {
                    // echo modal_anchor(get_uri("team_members/invitation_modal"), "<i class='fa fa-envelope-o'></i> " . lang('send_invitation'), array("class" => "btn btn-default", "title" => lang('send_invitation')));
                    echo modal_anchor(get_uri("master/tambang/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_tambang'), array("class" => "btn btn-primary", "title" => lang('add_tambang')));
                }
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="tambang-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#tambang-table").appTable({
            source: '<?php echo_uri("master/tambang/list_data") ?>',
            // order: [[1, "asc"]],
            columns: [
                {title: 'CODE', "class": "text-center"},
                {title: "NAME"},
                {title: "NPWP"},
                {title: "ADDRESS"},
                {title: "EMAIL"},
                {title: "MOBILE NUMBER"},
                // {title: "Credit Limit"},
                {title: "MEMO"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2, 3, 4,5,6],
            xlsColumns: [0, 1, 2, 3, 4,5,6]

        });
    });
</script>    
