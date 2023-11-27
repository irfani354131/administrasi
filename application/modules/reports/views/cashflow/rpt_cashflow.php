<!-- Styler -->
<style type="text/css">
.panel * {
    font-family: "Arial","​Helvetica","​sans-serif";
}
.fa {
    font-family: "FontAwesome";
}
.datagrid-header-row * {
    font-weight: bold;
}
.messager-window * a:focus, .messager-window * span:focus {
    color: blue;
    font-weight: bold;
}
.daterangepicker * {
    font-family: "Source Sans Pro","Arial","​Helvetica","​sans-serif";
    box-sizing: border-box;
}
.glyphicon  {font-family: "Glyphicons Halflings"}

</style>
<?php 
$periode_default = date("Y")."-01-01";
$periode_now = date("Y-m-d");
if(!empty($_GET['start']) && !empty($_GET['end'])){
    $periode_default = $_GET['start'];
    $periode_now = $_GET['end'];
}

$month=1;
$year=date('Y');
$type=$month;
$project=false;

if(!empty($_GET['month'])){
    $month = $_GET['month'];
}
if(!empty($_GET['year'])){
    $year = $_GET['year'];
}

$start = $year."-01-01";
$end = $year."-".($month - 1)."-31";

$ararymonth=array(
            '',
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Augustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        );
?>
<div id="page-content" class="clearfix">
    <div style="max-width: 1000px; margin: auto;">
        
        <div id="invoice-status-bar">
            <?php  //$this->load->view("order/order_status_bar"); ?>
        </div>

        

        <div class="mt15">
            <div class="panel panel-default p15 b-t">
                 <form action="" method="GET" role="form" class="general-form">
               <table class="table table-bordered">
                   <tr>
                       <td><select class="form-control" name="month" >
                        <option value="1" <?php if ($month == 1) echo 'selected' ?>>January</option>
                        <option value="2" <?php if ($month == 2) echo 'selected' ?>>February</option>
                        <option value="3" <?php if ($month == 3) echo 'selected' ?>>March</option>
                        <option value="4" <?php if ($month == 4) echo 'selected' ?>>April</option>
                        <option value="5" <?php if ($month == 5) echo 'selected' ?>>May</option>
                        <option value="6" <?php if ($month == 6) echo 'selected' ?>>June</option>
                        <option value="7" <?php if ($month == 7) echo 'selected' ?>>July</option>
                        <option value="8" <?php if ($month == 8) echo 'selected' ?>>August</option>
                        <option value="9" <?php if ($month == 9) echo 'selected' ?>>September</option>
                        <option value="10" <?php if ($month == 10) echo 'selected' ?>>October</option>
                        <option value="11" <?php if ($month == 11) echo 'selected' ?>>November</option>
                        <option value="12" <?php if ($month == 12) echo 'selected' ?>>December</option>
                        </select>
                    </td>
                    
                        <td>
                            <select class="form-control" name="year">
                                <?php for($a=date('Y');$a>=2017;$a--){?>

                                    <option value="<?php echo $a?>"><?php echo $a?></option>
                                <?php } ?>

                            </select>

                        </td>
                         <td>
                            <button type="submit" name="search" class="btn btn-default" value="1"><i class=" fa fa-search"></i> Filter</button>
                            <a href="#" name="print"  class="btn btn-default" onclick="tableToExcel('table-print', 'Cashflow')"><i class=" fa fa-file-excel-o"></i> Excel</a>

                        </td>
                    </tr>
                </table>
            </form>
                

                <div class="table-responsive mt15 pl15 pr15">


    
    <hr>


    <div>
        
        <table  class="table table-bordered" id="table-print" style="">
             <tr><th colspan="3" ><p style="text-align:center; font-size: 15pt; font-weight: bold;"> Laporan Arus Kas  <br> Periode <?php echo $ararymonth[$month];?> Tahun  <?php  echo date("Y")?></p></th></tr>
            <tr>
                <th>KODE AKUN</th>
                <th>AKTIVITAS OPERASI</th>
                <th>JUMLAH</th>
            </tr>

            <tbody>
                <tr>
                    <td></td>
                    <td colspan="2"><b><i>Arus Kas Masuk</i></b></td>
                </tr>
                <?php $saldo_awal = $this->db->query("SELECT sum(master_saldo_awal.debet) as saldo from acc_coa_type JOIN master_saldo_awal ON master_saldo_awal.fid_coa = acc_coa_type.id WHERE account_type = 'Kas/Bank' AND periode = '$year' ")->row(); ?>
                <?php $jml_dapat = 0; $jml_keluar = 0; $jml_investasi = 0; $jml_pendanaan = 0; $saldo_awal_pemasukan = 0; $saldo_awal_pengeluaran = 0; $saldo_awal_investasi = 0; $saldo_awal_pendanaan = 0; ?>
                <?php foreach($data_dapat as $row){ 
                $jml_akun = $this->Cashflow_model->get_jml_akun($row->id,$month,$year);

                $saldo_awal_query = $this->db->query("SELECT IFNULL(sum(debet) + sum(credit),0) as total from transaction_journal WHERE fid_coa = '$row->id' AND date >= '$start' AND date <= '$end' ")->row();
                $saldo_awal_pemasukan += $saldo_awal_query->total;

                // echo "SELECT SUM(debet) + SUM(credit) as total from transaction_journal WHERE fid_coa = '$row->id' AND date >= '$start' AND date <= '$end' ";
                


                $value_masuk = $jml_akun->jum_debet+$jml_akun->jum_kredit;


                    ?>

                
                <tr>
                   <td><?=$row->account_number ?></td>
                   <td><?=$row->account_name ?></td> 
                   <td style="text-align: right;"><?php echo number_format(nsi_round($value_masuk))  ?></td>
                   
                </tr>
               <?php $jml_dapat += $value_masuk; ?>



            <?php } ?>
            <?php foreach($data_piutang as $row){ 
                $jml_akun = $this->Cashflow_model->get_jml_akun($row->id,$month,$year);
                $value_masuk_piutang = $jml_akun->jum_debet+$jml_akun->jum_kredit;
                    ?>

                
                <tr>
                   <td><?=$row->account_number ?></td>
                   <td><?=$row->account_name ?></td> 
                   <td style="text-align: right;"><?php echo number_format(nsi_round($value_masuk_piutang))  ?></td>
                   
                </tr>
               <?php $jml_dapat += $value_masuk + $value_masuk_piutang; ?>



            <?php } ?>
                <tr>
                    <td></td>
                    <td><b><i>Total Arus Kas Masuk</i></b></td>
                    <td style="text-align: right;font-weight: bold;"><?php echo number_format($jml_dapat); ?></td>
                    
                </tr>

                 <tr>
                    <td></td>
                    <td colspan="2"><b><i>Arus Kas Keluar</i></b></td>
                </tr>

                <?php foreach($data_beban_pokok as $row){ 
                $jml_akun_k = $this->Cashflow_model->get_jml_akun($row->id,$month,$year);
                $saldo_awal_query = $this->db->query("SELECT IFNULL(sum(debet) + sum(credit),0) as total from transaction_journal WHERE fid_coa = '$row->id' AND date >= '$start' AND date <= '$end' ")->row();
                $value_keluar = $jml_akun_k->jum_debet+$jml_akun_k->jum_kredit;

                $saldo_awal_pengeluaran += $saldo_awal_query->total;
                    ?>

                
                <tr>
                   <td><?=$row->account_number ?></td>
                   <td><?=$row->account_name ?></td> 
                   <td style="text-align: right;"><?php echo number_format(nsi_round($value_keluar))  ?></td>
                
                </tr>
                    
            <?php $jml_keluar += $value_keluar; ?>

            <?php } ?>
            <?php foreach($beban_operasional as $row){ 
                $jml_akun_k = $this->Cashflow_model->get_jml_akun($row->id,$month,$year);
                $value_keluar_beban = $jml_akun_k->jum_debet+$jml_akun_k->jum_kredit
                    ?>

                
                <tr>
                   <td><?=$row->account_number ?></td>
                   <td><?=$row->account_name ?></td> 
                   <td style="text-align: right;"><?php echo number_format(nsi_round($value_keluar_beban))  ?></td>
                
                </tr>
               
               <?php $jml_keluar += $value_keluar_beban; ?>
    


            <?php } ?>
             <tr>
                    <td></td>
                    <td><b><i>Total Arus Kas Pengeluaran</i></b></td>
                    <td style="text-align: right;font-weight: bold;"><?php echo number_format($jml_keluar) ?></td>
                    
                </tr>
                <tr>
                    <td></td>
                    <td><b><i>Arus kas dari aktifitas operasi</i></b></td>
                    <td style="text-align: right;font-weight: bold;"><?php echo number_format($jml_dapat - $jml_keluar) ?></td>
                </tr>
        <!--         <tr>
                    <td></td>
                    <td colspan="2"><b><i>Aktivitas Investasi</i></b></td>
                </tr>
                <?php foreach($data_investasi as $row){ 
                $jml_akun_k = $this->Cashflow_model->get_jml_akun($row->id,$month,$year);
                $value_investasi = $jml_akun_k->jum_debet+$jml_akun_k->jum_kredit;

                $saldo_awal_query = $this->db->query("SELECT IFNULL(sum(debet) + sum(credit),0) as total from transaction_journal WHERE fid_coa = '$row->id' AND date >= '$start' AND date <= '$end' ")->row();
                 $saldo_awal_investasi += $saldo_awal_query->total;
                    ?>

                
                <tr>
                   <td><?=$row->account_number ?></td>
                   <td><?=$row->account_name ?></td> 
                   <td style="text-align: right;"><?php echo number_format(nsi_round($value_investasi))  ?></td>
                
                </tr>
               
               <?php $jml_investasi += $value_investasi; ?>
    


            <?php } ?>
                <tr>
                    <td></td>
                    <td><b><i>Arus kas dari aktivitas Investasi</i></b></td>
                    <td style="text-align: right;font-weight: bold;"><?php echo number_format($jml_investasi) ?></td>
                    
                </tr> -->

                 <tr>
                    <td></td>
                    <td colspan="2"><b><i>Aktivitas Pendanaan</i></b></td>
                </tr>

                <?php foreach($data_pendanaan as $row){ 
                $jml_akun_k = $this->Cashflow_model->get_jml_akun($row->id,$month,$year);
                 $saldo_awal_query = $this->db->query("SELECT IFNULL(sum(debet) + sum(credit),0) as total from transaction_journal WHERE fid_coa = '$row->id' AND date >= '$start' AND date <= '$end' ")->row();
                 $saldo_awal_pendanaan += $saldo_awal_query->total;
                $value_pendanaan = $jml_akun_k->jum_debet+$jml_akun_k->jum_kredit
                    ?>

                
                <tr>
                   <td><?=$row->account_number ?></td>
                   <td><?=$row->account_name ?></td> 
                   <td style="text-align: right;"><?php echo number_format(nsi_round($value_pendanaan))  ?></td>
                
                </tr>
               
               <?php $jml_pendanaan += $value_pendanaan; ?>
    


            <?php } ?>
            <tr>
                    <td></td>
                    <td><b><i>Arus kas dari aktivitas pendanaan</i></b></td>
                    <td style="text-align: right;font-weight: bold;"><?php echo number_format($jml_pendanaan) ?></td>
                    
                </tr>

                <tr>
                    <td></td>
                    <td><b><i>Kenaikan Kas</i></b></td>
                    <td style="text-align: right;font-weight: bold;"><?php echo number_format(($jml_dapat - $jml_keluar) + $jml_investasi + $jml_pendanaan) ?></td>
                    
                </tr>

                <?php 
                    $kenaikan_kas = ($jml_dapat - $jml_keluar) + $jml_investasi + $jml_pendanaan;
                    $awal_kas = ($saldo_awal_pemasukan - $saldo_awal_pengeluaran) + $saldo_awal->saldo + $saldo_awal_investasi +$saldo_awal_pendanaan;
                ?>
                <tr>
                    <td></td>
                    <td><b><i>Saldo Awal Kas</i></b></td>
                    <td style="text-align: right;font-weight: bold;"><?php echo number_format($awal_kas); ?></td>
                    
                </tr>
                <tr>
                    <td></td>
                    <td><b><i>Saldo Akhir Kas</i></b></td>
                    <td style="text-align: right;font-weight: bold;"><?php echo number_format($awal_kas+$kenaikan_kas) ?></td>
                    
                </tr>

            </tbody>
            
        </table>
    </div>
<!-- <table width="100%" class="table">
    <tr style="background-color: lightgrey;">

        <td colspan="1" class="h_kanan"> SALDO </td>
        <td class="h_kanan"></td>
        <td class="h_kanan"></td>
    </tr>
</table>  -->
</div>
</div>
<script type="text/javascript">
</script>