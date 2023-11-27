<div id="page-content" class="p20 clearfix">

    <div class="panel panel-default">

        <div class="page-title clearfix">

            <h1> Tracking Sparepart</h1>

            <div class="title-button-group">

            </div>

        </div>

        <div class="table-responsive">

            <table id="item-table" class="display" cellspacing="0" width="100%">            

            </table>

        </div>

    </div>

</div>



<script type="text/javascript">

    $(document).ready(function () {



        $("#item-table").appTable({

            source: '<?php echo_uri("tracking/T_sparepart/list_data") ?>',

            order: [[0, 'desc']],

            columns: [

                {title: 'CODE'},

                {title: 'Nama Sparepart'},

                {title: 'Deskripsi'},

                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}

            ],

            printColumns: [0, 1, 2],

            xlsColumns: [0, 1, 2]

        });

    });





</script>