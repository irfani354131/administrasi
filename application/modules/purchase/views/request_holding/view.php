<div id="page-content" class="clearfix">
    <div style="max-width: 1000px; margin: auto;">
        <div class="page-title clearfix mt15">
            <h1> <?php echo "request_holding : ".get_request_holding_id($invoice_info->code); ?>
                
            </h1>
            <div class="title-button-group">
                <span class="dropdown inline-block">
                    <button class="btn btn-info dropdown-toggle  mt0 mb0" type="button" data-toggle="dropdown" aria-expanded="true">
                        <i class='fa fa-cogs'></i> <?php echo lang('actions'); ?>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        
                        <li role="presentation"><?php echo anchor(get_uri("purchase/request_holding/download_pdf/" . $invoice_info->id), "<i class='fa fa-download'></i> " . lang('download_pdf'), array("title" => lang('download_pdf'))); ?> </li>
                        <li role="presentation"><?php echo anchor(get_uri("purchase/request_holding/preview/" . $invoice_info->id . "/1"), "<i class='fa fa-search'></i> " . lang('invoice_preview'), array("title" => lang('invoice_preview')), array("target" => "_blank")); ?> </li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><?php echo modal_anchor(get_uri("purchase/request_holding/modal_form_edit"), "<i class='fa fa-edit'></i> " . lang('edit_invoice'), array("title" => lang('edit_invoice'), "data-post-id" => $invoice_info->id, "role" => "menuitem", "tabindex" => "-1")); ?> </li>

                        
                    </ul>
                </span>
                <?php echo modal_anchor(get_uri("purchase/request_holding/item_modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_item'), array("class" => "btn btn-default", "title" => lang('add_item'), "data-post-invoice_id" => $invoice_info->id)); ?>
                <?php  echo modal_anchor(get_uri("purchase/request_holding/send_request_holding_modal_form/" . $invoice_info->id), "<i class='fa fa-envelope-o'></i> " . "Email request_holding", array("class" => "btn btn-primary","title" => lang('email_invoice_to_client'), "data-post-id" => $invoice_info->id, "role" => "menuitem", "tabindex" => "-1")); ?>
            </div>
        </div>

        <div id="request_holding-status-bar">
            <?php $this->load->view("request_holding/request_holding_status_bar"); ?>
        </div>

        

        <div class="mt15">
            <div class="panel panel-default p15 b-t">
                
                <div class="clearfix p20">
                    <div class="col-sm-6">
                        <table style="font-size:14px;">
                            <tr>
                                <td width="200">request_holding Code</td>
                                <td width="20">:</td>
                                <td> <strong>#<?php echo $invoice_info->code ?></strong></td>
                            </tr>
                            <tr>
                                <td>Created Date</td>
                                <td>:</td>
                                <td> <?php echo format_to_date($invoice_info->created_at,true) ?></td>
                            </tr>
                           
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <table style="font-size:14px;" class="display">
                            <tr>
                                <td width="200">Vendor Name</td>
                                <td width="20">:</td>
                                <td> <strong><?php echo $client_info->code." - ".$client_info->name ?></strong></td>
                            </tr>
                            <tr>
                                <td>Contacts</td>
                                <td>:</td>
                                <td> <?php echo ($client_info->contact ? $client_info->contact : $client_info->mobile_number) ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td> <?php echo $invoice_info->email_to ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="clearfix">
                    
                
                </div>

                <div class="table-responsive mt15 pl15 pr15">
                    <table id="request_holding-item-table" class="display" width="100%">            
                    </table>
                </div>

                <div class="clearfix">
                    <div class="col-sm-8">

                    </div>
                    <div class="col-sm-4" id="request_holding-total-section">
                        <?php $this->load->view("request_holding/request_holding_total_section"); ?>
                    </div>
                </div>

            </div>
        </div>


        

           
    </div>
</div>



<script type="text/javascript">
    RELOAD_VIEW_AFTER_UPDATE = true;
    $(document).ready(function () {
        $("#request_holding-item-table").appTable({
            source: '<?php echo_uri("purchase/request_holding/item_list_data/". $invoice_info->id) ?>',
            order: [[0, "asc"]],
            hideTools: true,
            columns: [
                {title: '<?php echo lang("item") ?> '},
                {title: '<?php echo lang("quantity") ?>', "class": "text-right w15p"},
                {title: '<?php echo lang("rate") ?>', "class": "text-right w15p"},
                {title: '<?php echo lang("total") ?>', "class": "text-right w15p"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            onDeleteSuccess: function (result) {
                $("#request_holding-total-section").html(result.invoice_total_view);
                if (typeof updateInvoiceStatusBar == 'function') {
                    updateInvoiceStatusBar(result.invoice_id);
                }
            },
            onUndoSuccess: function (result) {
                $("#request_holding-total-section").html(result.invoice_total_view);
                if (typeof updateInvoiceStatusBar == 'function') {
                    updateInvoiceStatusBar(result.invoice_id);
                }
            }
        });

        
    });

    updateInvoiceStatusBar = function (invoiceId) {
        $.ajax({
            url: "<?php echo get_uri("purchase/request_holding/get_invoice_status_bar"); ?>/" + invoiceId,
            success: function (result) {
                if (result) {
                    $("#request_holding-status-bar").html(result);
                }
            }
        });
    };

</script>

<?php
//required to send email 

load_css(array(
    "assets/js/summernote/summernote.css",
));
load_js(array(
    "assets/js/summernote/summernote.min.js",
));
?>

