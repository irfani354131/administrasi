<div id="page-content" class="clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>Purchase order</h1>
            <div class="title-button-group">
                <div class="btn-group" role="group">
                </div>
                <?php
                    echo modal_anchor(get_uri("purchase/p_order/modal_form"), "<i class='fa fa-plus-circle'></i> " . "Add Purchase Order", array("class" => "btn btn-primary", "title" => "Add Purchase Order"));
                
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="order-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#order-table").appTable({
            source: '<?php echo_uri("purchase/p_order/list_data") ?>',
            // order: [[1, "asc"]],
            columns: [
                {title: "ORDER CODE #"},
                {title: "VENDORS"},
                {title: "STATUS"},
                {title: "TUJUAN"},
                {title: "TGL ORDER"},
                {title: "MATA UANG"},
                {title: "TOTAL"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w150"}
            ],
            printColumns: [0, 1, 2, 3, 4,5,6,7,8],
            xlsColumns: [0, 1, 2, 3, 4,5,6,7,8]

        });

    });
</script>    
