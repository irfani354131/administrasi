<div id="page-content" class="p20 clearfix">

    <div class="panel panel-default">

        <div class="page-title clearfix">

            <h1> Master Products</h1>

            <div class="title-button-group">
  
                <?php echo modal_anchor(get_uri("master/items/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_product'), array("class" => "btn btn-primary", "title" => lang('add_product'))); ?>

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

            source: '<?php echo_uri("master/items/list_data") ?>',

            order: [[0, 'desc']],

            columns: [

                {title: 'Item Name'},

                {title: 'Category'},

                {title: 'foto'},
                
                {title: 'Unit'},

                {title: 'Debit'},

                {title: 'Kredit'},

                {title: 'Debit'},

                {title: 'Kredit'},

           

                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}

            ],

            printColumns: [0, 1, 2, 3, 4,5,6,7],

            xlsColumns: [0, 1, 2, 3, 4,5,6,7]

        });

    });





</script>