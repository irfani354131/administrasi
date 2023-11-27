<div id="page-content" class="clearfix">

    <div class="panel panel-default">

        <div class="page-title clearfix">

            <h1>Persediaan Produk</h1>

            <div class="title-button-group">

                <div class="btn-group" role="group">

                </div>

                <?php

               // if ($this->login_user->is_admin) {

                    // echo modal_anchor(get_uri("team_members/invitation_modal"), "<i class='fa fa-envelope-o'></i> " . lang('send_invitation'), array("class" => "btn btn-default", "title" => lang('send_invitation')));

                    echo modal_anchor(get_uri("inventory/material/modal_form"), "<i class='fa fa-plus-circle'></i> " . 'Tambah Persediaan Produk', array("class" => "btn btn-primary", "title" => 'Tambah Persediaan Produk'));

                //}

                ?>

            </div>

        </div>

        <div class="table-responsive">

            <table id="stock-table" class="display" cellspacing="0" width="100%">            

            </table>

        </div>

    </div>

</div>



<script type="text/javascript">

    $(document).ready(function () {



        $("#stock-table").appTable({

            source: '<?php echo_uri("inventory/material/list_data") ?>',

            // order: [[1, "asc"]],

            columns: [

                {title: 'NOMOR PERSEDIAAN', "class": "text-center"},

                {title: "TANGGAL"},

                {title: "PRODUK"},

                {title: "DESKRIPSI"},

                {title: "QTY BELI"},

                {title: "QTY KELUAR"},

                {title: "JUMLAH PERSEDIAAN"},

                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w150"}

            ],

            printColumns: [0, 1, 2, 3, 4,5],

            xlsColumns: [0, 1, 2, 3, 4, 5]



        });

    });

</script>    

