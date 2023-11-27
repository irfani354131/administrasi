<?php echo form_open(get_uri("master/coa/save"), array("id" => "master_coa-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <div class="form-widget">
<!--         <div class="widget-title clearfix">
            <div id="general-info-label" class="col-sm-4"><i class="fa fa-pencil"></i><strong> <?php echo lang('master_coa_add'); ?></strong></div>
        </div>
 -->    </div>

    <div class="tab-content mt15">
        <div role="tabpanel" class="tab-pane active" id="general-info-tab">
             <div class="form-group">
                <label for="parent" class=" col-md-3"> Head Accounts</label>
                <div class=" col-md-9">
                    <?php
                    echo form_dropdown("parent", $head_dropdown, $model_info->parental, "class='select2 validate-hidden' id='parent'");
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="account_number" class=" col-md-3">No Account</label>
                <div class=" col-md-9">
                    <?php
                    echo form_input(array(
                        "id" => "account_number",
                        "name" => "account_number",
                        "value" => $model_info->account_number,
                        "class" => "form-control",
                        "placeholder" =>  'Account',
                        "data-rule-required" => true,
                        "data-msg-required" => lang("field_required"),
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="account_name" class=" col-md-3">Account Name</label>
                <div class=" col-md-9">
                    <?php
                    echo form_textarea(array(
                        "id" => "account_name",
                        "name" => "account_name",
                        "value" => $model_info->account_name,
                        "class" => "form-control",
                        "data-rule-required" => true,
                        "placeholder" => 'Nama Akun',
                        "data-msg-required" => lang("field_required")
                    ));
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="account_type" class=" col-md-3">TYPE</label>
                <div class=" col-md-9">
                    <?php
                            echo form_dropdown(
                                "account_type", array(
                            "Kas/Bank" => "Kas/Bank",
                            "Akun Piutang" => "Akun Piutang",
                            "Akun Hutang" => "Akun Hutang",
                            "Aktiva Lancar"=>"Aktiva Lancar",
                            "Aktiva Lancar Lainnya" => "Aktiva Lancar Lainnya",
                            "Aktiva Tetap"=>"Aktiva Tetap",
                            "Aktiva Tetap Tidak Berwujud"=>"Aktiva Tetap Tidak Berwujud",
                            "Aktiva Tidak Lancar Lainnya"=>"Aktiva Tidak Lancar Lainnya",
                            "Aktiva Lainnya" => "Aktiva Lainnya",
                            "Akumulasi Penyusutan" => "Akumulasi Penyusutan",
                            "Hutang Lancar"=>"Hutang Lancar",
                            "Hutang Jangka Panjang"=>"Hutang Jangka Panjang",
                            "Ekuitas" => "Ekuitas",
                            "Persediaan" => "Persediaan",
                            "Pendapatan"=>"Pendapatan",  
                            'Pendapatan Lain-lain ' => "Pendapatan Lain-lain",                          
                            'Harga Pokok Penjualan' => "Harga Pokok Penjualan",
                            "Beban" => "Beban",
                            'Beban Penjualan' => "Beban Penjualan",
                            'Beban Administrasi Umum' => "Beban Administrasi Umum",
                            'Beban Lain-lain' => "Beban Lain-lain",
                            "Kewajiban Jangka Panjang" => "Kewajiban Jangka Panjang",
                            "Kewajiban Lancar Lainnya" => "Kewajiban Lancar Lainnya"
                                ), $model_info->account_type, "class='select2 mini'"
                        );
                    
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="normally" class=" col-md-3">Debit/Kredit</label>
                <div class=" col-md-9">
                    <?php
                    echo form_dropdown(
                                "normally", array(
                                    "Debet" => "Debet",
                            "Kredit" => "Kredit"
                                ), $model_info->normally, "class='select2 mini'"
                        );
                    ?>
                </div>
            </div>
            <div class="form-group" style="display: none">
                <label for="reporting" class=" col-md-3">Laporan</label>
                <div class=" col-md-9">
                    <?php
                    echo form_dropdown(
                                "reporting", array(
                                    "" => "",
                            "Neraca" => "NERACA",
                            "Laba Rugi" => "LABA RUGI"
                                ), $model_info->reporting, "class='select2 mini'"
                        );
                    ?>
                </div>
            </div>
            <div class="form-group" style="display: none">
                <label for="cashflow" class=" col-md-3">Arus Kas</label>
                <div class=" col-md-9">
                    <?php
                    echo form_dropdown(
                                "cashflow", array(
                                    "" => "Tidak Masuk",
                            "Pemasukan" => "PEMASUKAN",
                            "Pngeluaran" => "PENGELUARAN"
                                ), $model_info->cashflow, "class='select2 mini'"
                        );
                    ?>
                </div>
            </div>
            <div class="form-group" style="display: none">
                <label for="akun" class=" col-md-3">ACCOUNT</label>
                <div class=" col-md-9">
                    <?php
                   echo form_dropdown(
                                "akun", array(
                            "pemasukan" => "PEMASUKAN",
                            "pengeluaran" => "PENGELUARAN"
                                ), $model_info->akun, "class='select2 mini'"
                        );
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="status" class=" col-md-3">STATUS</label>
                <div class=" col-md-9">
                    <?php
                   echo form_dropdown(
                                "status", array(
                            "0" => "ACTIVE",
                            "1" => "DELETE"
                                ), "", "class='select2 mini'"
                        );
                    ?>
                </div>
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
         RELOAD_VIEW_AFTER_UPDATE = false; //go to invoice page
        

        $("#master_coa-form .select2").select2();
        $("#master_coa-form").appForm({
            onSuccess: function(result) {
                if (typeof RELOAD_VIEW_AFTER_UPDATE !== "undefined" && RELOAD_VIEW_AFTER_UPDATE) {
                    location.reload();
                } else {
                    window.location = "<?php echo site_url('master/coa'); ?>";
                }
            }
       });

        $("#master_coa-form input").keydown(function(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                      $("#master_coa-form").trigger('submit');
                
            }
        });
        $("#kd_aktiva").focus();
       

        $("#form-submit").click(function() {
            $("#master_coa-form").trigger('submit');
        });

    });
</script>