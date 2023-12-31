<?php echo form_open(get_uri("master/vendors/save"), array("id" => "vendor-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />

    <div class="tab-content mt15">
        <div role="tabpanel" class="tab-pane active" id="general-info-tab">
           
            <div class="form-group">
                <label for="name" class=" col-md-3">Code</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "code",
                        "name" => "code",
                        "class" => "form-control",
                        "value" => $model_info->code,
                        "placeholder" => 'Warehouse Code',
                        "autofocus" => true,
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="npwp" class=" col-md-3">Name</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "name",
                        "name" => "name",
                        "value" => $model_info->name,
                        "class" => "form-control",
                        "placeholder" =>  'warehouse name',
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
          
            <div class="form-group">
                <label for="address" class=" col-md-3">Address</label>
                <div class=" col-md-9">
                    <?php
                    echo form_textarea(array(
                        "id" => "address",
                        "name" => "address",
                        "value" => $model_info->address,
                        "class" => "form-control",
                        "data-rule-required" => true,
                        "placeholder" => 'Address'
                    ));
                    ?>
                </div>
            </div>
             <div class="form-group">
                <label for="npwp" class=" col-md-3">Contact Name</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "responsibility",
                        "name" => "responsibility",
                        "value" => $model_info->responsibility,
                        "class" => "form-control",
                        "placeholder" =>  'Contact Name',
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>

            
            <div class="form-group">
                <label for="contact" class=" col-md-3">Contact Number</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "phone_no",
                        "name" => "phone_no",
                        "value" => $model_info->phone_no,
                        "class" => "form-control",
                        "placeholder" => "08XXXXXXXXXX"
                    ));
                    ?>
                </div>
            </div>
           
            <div class="form-group">
                <label for="memo" class=" col-md-3">Description</label>
                <div class=" col-md-9">
                    <?php
                    echo form_textarea(array(
                        "id" => "description",
                        "name" => "description",
                        "value" => $model_info->description,
                        "class" => "form-control",
                        "placeholder" => 'Memo or Description'
                    ));
                    ?>
                </div>
            </div>
            
        </div>


    </div>

</div>


<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button id="form-submit" type="button" class="btn btn-primary "><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#vendor-form .select2").select2();
        $("#vendor-form").appForm({
            onSuccess: function(result) {
                if (result.success) {
                    $("#warehouse-table").appTable({newData: result.data, dataId: result.id});
                }
            }
       });

        $("#vendor-form input").keydown(function(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                      $("#vendor-form").trigger('submit');
                
            }
        });
        $("#name").focus();
       

        $("#form-submit").click(function() {
            $("#vendor-form").trigger('submit');
        });

    });
</script>