<?php echo form_open(get_uri("sales/s_invoices/save"), array("id" => "invoices-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">

     <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />


    <div class="form-group">
        <label for="code" class=" col-md-3">INVOICES ID</label>
        <div class="col-md-9">
            <?php
            echo form_input(array(
                "id" => "code",
                "name" => "code",
                "value"=> $model_info->code,
                "class" => "form-control validate-hidden",
                "readonly" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
     <div class="form-group">
        <input type="hidden" name="order_id" value="<?php echo $model_info->id ?>">
        <label for="fid_order" class=" col-md-3">REF PROJECT  #</label>
            <div class=" col-md-9">
                <?php
                   echo form_dropdown("fid_project", $project_dropdown, $model_info->fid_project, "class='select2 validate-hidden' id='fid_project' ");
                    ?>
            </div>
    </div>  
    <div class="form-group">
        <input type="hidden" name="order_id" value="<?php echo $model_info->id ?>">
        <label for="fid_order" class=" col-md-3">REF ORDER  #</label>
            <div class=" col-md-9">
                <?php
                   echo form_dropdown("fid_order", $order_dropdown, $model_info->fid_order, "class='select2 validate-hidden' id='fid_order' ");
                    ?>
            </div>
    </div>  
    <div class="form-group">
        <label for="fid_cust" class="col-md-3">Customers</label>
        <div class=" col-md-9">
            <?php
            echo form_dropdown("fid_cust", $clients_dropdown, $model_info->fid_cust, "class='select2 validate-hidden' id='fid_cust' data-rule-required='true', data-msg-required='" . lang('field_required') . "'");
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="email_to" class="col-md-3">Email To</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "email_to",
                "name" => "email_to",
                "value" => $model_info->email_to,
                "class" => "form-control",
                "placeholder" => "client@example.com"
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inv_address" class=" col-md-3">Alamat</label>
        <div class="col-md-9">
             <?php 
                echo form_textarea(array(
                "id" => "inv_address",
                "name" => "inv_address",
                "value" => $model_info->inv_address,
                "class" => "form-control",
                "placeholder" => "Alamat",
                ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="delivery_address" class=" col-md-3">Alamat Pengiriman</label>
        <div class="col-md-9">
             <?php 
                echo form_textarea(array(
                "id" => "delivery_address",
                "name" => "delivery_address",
                "value" => $model_info->delivery_address,
                "class" => "form-control",
                "placeholder" => "Alamat Pengiriman",
                // "data-rule-required" => true,
                // "data-msg-required" => lang("field_required"),
            ));
                        ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inv_date" class="col-md-3">Invoice Date</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "inv_date",
                "name" => "inv_date",
                "class" => "form-control",
                "value" => $model_info->inv_date,
                "placeholder" => "Y/m/d",
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="end_date" class="col-md-3">End Date</label>
        <div class=" col-md-9">
            <?php
            echo form_input(array(
                "id" => "end_date",
                "name" => "end_date",
                "class" => "form-control",
                "placeholder" => "Y/m/d",
                 "value" => $model_info->end_date,
                "data-rule-required" => true,
                "autocomplete" => "off",
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="fid_tax" class=" col-md-3"><?php echo lang('tax'); ?></label>
        <div class="col-md-9">
            <?php
            echo form_dropdown("fid_tax", $taxes_dropdown, array($model_info->fid_tax), "class='select2 tax-select2'");
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="currency" class=" col-md-3">Mata Uang</label>
        <div class="col-md-9">
             <?php 
                echo form_dropdown(
                    "currency", array(
                        "IDR" => "IDR",
                        "USD" => "USD",
                        "EUR" => "EUR",
                        "JPY" => "JPY"
                        ), $model_info->currency, "class='select2 mini'"
                    );
                        ?>
        </div>
    </div>
    <!-- <div class="form-group">
        <label for="status" class=" col-md-3">Status invoices</label>
        <div class="col-md-9">
             <?php 
                echo form_dropdown(
                    "status", array(
                        "draft" => "Draft",
                        "sent" => "Sent"
                        ), $model_info->status, "class='select2 mini'"
                    );
                        ?>
        </div>
    </div> -->
    
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function () {
          RELOAD_VIEW_AFTER_UPDATE = false; //go to invoice page
        
        $("#invoices-form .select2").select2();
        setDatePicker("#inv_date");
        setDatePicker("#end_date");
        $("#invoices-form").appForm({
            onSuccess: function (result) {
                if (typeof RELOAD_VIEW_AFTER_UPDATE !== "undefined" && RELOAD_VIEW_AFTER_UPDATE) {
                    location.reload();
                } else {
                    window.location = "<?php echo site_url('sales/s_invoices/view'); ?>/" + result.id;
                }
            }
        });
        
        $("#fid_cust").select2().on("change", function () {
            var client_id = $(this).val();
            if ($(this).val()) {
                // $('#invoice_project_id').select2("destroy");
                // $("#invoice_project_id").hide();
                // appLoader.show({container: "#invoice-porject-dropdown-section"});
                $.ajax({
                    url: "<?php echo get_uri("master/customers/getId") ?>" + "/" + client_id,
                    dataType: "json",
                    // data: data,
                    type:'GET',
                    success: function (data) {

                         $.each(data, function(index, element) {

                            $("#email_to").val(element.email);
                            $("#inv_address").val(element.address);
                            $("#delivery_address").val(element.address);
                         });
                    }
                });
            }
        });
    });
</script>