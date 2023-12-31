<?php echo form_open(get_uri("master/items/add"), array("id" => "item-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">

    

    <div class="form-group">
        <label for="title" class=" col-md-3">Product Name</label>
        <div class="col-md-9">
            <?php
            echo form_input(array(
                "id" => "title",
                "name" => "title",
                "class" => "form-control validate-hidden",
                "placeholder" => lang('title'),
                "autofocus" => true,
                "data-rule-required" => true,
                "autocomplete" => "off",
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label for="category" class=" col-md-3">Category</label>
        <div class="col-md-9">
             <?php 
                echo form_dropdown(
                    "category", array(
                        "Tas Pria" => "Tas Pria",
                        "Tas Wanita" => "Tas Wanita",
                        "Pakaian Pria" => "Pakaian Pria",
                        "Pakaian Wanita" => "Pakaian Wanita",
                        "Sepatu Pria" => "Sepatu Pria",
                        "Sepatu Wanita" => "Sepatu Wanita",
                        "Koper & Tas Travel" => "Koper & Tas Travel",
                        "Komputer & Aksesoris" => "Komputer & Aksesoris",
                        "Buku & Majalah" => "Buku & Majalah",
                        "Buku & Alat Tulis" => "Buku & Alat Tulis",
                        "Hobi & Koleksi" => "Hobi & Koleksi",
                        "Olahraga & Outdoor" => "Olahraga & Outdoor",
                        "Kamera & Drone" => "Kamera & Drone",
                        "Handphone & Aksesoris" => "Handphone & Aksesoris",
                        "Perlengkapan Rumah" => "Perlengkapan Rumah",
                        "Fashion Bayi & Anak" => "Fashion Bayi & Anak",
                        "Ibu & Bayi" => "Ibu & Bayi",
                        "Jam Tangan" => "Jam Tangan",
                        "Elektronik" => "Elektronik",
                        "Aksesoris Fashion" => "Aksesoris Fashion",
                        "APerawatan & Kecantikan" => "Perawatan & Kecantikan",

                        ), "", "class='select2 mini'"
                    );
                        ?>
        </div>
    </div>
  <!--  <div class="form-group">
        <label for="unit_type" class=" col-md-3">Type</label>
        <div class="col-md-9">
             <?php 
                echo form_dropdown(
                    "unit_type", array(
                        "-" => "-"
                        
                        ), "", "class='select2 mini'"
                    );
                        ?>
        </div>
    </div>-->

    <div class="form-group">
        <label for="title" class=" col-md-3">Unit</label>
        <div class="col-md-9">
            <?php
            echo form_input(array(
                "id" => "unit",
                "name" => "unit",
                "class" => "form-control validate-hidden",
                "placeholder" => 'unit',
                "autofocus" => true,
                "autocomplete" => "off",
                "data-msg-required" => lang("field_required"),
            ));
            ?>
        </div>
    </div>

     <div class="form-group">
        <label for="category" class=" col-md-3">Debit</label>
        <div class="col-md-9">
             <?php
                   echo form_dropdown("sales_journal_lawan", $sales_journal_lawan, "", "class='select2 validate-hidden' id='fid_quot' ");
                    ?>
        </div>
    </div>
    <div class="form-group">
        <label for="sales_journal_lawan" class=" col-md-3">Kredit</label>
        <div class="col-md-9">
            <?php
                   echo form_dropdown("sales_journal", $sales_journal, "", "class='select2 validate-hidden' id='fid_quot' ");
                    ?>
             
        </div>
    </div>

    <div class="form-group">
        <label for="category" class=" col-md-3">Debit</label>
        <div class="col-md-9">
             <?php
                   echo form_dropdown("hpp_journal", $hpp_journal, "", "class='select2 validate-hidden' id='fid_quot' ");
                    ?>
        </div>
    </div>
     <div class="form-group">
        <label for="category" class=" col-md-3">Kredit</label>
        <div class="col-md-9">
             <?php
                   echo form_dropdown("lawan_hpp", $lawan_hpp, "", "class='select2 validate-hidden' id='fid_quot' ");
                    ?>
        </div>
    </div>
    </div>
     <div class="form-group">
        <label for="foto" class=" col-md-3">Upload Foto</label>
        <div class="col-md-9">
        <?php
            echo form_input(array(
                "id" => "foto",
                "name" => "foto",
                "class" => "form-control",
                "type" => "file"
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

        $("#item-form .select2").select2();
        $("#item-form").appForm({
            onSuccess: function (result) {
                $("#item-table").appTable({newData: result.data, dataId: result.id});
            }
        });

    });
</script>