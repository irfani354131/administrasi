<div id="page-content" class="m20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>Pembayaran</h1>
            <div class="title-button-group">
                <div class="btn-group" role="group">
                    <?php
                    echo modal_anchor(get_uri("sales/s_payments/add_receipt"), "<i class='fa fa-plus-circle'></i> " . "Pembayaran", array("class" => "btn btn-primary", "title" => "Pembayaran","data-modal-lg"=>1));
                
                ?>
                </div>
               
            </div>
        </div>
       

        

        
        <div class="table-responsive" style="min-height: 500px">
            <table id="payments-table" class=" display dataTable no-footer" cellspacing="0" width="100%" >    
                       
            </table>
        </div>


    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#payments-table").appTable({
            source: '<?php echo_uri("sales/s_payments/list_data") ?>',
            // order: [[1, "asc"]],
            columns: [
                {title: "VOUCHER CODE #"},
                {title: "CUSTOMERS"},
                {title: "STATUS","class": "text-center"},
                // {title: "KAS"},
                {title: "PAY DATE"},
                {title: "MEMO"},
                {title: "CURRENCY","class": "text-center"},
                {title: "PAID", "class": "text-right"},
                {title: "RESIDU", "class": "text-right"},
                {title: "TOTAL", "class": "text-right"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
            printColumns: [0, 1, 2, 3, 4,5,6,7,8],
            xlsColumns: [0, 1, 2, 3, 4,5,6,7,8]

        });

    });
</script>    
