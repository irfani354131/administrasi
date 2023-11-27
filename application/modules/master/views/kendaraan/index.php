<div id="page-content" class="clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>Master Kendaraan</h1>
            <div class="title-button-group">
                <div class="btn-group" role="group">
                </div>
                <?php
                //if ($this->login_user->is_admin) {
                    // echo modal_anchor(get_uri("team_members/invitation_modal"), "<i class='fa fa-envelope-o'></i> " . lang('send_invitation'), array("class" => "btn btn-default", "title" => lang('send_invitation')));
                    echo modal_anchor(get_uri("master/kendaraan/modal_form"), "<i class='fa fa-plus-circle'></i> " . 'Tambah Kendaraan', array("class" => "btn btn-primary", "title" => 'Tambah Kendaraan'));
                //}
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="vendor-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#vendor-table").appTable({
            source: '<?php echo_uri("master/kendaraan/list_data") ?>',
            // order: [[1, "asc"]],
            columns: [
                {title: 'CODE', "class": "text-center"},
                {title: "NAME"},
                {title: "NO. POLISI"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1, 2],
            xlsColumns: [0, 1, 2]

        });
    });
</script>    
