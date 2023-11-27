<?php echo form_open(get_uri("master/projects/save"), array("id" => "projects-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">

    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    

    <div class="form-group">
        <label for="title" class=" col-md-3">Nama Proyek</label>
        <div class="col-md-9">
            <?php
            echo form_input(array(
                "id" => "project_name",
                "name" => "project_name",
                "class" => "form-control validate-hidden",
                "placeholder" => "Masukkan Nama Proyek",
                "value" => $model_info->project_name,
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class=" col-md-3">Description</label>
        <div class="col-md-9">
            <?php
            echo form_input(array(
                "id" => "description",
                "name" => "description",
                "class" => "form-control validate-hidden",
                "placeholder" => "Project Description",
                "value" => $model_info->project_description,
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="owner_name" class=" col-md-3">Contact</label>
        <div class="col-md-9">
            <?php
            echo form_input(array(
                "id" => "owner_name",
                "name" => "owner_name",
                "class" => "form-control validate-hidden",
                "placeholder" => "Contact",
                "value" => $model_info->owner_name,
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="company_name" class=" col-md-3">Company Name</label>
        <div class="col-md-9">
            <?php
            echo form_input(array(
                "id" => "company_name",
                "name" => "company_name",
                "class" => "form-control validate-hidden",
                "placeholder" => "Company Name",
                "value" => $model_info->company_name,
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function () {

        $("#projects-form").appForm({
            onSuccess: function (result) {
                $("#projects-table").appTable({newData: result.data, dataId: result.id});
            }
        });

        $("#project_name").focus();
    });
</script>