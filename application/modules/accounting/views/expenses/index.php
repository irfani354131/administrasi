<div id="page-content" class="clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>Expenses Cash</h1>
            <div class="title-button-group">
                <div class="btn-group" role="group">
                </div>
                <?php
                    echo modal_anchor(get_uri("accounting/expenses/modal_form"), "<i class='fa fa-plus-circle'></i> " . "Add Voucher", array("class" => "btn btn-primary", "title" => "Add Voucher"));
                
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table id="expenses-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#expenses-table").appTable({
            source: '<?php echo_uri("accounting/expenses/list_data") ?>',
            // order: [[1, "asc"]],
            columns: [
                {title: "TRANS CODE #"},
                {title: "VOUCHER CODE"},
                {title: "PAID FROM TO"},
                {title: "DATE"},
                {title: "TOTAL"},
                {title: "DESCRIPTION"},
                {title: "CREATED BY"},
                {title: "UPDATED BY"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w150"}
            ],
            printColumns: [0, 1, 2, 3, 4,5,6,7,8],
            xlsColumns: [0, 1, 2, 3, 4,5,6,7,8]

        });
    });
</script>    
